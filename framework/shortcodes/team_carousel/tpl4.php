<article <?php post_class(); ?>>
	<div class="bt-thumb">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
	</div>
	<div class="bt-overlay">
		<div class="bt-content">
			<i class="fa fa-twitter"></i>
			<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php _e('@', 'consulta');the_title(); ?></a></h3>
			<div class="bt-position"><?php echo get_post_meta(get_the_ID(),'consulta_team_position',true); ?></div>
			<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
		</div>
	</div>
</article>