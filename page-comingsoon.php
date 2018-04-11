<?php
/*
Template Name: Coming Soon Template
*/
?>
<?php get_header('comingsoon'); ?>
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
			
		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer('comingsoon'); ?>