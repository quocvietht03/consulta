<?php
vc_map(array(
	"name" => __("Skill Box", 'consulta'),
	"base" => "skill_box",
	"category" => __('Extra Elements', 'consulta'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Value", 'consulta'),
			"param_name" => "value",
			"value" => "",
			"description" => __("Please, enter value in this element. Default: 90", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Unit", 'consulta'),
			"param_name" => "unit",
			"value" => "",
			"description" => __("Please, enter unit in this element. Default: %", 'consulta')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'consulta'),
			"param_name" => "title",
			"value" => "",
			"description" => __("Please, enter title in this element.", 'consulta')
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
