'use strict';

var gulp = require('gulp');
var compass      = require('gulp-compass');
var minifyCSS    = require('gulp-minify-css');
var gzip = require('gulp-gzip');
var notify       = require('gulp-notify');
var gulpif       = require('gulp-if');
var handleErrors = require('../util/handleErrors');

var env = process.env.NODE_ENV || 'development';
var inputDir = 'src';
var outputDir = 'dest';

gulp.task('compass', function() {
    var config = {
        config_file: 'config.rb',
        css: outputDir + '/css',
        sass: inputDir + '/sass',
        sourcemap: env === 'development'
    };

	return gulp.src(inputDir + '/sass/*.scss')
		.pipe(compass(config))
        .on('error', handleErrors)
        .pipe(gulpif(env === 'production', minifyCSS()))
        .pipe(gulpif(env === 'production', gzip()))
        .pipe(gulp.dest(outputDir + '/css'))
        .pipe(notify('CSS compiled, prefixed and minified.'));
});
