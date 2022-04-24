<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// add_action('p_after_header','p_add_text');
function p_add_text(){
	?>

	<div class="container p-mt-50 p-mb-50"> 
		<form action="." method="post" class="js-form-send-contact">
		  <div>
			  <div class="form-group">
			  		<input required="" type="text" name="name" class="form-control" placeholder="<?php echo __("Họ tên", TDM ) ?>">
			  </div>

			  <div class="form-group">
			  		<input required="" type="email" name="email" class="form-control" placeholder="<?php echo __("Email", TDM ) ?>">
			  </div>


			  <div class="form-group">
			  		<input required="" type="text" name="phone" class="form-control" placeholder="<?php echo __("Số điện thoại", TDM ) ?>">
			  </div>

			  <div class="form-group">
			  		<textarea required="" name="address" class="form-control" placeholder="<?php echo __("Địa chỉ", TDM ) ?>"></textarea>
			  </div>


			  <div>
	
				<button class="btn btn-primary" type="submit">
				  <i class="spinner-grow spinner-grow-sm" style="display: none;"></i>
				  Submit
				</button>

			  </div>


			</div>



		</form>
	</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-show_popup_contact" data-toggle="modal" data-target="#show_popup_contact" style="display:none"></button>

<!-- Modal -->



<div class="modal fade" id="show_popup_contact" tabindex="-1" role="dialog" aria-labelledby="show_popup_contactLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <!--  <div class="modal-header">
        <h5 class="modal-title" id="show_popup_contactLabel">Liên hệ thành công</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body show_popup_contact-body">
        ...
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đồng ý</button>
      </div>
    </div>
  </div>
</div>



	<script type="text/javascript">
		jQuery(document).on('submit', '.js-form-send-contact', function(e){

		        e.preventDefault();

		        var $this = jQuery(this);

		        var data = $this.serialize();

		        //console.log( data );

		        jQuery.ajax({
		              type: "post",
		              dataType: "json",
		              url: p.admin_ajax,
		              data: {

		                action: "add_contact",
		                data: data,
		                p_nonce:p.p_nonce,
		              },
		              context: this,
		              beforeSend: function() {
		                  
		                  // jQuery('.js-html-load-post').html('');
		                  jQuery('.show_popup_contact-body').html('');

		                  $this.find('[type="submit"]').attr('disabled',true);
		                  $this.find('[type="submit"]').find('i').show();
		             

		              },
		              success: function(response) {
		                
		                if ( response.stt == "1" ) {

		                
		                   $this.trigger("reset");

		                   jQuery('.show_popup_contact-body').html('Cảm ơn bạn đã liên hệ, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất !');

		                   jQuery('.btn-show_popup_contact').trigger('click');



		                } else {

		                	$this.trigger("reset");
		                   
		                   jQuery('.show_popup_contact-body').html('Lỗi ! Vui lòng thử lại'); 
		                   jQuery('.btn-show_popup_contact').trigger('click');

		                 
		                }
		                
		                // aftersend	     
		                $this.find('[type="submit"]').attr('disabled',false);
		                $this.find('[type="submit"]').find('i').hide();


		              },
		              error: function(jqXHR, textStatus, errorThrown) {
		                 // location.href = location.href;
		                 
		              }
		            })


		    });


	        jQuery('#show_popup_contact').on('hidden.bs.modal', function (e) {
			  	location.href = location.href;
			})
		

	</script>

	<?php 
}
