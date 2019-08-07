<?php get_header(); ?>

<div class="container">
	<section>
		<h1>Ofertas</h1>
	</section>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<?php get_template_part( 'template-parts/oferta', 'single' ); ?>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
