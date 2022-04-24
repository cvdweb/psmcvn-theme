<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <?php if ( defined('P_IMG_FAVICON') && P_IMG_FAVICON !== false ) { ?><link rel="icon" href="<?php echo P_IMG_FAVICON ?>" sizes="16x16" /><?php } ?>
  <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
<?php do_action( 'p_before_body' ); ?>


<!-- 
================================================================================================================
header mobile
================================================================================================================
-->
<div class="mb_nav_logo_menu d-md-none">
  <div class="d-flex justify-content-between align-items-center d-flex-mb">
    <div class="">
        <a href="<?php echo home_url() ?>">
          <img src="<?php echo get_field("op_logo_header","option")['url'] ? get_field("op_logo_header","option")['url'] : P_IMG  . '/wp.png' ?>" class="header_logo" alt="Logo">
        </a>
    </div>

    <div class="">
      <button class="js_btn_menu css_btn_menu" type="button">
         <span class="top"></span><span class="middle"></span><span class="bottom"></span></div>
      </button>
    </div>
  </div>
</div>

<div class="mb_wrap_menu actives">
  <div>
    <div class="">
      <?php
        if ( has_nav_menu( 'mobile' ) ) {
          wp_nav_menu( array(
            'theme_location'  => 'mobile',
            'menu_class'      => 'mb_ul',
            'container'       => '',
          ) );
        }
     ?>
    </div>
  </div>
</div>


<!-- 
================================================================================================================
header pc
================================================================================================================
-->
<div class="div-wrap-menu __sticky d-md-block d-none">

  <div class="container-fluid">

    <div class="row row_fix justify-content-between align-items-center">

      <div class="d-flex">

        <div class="p-pr-20">

          <a href="<?php echo home_url() ?>">
            <img src="<?php echo get_field("op_logo_header","option")['url'] ? get_field("op_logo_header","option")['url'] : P_IMG  . '/wp.png' ?>" class="header_logo" alt="Logo">
          </a>

        </div>


        <div class="">
          <?php
          if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'primary',
              'menu_class'      => 'list-unstyled list-menu-sumon-fixed',
              'container'       => '',
            ) );

          }
          ?>

        </div>


      </div>


      <div class="text-right">
        <div class="menu_search">
          <?php echo get_search_form() ?>
        </div>
      </div>

    </div>
  </div>
</div>




<?php 
// ================================================================================================================
// hook banner, breadcrum 
// ================================================================================================================
do_action( 'p_after_header' );

?>
