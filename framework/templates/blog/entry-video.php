<?php
global $consulta_options;
$readmore_text = (int) isset($consulta_options['consulta_blog_post_readmore_text']) ? $consulta_options['consulta_blog_post_readmore_text'] : 'VIEW DETAIL';
?>
<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="bt-media <?php echo get_post_format(); ?>">
			<?php
				$media_output = '';
				if (has_post_thumbnail()) {
					$media_output .= get_the_post_thumbnail(get_the_ID(), "full");
				}
				$video_url = get_post_meta(get_the_ID(), 'consulta_post_video_url', true);
				if($video_url) {
					$media_output .= '<div class="bt-overlay">
										<a href="'.esc_url($video_url).'" class="html5lightbox" data-group=""  data-thumbnail="" data-width="480" data-height="320" title=""><i class="fa fa-play"></i></a>
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
		<div class="bt-excerpt"><?php the_excerpt(); ?></div>
		<a class="bt-readmore" href="<?php the_permalink(); ?>"><?php echo $readmore_text; ?></a>
	</div>
</article>
