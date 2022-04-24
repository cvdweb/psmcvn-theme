<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ==================================================================================================================
// show shortcode
// ==================================================================================================================
function p_do_shortcode( $tag, array $atts = array(), $content = null ) {
  global $shortcode_tags;

  if ( ! isset( $shortcode_tags[ $tag ] ) ) {
    return false;
  }

  return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}


// ==================================================================================================================
// show demo shortcode
// ==================================================================================================================
add_shortcode("p_demo_shortcode","p_func_sc_p_demo_shortcode");
function p_func_sc_p_demo_shortcode( $atts ){
    ob_start();

    extract( shortcode_atts( array(
      'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
    
    ), $atts ) );
   
  ?>

      <div>
        <?php echo $text ?>
      </div>
  
  <?php
  return ob_get_clean();
}   

