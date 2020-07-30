module.exports = function () {
  $.gulp.task('scripts', () => {
    return $.gulp.src('src/js/main.js')
      .pipe($.uglify())
      .pipe($.gulp.dest('build/js'))
      .pipe($.browserSync.stream());
  });
};