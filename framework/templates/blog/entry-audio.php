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
				$audio_source_from = get_post_meta(get_the_ID(), 'consulta_audio_type', true);
				if($audio_source_from == 'soundcloud') {
					$media_output = get_post_meta(get_the_ID(), 'consulta_post_audio_iframe', true);
				} else {
					$audio_type = get_post_meta(get_the_ID(), 'consulta_post_audio_type', true);
					$audio_url = get_post_meta(get_the_ID(), 'consulta_post_audio_url', true);
					if($audio_url) echo do_shortcode('[audio '.$audio_type.'="'.$audio_url.'"][/audio]');
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
		<div class="bt-excerpt"><?php the_excerpt(); ?></div>
		<a class="bt-readmore" href="<?php the_permalink(); ?>"><?php echo ''.$readmore_text; ?></a>
	</div>
</article>
