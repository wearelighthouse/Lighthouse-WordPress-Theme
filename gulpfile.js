const browserSync = require('browser-sync');
const cleanCSS = require('gulp-clean-css');
const del = require('del');
const gulp = require('gulp');
const sass = require('gulp-sass');

const paths = {
  src: 'assets',
  dist: 'dist'
}

const markup = [
  paths.src + '*.html',
  paths.src + '*.php'
]

function clean(cb) {
  return del([paths.dist]);
  cb();
}

function cssTranspile() {
  return gulp
    .src([paths.src + '/scss/style.scss'])
    .pipe(sass({includePaths: ['./node_modules']})
    .on("error", sass.logError))
    .pipe(gulp.dest(paths.dist + '/css'))
    .pipe(browserSync.stream());
}

function cssMinifiy() {
  return gulp
    .src(paths.dist + '/css/*.css')
    .pipe(cleanCSS({debug: true}, (details) => {
      var originalSize = Math.round(details.stats.originalSize / 1000) + 'KB';
      var minifiedSize = Math.round(details.stats.minifiedSize / 1000) + 'KB';
      console.log(`Minified ${details.name} from ${originalSize} to ${minifiedSize}`);
    }))
    .pipe(gulp.dest(paths.dist + '/css'));
}

function js(cb) {
  cb();
}

function browserSyncInit(cb) {
  browserSync.init({proxy: 'localhost'});
  cb();
}

function reload(cb) {
  browserSync.reload();
  cb();
}

function watch(cb) {
  gulp.watch(paths.src + '/scss/*.scss', cssTranspile);
  gulp.watch(markup).on('change', browserSync.reload);
}

exports.clean = clean;

exports.watch = gulp.series(
  gulp.parallel(
    browserSyncInit,
    cssTranspile,
    js
  ),
  watch
);

exports.default = gulp.series(
  clean,
  gulp.parallel(
    gulp.series(
      cssTranspile,
      cssMinifiy
    ),
    js
  )
);
