<?php 
if ( ! defined( 'ABSPATH' ) ) exit;


// =========================================================================================================
// wp-admin: change default per_page: post
// =========================================================================================================
add_filter( "edit_post_per_page", "p_change_edit_post_per_page", 10);
function p_change_edit_post_per_page($num){
    $set_num = 99;
    $get_num = get_user_meta( get_current_user_id(), 'edit_post_per_page', true );
    return $get_num ? $get_num : $set_num;
}


// =========================================================================================================
// wp-admin: change default per_page: page, acf-field-group
// =========================================================================================================
add_filter( "edit_page_per_page", "p_change_edit_cpt_per_page", 10);
add_filter( "edit_acf-field-group_per_page", "p_change_edit_cpt_per_page", 10);
function p_change_edit_cpt_per_page($num){
     $set_num = 99;

     if ( isset( $_GET['post_type'] ) && $_GET['post_type']  ){
        $post_type = $_GET['post_type'];
      
        $get_num = get_user_meta( get_current_user_id(), "edit_{$post_type}_per_page", true );
        return $get_num ? $get_num : $set_num;
     }
    return $set_num;
}

// =========================================================================================================
// perpage
// =========================================================================================================

add_action( 'pre_get_posts', 'p_per_page_post' );
function p_per_page_post( $query ) {

	// print_r2( $query );
	// die;
	if ( ! is_admin() && $query->is_main_query() ) {

		$ar_page = [];

		// $ar_page = array_merge( $ar_page, [1121,2000] );

		// $page1 = get_permalink_ar_by_template( 'template/template-fullwidth.php');
  //     	$ar_page = array_merge( $ar_page, $page1 );


      	if ( $ar_page ){
			$query->set( 'post__not_in', array_unique($ar_page) );
		}

		// $query->set( 'post__not_in', array( 1131 ) );



	    if ( is_category() ) {

	     	// if ( isset($_GET['where']) && $_GET['where'] ){

	     	// 	 $query->set( 'posts_per_page', $_GET['where'] );

	     	// }

	       
	    }

     

    // if ( is_tax() ) {

    //     $query->set( 'posts_per_page', 9 );

    // }


	 // if( $query->is_search() ) {

	 // 	$query->set( 'posts_per_page', 16 );


		// $in_search_post_types = get_post_types( array( 'exclude_from_search' => false ) );

		// unset( $in_search_post_types[ 'page' ] );

		// $query->set( 'post_type', $in_search_post_types );


	 // }

	}
}


