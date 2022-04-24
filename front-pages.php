<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php get_header() ?>

<?php 

$args_related = array(

    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => "Date",
    'order' => 'DESC',
    'ignore_sticky_posts' => false,
    "post_status" => "publish",
    
);   

$ar_id = p_query_args( $args_related );



?>









<div class="">
<div class="container p-mt-20 p-mb-20 p-bg-w">
	<div class="row">

		<div class="col-12 col-md-8 p767-mb-20">

			<?php 
				if ( $ar_id ) : 
					$i = 1;
			?>	

				<div>

					<?php foreach( $ar_id as $k => $v ) :
						// $id = $p_relate_post ? $v->ID : $v;
						$id = $v;

					 ?>
						 <div class="fp_item">
							 <div class="row">

							 	<div class="col-4 col-md-4 p991-pr-0">

							 		<a href="<?php echo get_the_permalink( $id ) ?>" class="p-img-pt p-img-pt-70 border-eee border-radius">
							 			<div class="__overlay"></div>
										<img src="<?php echo p_post_img_link( $id ) ?>" alt="<?php echo p_post_img_alt( $id ) ?>">
									</a>

							 	</div>

							 	<div class="col-8 col-sm-8">

									<div class="p-mb-5">
										
										<a href="<?php echo get_the_permalink( $id ) ?>" class="__title p-bold p-lh-1-3 p-line-2">
											<?php echo get_the_title( $id ) ?>
										</a>
										
									</div>


									<?php if ( $category = wp_get_post_terms( $id, 'category' ) ) : 
					                  // print_r2( $cats );
					                 
					                  ?>
						               <div class="div-cat p-mb-5 text-uppercase d-none d-md-block" style='font-size:12px;'>
						                 
						                  <?php foreach(  $category as $k => $v ) : ?>				              
						                 	 <a href="<?php echo get_term_link( $v ) ?>"><?php echo $v->name ?></a><?php echo next($category) ? "," : "" ?>
						                  <?php endforeach; ?>
						               </div>
					                <?php endif; ?>

					                <div class="d-none d-md-block">
										<div class="p-line-3">
											<?php echo wp_trim_words( get_the_excerpt( $id ) , 25, '...' );  ?>
										</div>
									</div>

								</div>
											
							</div>
						</div>

					<?php $i++; endforeach; ?>

					
				</div>
			
			<?php else: ?>

				<?php echo p_content_none() ?>

			<?php endif; ?>
	
		</div>
	

		<div class="col-12 col-md-4">

			<?php get_sidebar() ?>
			
		</div>
	
	</div>
</div>
</div>







<?php get_footer() ?>