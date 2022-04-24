<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// set default time zone
// ==================================================================================================================
if ( !is_admin() ) {
  date_default_timezone_set('Asia/Ho_Chi_Minh');
}

// ==================================================================================================================
// disabled update core
// ==================================================================================================================
if ( !is_localhost() ) {
 // add_filter( 'pre_site_transient_update_core', '__return_null' );
}

// ==================================================================================================================
// disabled update plugin
// ==================================================================================================================
//if ( !is_localhost() ) {
//add_filter('site_transient_update_plugins', '__return_false');
//}


// ==================================================================================================================
// xmlrpc disabled
// ==================================================================================================================
add_filter('xmlrpc_enabled', '__return_false');

// ==================================================================================================================
// Disabled login in by email
// ==================================================================================================================
remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );

// ==================================================================================================================
// Disable Gutenberg editor
// ==================================================================================================================
add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_block_editor_for_post_type', '__return_false', 10);


add_action( 'wp_enqueue_scripts', 'p_remove_block_css', 100 );
function p_remove_block_css() {
  wp_dequeue_style( 'wp-block-library' ); // WordPress core
  wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
  wp_dequeue_style( 'wc-block-style' ); // WooCommerce

}

// ==================================================================================================================
//  disable rest_api
// ==================================================================================================================
add_action( 'rest_api_init', 'p_disable_rest_api' );
function p_disable_rest_api() {
    if ( is_localhost() || is_admin() ) return;

    wp_redirect( home_url() );
    die;
}

// ==================================================================================================================
//  disable feed, rss
// ==================================================================================================================
add_action('do_feed', 'p_disable_feed', 1);
add_action('do_feed_rdf', 'p_disable_feed', 1);
add_action('do_feed_rss', 'p_disable_feed', 1);
add_action('do_feed_rss2', 'p_disable_feed', 1);
add_action('do_feed_atom', 'p_disable_feed', 1);
add_action('do_feed_rss2_comments', 'p_disable_feed', 1);
add_action('do_feed_atom_comments', 'p_disable_feed', 1);
function p_disable_feed() {
  if ( is_localhost() || is_admin() ) return;

  wp_redirect( home_url() );
  die;
}

// ==================================================================================================================
// remove ...
// ==================================================================================================================
add_action('init', 'p_remove_meta' );
function p_remove_meta(){

  // remove emoji
  if ( !is_admin() ) {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
  }

  remove_action('wp_head', 'rest_output_link_wp_head', 10);
  remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
  remove_action('template_redirect', 'rest_output_link_header', 11, 0);
   
  remove_action ('wp_head', 'rsd_link');
  remove_action( 'wp_head', 'wlwmanifest_link');
  remove_action( 'wp_head', 'wp_shortlink_wp_head');

  remove_action('wp_head', 'wp_generator');
  add_filter('the_generator','__return_false');

  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
  remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed

  remove_action( 'wp_head', 'index_rel_link' ); // index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
  remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.

  // preload
  //remove_action('wp_head', 'wp_resource_hints', 2);


}

// ==================================================================================================================
// remove link of logo
// ==================================================================================================================
add_action( 'wp_before_admin_bar_render', 'p_wp_before_admin_bar_render');
function p_wp_before_admin_bar_render(){

   global $wp_admin_bar;

   //print_r2(  $wp_admin_bar );
   //the following codes is to remove sub menu
   $wp_admin_bar->remove_menu('wp-logo');
   $wp_admin_bar->remove_menu('about');
   $wp_admin_bar->remove_menu('wporg');
   $wp_admin_bar->remove_menu('documentation');
   $wp_admin_bar->remove_menu('support-forums');
   $wp_admin_bar->remove_menu('feedback');

}

// ==================================================================================================================
// remove submenu page
// ==================================================================================================================

add_action( 'admin_menu', 'p_remove_menu_items', 999 );
function p_remove_menu_items(){
   // remove_menu_page( 'themes.php' );

  remove_submenu_page( 'index.php','update-core.php' );

  remove_submenu_page( 'tools.php','site-health.php' );
  remove_submenu_page( 'tools.php','export-personal-data.php' );
  remove_submenu_page( 'tools.php','erase-personal-data.php' );

 
  remove_submenu_page( 'options-general.php','options-writing.php' );
  remove_submenu_page( 'options-general.php','options-privacy.php' );



}

// ==================================================================================================================
// 02/03/2020: Remove metabox
// ==================================================================================================================
add_action('admin_init', 'p_ad_remove_dashboard_widgets');
function p_ad_remove_dashboard_widgets() {

    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');

}



// ==================================================================================================================
// fixed wp redirect
// ==================================================================================================================
add_action('init', function(){ ob_start();});


// ==================================================================================================================
// Run Shortcode in widget text
// ==================================================================================================================
add_filter('widget_text', 'do_shortcode');

// ==================================================================================================================
// Run Shortcode in cf7
// ==================================================================================================================
add_filter( 'wpcf7_form_elements', 'do_shortcode' );


// ==================================================================================================================
// Activate shortcode function in Post Title
// ==================================================================================================================
add_filter( 'the_title', 'do_shortcode' );


// ==================================================================================================================
//  Load support
// ==================================================================================================================
add_action('after_setup_theme','p_load_support');
function p_load_support(){

    // load textdomain
    // load_theme_textdomain( TDM , P_DIR . '/languages' );

    add_theme_support( 'automatic-feed-links');
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' ); // Support Thumbnail Page
   // add_post_type_support( 'page', 'excerpt' ); // Support The Exerpt Page
    //remove_post_type_support('page', 'thumbnail');
  
    // Woocom
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Refresh wg
    add_theme_support( 'customize-selective-refresh-widgets' );



}


