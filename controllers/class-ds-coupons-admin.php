<?php

/**
 * Created by PhpStorm.
 * User: nfigueira
 * Date: 17/08/2017
 * Time: 11:27
 */

 class dsCouponsAdmin {
    
    public function __construct() {

        // Register and define the settings
        add_action('admin_init', array($this, 'ds_coupons_admin_init') );
        
    }

    // Register and define the settings
    function ds_coupons_admin_init(){

        add_settings_section(
            'direct_stripe_coupons_section', 
            __( 'Set Coupons', 'ds-coupon' ), 
            array($this, 'direct_stripe_coupon_section_callback'), 
            'directStripeGeneral'
        );
    
        add_settings_field( 
            'direct_stripe_coupons', 
            __( 'Set coupon', 'ds-coupon' ), 
            array($this, 'direct_stripe_coupons_render'), 
            'directStripeGeneral',
            'direct_stripe_coupons_section' 
        );

    }

    function direct_stripe_coupon_section_callback() {
        echo 'render my coupons section';
    }

    function direct_stripe_coupons_render() {
        echo 'my setting';
    }

}
$dsadmin = new \dsCouponsAdmin;