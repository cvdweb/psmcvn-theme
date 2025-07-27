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


    <h2>Danh mục sản phẩm</h2>
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





<div class="sidebar-menu sticky-menu no-scrollbar d-none d-md-block" style="padding-right:20px;position:sticky; top:100px;">



    <div class="p-mb-20 mod_search_form">

       <?php get_search_form() ?>

      </div>




      <h2 class="productlist-heading arrow-right-10">Danh mục sản phẩm</h2>
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



<script>
  document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sticky-menu");
    if (!sidebar) return;

    const originalOffsetTop = sidebar.offsetTop;
    const originalWidth = sidebar.offsetWidth + "px";

    function updateSidebarSticky() {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;

      if (scrollTop > 400) {
        sidebar.style.position = "fixed";
        sidebar.style.top = "30px"; // vị trí dính trên màn hình
        sidebar.style.width = originalWidth;
        sidebar.style.zIndex = "1000";
      } else {
        sidebar.style.position = "";
        sidebar.style.top = "";
        sidebar.style.width = "";
        sidebar.style.zIndex = "";
      }
    }

    window.addEventListener("scroll", updateSidebarSticky);
  });
</script>
