<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// banner 
// ==================================================================================================================
//add_action('p_after_header','p_add_banner', 5);
function p_add_banner( $show = false ){
    wp_reset_postdata();
    wp_reset_query();  

  if ( $show == false ) {

    global $hidden_banner;

    if( is_home() || $hidden_banner  ) return;

  }

  $banner = p_link_img_placeholder2();

  $where = "option";


  if ( get_field("p_banner_post1_img" , $where ) ) {
    $banner = get_field("p_banner_post1_img" , $where );
  }

  if ( is_singular() ) { 
      global $post;
      $where = $post->ID;

  } else if ( is_category()  ||  is_tag() || is_tax()  ) {

    $where = get_queried_object();
  }

  if ( get_field("p_banner_post1_img", $where ) ){

      $banner = get_field("p_banner_post1_img", $where );

  }


  wp_reset_postdata();
  wp_reset_query();  

 ?>

  <?php if ( $banner['url'] ) : ?>
    <div class="sc-banner-theme">

        <img src="<?php echo  $banner['url'] ?>" alt="<?php echo $banner['alt'] ? $banner['alt'] : __("Banner", TDM );  ?>" class="p-w-100pt">

    </div>
   <?php endif; ?>

  <?php
}


