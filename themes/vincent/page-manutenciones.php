<?php /* Template Name: Manutenciones */ ?>
 
<?php get_header(); ?>
	<div class="row">
		<h1>Plantilla manutenciones</h1>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

			endwhile; // End of the loop.
			?>

		</div> <!-- /.blog-main -->


	</div> <!-- /.row -->

<?php get_footer(); ?>
