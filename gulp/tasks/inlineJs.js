'use strict';

var gulp = require('gulp');
var replace = require('gulp-replace');
var fs = require('fs');
var notify       = require('gulp-notify');
var rename = require('gulp-rename');
var handleErrors = require('../util/handleErrors');

var inputDir = 'src';
var outputDir = 'dest';

gulp.task('inlineJs', ['browserify', 'browserify-critical'], function() {

	return gulp.src('./views/critical-js-src.twig')
		.pipe(replace(/<script src="dest\/js\/bundle-critical.js"[^>]*><\/script[^>]*>/, function(s) {
	      var script = fs.readFileSync('dest/js/bundle-critical.js', 'utf8');
	      return '<script>\n' + script + '\n</script>';
	  }))
		.pipe(rename('views/critical-js-dest.twig'))
        .pipe(gulp.dest('./'))
        .pipe(notify('JS inlined, MASTER!.'));
});
