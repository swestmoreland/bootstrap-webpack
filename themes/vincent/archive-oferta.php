<?php get_header(); ?>

<div class="container">
	<section>
		<h1>Ofertas y Especiales</h1>
	</section>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="oferta">
		
		<div class="col-sm-12 col-md-12">
			<h2 class="px-2"><? the_title() ;?> <small>Todo Incluido</small></h2>
			<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-5">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="py-2">
								<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"/>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-7">
						<? the_content() ;?>
					</div>
						
			</div>

		</div> <!-- /.row -->

	</section>
	<?php endwhile; endif; ?>
</div>
<?php get_footer(); ?>
