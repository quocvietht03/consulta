<?php
/* consulta_BearsBlockIconImageParams */
if ( ! function_exists( 'consulta_BearsBlockIconImageParams' ) ) {
	function consulta_BearsBlockIconImageParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'style1',
				'options' => array(
					array(
						'value' => 'style1',
						'text' => 'Style 1',
					),
					array(
						'value' => 'style2 ',
						'text' => 'Style 2',
					),
				)
			),
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'image_icon',
				'title' => __( 'Image Icon', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'image_thumb',
				'title' => __( 'Image Thumb', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '200',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'value' => '',
			),
			array(
				'name' => 'order_number',
				'title' => __( 'Order Number', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'extra_link',
				'title' => __( 'Extra Link', 'consulta' ),
				'type' => 'text',
				'value' => '#',
			),
		);
	}
}

/* consulta_BearsBlockServiceBoxParams */
if ( ! function_exists( 'consulta_BearsBlockServiceBoxParams' ) ) {
	function consulta_BearsBlockServiceBoxParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'style1',
				'options' => array(
					array(
						'value' => 'style1',
						'text' => 'Style 1',
					),
					array(
						'value' => 'style2',
						'text' => 'Style 2',
					),
					array(
						'value' => 'style3',
						'text' => 'Style 3',
					),
				)
			),
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'image_icon',
				'title' => __( 'Image Icon', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'value' => '',
			),
			array(
				'name' => 'order_number',
				'title' => __( 'Order Number', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'extra_link',
				'title' => __( 'Extra Link', 'consulta' ),
				'type' => 'text',
				'value' => '#',
			),
		);
	}
}

/* consulta_BearsBlockServiceBox2Params */
if ( ! function_exists( 'consulta_BearsBlockServiceBox2Params' ) ) {
	function consulta_BearsBlockServiceBox2Params() {
		return array(
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'value' => '',
			),
			array(
				'name' => 'link',
				'title' => __( 'Read More Link', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => 'READ MORE', 'url' => '#' ),
			),
		);
	}
}

/* consulta_BearsBlockContactInfoParams */
if ( ! function_exists( 'consulta_BearsBlockContactInfoParams' ) ) {
	function consulta_BearsBlockContactInfoParams() {
		return array(
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'value' => '',
			),
			array(
				'name' => 'extra_link',
				'title' => __( 'Extra Link', 'consulta' ),
				'type' => 'text',
				'value' => '#',
			),
		);
	}
}

/* consulta_BearsBlockStepBoxParams */
if ( ! function_exists( 'consulta_BearsBlockStepBoxParams' ) ) {
	function consulta_BearsBlockStepBoxParams() {
		return array(
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'image_icon',
				'title' => __( 'Image Icon', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'order_number',
				'title' => __( 'Order Number', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'extra_link',
				'title' => __( 'Extra Link', 'consulta' ),
				'type' => 'text',
				'value' => '#',
			),
		);
	}
}

/* consulta_BearsBlockCounterUpParams */
if ( ! function_exists( 'consulta_BearsBlockCounterUpParams' ) ) {
	function consulta_BearsBlockCounterUpParams() {
		return array(
			array(
				'name' => 'number',
				'title' => __( 'Number', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
			array(
				'name' => 'title',
				'title' => __( 'Title', 'consulta' ),
				'type' => 'text',
				'value' => '',
			),
		);
	}
}

/* consulta_BearsButtonMainParams */
if ( ! function_exists( 'consulta_BearsButtonMainParams' ) ) {
	function consulta_BearsButtonMainParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'square',
				'options' => array(
					array(
						'value' => 'square',
						'text' => 'Square',
					),
					array(
						'value' => 'rounded',
						'text' => 'Rounded',
					),
					array(
						'value' => 'round',
						'text' => 'Round',
					),
				)
			),
			array(
				'name' => 'size',
				'title' => __( 'Size', 'consulta' ),
				'type' => 'select',
				'value' => 'medium',
				'options' => array(
					array(
						'value' => 'small',
						'text' => 'Small',
					),
					array(
						'value' => 'medium',
						'text' => 'Medium',
					),
					array(
						'value' => 'large',
						'text' => 'Large',
					),
				)
			),
			array(
				'name' => 'link',
				'title' => __( 'Link', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => '', 'url' => '' ),
			),
		);
	}
}

