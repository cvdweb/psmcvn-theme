<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// ACF
// ==================================================================================================================

// !get field
if ( !function_exists('get_field') && !is_admin() ) { function get_field(){ return; } }

// active plugin
if( ! class_exists('ACF') ) return;

// role admin
if ( !current_user_can( "administrator") ) return;

// create page
if( !function_exists('acf_add_options_page') ) return; 

// acf polylang
if ( !function_exists('p_get_field') ) {
	function p_get_field( $field = '', $is_label = false, $end = '' ) {
		if ( function_exists( 'pll_current_language' ) ) {
			$field = $field . '_' . pll_current_language();
		}

		if ( $is_label ) return $field;
		return get_field( $field, $end );
	}
}



// ==================================================================================================================
// Hide ACF
// ==================================================================================================================

//add_filter('acf/settings/show_admin', 'p_my_acf_show_admin');
function p_my_acf_show_admin( $show ) {
	$current_user = wp_get_current_user();
	return $current_user->user_login == 'admin';
}


// ==================================================================================================================
// create page
// ==================================================================================================================

acf_add_options_page(array(
	'page_title' 	=> 'Page Option',
	'menu_title'	=> 'Page Option',
	'menu_slug' 	=> 'p-option-page',
	'capability'	=> 'edit_posts',
	'redirect'		=> admin_url('admin.php?page=page_option') ,
	'icon_url' => 'dashicons-admin-home',
	'position' => 2,

	

));


acf_add_options_sub_page(array(
	'page_title' 	=> 'Page Option',
	'menu_title'	=> 'Page Option',
	'menu_slug' 	=> 'page_option',
	'parent_slug'	=> 'p-option-page',
));


acf_add_options_sub_page(array(
	'page_title' 	=> 'Page Login Admin',
	'menu_title'	=> 'Page Login Admin',
	'menu_slug' 	=> 'page_login_admin',
	'parent_slug'	=> 'p-option-page',
));



acf_add_options_sub_page(array(
	'page_title' 	=> 'Header',
	'menu_title'	=> 'Header',
	'menu_slug' 	=> 'header',
	'parent_slug'	=> 'p-option-page',
));

acf_add_options_sub_page(array(
	'page_title' 	=> 'Menu',
	'menu_title'	=> 'Menu',
	'menu_slug' 	=> 'menu',
	'parent_slug'	=> 'p-option-page',
));


acf_add_options_sub_page(array(
	'page_title' 	=> 'Homepage',
	'menu_title'	=> 'Homepage',
	'menu_slug' 	=> 'Homepage',
	'parent_slug'	=> 'p-option-page',
));


acf_add_options_sub_page(array(
	'page_title' 	=> 'Sidebar',
	'menu_title'	=> 'Sidebar',
	'menu_slug' 	=> 'sidebar',
	'parent_slug'	=> 'p-option-page',
));




acf_add_options_sub_page(array(
	'page_title' 	=> 'Footer',
	'menu_title'	=> 'Footer',
	'menu_slug' 	=> 'footer',
	'parent_slug'	=> 'p-option-page',
));


// acf_add_options_sub_page(array(
// 	'page_title' 	=> 'Social',
// 	'menu_title'	=> 'Social',
// 	'menu_slug' 	=> 'social',
// 	'parent_slug'	=> 'p-option-page',
// ));






// option of custom post type 
// acf_add_options_sub_page(array(
//     'page_title'     => 'Code Coupon',
//     'menu_title'    => 'Coupon',
// 	    'menu_slug'    => 'Coupon',
//     'parent_slug'    => 'edit.php?post_type={custom_post_type}',
// ));





// ==================================================================================================================
// calc menu redirect
// ==================================================================================================================
add_action('admin_head','p_acf_redirect_calc');
function p_acf_redirect_calc(){

   $ar = get_current_screen();
 //  print_r2( $ar );

   // menu

   // acf option -> nav
   if ( $ar->base == "page-option_page_" . "menu" ) {
   		wp_redirect( admin_url( 'nav-menus.php' ) );
   		exit;
   }

   // nav -> acf option
   // if ( $ar->base == 'nav-menus' ){
 	 //  wp_redirect( admin_url( "admin.php?page=" . "menu_in"  ) );
   // 	  exit;
   // }


   // sidebar
   if ( $ar->base == "page-option_page_" . "sidebar" ) {
   		wp_redirect( admin_url( 'widgets.php' ) );
   		exit;
   }

   //  if ( $ar->base == 'nav-menus' ){
 	 //  wp_redirect( admin_url( "admin.php?page=" . "menu_in"  ) );
   // 	  exit;
   // }
}



// ==================================================================================================================
// default value
// ==================================================================================================================
// add_filter('acf/load_value/key=field_600e5fee3dbb1',  'afc_load_my_repeater_value', 10, 3);
function afc_load_my_repeater_value($value, $post_id, $field) {
     if ($post_id === false) {
        $value  = array();
        $value[] = array(
            'field_600e6000e92ed' => 'Hours',
           
        );
        $value[] = array(
            'field_600e6000e92ed' => 'Minutes'
        );

        $value[] = array(
            'field_600e5fee3dbb1'  => 'Seconds'
        );

     }
    return $value;
}



// ==================================================================================================================
// script js mod
// https://www.advancedcustomfields.com/resources/javascript-api/
// https://www.advancedcustomfields.com/resources/adding-custom-javascript-fields/
// ==================================================================================================================
add_action('acf/input/admin_footer', 'p_my_acf_input_admin_footer');
function p_my_acf_input_admin_footer() {
?>
<script>
// change default color
acf.add_filter('color_picker_args', function( args, field ){
    args.palettes = [ "#000000", "#ffffff", "#95a5a6",  "#c0392b", "#e67e22", "#f1c40f", "#2ecc71", "#16a085" ,"#2980b9", "#8e44ad"  ];
    return args;
});

</script>
<?php 
}



// ==================================================================================================================
// change text add row
// ==================================================================================================================
add_action( 'acf/load_field/type=repeater', 'p_acf_change_add_row', 99999 );
add_action( 'acf/load_field/type=flexible_content', 'p_acf_change_add_row', 99999 );
function p_acf_change_add_row( $field ){

    // print_r2( $field );

    if ( $field['button_label'] == "" ) {

        $field['button_label'] = __("Add Data", TDM );

    }

    return $field;
}


