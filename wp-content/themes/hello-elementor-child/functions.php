<?php
if ( !defined( 'ABSPATH' ) ) exit;

/* -------- CSS Files Link -------------*/

function hello_elementor_child_enqueue_style() {
    wp_enqueue_style( 'hello-elementor-child-style', get_stylesheet_directory_uri(). '/style.css', array('hello-elementor-theme-style' ),wp_get_theme()->get('Version'));
        wp_enqueue_style( 'hello-elementor-child-woocommerce-page', get_stylesheet_directory_uri(). '/css/woocommerce-page.css', array('hello-elementor-theme-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_style' );

/* -------- JS Files Link -------------*/
function hello_elementor_child_enqueue_script() {
    wp_enqueue_script( 'hello-elementor-child-script', get_stylesheet_directory_uri() . '/scripts.js', array( 'jquery' ),wp_get_theme()->get('Version'),true );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_script' );

// TO REMOVE CATEGORY: JUST BEFORE TITLE ON ITS ARCHIVE
add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

// CHANGE CART TEXT TO QUOTE

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'Add to Quote', 'woocommerce' );  
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Add to Quote', 'woocommerce' );
}
// Code End