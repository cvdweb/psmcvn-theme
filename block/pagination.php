<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

global $wp_query;
if ( $wp_query->max_num_pages <= 1 ) return;
?>

<div class="div-pagination p-mt-20 p991-mt-20 p767-mt-10">
  <?php
    echo paginate_links( apply_filters( 'p_pagination_args', array(
      'base'         => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false )  ) ),
      'format'       => '',
      'add_args'     => false,
      'current'      => max( 1, get_query_var( 'paged' ) ),
      'total'        => $wp_query->max_num_pages,
      'prev_text'    => '&larr;',
      'next_text'    => '&rarr;',
      'type'         => 'list',
      'end_size'     => 3,
      'mid_size'     => 3,
    ) ) );
  ?>
</div>