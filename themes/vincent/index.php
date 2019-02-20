<?php get_header(); ?>
<div class="container-fluid">
	<div class="row cover-swiper"><!-- cover -->
		<?php
		$args = array(
		        'post_type' => 'attachment',
		        'post_mime_type' => 'image',
		        'orderby' => 'post_date',
		        'order' => 'desc',
		        'posts_per_page' => '3000',
		        'post_status'    => 'inherit',
		        'category_name'=>'cover-grande',
		         );

		$loop = new WP_Query( $args );
		?>		
		<div class="swiper-container d-none d-xs-none d-sm-none d-md-block">
		    <div class="swiper-wrapper">

			    <?php
					while ( $loop->have_posts() ) : $loop->the_post();
						$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
							?>
					      <div class="swiper-slide">
					      	<img class="img-fluid" src="<?php echo $image[0]; ?>">
					      </div>
							<?php

					endwhile;				    
				?>		      
		    </div>
		</div>
		<? wp_reset_query(); ?>
		<?php
		$args = array(
		        'post_type' => 'attachment',
		        'post_mime_type' => 'image',
		        'orderby' => 'post_date',
		        'order' => 'desc',
		        'posts_per_page' => '3000',
		        'post_status'    => 'inherit',
		        'category_name'=>'cover-movil',
		         );

		$loop = new WP_Query( $args );
		?>	
		<div class="swiper-container d-block d-md-none">
		    <div class="swiper-wrapper">
			    <?php
					while ( $loop->have_posts() ) : $loop->the_post();
						$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
							?>
					      <div class="swiper-slide">
					      	<img class="img-fluid" src="<?php echo $image[0]; ?>">
					      </div>
							<?php

					endwhile;				    
				?>
		    </div>
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
		      	<img class="d-none d-md-block" src="http://placehold.it/1280x720">
		      </div>
		    </div>
		</div>
		<div class="swiper-container d-block d-md-none">
		    <div class="swiper-wrapper">
		      <div class="swiper-slide">
		      	<img class="d-block d-md-none" src="http://placehold.it/720x720">
		      </div>
		    </div>
		</div>

	</section> <!-- ofertas -->
</div>
<div class="container">
	<section> <!-- noticias -->
		<h1>Noticias</h1>
		<?php $the_query = new WP_Query( 'posts_per_page=3' ); ?>
		 
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
		 
			get_template_part( 'template-parts/content-short', get_post_format() );
		 
			endwhile;
			wp_reset_postdata();
		?>
	</section> <!-- noticias -->
</div>
<div class="container-fluid">
	<section><!-- productos con sello -->
		<h1>Productos Con Sello</h1>
		<div class="row">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banners/consello.png">
		</div>
	</section><!-- productos con sello -->
	<section><!-- parterns -->
		<div class="brands">
			<h1>Distribuimos y trabajamos junto con</h1>
			<div class="row">
				<?
				$args = array(
				        'post_type' => 'attachment',
				        'post_mime_type' => 'image',
				        'orderby' => 'post_date',
				        'order' => 'desc',
				        'posts_per_page' => '3000',
				        'post_status'    => 'inherit'
				         );

				$loop = new WP_Query( $args );

				while ( $loop->have_posts() ) : $loop->the_post();
					$category = get_the_category()[0]->slug; 
					$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
					if($category == "close-partners"){
						?>
						<div class="icon">
							<img class="img-fluid" src="<?php echo $image[0]?>">
						</div>						
						<?
					}

				endwhile;
				?>
				
			</div>
		</div>
		<div class="brands">
			<h1>Han confiado en nosotros</h1>
			<div class="row">
				<?
				$loop->rewind_posts(); 

				while ( $loop->have_posts() ) : $loop->the_post();
					$category = get_the_category()[0]->slug; 
					$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
					if($category == "clientes"){
						?>
						<div class="icon">
							<img class="img-fluid" src="<?php echo $image[0]?>">
						</div>						
						<?
					}

				endwhile;
				?>
				
			</div>			
		</div>
		<div class="brands">
			<h1>Partners</h1>
			<div class="row">
				<?
				$loop->rewind_posts(); 

				while ( $loop->have_posts() ) : $loop->the_post();
					$category = get_the_category()[0]->slug; 
					$image = wp_get_attachment_image_src( get_the_ID(), $size="full" ); 
					if($category == "partners"){
						?>
						<div class="icon">
							<img class="img-fluid" src="<?php echo $image[0]?>">
						</div>						
						<?
					}

				endwhile;
				?>
				
			</div>
		</div>
	</section> <!-- parterns -->
</div>	

<?php get_footer(); ?>
