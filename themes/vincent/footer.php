<!-- Modal contacto -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header">
			<img class="" style="width: 10%; height:auto;" src="<?php site_icon_url(); ?>" alt="Vincent Solar">
    		
	    	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        	<span aria-hidden="true">&times;</span>
	        </button>
    	</div>
		<div class="modal-contacto-body">
			<img class="d-block img-fluid w-100"
				 src="<?php echo get_template_directory_uri() ?>/image/snippets/solar-pact.jpg"
				 alt="Venta de paneles solares kit placas solares kit"
        	>
        	<div class="button-container">
				<a href="tel:322948569">
					<h4>Llamar</h4>
					
					<i class="fas fa-phone"></i>
					+(56) 32 2948569
				</a>
				<a href="mailto:info@vincentsolar.com">
					<h4>Contacto</h4>
					
					<i class="fas fa-envelope"></i>
					info@vincentsolar.com
				</a>
        	</div>
		</div>
    </div>
  </div>
</div><!-- Modal contacto -->

<footer class="container-fluid">
		<div class="row">
			<p class="d-block fancy-font text-center px-3"> Confianza y calidad europea a su alcance </p>
		</div>
		<section><!-- flags -->
			<div class="proud-to-be">
				<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/proud-to-be.png">
				
			</div>
		</section><!-- flags -->
		<div class="row">
			<div class="col-md-4 d-none d-xs-none d-sm-none d-md-block">
			  <?php
	          $custom_logo_id = get_theme_mod( 'custom_logo' );
	          $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
	          echo '<img class="img-fluid footer-logo" src="' . esc_url( $custom_logo_url ) . '" alt="" href="/">';
	          ?>
			</div>
			<div class="col-md-4 footer-center">

                <div class="footer-contact-pill">
                    <i class="fas fa-map-marker"></i>
                    <p>Oficina Legal:<span>Los conquistadores 1925 </span> Santiago, Chile</p>                   
                </div>
	            <div class="footer-contact-pill">
	                <i class="fas fa-map-marker"></i>
	                <p>Oficina Operativa y Distribucí&oacute;n:<span>Av. Industrial 1198 </span> El Belloto, Chile</p>
	            </div>
	            <div class="footer-contact-pill">
	                <i class="fas fa-map-marker"></i>
	                <p>Proximamente:<span>Florianopolis </span> Brasil</p>
	            </div>

	            <div class="footer-contact-pill">
	                <a href="tel:322948569" rel="nofollow"> 					
		                <i class="fas fa-phone"></i>
		                <p>322 948569</p>
	            	</a>
	            </div>

	            <div class="footer-contact-pill">
	                <i class="fas fa-envelope"></i>
	                <p><a href="mailto:info@vincentsolar.com">info@vincentsolar.com</a></p>
	            </div>

	        
			</div>

			<div class="col-md-4">

	            <p class="footer-company-about">
	            	<?php echo get_bloginfo( 'description' ); ?>
	            	<!--
	                En Vincent Solar nos especializamos en el diseño e implementación de soluciones solares integrales para nuestros clientes. Nuestros kits solares incluyen productos como paneles solares, inversores, colectores solares, tanto como la instalación de estos. Al producir su propia electricidad solar no solo podra ahorrar en su cuenta de energía sino que también será parte de la revolución ecológica de energía sustentables en el país y el mundo.
	            	-->
	            </p>

			</div>
		</div>
		<div class="brands">
			<h2>Nuestros Partners</h2>
			  <!-- Swiper -->
					<?php
					wp_reset_query();
					$args = array(
					        'post_type' => 'attachment',
					        'post_mime_type' => 'image',
					        'orderby' => 'post_date',
					        'order' => 'desc',
					        'posts_per_page' => '3000',
					        'post_status'    => 'inherit',
					        'category_name'=>'partners',
					         );

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
						$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
							?>
							<div class="icon" style="background-image:url(<?php echo $image[0]; ?>)">
							</div>						
							<?php

					endwhile;
					?>
					
		</div>

		<div class="row">
			<div class="w-100">
				<img class="cert-img" src="<?php echo get_template_directory_uri() ?>/image/snippets/cert.png">
			</div>
		</div>
		<div class="row">
			<p class="d-block bottom-text text-center"> 2019 © Vincent Solar | Todos los derechos reservados	</p>	
		</div>
</footer>
<div class="bottom-dock">
	<div class="dock-button d-block d-md-none">
		<div id="collapseContacto" class="collapse">
			<a href="tel:322948569">
				<i class="fas fa-phone"></i>
				Llamar
			</a>
			<a href="mailto:info@vincentsolar.com">
				<i class="fas fa-envelope"></i>
				Correo
			</a>
		</div>
		<a id="contactoExpander" data-toggle="collapse" href="#collapseContacto" role="button" aria-expanded="false" aria-controls="collapseContacto">
			<i class="fas fa-hand-pointer"></i>
			Cont&aacute;ctenos
		</a>
		<img src="<?php echo get_template_directory_uri() ?>/image/snippets/it_line.png">
	</div>
	<div class="dock-button d-none d-xs-none d-sm-none d-md-block">
		<a data-toggle="modal" data-target="#modalContacto">
			Cont&aacute;ctenos&nbsp;<i class="fas fa-envelope"></i>
		</a>
		<img src="<?php echo get_template_directory_uri() ?>/image/snippets/it_line.png">
	</div>
	
</div>
  </body>
</html>