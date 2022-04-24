<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
// ==================================================================================================================
// The template for displaying comments.
// ==================================================================================================================
if ( post_password_required() ) return;
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title p-mb-10 p-mt-0 p-h-title-mod-1">
			<?php
				printf( _nx( 'Có %1$s bình luận', 'Có %1$s bình luận', get_comments_number(), 'comments title', TDM ), number_format_i18n( get_comments_number() ));		
			?>
		</h4>

		<ul class="comment-list p-mb-20">
			<?php
				wp_list_comments( array(
					'callback' => function_exists('p_comment_list_template') ? 'p_comment_list_template' : '',
				) );
			?>
		</ul>
	<?php endif;?>

	<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments">
			<?php echo __( 'Đã đóng bình luận.', TDM ); ?>	
		</p>
		
	<?php endif; ?>
	
	<div>
		<?php comment_form(); ?>
	</div>
</div>
