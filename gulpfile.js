//  requires

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const zip = require('gulp-zip');
var themeName = 'dev-theme';

//  vendor prefixes

const autoprefixerOptions = {
    browsers: [
        'last 4 version',
        'safari 5',
        'ie 7', 'ie 8', 'ie 9',
        'opera 12.1',
        'ios 6', 'android 4'
    ]
};

//  sass processing

gulp.task('sass', function () {
  return gulp.src(themeName + '/css/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest(themeName + '/css/'));
});

//  zip the theme

gulp.task('zipAll', function(){
    gulp.src([themeName + '/**', '!' + themeName + '/**.zip'])
        .pipe(zip(themeName + '.zip'))
        .pipe(gulp.dest('./' + themeName + '/zip'))
});

//  watch task

gulp.task('default', ['sass', 'watch', 'zipAll']);
gulp.task('watch', function() {
    gulp.watch(themeName + '/css/sass/*.scss',['sass']);
})
