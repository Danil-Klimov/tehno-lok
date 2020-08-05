'use strict';

let $ = jQuery.noConflict();

$(document).ready(function () {
// features slider
  $('.features__container').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: false
  });
  svg4everybody();
});
