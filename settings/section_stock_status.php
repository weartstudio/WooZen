<?php 

// fields for stock statuses

$settings += array(
    'ss_title' => array(
        'name'     => __( 'Stock Status', 'woozen' ),
        'type'     => 'title',
        'desc'     => __('Create Custom Stock Statuses for Inventory', 'woozen'),
        'id'       => 'wc_settings_woozen_ss_title'
    ),
    'ss_desc' => array(
        'name' => __( 'Add status', 'woozen' ),
        'type' => 'textarea',
        'desc' => __( 'Only one custom status per line.', 'woozen'),
        'id'   => 'wc_settings_woozen_ss_statuses'
    ),
    'ss_end' => array(
         'type' => 'sectionend',
         'id'   => 'wc_settings_woozen_section_ss_end'
    )
);