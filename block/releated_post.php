<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !is_single() ) return;

wp_reset_postdata();
wp_reset_query();  

global $post;
$id_post = $post->ID; 

$ar_id = [];


// ======================================================================================================
// WP QUERY
// ======================================================================================================

$tax_name = 'category';
$num = 2;

$tax = wp_get_post_terms( $id_post , $tax_name, array( 'fields' => 'ids' ) );

// print_r2( $tax );

if ( !$tax ) return;


$args_related = array(

    'post_type' => get_post_type( $id_post ),
    'posts_per_page' => $num,
    'post__not_in' => array( $id_post ),
    'orderby' => "date",
    'order' => 'DESC',
    'ignore_sticky_posts' => false,
    "post_status" => "publish",
    

    'tax_query' => array(
	// 'relation' => 'AND',

	    array(

		    'taxonomy' => $tax_name,
		    'field' => 'term_id',
		    'terms' => $tax,
		    // 'compare' => '=',

	    )

    ),
    
);   

$ar_id = p_query_args( $args_related );


// END
// ======================================================================================================





if ( !$ar_id ) return;


?>

<div class="p-mt-20">
		
	<div>
		<div class="wg-title p-mb-15">
			<?php echo __("Bài viết liên quan", TDM ); ?>		
		</div>
	</div>

	<div>

		

			<?php foreach( $ar_id as $k => $v ) :
			
			 ?>
			 
				<!-- <div class="col-6 col-md-6 col-lg-4 p-mb-15"> -->
					<?php echo p_loop_item_1( $v ) ?>		
				<!-- </div> -->

			<?php endforeach; ?>

		

	</div>

</div>
