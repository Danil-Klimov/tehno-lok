module.exports = function () {
  $.gulp.task('pug', () => {
    return $.gulp.src('src/pages/*.pug')
      .pipe($.plugins.pug({
        pretty: !$.options.htmlCompress
      }))
      .pipe($.plugins.if($.options.debug, $.plugins.debug()))
      .pipe($.gulp.dest('build'))
      .pipe($.browserSync.stream());
  });
};