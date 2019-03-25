
<footer class="container-fluid">
		<section>
			<div class="col-sm-12 col-md-8 offset-md-2">
				<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/cert.png">
			</div>
		</section>
		<div class="row">
			<p class="d-block fancy-font text-center px-3"> Confianza y calidad europea a su alcance </p>
		</div>
		<section><!-- flags -->
			<div class="proud-to-be">
				<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/proud-to-be.png">
				
			</div>
		</section><!-- flags -->
		<div class="row">
			<div class="col-md-4">
			  <?php
	          $custom_logo_id = get_theme_mod( 'custom_logo' );
	          $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
	          $imghtml=  '<img class="img-fluid footer-logo" src="' . esc_url( $custom_logo_url ) . '" alt="" href="/">';
	          //echo imghtm
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
	                Todos los procesos productivos de nuestros sistemas, son coherentes también con estos principios de descontaminación del planeta y de ahorro de energía. Al instalar un sistema con soluciones térmicas o fotovoltaicas en su hogar y/o empresa, usted esta incrementando su nivel de autonomía energética, a su vez que contribuye activamente en la construcción de un entorno más limpio y saludable
	            </p>

			</div>
		</div>
		<div class="row">
			<p class="d-block bottom-text text-center"> 2018 © Vincent Solar, Renewable Energy | Todos los derechos	</p>	
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
		<a data-toggle="collapse" href="#collapsePanel" role="button" aria-expanded="false" aria-controls="collapsePanel">
			¿Interesado en Ahorrar&nbsp;<i class="fas fa-dollar-sign"></i>?
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