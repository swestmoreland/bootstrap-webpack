
<footer class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		  <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
          echo '<img class="img-fluid footer-logo" src="' . esc_url( $custom_logo_url ) . '" alt="" href="/">';
          ?>
		</div>
		<div class="col-md-4">


            <div>
                <i class="fas fa-map-marker"></i>
                <p><span>Los conquistadores 1925 </span> Santiago, Chile</p>
            </div>
            <div>
                <i class="fas fa-map-marker"></i>
                <p><span>Av. Industrial 1198 </span> Quilpué, Chile</p>
            </div>




            <div>
                <a href="tel:+322948569" rel="nofollow"> 					
	                <i class="fas fa-phone"></i>
	                <p>322 948569</p>
            	</a>
            </div>

            <div>
                <i class="fas fa-envelope"></i>
                <p><a href="mailto:info@vincentsolar.com">info@vincentsolar.com</a></p>
            </div>

        
		</div>

		<div class="col-md-4">

            <p class="footer-company-about">
                Todos los procesos productivos de nuestros sistemas, son coherentes también con estos principios de descontaminación del planeta y de ahorro de energía. Al instalar un sistema con soluciones térmicas o fotovoltaicas en su hogar y/o empresa, usted esta incrementando su nivel de autonomía energética, a su vez que contribuye activamente en la construcción de un entorno más limpio y saludable
            </p>

		</div>
	</div>
</footer>
  </body>
</html>