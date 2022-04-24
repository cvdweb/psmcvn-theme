<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>


<div class="sidebar-menu no-scrollbar d-sm-block d-md-none " style="padding-right:20px;">

  <div class="">
  <button type="button" class="btn btn-secondary btn-show-menu-cate" data-toggle="collapse" href="#collapseExample">
    <i class="fa fa-bars"></i> Menu danh mục
  </button>
  </div>


  <div class="collapse div-menu-cate" id="collapseExample">

      <div class="p-mb-20 mod_search_form">
       <?php get_search_form() ?>
      </div>

      <div>
         <?php
          if ( has_nav_menu( 'category_product' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'category_product',
               'menu_class'      => 'mb_ul2',
              'container'       => '',
            ) );

          }
          ?>
      </div>

    </div>

</div>


<div class="sidebar-menu no-scrollbar d-none d-md-block" style="padding-right:20px;">

    <div class="p-mb-20 mod_search_form">
       <?php get_search_form() ?>
      </div>


      <div>
         <?php
          if ( has_nav_menu( 'category_product' ) ) {
            wp_nav_menu( array(
              'theme_location'  => 'category_product',
               'menu_class'      => 'mb_ul2',
              'container'       => '',
         
            ) );


          }
          ?>
      </div>

  </div>

