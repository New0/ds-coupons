<?php

/**
 * Created by PhpStorm.
 * User: nfigueira
 * Date: 17/08/2017
 * Time: 11:27
 */

 class dsCouponsAdmin {
    
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'ds_coupons_add_admin_submenu') );
        // Register and define the settings
        add_action('admin_init', array($this, 'ds_coupons_admin_init') );

        
    }

    //Add submenu
    function ds_coupons_add_admin_submenu() {
       add_submenu_page( 'direct_stripe', __( 'Coupons', 'ds-coupons' ), __( 'Coupons', 'ds-coupons' ), 'manage_options', 'ds_coupons', array($this, 'ds_coupons_submenu_page') );
    }

    //Add submenu page
    function ds_coupons_submenu_page() {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?= esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                do_settings_sections('dscoupons');
                ?>
            </form>
        </div>
        <?php
    }

    // Register and define the settings
    function ds_coupons_admin_init(){

        register_setting( 'dscoupons', 'direct_stripe_coupons_settings', array($this, 'direct_stripe_coupons_settings_validation') );

        add_settings_section(
            'direct_stripe_coupons_section', 
            __( 'Set Coupons', 'ds-coupon' ), 
            array($this, 'direct_stripe_coupon_section_callback'), 
            'dscoupons'
        );
    
        add_settings_field( 
            'direct_stripe_coupons', 
            __( 'Add coupon', 'ds-coupon' ), 
            array($this, 'direct_stripe_coupons_render'), 
            'dscoupons',
            'direct_stripe_coupons_section' 
        );


    }

    function direct_stripe_coupon_section_callback() {
        echo 'render my coupons section';
    }

    function direct_stripe_coupons_render() {
        include_once( dsCoupons::DIR . '/includes/display-settings.php' );
    }

    function direct_stripe_coupons_settings_validation( $input ) {
        $allowed_tags = wp_kses_allowed_html( 'post' );
        //Texts
        if( isset($input['direct_stripe_admin_email_subject']) && !empty($input['direct_stripe_admin_email_subject']) ) {
            $input['direct_stripe_admin_email_subject'] = wp_filter_nohtml_kses( $input['direct_stripe_admin_email_subject'] );
        }
        //slug
		if( isset($input['direct_stripe_tc_link']) && !empty($input['direct_stripe_tc_link']) ) {
			$input['direct_stripe_tc_link'] = sanitize_title( $input['direct_stripe_tc_link'] );
		}
		// Make sure isauthorized is only true or false (0 or 1)
		if( isset($input['direct_stripe_use_custom_styles']) && !empty($input['direct_stripe_use_custom_styles']) ) {
			$input['direct_stripe_use_custom_styles'] = sanitize_text_field( $input['direct_stripe_use_custom_styles'] );
        }
        
        return $input;
    }

}
$dsadmin = new \dsCouponsAdmin;