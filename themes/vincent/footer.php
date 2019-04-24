
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
	                <p><span>Los conquistadores 1925 </span> Santiago, Chile</p>
	            </div>
	            <div class="footer-contact-pill">
	                <i class="fas fa-map-marker"></i>
	                <p><span>Av. Industrial 1198 </span> Quilpué, Chile</p>
	            </div>


	            <div class="footer-contact-pill">
	                <a href="tel:+322948569" rel="nofollow"> 					
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
	                En Vincent Solar nos especializamos en el diseño e implementación de soluciones solares integrales para nuestros clientes. Nuestros kits solares incluyen productos como paneles solares, inversores, colectores solares, tanto como la instalación de estos. Al producir su propia electricidad solar no solo podra ahorrar en su cuenta de energía sino que también será parte de la revolución ecológica de energía sustentables en el país y el mundo.
	            </p>

			</div>
		</div>
		<div class="brands">
			<h2>Nuestros clientes y partners</h2>
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
					        'category_name'=>'partners,clientes',
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
			<p class="d-block bottom-text text-center"> 2018 © Vincent Solar | Todos los derechos reservados	</p>	
		</div>
</footer>
<div class="bottom-dock">
	<div class="dock-button d-block d-md-none">
		<div id="collapseContacto" class="collapse">
			<a href="tel:+322948569">
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
			Contactenos
		</a>
		<img src="<?php echo get_template_directory_uri() ?>/image/snippets/it_line.png">
	</div>
	<div class="dock-button d-none d-xs-none d-sm-none d-md-block">
		<a href="mailto:info@vincentsolar.com">
			Contactenos&nbsp;<i class="fas fa-envelope"></i>
		</a>
		<img src="<?php echo get_template_directory_uri() ?>/image/snippets/it_line.png">
	</div>
	<div id="collapsePanel" class="collapse">
		<div class="dock-panel">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 offset-lg-2 col-lg-8">
						<div class="row">
							<div class="col-sm-2">
								<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/water-logo-sm.png">
							</div>
							<div class="col-sm-6">
								<p><strong>Conozca sobre todas nuestras soluciones solares.</strong></p>								
								<p>Revisa todas nuestras ofertas, o <strong>agenda una visita técnica gratis </strong> con nosotros.</p>
							</div>
							<div class="col-sm-4 col-md-4 offset-lg-1 col-lg-3">
								<a href="/ofertas" class="btn panel-btn" role="button" aria-pressed="false">	
									<i class="fas fa-dollar-sign"></i>
									Ir a Ofertas
								</a>
								<a href="mailto:info@vincentsolar.com" class="btn panel-btn" role="button" aria-pressed="false">	
									<i class="fas fa-envelope"></i>
									Contactar
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
  </body>
</html>