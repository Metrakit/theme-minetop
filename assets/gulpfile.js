/**
 * CMD : gulp --env="prod" --clean="css"
 * OR : gulp
 */

var gulp            = require('gulp'),
    config          = require('./config.json');
    sass            = require('gulp-ruby-sass'),
    concat          = require('gulp-concat'),
    uglify          = require('gulp-uglify'),
    browserSync     = require('browser-sync'),
    sourcemaps      = require('gulp-sourcemaps'),
    minimist        = require('minimist'),
    gulpif          = require('gulp-if'),
    minifyCSS       = require('gulp-minify-css'),
    notify          = require("gulp-notify"),
    plumber         = require('gulp-plumber'),
    jshint          = require('gulp-jshint'),
    stylish         = require('jshint-stylish'),
    uncss           = require('gulp-uncss');

var options         = minimist(process.argv.slice(2)),
    reload          = browserSync.reload;


gulp.task('browser-sync', function() {
    browserSync({
        proxy: "dev.app"
    });
});

if (options.env != "prod") {
    sassOptions = config.public.sass.dev;
} else {
    sassOptions = config.public.sass.prod; 
}

gulp.task('sass_main', function() {
    sassOptions.container = config.public.sass.main.container;
    return sass(config.public.sass.main.path, sassOptions)
        .pipe(concat('main.min.css'))
        .pipe(gulpif(options.clean == "css", uncss({
            html: [config.public.dist.path + '**/*.html', "http://dynam.ix"]
        })))
        .pipe(gulpif(options.env == "prod", minifyCSS()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest(config.public.dist.path + 'css'));
});

gulp.task('sass_back', function() {
    sassOptions.container = config.public.sass.back.container;
    return sass(config.public.sass.back.path, sassOptions)
        .pipe(concat('backend.min.css'))
        .pipe(gulpif(options.env == "prod", minifyCSS()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest(config.public.dist.path + 'css')) 
        .pipe(reload({stream:true}));
});

gulp.task('js_main', function() {

    jsfiles = config.public.js.main.path.concat(config.public.js.main.custom)

    gulp.src(config.public.js.main.custom)
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .on('error', notify.onError({ message: 'JS hint fail'}));   

    return gulp.src(jsfiles)
        .pipe(gulpif(options.env != "prod", sourcemaps.init()))
        .pipe(concat('main.min.js'))
        .pipe(gulpif(options.env == "prod", uglify()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest(config.public.dist.path + 'js'));
});

gulp.task('js_back', function() {

    jsfiles = config.public.js.back.path.concat(config.public.js.back.custom)

    gulp.src(config.public.js.back.custom)
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .on('error', notify.onError({ message: 'JS hint fail'}));

    return gulp.src(config.public.js.back.path)
        .pipe(gulpif(options.env != "prod", sourcemaps.init()))
        .pipe(concat('backend.min.js'))
        .pipe(gulpif(options.env == "prod", uglify()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest(config.public.dist .path+ 'js'));
});


gulp.task('watch', ['js_main', 'js_back', 'sass_main', 'sass_back', 'browser-sync'], function() {
    gulp.watch(config.public.js.main.custom, ['js_main', browserSync.reload]);
    gulp.watch(config.public.js.back.custom, ['js_back', browserSync.reload]);
    gulp.watch(config.public.sass.watch, ['sass_main', 'sass_back']);
    gulp.watch(config.public.blade).on("change", browserSync.reload);
});

gulp.task('default', ['watch']);