<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// var
// ==================================================================================================================
if ( !function_exists('p_var_ar1') ) :
function p_var_ar1($key="",$null = "" ) {
	global $wp;

	$wp_get_current_user = wp_get_current_user();

	unset( $wp_get_current_user->user_pass );


	unset( $wp_get_current_user->user_activation_key );

	$ars = array(
		
		'admin_ajax' => admin_url('admin-ajax.php'),
		'home' => home_url(),
		'is_localhost' => is_localhost(),
		'is_mobile' => wp_is_mobile(),
		'is_home' => is_home(),
		'is_rtl' => is_rtl(),
		'is_multisite' => is_multisite(),

		'role' => ( function_exists('p_get_current_user_role') && p_get_current_user_role() ) ? p_get_current_user_role() : "",
		'slug' => $wp->request,
		'current_url' => home_url( $wp->request ),
		//'user' => $wp_get_current_user,
		'p_nonce' => wp_create_nonce('p_nonce'),

		'debugweb' => isset( $_GET['debugweb'] ) ? true : false,
	);


	if ( class_exists('polylang') ) {

		// $ars['lang'] = p__current_lang();

		$ars['lang1'] = defined( 'lang1' ) ? lang1 :  "";

		$ars['lang2'] = defined( 'lang2' ) ? lang2 :  "";
		

	}

	

	$ars = apply_filters( 'p_var_ar1', $ars );

	if ( $key ) {

		return array_key_exists( $key , $ars ) ? $ars[$key] : $null;
	}

	//p_log( $ars, __FILE__, __LINE__ );

	return $ars;
}
endif;

// ==================================================================================================================
// body_class
// ==================================================================================================================
if ( !function_exists('p_add_body_class') ) :
add_filter( 'body_class', 'p_add_body_class' );
function p_add_body_class( $classes ) {

	$classes[] = is_localhost() ? "body_is_localhost" : "";

	$classes[] = is_home() || is_front_page() ? "body_is_home" : "";

	$classes[] = is_rtl() ? "body_is_rtl" : "";

	$classes[] = wp_is_mobile() ? "body_is_mobile" : "";

	$classes[] = ( function_exists('p_get_current_user_role') && p_get_current_user_role() ) ? 'body_is_' . p_get_current_user_role() : "";

    return $classes;
    
}
endif;
