/**
 * CMD : gulp --env="prod" --clean="css"
 * OR : gulp
 */

var gulp            = require('gulp'),
    sass            = require('gulp-sass'),
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
    stylish         = require('jshint-stylish');
    uncss           = require('gulp-uncss');

var options         = minimist(process.argv.slice(2)),
    reload          = browserSync.reload;


gulp.task('browser-sync', function() {
    browserSync({
        proxy: "dev.app"
    });
});

gulp.task('sass', function() {

    return gulp.src([
            'vendor/**/*.min.css', 
            'src/sass/**/*.scss'
        ])
        .pipe(gulpif(options.env != "prod", sourcemaps.init()))
        .pipe(sass({
            errLogToConsole: false,
            onError: function(err) {
                return notify().write(err);
            }
        }))
        .pipe(concat('main.min.css'))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulpif(options.clean == "css", uncss({
            html: ['public/**/*.html', "http://dev.app"]
        })))
        .pipe(gulpif(options.env == "prod", minifyCSS()))
        .pipe(gulp.dest('public/css')) 
        .pipe(reload({stream:true}));

});

gulp.task('js', function() {

    gulp.src(['src/js/*.js'])
        .pipe(plumber())
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'))
        .on('error', notify.onError({ message: 'JS hint fail'}));   

    return gulp.src([
            // Bootstrap vendor (keep this order)
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/affix.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/carousel.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js', 
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/modal.js',                   
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js', 
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/tab.js',             
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js',
            'vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js', 

            // Custom
            'src/js/*.js'
        ])
        .pipe(gulpif(options.env != "prod", sourcemaps.init()))
        .pipe(concat('main.min.js'))
        .pipe(gulpif(options.env == "prod", uglify()))
        .pipe(gulpif(options.env != "prod", sourcemaps.write('maps')))
        .pipe(gulp.dest('public/js'));   

});

/*gulp.task('fonts', function() {
    return gulp.src(['vendor/font-awesome/fonts/fontawesome-webfont.*'])
            .pipe(gulp.dest('public/fonts'));
});*/

gulp.task('watch', ['js', 'sass'], function() {
    gulp.watch('src/js/*.js', ['js', browserSync.reload]);
    gulp.watch('src/sass/**/*.scss', ['sass']);
    gulp.watch("public/**/*.html").on("change", browserSync.reload);
});

gulp.task('default', ['sass', 'js', /*fonts',*/ 'watch', 'browser-sync']);