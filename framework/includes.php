<?php
// Verify purchase code
require_once get_template_directory().'/framework/VerifyTheme.php';
if(class_exists('VerifyTheme')){
	function verifytheme_init(){
		$VerifyTheme = new VerifyTheme();
	}
	add_action( 'after_setup_theme', 'verifytheme_init' );
}
/* Metaboxes */
require_once consulta_ABS_PATH_FR.'/meta-boxes/meta-boxes.php';
/* Load Shortcodes Function */
require_once consulta_ABS_PATH_FR . '/shortcodes/shortcode-functions.php';
/* Load Shortcodes */
require_once consulta_ABS_PATH_FR . '/shortcodes/shortcodes.php';
/* Load Mega menu admin */
require_once consulta_ABS_PATH_FR . '/megamenu/mega-menu.php';
/* Vc extra params */
if (function_exists("vc_add_param")){
	require_once consulta_ABS_PATH_FR.'/includes/vc_extra_params.php';
}
/* Vc extra Fields */
if (class_exists("WpbakeryShortcodeParams")){
	function consulta_add_extra_parame( $name, $form_field_callback, $script_url = null ) {
		return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
	}
	require_once get_template_directory().'/framework/includes/vc_extra_fields.php';
}
/* Vc extra shorcodes */
if (function_exists("vc_map")){
	foreach (glob(consulta_ABS_PATH_FR."/includes/vc_element_shortcodes/*.php") as $filepath)
	{
		/*include $filepath;*/
	}
}
