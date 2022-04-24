<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// p_add_breadcrumb_rank_math( true ); // show bredcrumb
// ==================================================================================================================
add_action('p_after_header','p_add_breadcrumb_rank_math',10);
function p_add_breadcrumb_rank_math( $show = false, $wrap = true ){
  if ( $show == false ) {

    global $hidden_breadcrum;
    if( is_home() || $hidden_breadcrum ) return;

  }
?>
  
  <?php if ( function_exists('rank_math_the_breadcrumbs') && get_option( 'rank-math-options-general')['breadcrumbs'] == "on" ) { ?>

     <?php if ( $wrap == true ) { ?>

      <!-- Breadcrumb rank math -->
      <div class="sc-breadcrum p-pt-10 p-pb-0">
        <div class="container container-breadcrumb">
          <?php rank_math_the_breadcrumbs(); ?>
        </div>
      </div>
     <!-- End Breadcrumb rank math -->

     <?php } else { ?>
        <!-- Breadcrumb rank math -->
          <?php rank_math_the_breadcrumbs(); ?>
        <!-- End Breadcrumb rank math -->

     <?php }  ?>

  <?php } ?>
    
<?php }

// ==================================================================================================================
// p_add_breadcrumb_yoast_seo( true ); // show bredcrumb
// ==================================================================================================================
//add_action('p_after_header','p_add_breadcrumb_yoast_seo',10);
function p_add_breadcrumb_yoast_seo( $show = false,  $wrap = true ){
  if ( $show == false ) {

    global $hidden_breadcrum;
    if( is_home() || $hidden_breadcrum ) return;

  }
?>
  
  <?php if ( function_exists('yoast_breadcrumb') && get_option( 'wpseo_titles')['breadcrumbs-enable'] == "1" )  { ?>

       <?php if ( $wrap == true ) { ?>

           <!-- Breadcrumb yoast seo -->
          <div class="sc-breadcrum p-pt-20 p-pb-20">
            <div class="container container-breadcrumb">
              <?php yoast_breadcrumb( '',''); ?>
            </div>
          </div>
         <!-- End Breadcrumb yoast seo -->

       <?php } else { ?>
          <!-- Breadcrumb yoast seo -->
           <?php yoast_breadcrumb( '',''); ?>
          <!-- End Breadcrumb yoast seo -->

       <?php }  ?>

  <?php } ?>
    
<?php }


