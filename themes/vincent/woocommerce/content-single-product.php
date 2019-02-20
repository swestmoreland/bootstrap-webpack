<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
//do_action( 'woocommerce_before_single_product' );
?>

<section class="product-singleton" id="product-<?php the_ID(); ?>">

	<h1>
		<?php the_title(); ?>
	</h1>
	
	<?php $feat_image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
	?>
	<div class="product-image">
		<div class="swiper-container gallery-top">
		<div class="swiper-wrapper">
		  <div class="swiper-slide" style="background-image:url(<?php echo $feat_image[0]; ?>)"></div>
			<?php
			    global $product;

			    $attachment_ids = $product->get_gallery_attachment_ids();

			    foreach( $attachment_ids as $attachment_id ) {
			        $image_link = wp_get_attachment_url( $attachment_id );
			    	?>
			    	<div class="swiper-slide" style="background-image:url(<?php echo $image_link; ?>)"></div>
			        <?php
			    }
			?>
		</div>
		<!-- Add Arrows -->
		<div class="swiper-button-next swiper-button-white"></div>
		<div class="swiper-button-prev swiper-button-white"></div>
		</div>
		<div class="swiper-container gallery-thumbs">
			<div class="swiper-wrapper">
			  <div class="swiper-slide" style="background-image:url(<?php echo $feat_image[0]; ?>)"></div>
			<?php
			    global $product;

			    $attachment_ids = $product->get_gallery_attachment_ids();

			    foreach( $attachment_ids as $attachment_id ) {
			        $image_link = wp_get_attachment_url( $attachment_id );
			    	?>
			    	<div class="swiper-slide" style="background-image:url(<?php echo $image_link; ?>)"></div>
			        <?php
			    }
			?>
			</div>
		</div>
	</div>
	<div class="product-description">
		<h2>Descripción</h2>
		<?php the_content();?>
	</div>
</section>

<?php do_action( 'woocommerce_after_single_product' ); ?>
