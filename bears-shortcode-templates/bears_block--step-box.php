<?php
/**
 * Layout Name: Step Box
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlockStepBoxParams
 */

$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-block-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-block <?php echo esc_attr( $_class ); ?>">
	<div class="bs-icon">
		<?php
			if($atts['template_params']['icon_font_class']) {
				echo '<i class="'.esc_attr($atts['template_params']['icon_font_class']).'"></i>';
			} else {
				if($atts['template_params']['image_icon']) echo '<img src="'.esc_url($atts['template_params']['image_icon']).'" alt="Image Icon"/>';
			}
		?>
	</div>
	<div class="bs-content">
		<h3 class="bs-order-number"><?php echo ''.$atts['template_params']['order_number']; ?></h3>
		<h4 class="bs-title"><a href="<?php echo esc_url($atts['template_params']['extra_link']); ?>"><?php echo ''.$atts['template_params']['title']; ?></a></h4>
	</div>
</div>
