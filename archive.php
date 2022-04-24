<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php include get_template_directory() . '/archive-s2.php';exit; ?>
<?php get_header() ?>

<?php 
$ar_id = [];

if ( have_posts() ) :
	while (have_posts()) : the_post();

		$ar_id[] = get_the_ID();

	endwhile;
endif;

?>

<div class="p-mt-30 p-mb-30 p767-mt-20 p767-mb-20">
	<div class="container">

		<div class="archive">
			<h1 class="p-mb-20 __title">
				<?php echo get_the_archive_title(); ?>
			</h1>

			
			<?php if ( get_the_archive_description() ) { ?> 
				
				<div class="div-the-con __con">
					<?php echo get_the_archive_description();  ?>
				</div>

			<?php } ?>

		</div>
	</div>
</div>

<div class="sc_min_height">
<div class="container p-mt-20 p-mb-20">
	<div class="row">

		<div class="col-12 col-md-8 p991-mb-20">

			
			<?php if ( is_search() ) { ?> 

			 	<div class="p-mb-20">
			 	 <?php get_search_form() ?>
			 	</div>

			<?php } ?>
			
			<div>
				<?php 
				if ( $ar_id ) : $i=1;
					foreach( $ar_id as $k => $v ) :
						$i++;
						echo p_loop_item_1( $v );		
					endforeach;
				else: 
					echo p_content_none();
				endif; 
				?>
			</div>

			
			<?php 
				// pagination
				if ( file_exists( get_template_directory() . "/block/pagination.php" ) ) { 
					include_once (get_template_directory() . "/block/pagination.php"); 
				} 
			?>

		</div>

		<div class="col-12 col-md-4">
			<?php get_sidebar() ?>
		</div>

	</div>
</div>
</div>

<?php get_footer() ?>