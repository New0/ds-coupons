<?php // Form settings
?>
<div id="ds_coupons" class="row">
    <input name="ds_coupon_name" type="text" id="ds_coupon_name" data-ds-coupon-name="ds_coupon_name" />
    <input name="ds_coupon_value" type="text" id="ds_coupon_value" data-ds-coupon-value="ds_coupon_value"  />
    <input name="ds_coupon_id" type="hidden" id="ds_coupon_id" data-ds-coupon-id="ds_coupon_id"  />
    <button name="ds_coupon_action" type="submit" id="ds_coupon_action" ><?php _e('Add coupon', 'ds-coupons'); ?></button>		
</div>
<?php //include( dsCoupons::DIR . '/includes/loops/loop-domaines.php' ); ?>