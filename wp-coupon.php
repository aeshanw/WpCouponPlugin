<?php
/*
Plugin Name: wpCoupon
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: will detect if user sign-up is reffered to by a freind and will email a coupon if so
Version: 1.0
Author: Aeshan Wijetunge
Author URI: http://URI_Of_The_Plugin_Author
License: none
*/

class CouponReferer{

  function add_query_vars($aVars) {
    $aVars[] = "referid";    // represents the name of the product category as shown in the URL
    return $aVars;
  }

  function save_referid($refer_id){
     if(!isset($refer_id)){
        $refer_id = $_GET['referid'];
      }
    exit();
     //save referid passed via GET url header to SESSION
    setcookie("refer_id", $refer_id, time()+3600, "/", str_replace('http://','',get_bloginfo('url')) );
    var_dump($_COOKIE['refer_id']);
    return true;
  }
}
//exit();

function insert_referid_hidden(){
  $refer_id = $_GET['refer_id'];
  $field = '<input type="hidden" name="refer_id" value="'.$refer_id.'"/>';
  echo $field;
}

add_action('register_form','insert_referid_hidden');

function get_refer_id($user_id){
  echo "REFERID=".$_POST['refer_id'];
  setcookie('completed','yes');
}

add_action('user_register','get_refer_id');


//define('WP_DEBUG', true);
//add_action( 'all', create_function( '', 'print_r( current_filter() );' ) );
//session_start();
//setcookie("refer_id", $_GET['refer_id'], time()+3600, "/", str_replace('http://','',get_bloginfo('url')),false,true );
$_SESSION['hhihi'] = "fatty!";
setcookie("refer_id", $_GET['refer_id'], time()+3600, "/",'localhost',false,true);
var_dump($_GET['refer_id']);

print_r(get_bloginfo('url'));
var_dump($refer_id);

  function wp_coupon_save_referid($refer_id){
     if(!isset($refer_id)){
        $refer_id = $_GET['referid'];
      }
    exit();
     //save referid passed via GET url header to SESSION
    setcookie("refer_id", $refer_id, time()+3600, "/", str_replace('http://','',get_bloginfo('url')) );
    var_dump($_COOKIE['refer_id']);
    return true;
  }


add_action('register','wp_coupon_save_referid');

//add_filter('query_vars',array('CouponReferer','add_query_vars'))
?>
