<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ======================================================================================================================
// Post Type: Entertainment.
// ======================================================================================================================
if ( !class_exists('P_Cpt_Entertainment') ) :

class P_Cpt_Entertainment {

	public $cpt = 'cpt_entertainment';

	public function __construct() {
		$this->init();
	}

	// ==================================================================================================================
	// init
	// ==================================================================================================================
	public function init() {

		// regis
		add_action( 'init', [ $this, 'p_register_post_type' ], 5 );

		add_action( 'init', [ $this, 'p_register_tax_category' ], 5 );

		add_action( 'init', [ $this, 'p_register_tax_tag' ], 5 );

		// add_action( 'init', [ $this, 'p_insert_default_term' ], 5 );

		// create columns
		add_filter( 'manage_' . $this->cpt .  '_posts_columns', [ $this,  'p_view_post_type_table' ] );

		// add data columns
		add_action( 'manage_' . $this->cpt . '_posts_custom_column' , [ $this,  'p_view_post_type_column' ] , 10, 3 );


		// sortable
		add_filter( 'manage_edit-' . $this->cpt . '_sortable_columns', [ $this, 'p_sortable_post_type_column'] );



		// add_filter( "manage_edit-". 'cpt_entertainment_tax_category' ."_columns", [ $this, 'custom_column_header' ] , 10);

		// add_action( "manage_". 'cpt_entertainment_tax_category' ."_custom_column", [ $this, 'custom_column_content' ], 10, 3);


		// // sortable
		// add_filter( 'manage_edit-' . 'cpt_entertainment_tax_category' . '_sortable_columns', [ $this, 'p_sortable_post_type_column2'] );



	}


	// ==================================================================================================================
	// REGIS
	// ==================================================================================================================
	public function p_register_post_type() {


		$args = [

			"label" => __("Entertainment", TDM ),
			"labels" =>  [ "name" => __("Entertainment", TDM )  , "singular_name" => __("Entertainment", TDM ) ],

			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			//"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'rewrite'   => array( 'slug' => 'giai-tri', 'with_front' => false),

			"query_var" => true,
			"supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "revisions", "author" ],
			

			'menu_icon' => 'dashicons-admin-site',
			'menu_position' 			=> 3,
		];

	
		register_post_type( $this->cpt , $args );
	}



	// ==================================================================================================================
	// Taxonomy: Cateogory
	// ==================================================================================================================
	
	public function p_register_tax_category() {


		$args = [

			"label" => __( "Categories"),
			"labels" => [ "name" => __( "Categories") , "singular_name" => __( "Categories") ],
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => true,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			
			"show_admin_column" => false,
			"show_in_rest" => true,
		
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"show_in_quick_edit" => false,

			"rewrite" => [ 'slug' => 'chuyen-muc-giai-tri' , 'with_front' => true ],

		];

		register_taxonomy( $this->cpt . "__tax_category", [ $this->cpt ], $args );

	}


	// ==================================================================================================================
	// Taxonomy: tag
	// ==================================================================================================================
	
	public function p_register_tax_tag() {


		$args = [

	
			"label" => __( "Tags"),
			"labels" => [ "name" => __( "Tags") , "singular_name" => __( "Tags") ],
			"public" => true,
			"publicly_queryable" => true,
			"hierarchical" => false,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"show_admin_column" => false,
			"show_in_rest" => true,
		
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"show_in_quick_edit" => false,

			"rewrite" => [ 'slug' => 'tag-giai-tri' , 'with_front' => true, ],
		];

		register_taxonomy(  $this->cpt . "__tax_tag", [ $this->cpt ], $args );

	}


	// ==================================================================================================================
	// Insert default term
	// ==================================================================================================================
	public function p_insert_default_term() {
	
		
		$taxonomy =  $this->cpt . '__tax_category';

		// delete_option('default_' . $taxonomy);
		

			// check if term exists
			$term_exists = term_exists('blog', $taxonomy );

			if ( !$term_exists ) {
				// if term is not exist, insert it
				$term = wp_insert_term('Blog', $taxonomy, array('slug' => 'blog') );


				// wp_insert_term returns an array on success so we need to get the term_id from it
				$default_term = ( $term && is_array( $term ) ) ? $term['term_id'] : false;
			} else {
				//if default term is already inserted, term_exists will return it's term_id
				$default_term = $term_exists['term_id'];
			}

			// Setting default_{$taxonomy} option value as our default term_id to make them default and non-removable (like default uncategorized WP category)
			$stored_default_term = get_option( 'default_' . $taxonomy);

			if ( empty( $stored_default_term ) && $default_term ) :

				update_option( 'default_' . $taxonomy , $default_term );

			endif;
	
	}
	

	// ==================================================================================================================
	// Add the custom columns
	// ==================================================================================================================
	public function p_view_post_type_table( $cols ) {

		
		$cols_new = [];

		$i = 1;
		foreach( $cols as $key => $col ){

			$cols_new[ $key ] = $col;

			if ( $key == 'title' ) {

				$cols_new['category']  = __('Category');

				$cols_new['tag']  = __('Tag');

			}

			$i++;
		}

	    return $cols_new;


	}


	// ==================================================================================================================
	// Add the data to the custom columns
	// ==================================================================================================================

	public function p_view_post_type_column( $col, $post_id ) {

	   	switch ( $col ) {

	        case 'category':

	           $a = wp_get_post_terms( $post_id, $this->cpt . '__tax_category' , array( 'fields' => 'names' ) );

	           echo $a ? implode( $a, '<br/>') : "";

	        break; 

	       	
	       	case 'tag':
	        
	           $a = wp_get_post_terms( $post_id, $this->cpt . '__tax_tag' , array( 'fields' => 'names' ) );

	           echo $a ? implode( $a, '<br/>') : "";

	        break; 

	    }
	}


	// ==================================================================================================================
	// sortable
	// ==================================================================================================================

	public function p_sortable_post_type_column( $columns ) {
		
	    $columns['category'] = 'category';
	    $columns['tag'] = 'tag';
	   
	    return $columns;
	}


}

new P_Cpt_Entertainment;

endif;
