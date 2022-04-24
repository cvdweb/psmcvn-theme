<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action("wp_head", function() { do_action('p_after_wp_head'); }, 9999999999 );
add_action("wp_footer", function() { do_action('p_after_wp_footer'); }, 99999999999 );


// ==================================================================================================================
// addcode Google ana, tag... 
// ==================================================================================================================
add_action("wp_head","p_add_code_head_tag", 999 );
function p_add_code_head_tag(){
	if ( !function_exists('get_field') ) return;

	if ( !is_localhost() && get_field("op_code_header","option") ):
		echo "\n\n<!-- code header tag  -->\n";
		echo get_field("op_code_header","option");
		echo "\n<!-- end code header tag -->\n\n";
	endif;
} 


// ==================================================================================================================
// addcode ...
// ==================================================================================================================
add_action("p_before_body","p_add_code_body_prepend_tag", -999 );
function p_add_code_body_prepend_tag(){
	if ( !function_exists('get_field') ) return;

	if ( !is_localhost() && get_field("op_code_body_prepend","option") ):
		echo "\n\n<!-- code body prepend -->\n";
		echo get_field("op_code_body_prepend","option");
		echo "\n<!-- end code body prepend -->\n\n";
	endif;
} 


// ==================================================================================================================
// addcode twank to..., 3rd..
// ==================================================================================================================
add_action("wp_footer","p_add_code_footer_tag", 999 );
function p_add_code_footer_tag(){
	if ( !function_exists('get_field') ) return;

	if ( !is_localhost() && get_field("op_code_footer","option") ):
		echo "\n\n<!-- code footer tag  -->\n";
		echo get_field("op_code_footer","option");
		echo "\n<!-- end code footer tag -->\n\n";
	endif;
} 


// ==================================================================================================================
// Add css
// ==================================================================================================================
//add_action('wp_head','p_acf_add_css_page');
function p_acf_add_css_page(){
	if ( !function_exists('get_field') ) return;
	global $post;
	if ( !is_singular() ) return; 
	if (  $css = trim(get_field('p_page_add_css', $post->ID) ) ){
		echo "\n\n<!-- add css page {$post->ID} -->\n";
		echo "<style>\n".$css."\n</style>";
		echo "\n<!-- end add css page {$post->ID} -->\n\n";
	}
}

// ==================================================================================================================
// Add js
// ==================================================================================================================
//add_action('wp_head','p_acf_add_js_page');
function p_acf_add_js_page(){
	if ( !function_exists('get_field') ) return;
	global $post;
	if ( !is_singular() ) return; 
	if ( $js = trim(get_field('p_page_add_js', $post->ID) ) ){
		echo "\n\n<!-- add js page  {$post->ID}-->\n";
		echo "<script>\n".$js."\n</script>";
		echo "\n<!-- end add js page {$post->ID} -->\n\n";
	}
}



