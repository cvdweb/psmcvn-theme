<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// function custom_rewrite_rule() {
//   add_rewrite_rule(
//     '^test-table-2/([^/]*)/?',
//     'index.php?pagename=test-table-2&cc=$matches[1]',
//     'top'
// 	);

//    flush_rewrite_rules();

// }
// add_action('init', 'custom_rewrite_rule', 10, 0);


// function wpd_set_id() {
//     if( false !== get_query_var( 'cc', false ) ){
//         $_GET['id'] = get_query_var( 'cc' );
//     }
// }
// add_action( 'parse_query', 'wpd_set_id' );




// function wpd_foo_rewrite_rule() {
//     add_rewrite_rule(
//         '^foo/([^/]*)/?',
//         'index.php?pagename=$matches[1]&param=foo',
//         'top'
//     );
// }
// add_action( 'init', 'wpd_foo_rewrite_rule' );


// function wpd_foo_get_param() {
//     if( false !== get_query_var( 'param' ) ){
//         $_GET['param'] = get_query_var( 'param' );
//     }
// }
// add_action( 'parse_query', 'wpd_foo_get_param' );


