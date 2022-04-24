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


<!--  <ul class="nav nav-sidebar nav-vertical nav-uppercase" data-tab="1">
    <li id="menu-item-4018" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4018"><a href="https://tinohost.com/ten-mien/">Tên Miền</a></li>
    <li id="menu-item-4005" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4005 has-child" aria-expanded="false">
       <a href="https://tinohost.com/hosting/">Hosting</a>
       <button class="toggle"><i class="icon-angle-down"></i></button>
       <ul class="sub-menu nav-sidebar-ul children">
          <li id="menu-item-4006" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4006"><a href="https://tinohost.com/hosting">Cloud Hosting</a></li>
          <li id="menu-item-4008" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4008"><a href="https://tinohost.com/hosting/cloud-hosting-business/">Business Hosting</a></li>
          <li id="menu-item-4055" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4055"><a href="https://tinohost.com/cloud-hosting/unlimited-hosting/">Unlimited Hosting</a></li>
          <li id="menu-item-4009" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4009"><a href="https://tinohost.com/hosting/seo-hosting/">SEO Hosting</a></li>
          <li id="menu-item-6292" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6292"><a href="https://tinohost.com/dai-ly/reseller-hosting/">Reseller Hosting</a></li>
       </ul>
    </li>
    <li id="menu-item-4011" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4011 has-child" aria-expanded="false">
       <a href="https://tinohost.com/servers/">Server</a>
       <button class="toggle"><i class="icon-angle-down"></i></button>
       <ul class="sub-menu nav-sidebar-ul children">
          <li id="menu-item-4012" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4012"><a href="https://tinohost.com/servers/cloud-vps">VPS Pro</a></li>
          <li id="menu-item-4013" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4013"><a href="https://tinohost.com/servers/vps-lite">VPS Lite – Giá Rẻ</a></li>
          <li id="menu-item-7181" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7181"><a href="https://tinohost.com/servers/cloud-vps-windows/">VPS Windows</a></li>
          <li id="menu-item-4015" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4015"><a href="https://tinohost.com/servers/thue-may-chu-rieng/">Dedicate Server</a></li>
          <li id="menu-item-4056" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4056"><a href="https://tinohost.com/servers/thue-cho-dat-may-chu/">Chỗ đặt máy chủ</a></li>
          <li id="menu-item-4016" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4016"><a href="https://tinohost.com/servers/dich-vu-quan-tri-may-chu">Dịch Vụ Quản Trị</a></li>
       </ul>
    </li>
    <li id="menu-item-6296" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-6296 has-child" aria-expanded="false">
       <a href="https://tinohost.com/business-email/">Unlimited Email</a>
       <button class="toggle"><i class="icon-angle-down"></i></button>
       <ul class="sub-menu nav-sidebar-ul children">
          <li id="menu-item-6295" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6295"><a href="https://tinohost.com/business-email/">Unlimited Email</a></li>
          <li id="menu-item-6291" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6291"><a href="https://tinohost.com/email-server/">Dedicated Email</a></li>
       </ul>
    </li>
    <li id="menu-item-4019" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4019 has-child" aria-expanded="false">
       <a>SSL</a>
       <button class="toggle"><i class="icon-angle-down"></i></button>
       <ul class="sub-menu nav-sidebar-ul children">
          <li id="menu-item-5940" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5940"><a href="https://tinohost.com/ssl/codomo-ssl/">CODOMO SSL</a></li>
          <li id="menu-item-5941" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5941"><a href="https://tinohost.com/ssl/geotrust-ssl/">GEOTRUST SSL</a></li>
       </ul>
    </li>
    <li id="menu-item-5947" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-5947 has-child" aria-expanded="false">
       <a href="https://tinohost.com/phan-mem/">Phần mềm</a>
       <button class="toggle"><i class="icon-angle-down"></i></button>
       <ul class="sub-menu nav-sidebar-ul children">
          <li id="menu-item-5943" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5943"><a href="https://tinohost.com/phan-mem/cloudlinux-os/">CloudLinux</a></li>
          <li id="menu-item-5944" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5944"><a href="https://tinohost.com/phan-mem/cpanel-license/">cPanel License</a></li>
          <li id="menu-item-5945" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5945"><a href="https://tinohost.com/phan-mem/directadmin-license/">DirectAdmin</a></li>
          <li id="menu-item-5946" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5946"><a href="https://tinohost.com/phan-mem/imunify360-license/">Imunify360</a></li>
          <li id="menu-item-5948" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5948"><a href="https://tinohost.com/phan-mem/litespeed-webserver/">Litespeed Webserver</a></li>
       </ul>
    </li>
    <li id="menu-item-6298" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6298"><a href="https://tinohost.com/tong-dai-ao/">Tổng đài ảo</a></li>
    <li id="menu-item-5942" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5942"><a href="https://tinohost.com/dai-ly/">Đại lý</a></li>
    <li id="menu-item-6288" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6288"><a href="https://blog.tinohost.com/">Tin tức</a></li>
    <li id="menu-item-6289" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6289"><a href="https://wiki.tino.org/">Tài liệu</a></li>
    <li class="html custom html_topbar_right"><a rel="noopener noreferrer" href="tel:<?php echo @str_replace(" ", "",  get_field("op_he_con_phone","option")); ?>" target="_blank" class="hotline-button button">
       <i class="fa fa-phone"></i> 
       <span>Tổng đài 24/7: </span>
       <span class="phone"><?php echo get_field("op_he_con_phone","option") ?></span>
       </a>
       
    </li>
 </ul> -->
</div>
</div>



<script type="text/javascript" id="flatsome-js-js-extra">
 /* <![CDATA[ */
 var flatsomeVars = {"theme":{"version":"3.15.4"},"ajaxurl":"https:\/\/tinohost.com\/wp-admin\/admin-ajax.php","rtl":"","sticky_height":"70","assets_url":"https:\/\/tinohost.com\/wp-content\/themes\/flatsome\/assets\/js\/","lightbox":{"close_markup":"<button title=\"%title%\" type=\"button\" class=\"mfp-close\"><svg xmlns=\"http:\/\/www.w3.org\/2000\/svg\" width=\"28\" height=\"28\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-x\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"><\/line><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"><\/line><\/svg><\/button>","close_btn_inside":false},"user":{"can_edit_pages":false},"i18n":{"mainMenu":"Main Menu"},"options":{"cookie_notice_version":"1","swatches_layout":false,"swatches_box_select_event":false,"swatches_box_behavior_selected":false,"swatches_box_update_urls":"1","swatches_box_reset":false,"swatches_box_reset_extent":false,"swatches_box_reset_time":300,"search_result_latency":"0"}};
 /* ]]> */
</script>


<!-- <script data-minify="1" type="text/javascript" src="./home_page_files/flatsome.js" id="flatsome-js-js"></script> -->




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