jQuery(document).ready(function ($) {

  //open lang list
  $(document).on('click', '.lang-wrap>a', function (e){
    e.preventDefault();
    $(this).toggleClass('is-open')
  });

  //scroll down
  $(document).on('click', '.scroll-down a', function () {
    var win = $(window).height();
    $('body,html').animate({
      scrollTop: win
    }, 800);
    return false;
  });

  //slider
  var swiperImg = new Swiper(".img-slider", {
    slidesPerView: "auto",
    spaceBetween: 10,
    pagination: {
      el: ".img-pagination",
      type: "progressbar",
    },
    navigation: {
      nextEl: ".img-next",
      prevEl: ".img-prev",
    },
    breakpoints: {
      576: {
        spaceBetween: 30,
      },

    },
  });


/*  //hide img
  $(document).on('click','.video-media .video-wrap .wrap figure', function (e){
    e.preventDefault()
    $(this).hide();
  });*/

  var swiper3x = new Swiper(".slider-3x", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".pagination-3x",
      clickable: true,
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  /* mob-menu*/
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $.fancybox.open( $('#menu-responsive'), {
      touch:false,
      autoFocus:false,
    });
    setTimeout(function() {
      $('html').addClass('is-menu');
    }, 100);

  });

  /*close mob menu*/
  $(document).on('click', '.close-menu a', function (e){
    e.preventDefault();
    $.fancybox.close();
    $('html').removeClass('is-menu');
  });

  //fix header
  $(".top-line").sticky({
    topSpacing:0
  });

  if(window.innerWidth <768){
    $(document).on('click', '.hide-list h6', function (e){
      e.preventDefault();
     $(this).toggleClass('is-open');
     if($(this).hasClass('is-open')){
       $(this).closest('.item').find('.list').slideDown();

     }else{
       $(this).closest('.item').find('.list').slideUp();

     }
    });
  }
  $(document).on('click', '.close-fix', function (e) {
    e.preventDefault();
    $('.fix-block').slideUp();
  });


  /*select*/
  $('.select-block select').niceSelect();



  //sub-menu open/close - mob-menu
  $(document).on('click', '.mob-menu .sub-item>a', function (e){
    e.preventDefault();
    let item = $(this).closest('li').find('.sub-menu');
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      item.slideDown();
    }else{
      item.slideUp();
    }
  });

  //scroll

  $(document).on('click', '.scroll', function (e) {
    e.preventDefault();
    var id  = $(this).attr('href'),
      top = $(id).offset().top;
    $('body,html').animate({scrollTop: top - 100}, 1000);
  });

  //add bg
  if($('main section:last-child').hasClass('bg-grey') || $('main section:last-child').hasClass('bg-grey-50')){
    $('footer').addClass('bg-grey')
  }else{
    $('footer').removeClass('bg-grey')
  }



  //accordion
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });

  //slider
  var swiperFullImg = new Swiper(".full-img-slider", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".full-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".full-next",
      prevEl: ".full-prev",
    },
  });

});