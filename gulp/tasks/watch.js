'use strict';

var gulp = require('gulp');

var inputDir = './src';

gulp.task('watch', ['browserSync'], function() {
	gulp.watch(inputDir + '/sass/**/*.scss', ['compass']);
    gulp.watch(inputDir + '/js/**/*.js', ['browserify']);
	gulp.watch(inputDir + '/img/**', ['images']);
});
