		<?php consulta_Footer() ?>
	</div><!-- #wrap -->
	<?php if (class_exists('Woocommerce')) echo do_shortcode('[bears_woofavorite layout="default"]'); ?>
	<?php if (is_active_sidebar('consulta-newsletter-sidebar')) { ?>
		<div id ="consulta_newsletter_global"class="bt-newsletter-global">
			<div class="bt-newsletter">
				<a class="bt-close" href="#">X</a>
				<?php dynamic_sidebar('consulta-newsletter-sidebar'); ?>
			</div>
		</div>
	<?php } ?>
	<div id="bt-backtop"><i class="fa fa-arrow-up"></i></div>
	<?php
		global $consulta_options;
		if(isset($consulta_options["style_selector"])&&$consulta_options["style_selector"]) {
			require_once consulta_ABS_PATH.'/box-style.php';
		}
	?>
	<?php wp_footer(); ?>
</body>