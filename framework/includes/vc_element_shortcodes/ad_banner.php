<?php
vc_map(array(
	"name" => __("Ad Banner", 'consulta'),
	"base" => "ad_banner",
	"category" => __('Extra Elements', 'consulta'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => __("Image", 'consulta'),
			"param_name" => "image",
			"value" => "",
			"description" => __("Select box image in this element.", 'consulta')
		),
		array(
			"type" => "textarea_html",
			"class" => "",
			"heading" => __("Description", 'consulta'),
			"param_name" => "content",
			"value" => "",
			"description" => __("Please, enter description in this element.", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'consulta'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'consulta' )
		),
	)
));
