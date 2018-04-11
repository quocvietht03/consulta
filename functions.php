<?php
/* Define THEME */
if (!defined('consulta_URI_PATH')) define('consulta_URI_PATH', get_template_directory_uri());
if (!defined('consulta_ABS_PATH')) define('consulta_ABS_PATH', get_template_directory());
if (!defined('consulta_URI_PATH_FR')) define('consulta_URI_PATH_FR', consulta_URI_PATH.'/framework');
if (!defined('consulta_ABS_PATH_FR')) define('consulta_ABS_PATH_FR', consulta_ABS_PATH.'/framework');
if (!defined('consulta_URI_PATH_ADMIN')) define('consulta_URI_PATH_ADMIN', consulta_URI_PATH_FR.'/admin');
if (!defined('consulta_ABS_PATH_ADMIN')) define('consulta_ABS_PATH_ADMIN', consulta_ABS_PATH_FR.'/admin');
/* Theme Options */
function tb_theme_options() {
    $theme_options = 'consulta_options';
	return $theme_options;
}
add_filter( 'bcore_theme_options_filter', 'tb_theme_options' );

if( function_exists( 'bcore_redux_setup' ) ) {
	bcore_redux_setup( consulta_ABS_PATH_ADMIN.'/options.php' );
}

function consulta_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'consulta_removeDemoModeLink');

require_once (consulta_ABS_PATH_ADMIN.'/index.php');

/* Template Functions */
require_once consulta_ABS_PATH_FR . '/template-functions.php';

/* Template Functions */
require_once consulta_ABS_PATH_FR . '/templates/post-favorite.php';
require_once consulta_ABS_PATH_FR . '/templates/post-functions.php';

/* Function for Framework */
require_once consulta_ABS_PATH_FR . '/includes.php';

/* Register Sidebar */
if (!function_exists('consulta_RegisterSidebar')) {
	function consulta_RegisterSidebar(){
		register_sidebar(array(
			'name' => __('Main Sidebar', 'consulta'),
			'id' => 'consulta-main-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Blog Left Sidebar', 'consulta'),
			'id' => 'consulta-left-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Blog Right Sidebar', 'consulta'),
			'id' => 'consulta-right-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(2, array(
			'name' => __('Header Top Widget %d', 'consulta'),
			'id' => 'consulta-header-top-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V1 Left', 'consulta'),
			'id' => 'consulta-header-top-v1-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V3 Left', 'consulta'),
			'id' => 'consulta-header-top-v3-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V3 Right', 'consulta'),
			'id' => 'consulta-header-top-v3-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V4 Left', 'consulta'),
			'id' => 'consulta-header-top-v4-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V4 Right', 'consulta'),
			'id' => 'consulta-header-top-v4-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top V5 Right', 'consulta'),
			'id' => 'consulta-header-top-v5-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top v6 Left', 'consulta'),
			'id' => 'consulta-header-top-v6-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top v6 Right', 'consulta'),
			'id' => 'consulta-header-top-v6-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(4, array(
			'name' => __('Menu Sidebar Header V%d', 'consulta'),
			'id' => 'consulta-menu-right-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top Request Right', 'consulta'),
			'id' => 'consulta-header-top-request-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Header Top Social Right', 'consulta'),
			'id' => 'consulta-header-top-sosial-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Newsletter Sidebar', 'consulta'),
			'id' => 'consulta-newsletter-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(4, array(
			'name' => __('Custom Sidebar %d', 'consulta'),
			'id' => 'consulta-custom-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(4, array(
			'name' => __('Footer Top Widget %d', 'consulta'),
			'id' => 'consulta-footer-top-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebars(2, array(
			'name' => __('Footer Bottom Widget %d', 'consulta'),
			'id' => 'consulta-footer-bottom-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '<div style="clear:both;"></div></div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer 2 Top Widget', 'consulta'),
			'id' => 'consulta-footer2-top-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		register_sidebar(array(
			'name' => __('Footer 2 Bottom Widget', 'consulta'),
			'id' => 'consulta-footer2-bottom-widget',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="wg-title">',
			'after_title' => '</h4>',
		));
		if (class_exists ( 'Woocommerce' )) {
			register_sidebar(array(
				'name' => __('Shop Right Sidebar', 'consulta'),
				'id' => 'consulta-shop-right-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
			register_sidebar(array(
				'name' => __('Shop Single Right Sidebar', 'consulta'),
				'id' => 'consulta-shop-single-right-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="wg-title">',
				'after_title' => '</h4>',
			));
		}
	}
}
add_action( 'widgets_init', 'consulta_RegisterSidebar' );

