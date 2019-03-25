<?php 
get_header(); 
?>
<div class="container-fluid">
	<div class="row cover-swiper"><!-- cover -->
		<?php
		$args = array(
		        'post_type' => 'attachment',
		        'post_mime_type' => 'image',
		        'orderby' => 'post_date',
		        'order' => 'asc',
		        'posts_per_page' => '3000',
		        'post_status'    => 'inherit',
		        'category_name'=>'cover-grande',
		         );

		$loop = new WP_Query( $args );
		?>		
		<div class="swiper-container desk-swiper d-none d-xs-none d-sm-none d-md-block">
		    <div class="swiper-wrapper">

			    <?php
					while ( $loop->have_posts() ) : $loop->the_post();
						$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
							?>

					      <div class="swiper-slide">
					      	<a href="<?php echo wp_get_attachment_caption(get_the_ID()); ?>">
					      		<img class="img-fluid" src="<?php echo $image[0]; ?>">
					      	</a>
					      </div>
							<?php

					endwhile;				    
				?>		      
		    </div>

		</div>

		<?php
		wp_reset_postdata();
        wp_reset_query();
        $args= array(
		'post_type' => array('oferta'),
		'post_status' => 'publish',
		'post_mime_type' => null,
		'posts_per_page' => '3000',
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
	<section> <!-- 6salepoints -->
		<div class="sale-point">
			<div class="row">
				
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-03.png">
				</div>
				<div class="sale-text">
					<h3>Reduzca sus cuentas</h3>
					<p>Reducción inmediata de su cuenta de luz reflejada en su boleta mensual.</p>
				</div>

			</div>

		</div>

		<div class="sale-point">
			<div class="row">
				
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-05.png">
				</div>
				<div class="sale-text">
					<h3>Aumento de la tarifa</h3>
					<p>El aumento en la tarifa en su cuenta de la luz ya no será un problema para usted, incluso podria convertir su hogar en un hogar autosustentable.</p>
				</div>

			</div>
		</div>

		<div class="sale-point">
			<div class="row">
				
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-04.png">
				</div>
				<div class="sale-text">
					<h3>Ahorre su dinero</h3>
					<p>Nuestras soluciones estan pensadas para poder recuperar la inversión en un par de años solamente. 25% de retorno de la inversión al año, por más de 20 años.</p>
				</div>

			</div>
		</div>

		<div class="sale-point">
			<div class="row">
					
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-06.png">
				</div>
				<div class="sale-text">
					<h3>Instalación simple</h3>
					<p>Instalación simple y rapida, ejecutada por profesionales expertos en el área. Antes de darse cuenta estará produciendo su propia energía.</p>
				</div>

			</div>
		</div>

		<div class="sale-point">
			<div class="row">
				
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-07.png">
				</div>
				<div class="sale-text">
					<h3>Hogar sustentable</h3>
					<p>Podrás producir tu propia energía lo que permitirá convertir tu hogar en un hogar autosustentable y olvidate de pagar de más.</p>
				</div>

			</div>
		</div>

		<div class="sale-point">
			<div class="row">
				
				<div class="icon">
					<img class="img-fluid d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/image/snippets/icono-08.png">
				</div>
				<div class="sale-text">
					<h3>Experiencia y calidad</h3>
					<p>Más de 25 años de experiencia en el rubro solar nos respaldan. Compromiso, profesionalismo, calidad y puntualidad nos caracterizan. </p>
				</div>
			</div>			
		</div>
	</section><!-- 6salepoints -->
</div>
<div class="container-fluid">
	<section class="cover-swiper"><!-- ofertas -->
		
		<div class="swiper-container d-none d-xs-none d-sm-none d-md-block">
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
<div class="container-fluid">
	<section id="soluciones">
		<div class="col-sm-12 col-md-6" style="cursor: pointer;" onclick="window.location='/soluciones-hogar';">
			<img class="img-fluid p-2 mx-auto" style="width: 100%" src="<?php echo get_template_directory_uri() ?>/image/snippets/hogar.png">
		</div>
		<div class="col-sm-12 col-md-6" style="cursor: pointer;" onclick="window.location='/soluciones-empresa';">
			<img class="img-fluid p-2 mx-auto" style="width: 100%" src="<?php echo get_template_directory_uri() ?>/image/snippets/empresas.png">
		</div>
	</section>
</div>
<div class="container">
	<section> <!-- noticias -->
		<h1>Noticias</h1>
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
		<h1>Productos Con Sello</h1>			
		<div class="col">
		        <img class="d-block img-fluid mx-auto" src="<?php echo get_template_directory_uri() ?>/image/banners/consello.png">    
		</div>
	</section><!-- productos con sello -->
	<section><!-- parterns -->
		<div class="brands">
			<h1>Distribuimos y trabajamos junto con</h1>
			<div class="row">
				<?php
				$args = array(
				        'post_type' => 'attachment',
				        'post_mime_type' => 'image',
				        'orderby' => 'post_date',
				        'order' => 'desc',
				        'posts_per_page' => '3000',
				        'post_status'    => 'inherit',
				        'category_name'=>'close-partners',
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
				<?php wp_reset_query(); ?>
				
			</div>
		</div>
		<div class="brands">
			<h1>Han confiado en nosotros</h1>
			<div class="row">
				<?php
				$args = array(
				        'post_type' => 'attachment',
				        'post_mime_type' => 'image',
				        'orderby' => 'post_date',
				        'order' => 'desc',
				        'posts_per_page' => '3000',
				        'post_status'    => 'inherit',
				        'category_name'=>'clientes',
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
				<?php wp_reset_query(); ?>
				
			</div>			
		</div>
		<div class="brands">
			<h1>Partners</h1>
			<div class="row">
				<?php
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
		</div>
	</section> <!-- parterns -->
</div>	

<?php get_footer(); ?>
