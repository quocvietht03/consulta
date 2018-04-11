<?php
global $consulta_options;
$consulta_show_page_title = isset($consulta_options['consulta_page_show_page_title']) ? $consulta_options['consulta_page_show_page_title'] : 1;
$consulta_show_page_breadcrumb = isset($consulta_options['consulta_page_show_page_breadcrumb']) ? $consulta_options['consulta_page_show_page_breadcrumb'] : 1;
$subtext = isset($consulta_options['title_bar_subtext']) ? $consulta_options['title_bar_subtext'] : '';
$delimiter = isset($consulta_options['page_breadcrumb_delimiter']) ? $consulta_options['page_breadcrumb_delimiter'] : '/';

?>
<div class="bt-title-bar-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php if($consulta_show_page_breadcrumb){  ?>
					<div class="bt-path">
						<div class="bt-path-inner">
							<i class="fa fa-map-marker"></i>
							<?php echo consulta_page_breadcrumb($delimiter); ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-md-6">
				<?php if($consulta_show_page_title){  ?>
					<h2 class="bt-text-ellipsis"><?php echo consulta_woocommerce_page_title(); ?></h2>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
