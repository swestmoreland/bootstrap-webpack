<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" id="vincentstylesheetid-css" href="/css/app.css?ver=12" type="text/css" media="all">
    <script type="text/javascript" src="/js/app.js?ver=12"></script>
    <?php wp_head();?>
    <title><?php echo get_bloginfo( 'name' ); ?></title>
  </head>
  <body> 
    <div class="header-fill">
      
    </div>
    <header class="one-edge-shadow">
      <div class="row">
        <a class="btn  d-block d-md-none menu-button" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false" aria-controls="collapseMenu">
          <i class="fas fa-bars"></i>
        </a>
        <div class="d-none d-xs-none d-sm-none d-md-block top-badge ">
          <span>Proud to be</span>
          <div class="corner-flag">
            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 3 2">
              <rect width="3" height="2" fill="#009246"/>
              <rect width="2" height="2" x="1" fill="#fff"/>
              <rect width="1" height="2" x="2" fill="#ce2b37"/>
            </svg>
          </div>
          
        </div>
        <a href="/" class="site-logo">
            <div class="logo">
              <?php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
              echo '<img class="img-fluid" src="' . esc_url( $custom_logo_url ) . '" alt="" href="/">';
              ?>
              
            </div>
        </a>
          <?php wp_nav_menu( array( '
            theme_location' => 'header-menu',          
            'container'      => '',
            'menu_id'      => '',
            'reverse'      => FALSE,
            'menu_class'     => 'menu d-none d-xs-none d-sm-none d-md-block' ) ); 
            ?>
          <?php wp_nav_menu( array( '
            theme_location' => 'header-menu',          
            'container'      => '',
            'menu_id'      => 'collapseMenu',
            'menu_class'     => 'menu collapse ' ) ); 
            ?>
      </div>
    </header> 