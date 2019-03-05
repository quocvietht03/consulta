<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="posted_in">' . _n( '<i class="fa fa-diamond"></i> Category:', '<i class="fa fa-diamond"></i> Categories:', count( $product->get_category_ids() ), 'consulta' ) . ' ', '</div>' ); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<div class="tagged_as">' . _n( '<i class="fa fa-tags"></i> Tag:', '<i class="fa fa-tags"></i> Tags:', count( $product->get_tag_ids() ), 'consulta' ) . ' ', '</div>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
