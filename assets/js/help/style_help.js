// ===================================================================================================
// text lang
// ===================================================================================================
function p__pll( $lang1 = "", $lang2 = "" ){

  if ( typeof p === "undefined" ){

     return $lang1;
  }

  if ( p.lang == p.lang1 ){

    return $lang1;

  } else if ( p.lang == p.lang2 ){

    return $lang2;
  }

}

// ===================================================================================================
// number format
// alert( p_ecom_number_format( 9500000 ) );
// ===================================================================================================
function p_ecom_number_format( thenumber  ){
  return thenumber.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + ' ' + p_ecom_show_currency;
}


// ===================================================================================================
// random number
// p_get_ramdom_num(0,5);
// ===================================================================================================
function p_get_ramdom_num(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min; 
}


// ===================================================================================================
// delay
// ===================================================================================================
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}


// ===================================================================================================
// delay
// ===================================================================================================
function disabled_web_select(){

  if ( p.debugweb || p.is_localhost ) return;

  // css ::selection
  jQuery(document).attr('unselectable', 'on').css('user-select', 'none').on('selectstart dragstart', false);

   // cut, copy, paste, right click
  jQuery(document).on("cut copy paste contextmenu", false );

  // ctrl - u
   jQuery(document).keydown(function (event) {
         if (event.ctrlKey && (event.keyCode === 67 ||  event.keyCode === 86 || event.keyCode === 85 || event.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
    });

    // f12
    jQuery(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

}




// ===================================================================================================
// ===================================================================================================
// jquery
// ===================================================================================================
// ===================================================================================================
jQuery(function($){

// ===================================================================================================
// add click new
// <div class="" data-click="//google.com" data-click-new="yes">
// ===================================================================================================
if ( $('[data-click]').length ) {

  $(document).on('click', '[data-click]', function(e){
      e.preventDefault();

      let href = $(this).attr('data-click');
      let new1 = $(this).attr('data-click-new');

      if ( !new1  ) {
        location.href = href;
      } else {
        window.open( href );
      }
  }); 

}


// ===================================================================================================
// tooltip
// ===================================================================================================
if ( $('[data-toggle="tooltip"]').length ) {
  
  $('[data-toggle="tooltip"]').tooltip();

}

// ===================================================================================================
// add click element
// ===================================================================================================
$(document).on('click', '[data-click-e]', function(e){
    e.preventDefault();

    let href = $(this).attr('data-click-e');

     $( href ).click();

});   



})
// endjQuery



