<?php
  if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<?php 
/*

// ==================================================================================================================

Template names: Giao diện sản phẩm
Template Post Type: post, page

// ==================================================================================================================

*/
?>

<?php 
   // global $hidden_banner; 
   // $hidden_banner = true;

  // global $hidden_breadcrum; 
  //  $hidden_breadcrum = true;


?>

<?php get_header() ?>




<?php 
   if ( have_posts() ) :
   	while (have_posts()) : the_post();
   
   		$id = get_the_ID();
   
   		$title = get_the_title();
   
   		ob_start();
   		the_content();
   		$content = ob_get_clean();
   
   
   		$date = p_the_date('H:i - d/m/Y', $id );


   	
   	endwhile;
   endif;	
   
?>	



<div class="">
   <div class="container container-s1 p-mb-20 p-bg-w p-ptb-20">
      <div class="row">


  

         <div class="col-12 col-md-5 post-sticky-sidebar p991-mb-20">

            <div>

                <?php if ( $p_pd_gallery = get_field("p_pd_gallery")  ) { 
                     $ar = [];
                     $ar = array_column( $p_pd_gallery , 'url' );

              
                ?>

                   <div class="swiper-container pd-gallery-top" style="border: 2px solid #eee;">
                      <div class="swiper-wrapper">
                        <?php foreach ( $ar as $k => $v  ) { ?> 
                          <div class="swiper-slide">
                             <div class="" style="padding:0px 0px;">
                              <div class="p-img-pt p-img-pt-max">
                               
                                    <img src="<?php echo $v ?>" alt="<?php echo $title ?>" class="p-w-100pt" style="object-fit:contain">
                               
                              </div>
                              </div>
                          </div>
                        <?php } ?>
                      </div>
                      
                      <div class="swiper-button-next swiper-button-white"></div>
                      <div class="swiper-button-prev swiper-button-white"></div>
                    </div>

                    <div class="swiper-container pd-gallery-thumbs p-mt-10">
                      <div class="swiper-wrapper">

                        <?php foreach ( $ar as $k => $v  ) { ?> 
                          <div class="swiper-slide">
                            <div>
                             <div class="p-img-pt p-img-pt-max">
                                
                                 <img src="<?php echo $v ?>" alt="<?php echo $title ?>" class="p-w-100pt">
                            
                             </div>
                            </div>
                          </div>
                        <?php } ?>

                      </div>
                    </div>


             

               <?php } else { 
                    
                   

                ?> 

                  <div>
                     <div class="" style="border: 2px solid #eee;">
                        
                          <img src="<?php echo p_link_img( $id ) ?>" alt="<?php echo $title ?>" class="p-w-100pt">
                     
                     </div>
                 </div>

               <?php } ?>



             </div>

         </div>


                <div class="col-12 col-md-7">
           
            


<!-- ===================================================================
start
==================================================================== -->
<?php 
$p_pd_contact_title = get_field("p_pd_contact_title") ?: get_field("op_tlsp_contact_text", "option");
$p_pd_contact_link = get_field("p_pd_contact_link") ?: get_field("op_tlsp_contact_link", "option");


?>

               <div class="p-wrap-line-pd active">
                  
                  <div class="p-wrap-line-pd__title">
                     <h1><?php echo $title ?> </h1>
                  </div>

            

                  <?php if ( get_field("p_pd_detail") ) : ?>
                  <div class="p-mb-20 div-the-con div-the-con-s1 p-wrap-line-pd__detail p-pt-10">
                <!--     <div class="p-wrap-line-pd__detail_title">
                        Thông số cơ bản:
                    </div> -->

                    <div class="div-the-con">
                     <?php echo get_field("p_pd_detail") ?>
                     </div>
                  </div>
                <?php endif; ?>



               </div>    

           


         </div>


     </div>


      </div>
   </div>
</div>



<div class="container container-wrap-1k p-mt-30 p767-mt-20 p-bg-w p-mb-30">

     <?php if ( $content ) : ?>
        
<!--      <div class="p-pd-des-title">
        Nội dung bài viết
     </div> -->
       
   
   <div class="div-the-con p-mt-20 div-the-con">
      <?php echo $content  ?>
   </div>
    <?php endif; ?>
 






</div>







<?php get_footer() ?>