<!-- Start Header -->
<?php 
	global $consulta_options;
	$class_header = 'bt-header-v1';
	if(isset($consulta_options['fixed_main_menu_v1']) && $consulta_options['fixed_main_menu_v1']) {
		$class_header .= ' bt-header-fixed';
	}
	$disable_stick_menu = get_post_meta(get_the_ID(),'consulta_disable_stick_menu',true);
	if($disable_stick_menu != 'on') {
		if(isset($consulta_options['stick_main_menu_v1']) && $consulta_options['stick_main_menu_v1']) {
			$class_header .= ' bt-header-stick';
		}
	}
?>
<header>
	<div id="consulta_header" class="<?php echo esc_attr($class_header); ?>"><!-- bt-header-stick/bt-header-fixed -->
		<!-- Start Header Top -->
		<div class="bt-header-top">
			<div class="container">
				<div class="row">
					<!-- Start Header Logo -->
					<div class="col-md-3 col-sm-3 bt-col-logo">
						<div class="bt-logo">
							<a href="<?php echo esc_url(home_url()); ?>">
								<?php consulta_logo(); ?>
							</a>
						</div>
						<div id="bt-hamburger" class="bt-hamburger visible-xs visible-sm"><span></span></div>
					</div>
					<!-- End Header Logo -->
					<!-- Start Header Sidebar Top v1 -->
					<?php if (is_active_sidebar("consulta-header-top-v1-left")) { ?>
						<div class="col-sm-7 col-md-7">
							<?php 
								dynamic_sidebar("consulta-header-top-v1-left");
							?>
						</div>
					<?php } ?>
					<!-- End Header Sidebar Top v1 -->
					<!-- Start Header Sidebar Top v2 -->
					<?php if (is_active_sidebar("consulta-header-top-request-right")) { ?>
						<div class="col-sm-2 col-md-2 button-request">
							<div class="free-bt hvr-bounce-to-right">
							<?php 
								dynamic_sidebar("consulta-header-top-request-right");
							?>
							</div>
						</div>
					<?php } ?>
					<!-- End Header Sidebar Top v2 -->
				</div>
			</div>
		</div>
		<!-- End Header Top -->
		<!-- Start Header Menu -->
		<div class="bt-header-menu">
			<div class="container">
				<div class="row">
					<div class="col-md-12 bt-col-menu <?php if (is_active_sidebar("consulta-menu-right-sidebar")) echo esc_attr('has-menu-right-sidebar'); ?>">
						<?php
							$attr = array(
								'container_class' => 'bt-menu-list hidden-xs hidden-sm ',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							);
							/* Select menu dynamic */
							$menu_slug = get_post_meta(get_the_ID(),'consulta_menu',true);
							if($menu_slug != '' && $menu_slug != 'global') {
								$attr['menu'] = $menu_slug;
							}
							/* Select menu position */
							$menu_class = get_post_meta(get_the_ID(),'consulta_menu_positon',true);
							$attr['menu_class'] = 'text-left';
							if($menu_class != '' && $menu_class != 'global') {
								$attr['menu_class'] = $menu_class;
							}
							/* Select theme location */
							$menu_locations = get_nav_menu_locations();
							if (!empty($menu_locations['main_navigation'])) {
								$attr['theme_location'] = 'main_navigation';
								wp_nav_menu( $attr );
							} else {
								$attr = array(
									'menu_class'  => 'menu bt-menu-list text-left',
								);
								wp_page_menu($attr);
							}
						?>
						<?php if (is_active_sidebar("consulta-menu-right-sidebar")){ ?>
							<?php dynamic_sidebar("consulta-menu-right-sidebar"); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!-- End Header Menu -->
	</div>
</header>
<div class="bt-menu-canvas-overlay"></div>
<div class="bt-menu-canvas">
	<?php dynamic_sidebar("consulta-menu-canvas-sidebar"); ?>
</div>
<!-- End Header -->
