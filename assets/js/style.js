jQuery(function($){

  // e.preventDefault();
  // e.stopPropagation();

// ===================================================================================================
// scroll to
// ===================================================================================================
if ( jQuery('.scroll').length ) {

  jQuery('.scroll:not(.clear)').on('click', function(e) {
    e.preventDefault(); 
    var time = jQuery(this).data('p-scroll-time') ? jQuery(this).data('p-scroll-time') : 900; // time
    var offset = jQuery(this).data('p-scroll-offset') ? jQuery(this).data('p-scroll-offset')  : 0; // offset
    var has_hash = jQuery(this).data('p-scroll-hash') ? jQuery(this).data('p-scroll-hash') : 'no';
    var hash = jQuery(this).attr('href'); // hash

    jQuery('html, body').animate({
      scrollTop: jQuery(this.hash).offset().top + offset
    }, time, function(){
       if ( has_hash == "yes" || has_hash != "no" ) {
          window.location.hash = hash ;
       }
    });

  });

} 

// ===================================================================================================
// hide/apperance icon scroll
// ===================================================================================================
if ( jQuery('.scroll_top').length ) {

   jQuery(window).on('scroll load resize',function() {
     jQuery(".scroll_top").each(function(){

          if( jQuery(window).scrollTop() < 200 ){      
            jQuery(this).removeClass('active'); 
          } else {
            jQuery(this).addClass('active');
          }
          
      });
  });

  jQuery('.scroll_top:not(.clear)').on('click', function(e) {
    e.preventDefault(); 
  
    jQuery('html, body').animate({
      scrollTop: 0,
  
    });

  });

} 


// ==================================================================================================
// sticky
// ==================================================================================================
jQuery(window).on('scroll load resize',function() {

  var $where = $('.div-wrap-menu.__sticky');

  var position = $where.position();

  console.log( position.left + ' ' + position.top );

    if ( position.left == 0 && position.top > 0 ) {
      $where.addClass("active");
    } else {
      $where.removeClass("active");
    }

});




// ==================================================================================================================
// menu
// ==================================================================================================================
jQuery('.list-menu-sumon-mobile>li ul').before('<button class="a-click-inline-block"><i class="fa fa-angle-down" aria-hidden="true"></i></button>');

jQuery(".a-click-inline-block").on('click',function(e){
  e.preventDefault();

  if ( !jQuery(this).hasClass('active') ){

    jQuery(this).addClass('active');
    jQuery(this).siblings('ul').addClass('active');

  } else {

    jQuery(this).removeClass('active');
    jQuery(this).siblings('ul').removeClass('active');

  }

})

jQuery(window).on('resize',function() {

  if ( jQuery(window).width() > 991 ) {

    if ( jQuery(".menu_mobile_app").hasClass('active') ) {

     jQuery(".grey_back").removeClass('active');
     jQuery(".menu_mobile_app").removeClass('active');

     jQuery('body').removeClass('add_clear_scroll');
   }

 }
});

jQuery(".js-toggle-list-menu-sumon-mobile").on('click',function(e){
  e.preventDefault();

  if ( !jQuery(".menu_mobile_app").hasClass('active') ){

    jQuery(".grey_back").addClass('active');
    jQuery(".menu_mobile_app").addClass('active');

    jQuery('body').addClass('add_clear_scroll');

  } else {

    jQuery(".grey_back").removeClass('active');
    jQuery(".menu_mobile_app").removeClass('active');

    jQuery('body').removeClass('add_clear_scroll');

  }

})






// ==================================================================================================
// Menu mobile
// ==================================================================================================

// click button
$(document).on('click', '.js_btn_menu', function(e){
  e.preventDefault();

  if ( !$('.mb_wrap_menu').hasClass('active') ) {
    $('.mb_wrap_menu').addClass('active');
    $('body').addClass('add_clear_scroll');
    $(this).addClass('active');
  } else {
    $('.mb_wrap_menu').removeClass('active');
    $('body').removeClass('add_clear_scroll');
    $(this).removeClass('active');
  }

});

//
jQuery(window).on('resize',function() {

  if ( jQuery(window).width() > 767 ) {

    if ( $('.mb_wrap_menu').hasClass('active') ) {

      $('.mb_wrap_menu').removeClass('active');
      $('body').removeClass('add_clear_scroll');
      $('.js_btn_menu').removeClass('active');
    }
  }
});


$('.mb_ul,.mb_ul2').find('>li ul').siblings('a').append(` <button class="btn_fa_show_sub"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>`);

$(document).on('click', '.mb_ul .btn_fa_show_sub,.mb_ul2 .btn_fa_show_sub',function(e){
  e.preventDefault();

  var $this = $(this);
  var $ul = $this.parents('a').siblings('ul');

  if ( !$this.hasClass('active') ) {
    $this.addClass('active');
    $ul.addClass('active');


  } else {
    $this.removeClass('active');
    $ul.removeClass('active');
  }

});












// ==================================================================================================================
// post add video reponsive 
// ==================================================================================================================
if ( jQuery('.div-the-con').length) {
    // jQuery('.div-the-con').find('iframe').wrap('<div class="div-video-wrapper"></div>');
    jQuery('.div-the-con').find('iframe').addClass('embed-responsive-item').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
}



  






// ===============================================================================
// singluar product
// ===============================================================================
// ===============================================================================


if ( $('.pd-gallery-top').length ){  


    var galleryThumbs = new Swiper('.pd-gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 4, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.pd-gallery-top', {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 4, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });


}















});





