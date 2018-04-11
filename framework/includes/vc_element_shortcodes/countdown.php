<?php
vc_map(array(
	"name" => __("Countdown", 'consulta'),
	"base" => "countdown",
	"class" => "consulta_countdown",
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
				"Style 3" => "style3",
			),
			"description" => __('Select style in this elment.', 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Date End", 'consulta'),
			"param_name" => "date_end",
			"value" => "",
			"description" => __("Please, Enter date end in this element. Ex: 2016/12/1 15:40:06", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Format", 'consulta'),
			"param_name" => "format",
			"value" => "",
			"description" => __("Please, Enter format in this element. Ex: YODHMS or ODHMS or DHMS", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Labels", 'consulta'),
			"param_name" => "labels",
			"value" => "",
			"description" => __("The display text for the various parts of the countdown. This is one of the regional settings fields. Ex: Years,Months,Weeks,Days,Hours,Minutes,Seconds", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Labels1", 'consulta'),
			"param_name" => "labels1",
			"value" => "",
			"description" => __("The display text for the various parts of the countdown. This is one of the regional settings fields. Ex: Year,Month,Week,Day,Hour,Minute,Second", 'consulta')
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
