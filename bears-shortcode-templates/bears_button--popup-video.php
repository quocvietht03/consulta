<?php
/*
 * Layout Name: Popup Video
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsButtonPopupVideoParams
 */

$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-button-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class']);
?>
<a id="<?php echo esc_attr( $_id ) ?>" class="html5lightbox bs-btn <?php echo esc_attr( $_class ); ?>" href="<?php echo esc_url($atts['template_params']['link_video']['url']) ?>" title="<?php echo ''.$atts['template_params']['link_video']['text']; ?>">
	<i class="<?php echo esc_attr($atts['template_params']['icon_font_class']); ?>"></i>
</a>