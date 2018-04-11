<?php
/*
Template Name: No Title Bar Template
*/
?>
<?php get_header(); ?>
<?php
global $consulta_options;
$consulta_show_page_comment = (int) isset($consulta_options['page_comment']) ?  $consulta_options['page_comment']: 1;
?>
	<div class="main-content">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>
			
			<?php if($consulta_show_page_comment){ ?>
				<div class="container">
					<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
				</div>
			<?php } ?>
			
		<?php endwhile; // end of the loop. ?>
	</div>
<?php get_footer(); ?>