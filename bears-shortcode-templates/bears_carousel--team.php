<?php
/*
 * Layout Name: Team Carousel
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsTeamCarouselParams
 */

/* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-carousel-layout-%s %s bs-carousel-%s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'], $atts['template_params']['style'] );

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
					if( has_post_thumbnail() ):
						$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $atts['template_params']['image_size'] );
						echo '<div class="bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover; height: '.esc_attr($atts['template_params']['image_height']).'px;"></div>';
					endif;
				?>
				<div class="bs-overlay">
					<div class="bs-content">
						<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="bs-position"><?php echo get_post_meta(get_the_ID(),'consulta_team_position',true); ?></div>
						<?php
							$facebook = get_post_meta(get_the_ID(),'consulta_team_facebook',true);
							$twitter = get_post_meta(get_the_ID(),'consulta_team_twitter',true);
							$linkedin = get_post_meta(get_the_ID(),'consulta_team_linkedin',true);
							$pinterest = get_post_meta(get_the_ID(),'consulta_team_pinterest',true);
							$google_plus = get_post_meta(get_the_ID(),'consulta_team_google_plus',true);
							$tumblr = get_post_meta(get_the_ID(),'consulta_team_tumblr',true);
							$instagram = get_post_meta(get_the_ID(),'consulta_team_instagram',true);
							$flickr = get_post_meta(get_the_ID(),'consulta_team_flickr',true);
							
							$social =  array();
							if($facebook) $social[] = '<li><a href="'.esc_url($facebook).'"><i class="fa fa-facebook"></i></a></li>';
							if($twitter) $social[] = '<li><a href="'.esc_url($twitter).'"><i class="fa fa-twitter"></i></a></li>';
							if($linkedin) $social[] = '<li><a href="'.esc_url($linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
							if($pinterest) $social[] = '<li><a href="'.esc_url($pinterest).'"><i class="fa fa-pinterest"></i></a></li>';
							if($google_plus) $social[] = '<li><a href="'.esc_url($google_plus).'"><i class="fa fa-google-plus"></i></a></li>';
							if($tumblr) $social[] = '<li><a href="'.esc_url($tumblr).'"><i class="fa fa-tumblr"></i></a></li>';
							if($instagram) $social[] = '<li><a href="'.esc_url($instagram).'"><i class="fa fa-instagram"></i></a></li>';
							if($flickr) $social[] = '<li><a href="'.esc_url($flickr).'"><i class="fa fa-flickr"></i></a></li>';
							
							if(!empty($social)) echo '<ul class="bs-social">'.implode(' ', $social).'</ul>'
						?>
					</div>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	</div>
</div>