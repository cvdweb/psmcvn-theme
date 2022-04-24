<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
//return;

//if ( !is_admin() ) return;

// ==================================================================================================================
// support plugin
// ==================================================================================================================

//add_action('admin_head','p_mod_plugin_css_s1');

function p_mod_plugin_css_s1(){
	 
	$ar = get_current_screen();
	 // print_r2( $ar );

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


	//if ( is_plugin_active( 'admin-columns-pro-master/admin-columns-pro.php' ) ) :

		

	// endif;


}
