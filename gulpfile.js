'use strict';

const gulp = require('gulp'),
	browserSync = require('browser-sync').create(),
	sass = require('gulp-sass')(require('sass')),
	postcss = require('gulp-postcss'),
	uglify = require('gulp-uglify'),
	rename = require('gulp-rename'),
	newer = require('gulp-newer');

// Styles
function mainStyles() {
	return gulp.src('assets/scss/style.scss')
		.pipe(sass.sync({
			outputStyle: 'expanded'
		}).on('error', sass.logError))
		.pipe(postcss([
			require('autoprefixer')(),
			require('postcss-sort-media-queries')(),
			require('postcss-csso')()
		]))
		.pipe(gulp.dest('./'))
		.pipe(browserSync.stream());
}

function blocksStyles() {
	return gulp.src('template-parts/**/*.scss')
		.pipe(newer({
			dest: 'template-parts',
			ext: '.css'
		}))
		.pipe(sass.sync({
			outputStyle: 'expanded'
		}).on('error', sass.logError))
		.pipe(postcss([
			require('autoprefixer')(),
			require('postcss-sort-media-queries')(),
			require('postcss-csso')({
				comments: false
			})
		]))
		.pipe(gulp.dest('template-parts'))
		.pipe(browserSync.stream());
}

// Scripts
function mainScripts() {
	return gulp.src('assets/js/main.js')
		.pipe(uglify())
		.pipe(rename("main.min.js"))
		.pipe(gulp.dest('assets/js/'))
		.pipe(browserSync.stream());
}

function blocksScripts() {
	return gulp.src([
		'template-parts/**/*.js',
		'!template-parts/**/*.min.js'
	])
		.pipe(newer({
			dest: 'template-parts',
			ext: '.min.js'
		}))
		.pipe(uglify())
		.pipe(rename({
			extname: '.min.js'
		}))
		.pipe(gulp.dest('template-parts'))
		.pipe(browserSync.stream());
}

// Server
function serve() {
	browserSync.init({
		proxy: 'tehno-lok.loc'
	});
}

// Watcher
function watch() {
	gulp.watch('./**/*.php').on('change', browserSync.reload);
	gulp.watch('assets/images/*.*').on('change', browserSync.reload);
	gulp.watch('assets/scss/**/*.scss', mainStyles);
	gulp.watch('template-parts/**/*.scss', blocksStyles);
	gulp.watch('assets/js/main.js', mainScripts);
	gulp.watch(['template-parts/**/*.js', '!template-parts/**/*.min.js'], blocksScripts);
}

exports.build = gulp.parallel(
	mainStyles,
	blocksStyles,
	mainScripts,
	blocksScripts
);
exports.default = gulp.series(
	this.build,
	gulp.parallel(
		serve,
		watch
	)
);
