<?php 
/**
 * Plugin Name:         WooZen
 * Description:         Add extra capabilities to WooCommerce with the power of Zen.
 * Version:             1.0
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Author:              weartstudio
 * Author URI:          https://weart.hu
 * License:             GPLv2
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         woozen
 * Domain Path:       /languages
 */

/* Security (even if not hacker) */
defined('ABSPATH') or die('Hey what are you doing here? You silly human!');


// if woocommrce active?
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( !class_exists( 'woocommerce' ) ) return false;
	}
}


// if we are in admin interface
if ( is_admin() ) {
    require_once __DIR__ . '/settings/tab.php';
}

require_once __DIR__ . '/extensions/stock_status.php';
require_once __DIR__ . '/extensions/small_thing.php';
