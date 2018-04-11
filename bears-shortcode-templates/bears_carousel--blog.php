<?php
/*
 * Layout Name: Blog Carousel
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlogCarouselParams
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
				<h3 class="bs-title" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="bs-excerpt"><?php echo consulta_custom_excerpt($atts['template_params']['excerpt_lenght'], $atts['template_params']['excerpt_more']); ?></div>
				<?php
					if( has_post_thumbnail() ):
						$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $atts['template_params']['image_size'] );
						echo '<div class="bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover; height: '.esc_attr($atts['template_params']['image_height']).'px;"><a class="bs-readmore" href="'.get_the_permalink().'" title="'.__('Read More', 'consulta').'"><i class="fa fa-share"></i></a></div>';
					endif;
				?>
				<ul class="bs-meta">
					<li class="bs-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); echo __('by ', 'consulta').get_the_author(); ?></li>
					<li class="bs-public"><?php echo get_the_date('M d, Y'); ?></li>
				</ul>
			</div>
			
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>