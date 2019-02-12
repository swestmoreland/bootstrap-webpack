<?php
add_theme_support( 'custom-logo' );

function additional_custom_styles() {

    /*Enqueue The Styles*/
    wp_enqueue_style( 'vincentstylesheetid', get_template_directory_uri() . '/css/app.css' ); 
    wp_enqueue_script( 'vincentjs', get_template_directory_uri() . '/js/app.js' ); 
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );