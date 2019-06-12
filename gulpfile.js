const gulp = require('gulp');
const sass = require('gulp-sass');
const del = require('del');
//const sourcemaps = require('gulp-sourcemaps');

const paths = {
  src: 'assets',
  dist: 'dist'
}

function clean(cb) {
  return del([paths.dist]);
  cb();
}

function build(cb) {
  cb();
}

exports.default = gulp.series(
  clean,
  build
);
