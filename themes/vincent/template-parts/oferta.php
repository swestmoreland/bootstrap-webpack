<section class="oferta">
	<?php
	 $hash = get_post_meta(get_the_ID(), 'hash', true); 
	?>
	<div class="col-sm-12 col-md-10 offset-md-1">
		<div id="<?php if($hash) {echo $hash;} ?>"></div>
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-5 col-xl-6">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="py-2">
						<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"/>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-7 col-xl-6 oferta-body">
				<h2 class="px-2"><?php the_title() ;?> <small>Todo Incluido</small></h2>
				<?php the_content() ;?>
				<div class="boton-cotizar-mov">
					<a href="tel:322948569" style="border-style: solid; border-color: white; border-width:0 0 1px 0">
						<i class="fas fa-phone"></i>
						<br>
						Llamar
					</a>
					<a href="mailto:info@vincentsolar.com">
						<i class="fas fa-envelope"></i>
						<br>
						Contacto
					</a>
				</div>		
				<button type="button" class="boton-cotizar contacto-oferta">
					Contáctenos <br> <i class="fas fa-hand-pointer"></i>
				</button>				
			</div>
					
		</div>

	</div> <!-- /.row -->

</section>
