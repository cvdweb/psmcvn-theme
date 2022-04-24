<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header() ?>

<!-- <div style="height:100vh"></div>
 -->



<!-- 





<div class="p-mt-20">

	<div class="container">




	</div>

</div>


<div style="height:100vh"></div>
 -->





         <main id="main" class="">
            <div id="content" role="main" class="content-area">
               <section class="section home-banggia" id="section_523773308">
                  <div class="bg section-bg fill bg-fill bg-loaded bg-loaded">
                     <div class="effect-snow bg-effect fill no-click"></div>
                  </div>
                  <div class="section-content relative">
                     <div id="gap-1134856927" class="gap-element clearfix" style="display:block; height:auto;">
                        <style>
                           #gap-1134856927 {
                           padding-top: 30px;
                           }
                           .container-width, .full-width .ubermenu-nav, .container, .row{
                            max-width: 1200px;
                           }
                        </style>
                     </div>
                     <div class="row align-equal" id="row-1251704052">

                        <div class="large-3">

                           <?php include get_template_directory() . '/block/nav_left.php';  ?>
                        
                        </div>





<?php 
$op_hp_pd_repeat = get_field("op_hp_pd_repeat","option");


?>



                        <div class="large-9">

                           <?php if ( $op_hp_pd_repeat ) : ?>


                           <?php foreach( $op_hp_pd_repeat as $k => $v ) :
                                 $__title = $v['__title'];
                                 $__link_title = $v['__link_title'];
                                 $__type = $v["__type"];
                                 
                                 // print_r2( $__cate );
                                 if (  $__type == "t1"  ) {

                                    $__cate = $v["__cate"];
                                    $__num = $v["__num"] ?: 3;

                                    if ( $__cate  ) {
  
                                     $args_related = array(

                                        'post_type' => 'post',
                                        'posts_per_page' => $__num,
                                        'orderby' => "Date",
                                        'order' => 'DESC',
                                        'ignore_sticky_posts' => false,
                                        "post_status" => "publish",
                                        
                                            'tax_query' => array(
                                          // 'relation' => 'AND',

                                              array(

                                                 'taxonomy' => 'category',
                                                 'field' => 'term_id',
                                                 'terms' => $__cate,
                                                 // 'compare' => '=',

                                              )

                                           ),

                                    );   

                                    $ar_id = p_query_args( $args_related );

                                    }

                                 }
                                 else if (  $__type == "t2"  ) {
                                    $__post = $v['__post'];

                                    if ( $__post ) { 
                                      $ar_id = @wp_list_pluck( $__post , "ID"  );

                                    }
                                 }                                
                                

                            ?>

                               <div class="" style="margin-bottom: 20px ;font-size: 20px;border-bottom: 1px solid #ececec;   color:rgba(102,102,102,.85)">
                                 <a href="<?php echo  $__link_title ?: "#"; ?>" class="<?php echo !$__link_title ? "p-pe-none" : "" ; ?>">
                                   <?php echo $__title; ?>
                                  </a>
                               </div>

                               <div class="row p-mb-20">

                                 <?php if ( $ar_id ) : ?>
                                 <?php foreach(  $ar_id as $k2 => $v2 ) : ?>
                                  <div id="col-794286143" class="p767-mb-20 col-sm-4" style="max-width:100%;width:100%">
                                       <?php echo p_loop_item_4( $v2 ); ?>
                                  </div>
                                  <?php endforeach; ?>
                               <?php endif; ?>


                               </div>

                               <?php endforeach; ?>

                           <?php endif; ?>





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