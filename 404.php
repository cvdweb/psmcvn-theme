<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php 


// ==================================================================================================================
// 404 template
// ==================================================================================================================


global $hidden_banner;
$hidden_banner = true;

global $hidden_breadcrum;
$hidden_breadcrum = true;

?>


<?php get_header() ?>

<div class="sc-404 p-mt-100 p-mb-100 p991-mt-50 p991-mb-50">
<div class="container">

	<div class="row">

		<div class="col-12 col-md-6">
		<div>
			<a href="<?php echo home_url() ?>">
				<img src="<?php echo P_IMG ?>/404_man.svg" alt="404" class="p-w-100pt">
			</a>
		</div>
		</div>

		<div class="col-12 col-md-6">

			<div class="wrap-404">
				<?php //echo sprintf( __( "Quay lại trang chủ tại %s đây! %s", TDM ), '<a href="' . home_url() . '">', '</a>'  ) ?>

				    <h1 class="__title">404</h1>
			        <h2 class="__des"><?php echo __("Not Found !", TDM ) ?></h2>
			        <p class="__detail">

			          <?php echo __("Trang bạn đang tìm kiếm không tồn tại.<br/> 
			          Nhấp vào nút bên dưới để quay lại trang chủ.", TDM ); ?>

			        </p>
			        <div>
			        	<button class="btn __btn"><?php echo __("HOME", TDM ) ?></button>
			    	</div>
			</div>

		</div>

	</div>

</div>
</div>


<?php get_footer() ?>