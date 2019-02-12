// The custom function MUST be hooked to the init action hook
add_action( 'init', 'lc_register_movie_post_type' );

// A custom function that calls register_post_type
function lc_register_movie_post_type() {

  // Set various pieces of text, $labels is used inside the $args array
  $labels = array(
     'name' => _x( 'Movies', 'post type general name' ),
     'singular_name' => _x( 'Movie', 'post type singular name' ),
     ...
  );

  // Set various pieces of information about the post type
  $args = array(
    'labels' => $labels,
    'description' => 'My custom post type',
    'public' => true,
    ...
  );

  // Register the movie post type with all the information contained in the $arguments array
  register_post_type( 'movie', $args );
}