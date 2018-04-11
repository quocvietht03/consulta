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
				$sb_left = isset($consulta_options['consulta_blog_left_sidebar']) ? $consulta_options['consulta_blog_left_sidebar'] : 'Main Sidebar';
				$cl_sb_left = isset($consulta_options['consulta_blog_left_sidebar_col']) ? $consulta_options['consulta_blog_left_sidebar_col'] : 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
				$cl_content = isset($consulta_options['consulta_blog_content_col']) ? $consulta_options['consulta_blog_content_col'] : 'col-xs-12 col-sm-8 col-md-8 col-lg-8';
				if ( !is_active_sidebar('consulta-main-sidebar') && !is_active_sidebar('consulta-left-sidebar') && !is_active_sidebar('consulta-left-sidebar') ) {
					$cl_content = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				}
				$sb_right = isset($consulta_options['consulta_blog_right_sidebar']) ? $consulta_options['consulta_blog_right_sidebar'] : 'Main Sidebar';
				$cl_sb_right = isset($consulta_options['consulta_blog_right_siedebar_col']) ? $consulta_options['consulta_blog_right_siedebar_col'] : 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
				?>
				<!-- Start Left Sidebar -->
				<?php if ( $consulta_blog_layout == '2cl' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> sidebar-left">
						<?php if (is_active_sidebar('consulta-left-sidebar') || is_active_sidebar('consulta-main-sidebar')) { dynamic_sidebar($sb_left); } ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content">
					<?php
					if( have_posts() ) {
						while ( have_posts() ) : the_post();
							get_template_part( 'framework/templates/blog/home/entry', get_post_format());
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
						<?php if (is_active_sidebar('consulta-right-sidebar') || is_active_sidebar('consulta-main-sidebar')) { dynamic_sidebar($sb_right); } ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>
<?php get_footer(); ?>