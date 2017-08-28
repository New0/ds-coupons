<?php

/**
 * Created by PhpStorm.
 * User: nfigueira
 * Date: 17/08/2017
 * Time: 11:27
 */

class dsCouponsActions {
    
    public function __construct() {
        
        add_action('direct_stripe_before_button', array($this, 'ds_coupons_retrieve_coupons') );        
    }

    function ds_coupons_retrieve_coupons() {
        if( ! class_exists( 'Stripe\Stripe' ) ) {
            require_once(DSCORE_PATH . '/stripe/init.php');
        }
        $d_stripe_general = get_option( 'direct_stripe_general_settings' );
        // API Keys
        if( isset($d_stripe_general['direct_stripe_checkbox_api_keys']) && $d_stripe_general['direct_stripe_checkbox_api_keys'] === '1' ) {
            \Stripe\Stripe::setApiKey($d_stripe_general['direct_stripe_test_secret_api_key']);
        } else {
            \Stripe\Stripe::setApiKey($d_stripe_general['direct_stripe_secret_api_key']);
        }

        $coupons = \Stripe\Coupon::all(array("limit" => 3));
        var_dump($coupons);


    }


}
$dsadmin = new \dsCouponsActions;