<?php 

// fields for stock statuses

$settings += array(
    'ss_title' => array(
        'name'     => __( 'Stock Status', 'storechip' ),
        'type'     => 'title',
        'desc'     => __('Create Custom Stock Statuses for Inventory', 'storechip'),
        'id'       => 'wc_settings_storechip_ss_title'
    ),
    'ss_desc' => array(
        'name' => __( 'Add status', 'storechip' ),
        'type' => 'textarea',
        'desc' => __( 'Only one custom status per line.', 'storechip'),
        'id'   => 'wc_settings_storechip_ss_statuses'
    ),
    'ss_end' => array(
         'type' => 'sectionend',
         'id'   => 'wc_settings_storechip_section_ss_end'
    )
);