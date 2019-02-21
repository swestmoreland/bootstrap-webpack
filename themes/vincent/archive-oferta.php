<?php get_header(); ?>

<div class="container">
	<section id="manutenciones">
		
		<h1>Ofertas y Especiales</h1>
		<div class="col-sm-12 col-md-12">
			<div class="row">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="p-2">
								<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"/>
							</div>
						<?php endif; ?>
						<div class="p-2">
							<h2><? the_title() ;?></h2>
							<p><? the_excerpt() ;?></p>
						</div>
						
					</div>
				<?php endwhile; endif; ?>
			</div>

		</div> <!-- /.row -->

	</section>
</div>
<?php get_footer(); ?>
