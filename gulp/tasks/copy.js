module.exports = function () {
  $.gulp.task('copy', () => {
    return $.gulp.src('src/resources/**/*.*')
      .pipe($.plugins.if($.options.cache, $.plugins.newer('build')))
      .pipe($.plugins.if($.options.debug, $.plugins.debug()))
      .pipe($.gulp.dest('build'));
  });
};