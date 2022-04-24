<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// define
// ==================================================================================================================

//define('DISALLOW_FILE_MODS', true);
//define('DISALLOW_FILE_EDIT', true);
//define('ALLOW_UNFILTERED_UPLOADS', true);


defined( 'TDM' ) || define( 'TDM', 'ptheme' );
defined( 'P_DIR' ) || define( 'P_DIR', get_template_directory() );

defined( 'P_DIR_INC' ) || define( 'P_DIR_INC', P_DIR . '/inc' );


defined( 'P_URI' ) || define( 'P_URI', get_template_directory_uri() );

defined( 'P_ASSETS' ) || define( 'P_ASSETS', P_URI . '/assets' );
defined( 'P_IMG' ) || define( 'P_IMG', P_ASSETS . '/img' );
defined( 'P_CSS' ) || define( 'P_CSS', P_ASSETS . '/css' );
defined( 'P_JS' ) || define( 'P_JS', P_ASSETS . '/js' );
defined( 'P_LIB' ) || define( 'P_LIB', P_ASSETS . '/lib' );


defined( 'P_ACTIVE_CPT_UI' ) || define( 'P_ACTIVE_CPT_UI', ['post'] );

defined( 'P_ACTIVE_CPT_BLOCK_SHORTCODE' ) || define( 'P_ACTIVE_CPT_BLOCK_SHORTCODE', true );

defined( 'P_DISABLED_COMMENT' ) || define( 'P_DISABLED_COMMENT', true );


// =================================================================================================================
// show admin bar
// =================================================================================================================
defined( 'P_SHOW_ADMIN_BAR' ) || define( 'P_SHOW_ADMIN_BAR', true );

// =================================================================================================================
// header logo
// =================================================================================================================

defined( 'P_IMG_FAVICON' ) || define( 'P_IMG_FAVICON', function_exists('get_field') && get_field("op_logo_favicon","option")['url'] ? get_field("op_logo_favicon","option")['url'] : P_IMG  . '/wp.png' );

