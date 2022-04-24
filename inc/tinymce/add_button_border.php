<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// add tinymce button
// ==================================================================================================================




if ( !class_exists('P_Add_Button_Tinymce') ) :
class P_Add_Button_Tinymce {

    public const SHORTCODE = "green";

    // ==============================================================================================================
    // var
    // ==============================================================================================================
    public $ars = [

        'key' => self::SHORTCODE,
        'file' => P_JS .  '/admin/style-button-tinymce.min.js',
        // name
        'text' => '['.self::SHORTCODE.']',

        'before'=> '['.self::SHORTCODE.' border="#2ecc71" background="#ecf0f1"]',
        'after' => '[/'.self::SHORTCODE.']',
        'title'=> '['.self::SHORTCODE.']',

    ];

    // ==============================================================================================================
    // init
    // ==============================================================================================================
    public function __construct(){

        //  if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
        //        return;
        // }
    
        if ( get_user_option('rich_editing') == 'true') {

            add_filter('mce_external_plugins', [$this, 'add_button' ] );
            add_filter('mce_buttons_3',  [$this,'register_button'] );

            add_action('admin_print_footer_scripts',  [$this, 'quicktags'] , 9999);

            add_action('admin_head', [$this,'code_admin_head'] );


            add_action("wp_head", [$this, 'css'] );

        }   

        add_shortcode( self::SHORTCODE , [$this,"shortcode"] );       
    }


    // ==============================================================================================================
    // add js 
    // ==============================================================================================================
    public function code_admin_head(){
            if ( !$this->ars ) return;
            $ars = $this->ars;
        ?>
            <script>   
                var abc; 
                let <?php echo $ars['key'] ?> = <?php echo json_encode( $ars );  ?>;
            </script>

        <?php
    }


    // ==============================================================================================================
    // add button
    // ==============================================================================================================
    public function register_button($buttons) {
        if ( !$this->ars ) return;
        $ars = $this->ars;


        array_push( $buttons, $ars['key'] );

        return $buttons;

    }


    // ==============================================================================================================
    // add file load js 
    // ==============================================================================================================
    public function add_button($plugin_array) {
        if ( !$this->ars ) return;
        $ars = $this->ars;

        $plugin_array[  $ars['key'] ] =  $ars['file']  . "?ver=" . rand(1000000,99999999);

        return $plugin_array;
    }


    // ==============================================================================================================
    //  add quicktag
    // ==============================================================================================================
    public function quicktags() {
        if ( !$this->ars ) return;
        $ars = $this->ars;

        if ( !wp_script_is( 'quicktags' ) ) return;
    ?>
           <script type="text/javascript">
                QTags.addButton( '<?php echo $ars['key'] ?>' , '<?php echo $ars['text'] ?>' , '<?php echo $ars['before'] ?>', '<?php echo $ars['after'] ?>', '', '<?php echo $ars['title'] ?>', 1000 );
           </script>
    <?php 
    }


    // ==============================================================================================================
    // shortcode
    // ==============================================================================================================
    public function shortcode( $atts, $content = null  ){

        extract( shortcode_atts( array(
          'border' => '#2ecc71',
          'background' => '#ecf0f1',
        
        ), $atts ) );   

      ob_start();
      
      $before = "<div class='tinymce_border' style='border-color:{$border};background:{$background}'>";

      $after = "</div>";

      echo $before . $content . $after;

      return ob_get_clean(); 

    }


    // ==============================================================================================================
    // css
    // ==============================================================================================================
    public function css(){
        ?>  

        <style>
            .tinymce_border{
                border: 2px solid #2ecc71;
                background: #ecf0f1;
                padding: 15px;
                /* border-radius: 5px; */
            }
        </style>

        <?php 
    }


}

new P_Add_Button_Tinymce();
endif;




