const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');
const del = require('del');
const gulp = require('gulp');
const sass = require('gulp-sass');
const svgSprite = require('gulp-svg-sprite');

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

function svgs() {
  return gulp
    .src(paths.src + '/svg/single/*')
    .pipe(gulp.dest(paths.dist + '/svg'));
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

function svgSprites() {
  const config = {
    mode: {
      symbol: {
        dest: '.',
        sprite: './sprites.svg'
      }
    }
  };

  return gulp
    .src(paths.src + '/svg/sprites/**/*.svg')
    .pipe(svgSprite(config))
    .pipe(gulp.dest(paths.dist + '/svg'));
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
  gulp.watch(paths.src + '/scss/**/*.scss', scss);
  gulp.watch(paths.src + '/svg/single/**/*.svg', browserSync.reload);
  gulp.watch(paths.src + '/svg/sprites/**/*.svg', gulp.series(svgSprites, reload));
  gulp.watch(markup).on('change', browserSync.reload);
}

exports.clean = clean;

exports.watch = gulp.series(
  gulp.parallel(
    browserSyncInit,
    images,
    svgs,
    svgSprites,
    scss,
    js
  ),
  watch
);

exports.default = gulp.series(
  clean,
  gulp.parallel(
    images,
    svgs,
    svgSprites,
    gulp.series(
      scss,
      cssMinifiy
    ),
    js
  )
);
