<?php 

// get datas from settings
$get_css_val = get_option( 'wc_settings_storechip_ss_statuses' );

if($get_css_val){

    $css_val = []; //new array for structuring the data
    foreach (explode("\n", $get_css_val) as $line) {
        $line_id = sanitize_title( $line ); //id create
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

}