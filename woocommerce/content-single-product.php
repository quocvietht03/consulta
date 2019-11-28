<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="bt-product-item">
		<div class="row bt-col-full-height">
			<div class="col-md-6 bt-col">
				<?php 
					global $product;
					$class_thumb = '';
					$attachment_count = count( $product->get_gallery_image_ids() );
					$catwalk_url = get_post_meta(get_the_ID(), 'consulta_product_video_url', true);
					if ( $attachment_count > 0 || $catwalk_url ) $class_thumb = ' bt-has-left';
				?>
				<div class="bt-thumb<?php echo esc_attr($class_thumb); ?>">
					<?php
						do_action( 'woocommerce_show_product_sale_flash' );
						do_action( 'woocommerce_show_product_images' );
					?>
					<?php if($catwalk_url) { ?>
						<a href="#" class="bt-catwalk-btn"><?php esc_html_e('CatWork', 'consulta'); ?></a>
						<div class="bt-catwalk-video">
							<video controls loop>
							  <source src="<?php echo esc_url($catwalk_url); ?>" type="video/<?php echo substr($catwalk_url, -3); ?>">
							</video>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6 bt-col">
				<div class="bt-content">
					<?php
						do_action( 'woocommerce_template_single_rating' );
						do_action( 'woocommerce_template_single_meta_top' );
						do_action( 'woocommerce_template_single_title' );
						do_action( 'woocommerce_template_single_price' );
						do_action( 'woocommerce_template_single_excerpt' );
						do_action( 'woocommerce_template_single_add_to_cart' );
						do_action( 'woocommerce_template_single_meta' );
						do_action( 'woocommerce_template_single_sharing' );
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
