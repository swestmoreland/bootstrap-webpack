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
    <div class="container-fluid">
      <div class="row">
        <a href="/">
          <div class="site-logo">
            <div class="logo">
              <?php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
              echo '<img class="img-fluid" src="' . esc_url( $custom_logo_url ) . '" alt="" href="/">';
              ?>
              
            </div>
          </div>
        </a>
        <div class="col-xs-12 col-sm-12 col-md-9">
          <?php wp_nav_menu( array( '
            theme_location' => 'header-menu',          
            'container'      => '',
            'menu_class'     => 'menu flex-md-row flex-xs-column flex-sm-column' ) ); 
            ?>
        </div>
      </div>
    </div> 