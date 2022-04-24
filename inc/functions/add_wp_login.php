<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// ==================================================
// Change login page
// ==================================================
add_filter( 'login_headerurl', function(){ return home_url( '/' ); });
add_filter( 'login_headertext', function(){ return get_bloginfo( 'name' ); });

add_action('login_head', 'p_add_favicon');
add_action('admin_head', 'p_add_favicon');
function p_add_favicon() {
  if ( !function_exists('get_field') ) return;

  if ( $favicon = get_field( 'op_logo_favicon', 'option' )['url'] ) {
    echo '<link rel="shortcut icon" href="' . $favicon . '" />';
  }
}  

add_action( 'login_head', 'p_login_style' );
function p_login_style() {
   if ( !function_exists('get_field') ) return;

  $result = '';

  if ( !class_exists('ACF') ) {

    // 1:color, 2:bg_url
    $use = "1";
    $bg_color = '#95a5a6';
    $bg_url = P_IMG . '/bg_login.jpg';

    if ( $bg_color && $use == "1" ) $result .= "body{background:".$bg_color." !important}";
    if ( $bg_url && $use == "2" ) $result .= "body{background:".$bg_url." !important}";

  } else {

    // $logo = get_field( 'op_page_login_admin__logo', 'option' ) ? get_field( 'op_page_login_admin__logo', 'option' )['url'] : "";

    // if ( $logo ) $result .= '.login h1 a { background-image: url( ' . $logo . ' ) !important; }';

    if ( get_field("op_page_login_admin__type","option") == "t1" && $bg_color = get_field("op_page_login_admin__color","option") ){

       $result .= "body{background:".$bg_color." !important}";

    } else if ( get_field("op_page_login_admin__type","option") == "t2" && $bg_url = get_field("op_page_login_admin__img","option")['url'] ){

       $result .= "body{background:url('".$bg_url."') no-repeat center/cover !important;}";

    } 

  } 

  if ( $result ) echo "<style>".$result."</style>\n"; 
}


add_action( 'login_head', 'p_login_style_css_mod' );
function p_login_style_css_mod() {
  ?>
  <style>
    .login h1 a{
        height: auto !important;
        width: auto !important;
        background-size: auto !important;
        background: none !important;
        text-align: center;
    }

     .login h1 a img{
      display: block;
      max-width: 100%;
      margin-left: auto;
      margin-right: auto;
     }
  </style>
  <?php 
}



add_filter("login_headertext", 'p_login_headertext' );
function p_login_headertext( $login_header_text ){  
    $result = $login_header_text;

    if ( !function_exists('get_field') ) {
        return $result;
    }

    $logo = get_field( 'op_page_login_admin__logo', 'option' ) ? get_field( 'op_page_login_admin__logo', 'option' )['url'] : "";

    if ( $logo ) {
     $result = "<img src='{$logo}' alt=\"Logo\">";
   }

    return $result;
}