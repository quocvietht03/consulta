<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		//Go out iframe themeforest
		if(top.location != location) {
			top.location.href = document.location.href;
		}
	</script>
	<?php wp_head(); ?>
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '222683041501660');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=222683041501660&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
</head>
<body <?php body_class() ?>>
	<?php
		global $consulta_options;
		$page_loader = (isset($consulta_options["page_loader"])&&$consulta_options["page_loader"])?$consulta_options["page_loader"]: false;
		if($page_loader) echo '<div id="consulta_page_loading"><div class="bt-loader"></div></div>';
	?>
	<div id="bt-main">
		<?php consulta_Header(); ?>
