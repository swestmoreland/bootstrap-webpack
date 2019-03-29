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
    wp_enqueue_style( 'vincentstylesheetid', get_template_directory_uri() . '/css/app.css' ,array(), $ver=null); 

    if ( !is_admin() ) {
      wp_dequeue_style( 'wpsl-styles' );

      wp_deregister_script('jquery');
      wp_register_script( 'jquery', get_template_directory_uri() . '/js/app.js',array(),$ver=null );
      wp_enqueue_script('jquery');
      wp_deregister_script('wp-block-library');
      remove_action('wp_head', 'print_emoji_detection_script', 7);
      remove_action('wp_print_styles', 'print_emoji_styles');
    }
}
add_action( 'wp_enqueue_scripts', 'additional_custom_styles' );

// Remove WP Version From Styles  
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}




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

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_thumbnails', 6 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_show_product_thumbnails', 6 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_breadcrumb', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


function woo_rename_tabs( $tabs ) {

  $tabs['description']['title'] = __( 'Ir a descripción' );   // Rename the description tab
  $tabs['related_products']['title'] = __( 'Productos Relacionados' );   // Rename the description tab
  return $tabs;

}
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );


function woo_reorder_tabs( $tabs ) {

  $tabs['reviews']['priority'] = 20;     // Reviews first
  $tabs['description']['priority'] = 10;      // Description second
  $tabs['additional_information']['priority'] = 15; // Additional information third

  return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );

add_editor_style( 'css/app.css' );



function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

/**
* Enables a 'reverse' option for wp_nav_menu to reverse the order of menu
* items. Usage:
*
* wp_nav_menu(array('reverse' => TRUE, ...));
*/
function my_reverse_nav_menu($menu, $args) {
if (isset($args->reverse) && $args->reverse) {
return array_reverse($menu);
}
return $menu;
}
add_filter('wp_nav_menu_objects', 'my_reverse_nav_menu', 10, 2);
