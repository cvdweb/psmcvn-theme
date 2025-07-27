<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// ==================================================================================================================

// archive fullwidth

// ==================================================================================================================

?>

<?php get_header() ?>



         <main id="main" class="">

            <div id="content" role="main" class="content-area">

               <section class="section home-banggia" id="section_523773308">

                  <div class="bg section-bg fill bg-fill bg-loaded bg-loaded">

                     <div class="effect-snow bg-effect fill no-click"></div>

                  </div>

                  <div class="section-content relative">

                    <!--  <div id="gap-1134856927" class="gap-element clearfix" style="display:block; height:auto;">

                        <style>

                           #gap-1134856927 {

                           padding-top: 30px;

                           }

                           .container-width, .full-width .ubermenu-nav, .container, .row{

                            max-width: 1200px;

                           }

                        </style>

                     </div> -->

                     <div class="row align-equal" id="row-1251704052">



                        <div class="large-3">   

                           <?php include get_template_directory() . '/block/nav_left.php';  ?>

                           

                        </div>











<?php 

$ar_id = [];



if ( have_posts() ) :

	while (have_posts()) : the_post();



		$ar_id[] = get_the_ID();



	endwhile;

endif;



?>







                        <div class="large-9">







                               <div class="" style="margin-bottom: 20px ;font-size: 20px;border-bottom: 1px solid #ececec;   color:rgba(102,102,102,.85)">

                               		  <h1 class="p-mb-20 __title " style="font-size: 30px;">

										<?php echo get_the_archive_title(); ?>

									</h1>



                               </div>





									<?php if ( get_the_archive_description() ) { ?> 

										

										<div class="div-the-con __con">

											<?php echo get_the_archive_description();  ?>

										</div>



									<?php } ?>







                               

                                 <?php if ( $ar_id ) : ?>

                                 	<div class="row">



                                 <?php foreach(  $ar_id as $k2 => $v2 ) : ?>

                                  <div class="box-product p767-mb-20 col-sm-4 mb-4" style="max-width:100%;width:100%">

                                       <?php echo p_loop_item_4( $v2 ); ?>

                                  </div>

                                  <?php endforeach; ?>

                                    </div>

                                 <?php else : ?>





                                 	<div>

                                 		<?php echo p_content_none(); ?>

                                 	</div>



                               <?php endif; ?>







								<?php 

									// pagination

									if ( file_exists( get_template_directory() . "/block/pagination.php" ) ) { 

										include_once (get_template_directory() . "/block/pagination.php"); 

									} 

								?>



                            









                    </div>

                 </div>





                       

                     </div>

                  </div>

                  <style>

                     #section_523773308 {

                     padding-top: 20px;

                     padding-bottom: 20px;

                     /* background-color: rgb(248, 250, 254); */

                     }

                     #section_523773308 .ux-shape-divider--top svg {

                     height: 150px;

                     --divider-top-width: 100%;

                     }

                     #section_523773308 .ux-shape-divider--bottom svg {

                     height: 150px;

                     --divider-width: 100%;

                     }

                  </style>

               </section>

            </div>

         </main>







<?php get_footer() ?>