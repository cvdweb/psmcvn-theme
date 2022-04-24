<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// ==================================================================================================================
// check is localhost : 
// Ex: add code google analytics, add link social newtwork , add link tawk.to
// ==================================================================================================================
if ( !function_exists('is_localhost') ) {
	function is_localhost(){
	    return isset( $_SERVER['REMOTE_ADDR'] ) && in_array( $_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'] );
	}
}


if ( !function_exists('is_lh') ) {

	function is_lh(){
	    return is_localhost();
	}

}


// ==================================================================================================================
// Show html pre and print_r
// ==================================================================================================================
if ( !function_exists('print_r2') ) {

	function print_r2($array){
	  echo "<pre>";
	  echo print_r($array);
	  echo "</pre>";
	}

}


if ( !function_exists('print_r22') ) {

	function print_r22($array){
	  if( !is_localhost() ) return;

	  echo "<pre>";
	  echo print_r($array);
	  echo "</pre>";
	}


}


// ==================================================================================================================
// base
// ==================================================================================================================
if ( !function_exists('base64url_encode') ) {

	function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

}


if ( !function_exists('base64url_decode') ) {

	function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

}


// ==================================================================================================================
// zip html
// ==================================================================================================================
// p_Mify_Html(ob_get_clean());

if ( ! function_exists( 'p_Minify_Html' ) ) {
function p_Minify_Html($Html, $trim = false ) {
     $Search = array(
      '/(\n|^)(\x20+|\t)/',
      '/(\n|^)\/\/(.*?)(\n|$)/',
      '/\n|\t/',
      '/\<\!--.*?-->/',
      '/(\x20+|\t)/', # Delete multispace (Without \n)
      '/\>\s+\</', # strip whitespaces between tags
      '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
      '/=\s+(\"|\')/'); # strip whitespaces between = "'

     $Replace = array(
      "\n",
      "\n",
      " ",
      "",
      " ",
      "><",
      "$1>",
      "=$1");

  $Html = preg_replace($Search,$Replace,$Html);

  return $trim ? trim($Html): $Html;

 }

}


// ==================================================================================================================
// Upload image utf8 
// ==================================================================================================================
if ( ! function_exists( 'p_clear_slug' ) ) {
	function p_clear_slug( $filename = "" ) {
	  $sanitized_filename = remove_accents( $filename ); // Convert to ASCII
	  // Standard replacements
	  $invalid = array(
	      ' '   => '-',
	      '%20' => '-',
	      '_'   => '-',
	  );
	  $sanitized_filename = str_replace( array_keys( $invalid ), array_values( $invalid ), $sanitized_filename );
	  $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
	  $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
	  $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
	  $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
	  $sanitized_filename = strtolower( $sanitized_filename ); // Lowercase
	  return $sanitized_filename;
	}
}


// ==================================================================================================================
// clear utf8
// ==================================================================================================================
if ( !function_exists('p_clear_utf8') ) {
  function p_clear_utf8($str) {

   if(!$str) return false;

   $utf8 = array(
  'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
  'd'=>'đ|Đ',
  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
  'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
  'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
  'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
  'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
  );

  foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);

  return $str;

  }
}


// ==================================================================================================================
// show excerpt
// ==================================================================================================================
if ( !function_exists('p_get_the_excerpt') ):
function p_get_the_excerpt($post_id){
    $the_post = get_post($post_id);
    $the_excerpt = $the_post->post_excerpt; 
    return $the_excerpt;
}
endif;


// ==================================================================================================================
// show content
// ==================================================================================================================
if ( !function_exists('p_get_the_content') ):
function p_get_the_content($post_id){
    $the_post = get_post($post_id);
    $the_content = $the_post->post_content; 
    return $the_content;
}
endif;
