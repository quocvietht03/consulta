<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
	<?php
		global $consulta_options;
		$page_loader = (isset($consulta_options["page_loader"])&&$consulta_options["page_loader"])?$consulta_options["page_loader"]: false;
		if($page_loader) echo '<div id="consulta_page_loading"><div class="bt-loader"></div></div>';
	?>
	<div id="bt-main">
		<?php consulta_Header(); ?>
