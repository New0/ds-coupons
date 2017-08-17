<?php
/**
 * DS Coupons
 *
 * @package     dsCoupons
 * @author      Nicolas Figueira
 * @copyright   2017 Nicolas Figueira
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Direct Stripe Coupons
 * Description: Let Direct Stripe users apply coupoons
 * Version:     0.0.1
 * Author:      Nicolas Figueira
 * Author URI:  https://newo.me
 * Text Domain: ds-coupon
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
*
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if(!defined('DSCORE_PATH')) {
    define('DSCORE_PATH', plugin_dir_path(__FILE__));
}
if(!defined('DSCORE_URL')) {
    define('DSCORE_URL', plugin_dir_url(__FILE__));
}
if(!defined('DSCORE_BASENAME')) {
    define('DSCORE_BASENAME', plugin_basename( __FILE__ ));
}

/**
 * Main DS Coupons Class
 *
 * @package DsCoupons
 * @since   0.0.1
 */
 if ( ! class_exists( 'dsCoupons' ) ) :
    
        class dsCoupons {
    
            /**
             * Plugin file path.
             *
             * @since 0.0.1
             * @var string
             */
            const FILE = __FILE__;
    
            /**
             * Plugin directory path.
             *
             * @since 0.0.1
             * @var string
             */
            const DIR = __DIR__;
    
            /**
             * Plugin Version.
             *
             * @since 0.0.1
             * @var string
             */
            const version = '0.0.1';
    
            /**
             * Plugin Textdomain.
             *
             * @since 0.0.1
             * @var string
             */
            const domain = 'direct-stripe';
    
            /**
             * Plugin constructor.
             */
            public function __construct() {
                $this->includes();
                $this->init_hooks();
            }
    
            
            /**
             * Hook into actions and filters.
             *
             * @since 0.0.1
             */
            public function init_hooks() {
                add_action( 'plugins_loaded', array( $this, 'load_translation' ) );
            }
    
            /**
             * Load plugin translation.
             *
             * @since 0.0.1
             */
            public function load_translation() {
                load_plugin_textdomain( self::domain, false, plugin_basename( self::DIR ) . '/languages' );
            }
            
    
            /**
             * Include required core files.
             *
             * @since 0.0.1
             */
            public function includes() {
                include_once( 'controllers/class-ds-coupons.php' );
                if( is_admin() ) {
                    include_once( 'controllers/class-ds-coupons-admin.php' );
                }
            }
        }
    
    endif; //if class exists
    
    $dsCoupons = new dsCoupons;