<?php get_header(); ?>
<div class="container">
	<section><!-- productos -->
		<?php get_sidebar(); ?>
		<div id="content" class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
		<?php woocommerce_content(); ?>
		</div>
		
	</section><!-- productos -->
</div>
<?php get_footer(); ?>