module.exports = function () {
  $.gulp.task('serve', () => {
    $.browserSync.init({
      proxy: $.options.server.proxy
    });
  });
};