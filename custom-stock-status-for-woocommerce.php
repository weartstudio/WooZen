<?php 
/*
   Plugin Name: Custom Stock Statuses for WooCommerce
   Plugin URI: https://weart.hu/
   description: Create Custom Stock Status Stages for WooCommerce Products.
   Version: 1.0
   Author: weart
   Author URI: https://profiles.wordpress.org/weartstudio/ 
   License: GPL
*/

/* Security (even if not hacker) */
defined('ABSPATH') or die('Hey what are you doing here? You silly human!');


// if woocommrce active?
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( !class_exists( 'woocommerce' ) ) return false;
	}
}


// settings
if ( ! class_exists( 'CSSforWooCommerce' ) ) {

    class CSSforWooCommerce {
        private $plugin_path;
        private $wpsf;


        // constructor
        function __construct() {
            $this->plugin_path = plugin_dir_path( __FILE__ );

            // Include and create a new WordPressSettingsFramework
            require_once( $this->plugin_path . 'wp-settings-framework/wp-settings-framework.php' );
            $this->wpsf = new WordPressSettingsFramework( $this->plugin_path . 'settings/settings-general.php', 'css_for_woocommerce_settings_general' );

            // Add admin menu
            add_action( 'admin_menu', array( $this, 'add_settings_page' ), 20 );
            
            // Add an optional settings validation filter (recommended)
            add_filter( $this->wpsf->get_option_group() . '_settings_validate', array( &$this, 'validate_settings' ) );

        }

        // settings page
        function add_settings_page() {
            $this->wpsf->add_settings_page( array(
                'parent_slug' => 'woocommerce',
                'page_title'  => __( 'Custom Stock Status Settings', 'css_for_woocommerce' ),
                'menu_title'  => __( 'Stock Status', 'css_for_woocommerce' ),
                'capability'  => 'manage_woocommerce',
            ) );
        }

        // validation
        function validate_settings( $input ) {
            // Do your settings validation here
            // Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
            return $input;
        }

    }

    $css_for_woocommerce = new CSSforWooCommerce();
    
}


// get datas from settings
$get_css_val = wpsf_get_setting( 'css_for_woocommerce_settings_general', 'css_stock_statuses', 'css_titles_textarea' );
$css_val = []; //new array for structuring the data

foreach (explode("\n", $get_css_val) as $line) {
    $line_id = sanitize_title( $line ).rand(1,1000); //id create
    $css_val[$line_id] = $line;
}


// new statuses
add_filter( 'woocommerce_product_stock_status_options', function( $status ) use ($css_val){
    foreach ($css_val as $key => $item) $status[$key] = $item;
    return $status;
}, 10, 1 );


// texts for statuses
add_filter( 'woocommerce_get_availability_text', function($availability, $product) use ($css_val){
    foreach ($css_val as $line_slug => $line) {       
        if( $product->stock_status == $line_slug ) $availability = $line;
    }
    return $availability; 
}, 10, 2 );


// class cleanup
add_filter( 'woocommerce_get_availability_class', function() use ($css_val){
    foreach ($css_val as $line_slug => $line) {       
        if( $product->stock_status == $line_slug ) $class = $line;
    }
    return $class;
}, 10, 2 );
