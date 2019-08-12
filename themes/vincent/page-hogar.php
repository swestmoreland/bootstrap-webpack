<?php /* Template Name: Soluciones Hogar */ ?>
 
<?php get_header(); ?>
<div id="solutions" class="container">
	<section>
		<h1>Soluciones energéticas para su casa</h1>
		<div class="col-sm-12 col-md-12 py-2">
			<img class="img-fluid d-none d-xs-none d-sm-none d-md-block" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-banner.png">
			<img class="img-fluid d-block d-md-none mx-auto" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-banner-mob.png">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-1.png">
			<p>Diagrama de sistema fotovoltaico en un hogar.</p>
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-2.png">
			<p>Conexión del sistema fotovoltaico 1 fase</p>
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-3.png">
			<p>Conexión del sistema fotovoltaico 3 fases</p>
		</div> 


		<?php
		$args = array(
		        'post_type' => 'attachment',
		        'post_mime_type' => 'image',
		        'orderby' => 'post_date',
		        'order' => 'desc',
		        'posts_per_page' => '3000',
		        'post_status'    => 'inherit',
		        'category_name'=>'hogar',
		         );

		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post();
			$image = wp_get_attachment_image_src( get_the_ID(), $size="large" ); 
			$image_thumb = wp_get_attachment_image_src( get_the_ID(), $size="medium" ); 
				?>
				<script type="text/javascript">
					photo_arr.push( { "full":"<?php echo $image[0]; ?>", 
						"thumb" :"<?php echo $image_thumb[0]; ?>", 
						"title" :"<?php the_title(); ?>" 
					});
				</script>								
				<?php

		endwhile;				    
		?>				
	</section>
	<section>
		<h1>Soluciones Térmicas</h1>
		<div class="col-sm-12 col-md-12 py-2">
			<img class="img-fluid d-none d-xs-none d-sm-none d-md-block" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-term-banner.png">
			<img class="img-fluid d-block d-md-none mx-auto" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-term-banner-mob.png">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-term-1.png">
			<p>Sistema de circulación forzada, calefacción + agua caliente</p>
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-term-2.png">	
			<p>Sistema de circulación forzada, calefacción + agua caliente + piscina</p>
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-4">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-term-3.png">
		</div>
		<? wp_reset_query(); ?>
		<div class="col-xs-12 col-sm-12 col-md-12 shortcut-galeria">
			<h2>
				Galería Soluciones Residenciales
			</h2>
			<a href="#gallery">
				<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banners/banner-hogar.jpg">
			</a>
		</div>
	</section>
	<div id="gallery"></div>

	<section id="collage-gallery" class="no-gutters">
		<div id="gallery-col-1" class="col-sm-6 col-md-3 col-lg-3"></div>
		<div id="gallery-col-2" class="col-sm-6 col-md-3 col-lg-3"></div>
		<div id="gallery-col-3" class="col-sm-6 col-md-3 col-lg-3"></div>
		<div id="gallery-col-4" class="col-sm-6 col-md-3 col-lg-3"></div>
	</section>

</div>
<?php get_footer(); ?>
