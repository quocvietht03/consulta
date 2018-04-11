<?php
vc_map(array(
	"name" => __("Counter Up", 'consulta'),
	"base" => "counter_up",
	"category" => __('Extra Elements', 'consulta'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Style", 'consulta'),
			"param_name" => "style",
			"value" => array(
				"Style 1" => "style1",
				"Style 2" => "style2",
			),
			"description" => __('Select style in this elment.', 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Icon", 'consulta'),
			"param_name" => "icon",
			"value" => "",
			"description" => __("Please, enter class icon in this element.", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Title", 'consulta'),
			"param_name" => "title",
			"value" => "",
			"description" => __("Please, enter title in this element.", 'consulta')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Number", 'consulta'),
			"param_name" => "number",
			"value" => "",
			"description" => __("Please, enter number in this element.", 'consulta')
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
