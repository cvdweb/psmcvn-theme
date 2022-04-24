<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
if ( !class_exists('polylang') ) return;

defined( 'lang1' ) || define( 'lang1', 'vi' );
defined( 'lang2' ) || define( 'lang2', 'en' );


// acf polylang
if ( !function_exists('p_get_field') ) {
	function p_get_field( $field = '', $end = '', $is_label = false ) {
		if ( function_exists( 'pll_current_language' ) ) {
			$field .= ( pll_current_language() != "vi" ? "_" . pll_current_language() : "");
		}

		if ( $is_label ) return $field;
		return get_field( $field, $end );
	}
}





if ( !function_exists('p__current_lang') ) {
	function p__current_lang(){

		if ( !class_exists('polylang') ){
			return lang1 && defined( 'lang1' ) ? lang1 : false;
		}

		return pll_current_language();
	}
}


if ( !function_exists('p__pll') ) {
	function p__pll( $lang1 = "", $lang2 = "" ){

		if ( !class_exists('polylang') ){
			return $lang1;
		}

		if ( p__current_lang() == lang1 && defined( 'lang1' ) ){

			return $lang1;

		} else if ( p__current_lang() == lang2 && defined( 'lang2' ) ){

			return $lang2;
		}


	}
}


if ( !function_exists('p__link_current') ) {
	function p__link_current( $lang = "" ){

		// if ( !defined( $lang ) ){
		// 	return home_url();
		// }


		if ( !class_exists('polylang') ){
			return home_url();
		}


		$r = pll_the_languages( array('echo'=>false, 'raw'=>1) );

		return $r[ $lang ? $lang : p__current_lang() ][ 'url' ];

	}
}

if ( !function_exists('p__flag_lang_html') ) {
	function p__flag_lang_html( $lang = "" ){ 
		
		?>
			<ul>

		        <li class="lang <?php echo p__current_lang() == lang1 ? "active" : "" ?>">
		            <a href="<?php echo p__link_current( lang1 ) ?>">
		            	<!-- <img src="" alt="image"> -->
		               VI
		            </a>
		        </li>

		        <li class="lang <?php echo p__current_lang() == lang2 ? "active" : "" ?>">
		            <a href="<?php echo p__link_current( lang2 ) ?>">
		            	<!-- <img src="" alt="image"> -->
		               EN
		            </a>
		        </li>

	   		 </ul>

	    <?php 
	}
}


if ( !function_exists('p_lang_flag') ) {
function p_lang_flag() {
	ob_start();

	$cur_lang = pll_current_language();
	$trans = pll_the_languages( array( 'raw' => 1) );

	if ( $trans  ) :
		
	?>

	<div class="">
		<?php foreach( $trans as $code => $lang ) : ?>
			<?php
			$locale = $lang['locale'];
			$flag = P_IMG  . '/flag/' . $code . '.png';
			?>
			<a href="<?php echo $lang['url']; ?>" class="a-flag <?php echo $cur_lang == $code  ? "active" : ""; ?>">
				<img src="<?php echo $flag; ?>" alt="<?php echo $locale; ?>">
			</a>
		<?php endforeach; ?>
	</div>

	<?php endif; ?>

	<style>
		.a-flag{
			opacity: 0.2;
		}

		.a-flag.active{
			opacity: 1;
		}
	</style>

	<?php 
	return ob_get_clean();
}

}



// add_filter('pll_translated_post_type_rewrite_slugs', 'p_pll_translated_post_type_rewrite_slugs');
function p_pll_translated_post_type_rewrite_slugs($post_type_translated_slugs) {
	
	$post_type_translated_slugs = array(

		'cpt_entertainment' => array(
			lang1 => array(
				'has_archive' => true,
				'rewrite'   => array( 'slug' => '/d', 'with_front' => true),
					"public" => true,
			"publicly_queryable" => true,

			),
			lang2 => array(
				'has_archive' => true,
				'rewrite'   => array( 'slug' => '/d', 'with_front' => true),
					"public" => true,
			"publicly_queryable" => true,


			),


		),


	);

	return $post_type_translated_slugs;
}


// add_filter('pll_translated_taxonomy_rewrite_slugs', 'p_pll_translated_taxonomy_rewrite_slugs');
function p_pll_translated_taxonomy_rewrite_slugs( $taxonomy_translated_slugs ) {

	$taxonomy_translated_slugs = array(

  		'cpt_entertainment_tax_category'  => array(
  			lang1 => 'vi-cat',
  			lang2 => 'category-product-asdadas',
   		),



   		
  	);

	 return $taxonomy_translated_slugs;
}


