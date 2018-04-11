<?php
/*
 * Layout Name: Testimonial Carousel
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsTestimonialCarouselParams
 */

/* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-carousel-layout-%s bs-carousel-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['template_params']['style'], $atts['class'] );
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
?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-carousel <?php echo esc_attr( $_class ); ?>">
	<div class="bs-carousel-container owl-carousel" data-bs-courousel-owl='<?php echo esc_attr( json_encode( $_opts_carousel ) ); ?>'>
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="bs-item">
				<a href="<?php the_permalink(); ?>">
					<?php
						$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
						echo '<div class="bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover;"></div>';
					?>
				</a>
				<div class="bs-content">
					<div class="bs-excerpt"><?php the_excerpt(); ?></div>
					<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="bs-position"><?php echo get_post_meta(get_the_ID(),'consulta_testimonial_position',true); ?></div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>