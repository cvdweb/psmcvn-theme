<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ======================================================================================================================
// Post Type: post mod
// ======================================================================================================================
if ( !class_exists('P_Cpt_Post_Mod') && defined( 'P_ACTIVE_CPT_UI' ) && P_ACTIVE_CPT_UI !== false && is_array( P_ACTIVE_CPT_UI  ) && count( P_ACTIVE_CPT_UI ) > 0 ) :
	
class P_Cpt_Post_Mod {

	public $cpts = P_ACTIVE_CPT_UI;


	public function __construct() {
		$this->init();
	}


	// ==================================================================================================================
	// init
	// ==================================================================================================================
	public function init() {


		// Custom columns
		if ( $this->cpts ) :
			foreach( $this->cpts as $cpt ) :

				add_filter( 'manage_' . $cpt .  '_posts_columns', [ $this,  'p_view_post_table' ] );
				add_action( 'manage_' . $cpt . '_posts_custom_column' , [ $this,  'p_view_post_column' ] , 10, 3 );

			endforeach;
		endif;

		add_action('admin_head', [ $this,'p_view_post_css']);

	}


	// ==================================================================================================================
	// Add the custom columns
	// ==================================================================================================================
	public function p_view_post_table( $cols ) {

		$cols_new = [];

		$i = 0;

		foreach( $cols as $key => $col ){

			if ( $i == 1 ) $cols_new[ 'avt' ] = __('Images');
		

			$cols_new[ $key ] = $col;

			$i++;
		}

	    return $cols_new; 
	}


	// ==================================================================================================================
	// Add link image
	// ==================================================================================================================
	public function p_link_img( $id = false ,$size = false, $echo = false ) {

		  $r = !empty(  wp_get_attachment_image_src( get_post_thumbnail_id( $id ? $id : false ),$size)[0] ) ?
		     wp_get_attachment_image_src( get_post_thumbnail_id(  $id ? $id : false ),$size)[0] : 
		     $this->p_link_img_placeholder();

		 if ( $echo ) { echo $r; } else { return $r;  }


	}


	// ==================================================================================================================
	// Add placeholder
	// ==================================================================================================================
	public function p_link_img_placeholder() {

		 return apply_filters( 'P_Cpt_Post_Mod_p_apply_link_img_placeholder', P_IMG. '/placeholder_150.jpg' );

	}


	// ==================================================================================================================
	// Add the data to the custom columns
	// ==================================================================================================================

	public function p_view_post_column( $col, $post_id ) {

	   	 switch ( $col ) {

	        case 'avt':
	        
	       	   echo "<a href='".get_edit_post_link($post_id)."'>";
	         	  echo "<img src='".$this->p_link_img($post_id,'thumbnail')."' alt='image'>";
	           echo "</a>";

	        break; 
	    }
	}


	// ==================================================================================================================
	// Add css
	// ==================================================================================================================

	public function p_view_post_css() {
		$c = get_current_screen();
		//print_r($c);

		if ( !$c->post_type ) return;

	
			if (  !( in_array( $c->post_type , $this->cpts ) && in_array( str_replace( 'edit-', '', $c->id) , $this->cpts ) )  ) return; 
	
		?>
			<style type="text/css">
				th#avt{
					width: 60px;
				}

				td.avt a {

					box-shadow:none !important;
					outline:none !important;

				}

				td.avt a img{
					box-shadow:none !important;
					outline:none !important;

					object-fit:cover;
					border:1px solid #ccc;
					padding: 2px;
					background: white;

					width: 60px;
					height: 60px;
				}
				
				td.avt a img:hover{

					border-color: #ddd;

				}

			</style>

		<?php

			
	}



}

new P_Cpt_Post_Mod;

endif;