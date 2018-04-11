<?php
function consulta_autoCompileLess($inputFile, $outputFile) {
    require_once( ABSPATH.'/wp-admin/includes/file.php' );	
	WP_Filesystem();
	require_once ( consulta_ABS_PATH_FR . '/inc/lessc.inc.php' );
	global $wp_filesystem, $consulta_options;
    $less = new lessc();
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
	/*Styling Options*/
	$preset_color = (isset($consulta_options['preset_color'])&&$consulta_options['preset_color'])?$consulta_options['preset_color']: 'default';
	$main_color = (isset($consulta_options['main_color'])&&$consulta_options['main_color'])?$consulta_options['main_color']: '#00abc9';
	
	switch ($preset_color) {
		case 'preset1':
			$main_color = (isset($consulta_options['main_color_preset1'])&&$consulta_options['main_color_preset1'])?$consulta_options['main_color_preset1']: '#e5ae49';
			break;
		case 'preset2':
			$main_color = (isset($consulta_options['main_color_preset2'])&&$consulta_options['main_color_preset2'])?$consulta_options['main_color_preset2']: '#e5ae49';
			break;
		case 'preset3':
			$main_color = (isset($consulta_options['main_color_preset3'])&&$consulta_options['main_color_preset3'])?$consulta_options['main_color_preset3']: '#e5ae49';
			break;
		case 'preset4':
			$main_color = (isset($consulta_options['main_color_preset4'])&&$consulta_options['main_color_preset4'])?$consulta_options['main_color_preset4']: '#e5ae49';
			break;
		case 'preset5':
			$main_color = (isset($consulta_options['main_color_preset5'])&&$consulta_options['main_color_preset5'])?$consulta_options['main_color_preset5']: '#e5ae49';
			break;
		default:
			$main_color = (isset($consulta_options['main_color'])&&$consulta_options['main_color'])?$consulta_options['main_color']: '#00abc9';
		break;
	}
	
    $variables = array(
		"main_color" => $main_color,
		
    );
    $less->setVariables($variables);
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
            $cache = unserialize($wp_filesystem->get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($inputFile);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            $wp_filesystem->put_contents($cacheFile, serialize($newCache));
            $wp_filesystem->put_contents($outputFile, $newCache['compiled']);
    }
}
function consulta_addLessStyle() {
	global $consulta_options;
	$preset_color = (isset($consulta_options['preset_color'])&&$consulta_options['preset_color'])?$consulta_options['preset_color']: 'default';
	
	try {
		$inputFile = consulta_ABS_PATH.'/assets/css/less/style.less';
		if($preset_color == 'default') {
			$outputFile = consulta_ABS_PATH.'/style.css';
		} else {
			$outputFile = consulta_ABS_PATH.'/assets/css/presets/'.$preset_color.'.css';
		}
		consulta_autoCompileLess($inputFile, $outputFile);
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
add_action('wp_enqueue_scripts', 'consulta_addLessStyle');
/* End less*/