<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// return;
// ==================================================================================================================
// widget sidebar
// ==================================================================================================================
register_sidebar(array(
'name' => __('Widget Sidebar'), 
'id' => 'sidebar-1',  
'description' => __('Widget Sidebar'),
'before_widget' => '<div id="%1$s" class="%2$s sidebar-blog sidebar-blog-content">',
'after_widget' => '</div><div class="clearfix"></div>',
'before_title'  => '<h4 class="wg-title">',  /**/
'after_title'   => '</h4>'
));

// ==================================================================================================================
// widget footer
// ==================================================================================================================
register_sidebar(array(
'name' => __('Widget Footer'),
'id' => 'sidebar-footer', 
'description' => __('Widget Footer'),
'before_widget' => '<div class="col-12 col-md-6 col-lg-3"><div id="%1$s" class="%2$s sidebar-blog sidebar-footer">', /**/
'after_widget' => '</div></div>',
'before_title'  => '<h4 class="wg-title">',  /**/
'after_title'   => '</h4>'
));