/* consulta_BearsButtonOutlineParams */
if ( ! function_exists( 'consulta_BearsButtonOutlineParams' ) ) {
	function consulta_BearsButtonOutlineParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'square',
				'options' => array(
					array(
						'value' => 'square',
						'text' => 'Square',
					),
					array(
						'value' => 'rounded',
						'text' => 'Rounded',
					),
					array(
						'value' => 'round',
						'text' => 'Round',
					),
				)
			),
			array(
				'name' => 'size',
				'title' => __( 'Size', 'consulta' ),
				'type' => 'select',
				'value' => 'medium',
				'options' => array(
					array(
						'value' => 'small',
						'text' => 'Small',
					),
					array(
						'value' => 'medium',
						'text' => 'Medium',
					),
					array(
						'value' => 'large',
						'text' => 'Large',
					),
				)
			),
			array(
				'name' => 'link',
				'title' => __( 'Link', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => '', 'url' => '' ),
			),
		);
	}
}

/* consulta_BearsButtonPopupVideoParams */
if ( ! function_exists( 'consulta_BearsButtonPopupVideoParams' ) ) {
	function consulta_BearsButtonPopupVideoParams() {
		return array(
			array(
				'name' => 'icon_font_class',
				'title' => __( 'Icon Font Class', 'consulta' ),
				'type' => 'text',
				'value' => '',
				'description' => 'Lib FontIcon: <a href="https://fortawesome.github.io/Font-Awesome/" target="_blank">Font-Awesome</a>, <a href="http://ionicons.com/" target="_blank">ionicons</a>, ...',
			),
			array(
				'name' => 'link_video',
				'title' => __( 'Link Video', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => '', 'url' => '' ),
			),
		);
	}
}

