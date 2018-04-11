<?php get_header(); ?>
<?php
global $consulta_options;
$consulta_show_page_title = isset($consulta_options['consulta_page_show_page_title']) ? $consulta_options['consulta_page_show_page_title'] : 1;
$consulta_show_page_breadcrumb = isset($consulta_options['consulta_page_show_page_breadcrumb']) ? $consulta_options['consulta_page_show_page_breadcrumb'] : 1;
consulta_title_bar($consulta_show_page_title, $consulta_show_page_breadcrumb);
?>
	<div class="main-content bt-blog-list">
		<div class="container">
			<div class="row">
				<?php
				$consulta_blog_layout = isset($consulta_options['consulta_blog_layout']) ? $consulta_options['consulta_blog_layout'] : '2cr';
				$cl_sb_left = isset($consulta_options['consulta_blog_left_sidebar_col']) ? $consulta_options['consulta_blog_left_sidebar_col'] : 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
				$cl_content = isset($consulta_options['consulta_blog_content_col']) ? $consulta_options['consulta_blog_content_col'] : 'col-xs-12 col-sm-12 col-md-9';
				$cl_sb_right = isset($consulta_options['consulta_blog_right_siedebar_col']) ? $consulta_options['consulta_blog_right_siedebar_col'] : 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
				?>
				<!-- Start Left Sidebar -->
				<?php if ( $consulta_blog_layout == '2cl' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> sidebar-left">
						<?php if (is_active_sidebar('consulta-left-sidebar')) { dynamic_sidebar('consulta-left-sidebar'); } else { dynamic_sidebar('consulta-main-sidebar'); } ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content">
					<?php
					$readmore_text = (int) isset($consulta_options['consulta_blog_post_readmore_text']) ? $consulta_options['consulta_blog_post_readmore_text'] : 'VIEW DETAIL';
					if( have_posts() ) {
						while ( have_posts() ) : the_post();
							if(get_post_type(get_the_ID()) != 'page') {
								get_template_part( 'framework/templates/blog/entry', get_post_format());
							} else {
								?>
								<article <?php post_class(); ?>>
									<div class="bt-post-item">
										<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<ul class="bt-meta">
											<li class="bt-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 35 ); echo __('by ', 'consulta').get_the_author(); ?></li>
											<li class="bt-public"><?php echo '<i class="fa fa-clock-o"></i> '.get_the_date('M d, Y'); ?></li>
											<li><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comments-o"></i> 0', '<i class="fa fa-comments-o"></i> 1', '<i class="fa fa-comments-o"></i> %' ); ?></a></li>
										</ul>
										<a class="bt-readmore" href="<?php the_permalink(); ?>"><?php echo $readmore_text; ?></a>
									</div>
								</article>
								<?php
							}
							
						endwhile;
						consulta_paging_nav();
					}else{
						get_template_part( 'framework/templates/entry', 'none');
					}
					?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if ( $consulta_blog_layout == '2cr' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_right) ?> sidebar-right">
						<?php if (is_active_sidebar('consulta-right-sidebar')) { dynamic_sidebar('consulta-right-sidebar'); } else { dynamic_sidebar('consulta-main-sidebar'); } ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>