<?php get_header(); ?>
<div class="container">
	<section> <!-- noticias -->
		<h1>Noticias</h1>
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
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . 
					__( '', 'vincent' ) . 
					'</span> ' .
					'<span class="screen-reader-text">' .
					 __( 'Siguiente post:', 'vincent' ) . 
					'</span> ' .
					'<span class="post-title">%title &nbsp;
						<i class="fas fa-arrow-circle-right"></i>
					</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' .
					__( '<i class="fas fa-arrow-circle-left"></i>&nbsp;', 'vincent' ) . 
					'</span> ' .
					'<span class="screen-reader-text">' . 
					__( 'Anterior post:', 'vincent' ) . 
					'</span> ' .
					'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>
	</section> <!-- noticias -->
</div>
<?php get_footer(); ?>
