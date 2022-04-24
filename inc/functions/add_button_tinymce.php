<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'tiny_mce_before_init', 'p_prefix_tinymce_toolbar' );
function p_prefix_tinymce_toolbar( $args ) {
    $args['fontsize_formats'] = "10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 35px 40px 45px 50px 60px 70px 80px 90px 100px 8pt 9pt 10pt 11pt 12pt 13pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 25pt 50pt";
    return $args;
}


add_action('admin_print_footer_scripts',   'p_my_custom_quicktags_0' , 9999);
function p_my_custom_quicktags_0() {
     if ( !wp_script_is( 'quicktags' ) ) return;        
?>
     <script type="text/javascript">
         QTags.addButton( 'h1_tag', 'h1', '<h1>', '</h1>', '', 'Heading 1', 999 );
         QTags.addButton( 'h2_tag', 'h2', '<h2>', '</h2>', '', 'Heading 2', 999 );
         QTags.addButton( 'h3_tag', 'h3', '<h3>', '</h3>', '', 'Heading 3', 999 );
         QTags.addButton( 'h4_tag', 'h4', '<h4>', '</h4>', '', 'Heading 4', 999 );
         QTags.addButton( 'h5_tag', 'h5', '<h5>', '</h5>', '', 'Heading 5', 999 );
         QTags.addButton( 'h6_tag', 'h6', '<h6>', '</h6>', '', 'Heading 6', 999 );
     </script>
<?php 
}



