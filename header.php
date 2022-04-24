<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <?php if ( defined('P_IMG_FAVICON') && P_IMG_FAVICON !== false ) { ?><link rel="icon" href="<?php echo P_IMG_FAVICON ?>" sizes="16x16" /><?php } ?>
  <?php wp_head() ?>


  <!-- <link rel="stylesheet" href="./home_page_files/0f7c0eeb9c79d6fcb27114f31797709b.css" media="all" data-minify="1"> -->


<!--       <style id="flatsome-main-inline-css" type="text/css">
         @font-face {
         font-family: "fl-icons";
         font-display: block;
         src: url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.eot?v=3.15.4);
         src:
         url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.eot#iefix?v=3.15.4) format("embedded-opentype"),
         url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.woff2?v=3.15.4) format("woff2"),
         url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.ttf?v=3.15.4) format("truetype"),
         url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.woff?v=3.15.4) format("woff"),
         url(https://tinohost.com/wp-content/themes/flatsome/assets/css/icons/fl-icons.svg?v=3.15.4#fl-icons) format("svg");
         }
      </style> -->


      
      <style id="custom-css" type="text/css">:root {--primary-color: #0029ff;}.header-main{height: 79px}#logos img{max-height: 79px}#logo{width:200px;}.header-bottom{min-height: 45px}.header-top{min-height: 30px}.transparent .header-main{height: 90px}.transparent #logo img{max-height: 90px}.has-transparent + .page-title:first-of-type,.has-transparent + #main > .page-title,.has-transparent + #main > div > .page-title,.has-transparent + #main .page-header-wrapper:first-of-type .page-title{padding-top: 170px;}.header.show-on-scroll,.stuck .header-main{height:70px!important}.stuck #logo img{max-height: 70px!important}.header-bottom {background-color: #ffffff}.stuck .header-main .nav > li > a{line-height: 50px }.header-bottom-nav > li > a{line-height: 35px }@media (max-width: 549px) {.header-main{height: 70px}#logo img{max-height: 70px}}.header-top{background-color:rgba(255,255,255,0)!important;}/* Color */.accordion-title.active, .has-icon-bg .icon .icon-inner,.logo a, .primary.is-underline, .primary.is-link, .badge-outline .badge-inner, .nav-outline > li.active> a,.nav-outline >li.active > a, .cart-icon strong,[data-color='primary'], .is-outline.primary{color: #0029ff;}/* Color !important */[data-text-color="primary"]{color: #0029ff!important;}/* Background Color */[data-text-bg="primary"]{background-color: #0029ff;}/* Background */.scroll-to-bullets a,.featured-title, .label-new.menu-item > a:after, .nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,button[type="submit"], .button.wc-forward:not(.checkout):not(.checkout-button), .button.submit-button, .button.primary:not(.is-outline),.featured-table .title,.is-outline:hover, .has-icon:hover .icon-label,.nav-dropdown-bold .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold > li > a:hover, .nav-dropdown-bold.dark .nav-column li > a:hover, .nav-dropdown.nav-dropdown-bold.dark > li > a:hover, .header-vertical-menu__opener ,.is-outline:hover, .tagcloud a:hover,.grid-tools a, input[type='submit']:not(.is-form), .box-badge:hover .box-text, input.button.alt,.nav-box > li > a:hover,.nav-box > li.active > a,.nav-pills > li.active > a ,.current-dropdown .cart-icon strong, .cart-icon:hover strong, .nav-line-bottom > li > a:before, .nav-line-grow > li > a:before, .nav-line > li > a:before,.banner, .header-top, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover, .button.primary:not(.is-outline), input[type='submit'].primary, input[type='submit'].primary, input[type='reset'].button, input[type='button'].primary, .badge-inner{background-color: #0029ff;}/* Border */.nav-vertical.nav-tabs > li.active > a,.scroll-to-bullets a.active,.nav-pagination > li > .current,.nav-pagination > li > span:hover,.nav-pagination > li > a:hover,.has-hover:hover .badge-outline .badge-inner,.accordion-title.active,.featured-table,.is-outline:hover, .tagcloud a:hover,blockquote, .has-border, .cart-icon strong:after,.cart-icon strong,.blockUI:before, .processing:before,.loading-spin, .slider-nav-circle .flickity-prev-next-button:hover svg, .slider-nav-circle .flickity-prev-next-button:hover .arrow, .primary.is-outline:hover{border-color: #0029ff}.nav-tabs > li.active > a{border-top-color: #0029ff}.widget_shopping_cart_content .blockUI.blockOverlay:before { border-left-color: #0029ff }.woocommerce-checkout-review-order .blockUI.blockOverlay:before { border-left-color: #0029ff }/* Fill */.slider .flickity-prev-next-button:hover svg,.slider .flickity-prev-next-button:hover .arrow{fill: #0029ff;}/* Background Color */[data-icon-label]:after, .secondary.is-underline:hover,.secondary.is-outline:hover,.icon-label,.button.secondary:not(.is-outline),.button.alt:not(.is-outline), .badge-inner.on-sale, .button.checkout, .single_add_to_cart_button, .current .breadcrumb-step{ background-color:#f7941d; }[data-text-bg="secondary"]{background-color: #f7941d;}/* Color */.secondary.is-underline,.secondary.is-link, .secondary.is-outline,.stars a.active, .star-rating:before, .woocommerce-page .star-rating:before,.star-rating span:before, .color-secondary{color: #f7941d}/* Color !important */[data-text-color="secondary"]{color: #f7941d!important;}/* Border */.secondary.is-outline:hover{border-color:#f7941d}.success.is-underline:hover,.success.is-outline:hover,.success{background-color: #0029ff}.success-color, .success.is-link, .success.is-outline{color: #0029ff;}.success-border{border-color: #0029ff!important;}/* Color !important */[data-text-color="success"]{color: #0029ff!important;}/* Background Color */[data-text-bg="success"]{background-color: #0029ff;}body{font-size: 100%;}@media screen and (max-width: 549px){body{font-size: 100%;}}body{font-family:"-apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif", sans-serif}body{font-weight: 0}body{color: #000000}.nav > li > a {font-family:"-apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif", sans-serif;}.mobile-sidebar-levels-2 .nav > li > ul > li > a {font-family:"-apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif", sans-serif;}.nav > li > a {font-weight: 700;}.mobile-sidebar-levels-2 .nav > li > ul > li > a {font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font, .off-canvas-center .nav-sidebar.nav-vertical > li > a{font-family: "Arimo", sans-serif;}h1,h2,h3,h4,h5,h6,.heading-font,.banner h1,.banner h2{font-weight: 700;}h1,h2,h3,h4,h5,h6,.heading-font{color: #140000;}.breadcrumbs{text-transform: none;}button,.button{text-transform: none;}.nav > li > a, .links > li > a{text-transform: none;}.section-title span{text-transform: none;}h3.widget-title,span.widget-title{text-transform: none;}.alt-font{font-family: "Open Sans", sans-serif;}.alt-font{font-weight: 300!important;}a{color: #0029ff;}a:hover{color: #1c2532;}.tagcloud a:hover{border-color: #1c2532;background-color: #1c2532;}input[type='submit'], input[type="button"], button:not(.icon), .button:not(.icon){border-radius: 5px!important}.absolute-footer, html{background-color: #000000}/* Custom CSS */.html_topbar_right .login-button:not(.icon){box-shadow:none;border-radius:5px !important;color:#fff;font-size:14px}.html_topbar_right .hotline-button:not(.icon){box-shadow:none;border-radius:5px;border-radius:5px !important;color:#000;background:#fff;border: 1px solid #0029ff}.html_topbar_right .hotline-button .phone{color:#f00;}.html_topbar_right .hotline-button:hover{color:#0029ff !important;}.form-search-domain .queryform{border-radius:5px;}/*Khuyến Mãi 2/9 */ .magiamgia:after{content: "";border-radius: 10px;border: 2px #dcb361 dashed;position: absolute;top: 20px;left: 20px;right: -20px;bottom: -20px; z-index:-1}.magiamgia .coupon{background: #37be39;padding: 5px;color: #fff;font-weight: normal;}.html.custom.html_nav_position_text{margin:0}.html.custom.html_nav_position_text_top{height: 20px;margin: 3px;}.blackfriday{padding-bottom:0 !important;}.page-template-page-transparent-header-light .html_topbar_left,.page-template-page-transparent-header-light #mega-menu-wrap-top_bar_nav #mega-menu-top_bar_nav>li.mega-menu-item>a.mega-menu-link,.page-template-page-transparent-header-light #mega-menu-wrap-primary #mega-menu-primary>li.mega-menu-item>a.mega-menu-link{color:#fff;}.page-template-page-transparent-header-light .stuck #wide-nav{background:#000 !important; box-shadow:none}.price-blackfriday2020 .header{background: #ffb301;text-align: center;}.price-blackfriday2020 .header td{text-align: center;padding: 15px;font-size: 14px;color: #000;font-weight: bold;text-transform: uppercase;}.price-blackfriday2020 table{border-collapse: collapse;border-top:1px solid #ffb301;}.price-blackfriday2020 table td{border: 1px solid #ffb301;color: #fff;font-size: 16px;padding: 15px 10px; border-bottom-color: #cccccc26;border-top: 0;}.price-blackfriday2020 table tr:last-child td{border-bottom: 1px solid #ffb301;}.price-blackfriday2020 table tr td:first-child{color: #ffb301;font-weight: bold;}.price-blackfriday2020 a:hover{color:#ffb301}.price-blackfriday2020:before{content: "";background-image: url(https://tinohost.com/wp-content/uploads/2020/11/Group-82.png);background-size: 92%;background-repeat: no-repeat;height: 100%;width: 200px;position: absolute;left: 0;transform: translateX(-82%);z-index:-1;}.price-blackfriday2020:after{content: "";z-index:-1;background-repeat: no-repeat;background-image: url(https://tinohost.com/wp-content/uploads/2020/11/Group-7.png);background-size: 100%;height: 100%;width: 200px;position: absolute;right: 0;top: 0;transform: translateX(82%);}.price-blackfriday2020 .price-regular{color:#fff}.price-blackfriday2020 .price-sale{color:#fff;padding-top:10px;display:block}.page-template-page-transparent-header-light #mega-menu-wrap-top_bar_nav #mega-menu-top_bar_nav li#mega-menu-item-6656>a.mega-menu-link{color:#fff}.custom.html_nav_position_text .fb-like{margin-top:5px}.html.custom.html_nav_position_text_top{margin-top:0}.archive-page-header{display:none}.eafr-review-card-template-bubble-bubble{min-height:184px}.absolute-footer.dark{display:none}.page-id-7957 #main{background-image: url(https://tinohost.com/wp-content/uploads/2021/09/BannerWeb_Tino_KMcovid-1.png);background-size: cover;}/* Custom CSS Mobile */@media (max-width: 549px){price-blackfriday2020:after,price-blackfriday2020:before{display:none;}}.label-new.menu-item > a:after{content:"New";}.label-hot.menu-item > a:after{content:"Hot";}.label-sale.menu-item > a:after{content:"Sale";}.label-popular.menu-item > a:after{content:"Popular";}


      @media (max-width: 849px) {
         #logo {
           position: absolute;
          top: 0;
          left: 50%;
          transform: translateX(-50%);

         }
      }





   </style>


     <style>
                       
                           .container-width, .full-width .ubermenu-nav, .container, .row{
                            max-width: 1200px;
                           }
                        </style>


