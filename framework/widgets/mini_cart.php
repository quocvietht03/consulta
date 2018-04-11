<?php

class consulta_Widget_Mini_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	function __construct() {
		$this->widget_cssclass    = 'woocommerce consulta_widget_mini_cart';
		$this->widget_description = __( "Display the user's Cart in the sidebar.", 'consulta' );
		$this->widget_id          = 'consulta_widget_mini_cart';
		$this->widget_name        = __( 'Mini Cart', 'consulta' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Cart', 'consulta' ),
				'label' => __( 'Title', 'consulta' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide if cart is empty', 'consulta' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		/*if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
			return;
		}*/

		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $args, $instance );
		
		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}
		
		echo '<div class="bt-cart-header"><a class="bt-icon" href="javascript:void(0)"><i class="fa fa-shopping-cart"></i><span class="cart_total" ></span></a></div>';
		
		// Insert cart widget placeholder - code in woocommerce.js will update this on page load
		echo '<div class="bt-cart-content"><h6>'.__('MY SHOPPING CART', 'consulta').'</h6><div class="widget_shopping_cart_content"></div></div>';

		if ( $hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $args );
	}
}
add_filter('add_to_cart_fragments', 'woocommerce_icon_add_to_cart_fragment');
if(!function_exists('woocommerce_icon_add_to_cart_fragment')){
	function woocommerce_icon_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
		<span class="cart_total"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
		<?php
		$fragments['span.cart_total'] = ob_get_clean();
		return $fragments;
	}
}

/**
 * Class consulta_Widget_Mini_Cart
 */
function register_consulta_widget_mini_cart() {
    register_widget('consulta_Widget_Mini_Cart');
}
add_action('widgets_init', 'register_consulta_widget_mini_cart');
