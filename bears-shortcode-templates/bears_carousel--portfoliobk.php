<?php
/*
 * Layout Name: Portfolio Carousel
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsPortfolioCarouselParams
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

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-carousel <?php echo esc_attr( $_class ); ?>">
	<div class="bs-carousel-container owl-carousel" data-bs-courousel-owl='<?php echo esc_attr( json_encode( $_opts_carousel ) ); ?>'>
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="bs-item">
				<?php
					$cats = get_the_term_list( get_the_ID(), 'portfolio_category', '', ' / ' );
					$video_url = get_post_meta(get_the_ID(),'consulta_portfolio_video_url',true);
					if($video_url == '') $video_url = '#';
					$thumbnail = "";
					if( has_post_thumbnail() ):
						$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $atts['template_params']['image_size'] );
						$thumbnail = $img_data[0];
						echo '<div class="bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover; height: '.esc_attr($atts['template_params']['image_height']).'px;"></div>';
					endif;
				?>
				<div class="bs-overlay">
					<div class="bs-content">
						<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class='bs-taxonomy'><?php echo ''.$cats; ?></div>
						<div class="bs-handle">
							<a class="video html5lightbox" href="<?php echo esc_url($video_url); ?>" title="<?php the_title(); ?>"><i class="fa fa-play"></i></a>
							<a class="lightbox" href="<?php echo esc_url($thumbnail); ?>" data-imagelightbox-thumbnail="" title="<?php _e( 'view thumbnail', 'consulta' ) ?>"><i class='fa fa-search'></i></a>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>