<?php /* Template Name: Preguntas frecuentes */ ?>
 
<?php get_header(); ?>
<div  class="container">
	<section >
		<h1> <?php the_title() ?> </h1>
		<div class="col-sm-12 col-md-12 py-2">
			<img style="width:100%" class="img-fluid d-none d-xs-none d-sm-none d-md-block" src="https://via.placeholder.com/750x178">
			<img style="width:100%" class="img-fluid d-md-none mx-auto" src="https://via.placeholder.com/150">
		</div>
		<div id="questions-content" class="col-12">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>

	</section>

</div>
<?php get_footer(); ?>
