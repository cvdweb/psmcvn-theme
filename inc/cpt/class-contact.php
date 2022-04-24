<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ======================================================================================================================
// Post Type: Contact.
// ======================================================================================================================
if ( !class_exists('P_Cpt_Contact') ) :

class P_Cpt_Contact {

	public $cpt = 'cpt_contact';

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

		//add_action( 'init', [ $this, 'p_register_tax_tag' ], 5 );

		// add_action( 'init', [ $this, 'p_insert_default_term' ], 5 );

		// create columns
		add_filter( 'manage_' . $this->cpt .  '_posts_columns', [ $this,  'p_view_post_type_table' ] );

		// add data columns
		add_action( 'manage_' . $this->cpt . '_posts_custom_column' , [ $this,  'p_view_post_type_column' ] , 10, 3 );


		// sortable
		add_filter( 'manage_edit-' . $this->cpt . '_sortable_columns', [ $this, 'p_sortable_post_type_column'] );



		// add_filter( "manage_edit-". 'cpt_contact_tax_category' ."_columns", [ $this, 'custom_column_header' ] , 10);

		// add_action( "manage_". 'cpt_contact_tax_category' ."_custom_column", [ $this, 'custom_column_content' ], 10, 3);


		// // sortable
		// add_filter( 'manage_edit-' . 'cpt_contact_tax_category' . '_sortable_columns', [ $this, 'p_sortable_post_type_column2'] );

		$this->add_menu();


	}


	// ==================================================================================================================
	// REGIS
	// ==================================================================================================================
	public function p_register_post_type() {


		$args = [

			"label" => __("Liên hệ", TDM ),
			"labels" =>  [ "name" => __("Liên hệ", TDM )  , "singular_name" => __("Liên hệ", TDM ) ],

			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
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
			// 'rewrite'   => array( 'slug' => 'contact', 'with_front' => false),

			"query_var" => true,
			// "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "revisions", "author" ],
			"supports" => [ "title"],
				// "taxonomies" => [ $this->$cpt . "__tax_category" ],

			'menu_icon' => 'dashicons-id',
			'menu_position' 			=> 20,
		];

	
		register_post_type( $this->cpt , $args );
	}


	// ==================================================================================================================
	// Taxonomy: Cateogory
	// ==================================================================================================================
	public function p_register_tax_category() {


		$args = [

			"label" => __( "Trạng thái"),
			"labels" => [ "name" => __( "Trạng thái") , "singular_name" => __( "Trạng thái") ],
			"public" => true,
			"publicly_queryable" => false,
			"hierarchical" => true,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			
			"show_admin_column" => false,
			"show_in_rest" => true,
		
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"show_in_quick_edit" => false,

			// "rewrite" => [ 'slug' => 'category-contact' , 'with_front' => true ],

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
			"publicly_queryable" => false,
			"hierarchical" => false,
			"show_ui" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"query_var" => true,
			"show_admin_column" => false,
			"show_in_rest" => true,
		
			"rest_controller_class" => "WP_REST_Terms_Controller",
			"show_in_quick_edit" => false,

			// "rewrite" => [ 'slug' => 'tag-contact' , 'with_front' => true, ],
		];

		register_taxonomy( $this->cpt  . "__tax_tag", [ $this->cpt ], $args );

	}


	// ==================================================================================================================
	// Insert default term
	// ==================================================================================================================
	public function p_insert_default_term() {
	
		
		$taxonomy = $this->cpt  . '__tax_category';

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

				$cols_new['name']  = __('Họ tên', TDM );
				$cols_new['email']  = __('Email', TDM );
				$cols_new['phone']  = __('Số điện thoại', TDM );
				$cols_new['address']  = __('Địa chỉ', TDM );


				$cols_new['category']  = __('Trạng thái', TDM );

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

	   		case 'name': echo get_field('p_contact_s1_name', $post_id ); break;
	   		case 'email': echo get_field('p_contact_s1_email', $post_id ); break;
	   		case 'phone': echo get_field('p_contact_s1_phone', $post_id ); break;
	   		case 'address': echo get_field('p_contact_s1_address', $post_id ); break;

	        case 'category':

	           $a = wp_get_post_terms( $post_id, $this->cpt . '__tax_category', array( 'fields' => 'names' ) );

	           echo $a ? implode( $a, '<br/>') : "";

	        break; 


	    }
	}


	// ==================================================================================================================
	// sortable
	// ==================================================================================================================
	public function p_sortable_post_type_column( $columns ) {


		$columns['name']  = 'name';
		$columns['email']  = 'email';
		$columns['phone']  = 'phone';
		$columns['address']  = 'address';

		
	    $columns['category'] = 'category';
	    // $columns['tag'] = 'tag';
	   
	    return $columns;
	}


	// ==================================================================================================================
	// add menu
	// ==================================================================================================================
	public function add_menu(){

		// active plugin
		if( ! class_exists('ACF') ) return;

		// role admin
		if ( !current_user_can( "administrator") ) return;

		// create page
		if( !function_exists('acf_add_options_page') ) return; 


		// option of custom post type 
		acf_add_options_sub_page(array(
		    'page_title'     => __('Thiết lập gửi mail', TDM ) ,
		    'menu_title'    =>  __('Thiết lập gửi mail', TDM ) ,
			'menu_slug'    => $this->cpt . '__settings',
		    'parent_slug'    => "edit.php?post_type={$this->cpt}",
		));


	}



}

new P_Cpt_Contact;

endif;
