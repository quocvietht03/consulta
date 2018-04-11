<?php
function consulta_countdown_func($params, $content = null) {
    extract(shortcode_atts(array(
		'style' => 'style1',
        'date_end' => '2016/12/1 15:40:06',
		'format' => 'ODHMS',
		'labels' => 'Years,Months,Weeks,Days,Hours,Minutes,Seconds',
		'labels1' => 'Year,Month,Week,Day,Hour,Minute,Second',
		'el_class' => '',
    ), $params));
	wp_enqueue_script('jquery.plugin.min', consulta_URI_PATH . '/assets/vendors/countdown/jquery.plugin.min.js');
	wp_enqueue_script('jquery.countdown.min', consulta_URI_PATH . '/assets/vendors/countdown/jquery.countdown.min.js');
	
	$current_date = current_time('Y/m/d H:i:s');
	$count_date = strtotime($date_end) - strtotime($current_date);
	
	$years = 0;
	if($format == 'YODHMS') {
		$years = floor($count_date/(12*30*24*3600));
		$count_date = $count_date%(12*30*24*3600);
	}
	
	$months = 0;
	if($format == 'ODHMS') {
		$months = floor($count_date/(30*24*3600));
		$count_date = $count_date%(30*24*3600);
	}
	
	$days = floor($count_date/(24*3600));
	$count_date = $count_date%(24*3600);
	
	$hours = floor($count_date/(3600));
	$count_date = $count_date%(3600);
	
	$minutes = floor($count_date/(60));
	$seconds = $count_date%(60);
	
	$until = '+'.$years.'y +'.$months.'o +'.$days.'d +'.$hours.'h +'.$minutes.'m +'.$seconds.'s';
	
	$class = array();
	$class[] = 'bt-countdown-clock';
	$class[] = $style;
	$class[] = $el_class;
	
    ob_start();
    ?>
	<div data-countdown="<?php echo esc_attr($until); ?>" data-format="<?php echo esc_attr($format); ?>" data-labels="<?php echo esc_attr($labels); ?>" data-labels1="<?php echo esc_attr($labels1); ?>" class="<?php echo esc_attr(implode(' ', $class)); ?>"></div>
    <?php
    return ob_get_clean();
}

if(function_exists('bcore_shortcode')) { bcore_shortcode('countdown', 'consulta_countdown_func'); }
?>