const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');
const del = require('del');
const gulp = require('gulp');
const sass = require('gulp-sass');

const paths = {
  src: 'assets',
  dist: 'dist'
}

const markup = [
  '**/*.html',
  '**/*.php'
]

function clean(cb) {
  return del([paths.dist]);
  cb();
}

function images() {
  return gulp
    .src(paths.src + '/img/*')
    .pipe(gulp.dest(paths.dist + '/img'));
}

function scss() {
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

function watch(cb) {
  gulp.watch(paths.src + '/scss/**/*.scss', scss);
  gulp.watch(markup).on('change', browserSync.reload);
}

exports.clean = clean;

exports.watch = gulp.series(
  gulp.parallel(
    browserSyncInit,
    images,
    scss,
    js
  ),
  watch
);

exports.default = gulp.series(
  clean,
  gulp.parallel(
    images,
    gulp.series(
      scss,
      cssMinifiy
    ),
    js
  )
);
