<?php /* Template Name: Manutenciones */ ?>
 
<?php get_header(); ?>
	<div class="row">
		<h1>Plantilla manutenciones</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">

			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();
  	
				get_template_part( 'content-manutenciones', get_post_format() );
  
			endwhile; endif; 
			?>

		</div> <!-- /.blog-main -->


	</div> <!-- /.row -->

<?php get_footer(); ?>
