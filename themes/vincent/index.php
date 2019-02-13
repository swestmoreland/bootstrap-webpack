<?php get_header(); ?>

	<div class="row">

		<div class="col-sm-12">
			<div class="row">
				<h1>Contenido de index.php</h1>
			</div>
			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
				get_template_part( 'content', get_post_format() );
  
			endwhile; endif; 
			?>

		</div> <!-- /.blog-main -->


	</div> <!-- /.row -->

<?php get_footer(); ?>
