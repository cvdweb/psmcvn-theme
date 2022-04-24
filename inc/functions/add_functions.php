<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// ==================================================================================================================

// 27/02/2020: random string

// ==================================================================================================================

if ( !function_exists('p_generateRandomString') ) {

  function p_generateRandomString($length = 10) {

      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      $charactersLength = strlen($characters);

      $randomString = '';

      for ($i = 0; $i < $length; $i++) {

          $randomString .= $characters[rand(0, $charactersLength - 1)];

      }

      return $randomString;

  } 

}







// ==================================================================================================================

// clear phone

// ==================================================================================================================

if ( !function_exists('p_clear_utf8') ) {

  function p_clear_utf8($phone){

      if( empty($phone) ) return;

      return preg_replace("/[^0-9]/", '', $phone);

  }

}





// ==================================================================================================================

// Support file svg

// ==================================================================================================================

if ( !function_exists('p_support_svg') ) {

add_filter('upload_mimes', 'p_support_svg');

function p_support_svg($mimes) {

  $mimes['svg'] = 'image/svg+xml';

  return $mimes;

}

}





// ==================================================================================================================

// excerpt_length

// ==================================================================================================================

if ( ! function_exists( 'p_custom_excerpt_length' ) ) {



  add_filter( 'excerpt_length', 'p_custom_excerpt_length', 999 );



  function p_custom_excerpt_length( $length ) {

    return is_home() ? 100 : 55;

  }



}



// ==================================================================================================================

// Hidden body

// ==================================================================================================================

if ( ! function_exists( 'p_hidden_body' ) ) {

function p_hidden_body(){

  echo "<style>body{display:none;}</style>";

}

}





// ==================================================================================================================

//  Link img/ size = thumbnail, medium, large, ''

// ==================================================================================================================

if ( ! function_exists( 'p_link_img' ) ) {

  function p_link_img( $id = false ,$size = false, $echo = false){ 



   if ( $id == false ) return;



   $r = !empty( get_the_post_thumbnail_url( $id , $size ) ) ? get_the_post_thumbnail_url( $id , $size ) : p_link_img_placeholder();



   if ( $echo ) { echo $r; } else { return $r;  }



  }

}





// ==================================================================================================================

// Get image by post

// ==================================================================================================================

function p_post_img_link( $id = "", $size = '' ) {

  if ( !$id ) return;



  $thumb_id = get_post_thumbnail_id( $id );



  return p_img_link( $thumb_id, $size );

}





function p_post_img_alt( $id = "", $size = '' ) {

  if ( !$id ) return;



  $thumb_id = get_post_thumbnail_id( $id );



  return p_img_alt( $thumb_id, $size );

  

}



// ==================================================================================================================

// Get image by id

// ==================================================================================================================

function p_img_link( $img_id = "", $size = "" ) {

  // if ( !$img_id  ) return;



  $img = wp_get_attachment_image_src( $img_id, $size );



  if (  $img  ){

    $link = $img[0];



  } else {

    $link = p_link_img_placeholder();

  }



  return $link;



}



function p_img_alt( $img_id = "", $size = "") {

  // if ( !$img_id  ) return;



  $img = wp_get_attachment_image_src( $img_id, $size );



  if (  $img  ){



      $alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );

      $alt = $alt ? $alt : __("Image", TDM );



  } else {



    $alt = __('Placeholder', TDM );

  }



  return $alt;

}



function p_link_img_placeholder(){

    return apply_filters( 'p_apply_link_img_placeholder', P_IMG. '/placeholder.jpg'); 

}



function p_link_img_placeholder2(){

    return apply_filters( 'p_apply_link_img_placeholder2', P_IMG. '/placeholder-1200.png'); 

}





function p_img_null(){

    return p_link_img_placeholder();

}



// ==================================================================================================================

// Link img placeholder default

// ==================================================================================================================

add_filter( 'post_thumbnail_html', 'p_my_post_thumbnail_fallback', 20, 5 );

function p_my_post_thumbnail_fallback( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

    if ( empty( $html ) ) {

     

        return "<img src='" . p_link_img_placeholder() . "' alt='Placeholder' class='p-w-100pt' >";

    }

  

    return $html;



}





// show title - h1

// function p_show_title_archive(){

//   if( is_category()) {



//     single_cat_title(); 



//   } else if( is_search() ) {



//     printf( __('Kết quả tìm kiếm từ khóa: "%s"', TDM ) , get_search_query() );

  

//   } else if ( is_tag()){



//     single_tag_title(); 







//   } else if ( is_author()){



//     echo __("Tác giả: ", TDM );

//     the_author();

  

//   } else if ( is_tax() ){



//     $r = explode( ':', get_the_archive_title()  );

//     echo trim($r[1]);



//   } else if( is_archive() ){



//     the_archive_title();



