<?php


add_filter( 'wpsf_register_settings_css_for_woocommerce_settings_general', 'wpsf_tabless_settings' );

/**
 * Tabless example
 */
function wpsf_tabless_settings( $wpsf_settings ) {
	// General Settings section
	$wpsf_settings[] = array(
		'section_id'          => 'css_stock_statuses',
		'section_title'       => 'Create Stock Status',
		'section_description' => 'Create Stock Statuses what you can setup in the products.',
		'section_order'       => 1,
		'fields'              => array(
		
			array(
				'id'          => 'css_titles_textarea',
				'title'       => 'Status Titles',
				'desc'        => 'Add one Stock Status per line.',
				'placeholder' => "Arrival 5 days\nArrival 3 days.",
				'type'        => 'textarea',
			),

		),
	);

	return $wpsf_settings;
}