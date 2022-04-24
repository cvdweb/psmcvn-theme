<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>















 <footer id="footer" class="footer-wrapper">

    <section class="section newfooter dark" id="section_303147829">

       <div class="bg section-bg fill bg-fill bg-loaded bg-loaded">

       </div>

       <div class="section-content relative">

          <div class="row align-center" id="row-844731022">

             <div id="col-712210869" class="col paymentmethod medium-9 small-12 large-9">

                <div class="col-inner text-left">

                 <!--   <h5 class="has-block tooltipstered">CÔNG TY CỔ PHẦN TẬP ĐOÀN TINO</h5>

                   <div class="address">

                      Trụ sở chính: L17-11, Tầng 17, Tòa nhà Vincom Center, Số 72 Lê Thánh Tôn,&nbsp; Phường Bến Nghé, Q. 1, TP. Hồ Chí Minh

                      <div>Văn phòng kinh doanh: Số 42 Trần Phú, Phường 4, Quận 5, TP HCM</div>

                   </div>

                   <div>GPKD số 0315679836 do Sở KH và ĐT TP Hồ Chí Minh cấp<br>Hotline: <a href="tel:0364333333">0364 333 333</a></div> -->

                   <div>

                      <?php echo get_field("op_fo_con","option") ?>

                  </div>

                </div>

             </div>

             <div id="col-1810772085" class="col medium-3 small-12 large-3">

             </div>

          </div>

       </div>


<?php if ( !is_admin() ) { ?>
       <style>

          #section_303147829 {

          padding-top: 30px;

          padding-bottom: 30px;

          background-color: rgb(22, 31, 45);

          }

          #section_303147829 .ux-shape-divider--top svg {

          height: 150px;

          --divider-top-width: 100%;

          }

          #section_303147829 .ux-shape-divider--bottom svg {

          height: 150px;

          --divider-width: 100%;

          }



          .dark, .dark p, .dark td{

            color: #6a7b96;

          }

       </style>

       <?php } ?>

    </section>

  

 </footer>





</div>







<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide" style="background:white">

<div class="sidebar-menu no-scrollbar" style="padding:30px 15px">



   <?php

 if ( has_nav_menu( 'category_product' ) ) {

   wp_nav_menu( array(

     'theme_location'  => 'mobile',

     // 'menu_class'      => 'nav nav-sidebar nav-vertical nav-uppercase',

      'menu_class'      => 'mb_ul2 ',

     'container'       => '',

     // 'menu_id' => "mega-menu-primary",

      // 'walker'          => 'p_menu_primary_mod',



   ) );





 }

 ?>


</div>

</div>






<?php if ( !is_admin() ) { ?>
<script type="text/javascript" id="flatsome-js-js-extra">

 /* <![CDATA[ */

 var flatsomeVars = {"theme":{"version":"3.15.4"},"ajaxurl":"https:\/\/tinohost.com\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"70","assets_url":"https:\/\/tinohost.com\/wp-content\/themes\/flatsome\/assets\/js\/","lightbox":{"close_markup":"<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>","close_btn_inside":false},"user":{"can_edit_pages":false},"i18n":{"mainMenu":"Main Menu"},"options":{"cookie_notice_version":"1","swatches_layout":false,"swatches_box_select_event":false,"swatches_box_behavior_selected":false,"swatches_box_update_urls":"1","swatches_box_reset":false,"swatches_box_reset_extent":false,"swatches_box_reset_time":300,"search_result_latency":"0"}};

 /* ]]> */

</script>

<?php } ?>











<?php wp_footer() ?>





</body>

</html>















































<?php return; ?>



<div class="footer">

		

	<?php if( is_dynamic_sidebar('sidebar-footer') ) { ?>

		<div class="top_footer p-pt-50 p-pb-50 p767-pt-20 p767-pb-20">

			<div class="container">

				<div class="row">

					<?php dynamic_sidebar( 'sidebar-footer' ); ?>

				</div>

			</div>

		</div>

	<?php } ?>

	

	<div class="bottom_footer p-pt-30 p-pb-30 p767-pt-20 p767-pb-20">

	<div class="container p-t-c">	

		<?php echo sprintf( __('© CopyRight %1$s by Phuc', TDM ), date('Y') ) ?>

	</div>

	</div>

</div>



<?php if ( file_exists( get_template_directory() . "/scroll_top.php" ) ) { include_once (get_template_directory() . "/scroll_top.php"); } ?>

<?php wp_footer() ?>





</body>

</html>