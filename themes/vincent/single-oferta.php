<?php get_header(); ?>
<div class="container">

	<section> <!-- ofertas -->

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/oferta', 'single' );


			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vincent' ),
				) );
			}

			// End of the loop.
		endwhile;
		?>
		<div class="w-100">
			<a id="" href="/ofertas" class="see-all-offers-btn">Ver Todas las Ofertas <i class="fas fa-dollar-sign"></i></a>
		</div>
	</section> <!-- ofertas -->
</div>
<?php get_footer(); ?>
