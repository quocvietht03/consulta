<?php
//Add extra params vc_row
vc_add_param ( "vc_row", array (
		"type" 			=> "colorpicker",
		"class" 		=> "",
		"heading" 		=> __( "Background Overlay", 'consulta' ),
		"param_name" 	=> "consulta_bg_overlay",
		"value" 		=> "",
		"group" => __("Custom Options", 'consulta'),
		"description" 	=> __( "Select color background overlay in this row.", 'consulta' )
) );
vc_add_param ( "vc_row", array (
		"type" 			=> "checkbox",
		"class" 		=> "",
		"heading" 		=> __( "Background Fixed", 'consulta' ),
		"param_name" 	=> "consulta_bg_fixed",
		"value" 		=> "",
		"group" => __("Custom Options", 'consulta'),
		"description" 	=> __( "Enable background fixed in this row.", 'consulta' )
) );

//Add extra params vc_custom_heading
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textfield",
		"class" 		=> "",
		"heading" 		=> __( "Icon", 'consulta' ),
		"param_name" 	=> "icon",
		"value" 		=> "",
		"group" => __("Icon", 'consulta'),
		"description" 	=> __( "Enter class icon in this custom heading. EX: fa fa-heart", 'consulta' )
) );
vc_add_param ( "vc_custom_heading", array (
		"type" 			=> "textarea",
		"class" 		=> "",
		"heading" 		=> __( "Custom CSS", 'consulta' ),
		"param_name" 	=> "custom_css",
		"value" 		=> "",
		"description" 	=> __( "Enter style in this custom heading. EX: line-height: 24px; letter-spacing: 0.04em; ...", 'consulta' )
) );
