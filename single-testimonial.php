<?php get_header(); ?>
<?php
global $consulta_options;
$consulta_show_page_title = isset($consulta_options['consulta_post_show_page_title']) ? $consulta_options['consulta_post_show_page_title'] : 1;
$consulta_show_page_breadcrumb = isset($consulta_options['consulta_post_show_page_breadcrumb']) ? $consulta_options['consulta_post_show_page_breadcrumb'] : 1;
consulta_title_bar($consulta_show_page_title, $consulta_show_page_breadcrumb);
$consulta_post_show_post_nav = (int) isset($consulta_options['consulta_post_show_post_nav']) ?  $consulta_options['consulta_post_show_post_nav']: 1;
$consulta_post_show_post_author = (int) isset($consulta_options['consulta_post_show_post_author']) ? $consulta_options['consulta_post_show_post_author'] : 1;
$consulta_post_show_post_comment = (int) isset($consulta_options['consulta_post_show_post_comment']) ?  $consulta_options['consulta_post_show_post_comment']: 1;
?>
	<div class="main-content bt-team-article">
		<article <?php post_class(); ?>>
			<div class="container">
				<div class="row">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col-md-6">
							<div class="bt-thumb"><?php the_post_thumbnail('full'); ?></div>
						</div>
						<div class="col-md-6">
							<div class="bt-header">
								<h2 class="bt-title"><?php the_title(); ?></h2>
								<div class="bt-position"><?php echo get_post_meta(get_the_ID(),'consulta_testimonial_position',true); ?></div>
								<?php if($consulta_post_show_post_nav ) consulta_post_nav(); ?>
							</div>
							<div class="bt-content"><?php the_content(); ?></div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</article>
	</div>
<?php get_footer(); ?>