<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// ==================================================================================================================
// Support Reply
// ==================================================================================================================
add_action( 'wp_enqueue_scripts', 'p_enqueue_comment_reply' );
function p_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
        wp_enqueue_script( 'comment-reply' ); 
    }
}

// ==================================================================================================================
// template comment 
// ==================================================================================================================
if( ! function_exists( 'p_comment_list_template' ) ):

function p_comment_list_template($comment, $args, $depth) { //print_r2( $args ); ?>

    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

        <div class="single-reply">

            <div class="comment-author-img">
                <?php echo apply_filters( 'p_avatar_comment', get_avatar( $comment, 50 ), $comment ) ?>
            </div>

            <div class="comment-right">
                <div>
                    <span class="comment-author-name">
                        <?php echo get_comment_author_link(); ?>
                     </span>

                    <span class="comment-time">
                        <?php echo "( " .  get_comment_time('H:i d/m/Y') . " )" ?> 
                    </span>
                </div>

                <div class="comment-text">
                    <?php echo wp_strip_all_tags( get_comment_text() ) ?>    
                </div>

                <div class="comment-reply">
                    <?php comment_reply_link(array_merge($args, ['depth'=>$depth,'max_depth'=>$args['max_depth'],'reply_text'=> __('&rarr; Trả Lời',TDM) ] )) ?>
                </div>

                <?php if ( $comment->comment_approved == '0' ) { ?>
                    <div class="">
                        <?php esc_html_e( '(Bình luận đang chờ xét duyệt ! )',TDM ); ?>
                    </div>
                <?php } ?>
                
                <div>
                    <?php edit_comment_link( __( '(Sửa bình luận này)',TDM ), '  ', '' ); ?>
                </div>

            </div>

         </div>
    </li><!-- end li -->
<?php
    }

endif;



// ==================================================================================================================
// ACF: Mod avatar
// ==================================================================================================================
// if( ! function_exists( 'p_mod_avatar_comment' ) ):   
//     add_filter( 'p_avatar_comment', 'p_mod_avatar_comment', 10 , 2 );
//     function p_mod_avatar_comment( $html, $comment ){
//         $user_avatar = get_field("user_avatar", "user_" . $comment->user_id   );
//         $link = $user_avatar['url'] ? $user_avatar['url'] : p_mod_avatar_comment_placeholder();
//         $alt = $user_avatar['alt'] ? $user_avatar['alt'] : __("Hình ảnh", TDM );
//         return  "<img src='{$link}' alt='{$alt}'>";
//     }
// endif;

// if( ! function_exists( 'p_mod_avatar_comment_placeholder' ) ):   
//     function p_mod_avatar_comment_placeholder(){
//         return get_template_directory_uri() . '/assets/img/user_placeholder.png';
//     }
// endif;




// ==================================================================================================================
// Modifly field : author, email, url
// ==================================================================================================================
if( ! function_exists( 'p_comment_form' )):   
    add_filter( 'comment_form_defaults', 'p_comment_form' );
    function p_comment_form( $args ) {

         // print_r2( $args );
        ?>

        <?php ob_start(); ?>
            <div class="form-group comment-form-author">
                <input class="form-control btn-cmt1 btn-cmt1-left" placeholder="<?php echo __("Họ tên",TDM) ?>" required name="author" type="text" value=""/>
            </div>
        <?php $args['fields']['author'] = ob_get_clean(); ?>

        <?php ob_start(); ?>
            <div class="form-group comment-form-email">
                <input class="form-control btn-cmt1 btn-cmt1-left" placeholder="<?php echo __("Email",TDM) ?>"  required name="email" type="email" value=""/>
            </div>
        <?php $args['fields']['email'] = ob_get_clean(); ?>
       
        <?php ob_start(); ?>
            <div class="form-group comment-form-url">
                <input class="form-control  btn-cmt1 btn-cmt1-left" placeholder="<?php echo __("Website",TDM) ?>" name="url" type="url" value=""/>
            </div>
        <?php $args['fields']['url'] = ob_get_clean(); ?>

        <?php ob_start(); ?>
            <div class="form-group comment-form-comment">
                <textarea class="form-control btn-cmt1 btn-cmt1-left" id="comment" required name="comment" cols="45" rows="8" aria-required="true" placeholder="<?php echo __('Bình luận',TDM) ?>"></textarea>
            </div>
        <?php $args['comment_field'] = ob_get_clean(); ?>

        <?php 
        $args['title_reply']       = __( 'Bình luận', TDM );
        // $args['title_reply_to']    = __( 'Trả lời bình luận', TDM );
        $args['cancel_reply_link'] = __( '( Đóng trả lời )',TDM );
        $args['comment_notes_before'] = "";
        $args['class_submit'] = 'btn-cmt1'; // since WP 4.1
        $args['label_submit'] = __('Gửi bình luận',TDM);
        return $args;
    }
endif;


// ==================================================================================================================
// remove field ....
// ==================================================================================================================
if( ! function_exists( 'p_disable_comment_fields' )):   
    add_filter('comment_form_defaults','p_disable_comment_fields',9999);
    function p_disable_comment_fields($args) { 
        //print_r2( $args );

        unset( $args['fields']['url'] );
        unset( $args['fields']['cookies'] );
        return $args;
    }
endif;

