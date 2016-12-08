var gulp          = require('gulp'),
    sourcemaps    = require('gulp-sourcemaps'),
    sass          = require('gulp-sass'),
    scsslint      = require('gulp-scss-lint'),
    autoprefixer  = require('gulp-autoprefixer'),
    concat        = require('gulp-concat'),
    jshint        = require('gulp-jshint'),
    uglify        = require('gulp-uglify'),
    filter        = require('gulp-filter'),
    imagemin      = require('gulp-imagemin'),
    pngquant      = require('imagemin-pngquant'),
    browserSync   = require('browser-sync').create(),
    reload        = browserSync.reload,
    sourcemaps    = require('gulp-sourcemaps'),
    livereload = require('gulp-livereload');

    cp            = require('child_process');

var paths = {
  src: 'src/',
  build: 'dist/'
};

gulp.task('sass', function() {
  gulp.src(paths.src + 'style/**/*.scss')
    .pipe(scsslint());
  return gulp.src(paths.src + 'style/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer({
      browsers: ['last 10 versions', 'ie 9'],
      errLogToConsole: true,
      sync: true
    }))
    .on('error', function(error) { console.log(error.message); })
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.build + 'style'))
    .pipe(livereload());
});

gulp.task('js', function() {
  return gulp.src([paths.src + 'scripts/vendor/**/*.js', paths.src + 'scripts/*.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(paths.build + 'scripts'));
});

gulp.task('images', function() {
  return gulp.src(paths.src + 'images/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{ removeViewBox: false }],
      use: [pngquant()]
    }))
    .pipe(gulp.dest(paths.build + 'images'));
});

gulp.task('fonts', function() {
  return gulp.src(paths.src + 'fonts/**/*')
    .pipe(gulp.dest(paths.build + 'fonts'));
});

gulp.task('watch', function() {
  gulp.watch(paths.src + 'style/**/*.scss', gulp.series('sass'));
  gulp.watch(paths.src + 'scripts/**/*.js', gulp.series('js'));
  gulp.watch(paths.src + 'images/**/*', gulp.parallel('images'));
  gulp.watch(paths.src + 'fonts/**/*', gulp.parallel('fonts'));
});

gulp.task('default', gulp.parallel(gulp.parallel('sass', 'js', 'images', 'fonts'), 'watch'));
