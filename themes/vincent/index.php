<?php 
get_header(); 
?>
<!--
<div class="w-100 video-container">
	<div class="video-overlay fade-in">
		<h1>Where the sun is ... <br>Vincent Solar&reg;</h1>
	</div>
	<video poster="/videocover.png" id="bgvid" playsinline autoplay muted loop>
		<source src="/videocover.mp4" type="video/mp4">

	</video>	
</div>
-->
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
				    <div class="swiper-button-prev"></div>
				    <div class="swiper-button-next"></div>	
               </div>
    </div>
	<div class="row cover-swiper"><!-- cover -->
		<?php
		wp_reset_postdata();
        wp_reset_query();
        $args= array(
		'post_type' => array('oferta'),
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'meta_key'		=> 'featured',
		'orderby'		=> 'meta_value',
		'order'			=> 'DESC'
		);

		$loop = new WP_Query( $args );
		?>	
	    <?php
			while ( $loop->have_posts() ) : $loop->the_post();
				$image = null;
					?>
		      		<a class=" d-block d-md-none"> href="<?php echo get_post_permalink(); ?>">
		      		<img class="img-fluid w-100" src="<?php echo the_post_thumbnail_url(); ?>">
		      		</a>
					<?php

			endwhile;
			wp_reset_postdata();
	        wp_reset_query();
		?>

	</div> <!-- cover -->
	<section><!-- SECOND TO MAIN COVERS -->
		<div class="flags">
			<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/flags.png">
		</div>
	</section><!-- SECOND TO MAIN COVERS -->
</div>
<div class="container">
	<section class="main-buttons-group-mov">
		
	</section>
	<section class="main-buttons-group">
		<div class="col-sm-12 col-md-4 columna ">
			<a class="card grow" href="/soluciones-hogar">
				<h2>Solar para su casa</h2>
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
			<a class="card grow" href="/ofertas">
				<h2>Ofertas</h2>
				<div class="">
					<div class="w-100">
						<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/snippets/botonmanutencion.jpg">
					</div>
				</div>
				<div class="">
					<p> Vea nuestras ofertas, proyectos llave en mano sin cobros extra. </p>
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
		      <!--
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
		  		-->
		    </div>
		</div>

	</section> <!-- ofertas -->
</div>
<div class="container-fluid">
	<section>
		<h1><a href="/productos"> Productos </a></h1>
		<?php
		$params = array('posts_per_page' => 15, 'post_type' => 'product');
		$wc_query = new WP_Query($params);
		?>
		<?php if ($wc_query->have_posts()) : ?>
		<div class="swiper-container products-swiper">
			<div class="swiper-wrapper">
			<?php while ($wc_query->have_posts()) :
		                $wc_query->the_post(); ?>
				<div class="swiper-slide">
		        	<a class="product-slide" href="<?php the_permalink(); ?>">
			        	<?php the_post_thumbnail(); ?>
			            <h4>
			               <?php the_title(); ?>
			               
			           </h4>
		           </a>

				</div>
		    <?php endwhile; ?>

			</div>
		<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>
		<?php wp_reset_postdata(); ?>
		<?php else:  ?>
		<div>
			<?php _e( 'Sin Productos' ); ?>
		</div>
		<?php endif; ?>

		<ul>
		</ul>		
	</section>
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
		        <img class="d-block img-fluid w-100" src="<?php echo get_template_directory_uri() ?>/image/banners/consello.jpg">    
		</div>
	</section><!-- productos con sello -->
</div>

<?php get_footer(); ?>
