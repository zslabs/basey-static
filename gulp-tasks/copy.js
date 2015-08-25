module.exports = function(gulp, $, browserSync, reload, merge, paths, files) {
  return function() {
    gulp.src('bower_components/uikit/src/fonts/*')
    .pipe($.changed(paths.fonts.build))
    .pipe(gulp.dest(paths.fonts.build));
  };
};