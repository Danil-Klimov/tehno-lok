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

// news slider
  const newsSlider = new Swiper('.news__slider', {
    loop: false,
    slidesPerView: 3,
    spaceBetween: 30,
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.news__next',
      prevEl: '.news__prev',
    },
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

// video
  function findVideos() {
    const videos = document.querySelectorAll('.video');

    for (let i = 0; i < videos.length; i++) {
      setupVideo(videos[i]);
    }
  }

  function setupVideo(video) {
    const link = video.querySelector('.video__link');
    const button = video.querySelector('.video__button');
    const id = parseLinkURL(link);

    video.addEventListener('click', () => {
      const iframe = createIframe(id);

      link.remove();
      button.remove();
      video.appendChild(iframe);
    });

    link.removeAttribute('href');
    video.classList.add('video_enabled');
  }

  function parseLinkURL(link) {
    const regexp = /[a-zA-Z0-9_-]+$/;
    const url = link.href;
    const match = url.match(regexp);

    return match[0];
  }

  function createIframe(id) {
    const iframe = document.createElement('iframe');

    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture');
    iframe.setAttribute('src', generateURL(id));
    iframe.classList.add('video__media');

    return iframe;
  }

  function generateURL(id) {
    const query = '?rel=0&showinfo=0&autoplay=1';

    return 'https://www.youtube.com/embed/' + id + query;
  }

  findVideos();

// interview slider
  const interviewSlider = new Swiper('.interview__slider', {
    loop: false,
    slidesPerView: 1,
    navigation: {
      nextEl: '.interview__next',
      prevEl: '.interview__prev',
    },
  });

// faq
  $('.faq__answer').mCustomScrollbar();

  $('.faq__question').on('click', function () {
    const currentItem = $(this).siblings('.faq__answer');
    $('.faq__answer').not(currentItem).fadeOut();

    currentItem.fadeIn();
  });

// team tabs
  // tabs
  let Tabs = {

    init: function() {
      this.bindUIfunctions();
      this.pageLoadCorrectTab();
    },

    bindUIfunctions: function() {

      // Delegation
      $(document)
        .on("click", ".team__tab:not('.active')", function(event) {
          Tabs.changeTab(this.hash);
          event.preventDefault();
        })
        .on("click", ".team__tab.active", function(event) {
          Tabs.toggleMobileMenu(event, this);
          event.preventDefault();
        });
    },

    changeTab: function(hash) {
      let tab = $("[href='" + hash + "']");
      let tabContent = $(hash);

      // activate correct anchor (visually)
      tab.addClass("active").siblings().removeClass("active");

      // activate correct div (visually)
      tabContent.addClass("active").siblings('.team__container').removeClass("active");
      team_slider();

      // update URL, no history addition
      window.history.replaceState("", "", hash);

      // Close menu, in case mobile
      tab.closest("ul").removeClass("open");

    },

    // If the page has a hash on load, go to that tab
    pageLoadCorrectTab: function() {
      this.changeTab(document.location.hash);
    },

    toggleMobileMenu: function(event, el) {
      $(el).closest(".team__tabs").toggleClass("open");
    }

  };

  Tabs.init();

// team slider
  function team_slider() {
    $('.team__slider').each(function () {
      let teamSlider = new Swiper(this, {
        loop: false,
        slidesPerView: 4,
        centerInsufficientSlides: true,
        watchOverflow: true,
        navigation: {
          nextEl: this.parentElement.querySelector('.arrow_next'),
          prevEl: this.parentElement.querySelector('.arrow_prev'),
        },
      });
    });
  }

  team_slider();
  svg4everybody();
});
