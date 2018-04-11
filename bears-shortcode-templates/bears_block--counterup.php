<?php
/**
 * Layout Name: Counter Up
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlockCounterUpParams
 */

 $_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-block-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );

wp_enqueue_script('jquery.counterup.min', consulta_URI_PATH . '/assets/js/jquery.counterup.min.js',array('jquery'),'1.0');
wp_enqueue_script('waypoints.min', consulta_URI_PATH . '/assets/js/waypoints.min.js',array('jquery'),'1.6.2');

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-block <?php echo esc_attr( $_class ); ?>">
	<div class="bs-counter">
		<span class="bs-number"><?php echo number_format($atts['template_params']['number']); ?></span>
		<div class="bs-title"><?php echo $atts['template_params']['title']; ?></div>
	</div>
</div>

 