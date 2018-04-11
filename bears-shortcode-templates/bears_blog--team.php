<?php
/*
 * Layout Name: Team
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlogTeamParams
 */
 
 /* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-blog-layout-%s %s bs-blog-%s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'], $atts['template_params']['style'] );
$loop 		= $atts['posts'];

$col_class = '';
$col_arr = array(
	'1' => 'col-md-12',
	'2' => 'col-md-6',
	'3' => 'col-sm-6 col-md-4',
	'4' => 'col-sm-6 col-md-3'
);
$col = $atts['template_params']['columns'];
$col_class = $col_arr[$col];

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-blog <?php echo esc_attr( $_class ); ?>">
	<div class="row">
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="<?php echo esc_attr($col_class); ?>">
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
			</div>
		<?php endwhile; ?>
	</div>
	<?php if($atts['template_params']['show_pagination'] == 'show') { ?>
		<nav class="bs-pagination" role="navigation">
			<?php
				$big = 999999999; // need an unlikely integer

				// Set up paginated links.
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $loop->max_num_pages,
					'prev_text' => '<i class="fa fa-angle-left"></i>',
					'next_text' => '<i class="fa fa-angle-right"></i>',
				) );
			?>
		</nav>
	<?php } ?>
	<?php wp_reset_postdata(); ?>
</div>
