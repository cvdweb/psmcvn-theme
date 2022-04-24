<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// related post cat
// ==================================================================================================================
function p_is_post_exists( $post_id = "", $cpt = [] ){

    if ( $post_id == false ) {

    	return false;
        
    }

    if ( !get_post( $post_id ) ){

    	return false;
    }

    if ( get_post_status( $post_id ) != "publish" ){

    	return false;

    }

    $check_cpt = $cpt ? in_array( get_post_type( $post_id ), $cpt ) : true;


    if (  !$check_cpt ){

        return false;

    }


    return $post_id;


}

// ==================================================================================================================
// 16/06/2020: Link template, use data $page[0]
// ==================================================================================================================
function get_permalink_by_template( $template = "" ) {
  if ( !$template ) return;
  $permalink = '#';
  
  $page = get_permalink_ar_by_template( $template );

  if ( $page && $page[0] ) {
    $page_id = $page[0]->ID;
    $permalink = get_permalink( $page_id );
  }

  return $permalink;
}


function get_permalink_ar_by_template( $template = "" ) {
    if ( !$template ) return;

  // $page = get_pages(
  //   array(
  //     'meta_key' => '_wp_page_template',
  //     'meta_value' => $template,

  //   )
  // );

  $args_related = array(

    'post_type' => get_post_types(),
    'posts_per_page' => -1,
    // 'post__not_in' => array( $id_post ),
    'orderby' => "date",
    'order' => 'DESC',
    'ignore_sticky_posts' => false,
    "post_status" => "publish",
    
    'meta_key'   => '_wp_page_template',
    'meta_value' => $template,
    
    'nopaging' => true,

  );   


  $ar_id = p_query_args( $args_related );

  return $ar_id ? $ar_id : false;
}





// ==================================================================================================================
// 16/06/2020: if template not use editor
// ==================================================================================================================
//add_action( 'admin_init', 'p_remove_editor_on_specific_page' );
function p_remove_editor_on_specific_page() {
  
    $post_id = 0;

    if ( isset( $_GET['post'] ) ) {
      $post_id = $_GET['post'];
    }

    $templates = array(

     // 'template/template-login.php',

    );

    global $post;

    $template_name = get_post_meta( $post->ID , '_wp_page_template', true );

    if ( in_array( $template_name, $templates ) ) {

      remove_post_type_support('page', 'editor');

    }
  
}


// ==================================================================================================================
// add class the content
// ==================================================================================================================

// add_filter( 'the_content' , 'p_the_content_add_wrap', 999999 );
// function p_the_content_add_wrap( $content ){
//   return '<div class="div-the-con">'.$content."</div>";
// }





// ==================================================================================================================
// 17/07/2020: add newtab
// ==================================================================================================================
if ( !function_exists('p_make_clickable2') ):
function p_make_clickable2($data=""){
  return $data ? preg_replace('/<a /','<a target="_blank" ', make_clickable( $data ) ) : false;
}
endif;



// ==================================================================================================================
// Code dem so dong trong van ban
// ==================================================================================================================
function p_count_paragraph( $insertion, $paragraph_id, $content ) {
        $closing_p = '</p>';
        $paragraphs = explode( $closing_p, $content );
        foreach ($paragraphs as $index => $paragraph) {
                if ( trim( $paragraph ) ) {
                        $paragraphs[$index] .= $closing_p;
                }
                if ( $paragraph_id == $index + 1 ) {
                        $paragraphs[$index] .= $insertion;
                }
        }
 
        return implode( '', $paragraphs );
}

// ==================================================================================================================
// chen bai viet lien quan giua noi dung
// ==================================================================================================================
//add_filter( 'the_content', 'prefix_insert_post_ads' );
function p_prefix_insert_post_ads( $content ) {
 
        $related_posts= do_shortcode('[p_chen_code]');
 
        if ( is_single() ) {
                return p_count_paragraph( $related_posts, 1 , $content );
        }
 
        return $content;
}




// ==================================================================================================================
// 08/06/2020: thoi gian dang bai
// ==================================================================================================================
function p_the_date( $code = 'd/m/Y', $id = "" ){
   global $post;

   if ( !$id ) $id = $post->ID;


   $datetime = get_the_date('Y-m-d H:i:s');

   $time_return = get_the_date( $code );
 
   $unix = strtotime( $datetime );

   $now = strtotime("now");

   // bai dang chua public, bai hen gio
   if (  $now < $unix  ){
    
      return $time_return;

   }

   $time_distance = $now - $unix;

  if ( $time_distance < 60  ) {

      return __("Vừa xong", TDM );

   }  

   else if ( $time_distance < 60*60  ) {

      return sprintf( __("Cách đây %s phút", TDM ) , floor( $time_distance / 60 ) );

   } 
   
    else if ( $time_distance < 60*60*24  ) {

      return sprintf( __("Cách đây %s giờ", TDM ) , floor( $time_distance / ( 60*60 ) ) );


   }

   else if ( $time_distance < 60*60*24*7  ) {

      return sprintf( __("Cách đây %s ngày", TDM ) , floor( $time_distance / ( 60*60*24 ) ) );

   }

   return $time_return;


}


// ==================================================================================================================
// related post cat
// ==================================================================================================================
function p_query_args( $args_related = false, $num = 0 ){

    if ( $args_related == false ) return;

    wp_reset_postdata();
    wp_reset_query();  

    $the_query = new WP_Query( $args_related );
    $total = $the_query->found_posts;

    $ar_id = [];

    if ( $the_query->have_posts() && $total > 0 ) :
        $i = 1;
        while ( $the_query->have_posts() ) : $the_query->the_post();  

            if ( $i > $num && $num > 0 ) break;

                $ar_id[] = get_the_ID();

            $i++;


        endwhile;
    endif;


    wp_reset_postdata();
    wp_reset_query();  

    return $ar_id ? $ar_id : false;

}




// ==================================================================================================================
// content
// ==================================================================================================================
function p_content_none(){
   ob_start();
?>

  <div>
    <?php echo __('Không có sản phẩm nào !', TDM ); ?>
  </div>

<?php 
  return ob_get_clean();
}



