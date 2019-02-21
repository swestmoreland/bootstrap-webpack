<?php /* Template Name: Soluciones Hogar */ ?>
 
<?php get_header(); ?>
<div id="solutions" class="container">
	<section>
		<h1>Soluciones energéticas para su hogar</h1>
		<div class="col-sm-12 col-md-12 py-2">
			<img class="img-fluid d-none d-xs-none d-sm-none d-md-block" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-banner.png">
			<img class="img-fluid d-block d-md-none mx-auto" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-banner-mob.png">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-5 offset-md-1">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-1.png">
			<p>Sistema fotovoltaico en smarthouse</p>
		</div> 
		<div class="col-xs-12 col-sm-12 col-md-5">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/soluciones/hogar-fv-2.png">
			<p>Conexión del sistema fotovoltaico 1 fase</p>
		</div> 


		<div class="col-xs-12 col-sm-12 col-md-12 shortcut-galeria" >
			<h2>
				Galería soluciones fotovoltaicas
			</h2>
			<?
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
			?>				
			<div class="row sol-gallery">
				<div class="swiper-container gallery-top">
				<div class="swiper-wrapper">
				    <?php
						while ( $loop->have_posts() ) : $loop->the_post();
							$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
								?>
								<div class="swiper-slide" style="background-image:url(<?php echo $image[0]; ?>)">
								</div>
								<?php

						endwhile;				    
					?>
				</div>
				<!-- Add Arrows -->
				<div class="swiper-button-next swiper-button-white"></div>
				<div class="swiper-button-prev swiper-button-white"></div>
				</div>
				<div class="swiper-container gallery-thumbs">
					<div class="swiper-wrapper">
					<?php
						rewind_posts();
						while ( $loop->have_posts() ) : $loop->the_post();
							$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
								?>
								<div class="swiper-slide" style="background-image:url(<?php echo $image[0]; ?>)">
									
								</div>
								<?php

						endwhile;	
					?>
					</div>
				</div>
			</div>
		</div>
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
				Galería soluciones térmicas
			</h2>
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banners/banner-hogar.jpg">
		</div>
	</section>


</div>
<?php get_footer(); ?>
