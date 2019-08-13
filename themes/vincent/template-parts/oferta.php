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
					<a id="contactoExpander" class="contacto-oferta" href="#collapseContacto"
					>
						Contacto
						<br>
						<i class="fas fa-hand-pointer"></i>
					</a>
				</div>		
				<button type="button" class="boton-cotizar contacto-oferta">
					Contáctenos <br> <i class="fas fa-hand-pointer"></i>
				</button>				
			</div>
					
		</div>

	</div> <!-- /.row -->

</section>
