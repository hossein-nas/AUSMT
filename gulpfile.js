var elixir = require('laravel-elixir');

var gulp = require ('gulp');
var sass = require ('gulp-sass');
var autoprefixer = require ('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var compass = require('gulp-compass');


gulp.task('sass',function(){
    gulp.src('resources/assets/sass/cpanel.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 100 version'))
        .pipe(gulp.dest('public/cpanel/css'));
    gulp.src('resources/assets/sass/cpanel.scss')
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(autoprefixer('last 100 version'))
        .pipe(rename('cpanel-min.css'))
        .pipe(gulp.dest('public/cpanel/css'));
});

 
gulp.task('compass', function() {
  gulp.src('resources/assets/sass/main.scss')
    .pipe(compass({
      css: 'public/css',
      sass: 'resources/assets/sass',
      image: 'public/img',
      style: 'compressed'
    }))
    .pipe(autoprefixer('last 100 version'))
    .pipe(gulp.dest('public/css'));
});

gulp.task('minify',function(){
    var jsFiles = 'resources/assets/jsFiles/**/*.js',  
        jsDest = 'public/js';
    gulp.src(jsFiles)
        .pipe(concat('mainjs.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('mainjs-min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

gulp.task('watch',function(){
    gulp.watch('resources/assets/sass/partials/site/**/*.scss', ['compass']);
    gulp.watch(['resources/assets/sass/partials/cpanel/**/*.scss','resources/assets/sass/cpanel.scss'],['sass']);
    gulp.watch('resources/assets/jsFiles/**/*.js', ['minify']);
});

gulp.task('default', ['watch']);