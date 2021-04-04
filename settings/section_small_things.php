<?php 

// fields for stock statuses

$settings += array(
    'st_title' => array(
        'name'     => __( 'Other tweaks', 'woozen' ),
        'type'     => 'title',
        'desc'     => __('Small thing for better WooCommerce', 'woozen'),
        'id'       => 'wc_settings_woozen_ss_title2'
    ),
    'st_quantityForLoop' => array(
        'name' => __( 'Add quantity in lists', 'woozen' ),
        'type' => 'checkbox',
        'desc' => __( 'Add quantity field before Cart button in products listing (not for Gutenberg Blocks)', 'woozen'),
        'id'   => 'wc_settings_woozen_st_quantityForLoop'
    ),
    'st_cartButtonText' => array(
        'name' => __( 'Cart button text', 'woozen' ),
        'type' => 'text',
        'desc' => __( 'Add custom text for the Cart button.', 'woozen'),
        'id'   => 'wc_settings_woozen_st_cartButtonText'
    ),
    'st_end' => array(
         'type' => 'sectionend',
         'id'   => 'wc_settings_woozen_section_ss_end2'
    )
);