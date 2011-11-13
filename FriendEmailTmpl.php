<?php echo 'email starts...'; ?>
  Hey <?php echo $user->user_login; ?>,
    Your coupon code is <?php echo $coupon['coupon_code']; ?>
    Please redeem by <?php echo date('d-M-Y',$coupon['expiry']); ?>!
  Thanks!
  - HuckleBerry
<?php echo '...email ends'; ?>
