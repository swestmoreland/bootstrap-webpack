<?php get_header(); ?>
	<div class="row">
		<h1>Plantilla manutenciones</h1>
	</div>
	<div class="row">
		<div class="col-sm-12">

			<?php 
				if(have_posts()) : while(have_posts()) : the_post();
					the_title();
					echo '<div class="entry-content">';
					the_content();
					echo '</div>';
				endwhile; endif;
			?>

		</div> <!-- /.blog-main -->


	</div> <!-- /.row -->

<?php get_footer(); ?>
