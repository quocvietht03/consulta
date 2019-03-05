<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<?php require_once get_template_directory().'/woocommerce/title-bar-shop.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php wc_get_template_part( 'content', 'single-product' ); ?>
						
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>

<?php get_footer( 'shop' ); ?>
