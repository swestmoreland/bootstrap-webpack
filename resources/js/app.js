// require ../../node_modules/jquery/dist/jquery.min.js
// require popper.js
// require bootstrap
// require swiper

$(document).ready(function () {
//initialize swiper when document ready
var mySwiper = new Swiper ('.cover-swiper .swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true
});

var galleryThumbs = new Swiper('#woocommerce .gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 4,
  loop: true,
  freeMode: true,
  loopedSlides: 5, //looped slides should be the same
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('#woocommerce .gallery-top', {
  spaceBetween: 10,
  loop:true,
  loopedSlides: 5, //looped slides should be the same
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs,
  },
});

var galleryThumbs = new Swiper('#solutions .gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 4,
  loop: true,
  freeMode: true,
  loopedSlides: 5, //looped slides should be the same
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('#solutions .gallery-top', {
  spaceBetween: 10,
  loop:true,
  loopedSlides: 5, //looped slides should be the same
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: galleryThumbs,
  },
});


});

$(window).scroll(function(){
    if ($(window).scrollTop() >= 100) {
        $('header').addClass('fixed-header');
        $('.header-fill').addClass('fixed-header');
        $('header div').addClass('visible-title');
    }
    else {
        $('header').removeClass('fixed-header');
        $('.header-fill').removeClass('fixed-header');
        $('header div').removeClass('visible-title');
    }
});
