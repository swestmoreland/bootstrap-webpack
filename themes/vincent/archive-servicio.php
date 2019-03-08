<?php get_header(); ?>
<div class="container-fluid">
	<section>
		<h1>Instalaciones y Mantenciones</h1>
		<img class="img-fluid" src="<?php echo get_template_directory_uri() ?>/image/banners/banner_mantenciones_lg.png">
	</section>
</div>
<div class="container">
	<section id="manutenciones">
		
		<div class="col-sm-12 col-md-12">
		</div>
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
							<h2><?php the_title() ;?></h2>
							<p><?php the_excerpt() ;?></p>
						</div>
						
					</div>
				<?php endwhile; endif; ?>
			</div>



		</div> <!-- /.row -->

	</section>
</div>
<?php get_footer(); ?>
