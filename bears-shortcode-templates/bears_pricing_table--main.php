<?php 
/**
 * Layout Name: Main
 * Author: Bearsthemes
 * Author URI: http://themebears.com
 * Param: consulta_BearsPricingTableMainParams
 */

/* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-pricing-table-layout-%s bs-status-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['template_params']['status'], $atts['class'] );
?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-pricing-table <?php echo esc_attr( $_class ); ?>" style="">
	<div class="bs-thumb" style="<?php echo esc_attr( "background: url({$atts['template_params']['image_thumb']}) no-repeat center center / cover, #f5f5f5;" ); ?>"></div>
	<div class="bs-header">
		<h3 class="bs-price">
			<?php if($atts['template_params']['price']['position_symbols'] == 'left') { ?>
				<span class="bs-symbol"><?php echo ''.$atts['template_params']['price']['symbols']; ?></span><?php echo ''.$atts['template_params']['price']['price']; ?><span class="bs-unit"> / <?php echo ''.$atts['template_params']['unit']; ?></span>
			<?php } else { ?>
				<?php echo ''.$atts['template_params']['price']['price']; ?><span class="bs-symbol"><?php echo ''.$atts['template_params']['price']['symbols']; ?></span><span class="bs-unit"> / <?php echo ''.$atts['template_params']['unit']; ?></span>
			<?php } ?>
		</h3>
		<h4 class="bs-name"><?php echo ''.$atts['template_params']['name']; ?></h4>
	</div>
	<div class="bs-content">
		<?php echo ''.$atts['template_params']['content']; ?>
	</div>
	<div class="bs-footer">
		<a class="bs-button" href="<?php echo esc_url($atts['template_params']['button']['link']); ?>"><?php echo ''.$atts['template_params']['button']['text']; ?></a>
	</div>
</div>