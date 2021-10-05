var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    notify = require('gulp-notify')

gulp.task('styles', function() {
  return sass('assets/scss/style.scss', { style: 'expanded' })
    .pipe(autoprefixer('last 2 version'))
    .pipe(gulp.dest('./'))
    .pipe(cssnano({ discardComments: false }))
    .pipe(gulp.dest('./'))
    .pipe(notify({ message: 'STYLES PREPROCESSED SUCCESSFULLY' }))
})

gulp.task('watch', function() {
  // Watch .scss files
  gulp.watch(['assets/scss/*.scss','assets/scss/**/*.scss'], gulp.parallel('styles'))
})

gulp.task('default', gulp.parallel('styles', 'watch'))