/**
 * Created by BiPham on 10/10/2017.
 */
// Include gulp:
var gulp = require('gulp');

// Include plugins:
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync');
var minifyCss = require('gulp-minify-css');
var imagemin = require('gulp-imagemin');

// Compile ...:
gulp.task('first-task', function(){
    console.log("Hello world")
});

// Compile Our CSS
gulp.task('css-both', function () {
    return gulp.src('public/storage/css/*.css')
        .pipe(minifyCss())
        .pipe(gulp.dest('public/css/'));
});

gulp.task('css-admin', function () {
    return gulp.src('public/storage/css/admin/*.css')
        .pipe(minifyCss())
        .pipe(gulp.dest('public/css/admin/'));
});

gulp.task('css-client', function () {
    return gulp.src('public/storage/css/client/*.css')
        .pipe(minifyCss())
        .pipe(gulp.dest('public/css/client/'));
});

// Compile Our JS
gulp.task('js-both', function () {
    return gulp.src('public/storage/js/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/js/'));
});

gulp.task('js-admin', function () {
    return gulp.src('public/storage/js/admin/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/js/admin/'));
});

gulp.task('js-client', function () {
    return gulp.src('public/storage/js/client/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/js/client/'));
});

//Compress img:
gulp.task('images-bg-header', function(){
    return gulp.src('public/storage/imgs/background-header/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('public/imgs/background-header/'))
});

gulp.task('images-banner-page', function(){
    return gulp.src('public/storage/imgs/banner-page/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('public/imgs/banner-page/'))
});

gulp.task('images-original', function(){
    return gulp.src('public/storage/imgs/original/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(imagemin([
            imagemin.gifsicle({interlaced: true}),
            imagemin.jpegtran({progressive: true}),
            imagemin.optipng({optimizationLevel: 5}),
            imagemin.svgo({
                plugins: [
                    {removeViewBox: true},
                    {cleanupIDs: false}
                ]
            })
        ]))
        .pipe(gulp.dest('public/imgs/original/'))
});

//Watch:
gulp.task('watch', function() {
    gulp.watch('public/storage/css/*.css', ['css-both']);
    gulp.watch('public/storage/css/admin/*.css', ['css-admin']);
    gulp.watch('public/storage/css/client/*.css', ['css-client']);
    gulp.watch('public/storage/js/*.js', ['js-both']);
    gulp.watch('public/storage/js/admin/*.js', ['js-admin']);
    gulp.watch('public/storage/js/client/*.js', ['js-client']);
    gulp.watch('public/storage/imgs/background-header/*.+(png|jpg|jpeg|gif|svg)', ['images-bg-header']);
    gulp.watch('public/storage/imgs/banner-page/*.+(png|jpg|jpeg|gif|svg)', ['images-banner-page']);
    gulp.watch('public/storage/imgs/original/*.+(png|jpg|jpeg|gif|svg)', ['images-original']);
});

// Watch Files For Change:
gulp.task('browser-sync', function () {
    var files = [
        'resources/views/**/*.php',
        'public/storage/css/**/*.css',
        'public/storage/imgs/**/*.*',
        'public/storage/js/**/*.js'
    ];

    browserSync.init(files, {
        server: {
            baseDir: ''
        }
    });
});

// Default Task:
gulp.task('default', ['first-task', 'css-both', 'css-admin', 'css-client', 'js-both', 'js-admin', 'js-client']);

gulp.task('compressImages', ['images-bg-header', 'images-original', 'images-banner-page']);