'use strict';

let $ = jQuery.noConflict();

$(document).ready(function () {
// features slider
  $('.features__container').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: false
  });

// our projects slider
  $('.our-projects__body').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    fade: true,
    slide: '.our-projects__inner',
    nextArrow: $(this).find('.arrow_next'),
    prevArrow: $(this).find('.arrow_prev'),
  });

// types slider
  $('.types__slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
  });
  svg4everybody();
});
