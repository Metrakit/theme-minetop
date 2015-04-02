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
    sassOptions = config.sass.dev;
} else {
    sassOptions = config.sass.prod; 
}

gulp.task('sass_main', function() {
    sassOptions.container = config.sass.main.container;
    return sass(config.sass.main.path, sassOptions)
        .pipe(concat('main.min.css'))
        .pipe(gulpif(options.clean == "css", uncss({
            html: ['public/**/*.html', "http://dev.app"]
        })))
        .pipe(gulpif(options.env == "prod", minifyCSS()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest('public/css'));
});

gulp.task('sass_back', function() {
    sassOptions.container = config.sass.back.container;
    return sass(config.sass.back.path, sassOptions)
        .pipe(concat('backend.min.css'))
        .pipe(gulpif(options.env == "prod", minifyCSS()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest('public/css')) 
        .pipe(reload({stream:true}));
});

gulp.task('js_main', function() {

    gulp.src(['src/js/*.js'])
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .on('error', notify.onError({ message: 'JS hint fail'}));   

    return gulp.src(config.js.main.path)
        .pipe(gulpif(options.env != "prod", sourcemaps.init()))
        .pipe(concat('main.min.js'))
        .pipe(gulpif(options.env == "prod", uglify()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest('public/js'));
});

gulp.task('watch', ['js_main', 'sass_main', 'sass_back', 'browser-sync'], function() {
    gulp.watch('src/js/*.js', ['js_main', browserSync.reload]);
    gulp.watch('src/sass/**/*.scss', ['sass_main', 'sass_back']);
    gulp.watch("public/**/*.php").on("change", browserSync.reload);
});

gulp.task('default', ['watch']);