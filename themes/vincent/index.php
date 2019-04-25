<?php 
get_header(); 
?>

<div class="w-100 video-container">
	<div class="video-overlay fade-in">
		<h1>Where the sun is ... <br>Vincent Solar&reg;</h1>
	</div>
	<video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
		<source src="/videocover.mp4" type="video/mp4">

	</video>	
</div>
<div class="container-fluid">
	<div class="row cover-swiper"><!-- cover -->
		<?php
		wp_reset_postdata();
        wp_reset_query();
        $args= array(
		'post_type' => array('oferta'),
		'post_status' => 'publish',
		'post_mime_type' => null,
		'posts_per_page' => '3000',
		'orderby'        => array( 'menu_order' => 'ASC' )
		);

		$loop = new WP_Query( $args );
		?>	
		<div class="swiper-container movil-swiper d-block d-md-none">
		    <div class="swiper-wrapper">
			    <?php
					while ( $loop->have_posts() ) : $loop->the_post();
						$image = null;
							?>
					      <div class="swiper-slide">
					      	<a href="<?php echo get_post_permalink(); ?>">
					      		<img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>">
					      	</a>
					      </div>
							<?php

					endwhile;
					wp_reset_postdata();
			        wp_reset_query();
				?>
		    </div>
		    <!-- If we need navigation buttons -->
		    <div class="swiper-button-prev"></div>
		    <div class="swiper-button-next"></div>		    
		</div>


	</div> <!-- cover -->
	<section><!-- flags -->
		<div class="flags">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/flags.png">
			
		</div>
	</section><!-- flags -->
</div>
<div class="container">
	<section class="main-buttons-group">
		<div class="col-sm-12 col-md-4 columna ">
			<a class="card grow" href="/soluciones-hogar">
				<h2>Solar para su hogar</h2>
				<div class="">
					<div class="w-100">
						<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/botonhogar.jpg">
					</div>
				</div>
				<div class="">
					<p> Solución todo en uno para su sistema solar de hogar. </p>
				</div>
			</a>
		</div>
		<div class="col-sm-12 col-md-4 columna ">
			<a class="card grow" href="/soluciones-empresa">
				<h2>Solar para su empresa</h2>
				<div class="">
					<div class="w-100">
						<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/botonempresa.jpg">
					</div>
				</div>
				<div class="">
					<p> Solución de alta potencia para grandes consumidores. </p>
				</div>			
			</a>
		</div>
		<div class="col-sm-12 col-md-4 columna ">
			<a class="card grow" href="/servicios">
				<h2>Manutención</h2>
				<div class="">
					<div class="w-100">
						<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/botonmanutencion.jpg">
					</div>
				</div>
				<div class="">
					<p> Manutención de paneles solares, inversores, termopaneles, calderas. </p>
				</div>				
			</a>
		</div>
	</section>
</div>
<div class="container-fluid">
	<section class="cover-swiper"><!-- ofertas -->
		
		<div class="swiper-container oferta-swiper d-none d-xs-none d-sm-none d-md-block">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide">
		      	<a href="/ofertas">
		      		<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banner_ofertas/oferta-1.jpg">
		      	</a>
		      </div>
		      <div class="swiper-slide">
		      	<a href="/ofertas">
		      		<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banner_ofertas/oferta-2.jpg">
		      	</a>
		      </div>
		      <div class="swiper-slide">
		      	<a href="/ofertas">
		      		<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banner_ofertas/oferta-3.jpg">
		      	</a>
		      </div>
		      <div class="swiper-slide" id="soluciones">
		      	<a href="/ofertas">
		      		<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banner_ofertas/oferta-4.jpg">
		      	</a>
		      </div>
		    </div>
		</div>

	</section> <!-- ofertas -->
</div>

<div class="container">
	<section> <!-- noticias -->
		<h1><a href="/noticias"> Noticias </a></h1>
		<?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
		 
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
		 
			get_template_part( 'template-parts/content-short', get_post_format() );
		 
			endwhile;
			wp_reset_postdata();
			wp_reset_query();
		?>
	</section> <!-- noticias -->
</div>
<div class="container-fluid">
	<section><!-- productos con sello -->
		<h1>Soluciones Con Sello</h1>			
		<div class="w-100">
		        <img class="d-block img-fluid w-100" src="<?php echo get_template_directory_uri() ?>/image/banners/consello.png">    
		</div>
	</section><!-- productos con sello -->
</div>

<?php get_footer(); ?>
