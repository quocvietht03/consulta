<?php
/*
 * Layout Name: Zig Zag
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlogZigZagParams
 */
 
 /* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-blog-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );
$loop 		= $atts['posts'];
$count = 0;
?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-blog <?php echo esc_attr( $_class ); ?>">
	<?php while( $loop->have_posts() ) : $loop->the_post(); $count++; ?>
		<div class="bs-item">
			<?php if($count % 2 != 0) { ?>
				<div class="bs-col bs-content">
					<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="bs-excerpt"><?php echo consulta_custom_excerpt($atts['template_params']['excerpt_lenght'], $atts['template_params']['excerpt_more']); ?></div>
					<a class="bs-read-more" href="<?php the_permalink(); ?>"><?php echo $atts['template_params']['read_more_text']; ?></a>
				</div>
			<?php } ?>
			<?php
				if( has_post_thumbnail() ):
					$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $atts['template_params']['image_size'] );
					echo '<div class="bs-col bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover; height: '.esc_attr($atts['template_params']['image_height']).'px;"></div>';
				endif;
			?>
			<?php if($count % 2 == 0) { ?>
				<div class="bs-col bs-content">
					<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<div class="bs-excerpt"><?php echo consulta_custom_excerpt($atts['template_params']['excerpt_lenght'], $atts['template_params']['excerpt_more']); ?></div>
					<a class="bs-read-more" href="<?php the_permalink(); ?>"><?php echo $atts['template_params']['read_more_text']; ?></a>
				</div>
			<?php } ?>
		</div>
	<?php endwhile; ?>
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