//   } else{

//     the_archive_title();

//   }



// }





// function p_show_title_archive2(){

//   ob_start();



//   p_show_title_archive();



//   return ob_get_clean();



// }







// function p_show_des_archive(){

//   if( is_category()) {



//     echo category_description();



//   } else if ( is_tag()){



//     echo tag_description();

  

//   } else if ( is_author()){



//     the_author_description();

  

//   } else if( is_archive() ){

  

//     the_archive_description();

  

//   }  else{



//     the_archive_description();

//   }

// }







// function p_show_des_archive2(){

//   ob_start();



//   p_show_des_archive();



//   return ob_get_clean();



// }











add_filter( 'get_the_archive_title', 'p_my_theme_archive_title' );

function p_my_theme_archive_title( $title ) {

  if ( is_category() ) {



    $title = single_cat_title( '', false );



  } elseif ( is_tag() ) {



    $title = single_tag_title( '', false );



  } elseif ( is_author() ) {



    $title = sprintf( __('Tác giả: "%s"', TDM ) , get_the_author() );



  } elseif( is_search() ) {



    $title = sprintf( __('Tìm kiếm từ khóa: "%s"', TDM ) , get_search_query() );

  



  } elseif ( is_post_type_archive() ) {



    $title = post_type_archive_title( '', false );



  } elseif ( is_tax() ) {



    $title = single_term_title( '', false );



  } elseif ( is_home() ) {



    $title = single_post_title( '', false );



  }



  return $title;

}





// ==================================================================================================================

// #,color -> rgba,

// Ex: p_hex2rgba(red,0.5);

// ==================================================================================================================

function p_hex2rgba($color, $opacity = false) {

 

  $default = 'rgb(0,0,0)';

 

  if(empty($color)) return $default; 

 

        if ($color[0] == '#' ) { $color = substr( $color, 1 ); }

          

        if (strlen($color) == 6) {

                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );

        } elseif ( strlen( $color ) == 3 ) {

                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );

        } else {

                return $default;

        }

 

        $rgb =  array_map('hexdec', $hex);

 

        if($opacity){

          if(abs($opacity) > 1)

            $opacity = 1.0;

          $output = 'rgba('.implode(",",$rgb).','.$opacity.')';

        } else {

          $output = 'rgb('.implode(",",$rgb).')';

        }



    return $output;

}





// ==================================================================================================================

// Id youtube -> iframe...

// ==================================================================================================================

function p_id_youtube( $link ){

  if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[\w\-?&!#=,;]+/[\w\-?&!#=/,;]+/|(?:v|e(?:mbed)?)/|[\w\-?&!#=,;]*[?&]v=)|youtu\.be/)([\w-]{11})(?:[^\w-]|\Z)%i', $link , $match)) {

      return $match[1];

  }

}



// ==================================================================================================================

// Id video -> iframe...

// ==================================================================================================================

function p_match_vimeo_id($url){

    //preg_match("/https?:\/\/(?:www\.)?vimeo\.com\/\d{8}/", $link_youtube, $output_array);



 if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {

            $id = $regs[3];

        }

    

     return $id;

}











// ==================================================================================================================

// match tel

// ==================================================================================================================

function p_wpcf7_is_tel2( $tel ) {

    $result = preg_match( '%^[+]?[0-9()/ -]*$%', $tel );

    return $result;

}



// ==================================================================================================================

//  prect home_url

// ==================================================================================================================

function p_re_home(){

  header("location:" . home_url()  );

  exit;

}



// ==================================================================================================================

// remove tax tag

// ==================================================================================================================

add_action('init', 'p_unregister_tags');

function p_unregister_tags() {

    unregister_taxonomy_for_object_type('post_tag', 'post');

}





// ==================================================================================================================

// debug, 

// create file : \wp-content\debug.log

// ==================================================================================================================

function p_wp_debug(){

  // define('WP_DEBUG', false);

  

  define( 'WP_DEBUG', true );

  define( 'WP_DEBUG_LOG', true );

  define( 'WP_DEBUG_DISPLAY', false );

  @ini_set( 'display_errors', 0 );

  define( 'SCRIPT_DEBUG', true );



}



// ==================================================================================================================

// wp home url

// ==================================================================================================================

function p_wp_home_url(){



  define( 'WP_HOME', 'http://localhost/wp/wp' );

  define( 'WP_SITEURL', 'http://localhost/wp/wp' );



}











add_action('wp_dashboard_setup', 'wpdocs_remove_dashboard_widgets');
 
/**
 * Remove all dashboard widgets
 */
function wpdocs_remove_dashboard_widgets(){
    remove_meta_box('rank_math_dashboard_widget', 'dashboard', 'normal');   // Right Now
    // remove_meta_box('dashboard_site_health', 'dashboard', 'normal');   // Right Now
  
  }