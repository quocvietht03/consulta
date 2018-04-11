<?php
/*
 * Layout Name: List
 * Author: BEARS Theme
 * Author URI: http://themebears.com
 * Param: consulta_BearsBlogListParams
 */
 
 /* define variable */
$_id 		= sprintf( 'bears-element-%s', $atts['element_id'] );
$_class 	= sprintf( 'bs-blog-layout-%s %s', str_replace( '.php', '', $atts['template_params']['template'] ), $atts['class'] );
$loop 		= $atts['posts'];

?>
<div id="<?php echo esc_attr( $_id ) ?>" class="bs-blog <?php echo esc_attr( $_class ); ?>">
	<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="bs-item">
			<?php
				if( has_post_thumbnail() ):
					$img_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $atts['template_params']['image_size'] );
					echo '<div class="bs-thumb" style="background: url('.esc_url($img_data[0]).') no-repeat center center / cover; height: '.esc_attr($atts['template_params']['image_height']).'px;"><a class="bs-readmore" href="'.get_the_permalink().'" title="'.__('Read More', 'consulta').'"><i class="fa fa-share"></i></a></div>';
				endif;
			?>
			<div class="bs-content">
				<h3 class="bs-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="bs-excerpt"><?php echo consulta_custom_excerpt($atts['template_params']['excerpt_lenght'], $atts['template_params']['excerpt_more']); ?></div>
				<ul class="bs-meta">
					<li class="bs-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); echo __('by ', 'consulta').get_the_author(); ?></li>
					<li class="bs-public"><?php echo get_the_date('M d, Y'); ?></li>
				</ul>
			</div>
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
