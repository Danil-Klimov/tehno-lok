module.exports = function () {
  $.gulp.task('scss', () => {
    return $.gulp.src('src/scss/style.scss')
      .pipe($.plugins.if($.options.debug, $.plugins.debug()))
      .pipe($.plugins.if($.options.sourceMaps, $.plugins.sourcemaps.init()))
      .pipe($.plugins.sass())
      // .pipe($.plugins.if(!$.options.sourceMaps, $.plugins.media()))
      .pipe(
        $.options.cssCompress ?
          $.plugins.cssnano({
            autoprefixer: {
              add: true,
              browsers: ['> 0%'],
            },
            discardComments: {
              removeAll: true,
            }
          })
          :
          $.plugins.autoprefixer({
            add: true,
            overrideBrowserslist: ['> 0%'],
          }),
      )
      .pipe($.plugins.if($.options.sourceMaps, $.plugins.sourcemaps.write()))
      .pipe($.gulp.dest('build/css'))
      .pipe($.browserSync.stream());
  });
};