<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// ==================================================================================================================
// Status of title
// ==================================================================================================================
add_filter('display_post_states', 'p_custom_post_states', 10, 2);
function p_custom_post_states($states) { 
    global $post; 

  // ==================================================================================================================
  // Status of title
  // ==================================================================================================================
    if ( $post && $post->ID ) :
      // if (  in_array(  get_post_type( $post->ID ) , ['page','post'] ) )  :

        switch (get_page_template_slug( $post->ID )) :

          case "template/template-fullwidth.php";	
            $states[] = __("Giao diện đầy đủ", TDM );	
          break;

          case "template/template-right-content.php";	
            $states[] = __("Giao diện nội dung bên phải", TDM );	
          break;
        	
        endswitch;

      // endif;
    endif;

  // ==================================================================================================================
  // Status of shortcode
  // ==================================================================================================================

    // if ( has_shortcode(  $post->post_content , 'p_shortcode' ) ) :

    //     $states[] = '[p_shortcode]';


    // endif;

    return $states;
    
} 

