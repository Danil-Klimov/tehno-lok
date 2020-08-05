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

// reviews slider
  $('.reviews__slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: false,
    nextArrow: '<button class="arrow arrow_md arrow_dark arrow_next" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="9 5.5 0 0 0 11 9 5.5"/></svg></button>',
    prevArrow: '<button class="arrow arrow_md arrow_dark arrow_prev" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="0 5.5 9 0 9 11 0 5.5"/></svg></button>',
  });

// gallery slider
  $('.gallery').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    variableWidth: true,
    autoplay: true,
    centerMode: true
  });

// posts slider
  $('.posts__slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    nextArrow: '<button class="arrow arrow_sm arrow_light arrow_next" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="9 5.5 0 0 0 11 9 5.5"/></svg></button>',
    prevArrow: '<button class="arrow arrow_sm arrow_light arrow_prev" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="0 5.5 9 0 9 11 0 5.5"/></svg></button>',
  });

  svg4everybody();
});
