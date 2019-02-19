<?php
//update_option( 'siteurl', 'http://192.168.43.213:8080' );
//update_option( 'home', 'http://192.168.43.213:8080' );
add_theme_support( 'custom-logo' );
add_theme_support('post-thumbnails');

function customtheme_add_woocommerce_support()
{
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );

function additional_custom_styles() {

    /*Enqueue The Styles*/
    wp_enqueue_style( 'vincentstylesheetid', get_template_directory_uri() . '/css/app.css' ); 
    wp_enqueue_script( 'vincentjs', get_template_directory_uri() . '/js/app.js' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

function custom_woocommerce_product_add_to_cart_text( $text ) {
 
    if( 'Read more' == $text ) {
        $text = __( 'Leer más', 'woocommerce' );
    }
 
    return $text;
     
}
add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_editor_style( 'css/app.css' );