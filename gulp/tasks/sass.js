'use strict';

var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var autoprefix = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var handleErrors = require('../util/handleErrors');

var env = process.env.NODE_ENV || 'development';
var inputDir = 'src';
var outputDir = 'dest';

gulp.task('sass', function () {

    var config = {
        style: 'compressed'
    };

    return gulp.src(inputDir + '/sass/*.scss')
        .pipe(sass(config))
        .on('error', handleErrors)
        .pipe(autoprefix('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
        .pipe(gulp.dest(outputDir + '/css'))
        .pipe(notify('CSS compiled, prefixed and minified.'));

});

