<?php get_header(); ?>
	<div class="row">
		<h1>Nuestros Servicios</h1>
	</div>
	<div class="row">

		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="col-sm-6">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="row">
						<img src="<?php the_post_thumbnail_url(); ?>"/>
					</div>
				<?php endif; ?>
				<div class="row">
					<h2><? the_title() ;?></h2>
					<p><? the_excerpt() ;?></p>
				</div>
				
			</div>
		<?php endwhile; endif; ?>



	</div> <!-- /.row -->

<?php get_footer(); ?>
