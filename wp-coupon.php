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

function add_query_vars($aVars) {
    $aVars[] = "referid";    // represents the name of the product category as shown in the URL
    return $aVars;
  }

  function insert_referid_hidden(){
    $refer_id = $_GET['refer_id'];
    $field = '<input type="hidden" name="refer_id" value="'.$refer_id.'"/>';
    echo $field;
  }

add_action('register_form','insert_referid_hidden');

function get_refer_id($user_id){
  global $wpdb;
  $wpdb->show_errors();

  $COUPON_REFERAL_TBL = $wpdb->prefix.'coupon_referals';
  $COUPON_TBL = $wpdb->prefix.'wpsc_coupon_codes';
  $referid = $_POST['refer_id'];
  
  $data = array();
  $data['friend_id'] = $user_id;
  $data['referer_id'] = $referid;
 
  //create coupon
  $coupon = create_coupon($user_id,$referid);
  print_r($coupon);
  $wpdb->insert($COUPON_TBL, $coupon);
  print_r($wpdb->last_query);
  $wpdb->print_error();

  $data['friend_coupon'] =  $coupon['coupon_code']; //referer coupon should b    e reverse

  print_r($data);
  //echo "REFERID=".$_POST['refer_id'];
  $wpdb->insert($COUPON_REFERAL_TBL,$data);
  $wpdb->print_error();
}

add_action('user_register','get_refer_id');

/*
 Create couponcode based on bizlogic
 and coupon obj prior to insert into into DB TBL
 AND return code
 @param 
 @return coupon
*/
function create_coupon($userId,$referId){
  $coupon = array();
  $coupon['coupon_code'] = substr(md5($userId.$referId),0,5);
  $coupon['value'] = 15.00;// %discount
  $coupon['is-percentage'] = 1;
  $coupon['use-once'] = 1;
  $coupon['is-used'] = 0;
  $coupon['active'] = 1;
  $coupon['every_product'] = 1;
  $coupon['start'] = date('Y-m-d H:i:s'); //mysql date format
  $coupon['expiry'] = date('Y-m-d H:i:s',strtotime('+1 month'));
  $coupon['condition'] = "";//special conditions
  return $coupon;
}








?>