</head>
<body <?php body_class("home page-template page-template-page-blank page-template-page-blank-php page page-id-4021 mega-menu-primary mega-menu-top-bar-nav lightbox nav-dropdown-has-arrow nav-dropdown-has-shadow nav-dropdown-has-border parallax-mobile") ?>>
<?php do_action( 'p_before_body' ); ?>




      <div id="wrapper">
         <header id="header" class="header has-sticky sticky-jump sticky-hide-on-scroll" style="">
            <div class="header-wrapper">
               <div id="masthead" class="header-main hide-for-sticky">
                  <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">
                     <!-- Logo -->
                     <div id="logo" class="flex-col logo">
                        <!-- Header logo -->
                        <a href="<?php echo home_url() ?>" rel="home">
                           <img width="452"src="<?php echo get_field("op_logo_header","option")['url'] ? get_field("op_logo_header","option")['url'] : P_IMG  . '/wp.png' ?>" class="header_logo header-logo" alt="Logo" style="height:60px;">
                         
                        </a>
                     </div>
                     <!-- Mobile Left Elements -->
                     <div class="flex-col show-for-medium flex-left">
                        <ul class="mobile-nav nav nav-left ">
                           <li class="nav-icon has-icon">

                              <a href="<?php echo home_url() ?>" data-open="#main-menu" data-pos="left" data-bg="main-menu-overlay" data-color="dark" class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
                              <!-- <i class="icon-menu"></i> -->
                              <i class="fa fa-bars"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <!-- Left Elements -->
                     <div class="flex-col hide-for-medium flex-left
                        flex-grow">
                        <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                           <div id="mega-menu-wrap-top_bar_nav" class="mega-menu-wrap">
                              <div class="mega-menu-toggle">
                                 <div class="mega-toggle-blocks-left"></div>
                                 <div class="mega-toggle-blocks-center"></div>
                                 <div class="mega-toggle-blocks-right">
                                    <div class="mega-toggle-block mega-menu-toggle-block mega-toggle-block-1" id="mega-toggle-block-1" tabindex="0"><span class="mega-toggle-label" role="button" aria-expanded="false"><span class="mega-toggle-label-closed">MENU</span><span class="mega-toggle-label-open">MENU</span></span></div>
                                 </div>
                              </div>
                           </div>
                        </ul>
                     </div>
                     <!-- Right Elements -->
                     <div class="flex-col hide-for-medium flex-right">
                        <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                           <li class="html custom html_topbar_right"><a rel="noopener noreferrer" href="tel:<?php echo @str_replace(" ", "",  get_field("op_he_con_phone","option")); ?>" target="_blank" class="hotline-button button">
                              <i class="fa fa-phone"></i> 
                              <span>Tổng đài 24/7: </span>
                              <span class="phone"><?php echo get_field("op_he_con_phone","option") ?></span>
                              </a>
                           </li>
                        </ul>
                     </div>
                
                  </div>
                  <div class="container">
                     <div class="top-divider full-width"></div>
                  </div>
               </div>






 <div id="wide-nav" class="header-bottom wide-nav nav-dark hide-for-medium">
                  <div class="flex-row container">
                     <?php
                            if ( has_nav_menu( 'primary' ) ) {
                              wp_nav_menu( array(
                                'theme_location'  => 'primary',
                                // 'menu_class'      => 'p_mod_menu_primary',
                                'menu_class'      => 'list-unstyled list-menu-sumon-fixed',
                                'container'       => '',
                                'menu_id' => "mega-menu-primary",
                                 // 'walker'          => 'p_menu_primary_mod',

                              ) );


                            }
                            ?>


         </div>
   </div>


         </header>




























<?php 
// ================================================================================================================
// hook banner, breadcrum 
// ================================================================================================================
do_action( 'p_after_header' );

?>