/* Register Default Fonts */
function consulta_fonts_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'consulta' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Montserrat|Lato:400,400Italic,600,700,700Italic,800,900&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/* Enqueue Script */
function consulta_enqueue_scripts() {
	global $consulta_options;
	
	wp_enqueue_style( 'consulta-fonts', consulta_fonts_url(), false );
	wp_enqueue_style( 'bootstrap-min', consulta_URI_PATH.'/assets/css/bootstrap.min.css', false );
	wp_enqueue_style('owl-carousel', consulta_URI_PATH . "/assets/vendors/owl-carousel/owl.carousel.css",array(),"");
	wp_enqueue_style('slick', consulta_URI_PATH . "/assets/vendors/slick/slick.css",array(),"");
	wp_enqueue_style('font-awesome-min', consulta_URI_PATH.'/assets/css/font-awesome.min.css', array(), '4.1.0');
	wp_enqueue_style('pe-icon-7-stroke', consulta_URI_PATH.'/assets/css/pe-icon-7-stroke.css', array(), '1.0');
	wp_enqueue_style('pe-icon-7-helper', consulta_URI_PATH.'/assets/css/pe-icon-7-helper.css', array(), '1.0');
	wp_enqueue_style( 'hover-min', consulta_URI_PATH.'/assets/css/hover-min.css', array(), '2.0.1' );
	wp_enqueue_style( 'consulta-core-min', consulta_URI_PATH.'/assets/css/core.min.css', false );
	wp_enqueue_style( 'consulta-style', consulta_URI_PATH.'/style.css', false );
	
	wp_enqueue_script( 'bootstrap-min', consulta_URI_PATH.'/assets/js/bootstrap.min.js', array('jquery'), '', true  );
	wp_enqueue_script( 'dynamics-min', consulta_URI_PATH.'/assets/js/dynamics.min.js', array('jquery'), '', true  );
	wp_enqueue_script( 'datepicker-min', consulta_URI_PATH.'/assets/js/datepicker.min.js', array('jquery'), '', true  );
	wp_enqueue_script( 'owl-carousel-min', consulta_URI_PATH.'/assets/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '', true  );
	wp_enqueue_script( 'slick-min', consulta_URI_PATH.'/assets/vendors/slick/slick.min.js', array('jquery'), '', true  );
	wp_enqueue_script( 'html5lightbox', consulta_URI_PATH.'/assets/vendors/html5lightbox/html5lightbox.js', array('jquery'), '', true  );
	wp_enqueue_script( 'consulta-main', consulta_URI_PATH.'/assets/js/main.js', array('jquery'), '', true  );
	
	if(isset($consulta_options["smooth_scroll"])&&$consulta_options["smooth_scroll"]) {
		wp_enqueue_script( 'smoothScroll', consulta_URI_PATH.'/assets/js/SmoothScroll.js', array('jquery'), '', true  );
	}
	
	$preset_color = (isset($consulta_options['preset_color'])&&$consulta_options['preset_color'])?$consulta_options['preset_color']: 'default';
	wp_enqueue_style( 'consulta-preset', consulta_URI_PATH.'/assets/css/presets/'.$preset_color.'.css', false );
	if(isset($consulta_options["style_selector"])&&$consulta_options["style_selector"]) {
		wp_enqueue_style( 'consulta-box-style', consulta_URI_PATH.'/assets/css/box-style.css', false );
		wp_enqueue_script( 'consulta-box-style', consulta_URI_PATH.'/assets/js/box-style.js', array('jquery'), '', true  );
	}
}
add_action( 'wp_enqueue_scripts', 'consulta_enqueue_scripts' );

/* Init Functions */
function consulta_init() {
	global $consulta_options;
	/* Less */
	if(isset($consulta_options['less_design']) && $consulta_options['less_design']){
		require_once consulta_ABS_PATH_FR.'/presets.php';
	}
}
add_action( 'init', 'consulta_init' );

/* Widgets */
require_once consulta_ABS_PATH_FR.'/widgets/abstract-widget.php';
require_once consulta_ABS_PATH_FR.'/widgets/widgets.php';

/* Bears Params */
require_once consulta_ABS_PATH.'/bears-shortcode-templates/bears_params.php';

/* Woo commerce function */
if (class_exists('Woocommerce')) {
    require_once consulta_ABS_PATH . '/woocommerce/wc-template-function.php';
    require_once consulta_ABS_PATH . '/woocommerce/wc-template-hooks.php';
}

/* Bears Masonry */
function consulta_ShortcodeMasonryLayoutFilter($data) {
	array_push( $data, array(
		'value' => 'consulta_style1',
		'text' => __( 'Consulta Style 1', 'consulta' ),
		), array(
		'value' => 'consulta_style2',
		'text' => __( 'Consulta Style 2', 'consulta' ),
		), array(
		'value' => 'consulta_style3',
		'text' => __( 'Consulta Style 3', 'consulta' ),
		), array(
		'value' => 'consulta_style4',
		'text' => __( 'Consulta Style 4', 'consulta' ),
		), array(
		'value' => 'consulta_woo_style1',
		'text' => __( 'Consulta Woocommerce Style 1', 'consulta' ),
		), array(
		'value' => 'consulta_woo_style2',
		'text' => __( 'Consulta Woocommerce Style 2', 'consulta' ),
		) );
	return $data;
}
add_filter( 'tbbs_ShortcodeMasonryLayoutFilter', 'consulta_ShortcodeMasonryLayoutFilter', 10, 1 );

function consulta_style1_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-style1' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_style1', 'consulta_style1_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_style2_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-style2' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_style2', 'consulta_style2_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_style3_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-style3' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_style3', 'consulta_style3_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_style4_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-style4' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_style4', 'consulta_style4_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_woo_style1_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-woo-style1' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_woo_style1', 'consulta_woo_style1_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_woo_style2_ShortcodeMasonryFilterHeaderLayout_default( $output, $atts, $filterDatas )
{
	$output .= sprintf( '<li class="tbbs-filter-item tbbs-filter-current">
		<a href="#" data-titlefilter=".all">
			<span>%s</span>
		</a>
	</li>', __( 'All', 'consulta' ) );
	if( count( $filterDatas ) > 0 ) :
		foreach( $filterDatas as $filterKey => $filterItem ) :
			$output .= sprintf( '<li class="tbbs-filter-item">
					<a href="#" data-titlefilter=\'.%s\'>
						<span>%s</span>
						<sup>%s</sup>
					</a>
				</li>', $filterKey, $filterItem['name'], $filterItem['count'] );
		endforeach;
	endif;
	return "
		<ul class='tbbs-filter-wrap consulta-woo-style2' style='margin: 0 {$atts['padding']}px 20px;'>
			{$output}
		</ul>";
}
add_filter( 'tbbs_ShortcodeMasonryFilter_creative_consulta_woo_style2', 'consulta_woo_style2_ShortcodeMasonryFilterHeaderLayout_default', 10, 3 );

function consulta_ShortcodeMasonryLayoutItem($data) {
	array_push( $data, array(
		'value' => 'consulta_style1',
		'text' => __( 'Consulta Style 1', 'consulta' ),
		), array(
		'value' => 'consulta_style2',
		'text' => __( 'Consulta Style 2', 'consulta' ),
		), array(
		'value' => 'consulta_style3',
		'text' => __( 'Consulta Style 3', 'consulta' ),
		), array(
		'value' => 'consulta_style4',
		'text' => __( 'Consulta Style 4', 'consulta' ),
		), array(
		'value' => 'consulta_woo_style1',
		'text' => __( 'Consulta Woocommerce Style 1', 'consulta' ),
		), array(
		'value' => 'consulta_woo_style2',
		'text' => __( 'Consulta Woocommerce Style 2', 'consulta' ),
		) );
	return $data;
}
add_filter( 'tbbs_ShortcodeMasonryLayoutItem', 'consulta_ShortcodeMasonryLayoutItem', 10, 1 );

function consulta_style1_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );

	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );

	$output .= "
	<div class='tbbs-grid-item grid-item consulta_style1 ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>

		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
		</div>

		<div class='item-info'>
			<div class='info-inner'>
				<!--div class='taxonomy'>{$cats}</div-->
				<div class='handle'>
					<a class='lightbox' href='{$thumbnail}' data-imagelightbox-thumbnail title='". __( 'view thumbnail', 'consulta' ) ."'><i class='fa fa-search'></i></a>
					<a class='readmore' href='{$link}' title='". __( 'detail', 'consulta' ) ."'><i class='fa fa-link'></i></a>
				</div>
				<a href='{$link}'><h2 class='title'>{$title}</h2></a>
			</div>
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_style1', 'consulta_style1_ShortcodeMasonryItemLayout', 10, 3 );

function consulta_style2_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );
	
	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );
	$video_url = get_post_meta(get_the_ID(),'consulta_portfolio_video_url',true);
	if($video_url == '') $video_url = '#';
	
	$output .= "
	<div class='tbbs-grid-item grid-item consulta_style2 ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>

		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
		</div>

		<div class='item-info'>
			<div class='info-inner'>
				<a href='{$link}'><h2 class='title'>{$title}</h2></a>
				<div class='taxonomy'>{$cats}</div>
				<div class='handle'>
					<a class='lightbox' href='{$thumbnail}' data-imagelightbox-thumbnail title='". __( 'view thumbnail', 'consulta' ) ."'><i class='fa fa-search'></i></a>
					<a class='video html5lightbox' href='{$video_url}' title='{$title}'><i class='fa fa-play'></i></a>
					<a class='readmore' href='{$link}' title='". __( 'detail', 'consulta' ) ."'><i class='fa fa-link'></i></a>
				</div>
			</div>
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_style2', 'consulta_style2_ShortcodeMasonryItemLayout', 10, 3 );

