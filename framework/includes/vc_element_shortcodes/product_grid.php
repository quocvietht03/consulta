<?php
if(class_exists('Woocommerce')){
    vc_map(array(
        "name" => __("Product Grid", 'consulta'),
        "base" => "products_grid",
        "class" => "tb-products-grid",
        "category" => __('Extra Elements', 'consulta'),
        'admin_enqueue_js' => array(consulta_URI_PATH_ADMIN.'assets/js/customvc.js'),
        "icon" => "tb-icon-for-vc",
        "params" => array(
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Template", 'consulta'),
                "param_name" => "tpl",
                "value" => array(
					"Template 1" => "tpl1",
					"Template 2" => "tpl2"
                ),
                "description" => __('Select template in this elment.', 'consulta')
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
				"description" => __('Select columns in this elment.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Pagination', 'consulta'),
                "param_name" => "show_pagination",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
                "description" => __('Show or hide pagination in this element.', 'consulta')
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
            array(
                "type" => "checkbox",
                "heading" => __('Show Sale Flash', 'consulta'),
                "param_name" => "show_sale_flash",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Template", 'consulta'),
                "description" => __('Show or hide sale flash of product.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Price', 'consulta'),
                "param_name" => "show_price",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Template", 'consulta'),
                "description" => __('Show or hide price of product.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Title', 'consulta'),
                "param_name" => "show_title",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Template", 'consulta'),
                "description" => __('Show or hide title of product.', 'consulta')
            ),
			array(
                "type" => "checkbox",
                "heading" => __('Show Rating', 'consulta'),
                "param_name" => "show_rating",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Template", 'consulta'),
                "description" => __('Show or hide rating of product.', 'consulta')
            ),
			array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __("Show Excerpt", 'consulta'),
				"param_name" => "show_excerpt",
				"value" => array (
					__ ( "Yes, please", 'consulta' ) => true
				),
				"group" => __("Template", 'consulta'),
				"description" => __("Show or not excerpt of post in this element.", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Excerpt Length", 'consulta'),
				"param_name" => "excerpt_lenght",
				"value" => "",
				"group" => __("Template", 'consulta'),
				"description" => __("Please, Enter number excerpt lenght of post in this element. Default: 11", 'consulta')
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __("Excerpt More", 'consulta'),
				"param_name" => "excerpt_more",
				"value" => "",
				"group" => __("Template", 'consulta'),
				"description" => __("Please, Enter text excerpt more of post in this element. Default: . ", 'consulta')
			),
			array(
                "type" => "checkbox",
                "heading" => __('Show Add To Cart', 'consulta'),
                "param_name" => "show_add_to_cart",
                "value" => array(
                    __("Yes, please", 'consulta') => 1
                ),
				"group" => __("Template", 'consulta'),
                "description" => __('Show or hide add to cart of product.', 'consulta')
            ),
			
        )
    ));
}
