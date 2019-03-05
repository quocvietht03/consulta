<?php 
	global $consulta_options;
	$preset_color = (isset($consulta_options['preset_color'])&&$consulta_options['preset_color'])?$consulta_options['preset_color']: 'default';
	
?>
<div id="panel-style-selector">
	<div class="panel-wrapper">
		<div class="panel-selector-open"><i class="fa fa-cog fa-2x fa-spin"></i></div>
		<div class="panel-selector-body clearfix">
			<div class="panel-selector-body-inner">
				<section class="panel-selector-section clearfix">
					<h3 class="panel-selector-title">Main Color</h3>
					<div class="panel-selector-row clearfix">
						<ul class="panel-primary-color">
							<li class="<?php if($preset_color == 'default') echo 'default active'; ?>" style="background: #00abc9;" data-link="#"></li>
							<li class="<?php if($preset_color == 'preset1') echo 'preset1 active'; ?>" style="background: #0dbf9b;" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/css/presets/preset1.css'); ?>"></li>
							<li class="<?php if($preset_color == 'preset2') echo 'preset2 active'; ?>" style="background: #c3512f;" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/css/presets/preset2.css'); ?>"></li>
							<li class="<?php if($preset_color == 'preset3') echo 'preset3 active'; ?>" style="background: #c7af8d;" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/css/presets/preset3.css'); ?>"></li>
							<li class="<?php if($preset_color == 'preset4') echo 'preset4 active'; ?>" style="background: #ffbf3b;" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/css/presets/preset4.css'); ?>"></li>
							<li class="<?php if($preset_color == 'preset5') echo 'preset5 active'; ?>" style="background: #a5b800;" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/css/presets/preset5.css'); ?>"></li>
						</ul>
					</div>
				</section>
				<section class="panel-selector-section clearfix">
					<h3 class="panel-selector-title">Body Layout</h3>

					<div class="panel-selector-row clearfix">
						<a data-type="layout" data-value="wide" href="#" class="panel-selector-btn active">Wide</a>
						<a data-type="layout" data-value="boxed" href="#" class="panel-selector-btn">Boxed</a>
					</div>
				</section>
				<section class="panel-selector-section clearfix">
					<h3 class="panel-selector-title">Body Background</h3>

					<div class="panel-selector-row clearfix">
						<ul class="panel-primary-background">
							<li class="pattern-0" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/tree_bark.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/tree_bark.png').')'; ?>"></li>
							<li class="pattern-2" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/triangular.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/triangular.png').')'; ?>"></li>
							<li class="pattern-1" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/pattern-1.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/pattern-1.png').')'; ?>"></li>
							<li class="pattern-3" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/pattern-2.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/triangular_@2X.png').')'; ?>"></li>
							<li class="pattern-4" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/wild_flowers.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/pattern-2.png').')'; ?>"></li>
							<li class="pattern-5" data-link="<?php echo esc_url(consulta_URI_PATH.'/assets/images/patterns/triangular_@2X.png'); ?>" data-type="pattern" style="<?php echo 'background: url('.esc_url(consulta_URI_PATH.'/assets/images/patterns/triangular_@2X.png').')'; ?>"></li>
						</ul>
					</div>
				</section>
				<section class="panel-selector-section clearfix">
					<h3 class="panel-selector-title">Select Demo</h3>
					<div class="panel-selector-row clearfix panel-select-homepage">
						<?php
						$homepages = array(
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo1-min.jpg',
								'title' => 'Home Version 01'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v2/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo2-min.jpg',
								'title' => 'Home Version 02'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v3/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo3-min.jpg',
								'title' => 'Home Version 03'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v4/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo4-min.jpg',
								'title' => 'Home Version 04'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v5/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo5-min.jpg',
								'title' => 'Home Version 05'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v6/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo6-min.jpg',
								'title' => 'Home Version 06'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v7/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo7-min.jpg',
								'title' => 'Home Version 07'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v8/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo8-min.jpg',
								'title' => 'Home Version 08'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v9/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo9-min.jpg',
								'title' => 'Home Version 09'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v10/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo10-min.jpg',
								'title' => 'Home Version 10'
							),
							array(
								'link' => 'https://bearsthemespremium.com/theme/consulta/home-page-v11/',
								'img' => 'https://bearsthemespremium.com/theme/consulta/wp-content/uploads/2016/10/home_demo11-min.jpg',
								'title' => 'Home Version 11'
							),
						);
						foreach($homepages as $homepage) {
							echo '<a href="'.esc_url($homepage['link']).'" data-img="'.esc_url($homepage['img']).'">
									<div class="thumb" style="background: url('.esc_url($homepage['img']).') no-repeat scroll center top / cover;"></div>
									<h6>'.$homepage['title'].'</h6>
								</a>';
						}
						?>
						
					</div>
				</section>
			</div>
		</div>
		<div class="demo-popup"></div>
	</div>
</div>