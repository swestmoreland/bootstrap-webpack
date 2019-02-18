<div class="blog-single-resumido">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="">
			<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"/>
		</div>
	<?php endif; ?>
	<div class="">
		<h2><? the_title() ;?></h2>
		<? the_excerpt(__('(more…)')); ?>
	</div>
</div>