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
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.features__next',
      prevEl: '.features__prev',
    },
    breakpoints: {
      575: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      992: {
        slidesPerView: 5,
      }
    }
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
  function news_slider() {
    $('.news__slider').each(function () {
      let newsSlider = new Swiper(this, {
        loop: false,
        spaceBetween: 30,
        centerInsufficientSlides: true,
        watchOverflow: true,
        navigation: {
          nextEl: this.parentElement.querySelector('.news__next'),
          prevEl: this.parentElement.querySelector('.news__prev'),
        },
        breakpoints: {
          575: {
            slidesPerView: 2,
          },
          992: {
            slidesPerView: 3,
          }
        }
      });
    })
  }

  news_slider();

// reviews slider
  const reviewsSlider = new Swiper('.reviews__slider', {
    loop: false,
    spaceBetween: 0,
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.reviews__next',
      prevEl: '.reviews__prev',
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
      },
      769: {
        slidesPerView: 'auto',
        spaceBetween: 34,
      },
      992: {
        slidesPerView: 'auto',
        spaceBetween: 34,
      },
      1200: {
        slidesPerView: 'auto',
        spaceBetween: 19,
      }
    }
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
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.posts__next',
      prevEl: '.posts__prev',
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 90,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 80,
      }
    }
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
    centerInsufficientSlides: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.numbers__next',
      prevEl: '.numbers__prev',
    },
    breakpoints: {
      575: {
        slidesPerView: 2,
      },
      768: {
       slidesPerView: 5,
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 30,
      }
    }
  });

// select
  $('.select').on('click', function () {
    $(this).toggleClass('active');
  }).on('blur', function () {
    $(this).removeClass('active');
  });

// projects menu slider
  const dataInit = $('.projects-menu__slider').data('init');
  let projectMenuSlider;
  $('.projects-menu__slider').each(function () {
		projectMenuSlider = new Swiper(this, {
			direction: 'horizontal',
			loop: false,
			slidesPerView: 3,
			navigation: {
				nextEl: this.nextElementSibling,
				prevEl: this.previousElementSibling,
			},
			breakpoints: {
				768: {
					slidesPerView: 4,
				},
				992: {
					slidesPerView: 6,
				}
			}
		});
	});

  if(projectMenuSlider && projectMenuSlider.initialized) {
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
    if(!link) {
      return
    }
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
  $(window).on('load resize', function () {
    if($(window).width() > 992) {
      $('.faq__answer').mCustomScrollbar();
    } else {
      $('.faq__answer').mCustomScrollbar('destroy');
    }
  })

  $('.faq__question').on('click', function () {
    const currentAnswer = $(this).siblings('.faq__answer');
    $(this).addClass('active');
    $('.faq__question').not(this).removeClass('active');
    if($(window).width() > 992) {
      $('.faq__answer').not(currentAnswer).fadeOut();
      currentAnswer.fadeIn();
    } else {
      $('.faq__answer').not(currentAnswer).slideUp();
      currentAnswer.slideDown();
    }

  });

// team tabs
  let Tabs = {

    init: function() {
      this.bindUIfunctions();
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
      tab.closest(".team__tabs").removeClass("open");

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
        centerInsufficientSlides: true,
        watchOverflow: true,
        navigation: {
          nextEl: this.parentElement.querySelector('.arrow_next'),
          prevEl: this.parentElement.querySelector('.arrow_prev'),
        },
        breakpoints: {
          575: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
          1200: {
            slidesPerView: 4,
          }
        }
      });
    });
  }

  team_slider();

// office slider
  const officeSlider = new Swiper('.office__slider', {
    loop: false,
    slidesPerView: 1,
    centerInsufficientSlides: true,
    watchOverflow: true,
    freeMode: true,
    autoplay: {
      delay: 4000
    },
    speed: 1000
  });

  $('form[data-name]').on('submit', function (e) {
    e.preventDefault();
    const form = $(this);
    const file = $('#file');
    let formData = new FormData(form.get(0));

    if (form.data('name')) {
      formData.append('form_name', form.data('name'));
    } else {
      return;
    }

    if (file) {
      formData.append('post_id', file);
    }

    $.ajax({
      type: 'POST',
      url: window.wp_data.ajax_url + '?action=send_mail',
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      success: function () {
        form.trigger("reset");
        $('.file-name').html('');
        $.fancybox.open({
          src: '<div><p>Спасибо за заявку!</p><p>С Вами свяжутся в ближайшее время.</p></div>',
          type: 'inline',
          modal: true
        });
        setTimeout(function () {
          $.fancybox.close(true);
        }, 2000);
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR, textStatus, errorThrown);
      }
    });
  });

// filter
  $('#filter .select').on('change', function () {
    const filter = $(this);
    $.ajax({
      type: 'POST',
      data: filter.parent().serialize(),
      dataType : 'json',
      url: window.wp_data.ajax_url + '?action=ajax_filter',
      beforeSend: function(xhr){
        // filter.find('.button').text('Загружаю...');
      },
      success: function(data){
        current_page = 1;
        posts = data.posts;
        max_pages = data.max_page;
        // filter.find('.button').text('Применить');
        $('#projects').html(data.content);
        if ( data.max_page < 2 ) {
          $('.posts__button').hide();
        } else {
          $('.posts__button').show();
        }
        our_projects_img_slider_w_nav();
      }
    });
    return false;
  });

  // show more posts
  $('.posts__button').click(function(){
    $(this).text('Загружаю...');
    let data = {
      'action': 'loadmore',
      'query': posts,
      'page' : current_page,
      'parent' : parent,
    };
    $.ajax({
      url:ajaxurl,
      data:data,
      type:'POST',
      success:function(data){
        if( data ) {
          $('.posts__button').text('ПОКАЗАТЬ ЕЩЕ');
          $('#projects').append(data);
          current_page++;
          if (current_page == max_pages) $(".posts__button").remove();
        } else {
          $('.posts__button').remove();
        }
      }
    });
  });

// cases sliders
	$('.cases__case').each(function () {
		const section = $(this);
		const casesNav = new Swiper(this.querySelector('.cases__gallery'), {
			loop: false,
			slidesPerView: 6,
			watchSlidesProgress: true,
			spaceBetween: 30,
			centerInsufficientSlides: true,
			navigation: {
				nextEl: this.querySelector('.cases__gallery-wrap .arrow_next'),
				prevEl: this.querySelector('.cases__gallery-wrap .arrow_prev'),
			},
			breakpoints: {
				576: {
					slidesPerView: 4,
				},
				769: {
					slidesPerView: 5,
				},
				993: {
					slidesPerView: 6,
				}
			}
		});

		const casesMain = new Swiper(this.querySelector('.cases__img'), {
			loop: false,
			slidesPerView: 1,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			thumbs: {
				swiper: casesNav
			},
			simulateTouch: false,
			navigation: {
				nextEl: this.querySelector('.cases__img-wrap .arrow_next'),
				prevEl: this.querySelector('.cases__img-wrap .arrow_prev'),
			},
		});

		casesMain.on('slideChange', function (swiper) {
			section.find('.cases__description.active').removeClass('active');
			section.find('.cases__description').eq(swiper.activeIndex).addClass('active');
		});
	});
});
