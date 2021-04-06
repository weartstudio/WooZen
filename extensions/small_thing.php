<?php

// add to cart button text
if( get_option('wc_settings_storechip_st_cartButtonText') !== "" ){
    add_filter( 'woocommerce_product_single_add_to_cart_text', 'weart_add_to_cart_button_text' ); 
    add_filter( 'woocommerce_product_add_to_cart_text', 'weart_add_to_cart_button_text' ); 
    function weart_add_to_cart_button_text() {
        return get_option('wc_settings_storechip_st_cartButtonText'); 
    }
}

// quantity for product loop
if( get_option('wc_settings_storechip_st_quantityForLoop') !== "no" ){
    add_filter( 'woocommerce_loop_add_to_cart_link', function($html, $product ){
        if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
            $original = $html;
            $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
            $html .= woocommerce_quantity_input( array(), $product, false );
            $html .= '<button type="submit" class="button">' . esc_html( $product->add_to_cart_text() ) . '</button>';
            $html .= '</form>';
        }
        return $html;
    }, 10, 2 );
}