<?php
vc_map ( array (
		"name" => 'Package',
		"base" => "package",
		"icon" => "tb-icon-for-vc",
		"category" => __ ( 'Extra Elements', 'consulta' ), 
		'admin_enqueue_js' => array(consulta_URI_PATH_FR.'/admin/assets/js/customvc.js'),
		"params" => array (
					array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Style", 'consulta'),
							"param_name" => "style",
							"value" => array(
								"Style 1" => "style1",
								"Style 2" => "style2",
							),
							"description" => __('Select style of posts display in this element.', 'consulta')
					),
					array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __("Columns", 'consulta'),
							"param_name" => "columns",
							"value" => array(
								"4 Columns" => "4",
								"3 Columns" => "3",
								"2 Columns" => "2",
								"1 Column" => "1",
							),
							"description" => __('Select columns display in this element.', 'consulta')
					),
					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __("Show Pagination", 'consulta'),
						"param_name" => "show_pagination",
						"value" => array (
							__ ( "Yes, please", 'consulta' ) => true
						),
						"description" => __("Show or not pagination in this element.", 'consulta')
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
							"taxonomy" => "package_category",
							"heading" => __ ( "Categories", 'consulta' ),
							"param_name" => "category",
							"group" => __("Build Query", 'consulta'),
							"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'consulta' )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Count', 'consulta' ),
							"param_name" => "posts_per_page",
							'value' => '',
							"group" => __("Build Query", 'consulta'),
							"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'consulta' )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Order by', 'consulta' ),
							"param_name" => "orderby",
							"value" => array (
									"None" => "none",
									"Title" => "title",
									"Date" => "date",
									"ID" => "ID"
							),
							"group" => __("Build Query", 'consulta'),
							"description" => __ ( 'Order by ("none", "title", "date", "ID").', 'consulta' )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Order', 'consulta' ),
							"param_name" => "order",
							"value" => Array (
									"None" => "none",
									"ASC" => "ASC",
									"DESC" => "DESC"
							),
							"group" => __("Build Query", 'consulta'),
							"description" => __ ( 'Order ("None", "Asc", "Desc").', 'consulta' )
					),
					
		)
));