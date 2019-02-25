var properties = {
  port: 8080, // LiveReload server port
  folders: {
    build: '../public/theme', // Deploy folder
    src: 'source', // Dev folder
  }
};

var plugins = {
  js: [
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/slick-carousel/slick/slick.min.js',
    'bower_components/jquery-validation/dist/jquery.validate.min.js',
    'bower_components/jquery-validation/dist/additional-methods.min.js',
    'bower_components/jquery-validation/src/localization/messages_ru.js',
    'bower_components/jquery-mask-plugin/dist/jquery.mask.min.js',
    'bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js','bower_components/oauth-js/dist/oauth.min.js'
  ],
  css: [
    'bower_components/normalize-scss/normalize.css',
    'bower_components/slick-carousel/slick/slick.css',
    'bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'
  ]
};

var
  gulp = require('gulp'),
  connect = require('gulp-connect'),
  sourcemaps = require('gulp-sourcemaps'),
  concat = require('gulp-concat'),
  jade = require('gulp-pug'),
  sass = require('gulp-sass'),
  prefix = require('gulp-autoprefixer'),
  babel = require('gulp-babel'),
  minifyCSS = require('gulp-minify-css'),
  watch = require('gulp-watch');

function onError(err) {
  console.log(err);
  this.emit('end');
}

gulp.task('scripts', function() {
  return gulp.src([
      //properties.folders.src + '/scripts/funcName.js',
      properties.folders.src + '/scripts/app.js',

    ])
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(babel())
    .on('error', onError)
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(properties.folders.build + '/scripts'))
    .pipe(connect.reload());
});

gulp.task('vendor', function () {
	gulp.src(plugins.css)
	  .pipe(concat('vendor.css'))
	  .pipe(gulp.dest(properties.folders.build + '/styles/'));
	gulp.src(plugins.js)
    .pipe(concat('vendor.js'))
    .pipe(gulp.dest(properties.folders.build + '/scripts/'));
});

gulp.task('jade', function() {
	gulp.src(properties.folders.src + '/views/*.pug')
		.pipe(jade({
			pretty: true
		}))
    .on('error', onError)
		.pipe(gulp.dest(properties.folders.build))
    .on('end', function(){
      gulp.src(properties.folders.build + '/**/*.html')
        .pipe(connect.reload());
    });
});

gulp.task('sass', function () {
	gulp.src(properties.folders.src + '/styles/main.scss')
    .pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(prefix("last 3 version", "> 1%", "ie 8", "ie 7"))
    .pipe(sourcemaps.write('.'))
    .pipe(minifyCSS({
        keepBreaks: false // New rule will have break if 'true'
      }))
		.pipe(gulp.dest(properties.folders.build + '/styles'))
		.pipe(connect.reload());
});

gulp.task('server', function() {
  connect.server({
    port: properties.port,
		root: properties.folders.build,
		livereload: true
	});
});

gulp.task('watch', function() {
	watch(properties.folders.src + '/views/**/*.pug', function() {
    gulp.start('jade');
	});
	watch(properties.folders.src + '/styles/**/*.scss', function() {
    gulp.start('sass');
	});
	watch(properties.folders.src + '/scripts/**/*.js', function() {
    gulp.start('scripts');
	});
});

gulp.task('default', ['server', 'jade', 'scripts', 'vendor', 'sass', 'watch']);
