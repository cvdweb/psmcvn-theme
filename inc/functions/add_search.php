<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function p_search_ajax_content( $ar_id = "" ){
    ob_start();

    $data = $ar_id ? $ar_id : get_field("op_he_search_repeat","option");

    if ( $ar_id ){
      $check = true;
    } else {
      $check = false;
    }

  ?>  

    <?php if ( $data ) : ?>
        <ul class="ul-js-ajax-show-result">
          <?php foreach( $data  as $k => $v ) : 
              $id = $check == true ? $v : $v['op_he_search_repeat_id']->ID;
          ?>
              <li>
                  <a href="<?php echo get_the_permalink( $id ) ?>" class="a-flex-search">
                    <div class="a-flex-search-img">
                       <img height="70px" src="<?php echo p_post_img_link( $id ) ?>" alt="<?php echo p_post_img_alt( $id ) ?>" class="p-w-100pt">
                     </div>
                    <div class="p-pl-10 p-pr-10 p-pt-5 p-pb-5">
                        <div class="p-fs-12"><?php echo wp_trim_words( get_the_title( $id ) , '8', '...' );  ?></div>
                        <div class="p-fs-10"><?php echo wp_trim_words( get_the_excerpt( $id ) , '10', '...' );  ?></div>
                        
                      </div>
                  </a>
              </li>
          <?php endforeach; ?>

        </ul>
    <?php endif; ?>

  <?php
    return ob_get_clean();
}



add_action('wp_ajax_p_ajax_search', 'p_func_p_ajax_search');
add_action('wp_ajax_nopriv_p_ajax_search', 'p_func_p_ajax_search');

function p_func_p_ajax_search() {

  $data = $_POST;

  if ( !$data ) return;

  $search = $data['search'];

  wp_reset_postdata();
  wp_reset_query();  

  $num = 6;


    $args_related = array(
      's' => $search,
        'post_type' => 'post',
     
        'posts_per_page' => $num,
        
        'orderby' => "Date",
        'order' => 'DESC',
        'ignore_sticky_posts' => false,
        "post_status" => "publish",
      
    );   

    $the_query = new \WP_Query( $args_related );

    //print_r2( $the_query );

    $total = $the_query->found_posts;

    $ar_id = [];

    //echo "sad";

    if ( $the_query->have_posts() && $total > 0 ) :
        $i = 1;
        while ( $the_query->have_posts() ) : $the_query->the_post();    
            if ( $i > $num && $num >= 1 ) break;

                $ar_id[] = get_the_ID();

            $i++;
        endwhile;
    endif;


    wp_reset_postdata();
     wp_reset_query();  


    $data = trim(p_Minify_Html(p_search_ajax_content( $ar_id )));
    
    if ( $data ) {
      $stt = "yes";
    } else {
      $stt = "no";
    }


  $r = array(
    'stt' => $stt,
    'data' => $data,
  );

  wp_send_json( $r );

}