const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass')); // Configura Dart Sass

// Rutas de entrada y salida
const paths = {
    scss: './src/scss/**/*.scss', // Ruta de los archivos SCSS
    css: './dist/css',            // Carpeta de salida
};

// Tarea para compilar SCSS a CSS
gulp.task('scss', function () {
    return gulp.src(paths.scss)
        .pipe(sass().on('error', sass.logError)) // Manejo de errores
        .pipe(gulp.dest(paths.css));            // Genera el CSS
});

// Tarea para observar cambios
gulp.task('watch', function () {
    gulp.watch(paths.scss, gulp.series('scss'));
});

// Tarea predeterminada
gulp.task('default', gulp.series('scss', 'watch'));
