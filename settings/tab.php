<?php 
//if the object not exist than create it
if ( !class_exists( 'WC_Settings_Tab_storechip' ) ) {

    class WC_Settings_Tab_storechip {

        //take all the hooks
        public static function init() {
            add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
            add_filter( 'woocommerce_get_sections_storechip_tab', __CLASS__ . '::add_section' );
            add_action( 'woocommerce_settings_tabs_storechip_tab', __CLASS__ . '::settings_tab' );
            add_action( 'woocommerce_update_options_storechip_tab', __CLASS__ . '::update_settings' );
        }

        // create storechip tab for woocommerce settings
        public static function add_settings_tab( $settings_tabs ) {
            $settings_tabs['storechip_tab'] = __( 'Storechip', 'storechip' );
            return $settings_tabs;
        }

        //add sections
        public static function add_section( $sections ) {        
            $sections['stock_status'] = __( 'Stock Status', 'storechip' );
            return $sections;       
        }

        // output settings with WooCommerce API
        public static function settings_tab() {
            woocommerce_admin_fields( self::get_settings($settings, $current_section) );
        }

        // save settings with WooCommerce API
        public static function update_settings() {
            woocommerce_update_options( self::get_settings($settings, $current_section) );
        }

        // settings fields
        public static function get_settings() {

            $settings = array();
            require_once( 'section_stock_status.php' );
            require_once( 'section_small_things.php' );
    
            return apply_filters( 'wc_settings_storechip_tab_settings', $settings );
        }

    }

    //start the object
    WC_Settings_Tab_storechip::init();

}