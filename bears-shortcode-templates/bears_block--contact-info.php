<?php
/**
 * Layout Name: Contact Info
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlockContactInfoParams
 */

$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-block-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-block <?php echo esc_attr( $_class ); ?>">
	<div class="bs-icon">
		<?php
			if($atts['template_params']['icon_font_class']) {
				echo '<i class="'.esc_attr($atts['template_params']['icon_font_class']).'"></i>';
			}
		?>
	</div>
	<div class="bs-content">
		<h4 class="bs-title"><a href="<?php echo esc_url($atts['template_params']['extra_link']); ?>"><?php echo $atts['template_params']['title']; ?></a></h4>
		<div class="bs-desc"><?php echo $atts['template_params']['content']; ?></div>
	</div>
</div>
