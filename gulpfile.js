const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');
const del = require('del');
const gulp = require('gulp');
const replace = require('gulp-replace');
const sass = require('gulp-sass');
const svgSprite = require('gulp-svg-sprite');
const terser = require('gulp-terser');

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

function fonts() {
  return gulp
    .src(paths.src + '/font/**/*')
    .pipe(gulp.dest(paths.dist + '/font'));
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
    .pipe(
      sass({includePaths: ['./node_modules']})
      .on('error', sass.logError)
    )
    .pipe(gulp.dest(paths.dist + '/css'))
    .pipe(browserSync.stream());
}

/**
 * Minifies CSS, and removes any _rules_ (not classes!) between:
 * 'dev-only:start' and 'dev-only:end' tags.
 */
function cssMinifiy() {
  return gulp
    .src(paths.dist + '/css/*.css')
    .pipe(replace(/(\/\* dev-only:start \*\/[^]*\/\* dev-only:end \*\/)/g, ''))
    .pipe(cleanCSS({debug: true}, (details) => {
      var originalSize = details.stats.originalSize + 'B';
      var minifiedSize = details.stats.minifiedSize + 'B';
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

/**
 * Minify and copy JavaScript in main.js (and anything it imports) to /dist
 */
function js() {
  return gulp
    .src(paths.src + '/js/main.js')
    .pipe(
      terser({ keep_fnames: true, mangle: false })
      .on('error', (error) => console.log(error.stack))
    )
    .pipe(gulp.dest(paths.dist + '/js'));
}

/**
 * Copy any already-minified JavaScript libraries etc. over to /dist
 */
function jsLib() {
  return gulp
    .src(paths.src + '/js/*.min.js')
    .pipe(gulp.dest(paths.dist + '/js'));
}

function browserSyncInit(cb) {
  browserSync.init({proxy: 'localhost'});
  cb();
}

function watch(cb) {
  gulp.watch(paths.src + '/scss/**/*.scss', scss);

  gulp.watch(paths.src + '/svg/single/**/*.svg').on('all', (event, path) => {
    svgs();
    switch (event) {
      case 'change': console.log(path + ' changed'); break;
      case 'add': console.log(path + ' added'); break;
      case 'unlink': console.log(path + ' removed'); break;
    }
    browserSync.reload();
  });

  gulp.watch(paths.src + '/svg/sprites/**/*.svg').on('all', (event, path) => {
    svgSprites();
    switch (event) {
      case 'change': console.log(path + ' changed and spritesheet modified'); break;
      case 'add': console.log(path + ' added to spritesheet'); break;
      case 'unlink': console.log(path + ' removed from spritesheet'); break;
    }
    browserSync.reload();
  });

  gulp.watch(markup).on('all', (event, path, stats) => {
    console.log('Markup changed: ' + path);
    browserSync.reload();
  });

  gulp.watch(paths.src + '/js/**/*.js').on('all', (event, path) => {
    console.log('JavaScript changed: ' + path);
    js();
    jsLib();
    browserSync.reload();
  });
}

exports.clean = clean;

exports.watch = gulp.series(
  clean,
  gulp.parallel(
    browserSyncInit,
    fonts,
    images,
    svgs,
    svgSprites,
    scss,
    js,
    jsLib
  ),
  watch
);

exports.default = gulp.series(
  clean,
  gulp.parallel(
    fonts,
    images,
    svgs,
    svgSprites,
    gulp.series(
      scss,
      cssMinifiy
    ),
    js,
    jsLib
  )
);
