<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// https://wpadmincolors.com/generate
// change name func, change name,id of wp_admin_css_color, change dir css, minify css

add_action('admin_init', 'p_fresh_admin_color_scheme');
function p_fresh_admin_color_scheme() {
  wp_admin_css_color( 'fresh', __( 'fresh' ),
    P_CSS . '/admin/fresh.css',
    array( '#ff7675', '#ffffff', '#636e72' , '#d63031')
  );
}
