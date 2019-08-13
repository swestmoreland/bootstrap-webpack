// require ../../node_modules/jquery/dist/jquery.min.js
// require ../../node_modules/jquery-ui-dist/jquery-ui.min.js
// require popper.js
// require bootstrap
// require swiper
// require lightbox2

var photo_arr = [];


$(document).ready(function () {
//initialize swiper when document ready
var mySwiper = new Swiper ('.cover-swiper .swiper-container.desk-swiper', {
  // Optional parameters
  direction: 'horizontal',
  autoplay: {
    delay: 5000,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  lazy: true,
  loop: true
});

var mySwiper = new Swiper ('.cover-swiper .swiper-container.movil-swiper', {
  // Optional parameters
  direction: 'horizontal',
  autoplay: {
    delay: 10000,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  // Disable preloading of all images
  preloadImages: false,
  // Enable lazy loading
  lazy: true,
  loop: true
});
var mySwiper = new Swiper ('.cover-swiper .swiper-container.oferta-swiper', {
  // Optional parameters
  direction: 'horizontal',
  autoplay: {
    delay: 8000,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
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
  autoplay: {
    delay: 4000,
  },
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

//icon containers logos etc
var swiper = new Swiper('.swiper-container.icon-container', {
  slidesPerView: 5,
  spaceBetween: 10,
  autoplay: {
    delay: 1000,
  },
});

var swiper = new Swiper('.swiper-container.products-swiper', {
  slidesPerView: 5,
  spaceBetween: 50,
  autoplay: {
    delay: 5000,
  },
  loop: true,
  // init: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  breakpoints: {
    1024: {
      slidesPerView: 5,
      spaceBetween: 40,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    }
  }
});

if(photo_arr.length >0 ){
  var chunk = Math.floor( photo_arr.length / 4 );
  var bundles = chunkArray(photo_arr,chunk);
  for (var i = bundles.length - 1; i >= 0; i--) {
    for (var j = bundles[i].length - 1; j >= 0; j--) {
      var size=Math.floor(Math.random() * 3) + 1;  
      $("#collage-gallery #gallery-col-"+(i+1)).append(
        "<a class=\"gallery-grid-img s"+size+"\" data-lightbox=\"galeria\" data-title=\"" +bundles[i][j]["title"]+ "\"  href=\"" +bundles[i][j]["full"]+ "\" style=\"background-image:url("+ bundles[i][j]["thumb"] +")\" > </div>"
        );
    }
  }
}


lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true,
  'imageFadeDuration': 200,
  'alwaysShowNavOnTouchDevices': true
  })

$('.contacto-oferta').click(function(){
  $( ".dock-button" ).toggleClass("bg-high");
  $( ".bottom-dock" ).effect( "shake", {direction:"up",times:4, distance:10}, 1000 );

});

//DOC READY
//show_popup();
/*
$("#contactoExpander").click(function () {
  if($(this).attr("aria-expanded") =="true"){
    $(this).html('<i class="fas fa-hand-pointer"></i>&nbsp; Contactenos')
  }
  else{
    $(this).html('<i class="fas  fa-window-close"></i>&nbsp; Cerrar')
  }
});
*/
});

/**
 * Returns an array with arrays of the given size.
 *
 * @param myArray {Array} Array to split
 * @param chunkSize {Integer} Size of every group
 */
function chunkArray(myArray, chunk_size){
    var results = [];
    
    while (myArray.length) {
        results.push(myArray.splice(0, chunk_size));
    }
    
    return results;
}
