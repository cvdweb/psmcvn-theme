<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// register menu
// ==================================================================================================================
add_action('after_setup_theme','p_load_register_menu');
function p_load_register_menu(){

    register_nav_menus(
        array(
            'primary'    => 'Primay Menu',
            'mobile'  =>  'Mobile Menu',
            'category_product'  =>  'Menu danh mục',
           // 'custom'  => __( 'Custom Menu', TDM  ),
          
        )
    );

}


// ==================================================================================================================
// class
// ==================================================================================================================
if ( class_exists('p_Nav_Walker1') ):
class p_Nav_Walker1 extends Walker_Nav_Menu {

  
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param WP_Post  $item  Menu item data object.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';





    $output .= $indent .  '<li' . $id . $class_names . '>' ;






    $atts           = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target ) ? $item->target : '';
    if ( '_blank' === $item->target && empty( $item->xfn ) ) {
      $atts['rel'] = 'noopener noreferrer';
    } else {
      $atts['rel'] = $item->xfn;
    }
    $atts['href']         = ! empty( $item->url ) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria_current The aria-current attribute.
     * }
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
        $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $item->title, $item->ID );

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title The menu item's title.
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $item        Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

   if ( $depth == 0 && get_field('item_menu_type', $item ) ) {
        $before = "<div class=\"container\">";
    }

     $output .=  $before;

  }



  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }


   if ( $depth == 0 && get_field('item_menu_type', $item ) ) {
        $after = "</div>";
    }

    $output .= "$after</li>{$n}";
  }


}




// ===========================================================================================================
//add_filter('wp_nav_menu_objects', 'p_acf_cal_text_menu', 10, 2);
// ===========================================================================================================
function p_acf_cal_text_menu( $items, $args ) {
    

 if (  $args->theme_location != "custom" ) return $items; 

  //print_r2(  $items );

  // loop
  foreach( $items as &$item ) {

    if ( !$item->menu_item_parent ) continue;

    if ( !get_field('item_menu_type', $item->menu_item_parent ) ) continue;

    
    // vars
    $icon = get_field('item_menu_img', $item)['url'];


    
    // append icon
    if( $icon ) {
      
       $icon  = "<img src='". $icon."' width='30' height='30'>";
        
        $item->title = $item->title .  $icon ;

    }
    
  }
  
  // return
  return $items;
  
}
endif;








// ==================================================================================================================
// class
// ==================================================================================================================
if ( class_exists('p_menu_primary_mod') ):
class p_menu_primary_mod extends Walker_Nav_Menu {

  
  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param WP_Post  $item  Menu item data object.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';





    $output .= $indent .  '<li' . $id . $class_names . '>' ;






    $atts           = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target ) ? $item->target : '';
    if ( '_blank' === $item->target && empty( $item->xfn ) ) {
      $atts['rel'] = 'noopener noreferrer';
    } else {
      $atts['rel'] = $item->xfn;
    }
    $atts['href']         = ! empty( $item->url ) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria_current The aria-current attribute.
     * }
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
        $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters( 'the_title', $item->title, $item->ID );

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title The menu item's title.
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $item        Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

   if ( $depth == 0 && get_field('item_menu_type', $item ) ) {
        $before = "<div class=\"container\">";
    }

     $output .=  $before;

  }



  public function end_el( &$output, $item, $depth = 0, $args = null ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }


   if ( $depth == 0 && get_field('item_menu_type', $item ) ) {
        $after = "</div>";
    }

    $output .= "$after</li>{$n}";
  }


}


endif;










// ===========================================================================================================
// acf hide items
// ===========================================================================================================
//add_action('admin_head','p_acf_hide_field_item_menu');
function p_acf_hide_field_item_menu(){

   $ar = get_current_screen();

   if ( $ar->base != 'nav-menus' ) return; 

?> 
   <style>

      [class*="menu-item-depth-0"] [data-name="item_menu_img"]{
        display: none;
      }

      [class*="menu-item-depth-"]:not([class*="menu-item-depth-0"]) [data-name="item_menu_type"]{
        display: none;
      }


   </style>

   <?php
}




// ===========================================================================================================
// 19/02/2020: add menu target blank
// ===========================================================================================================
//add_action( 'admin_menu', 'p_wpdocs_register_my_custom_menu_page' );
function p_wpdocs_register_my_custom_menu_page() {

    add_menu_page(
        'Google search',
        'Google search',
        'manage_options',
        'https://www.google.com',
        '',
        'dashicons-admin-site',
        9999
    );



}
// add new tab + rel + css
//add_action( 'admin_footer', 'p_make_maricache_blank' );    
function p_make_maricache_blank()
{
    ?>
     <script type="text/javascript">
      jQuery(document).ready(function($) {
          jQuery('a[href="https://www.google.com"]').attr('target','_blank');
          jQuery('a[href="https://www.google.com"]').attr('rel','nofollow');
      });
    </script>

    <style>
      a[href="https://www.google.com"]{
        color: red !important;
      }
    </style>

    <?php
}


// ===========================================================================================================
// level color
// ===========================================================================================================
add_action('admin_head', 'p_css_nav_menu_level' );
function p_css_nav_menu_level(){
  $current_page = get_current_screen();

   if ( @$current_page->base != "nav-menus" ) return; 

  $level = array(

    '#0066cc47',
    '#0088cc2e',
    '#ff66006b',
    '#fdcb6e3b',
    '#636e724f',
    '#e8439338',
    '#00b8944d',
    '#74b9ff4f',
    '#fdcb6e3b',
    '#6c5ce742',
  );

  if (  !$level ) return;

  ?>  
    <style>
      .menu-item .menu-item-settings{
        background: white;
      }

      .menu-item:after{
        position: absolute;
        top: 0;
        right: 0;
      }


      <?php foreach ( $level as $k => $v ) : ?>

      .menu-item-depth-<?php echo $k ?>{
        background:<?php echo $v ?>
      }

      .menu-item-depth-<?php echo $k ?>:after{
        content: 'Level <?php echo $k+1 ?>';
      }

      .menu-item-depth-<?php echo $k ?> .menu-item-title:before{
        content: '<?php echo $k+1 ?>/ ';
      }



      <?php endforeach; ?>

      


    </style>

  
  <?php 
}



