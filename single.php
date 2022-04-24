<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php 
include get_template_directory() . '/template/template-product.php'; 
exit;

global $single_tem; 
if ( !$single_tem ){
   $single_tem = 't1';
}
?>

<?php get_header() ?>

<?php
   if ( $single_tem == "t2" ) {
	   
	   	$class_row = "";
	   
	   	$class_col_left = "col-12";
	   
	   	$class_col_right = "col-12";
	   
   }
   else if ( $single_tem == "t3" ) {
   
	   	$class_row = "flex-md-row-reverse";
	   
	   	$class_col_left = "col-12 col-md-8 p767-mb-20";
	   
	   	$class_col_right = "col-12 col-md-4";
   
   } else{
   
	   	$class_row = "";
	   
	   	$class_col_left = "col-12 col-md-8 p767-mb-20";
	   
	   	$class_col_right = "col-12 col-md-4";
   }
?>

<?php 
   if ( have_posts() ) :
   	while (have_posts()) : the_post();
   
   		$id = get_the_ID();
   
   		$title = get_the_title();
   
   		ob_start();
   		the_content();
   		$content = ob_get_clean();
   
   
   		$date = p_the_date('d/m/Y H:i', $id );
         $date .= ' (GMT+7)';
   	
   	endwhile;
   endif;	
   
?>	



<div class="sc_min_height">
   <div class="container p-mt-20 p-mb-20 p-bg-w">

      <div class="p-mb-30">
         <h1 class="p-h-title p-bold">
            <?php echo $title ?> 
         </h1>
      </div>


      <div class="row <?php echo $class_row ?>">
         <div class="<?php echo $class_col_left ?>">
            <div class="p-mb-20">
              
               <div class="p-mb-20 p-fs-15">
                  <?php echo $date ?>
                  <?php echo edit_post_link( sprintf('( <i class="fa fa-pencil" aria-hidden="true"></i> %1$s )', __('Sửa bài viết', TDM ) ), '<span>', '</span>' ); ?>
               </div>
               <div class="div-the-con">
                  <?php echo $content ?>		
               </div>


               <?php if ( $category = wp_get_post_terms( $id, 'category' ) ) : 
                   // print_r2( $category );
               ?>
                  <div class="div-cat p-mb-15">
                     <span class="p-bold">
                         <?php echo __('Thể loại:', TDM ) ?> 
                     </span>
                     <?php foreach(  $category as $k => $v ) : ?>
                     <a href="<?php echo get_term_link( $v ) ?>"><?php echo $v->name ?></a><?php echo next($category) ? "," : "" ?>
                     <?php endforeach; ?>
                  </div>
               <?php endif; ?>

               <?php if ( $post_tag = wp_get_post_terms( $id, 'post_tag' ) ) : 
                   // print_r2( $post_tag );
               ?>
                  <div class="div-tag">
                     <div class="">
                        <!-- <span class="p-bold">
                        <?php echo __('Từ khóa:', TDM ) ?> 
                        </span>   -->
                        <?php foreach( $post_tag as $k => $v ) : ?>
                        <a href="<?php echo get_term_link( $v ) ?>"><?php echo $v->name ?></a>
                        <?php endforeach; ?>
                     </div>
                  </div>
               <?php endif; ?>

            </div>

            <div>
               <?php 
                  // related post
                  // comments_template();
                  ?>
            </div>

            <?php 
               if ( is_single() ) {
                  include get_template_directory() . '/block/releated_post.php';
               }
            ?>
            
         </div>

         <?php if ( $single_tem != "t2" ) { ?>
         <div class="<?php echo $class_col_right ?>">
            <?php get_sidebar() ?>
         </div>
         <?php } ?>

      </div>
   </div>
</div>
<?php get_footer() ?>