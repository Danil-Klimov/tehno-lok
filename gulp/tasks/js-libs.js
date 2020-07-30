module.exports= function () {
  $.gulp.task('libs', () => {
    return $.gulp.src($.options.libs)
      .pipe($.plugins.concat('libs.min.js'))
      .pipe($.gulp.dest('build/js'))
  })
};