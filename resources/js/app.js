// require ../../node_modules/jquery/dist/jquery.min.js
// require popper.js
// require bootstrap
// require swiper

var photo_arr = [];

//Contact open & close
function sleep(ms) {
	return new Promise(resolve => setTimeout(resolve, ms));
}

async function show_popup() {
	await sleep(5000);
	$("#collapseContacto").collapse('show');
	await sleep(3000);
	$("#collapseContacto").collapse('hide');
}

$(document).ready(function () {
//initialize swiper when document ready
var mySwiper = new Swiper ('.cover-swiper .swiper-container.desk-swiper', {
  // Optional parameters
  direction: 'horizontal',
  autoplay: {
    delay: 4000,
  },
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

var galleryThumbs = new Swiper('#solutions .gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 6,
  loop: true,
  freeMode: true,
  loopedSlides: 5, //looped slides should be the same
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('#solutions .gallery-top', {
  spaceBetween: 10,
  autoplay: {
    delay: 2500,
  },
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

if(photo_arr.length >0 ){
  var chunk = Math.floor( photo_arr.length / 4 );
  let bundles = chunkArray(photo_arr,chunk);
  for (var i = bundles.length - 1; i >= 0; i--) {
    for (var j = bundles[i].length - 1; j >= 0; j--) {
      var size=Math.floor(Math.random() * 3) + 1;  
      $("#collage-gallery #gallery-col-"+(i+1)).append(
        "<a class=\"gallery-grid-img s"+size+"\" target=\"_blank\"  href=\"" +bundles[i][j]+ "\" style=\"background-image:url("+ bundles[i][j] +")\" > </a>"
        );
    }
  }
}

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
