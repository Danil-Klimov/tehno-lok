module.exports = function () {
  $.gulp.task("smart-grid", (sg) => {
    $.smartGrid("./src/scss/mixins/", {
      outputStyle: "scss",
      filename: "_smart-grid",
      columns: 12,
      offset: "30px",
      mobileFirst: false,
      mixinNames: {
        container: "container"
      },
      container: {
        maxWidth: '1140px',
        fields: "15px"
      },
      breakPoints: {
        lg: {
          width: '1200px',
        },
        md: {
          width: '992px'
        },
        sm: {
          width: '768px',
        },
        xs: {
          width: '575px'
        }
      }
    });
    sg();
  });
};