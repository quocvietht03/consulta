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
	<div class="main-content bt-blog-article">
		<div class="row">
			<div class="container">
				<?php
				$consulta_blog_layout = isset($consulta_options['consulta_post_layout']) ? $consulta_options['consulta_post_layout'] : '2cr';
				$cl_sb_left = isset($consulta_options['consulta_post_left_sidebar_col']) ? $consulta_options['consulta_post_left_sidebar_col'] : 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
				$cl_content = isset($consulta_options['consulta_post_content_col']) ? $consulta_options['consulta_post_content_col'] : 'col-xs-12 col-sm-12 col-md-9 col-lg-9';
				$cl_sb_right = isset($consulta_options['consulta_post_right_siedebar_col']) ? $consulta_options['consulta_post_right_siedebar_col'] : 'col-xs-12 col-sm-12 col-md-3 col-lg-3';
				?>
				<!-- Start Left Sidebar -->
				<?php if ( $consulta_blog_layout == '2cl' ) { ?>
					<div class="<?php echo esc_attr($cl_sb_left) ?> sidebar-left">
						<?php if (is_active_sidebar('consulta-left-sidebar')) { dynamic_sidebar('consulta-left-sidebar'); } else { dynamic_sidebar('consulta-main-sidebar'); } ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="<?php echo esc_attr($cl_content) ?> content bt-blog">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'framework/templates/blog/single/entry', get_post_format());
						
						if($consulta_post_show_post_nav ) consulta_post_nav();
						
						if ( $consulta_post_show_post_author ) { 
							echo consulta_author_render(); 
							
							$extra_img = get_post_meta(get_the_ID(), 'consulta_extra_img_url', true);
							if($extra_img) echo '<div class="ro-extra-img"><a href="#"><img alt="extra_img" src="'.esc_url($extra_img).'"></a></div>';
						}
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( (comments_open() && $consulta_post_show_post_comment) || (get_comments_number() && $consulta_post_show_post_comment) ) comments_template();
					endwhile;
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