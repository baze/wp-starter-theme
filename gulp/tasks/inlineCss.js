'use strict';

var gulp = require('gulp');
var replace = require('gulp-replace');
var fs = require('fs');
var notify       = require('gulp-notify');
var rename = require('gulp-rename');
var handleErrors = require('../util/handleErrors');

var inputDir = 'src';
var outputDir = 'dest';

gulp.task('inlineCss', ['compass'], function() {

	return gulp.src('./views/critical-css-src.twig')
		.pipe(replace(/<link href="dest\/critical.css"[^>]*>/, function(s) {
	      var style = fs.readFileSync('dest/css/critical.css', 'utf8');
	      return '<style>\n' + style + '\n</style>';
	  }))
		.pipe(rename('views/critical-css-dest.twig'))
        .pipe(gulp.dest('./'))
        .pipe(notify('CSS inlined, MASTER!.'));
});
