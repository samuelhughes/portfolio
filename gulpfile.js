var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    del = require('del');

gulp.task('default', function() {
    gulp.start(['css', 'js']);
})

gulp.task('css', function() {
    return gulp.src('public_html/styles/scss/main.scss')
        .pipe(sass({ style: 'expanded' }))
        .pipe(autoprefixer('last 2 version'))
        .pipe(rename({suffix: '.min'}))
        .pipe(cssnano())
        .pipe(gulp.dest('public_html/styles/minified/css'))
});

gulp.task('js', function() {
    return gulp.src(['public_html/js/app.js'])
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest('public_html/js/minified'))
});


gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch('public_html/styles/scss/**/*.scss', ['css']);
});