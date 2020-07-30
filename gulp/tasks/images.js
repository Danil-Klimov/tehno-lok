module.exports = function () {
  $.gulp.task('images', () => {
    return $.gulp.src('src/img/**/*.*')
      .pipe($.plugins.if($.options.cache, $.plugins.newer('build/img')))
      .pipe($.plugins.if($.options.debug, $.plugins.debug()))
      .pipe($.plugins.imagemin([
        $.plugins.imagemin.gifsicle({
          interlaced: true,
        }),
        $.plugins.imagemin.optipng({
          optimizationLevel: 3,
        }),
        $.mozjpeg({
          progressive: true,
          quality: 80,
        }),
      ]))
      .pipe($.gulp.dest('build/img'));
  });
};


// gulp.task('optimize:images', () => {
// 	return gulp.src('src/img/**/*.*')
// 		.pipe(IF(options.debug, debug()))
// 		.pipe(imagemin([
// 			imagemin.gifsicle({
// 				interlaced: true,
// 			}),
// 			imagemin.optipng({
// 				optimizationLevel: 3,
// 			}),
// 			imageminMozjpeg({
// 				progressive: true,
// 				quality: 80,
// 			}),
// 		]))
// 		.pipe(gulp.dest('build/img'));
// });