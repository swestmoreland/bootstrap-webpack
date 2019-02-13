<?php
/*
Plugin Name: Vincent Custom Post Types
Description: Plugin para contenido de Vincent solar.
Author: Marcelo Barrientos
*/
 
// Hook <strong>lc_custom_post_servicio()</strong> to the init action hook
add_action( 'init', 'lc_custom_post_servicio' );
 
// The custom function to register a servicio post type
function lc_custom_post_servicio() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Servicios' ),
    'singular_name'      => __( 'Servicio' ),
    'add_new'            => __( 'Add New Servicio' ),
    'add_new_item'       => __( 'Add New Servicio' ),
    'edit_item'          => __( 'Edit Servicio' ),
    'new_item'           => __( 'New Servicio' ),
    'all_items'          => __( 'All Servicios' ),
    'view_item'          => __( 'View Servicio' ),
    'search_items'       => __( 'Search Servicios' ),
    'featured_image'     => 'Poster',
    'set_featured_image' => 'Add Poster'
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our servicios and servicio specific data',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'thumbnail', 'excerpt', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'rewrite' => array('slug' => 'servicios'),
    'query_var'         => 'film'
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // Parameter 2 is the $args array
  register_post_type( 'servicio', $args);
}
 
// Hook <strong>lc_custom_post_servicio_reviews()</strong> to the init action hook
add_action( 'init', 'lc_custom_post_servicio_reviews' );
 
// The custom function to register a servicio review post type
function lc_custom_post_servicio_reviews() {
 
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Servicio Reviews' ),
    'singular_name'      => __( 'Servicio Review' ),
    'add_new'            => __( 'Add New Servicio Review' ),
    'add_new_item'       => __( 'Add New Servicio Review' ),
    'edit_item'          => __( 'Edit Servicio Review' ),
    'new_item'           => __( 'New Servicio Review' ),
    'all_items'          => __( 'All Servicio Reviews' ),
    'view_item'          => __( 'View Servicio Reviews' ),
    'search_items'       => __( 'Search Servicio Reviews' )
  );
 
  // The arguments for our post type, to be entered as parameter 2 of register_post_type()
  $args = array(
    'labels'            => $labels,
    'description'       => 'Holds our servicio reviews',
    'public'            => true,
    'menu_position'     => 6,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true
  );
 
  // Call the actual WordPress function
  // Parameter 1 is a name for the post type
  // $args array goes in parameter 2.
  register_post_type( 'review', $args);
}