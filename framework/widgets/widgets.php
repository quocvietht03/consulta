<?php
require_once get_template_directory().'/framework/widgets/socials.php';
require_once get_template_directory().'/framework/widgets/post_list.php';
require_once get_template_directory().'/framework/widgets/news_tabs.php';
require_once get_template_directory().'/framework/widgets/contact_slider.php';
require_once get_template_directory().'/framework/widgets/news_slider.php';
require_once get_template_directory().'/framework/widgets/recent_work.php';
require_once get_template_directory().'/framework/widgets/recent_review.php';
require_once get_template_directory().'/framework/widgets/icon_info.php';
if (class_exists('Woocommerce')) {
	require_once get_template_directory().'/framework/widgets/mini_cart.php';
	require_once get_template_directory().'/framework/widgets/woo_filter_attribute.php';
}