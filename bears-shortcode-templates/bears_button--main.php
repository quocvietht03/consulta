<?php
/*
 * Layout Name: Main
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsButtonMainParams
 */
 
 $_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-button-layout-%s %s bs-button-%s bs-button-%s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'], $atts['template_params']['style'], $atts['template_params']['size'] );
?>
<a id="<?php echo esc_attr( $_id ) ?>" class="bs-btn <?php echo esc_attr( $_class ); ?>" href="<?php echo esc_url($atts['template_params']['link']['url']) ?>">
	<?php echo $atts['template_params']['link']['text'] ?>
</a>
 