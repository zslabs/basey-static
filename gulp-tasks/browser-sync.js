module.exports = function(gulp, $, browserSync, reload, merge, paths, files) {
  return function() {
    browserSync.init({
      server: {
        baseDir: "./"
      }
    });
  };
};