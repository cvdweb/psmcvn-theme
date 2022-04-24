<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

// ================================================================================================================
// calc array code
// ================================================================================================================
function p_func_array_code_key( $array = "" ){
  if ( !$array || @!is_array($array) ) return;

  return array_combine( array_map( function($k) { return '%'. $k . '%'; }, array_keys( $array ) ) , $array );
}

// ================================================================================================================
// calc array code
// ================================================================================================================
function p_calc_ar_form( $array = "" ){
  if ( !$array || @!is_array($array) ) return;

  $ar_key = array_keys( $array );
  $ar_key = array_map( 'wp_strip_all_tags', $ar_key );
  $ar_key = array_map( 'trim', $ar_key );
  
  $ar_value = $array;
  $ar_value = array_map( 'wp_strip_all_tags', $ar_value );
  $ar_value = array_map( 'trim', $ar_value );
  
  return array_combine( $ar_key , $ar_value ) ;
}

// =================================================================================================================
// calc array code
// =================================================================================================================
function p_func_mail_content_type(){
  return array('Content-Type: text/html; charset=UTF-8');
}


// ==================================================================================================================
// ==================================================================================================================
// Register contact
// ==================================================================================================================
// ==================================================================================================================
add_action('wp_ajax_add_contact', 'p_wp_ajax_add_contact');
add_action('wp_ajax_nopriv_add_contact', 'p_wp_ajax_add_contact');
function p_wp_ajax_add_contact() {
  if ( !$_POST ) exit;
  // if ( !check_ajax_referer( 'p_nonce', 'p_nonce', false ) ) exit;

  $data = trim( $_POST['data'] );
  $form = array();
  parse_str( $data, $form );

  $form = p_calc_ar_form( $form );


  $name = $form['name'];
  $email = $form['email'];
  $phone = $form['phone'];
  $address = $form['address'];

  $ar_data_form = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'address' => $address,
  ];


  // Insert contact
  $contact_id = p_insert_contact( $ar_data_form );

  $ajax_result = array();

  if ( !is_wp_error( $contact_id ) ) {
    $result = '1';
  } 
 

  $ajax_result = array(
    'stt' => $result ? $result : '',
    //'url' => $url,
  );

  wp_send_json( $ajax_result );
  exit;
}


// ==================================================================================================================
// Insert new contact
// ==================================================================================================================
function p_insert_contact( $contact_data ) {
  $post_title = strip_tags( 'Liên hệ từ ' . $contact_data['name'] . ' lúc ' . date( 'H:i d/m/y' ) );
  $post_name = p_clear_slug( $post_title );

  $args = array(
    'post_title'   => $post_title,
    'post_name'    => $post_name,
    'post_status'  => 'pending',
    'post_author'  => 1,
    'post_type'    => 'cpt_contact', // change
  //  'post_content' => '',
  );

  $post_id = wp_insert_post( $args );

  if ( !is_wp_error( $post_id ) ) {
     wp_set_object_terms( $post_id, array( 'dang-cho-duyet' ), 'cpt_contact__tax_category' );

     update_field('p_contact_s1_name', $contact_data['name'], $post_id );
     update_field('p_contact_s1_email', $contact_data['email'], $post_id );
     update_field('p_contact_s1_phone', $contact_data['phone'], $post_id );
     update_field('p_contact_s1_address', $contact_data['address'], $post_id );

     // update_field('p_contact_s1_con', $contact_data['address'], $post_id );

     p_send_contact( $contact_data );

  }

  return $post_id;
}


// ==================================================================================================================
// demo send email
// ==================================================================================================================
function p_send_contact( $contact_data = "" ) {

  if ( !$contact_data ) return;

  $email_user = $contact_data['email'];

  $contact_data = p_func_array_code_key( $contact_data  );

   $subject_user  = str_replace( array_keys($contact_data) , $contact_data , get_field("op_sendmail_a1_title","option")  );
   $content_user  = str_replace( array_keys($contact_data) , $contact_data , get_field("op_sendmail_a1_content","option") );
   wp_mail( $email_user ,  $subject_user,$content_user, p_func_mail_content_type() );

   $subject_admin = str_replace( array_keys($contact_data) , $contact_data , get_field("op_sendmail_a1_admin_title","option") );
   $content_admin = str_replace( array_keys($contact_data) , $contact_data , get_field("op_sendmail_a1_admin_content","option") );

  if (  $op_sendmail_a1_admin_mail_repeat = get_field("op_sendmail_a1_admin_mail_repeat","option") ) :

      foreach( $op_sendmail_a1_admin_mail_repeat as $op_sendmail_a1_admin_mail_repeats  ):

        $email_admin = $op_sendmail_a1_admin_mail_repeats['op_sendmail_a1_admin_mail_repeat_mail'];

        $check = $op_sendmail_a1_admin_mail_repeats['op_sendmail_a1_admin_mail_repeat_check'];

        if ( $email_admin && $check ) {

          wp_mail( $email_admin,  $subject_admin, $content_admin, p_func_mail_content_type() );
        }

      endforeach;
    endif;

  return true;
}


