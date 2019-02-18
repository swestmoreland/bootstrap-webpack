<?php get_header(); ?>
<div class="container">
	<section> <!-- noticias -->

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );


			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vincent' ),
				) );
			}

			// End of the loop.
		endwhile;
		?>
		<div class="nav-links">
			<div class="previous"><?php previous_post_link(); ?> </div>
			<div class="next"><?php next_post_link(); ?> </div>	
		</div>
	</section> <!-- noticias -->
</div>
<?php get_footer(); ?>