function consulta_style3_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );
	
	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );
	$video_url = get_post_meta(get_the_ID(),'consulta_portfolio_video_url',true);
	if($video_url == '') $video_url = '#';
	
	$output .= "
	<div class='tbbs-grid-item grid-item consulta_style3 ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>

		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
		</div>

		<div class='item-info'>
			<div class='info-inner'>
				<a href='{$link}'><h2 class='title'>{$title}</h2></a>
				<div class='taxonomy'>{$cats}</div>
				<div class='handle'>
					<a class='lightbox' href='{$thumbnail}' data-imagelightbox-thumbnail title='". __( 'view thumbnail', 'consulta' ) ."'><i class='fa fa-search'></i></a>
					<a class='video html5lightbox' href='{$video_url}' title='{$title}'><i class='fa fa-play'></i></a>
					<a class='readmore' href='{$link}' title='". __( 'detail', 'consulta' ) ."'><i class='fa fa-link'></i></a>
				</div>
			</div>
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_style3', 'consulta_style3_ShortcodeMasonryItemLayout', 10, 3 );

function consulta_style4_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );
	
	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );
	$video_url = get_post_meta(get_the_ID(),'consulta_portfolio_video_url',true);
	if($video_url == '') $video_url = '#';
	
	$output .= "
	<div class='tbbs-grid-item grid-item consulta_style4 ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>

		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
		</div>

		<div class='item-info'>
			<div class='info-inner'>
				<a href='{$link}'><h2 class='title'>{$title}</h2></a>
				<div class='taxonomy'>{$cats}</div>
				<div class='handle'>
					<a class='video html5lightbox' href='{$video_url}' title='{$title}'><i class='fa fa-play'></i></a>
					<a class='lightbox' href='{$thumbnail}' data-imagelightbox-thumbnail title='". __( 'view thumbnail', 'consulta' ) ."'><i class='fa fa-search'></i></a>
				</div>
			</div>
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_style4', 'consulta_style4_ShortcodeMasonryItemLayout', 10, 3 );

