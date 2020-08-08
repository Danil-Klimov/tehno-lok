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
  const featuresSlider = new Swiper('.features__slider', {
    loop: false,
    slidesPerView: 5,
    centerInsufficientSlides: true,
    watchOverflow: true
  });

// our projects slider
  const ourProjectsSlider = new Swiper('.our-projects__slider', {
    loop: false,
    slidesPerView: 1,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    navigation: {
      nextEl: '.our-projects__next',
      prevEl: '.our-projects__prev',
    },
  });

  function our_project_img_slider() {
      $('.our-projects__img-slider').each(function () {
        let ourProjectsImgSlider = new Swiper(this, {
          loop: false,
          slidesPerView: 1,
          effect: 'fade',
          fadeEffect: {
            crossFade: true
          },
          navigation: {
            nextEl: this.querySelector('.arrow_next'),
            prevEl: this.querySelector('.arrow_prev'),
          },
        });
      });
    }

  our_project_img_slider();

  function our_projects_img_slider_w_nav () {
    $('.our-projects__img').each(function () {
      let ourProjectsImgSliderNav = new Swiper(this.querySelector('.our-projects__img-nav'), {
        loop: false,
        slidesPerView: 4,
        watchSlidesProgress: true,
        spaceBetween: 5,
        centerInsufficientSlides: true
      });

      let ourProjectsImgSliderWNav = new Swiper(this.querySelector('.our-projects__img-slider-w-nav'), {
        loop: false,
        slidesPerView: 1,
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        navigation: {
          nextEl: this.querySelector('.arrow_next'),
          prevEl: this.querySelector('.arrow_prev'),
        },
        thumbs: {
          swiper: ourProjectsImgSliderNav
        }
      });
    });
  }

  our_projects_img_slider_w_nav();

// types slider
  const typesSlider = new Swiper('.types__slider', {
    loop: false,
    slidesPerView: 3,
    spaceBetween: 30,
    centerInsufficientSlides: true,
    watchOverflow: true
  });

// reviews slider
  const reviewsSlider = new Swiper('.reviews__slider', {
    loop: false,
    slidesPerView: 'auto',
    spaceBetween: 19,
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.reviews__next',
      prevEl: '.reviews__prev',
    },
  });

// gallery slider
  const gallerySlider = new Swiper('.gallery', {
    loop: true,
    slidesPerView: 'auto',
    centerInsufficientSlides: true,
    watchOverflow: true,
    autoplay: true,
    centeredSlides: true,
    freeMode: true
  });

// posts slider
  const postsSlider = new Swiper('.posts__slider', {
    loop: false,
    slidesPerView: 3,
    spaceBetween: 80,
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.posts__next',
      prevEl: '.posts__prev',
    },
  });

// input tel mask
  $('input[type="tel"]').on('focus', function () {
    $(this).mask("+7(000)000-00-00");
    if ($(this).val().length === 0) {
      $(this).val('+7(');
    }
  });

// numbers slider
  const numbersSlider = new Swiper('.numbers__slider', {
    loop: false,
    slidesPerView: 6,
    spaceBetween: 30,
    centerInsufficientSlides: true,
    watchOverflow: true,
  });

// select
  $('.select').on('click', function () {
    $(this).toggleClass('active');
  }).on('blur', function () {
    $(this).removeClass('active');
  });

// projects menu slider
  const dataInit = $('.projects-menu__slider').data('init');
  const projectMenuSlider = new Swiper('.projects-menu__slider', {
    direction: 'horizontal',
    loop: false,
    slidesPerView: 6,
    navigation: {
      nextEl: '.projects-menu__next',
      prevEl: '.projects-menu__prev',
    },
  });

  if(projectMenuSlider.initialized) {
    projectMenuSlider.slideTo(dataInit);
    projectMenuSlider.slides[dataInit].classList.add('active');
  }

  svg4everybody();
});
