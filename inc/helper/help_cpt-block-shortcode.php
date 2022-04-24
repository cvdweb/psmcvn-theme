<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// =====================================================================================================================
// Post Type: Block Shortcode.
// =====================================================================================================================
if ( !class_exists('P_Cpt_Block_Shortcode') ) :
class P_Cpt_Block_Shortcode {

	public $cpt = 'cpt_block_sc';

	public function __construct() {
		$this->init();
	}

	// ======================================================
	// init
	// ======================================================
	public function init() {

		add_action( 'init', [ $this, 'register_cpt' ], 5 );

		// Custom columns
		add_filter( 'manage_' . $this->cpt .  '_posts_columns', [ $this,  'view_table' ] );
		add_action( 'manage_' . $this->cpt . '_posts_custom_column' , [ $this,  'view_column' ] , 10, 3 );


		// shortcode
		add_filter( 'save_post', [ $this,  'save_post' ]  );

		add_shortcode("p_block",[ $this, "shortcode"]);

	}

	// ======================================================
	// REGIS
	// ======================================================
	public function register_cpt() {


		$args = array(
			"label" => "Block Shortcode",
			"labels" => [ "name" => "Block Shortcode" , "singular_name" => "Block Shortcode" ] ,
			"description" => "",
			"public" => false,
			"publicly_queryable" => false,
			"show_ui" => true,
			"delete_with_user" => false,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => false,
			"query_var" => false,
			'menu_icon' => 'dashicons-editor-code',

			'menu_position' => 3,

			"supports" => array( "title", "editor" ),

		);

		register_post_type( $this->cpt , $args );
	}

	// ======================================================
	// Add the custom columns
	// ======================================================
	public function view_table( $cols ) {


		$cols_new = [];

		$i = 1;
		foreach( $cols as $key => $col ){

			$cols_new[ $key ] = $col;

			if ( $i == 2 ) {

				$cols_new['shortcode']  = __('Shortcode', TDM );
			}

			$i++;
		}

	    return $cols_new;


	}

	// ======================================================
	// Add the data to the custom columns
	// ======================================================
	public function view_column( $col, $post_id ) {

	   	switch ( $col ) {

        case 'shortcode':
       	   $meta_key =  $this->cpt . '_shortcode';
           $view_post = get_post_meta( $post_id ,  $meta_key  , true );
           $view_post_show = !empty($view_post) ? "<input style='background:white' readonly type='text' value='" . $view_post . "'>" : '';
           echo $view_post_show;
        break; 
	    }
	}


	// ======================================================
	// Add the data to list brand
	// ======================================================
	public function save_post( $post_id ){

		if ( get_post_type( $post_id  ) != $this->cpt ) return;

		$meta_key = $this->cpt . '_shortcode';
		
		$view_post = get_post_meta( $post_id , $meta_key , true );

		if ( !$view_post ) {

			add_post_meta( $post_id , $meta_key , "[p_block id=\"$post_id\"]"   );

		} 
	}


	// ======================================================
	// [p_block id="12"]
	// ======================================================
	public function shortcode( $atts ){
   
	    extract( shortcode_atts( array(
	      "id" => '',
	      
	    ), $atts ) );

	    if ( !$id || get_post_type( $id) != $this->cpt || get_post_status( $id  ) != "publish"  ) return;

	    ob_start();
			echo str_replace( "\n" , "<br/>", get_the_content( '', '', $id ) ); 

	 	return ob_get_clean();
	}

}

new P_Cpt_Block_Shortcode;

endif;