function consulta_woo_style1_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );
	
	global $product;
	
	/* set on sale html */
	$sale = '';
	if ( $product->is_on_sale() ) {
		$sale = '<span class="onsale">' . __( 'Sale!', 'consulta' ) . '</span>';
	}
	
	/* set add to cart html */
	$class = implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->product_type,
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
			) ) );
	$add_to_cart = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( isset( $quantity ) ? $quantity : 1 ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						esc_attr( isset( $class ) ? $class : 'button' ),
						esc_html( $product->add_to_cart_text() )
					);
	
	/* set quickview html */
	$quickview = do_shortcode('[bears_quickview layout="woocommerce" pid="'.get_the_ID().'" icon="fa fa-search-plus" extra_class="bt-quickview"]');
	
	/* set wishlist html */
	$wishlist = do_shortcode('[bears_woofavorite_icon pid="'.get_the_ID().'" class="bt-wishlist"]');
	
	/* set price html */
	$price_html = $product->get_price_html();
	
	/* set rating html */
	$rating_html = '';
	if ( $product->get_rating_html() ) $rating_html = $product->get_rating_html();

	/* set categories html */
	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );

	$output .= "
	<div class='tbbs-grid-item grid-item consulta-woo-style1 woocommerce ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>

		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'>
			{$sale}
			<div class='item-actions'>
				{$add_to_cart}
				{$quickview}
				{$wishlist}
			</div>
		</div>

		<div class='item-content'>
			<h4 class='title'><a href='{$link}'>{$title}</a></h4>
			<div class='price'>{$price_html}</div>
			{$rating_html}
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_woo_style1', 'consulta_woo_style1_ShortcodeMasonryItemLayout', 10, 3 );