/* consulta_BearsPricingTableMainParams */
if ( ! function_exists( 'consulta_BearsPricingTableMainParams' ) ) {
	function consulta_BearsPricingTableMainParams() {
		return array(
			array(
				'name' => 'image_thumb',
				'title' => __( 'Image Thumb', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'name',
				'title' => __( 'Name', 'consulta' ),
				'type' => 'text',
				'value' => 'Basic Plan',
			),
			array(
				'name' => 'price',
				'title' => __( 'Price', 'consulta' ),
				'type' => 'price',
				'value' => array( 'symbols' => '$', 'price' => 70, 'position_symbols' => 'left' ),
			),
			array(
				'name' => 'unit',
				'title' => __( 'Unit', 'consulta' ),
				'type' => 'text',
				'value' => 'Monthly',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'rows' => 5,
				'value' => '<ul>&#10;<li>Line 1</li>&#10;<li>Line 2</li>&#10;<li>Line 3</li>&#10;</ul>',
			),
			array(
				'name' => 'button',
				'title' => __( 'Button', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => __( 'Get Started Now', 'consulta' ), 'url' => '#' ),
			),
			array(
				'name' => 'status',
				'title' => __( 'Status', 'consulta' ),
				'type' => 'select',
				'value' => 'normal',
				'options' => array(
					array(
						'value' => 'normal',
						'text'	=> __( 'Normal', 'consulta' ),
					),
					array(
						'value' => 'active',
						'text'	=> __( 'Active', 'consulta' ),
					),
				)
			),
		);
	}
}

/* consulta_BearsPricingTableStandardParams */
if ( ! function_exists( 'consulta_BearsPricingTableStandardParams' ) ) {
	function consulta_BearsPricingTableStandardParams() {
		return array(
			array(
				'name' => 'name',
				'title' => __( 'Name', 'consulta' ),
				'type' => 'text',
				'value' => 'Basic Plan',
			),
			array(
				'name' => 'price',
				'title' => __( 'Price', 'consulta' ),
				'type' => 'price',
				'value' => array( 'symbols' => '$', 'price' => 70, 'position_symbols' => 'left' ),
			),
			array(
				'name' => 'unit',
				'title' => __( 'Unit', 'consulta' ),
				'type' => 'text',
				'value' => 'Monthly',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'rows' => 5,
				'value' => '<ul>&#10;<li>Line 1</li>&#10;<li>Line 2</li>&#10;<li>Line 3</li>&#10;</ul>',
			),
			array(
				'name' => 'button',
				'title' => __( 'Button', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => __( 'Get Started Now', 'consulta' ), 'url' => '#' ),
			),
			array(
				'name' => 'status',
				'title' => __( 'Status', 'consulta' ),
				'type' => 'select',
				'value' => 'normal',
				'options' => array(
					array(
						'value' => 'normal',
						'text'	=> __( 'Normal', 'consulta' ),
					),
					array(
						'value' => 'active',
						'text'	=> __( 'Active', 'consulta' ),
					),
				)
			),
		);
	}
}

/* consulta_BearsPricingTableShortParams */
if ( ! function_exists( 'consulta_BearsPricingTableShortParams' ) ) {
	function consulta_BearsPricingTableShortParams() {
		return array(
			array(
				'name' => 'image_thumb',
				'title' => __( 'Image Thumb', 'consulta' ),
				'type' => 'media',
				'value' => '',
			),
			array(
				'name' => 'name',
				'title' => __( 'Name', 'consulta' ),
				'type' => 'text',
				'value' => 'Basic Plan',
			),
			array(
				'name' => 'price',
				'title' => __( 'Price', 'consulta' ),
				'type' => 'price',
				'value' => array( 'symbols' => '$', 'price' => 70, 'position_symbols' => 'left' ),
			),
			array(
				'name' => 'unit',
				'title' => __( 'Unit', 'consulta' ),
				'type' => 'text',
				'value' => 'Monthly',
			),
			array(
				'name' => 'content',
				'title' => __( 'Content', 'consulta' ),
				'type' => 'textarea',
				'rows' => 5,
				'value' => 'Mauris porta risus metus, vitae sollicitudin augue eleifend at. Nullam',
			),
			array(
				'name' => 'button',
				'title' => __( 'Button', 'consulta' ),
				'type' => 'link',
				'value' => array( 'text' => __( 'Get Started Now', 'consulta' ), 'url' => '#' ),
			),
			array(
				'name' => 'status',
				'title' => __( 'Status', 'consulta' ),
				'type' => 'select',
				'value' => 'normal',
				'options' => array(
					array(
						'value' => 'normal',
						'text'	=> __( 'Normal', 'consulta' ),
					),
					array(
						'value' => 'active',
						'text'	=> __( 'Active', 'consulta' ),
					),
				)
			),
		);
	}
}

/* consulta_BearsClientLogoCarouselParams */
if ( ! function_exists( 'consulta_BearsClientLogoCarouselParams' ) ) {
	function consulta_BearsClientLogoCarouselParams() {
		return array(
			array(
				'name' => 'images',
				'title' => __( 'Images', 'consulta' ),
				'type' => 'media',
				'value' => '',
				'multiple' => true,
				'data' => 'id',
			),
			array(
				'name' => 'images_link',
				'title' => __( 'Images Link', 'consulta' ),
				'type' => 'textarea',
				'value' => '',
				'description' => 'Enter links for each slide. Ex: link1,link2...',
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'full',
			),
		);
	}
}

/* consulta_BearsTeamCarouselParams */
if ( ! function_exists( 'consulta_BearsTeamCarouselParams' ) ) {
	function consulta_BearsTeamCarouselParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'style1',
				'options' => array(
					array(
						'value' => 'style1',
						'text' => 'Style 1',
					),
					array(
						'value' => 'style2',
						'text' => 'Style 2',
					),
					array(
						'value' => 'style3 ',
						'text' => 'Style 3',
					),
				)
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '300',
			),
		);
	}
}

