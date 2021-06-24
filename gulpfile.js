'use strict';

global.$ = {
	gulp: require('gulp'),
	plugins: require('gulp-load-plugins')({
		rename: {
			'gulp-group-css-media-queries': 'media',
		}
	}),
	browserSync: require('browser-sync').create(),
	uglify: require('gulp-uglify-es').default,
	mozjpeg: require('imagemin-mozjpeg'),
	smartGrid: require('smart-grid'),
	path: require('./gulp/tasks.js'),
	options: {
		debug: true,
		cache: true,
		htmlCompress: false,
		cssCompress: true,
		sourceMaps: false,
		libs: [
			'node_modules/svg4everybody/dist/svg4everybody.min.js',
			'node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
			'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
			'node_modules/swiper/swiper-bundle.min.js',
			'node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'
		],
		server: {
			proxy: 'adem/tehnolok.wp/build'
		}
	},
};

$.path.forEach(function (taskPath) {
	require(taskPath)();
});

$.gulp.task('build', $.gulp.series(
	$.gulp.parallel(
		'copy',
		'images',
		// 'sprites:png',
		'pug',
		'smart-grid',
		'scss',
		'libs',
		'scripts',
	)
));

$.gulp.task('default', $.gulp.series(
	'build',
	$.gulp.parallel(
		'watch',
		'serve'
	)
));





//
// gulp.task('sprites:png', () => {
// 	const spritesData = gulp.src('src/img/sprites/png/*.png')
// 		.pipe(IF(options.debug, debug()))
// 		.pipe(spritesmith({
// 			cssName: '_sprites.scss',
// 			// cssTemplate: 'src/scss/_sprites.hbs',
// 			imgName: '../img/sprites.png',
// 			retinaImgName: '../img/sprites@2x.png',
// 			retinaSrcFilter: 'src/img/sprites/png/*@2x.png',
// 			padding: 2,
// 		}));
// 	return mergeStream(
// 		spritesData.img
// 			.pipe(vinylBuffer())
// 			.pipe(imagemin())
// 			.pipe(gulp.dest('build/img')),
// 		spritesData.css
// 			.pipe(gulp.dest('src/scss'))
// 	);
// });
