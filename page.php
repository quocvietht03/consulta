<?php get_header(); ?>
<?php
global $consulta_options;
$consulta_show_page_title = isset($consulta_options['consulta_page_show_page_title']) ? $consulta_options['consulta_page_show_page_title'] : 1;
$consulta_show_page_breadcrumb = isset($consulta_options['consulta_page_show_page_breadcrumb']) ? $consulta_options['consulta_page_show_page_breadcrumb'] : 1;
consulta_title_bar($consulta_show_page_title, $consulta_show_page_breadcrumb);

$consulta_show_page_comment = (int) isset($consulta_options['page_comment']) ?  $consulta_options['page_comment']: 1;
?>
	<?php if(class_exists('Vc_Manager')) { ?>
		<div class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
				<div style="clear: both;"></div>
				<?php if($consulta_show_page_comment){ ?>
					
						<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
					
				<?php } ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	<?php } else { ?>
		<div class="row">
			<div class="main-content container">
				<div class="col-md-12">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>
						<div style="clear: both;"></div>
						<?php if($consulta_show_page_comment){ ?>
							
								<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
							
						<?php } ?>

					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>
	<?php } ?>
<?php get_footer(); ?>