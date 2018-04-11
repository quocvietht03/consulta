<?php
vc_map ( array (
	"name" => 'Team',
	"base" => "team",
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
				"Template 3" => "tpl3",
				"Template 4" => "tpl4",
				"Template 5" => "tpl5",
			),
			"description" => __('Select template of posts display in this element.', 'consulta')
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
			"type" => "textfield",
			"class" => "",
			"heading" => __("Extra Class", 'consulta'),
			"param_name" => "el_class",
			"value" => "",
			"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'consulta' )
		),
		array (
			"type" => "consulta_taxonomy",
			"taxonomy" => "team_category",
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
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Title", 'consulta'),
			"param_name" => "show_title",
			"value" => array (
				__ ( "Yes, please", 'consulta' ) => true
			),
			"group" => __("Template", 'consulta'),
			"description" => __("Show or not title of post in this element.", 'consulta')
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => __("Show Meta", 'consulta'),
			"param_name" => "show_meta",
			"value" => array (
				__ ( "Yes, please", 'consulta' ) => true
			),
			"group" => __("Template", 'consulta'),
			"description" => __("Show or not meta of post in this element.", 'consulta')
		),
	)
));