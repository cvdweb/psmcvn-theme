<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<div>
<form role="search" method="get" class="" action="<?php echo trailingslashit( home_url() ) ?>">

    <input type="hidden" name="post_type" value="post"> 
<!--     <input type="hidden" name="post_type" value="product"> 
    <input type="hidden" name="post_type" value="post,product"> -->


    <div class="input-group p-input-group-mod-s1">

        <input class="form-control" placeholder="<?php _e('Tìm kiếm', TDM ) ?>" type="text" value="<?php echo get_search_query() ?>" name="s" required>

        <div class="input-group-prepend">
            <button type="submit" class="btn-submit-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>

      
    </div>


</form>
</div>