/* consulta_BearsPortfolioCarouselParams */
/*if ( ! function_exists( 'consulta_BearsPortfolioCarouselParams' ) ) {
	function consulta_BearsPortfolioCarouselParams() {
		return array(
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '300',
			),
		);
	}
}*/

/* consulta_BearsTestimonialCarouselParams */
if ( ! function_exists( 'consulta_BearsTestimonialCarouselParams' ) ) {
	function consulta_BearsTestimonialCarouselParams() {
		return array(
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'style1',
				'options' => array(
					array(
						'value' => 'style1',
						'text' => 'Style 1',
					),
					array(
						'value' => 'style2',
						'text' => 'Style 2',
					),
				)
			),
		);
	}
}

/* consulta_BearsBlogCarouselParams */
if ( ! function_exists( 'consulta_BearsBlogCarouselParams' ) ) {
	function consulta_BearsBlogCarouselParams() {
		return array(
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '200',
			),
			array(
				'name' => 'excerpt_lenght',
				'title' => __( 'Excerpt Lenght', 'consulta' ),
				'type' => 'text',
				'value' => '14',
			),
			array(
				'name' => 'excerpt_more',
				'title' => __( 'Excerpt More', 'consulta' ),
				'type' => 'text',
				'value' => '.',
			),
		);
	}
}

/* consulta_BearsBlogZigZagParams */
if ( ! function_exists( 'consulta_BearsBlogZigZagParams' ) ) {
	function consulta_BearsBlogZigZagParams() {
		return array(
			array(
				'name' => 'show_pagination',
				'title' => __( 'Show Pagination', 'consulta' ),
				'type' => 'select',
				'value' => 'show',
				'options' => array(
					array(
						'value' => 'hide',
						'text' => 'Hide',
					),
					array(
						'value' => 'show',
						'text' => 'Show',
					),
				)
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '460',
			),
			array(
				'name' => 'excerpt_lenght',
				'title' => __( 'Excerpt Lenght', 'consulta' ),
				'type' => 'text',
				'value' => '32',
			),
			array(
				'name' => 'excerpt_more',
				'title' => __( 'Excerpt More', 'consulta' ),
				'type' => 'text',
				'value' => '.',
			),
			array(
				'name' => 'read_more_text',
				'title' => __( 'Read More Text', 'consulta' ),
				'type' => 'text',
				'value' => 'Read More',
			),
			
		);
	}
}

/* consulta_BearsBlogGridParams */
if ( ! function_exists( 'consulta_BearsBlogGridParams' ) ) {
	function consulta_BearsBlogGridParams() {
		return array(
			array(
				'name' => 'show_pagination',
				'title' => __( 'Show Pagination', 'consulta' ),
				'type' => 'select',
				'value' => 'show',
				'options' => array(
					array(
						'value' => 'hide',
						'text' => 'Hide',
					),
					array(
						'value' => 'show',
						'text' => 'Show',
					),
				)
			),
			array(
				'name' => 'columns',
				'title' => __( 'Columns', 'consulta' ),
				'type' => 'select',
				'value' => 'columns',
				'options' => array(
					array(
						'value' => '4',
						'text' => '4 Columns',
					),
					array(
						'value' => '3',
						'text' => '3 Columns',
					),
					array(
						'value' => '2',
						'text' => '2 Columns',
					),
					array(
						'value' => '1',
						'text' => '1 Column',
					),
				)
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '200',
			),
			array(
				'name' => 'excerpt_lenght',
				'title' => __( 'Excerpt Lenght', 'consulta' ),
				'type' => 'text',
				'value' => '14',
			),
			array(
				'name' => 'excerpt_more',
				'title' => __( 'Excerpt More', 'consulta' ),
				'type' => 'text',
				'value' => '.',
			),
		);
	}
}