function consulta_woo_style2_ShortcodeMasonryItemLayout( $output, $atts, $data ){
	extract( $data );
	
	global $product; 
	
	/* set on sale html */
	$sale = '';
	if ( $product->is_on_sale() ) {
		$sale = '<span class="onsale">' . __( 'Sale!', 'consulta' ) . '</span>';
	}
	
	/* set price html */
	$price_html = $product->get_price_html();
	
	/* set btn add to cart */
	$class = implode( ' ', array_filter( array(
					'button',
					'product_type_' . $product->product_type,
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : ''
			) ) );
	$add_to_cart = sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( isset( $quantity ) ? $quantity : 1 ),
						esc_attr( $product->id ),
						esc_attr( $product->get_sku() ),
						esc_attr( isset( $class ) ? $class : 'button' ),
						'<i class="fa fa-shopping-cart"></i>'
					);
	
	/* set quickview html */
	$quickview = do_shortcode('[bears_quickview layout="woocommerce" pid="'.get_the_ID().'" icon="fa fa-search-plus" extra_class="bt-quickview"]');
	
	/* set categories html */
	$taxonomy_name = empty( $atts['template_params']['filter_by_taxonomy'] ) ? 'category' : $atts['template_params']['filter_by_taxonomy'];
	$cats = get_the_term_list( get_the_ID(), $taxonomy_name, '', ' / ' );
	
	$output .= "
	<div class='tbbs-grid-item grid-item consulta-woo-style2 ". implode( ' ', $cat_filter ) ."' data-offset-height='1' data-size='' data-filter='". implode( ',',$cat_filter ) ."'>
		{$sale}
		<div class='item-thumbnail'
		style='background: url({$thumbnail}) no-repeat center center / cover, #333;'> </div>
		
		<div class='bt-content'>
			<ul class='bt-action'>
				<li>{$quickview}</li>
				<li>{$add_to_cart}</li>
			</ul>
			<h4 class='bt-title'><a href='{$link}'>{$title}</a></h4>
			<div class='bt-categories'>{$cats}</div>
			<div class='bt-price'><span>{$price_html}</span></div>
		</div>

	</div>";

	return $output;
}
add_filter( 'tbbs_ShortcodeMasonryItem_creative_consulta_woo_style2', 'consulta_woo_style2_ShortcodeMasonryItemLayout', 10, 3 );
