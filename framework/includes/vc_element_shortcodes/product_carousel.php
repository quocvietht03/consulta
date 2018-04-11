<?php
if(class_exists('Woocommerce')){
	vc_map ( array (
		"name" => 'Product Carousel',
		"base" => "product_carousel",
		"icon" => "tb-icon-for-vc",
		"category" => __ ( 'Extra Elements', 'consulta' ), 
		'admin_enqueue_js' => array(consulta_URI_PATH_FR.'/admin/assets/js/customvc.js'),
		"params" => array (
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Template", 'consulta'),
				"param_name" => "tpl",
				"value" => array(
					"Template 1" => "tpl1",
					"Template 2" => "tpl2",
				),
				"description" => __('Select template of posts display in this element.', 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Columns Large devices", 'consulta'),
				"param_name" => "col_lg",
				"value" => "",
				"description" => __("Please, enter number Columns Large devices Desktops (>=1200px) in this element. Default: 4", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Columns Medium devices", 'consulta'),
				"param_name" => "col_md",
				"value" => "",
				"description" => __("Please, enter number Columns Medium devices Desktops (>=992px) in this element. Default: 3", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Columns Small devices", 'consulta'),
				"param_name" => "col_sm",
				"value" => "",
				"description" => __("Please, enter number Columns Small devices Tablets (>=768px) in this element. Default: 2", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Columns Extra small devices", 'consulta'),
				"param_name" => "col_xs",
				"value" => "",
				"description" => __("Please, enter number Columns Extra small devices Phones (<768px) in this element. Default: 1", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Item Space", 'consulta'),
				"param_name" => "item_space",
				"value" => "",
				"description" => __("Please, enter number space between items in this element. Default: 30", 'consulta')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Loop", 'consulta'),
				"param_name" => "loop",
				"value" => array(
					"Enable" => "true",
					"Disable" => "false",
				),
				"description" => __('Inifnity loop. Duplicate last and first items to get loop illusion.', 'consulta')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("autoplay", 'consulta'),
				"param_name" => "autoplay",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
				),
				"description" => __('Autoplay.', 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("SmartSpeed", 'consulta'),
				"param_name" => "smartspeed",
				"value" => "",
				"description" => __("Please, enter number smartSpeed(Speed Calculate. More info to come..) in this element. Default: 500", 'consulta')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Nav", 'consulta'),
				"param_name" => "nav",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
				),
				"description" => __('Show next/prev buttons.', 'consulta')
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __("Dots", 'consulta'),
				"param_name" => "dots",
				"value" => array(
					"Disable" => "false",
					"Enable" => "true",
				),
				"description" => __('Show dots navigation.', 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Extra Class", 'consulta'),
				"param_name" => "el_class",
				"value" => "",
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'consulta' )
			),
			array (
                "type" => "consulta_taxonomy",
                "taxonomy" => "product_cat",
                "heading" => __ ( "Categories", 'consulta' ),
                "param_name" => "product_cat",
                "class" => "",
				"group" => __("Build Query", 'consulta'),
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'consulta' )
            ),
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => __ ( "Show", 'consulta' ),
					"param_name" => "show",
					"value" => array (
							"All Products" => "all_products",
							"Featured Products" => "featured",
							"On-sale Products" => "onsale",
					),
					"group" => __("Build Query", 'consulta'),
					"description" => __ ( "Select show product type in this elment", 'consulta' )
			),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Product Count", 'consulta'),
                "param_name" => "number",
                "value" => "",
				"group" => __("Build Query", 'consulta'),
				"description" => __('Please, enter number of post per page. Show all: -1.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Hide Free', 'consulta'),
                "param_name" => "hide_free",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Build Query", 'consulta'),
                "description" => __('Hide free product in this element.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Hidden', 'consulta'),
                "param_name" => "show_hidden",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Build Query", 'consulta'),
                "description" => __('Show Hidden product in this element.', 'consulta')
            ),
            array (
				"type" => "dropdown",
				"heading" => __ ( 'Order by', 'consulta' ),
				"param_name" => "orderby",
				"value" => array (
						"None" => "none",
						"Date" => "date",
						"Price" => "price",
						"Random" => "rand",
						"Selling" => "selling",
						"Rated" => "rated",
				),
				"group" => __("Build Query", 'consulta'),
				"description" => __ ( 'Order by ("none", "date", "price", "rand", "selling", "rated") in this element.', 'consulta' )
			),
            array(
                "type" => "dropdown",
                "heading" => __('Order', 'consulta'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
				"group" => __("Build Query", 'consulta'),
                "description" => __('Order ("None", "Asc", "Desc") in this element.', 'consulta')
            ),
            
		)
	));
}