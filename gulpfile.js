/**
 * Created by BiPham on 10/10/2017.
 */
// Include gulp:
var gulp = require('gulp');

// Include plugins:
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var browserSync = require('browser-sync');
var minifyCss = require('gulp-minify-css');

// Compile ...:
gulp.task('first-task', function(){
    console.log("Hello world")
});

// Watch Files For Change:
gulp.task('browser-sync', function () {
    var files = [

    ];

    browserSync.init(files, {
        server: {
            baseDir: './app'
        }
    });
});

// Default Task:
gulp.task('default', ['first-task', 'browser-sync']);