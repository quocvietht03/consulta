<?php
vc_map(array(
	"name" => __("Demo Item", 'consulta'),
	"base" => "demo_item",
	"class" => "tb-demo-item",
	"category" => __('Extra Elements', 'consulta'),
	"icon" => "tb-icon-for-vc",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => __("Type", 'consulta'),
			"param_name" => "type",
			"value" => array(
				"Image" => "image",
				"Gallery" => "gallery",
			),
			"description" => __('Select type in this elment.', 'consulta')
		),
		array(
			"type" => "attach_image",
			"class" => "",
			"heading" => __("Image", 'consulta'),
			"param_name" => "demo_image",
			"value" => "",
			"dependency" => array(
				"element"=>"type",
				"value"=> array('image')
			),
			"description" => __("Select image for demo item.", 'consulta')
		),
		array(
			"type" => "attach_images",
			"class" => "",
			"heading" => __("Gallery", 'consulta'),
			"param_name" => "demo_gallery",
			"value" => "",
			"dependency" => array(
				"element"=>"type",
				"value"=> array('gallery')
			),
			"description" => __("Select images for demo item.", 'consulta')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Title", 'consulta'),
			"param_name" => "title",
			"value" => "",
			"description" => __("Please, enter title for demo item.", 'consulta')
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => __("Demo Link", 'consulta'),
			"param_name" => "demo_link",
			"value" => "",
			"description" => __("Please, enter demo link for demo item.", 'consulta')
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
