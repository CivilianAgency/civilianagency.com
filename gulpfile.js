var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    scsslint      = require('gulp-scss-lint'),
    autoprefixer  = require('gulp-autoprefixer'),
    jshint        = require('gulp-jshint'),
    rename        = require('gulp-rename'),
    concat        = require('gulp-concat'),
    uglify        = require('gulp-uglify'),
    imagemin      = require('gulp-imagemin'),
    pngquant      = require('imagemin-pngquant'),
    filter        = require('gulp-filter'),
    browserSync   = require('browser-sync');

gulp.task('browser-sync', function() {
  browserSync({
    server: {
      baseDir: './'
    },
    open: false
  });
});

gulp.task('scss-lint', function() {
  return gulp.src('assets/src/style/**/*.scss')
    .pipe(scsslint());
});

gulp.task('sass', function() {
  return gulp.src('assets/src/style/*.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer({
      browsers: ['last 10 versions', 'ie 9', 'ie 8'],
      errLogToConsole: true,
      sync: true
    }))
    .on('error', function(error) { console.log(error.message); })
    .pipe(gulp.dest('assets/dist/style'))
    .pipe(filter('**/*.css'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('lint', function() {
  return gulp.src('assets/src/scripts/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

gulp.task('minify', function() {
  return gulp.src('assets/src/scripts/**/*.js')
    .pipe(concat('all.js'))
    .pipe(gulp.dest('assets/dist/scripts'))
    .pipe(rename('all.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/dist/scripts'));
});

gulp.task('imagemin', function() {
  return gulp.src('assets/images/**/*')
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{ removeViewBox: false }],
      use: [pngquant()]
    }));
});

gulp.task('bs-reload', function() {
  browserSync.reload();
});

gulp.task('default', ['scss-lint', 'sass', 'lint', 'minify', 'imagemin', 'browser-sync'], function() {
  gulp.watch('assets/src/style/**/*.scss', ['scss-lint', 'sass']);
  gulp.watch('assets/src/scripts/**/*.js', ['lint', 'minify']);
  gulp.watch('assets/images/**/*', ['imagemin']);
  gulp.watch('*.html', ['bs-reload']);
});
