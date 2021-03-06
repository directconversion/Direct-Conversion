var gulp = require('gulp');
var sass1 = require('gulp-ruby-sass');
var sass = require('gulp-sass');
var minify = require('gulp-minify-css');
var prefixer = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var order = require('gulp-order');
var rename = require('gulp-rename');
//var bourbon = require('node-bourbon').includePaths;
//var neat = require('node-neat').includePaths;

gulp.task('default', ['css', 'watch', 'js', 'blog']);

gulp.task('css', function(){
    return gulp.src('./assets/scss/app.scss')
        //.pipe(sass({
        //    includePaths: neat
        //}))
        .pipe(sass())
        .pipe(prefixer('last 15 version'))
        .pipe(gulp.dest('./assets/css/src'))
        .pipe(minify())
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('./assets/css/src'))
        .pipe(notify({message: 'good job guy, css looks sharp!'}));
});

gulp.task('js', function(){
    return gulp.src('./assets/js/*.js')
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/src'))
        .pipe(notify({message: 'good job guy, js looks sharp!'}));

});

gulp.task('blog', function(){
    return gulp.src('./assets/js/blog/*.js')
        .pipe(concat('blog.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/src'))
        .pipe(notify({message: 'good job guy, blog looks sharp!'}));

});

gulp.task('watch', function(){
    gulp.watch('./assets/scss/**/*.scss', ['css']);
    gulp.watch('./assets/js/*.js', ['js']);
    gulp.watch('./assets/js/blog/*.js', ['blog']);
});