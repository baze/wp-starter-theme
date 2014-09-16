'use strict';

var browserSync = require('browser-sync');
var gulp        = require('gulp');

var outputDir = 'dest';

gulp.task('browserSync', ['build'], function() {
    browserSync.init([outputDir + "/css/**", outputDir + "/js/**"], {
        //server: {
        //    baseDir: 'public'
        //}
        //host: "mt.dev",
        proxy: '127.0.0.1:8080'
    });
});
