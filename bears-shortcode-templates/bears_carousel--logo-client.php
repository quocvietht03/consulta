<?php
/*
 * Layout Name: Client Logo
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsClientLogoCarouselParams
 */

/* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-carousel-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );
$loop 		= $atts['posts'];
$_opts_carousel = array(
	'items' 			=> (int) $atts['items'],
	'stagePadding' 		=> (int) $atts['stagepadding'],
	'loop' 				=> (int) $atts['loop'],
	'margin'	 		=> (int) $atts['margin'],
	'nav' 				=> ( (int) $atts['nav'] ) ? true : false,
	'dots' 				=> ( (int) $atts['dots'] ) ? true : false,
	'autoplay'			=> ( (int) $atts['autoplay'] ) ? true : false,
	'autoplayTimeout' 	=> (int) $atts['autoplaytimeout'],
	'autoplayHoverPause' => ( (int) $atts['autoplayhoverpause'] ) ? true : false,
);

/* set responsive */
if( ! empty( $atts['responsive'] ) ) : 
	$responsive_data = explode( ',', $atts['responsive'] );
	$responsive_arr = array();	
	foreach( $responsive_data as $resItem ) : 
		list( $size, $item ) = explode( ':', $resItem );
		$responsive_arr[$size] = array( 'items' => (int) $item );
	endforeach;
	$_opts_carousel['responsive'] = $responsive_arr;
endif;

if( empty( $atts['template_params']['images'] ) || $atts['template_params']['images'] == '' ) return;
$image_ids = explode( ',', $atts['template_params']['images'] );

$image_links = explode(',', $atts['template_params']['images_link']);

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-carousel <?php echo esc_attr( $_class ); ?>">
	<div class="bs-carousel-container owl-carousel" data-bs-courousel-owl='<?php echo esc_attr( json_encode( $_opts_carousel ) ); ?>'>
		<?php 
			foreach( $image_ids as $key => $id ) {
				$img_data = wp_get_attachment_image_src( $id, $atts['template_params']['image_size'] );
				$image_link = (isset($image_links[$key]) && $image_links[$key] != '') ? $image_links[$key] : '#';
				?>
				<div class="logo-item">
					<a href="<?php echo esc_url($image_link); ?>">
						<img src="<?php echo esc_url($img_data[0]); ?>" alt="Logo Client"/>
					</a>
				</div>
				<?php
			}
		?>
	</div>
</div>