'use strict';

const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const jslint = require('gulp-jslint');
const csslint = require('gulp-csslint');

const sass = require('gulp-sass');
sass.compiler = require('node-sass');

gulp.task('default', function(done) {
    console.log('hello world !');
    done();
});