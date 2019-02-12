<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head();?>
    <title><?php echo get_bloginfo( 'name' ); ?></title>
  </head>
  <body>  
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
          echo '<img class="img-fluid" src="' . esc_url( $custom_logo_url ) . '" alt="">';
          ?>
        </div>
        <?php echo get_bloginfo( 'description' ); ?>
      </div>
    