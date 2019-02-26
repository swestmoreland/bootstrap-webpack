<?php /* Template Name: Noticias */ ?>
 
<?php get_header(); ?>
<div class="container">
	<section> <!-- noticias -->
		<h1>Noticias</h1>
		<?php $the_query = new WP_Query( 'posts_per_page=30' ); ?>
		 
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
		 
			get_template_part( 'template-parts/content-short', get_post_format() );
		 
			endwhile;
			wp_reset_postdata();
		?>
	</section> <!-- noticias -->
</div>
<?php get_footer(); ?>
