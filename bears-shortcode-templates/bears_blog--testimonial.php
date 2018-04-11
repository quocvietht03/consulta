<?php
/*
 * Layout Name: Testimonial
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlogTestimonialParams
 */
 
 /* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-blog-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );
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
