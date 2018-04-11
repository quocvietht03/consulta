<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<h3 class="bt-title"><?php the_title(); ?></h3>
		<div class="bt-media <?php echo get_post_format(); ?>">
			<?php
				$media_output = '';
				if (has_post_thumbnail()) {
					$media_output .= get_the_post_thumbnail(get_the_ID(), "full");
				}
				$video_url = get_post_meta(get_the_ID(), 'consulta_post_video_url', true);
				if($video_url) {
					$media_output .= '<div class="bt-overlay">
										<a href="'.esc_url($video_url).'" class="html5lightbox" data-group=""  data-thumbnail="" data-width="" data-height="" title=""><i class="fa fa-play"></i></a>
									</div>
									';
				}
				echo $media_output;
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
