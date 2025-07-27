<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>



<?php get_header() ?>







 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.css"/>

<style>
  .swiper { width: 100%; height: 300px; }
 
  .swiper-slide { position: relative; display: flex; justify-content: center; align-items: center; }
  .swiper-slide img { width: 100%; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    transform-style: preserve-3d; transition: transform 0.8s ease; }
  .swiper-slide img:hover { transform: perspective(1000px) rotateY(10deg) translateZ(30px); }
  .swiper-button-next, .swiper-button-prev { color: #fff; }
  .swiper-pagination-bullet-active { background: #00559D; }
   @media(max-width:767px){
      .swiper{
         height: 150px;
      }
 
  }
</style>

<div class="swiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">
      <a href="https://psmcvn.com/mui-phay-osg-ae%e2%80%91vms/"><img src="https://psmcvn.com/wp-content/uploads/2025/07/mui-phay-chi-tiet.png" alt="Mũi phay OSG"></a>     
    </div>
    <div class="swiper-slide">
     <a href="https://psmcvn.com/taro-may-osg/"> <img src="https://psmcvn.com/wp-content/uploads/2025/06/taro-osg3.jpg" alt="Taro OSG"></a>
    </div>
    <div class="swiper-slide">      
       <a href="https://psmcvn.com/duong-ren-phich-cam-osg-co-lop-phu/"><img src="https://psmcvn.com/wp-content/uploads/2025/07/duong-ren-phich-cam-3.jpg" alt="Dưỡng kiểm ren OSG"></a>
    </div>
    <div class="swiper-slide">      
       <a href="https://psmcvn.com/duong-ren-vong-osg/"><img src="https://psmcvn.com/wp-content/uploads/2025/07/duong-ren-vong.jpg" alt="Dưỡng kiểm ren vòng OSG"></a>
    </div>
   
  </div>
  <!-- Controls -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <div class="swiper-pagination"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.swiper', {
    loop: true,
    speed: 2000,
    autoplay: { delay: 4000, disableOnInteraction: false },
    effect: 'slide',
    slidesPerView: 1,
    pagination: { el: '.swiper-pagination', clickable: true },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    spaceBetween: 20,
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    // when window width is >= 640px
    640: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  }
  });
</script>

         <main id="main" class="">

            <div id="content" role="main" class="content-area container">

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



                               <div class="product-cate">

                                 <a href="<?php echo  $__link_title ?: "#"; ?>" class="<?php echo !$__link_title ? "p-pe-none" : "" ; ?>">

                                   <?php echo $__title; ?>

                                  </a>

                               </div>



                               <div class="row p-mb-20">



                                 <?php if ( $ar_id ) : ?>

                                 <?php foreach(  $ar_id as $k2 => $v2 ) : ?>

                                  <div class="box-product mb-4 col-sm-4" style="max-width:100%;width:100%">

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