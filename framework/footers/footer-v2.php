<?php
	$show_ft_top = get_post_meta(get_the_ID(),'consulta_show_ft_top',true);
	$show_ft_bottom = get_post_meta(get_the_ID(),'consulta_show_ft_bottom',true);
?>
<footer id="consulta_footer_v2" class="bt-footer-v2">
	<!-- Start Footer Top -->
	<?php if($show_ft_top == 'on' || $show_ft_top == '') { ?>
		<div class="bt-footer-top">
			<div class="container">
				<div class="row">
					<?php if (is_active_sidebar("consulta-footer2-top-widget")) { ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php dynamic_sidebar("consulta-footer2-top-widget"); ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Footer Top -->
	<!-- Start Footer Bottom -->
	<?php if($show_ft_bottom == 'on' || $show_ft_bottom == '') { ?>
		<div class="bt-footer-bottom">
			<div class="container">
				<div class="row">
					<?php if (is_active_sidebar("consulta-footer2-bottom-widget")) { ?>
					<div class="col-md-12">
						<?php dynamic_sidebar("consulta-footer2-bottom-widget"); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- End Footer Bottom -->
</footer>