// ==================================================================================================================
// Change text footer admin
// ==================================================================================================================
if ( !function_exists('p_change_text_footer_admin') ) {
add_filter('admin_footer_text', 'p_change_text_footer_admin', 999999);
function p_change_text_footer_admin () {
 
   echo __("&copy;Copy Right 2021",TDM);
}
}

// ==================================================================================================================
// Change Readmore
// ==================================================================================================================
if ( ! function_exists( 'p_new_excerpt_more' ) ) {
  add_filter('excerpt_more', 'p_new_excerpt_more');
  function p_new_excerpt_more() {
      return '...';
  }
}

// ==================================================================================================================
// set post thumbnail default if post content have img frist
// ==================================================================================================================
add_action('save_post','p_first_img_to_thumb_post');
function p_first_img_to_thumb_post($post_id) {
  if (!defined('DOING_AUTOSAVE')||!DOING_AUTOSAVE) {
    if (!($id=wp_is_post_revision($post_id)))
    $id=$post_id;
    if (isset($_POST['content'])&&!get_post_thumbnail_id($id)) {
    $match=array();
    preg_match('/"[^"]*wp\-image\-(\d+)/',$_POST['content'],$match);
    if (isset($match[1])) set_post_thumbnail($post_id,intval($match[1]));
    }
  }
}


// ==================================================================================================================
// Move Yoast Seo | Rank Math Meta Box to bottom
// ==================================================================================================================
add_filter( 'wpseo_metabox_prio', function(){ return 'low'; });
add_filter( 'rank_math/metabox/priority', function(){ return 'low'; });



// ==================================================================================================================
// Up max 2mb 
// ==================================================================================================================

add_filter('wp_handle_upload_prefilter', 'func_image_size_prevent');
function func_image_size_prevent($file) {

  $max_mb = 2; 
  $max_error = sprintf( __('Up không thành công vì hình ảnh lớn hơn %1$s MB', TDM ) , $max_mb  );



    // get filesize of upload
    $size = $file['size'];
    $size = $size / 1024; // Calculate down to KB

    // get imagetype of upload
    $type = $file['type'];
    $is_image = strpos($type, 'image');

    // set sizelimit
    $limit = $max_mb * 1024; // Your Filesize in MB

    global $current_user;
    $args = array(
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'numberposts'     => -1,
        'post_type'       => 'attachment',
        'author'          => $current_user->ID,
    );
    $attachmentsbyuser = get_posts( $args );

    // check if the image is small enough
    if ( ( $size > $limit ) && ($is_image !== false) ) { 
        $file['error'] = $max_error;
    } 
    return $file;

}


// ==================================================================================================================
// Role
// administrator
// subscriber
// if ( p_get_current_user_role() == "subscriber" ) show_admin_bar( false );
// ==================================================================================================================
function p_get_current_user_role() {
  if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $role = ( array ) $user->roles;
    return $role[0];
  } else {
    return false;
  }
}

// ==================================================================================================================
// redirect sub to homepage
// ==================================================================================================================
add_action("admin_head","p_func_sub_redirect", -100 );
function p_func_sub_redirect(){

  if ( current_user_can("subscriber")  ){ 
    wp_redirect( home_url() );
    exit;
  }

}


add_action('init', 'p_admin_bar');
function p_admin_bar(){

  if ( !is_user_logged_in() ) {
    
     show_admin_bar( false );

  } else {

      if ( current_user_can("subscriber")  ){ 
        show_admin_bar( false );

      } else {

        if ( defined( 'P_SHOW_ADMIN_BAR' )  ) {
          show_admin_bar( P_SHOW_ADMIN_BAR  );
        }

      
      }

    }
}



// ==================================================================================================================
// taxonomy full width
// ==================================================================================================================
add_action("admin_head","p_css_full_width_tax", -100 );
function p_css_full_width_tax(){
  $ar = get_current_screen();

  if ( !$ar->taxonomy  ) return; 

?> 
  <style>
    #edittag,.form-table{
      max-width: 100%;
    }
  </style>

  <?php 
  
}


// ==================================================================================================================
// Debugger
// ==================================================================================================================
if ( !function_exists('p_log') ) {
  function p_log ($log, $file = '', $line = '') {
    if ( true === WP_DEBUG ) {
      if ( !empty( $file ) && !empty( $line ) ) {

        if ( is_array( $log ) || is_object( $log ) ) {
          error_log( $file . "(" . $line . "):" );
          error_log( print_r( $log, true ) );

        } else {
          error_log( $file . "(" . $line . "): " . $log );
        }

      } else {

        if ( is_array( $log) || is_object( $log ) ) {
          error_log( print_r( $log, true ) );

        } else {
          error_log( $log );
        } 
      }
    }
  }
}



// ==================================================================================================================
// only search title
// ==================================================================================================================
// add_filter('posts_search', 'p_query_search_filter');
function p_query_search_filter($search){
   global $wpdb;

   return str_replace(array(  "{$wpdb->preflix}_posts.post_excerpt" , "{$wpdb->preflix}_posts.post_content" ), array( "{$wpdb->preflix}_posts.post_title", "{$wpdb->preflix}_posts.post_title"), $search);
}


