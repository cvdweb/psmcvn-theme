<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// define
// ==================================================================================================================

require_once get_template_directory() . '/inc/define.php';


// ==================================================================================================================
// helper
// ==================================================================================================================

// default
require_once get_template_directory() . '/inc/helper/help_function_default.php';




// support disable comment
if ( defined( 'P_DISABLED_COMMENT' ) && P_DISABLED_COMMENT !== false ) {
	require_once get_template_directory() . '/inc/helper/help_disabled_comment.php';
}

// support cpt block shortcode


if ( defined( 'P_ACTIVE_CPT_BLOCK_SHORTCODE' ) && P_ACTIVE_CPT_BLOCK_SHORTCODE !== false) {
	require_once get_template_directory() . '/inc/helper/help_cpt-block-shortcode.php';
}




// ==================================================================================================================
// default
// ==================================================================================================================

require_once get_template_directory() . '/inc/functions/add_theme_support.php';

// wp theme
// require_once get_template_directory() . '/inc/functions/add_wp_admin_theme_color.php';

require_once get_template_directory() . '/inc/functions/add_wp_login.php';


require_once get_template_directory() . '/inc/functions/add_functions.php';

require_once get_template_directory() . '/inc/functions/add_functions_post.php';

require_once get_template_directory() . '/inc/functions/add_css_js.php';

require_once get_template_directory() . '/inc/functions/add_code_bla.php';

require_once get_template_directory() . '/inc/functions/add_banner.php';

require_once get_template_directory() . '/inc/functions/add_breadcrum.php';


// require_once get_template_directory() . '/inc/functions/add_widget.php';


if ( defined( 'P_DISABLED_COMMENT' ) && P_DISABLED_COMMENT === false ) {
	require_once get_template_directory() . '/inc/functions/add_comment.php';
}


require_once get_template_directory() . '/inc/functions/add_status.php';

require_once get_template_directory() . '/inc/functions/add_ajax.php';

require_once get_template_directory() . '/inc/functions/add_short_code.php';


// require_once get_template_directory() . '/inc/functions/add_button_tinymce.php';

require_once get_template_directory() . '/inc/functions/add_search.php';

require_once get_template_directory() . '/inc/functions/add_per_page.php';

require_once get_template_directory() . '/inc/functions/add_rewrite_rule.php';


require_once get_template_directory() . '/inc/functions/add_nav.php';


//require_once get_template_directory() . '/inc/functions/add_template.php';





//require_once get_template_directory() . '/inc/functions/add_mod_plugin.php';




require_once get_template_directory() . '/inc/functions/add_item_loop.php';


// require_once get_template_directory() . '/inc/functions/add_text.php';






// ==================================================================================================================
// ==================================================================================================================
// cpt
// ==================================================================================================================
// ==================================================================================================================
if ( defined( 'P_ACTIVE_CPT_UI' ) && P_ACTIVE_CPT_UI !== false && is_array( P_ACTIVE_CPT_UI  ) && count( P_ACTIVE_CPT_UI ) > 0 ){ 

	require_once get_template_directory() . '/inc/cpt/class-post-mod.php';

}


// require_once get_template_directory() . '/inc/cpt/class-contact.php';



// ==================================================================================================================
// ==================================================================================================================
// acf
// ==================================================================================================================
// ==================================================================================================================
require_once get_template_directory() . '/inc/acf/create_page.php';



// ==================================================================================================================
// ==================================================================================================================
// polylang
// ==================================================================================================================
// ==================================================================================================================
require_once get_template_directory() . '/inc/polylang/rewrite-slugs/add_polylang-translate-rewrite-slugs.php';
require_once get_template_directory() . '/inc/polylang/add_polylang.php';





// ==================================================================================================================
// ==================================================================================================================
// tinymce
// ==================================================================================================================
// ==================================================================================================================
require_once get_template_directory() . '/inc/tinymce/add_button_border.php';




// ==================================================================================================================
// ==================================================================================================================
// user
// ==================================================================================================================
// ==================================================================================================================

//require_once get_template_directory() . '/inc/user/init.php';




// ==================================================================================================================
// ==================================================================================================================
// ecom
// ==================================================================================================================
// ==================================================================================================================

//require_once get_template_directory() . '/inc/ecom/init.php';




// ==================================================================================================================
// local script
// ==================================================================================================================
require_once get_template_directory() . '/inc/functions/add_local_script.php';
