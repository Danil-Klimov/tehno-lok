module.exports = function () {
  $.gulp.task('watch', () => {
    $.gulp.watch('src/resources/**/*.*', $.gulp.series('copy'));
    $.gulp.watch('src/img/**/*.*', $.gulp.series('images'));
    // $.gulp.watch([
    //   'src/img/sprites/png/*.png',
    //   'src/scss/_sprites.hbs',
    // ], $.gulp.series('sprites:png'));
    $.gulp.watch([
      'src/pages/*.pug',
      'src/layouts/*.pug',
      'src/includes/**/*.pug'
    ], $.gulp.series('pug'));
    $.gulp.watch([
      'src/scss/*.scss',
      'src/scss/blocks/*.scss',
      'src/scss/vendor/*.scss',
    ], $.gulp.series('scss'));
    $.gulp.watch('src/js/**/*.js', $.gulp.series('scripts'));
  });
};