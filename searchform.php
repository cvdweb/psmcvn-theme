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

                <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
</svg>

            </button>

        </div>



      

    </div>





</form>

</div>