/* consulta_BearsBlogListParams */
if ( ! function_exists( 'consulta_BearsBlogListParams' ) ) {
	function consulta_BearsBlogListParams() {
		return array(
			array(
				'name' => 'show_pagination',
				'title' => __( 'Show Pagination', 'consulta' ),
				'type' => 'select',
				'value' => 'show',
				'options' => array(
					array(
						'value' => 'hide',
						'text' => 'Hide',
					),
					array(
						'value' => 'show',
						'text' => 'Show',
					),
				)
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '250',
			),
			array(
				'name' => 'excerpt_lenght',
				'title' => __( 'Excerpt Lenght', 'consulta' ),
				'type' => 'text',
				'value' => '14',
			),
			array(
				'name' => 'excerpt_more',
				'title' => __( 'Excerpt More', 'consulta' ),
				'type' => 'text',
				'value' => '.',
			),
		);
	}
}

/* consulta_BearsBlogTestimonialParams */
if ( ! function_exists( 'consulta_BearsBlogTestimonialParams' ) ) {
	function consulta_BearsBlogTestimonialParams() {
		return array(
			array(
				'name' => 'show_pagination',
				'title' => __( 'Show Pagination', 'consulta' ),
				'type' => 'select',
				'value' => 'show',
				'options' => array(
					array(
						'value' => 'hide',
						'text' => 'Hide',
					),
					array(
						'value' => 'show',
						'text' => 'Show',
					),
				)
			),
			array(
				'name' => 'columns',
				'title' => __( 'Columns', 'consulta' ),
				'type' => 'select',
				'value' => 'columns',
				'options' => array(
					array(
						'value' => '4',
						'text' => '4 Columns',
					),
					array(
						'value' => '3',
						'text' => '3 Columns',
					),
					array(
						'value' => '2',
						'text' => '2 Columns',
					),
					array(
						'value' => '1',
						'text' => '1 Column',
					),
				)
			),
		);
	}
}

/* consulta_BearsBlogTeamParams */
if ( ! function_exists( 'consulta_BearsBlogTeamParams' ) ) {
	function consulta_BearsBlogTeamParams() {
		return array(
			array(
				'name' => 'show_pagination',
				'title' => __( 'Show Pagination', 'consulta' ),
				'type' => 'select',
				'value' => 'show',
				'options' => array(
					array(
						'value' => 'hide',
						'text' => 'Hide',
					),
					array(
						'value' => 'show',
						'text' => 'Show',
					),
				)
			),
			array(
				'name' => 'columns',
				'title' => __( 'Columns', 'consulta' ),
				'type' => 'select',
				'value' => 'columns',
				'options' => array(
					array(
						'value' => '4',
						'text' => '4 Columns',
					),
					array(
						'value' => '3',
						'text' => '3 Columns',
					),
					array(
						'value' => '2',
						'text' => '2 Columns',
					),
					array(
						'value' => '1',
						'text' => '1 Column',
					),
				)
			),
			array(
				'name' => 'style',
				'title' => __( 'Style', 'consulta' ),
				'type' => 'select',
				'value' => 'style1',
				'options' => array(
					array(
						'value' => 'style1',
						'text' => 'Style 1',
					),
					array(
						'value' => 'style2 ',
						'text' => 'Style 2',
					),
					array(
						'value' => 'style3 ',
						'text' => 'Style 3',
					),
				)
			),
			array(
				'name' => 'image_size',
				'title' => __( 'Image Size', 'consulta' ),
				'type' => 'imagesize',
				'value' => 'medium_large',
			),
			array(
				'name' => 'image_height',
				'title' => __( 'Image Height', 'consulta' ),
				'type' => 'text',
				'value' => '300',
			),
		);
	}
}
