<?php 

if ( ! defined( 'ABSPATH' ) ) exit;



// ==================================================================================================================

// clear jquery migrate

// ==================================================================================================================

if( !function_exists('p_remove_jquery_migrate') ):

  add_action( 'wp_default_scripts', 'p_remove_jquery_migrate' );

  function p_remove_jquery_migrate( $scripts ) {

      if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {

          $script = $scripts->registered['jquery'];



          if ( $script->deps ) {

              $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );

          }

      }

  }

endif;



// ==================================================================================================================

// include lib css

// ==================================================================================================================

if(!function_exists('p_load_lib_css')):

  add_action('wp_enqueue_scripts','p_load_lib_css', 1 );

  function p_load_lib_css(){



      //$css_ran = '1.0';

      $css_ran = rand(100000000,999999999);



      wp_enqueue_style('bootstrap.min.css',  P_LIB . "/bootstrap/css/bootstrap.min.css" );

      wp_enqueue_style('font-awesome.min.css',  P_LIB . "/font-awesome/css/font-awesome.min.css" );

      wp_enqueue_style('swiper.min.css',  P_LIB . "/swiper/swiper-bundle.min.css" );



      wp_enqueue_style('style_help', P_CSS . "/helper/style_help.css");



  }

endif; 





// ==================================================================================================================

// include css

// ==================================================================================================================

if(!function_exists('p_load_css')):

    add_action('wp_enqueue_scripts','p_load_css', 20 );

    function p_load_css(){



        //$css_ran = '1.0';

        $css_ran = rand(100000000,999999999);


        if ( !is_admin() ){
            wp_enqueue_style('up_css', P_CSS . "/up/0f7c0eeb9c79d6fcb27114f31797709b.css" , '', $css_ran  );
        


        wp_enqueue_style('style-demo', P_CSS . "/style.css" , '', $css_ran  );

        wp_enqueue_style('style_custom.css', P_CSS . "/custom/style_custom.css" , '', $css_ran  );

        }
        

    }

endif;





// ==================================================================================================================

// include lib js

// ==================================================================================================================

if(!function_exists('p_load_lib_js')):

    add_action('wp_enqueue_scripts','p_load_lib_js', 1 );

    function p_load_lib_js(){

        global $wp_scripts,$wp;





         $js_ran = rand(100000000,999999999);



        // wp_deregister_script('jquery');

        // wp_register_script('jquery', P_ASSETS . '/lib/jquery/jquery-1.12.4.min.js', false, null);

        // wp_enqueue_script('jquery');

         

        wp_enqueue_script('popper.min.js', P_LIB . "/bootstrap/js/popper.min.js" ,array('jquery'),'1.0', true);

        wp_enqueue_script('bootstrap.min.js', P_LIB . "/bootstrap/js/bootstrap.min.js" ,array('jquery'),'1.0', true);

        // wp_enqueue_script('swiper.min.js', P_LIB . "/swiper/swiper-bundle.min.js" , array('jquery'),'1.0', true);



        if ( is_page_template('template/template-product.php')  || is_singular('post')   ) {



            wp_enqueue_style('swiper.min.css',  P_LIB .  '/swiper/css/swiper.min.css' , '' );



            // wp_enqueue_style('lightbox.min.css',P_LIB . '/lightbox/css/lightbox.min.css');

        }   











        wp_enqueue_script('js_help', P_JS . "/help/style_help.min.js" , array('jquery'),'1.0', true);

  

    }

endif;





// ==================================================================================================================

// include js

// ==================================================================================================================

if(!function_exists('p_load_js')):

    add_action('wp_enqueue_scripts','p_load_js', 20 );

    function p_load_js(){

        global $wp_scripts,$wp;



  

        $js_ran = rand(100000000,999999999);



        $min = !( (defined('WP_DEBUG') &&  WP_DEBUG) || isset($_GET['debug']) ) ? ".min" : "";


        if ( !is_admin() ){
            wp_enqueue_script('up_js', P_JS . "/up/flatsome.js" ,array('jquery'), $js_ran , true);
        }




       if ( is_page_template('template/template-product.php') || is_singular('post')   ) {

            wp_enqueue_script('swiper.min.js', P_LIB . '/swiper/js/swiper.min.js' ,array('jquery'), '' , true);



            // wp_enqueue_script('lightbox-plus-jquery.min.js',P_LIB . "/lightbox/js/lightbox-plus-jquery.min.js",array('jquery'), $js_ran, true);  





         }







        wp_enqueue_script('style.js', P_JS . "/style{$min}.js" ,array('jquery'), $js_ran , true);

        // js var 

        wp_localize_script( 'style.js', "p", p_var_ar1()); 

    

    }

endif;   





// ==================================================================================================================

// async | defer

// ==================================================================================================================

// add_filter( 'script_loader_tag', 'p_mind_defer_scripts', 10, 3 );

function p_mind_defer_scripts( $tag, $handle, $src ) {

  $async = array( 

    'popper.min.js',

    'bootstrap.min.js',

    'wp-embed',

  

  );

  if ( in_array( $handle,  $async ) ) {

     // return '<script type="text/javascript" src="' . $src . '" async></script>' . "\n";

     return str_replace( "src", "async src", $tag );

  }

   



 $defer = array( 

   

    'style.js',



  );



  if ( in_array( $handle, $defer ) ) {

      //return '<script type="text/javascript" src="' . $src . '" defer></script>' . "\n";

      return str_replace( "src", "defer src", $tag );

  }

    

  return $tag;

} 





// ==================================================================================================================

// dns_prefetch

// ==================================================================================================================

//add_filter( 'wp_head', 'p_dns_prefetch',  -999999 );

function p_dns_prefetch() { ?>



  <link rel='dns-prefetch' href='//cdnjs.cloudflare.com' />

  <?php 

}



