<?php 

// fields for stock statuses

$settings += array(
    'st_title' => array(
        'name'     => __( 'Other tweaks', 'storechip' ),
        'type'     => 'title',
        'desc'     => __('Small thing for better WooCommerce', 'storechip'),
        'id'       => 'wc_settings_storechip_ss_title2'
    ),
    'st_quantityForLoop' => array(
        'name' => __( 'Add quantity in lists', 'storechip' ),
        'type' => 'checkbox',
        'desc' => __( 'Add quantity field before Cart button in products listing (not for Gutenberg Blocks)', 'storechip'),
        'id'   => 'wc_settings_storechip_st_quantityForLoop'
    ),
    'st_cartButtonText' => array(
        'name' => __( 'Cart button text', 'storechip' ),
        'type' => 'text',
        'desc' => __( 'Add custom text for the Cart button.', 'storechip'),
        'id'   => 'wc_settings_storechip_st_cartButtonText'
    ),
    'st_end' => array(
         'type' => 'sectionend',
         'id'   => 'wc_settings_storechip_section_ss_end2'
    )
);