<a class="blog-single-resumido" href="<?php the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="">
			<img class="img-fluid" src="<?php the_post_thumbnail_url('medium'); ?>"/>
		</div>
	<?php endif; ?>
	<div class="">
		<h2><?php the_title() ;?></h2>
		<?php the_excerpt(__('(more…)')); ?>
	</div>
</a>