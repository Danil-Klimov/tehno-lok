'use strict';

let $ = jQuery.noConflict();

$(document).ready(function () {
// burger menu
  $('.burger__button').on('click', function () {
    $('.burger__menu').fadeToggle().toggleClass('active');
  });
  $('.burger__menu').on('mouseup', function (e) {
    const menu = $(".burger__nav");
    if (!menu.is(e.target) && menu.has(e.target).length === 0) {
      $(this).fadeToggle().toggleClass('active');
    }
  });

// scroll
  $(window).scroll(function () {
    const scroll = $(window).scrollTop();
    if (scroll >= 50) {
      $(".header").addClass("scroll");
    } else {
      $(".header").removeClass("scroll");
    }
  });

// features slider
  $('.features__container').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: false
  });

// our projects slider
  $('.our-projects__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    fade: true,
    slide: '.our-projects__inner',
    nextArrow: '<button class="arrow arrow_md arrow_dark arrow_next" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="9 5.5 0 0 0 11 9 5.5"/></svg></button>',
    prevArrow: '<button class="arrow arrow_md arrow_dark arrow_prev" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="0 5.5 9 0 9 11 0 5.5"/></svg></button>',
  });

  function our_project_img_slider() {
    $('.our-projects__img-slider').each(function () {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        fade: true,
        nextArrow: $(this).find('.arrow_next'),
        prevArrow: $(this).find('.arrow_prev'),
      });
    });
  }

  our_project_img_slider();

  function our_projects_img_slider_w_nav () {
    let slideCount = 0;

    $('.our-projects__img-slider-w-nav').each(function () {
      slideCount++;
      $(this).addClass( 'slider-' + slideCount ).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        fade: true,
        nextArrow: $(this).find('.arrow_next'),
        prevArrow: $(this).find('.arrow_prev'),
        asNavFor: '.our-projects__img-nav.slider-' + slideCount
      });
    });

    slideCount = 0;

    $('.our-projects__img-nav').each(function () {
      slideCount++;
      $(this).addClass( 'slider-' + slideCount ).slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.our-projects__img-slider-w-nav.slider-' + slideCount,
        infinite: false,
        focusOnSelect: true,
        arrows: false,
      });
    });
  }

  our_projects_img_slider_w_nav();

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
    initialSlide: 2,
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

// input tel mask
  $('input[type="tel"]').on('focus', function () {
    $(this).mask("+7(000)000-00-00");
    if ($(this).val().length === 0) {
      $(this).val('+7(');
    }
  });

// numbers slider
  $('.numbers__slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: false,
    nextArrow: '<button class="arrow arrow_sm arrow_light arrow_next" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="9 5.5 0 0 0 11 9 5.5"/></svg></button>',
    prevArrow: '<button class="arrow arrow_sm arrow_light arrow_prev" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="0 5.5 9 0 9 11 0 5.5"/></svg></button>',
  });

// select
  $('.select').on('click', function () {
    $(this).toggleClass('active');
  }).on('blur', function () {
    $(this).removeClass('active');
  });

// TODO разобраться со слайдером
// projects menu slider
  const dataInit = $('.projects-menu__slider').data('init');
  $('.projects-menu__slider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    infinite: false,
    variableWidth: true,
    // draggable: false,
    // initialSlide: dataInit,
    nextArrow: '<button class="arrow arrow_md arrow_dark arrow_next" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="9 5.5 0 0 0 11 9 5.5"/></svg></button>',
    prevArrow: '<button class="arrow arrow_md arrow_dark arrow_prev" type="button">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 11" fill="currentColor">' +
      '<polygon points="0 5.5 9 0 9 11 0 5.5"/></svg></button>',
  });


  $('.projects-menu__slider').slick('slickGoTo', parseInt(dataInit));
  $('.projects-menu__slider .slick-slide').each(function () {
    if(+$(this).attr('data-slick-index') === dataInit) {
      $(this).addClass('active slick-current');
    }
  });

  svg4everybody();
});
