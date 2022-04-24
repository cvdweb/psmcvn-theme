<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div>
	<?php if( is_dynamic_sidebar( 'sidebar-1' ) ) { ?>

		<div>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>

	<?php } ?>
</div>