<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<h3 class="bt-title"><?php the_title(); ?></h3>
		<div class="bt-media <?php echo get_post_format(); ?>">
			<?php
				$media_output = '';
				$attachment_ids = array();
				$gallery = get_post_meta(get_the_ID(), 'consulta_post_gallery', true);
				if(!empty($gallery)) {
					$attachment_ids = explode(',', $gallery);
					$date = time() . '_' . uniqid(true);
					$media_output .= '<div id="carousel-generic'.esc_attr( $date ).'" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner">';
					foreach($attachment_ids as $key => $attachment_id) {
						$cl_active = ($key == 0) ? 'active' : '';
						$attachment_image = wp_get_attachment_image_src($attachment_id, 'full', false);
						if($attachment_image[0]){
							$media_output .= '<div class="item bt-gallery '.esc_attr($cl_active).'">
												<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr__('thumb', 'consulta').'" />
											</div>';
						}
					}
					$media_output .= '</div>
										<a class="left carousel-control" href="#carousel-generic'.esc_attr( $date ).'" role="button" data-slide="prev">
											<i class="fa fa-long-arrow-left"></i>
										</a>
										<a class="right carousel-control" href="#carousel-generic'.esc_attr( $date ).'" role="button" data-slide="next">
											<i class="fa fa-long-arrow-right"></i>
										</a>
									</div>';
				}
				echo ''.$media_output;
			?>
		</div>
		<ul class="bt-meta">
			<li class="bt-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); echo __('by ', 'consulta').get_the_author(); ?></li>
			<li class="bt-public"><?php echo '<i class="fa fa-clock-o"></i> '.get_the_date('M d, Y'); ?></li>
			<li><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comments-o"></i> 0', '<i class="fa fa-comments-o"></i> 1', '<i class="fa fa-comments-o"></i> %' ); ?></a></li>
			<li><?php the_terms( get_the_ID(), 'category', 'Category: ', ', ' ); ?></li>
		</ul>
		<div class="bt-content">
			<?php
				the_content();
				wp_link_pages(array(
					'before' => '<div class="page-links">' . __('Pages:', 'consulta'),
					'after' => '</div>',
				));
			?>
		</div>
		<div class="bt-tags"><?php the_tags( __('<h4>TAGS: </h4> ', 'consulta'), ', ', '' ); ?> </div>
	</div>
</article>
