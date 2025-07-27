<?php 

if ( ! defined( 'ABSPATH' ) ) exit;



// ==============================================================================================================

// loop 1

// ==============================================================================================================

if ( !function_exists('p_loop_item_1') ):

function p_loop_item_1($post_id="", $before = "", $after = "" ){ 

  if ( !$post_id ) return;

  ob_start();

?>



<div class="p-item-post">

  <!-- <?php echo $post_id ?> -->

    <div class="row">

      

      <div class="col-4 col-sm-4 p-pr-0">

        

        <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-img-pt-70 border-eee border-radius">

          <div class="__overlay"></div>

          <img src="<?php echo p_post_img_link( $post_id ) ?>" alt="<?php echo p_post_img_alt( $post_id ) ?>">

        </a>

    

      </div>



      <div class="col-8 col-sm-8">



        <div>                       

          <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-item-post__title p-line-2">

            <?php echo get_the_title( $post_id ) ?>

          </a>                    

        </div>

<!-- 

        <div class="d-none d-sm-block p-item-post__time">

          <?php echo get_the_date('H:i d-m-Y', $post_id ) ?>                     

        </div> -->



        <div class="d-none d-sm-block p-item-post__des p-line-3">

          <?php echo wp_trim_words( get_the_excerpt( $post_id ) , 25 , '...' ); ?>                         

        </div>



      </div>



    </div>

</div>

  



  <?php 

  return $before . ob_get_clean() . $after;

}



endif;





// ==============================================================================================================

// loop 2

// ==============================================================================================================

// ==============================================================================================================

if ( !function_exists('p_loop_item_2') ):

function p_loop_item_2($post_id="", $before = "", $after = "" ){ 

  if ( !$post_id ) return;

  ob_start();

?>

<!-- <?php echo $post_id ?> -->



<div>

  <div class="p-mb-5">

    <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-img-pt-70 border-eee border-radius">

       <div class="__overlay"></div>

      <img src="<?php echo p_post_img_link( $post_id ) ?>" alt="<?php echo p_post_img_alt( $post_id ) ?>">

    </a>

  </div>



  <div>

    <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-item-post__title p-line-2">

      <?php echo get_the_title( $post_id ) ?>

    </a>

  </div>

</div>





  <?php 

  return $before . ob_get_clean() . $after;

}



endif;







// ==============================================================================================================

// loop 3

// ==============================================================================================================

// ==============================================================================================================

if ( !function_exists('p_loop_item_3') ):

function p_loop_item_3($post_id="", $before = "", $after = "" ){ 

  if ( !$post_id ) return;

  ob_start();

?>

<!-- <?php echo $post_id ?> -->



<div class="row p_loop_item_3">



  <div class="col-12 col-md-6">

    <div class="">

      <div class="__title">

        <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-line-2">

          <?php echo get_the_title( $post_id ) ?>

        </a>

      </div>



      <div class="__des p-line-4">

          <?php echo get_the_excerpt( $post_id ) ?>

      </div>

    </div>

 </div>



   <div class="col-12 col-md-6">

      <div>

         <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-img-pt-70 border-eee border-radius">

           <div class="__overlay"></div>

            <img src="<?php echo p_post_img_link( $post_id ) ?>" alt="<?php echo p_post_img_alt( $post_id ) ?>">

         </a>

      </div>

  </div>



</div>





  <?php 

  return $before . ob_get_clean() . $after;

}



endif;













// ==============================================================================================================

// loop 3

// ==============================================================================================================

// ==============================================================================================================

if ( !function_exists('p_loop_item_4') ):

function p_loop_item_4($post_id="", $before = "", $after = "" ){ 

  if ( !$post_id ) return;

  ob_start();

?>







<!--    <div class="col-inner">

      <div class="tino-price-table-box pricing-table-wrapper">

         <div class="pricing-table ux_price_table text-left box-shadow-3-hover">

            <div class="pricing-table-header" style="    padding-bottom: 0px;">



                <div>

                    <img src="https://images.unsplash.com/photo-1644982649363-fae51da44eac?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">

                </div>



               <div class="title strong">Business Email</div>

              

           

            </div>



            <div class="pricing-table-items items">

               <div class="bullet-item" title=""><span class="text">Mail Account  <b>không giới hạn</b></span></div>

               <div class="bullet-item" title=""><span class="text">Dung lượng mail  <b>không giới hạn</b></span></div>

               <div class="bullet-item" title=""><span class="text">Backup  <b>mỗi tuần</b></span></div>

               <div class="bullet-item" title=""><span class="text">Kết nối Outlook, IMAP/POP</span></div>

             

            </div>

         </div>

      </div>

   </div>

 -->









 <div class="col-inner lift">

    <div class="tino-price-table-box pricing-table-wrapper">

       <div class="pricing-table ux_price_table text-left">

          <div class="pricing-table-header" style="    padding-bottom: 0px;padding-top: 5px;margin-top:5px;">



              <div>



                  <a href="<?php echo get_the_permalink( $post_id ) ?>"  class="p-img-pt-70">

                   

                    <img src="<?php echo p_post_img_link( $post_id ) ?>" alt="<?php echo p_post_img_alt( $post_id ) ?>">

                 </a>





              </div>



             <div class="title strong p-mt-5">

              <a href="<?php echo get_the_permalink( $post_id ) ?>" class="p-line-2 p-fs-20">

                <?php echo get_the_title( $post_id ) ?>

              </a>

            </div>

            

         

          </div>



          <div class="pricing-table-items items d-none">

          <!--    <div class="bullet-item" title=""><span class="text">Mail Account  <b>không giới hạn</b></span></div>

             <div class="bullet-item" title=""><span class="text">Dung lượng mail  <b>không giới hạn</b></span></div>

             <div class="bullet-item" title=""><span class="text">Backup  <b>mỗi tuần</b></span></div>

             <div class="bullet-item" title=""><span class="text">Kết nối Outlook, IMAP/POP</span></div> -->

              <?php echo get_field("p_pd_detail", $post_id ) ?>

          </div>

       </div>

    </div>

 </div>









  <?php 

  return $before . ob_get_clean() . $after;

}



endif;



