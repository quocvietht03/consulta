<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
	/* Add Stylesheet And Script Backend */
	function consulta_custom_admin_scripts(){
		wp_enqueue_script( 'action', consulta_URI_PATH_ADMIN.'/assets/js/action.js', array('jquery'), '', true  );
		wp_enqueue_style( 'style_admin', consulta_URI_PATH_ADMIN.'/assets/css/style_admin.css', false );
	}
	add_action( 'admin_enqueue_scripts', 'consulta_custom_admin_scripts');

    // This is your option name where all the Redux data is stored.
    $opt_name = "consulta_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'consulta' ),
        'page_title'           => __( 'Theme Options', 'consulta' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    /*$args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'consulta' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'consulta' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'consulta' ),
    );*/

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    /*$args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );*/

    // Panel Intro text -> before the form
    /*if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'consulta' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'consulta' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'consulta' );
	*/
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'consulta' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'consulta' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'consulta' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'consulta' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'consulta' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	
	// -> START General
	Redux::setSection( $opt_name, array(
		'title'  => __( 'General', 'consulta' ),
		'desc'   => __( '', 'consulta' ),
		'icon'   => 'el-icon-cogs',
		'fields' => array(
			array(
				'id'       => 'less_design',
				'type'     => 'switch',
				'title'    => __( 'Less Design', 'consulta' ),
				'subtitle' => __( 'Use the less design features.', 'consulta' ),
				'default'  => false,
			),
			array(
                'id'       => 'body_layout',
                'type'     => 'button_set',
                'title'    => __( 'Layout', 'consulta' ),
                'subtitle' => __( 'Body layout with wide or boxed.', 'consulta' ),
                'options'  => array(
                    'wide' => 'Wide',
                    'boxed' => 'Boxed'
                ),
                'default'  => 'wide'
            ),
			array(
				'id'       => 'body_background',
				'type'     => 'background',
				'title'    => __('Body Background', 'consulta'),
				'subtitle' => __('Body background with image, color, etc.', 'consulta'),
				'output'      => array('body'),
				'default'  => array(
					'background-color' => '#ffffff',
				)
			),
			array(
				'id'       => 'page_loader',
				'type'     => 'switch',
				'title'    => __( 'Page Loader', 'consulta' ),
				'subtitle' => __( 'Enable/Disable page loader.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'style_selector',
				'type'     => 'switch',
				'title'    => __( 'Style Selector', 'consulta' ),
				'subtitle' => __( 'Enable style selector.', 'consulta' ),
				'default'  => false,
			),
		)
	) );
	
	// -> START Color
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Color', 'consulta' ),
        'id'     => 'color',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-brush',
		'fields' => array(
			array(
				'id'       => 'preset_color',
				'type'     => 'select',
				'title'    => __('Preset Color', 'consulta'),
				'subtitle' => __('', 'consulta'),
				'options'  => array(
					'default' => 'Default',
					'preset1' => 'Preset 1',
					'preset2' => 'Preset 2',
					'preset3' => 'Preset 3',
					'preset4' => 'Preset 4',
					'preset5' => 'Preset 5'
				),
				'default'  => 'default',
			),
			array(
				'id'       => 'main_color',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #00abc9).', 'consulta'),
				'default'  => '#00abc9',
				'validate' => 'color',
				'output'   => array('.bt-main-color'),
				'required' => array('preset_color','=','default')
			),
			array(
				'id'       => 'main_color_preset1',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #0dbf9b).', 'consulta'),
				'default'  => '#0dbf9b',
				'validate' => 'color',
				'required' => array('preset_color','=','preset1')
			),
			array(
				'id'       => 'main_color_preset2',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #c3512f).', 'consulta'),
				'default'  => '#c3512f',
				'validate' => 'color',
				'required' => array('preset_color','=','preset2')
			),
			array(
				'id'       => 'main_color_preset3',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #c7af8d).', 'consulta'),
				'default'  => '#c7af8d',
				'validate' => 'color',
				'required' => array('preset_color','=','preset3')
			),
			array(
				'id'       => 'main_color_preset4',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffbf3b).', 'consulta'),
				'default'  => '#ffbf3b',
				'validate' => 'color',
				'required' => array('preset_color','=','preset4')
			),
			array(
				'id'       => 'main_color_preset5',
				'type'     => 'color',
				'title'    => __('Main Color', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #a5b800).', 'consulta'),
				'default'  => '#a5b800',
				'validate' => 'color',
				'required' => array('preset_color','=','preset5')
			),
		)
    ) );
	
	// -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'consulta' ),
        'id'     => 'typography',
        'desc'   => __( '', 'consulta' ),
		'icon'   => 'el el-font',
        'fields' => array(
            array(
				'id'          => 'body_font',
				'type'        => 'typography', 
				'title'       => __('Body Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#555555', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '15px', 
					'line-height' => '28px',
					'letter-spacing' => '0.48px'
				),
			),
			array(
				'id'          => 'h1_font',
				'type'        => 'typography', 
				'title'       => __('H1 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h1, .bt-font-size-1'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '42px', 
					'line-height' => '60px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'          => 'h2_font',
				'type'        => 'typography', 
				'title'       => __('H2 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h2, .bt-font-size-2'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '36px', 
					'line-height' => '42px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'          => 'consulta_h3_font',
				'type'        => 'typography', 
				'title'       => __('H3 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h3, .bt-font-size-3'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '24px', 
					'line-height' => '36px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'          => 'h4_font',
				'type'        => 'typography', 
				'title'       => __('H4 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h4, .bt-font-size-4'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '18px', 
					'line-height' => '24px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'          => 'h5_font',
				'type'        => 'typography', 
				'title'       => __('H5 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h5, .bt-font-size-5'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '16px', 
					'line-height' => '18px',
					'letter-spacing' => '0.64px'
				),
			),
			array(
				'id'          => 'h6_font',
				'type'        => 'typography', 
				'title'       => __('H6 Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('body h6, .bt-font-size-6'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#282828', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '16px',
					'letter-spacing' => '0.64px'
				),
			),
			
        )
    ) );
	
	// -> START Logo
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Logo', 'consulta' ),
        'id'     => 'logo',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-icon-viadeo',
		'fields' => array(
			array(
				'id'       => 'consulta_logo',
				'type'     => 'media',
				'url'      => true,
				'title'    => __('Logo', 'consulta'),
				'subtitle' => __('Select an image file for your logo.', 'consulta'),
				'default'  => array(
					'url'	=> consulta_URI_PATH.'/assets/images/logo-white.png'
				),
			),
			array(
				'id'       => 'consulta_logo_stick',
				'type'     => 'media',
				'url'      => true,
				'title'    => __('Logo Stick', 'consulta'),
				'subtitle' => __('Select an image file for your logo stick.', 'consulta'),
				'default'  => array(
					'url'	=> consulta_URI_PATH.'/assets/images/logo-dark.png'
				),
			),
			array(
				'id'       => 'logo_retina',
				'type'     => 'switch',
				'title'    => __( 'Logo Retina', 'consulta' ),
				'subtitle' => __( 'Enable/Disable logo retina.', 'consulta' ),
				'default'  => false,
			),
		)
    ) );
	
	// -> START Header
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'consulta' ),
        'id'     => 'header',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'consulta_header_layout',
				'type'     => 'image_select',
				'title'    => __('Header Layout', 'consulta'),
				'subtitle' => __('Select header layout in your site.', 'consulta'),
				'options'  => array(
					'header-v1'	=> array(
						'alt'   => 'Header V1',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v1.jpg'
					),
					'header-v2'	=> array(
						'alt'   => 'Header V2',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v2.jpg'
					),
					'header-v3'	=> array(
						'alt'   => 'Header V3',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v3.jpg'
					),
					'header-v4'	=> array(
						'alt'   => 'Header V4',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v4.jpg'
					),
					'header-v5'	=> array(
						'alt'   => 'Header V5',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v5.jpg'
					),
					'header-v6'	=> array(
						'alt'   => 'Header v6',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v6.jpg'
					),
					'header-v7'	=> array(
						'alt'   => 'Header v7',
						'img'   => consulta_URI_PATH.'/assets/images/headers/header-v7.jpg'
					),
				),
				'default' => 'header-v1'
			),
		)
    ) );
	
	// -> START Main Menu
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Main Menu', 'consulta' ),
        'id'     => 'main_menu',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-icon-list',
    ) );
	
	// -> START Main Menu Header V1
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header V1', 'consulta' ),
        'id'     => 'main_menu_v1',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v1',
				'type'     => 'switch',
				'title'    => __( 'Fixed', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v1',
				'type'     => 'switch',
				'title'    => __( 'Stick', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_1',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v1 .bt-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#ffffff', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '55px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v1 .bt-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '95px',
					'letter-spacing' => '1.28px'
				),
				'required' => array('stick_main_menu_v1','=', true),
			),
			array(
				'id'          => 'menu_sub_level',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			// array(
				// 'id'       => 'bg_main_menu_v1',
				// 'type'     => 'background',
				// 'title'    => __('Background', 'consulta'),
				// 'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'consulta'),
				// 'default'  => array(
					// 'background-color' => 'transparent',
				// ),
				// 'output'   => array('.bt-header-v1 .bt-header-menu'),
			// ),
			array(
				'id'       => 'bg_main_menu_sub_level_v1',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v1 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			/* array(
				'id'       => 'bg_stick_main_menu_v1',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v1.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v1','=', true),
			), */
		)
    ) );
	
	// -> START Main Menu Header V2
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header V2', 'consulta' ),
        'id'     => 'main_menu_v2',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v2',
				'type'     => 'switch',
				'title'    => __( 'Fixed', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => true,
			),
			array(
				'id'       => 'stick_main_menu_v2',
				'type'     => 'switch',
				'title'    => __( 'Stick', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'first_level_style_main_menu_v2',
				'type'     => 'select',
				'title'    => __('First Level Style', 'consulta'),
				'subtitle' => __('', 'consulta'),
				'options'  => array(
					'dot' => 'Dot',
					'line' => 'Line'
				),
				'default'  => 'dot',
			),
			array(
				'id'          => 'menu_first_level',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v2 .bt-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#ffffff', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '105px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v2 .bt-menu-list > ul > li > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '95px',
					'letter-spacing' => '1.28px'
				),
				'required' => array('stick_main_menu_v2','=', true),
			),
			array(
				'id'          => 'menu_sub_level',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v2',
				'type'     => 'background',
				'title'    => __('Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'consulta'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.bt-header-v2 .bt-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v2',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v2 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v2',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v2.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v2','=', true),
			),
		)
    ) );
	
	// -> START Main Menu Header V3
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header V3', 'consulta' ),
        'id'     => 'main_menu_v3',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v3',
				'type'     => 'switch',
				'title'    => __( 'Fixed Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v3',
				'type'     => 'switch',
				'title'    => __( 'Stick Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v3 .bt-menu-list > ul > li > a, .bt-header-v3 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-header-v3 .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333',
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v3',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v3 .bt-menu-list > ul > li > a, .bt-stick-active .bt-header-v3 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-stick-active .bt-header-v3 .bt-header-menu .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v3','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v3',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_top_header_menu_v3',
				'type'     => 'background',
				'title'    => __('Background Header Top', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #1f1f1f).', 'consulta'),
				'default'  => array(
					'background-color' => '#1f1f1f',
				),
				'output'   => array('.bt-header-v3 .bt-header-top'),
			),
			array(
				'id'       => 'bg_main_menu_v3',
				'type'     => 'background',
				'title'    => __('Background Menu', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: rgba(255,255,255,0.6)).', 'consulta'),
				'default'  => array(
					'background-color' => 'rgba(255,255,255,0.6)',
				),
				'output'   => array('.bt-header-v3 .bt-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v3',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v3 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v3',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v3.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v3','=', true),
			),
		)
    ) );
	// -> START Main Menu Header V4
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header V4', 'consulta' ),
        'id'     => 'main_menu_v4',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v4',
				'type'     => 'switch',
				'title'    => __( 'Fixed Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v4',
				'type'     => 'switch',
				'title'    => __( 'Stick Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v4 .bt-menu-list > ul > li > a, .bt-header-v4 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-header-v4 .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333',
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v4',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v4 .bt-menu-list > ul > li > a, .bt-stick-active .bt-header-v4 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-stick-active .bt-header-v4 .bt-header-menu .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v4','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v4',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_top_header_menu_v4',
				'type'     => 'background',
				'title'    => __('Background Header Top', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #1f1f1f).', 'consulta'),
				'default'  => array(
					'background-color' => '#1f1f1f',
				),
				'output'   => array('.bt-header-v4 .bt-header-top'),
			),
			array(
				'id'       => 'bg_main_menu_v4',
				'type'     => 'background',
				'title'    => __('Background Menu', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: rgba(255,255,255,0.6)).', 'consulta'),
				'default'  => array(
					'background-color' => 'rgba(255,255,255,0.6)',
				),
				'output'   => array('.bt-header-v4 .bt-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v4',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v4 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v4',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v4.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v4','=', true),
			),
		)
    ) );
	// -> START Main Menu Header V5
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header V5', 'consulta' ),
        'id'     => 'main_menu_v5',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v5',
				'type'     => 'switch',
				'title'    => __( 'Fixed Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v5',
				'type'     => 'switch',
				'title'    => __( 'Stick Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v5',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v5 .bt-menu-list > ul > li > a, .bt-header-v5 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-header-v5 .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#ffffff',
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v5',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v5 .bt-menu-list > ul > li > a, .bt-stick-active .bt-header-v5 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-stick-active .bt-header-v5 .bt-header-menu .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '100px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v5','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v5',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v5',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v5 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v5',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v5.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v5','=', true),
			),
		)
    ) );
	// -> START Main Menu Header v6
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header v6', 'consulta' ),
        'id'     => 'main_menu_v6',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v6',
				'type'     => 'switch',
				'title'    => __( 'Fixed Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v6',
				'type'     => 'switch',
				'title'    => __( 'Stick Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v6',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v6 .bt-menu-list > ul > li > a, .bt-header-v6 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-header-v6 .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#ffffff',
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '95px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v6',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v6 .bt-menu-list > ul > li > a, .bt-stick-active .bt-header-v6 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-stick-active .bt-header-v6 .bt-header-menu .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v6','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v6',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v6',
				'type'     => 'background',
				'title'    => __('Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: rgba(132,132,132,0.7)).', 'consulta'),
				'default'  => array(
					'background-color' => 'rgba(66,66,66,0.7)',
				),
				'output'   => array('.bt-header-v6 .bt-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v6',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v6 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v6',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v6.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v6','=', true),
			),
		)
    ) );
	
	// -> START Main Menu Header v7
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Menu Header v7', 'consulta' ),
        'id'     => 'main_menu_v7',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'fixed_main_menu_v7',
				'type'     => 'switch',
				'title'    => __( 'Fixed Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable fixed menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'       => 'stick_main_menu_v7',
				'type'     => 'switch',
				'title'    => __( 'Stick Menu', 'consulta' ),
				'subtitle' => __( 'Enable/Disable stick menu.', 'consulta' ),
				'default'  => false,
			),
			array(
				'id'          => 'menu_first_level_v7',
				'type'        => 'typography', 
				'title'       => __('First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-header-v7 .bt-menu-list > ul > li > a, .bt-header-v7 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-header-v7 .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#ffffff',
					'font-style'  => '700', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '95px',
					'letter-spacing' => '1.6px'
				),
			),
			array(
				'id'          => 'stick_menu_first_level_v7',
				'type'        => 'typography', 
				'title'       => __('Stick First Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      => array('.bt-stick-active .bt-header-v7 .bt-menu-list > ul > li > a, .bt-stick-active .bt-header-v7 .bt-header-menu .consulta_widget_mini_cart .bt-cart-header > a, .bt-stick-active .bt-header-v7 .bt-header-menu .bt-search-sidebar > a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#333333', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '71px',
					'letter-spacing' => '1.6px'
				),
				'required' => array('stick_main_menu_v7','=', true),
			),
			array(
				'id'          => 'menu_sub_level_v7',
				'type'        => 'typography', 
				'title'       => __('Sub Level Font Options', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > a, 
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul > li > a, 
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul > li > a, 
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns2 > li > ul > li > a, 
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns3 > li > ul > li > a, 
										.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.mega-menu-item > ul.columns4 > li > ul > li > a 
										'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#b5b5b5', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '13px', 
					'line-height' => '14px',
					'letter-spacing' => '0.96px'
				),
			),
			array(
				'id'       => 'bg_main_menu_v7',
				'type'     => 'background',
				'title'    => __('Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: transparent).', 'consulta'),
				'default'  => array(
					'background-color' => 'transparent',
				),
				'output'   => array('.bt-header-v7 .bt-header-menu'),
			),
			array(
				'id'       => 'bg_main_menu_sub_level_v7',
				'type'     => 'background',
				'title'    => __('Background Sub Level', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #252525).', 'consulta'),
				'default'  => array(
					'background-color' => '#252525',
				),
				'output'   => array('
									.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul,
									.bt-header-v7 .bt-menu-list > ul > li.menu-item-has-children.nomega-menu-item > ul > li > ul
									'),
			),
			array(
				'id'       => 'bg_stick_main_menu_v7',
				'type'     => 'background',
				'title'    => __('Stick Background', 'consulta'),
				'subtitle' => __('Controls several items, ex: link hovers, highlights, and more. (default: #ffffff).', 'consulta'),
				'default'  => array(
					'background-color' => '#ffffff',
				),
				'output'   => array('.bt-stick-active .bt-header-v7.bt-header-stick .bt-header-menu'),
				'required' => array('stick_main_menu_v7','=', true),
			),
		)
    ) );
	
	// -> START Footer
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'consulta' ),
        'id'     => 'footer',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array( 
				'id'       => 'consulta_footer_layout',
				'type'     => 'image_select',
				'title'    => __('Footer Layout', 'consulta'),
				'subtitle' => __('Select footer layout in your site.', 'consulta'),
				'options'  => array(
					'footer-v1'	=> array(
						'alt'   => 'Footer V1',
						'img'   => consulta_URI_PATH.'/assets/images/footers/footer_v1.jpg'
					),
					'footer-v2'	=> array(
						'alt'   => 'Footer V2',
						'img'   => consulta_URI_PATH.'/assets/images/footers/footer_v2.jpg'
					),
				),
				'default' => 'footer-v1'
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer V1', 'consulta' ),
        'id'     => 'footer_v1',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'consulta_footer_top_margin',
				'title' => __('Footer Top Margin', 'consulta'),
				'subtitle' => __('Please, Enter margin.', 'consulta'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.bt-footer .bt-footer-top'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'consulta_footer_top_padding',
				'title' => __('Footer Top Padding', 'consulta'),
				'subtitle' => __('Please, Enter padding.', 'consulta'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.bt-footer .bt-footer-top'),
				'default' => array(
					'padding-top'     => '70px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '70px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'consulta_footer_top_backgroud',
				'type'     => 'background',
				'title'    => __('Footer Top Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.bt-footer .bt-footer-top'), 
				'default'  => array(
					'background-color' => '#282828',
				)
			),
			array(
				'id' => 'consulta_footer_bottom_padding',
				'title' => __('Footer Bottom Padding', 'consulta'),
				'subtitle' => __('Please, Enter padding.', 'consulta'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.bt-footer .bt-footer-bottom'),
				'default' => array(
					'padding-top'     => '15px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '15px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'consulta_footer_bottom_backgroud',
				'type'     => 'background',
				'title'    => __('Footer Bottom Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.bt-footer .bt-footer-bottom'), 
				'default'  => array(
					'background-color' => '#1c1c1c',
				)
			),
		)
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer V2', 'consulta' ),
        'id'     => 'footer_v2',
        'desc'   => __( '', 'consulta' ),
        'subsection' => true,
		'fields' => array(
			array(
				'id' => 'consulta_footer_v2_top_margin',
				'title' => __('Footer Top Margin', 'consulta'),
				'subtitle' => __('Please, Enter margin.', 'consulta'),
				'type' => 'spacing',
				'mode' => 'margin',
				'units' => array('px'),
				'output' => array('.bt-footer-v2 .bt-footer-top'),
				'default' => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '0px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id' => 'consulta_footer_v2_top_padding',
				'title' => __('Footer Top Padding', 'consulta'),
				'subtitle' => __('Please, Enter padding.', 'consulta'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.bt-footer-v2 .bt-footer-top'),
				'default' => array(
					'padding-top'     => '70px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '70px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'consulta_footer_v2_top_backgroud',
				'type'     => 'background',
				'title'    => __('Footer Top Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.bt-footer-v2 .bt-footer-top'), 
				'default'  => array(
					'background-color' => '#212121',
				)
			),
			array(
				'id' => 'consulta_footer_v2_bottom_padding',
				'title' => __('Footer Bottom Padding', 'consulta'),
				'subtitle' => __('Please, Enter padding.', 'consulta'),
				'type' => 'spacing',
				'units' => array('px'),
				'output' => array('.bt-footer-v2 .bt-footer-bottom'),
				'default' => array(
					'padding-top'     => '15px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '15px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'consulta_footer_v2_bottom_backgroud',
				'type'     => 'background',
				'title'    => __('Footer Bottom Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.bt-footer-v2 .bt-footer-bottom'), 
				'default'  => array(
					'background-color' => '#131313',
				)
			),
		)
    ) );
	
	// -> START Title Bar
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Title Bar', 'consulta' ),
        'id'     => 'title_bar',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-credit-card',
		'fields' => array(
			array(
				'id'             => 'title_bar_margin',
				'type'           => 'spacing',
				'output'         => array('.bt-title-bar-wrap, .bt-page-title-shop'),
				'mode'           => 'margin',
				'units'          => array('em', 'px'),
				'title'    => __('Margin', 'consulta'),
				'subtitle' => __('Please, Enter margin of title bar.', 'consulta'),
				'default'            => array(
					'margin-top'     => '0px', 
					'margin-right'   => '0px', 
					'margin-bottom'  => '90px', 
					'margin-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'             => 'title_bar_padding',
				'type'           => 'spacing',
				'output'         => array('.bt-title-bar-wrap, .bt-page-title-shop'),
				'mode'           => 'padding',
				'units'          => array('em', 'px'),
				'title'    => __('Padding', 'consulta'),
				'subtitle' => __('Please, Enter padding of title bar.', 'consulta'),
				'default'            => array(
					'padding-top'     => '50px', 
					'padding-right'   => '0px', 
					'padding-bottom'  => '50px', 
					'padding-left'    => '0px',
					'units'          => 'px', 
				)
			),
			array(
				'id'       => 'consulta_title_bar_bg',
				'type'     => 'background',
				'title'    => __('Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				//'output'    => array('.bt-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => consulta_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array(
				'id'          => 'title_bar_heading',
				'type'        => 'typography', 
				'title'       => __('Title Bar Heading', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.bt-title-bar-wrap h2'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#cecece', 
					'font-style'  => '400', 
					'font-family' => 'Montserrat', 
					'google'      => true,
					'font-size'   => '20px', 
					'line-height' => '24px',
					'letter-spacing' => '0.48px'
				),
			),
			array(
				'id'          => 'title_bar_path',
				'type'        => 'typography', 
				'title'       => __('Title Bar Path', 'consulta'),
				'google'      => true, 
				'font-backup' => true,
				'letter-spacing' => true,
				'output'      	=> array('.bt-title-bar-wrap .bt-path, .bt-title-bar-wrap .bt-path a, .woocommerce .bt-page-title-shop, .woocommerce .bt-page-title-shop a'),
				'units'       =>'px',
				'subtitle'    => __('Typography option with each property can be called individually.', 'consulta'),
				'default'     => array(
					'color'       => '#cecece', 
					'font-style'  => '400', 
					'font-family' => 'Lato', 
					'google'      => true,
					'font-size'   => '14px', 
					'line-height' => '24px',
					'letter-spacing' => '0.48px'
				),
			),
			array(
				'id'       => 'page_breadcrumb_delimiter',
				'type'     => 'text',
				'title'    => __('Delimiter', 'consulta'),
				'subtitle' => __('Please, Enter Delimiter of page breadcrumb in title bar.', 'consulta'),
				'default'  => '-'
			)
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Post', 'consulta' ),
        'id'     => 'post_titlebar',
        'desc'   => __( '', 'consulta' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'consulta_blog_post_title_bar_bg',
				'type'     => 'background',
				'title'    => __('Archive Titlebar Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.archive .bt-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => consulta_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array(
				'id'       => 'consulta_post_title_bar_bg',
				'type'     => 'background',
				'title'    => __('Post Titlebar Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.single .bt-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => consulta_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Product', 'consulta' ),
        'id'     => 'product_titlebar',
        'desc'   => __( '', 'consulta' ),
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'consulta_archive_product_title_bar_bg',
				'type'     => 'background',
				'title'    => __('Archive Titlebar Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.archive.woocommerce-page .bt-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => consulta_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
			array(
				'id'       => 'consulta_product_title_bar_bg',
				'type'     => 'background',
				'title'    => __('Post Titlebar Background', 'consulta'),
				'subtitle' => __('background with image, color, etc.', 'consulta'),
				'output'    => array('.single-product .bt-title-bar-wrap'), 
				'default'  => array(
					'background-color' => '#222222',
					'background-repeat' => 'no-repeat',
					'background-position' => 'center center',
					'background-size' => 'cover',
					'background-image' => consulta_URI_PATH.'/assets/images/bg-titlebar.jpg',
				)
			),
		)
		
    ) );
	
	// -> START Blog Post
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Blog', 'consulta' ),
        'id'     => 'blog',
		'icon'   => 'el el-icon-file-edit',
        'desc'   => __( '', 'consulta' ),
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Archive Post', 'consulta' ),
        'id'     => 'archive_post',
		'subsection' => true,
        'desc'   => __( '', 'consulta' ),
		'fields' => array(
			array( 
				'id'       => 'consulta_blog_layout',
				'type'     => 'image_select',
				'title'    => __('Select Layout', 'consulta'),
				'subtitle' => __('Select layout of blog.', 'consulta'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => consulta_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => consulta_URI_PATH_ADMIN.'/assets/images/2cr.png'
							)
				),
				'default' => '2cr'
			),
			array(
				'id'       => 'consulta_blog_left_sidebar_col',
				'type'     => 'text',
				'title'    => __('Sidebar Left Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
				'required' => array('consulta_blog_layout','=', '2cl')
			),
			array(
				'id'       => 'consulta_blog_content_col',
				'type'     => 'text',
				'title'    => __('Content Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-9 col-lg-9 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-9 col-lg-9'
			),
			array(
				'id'       => 'consulta_blog_right_siedebar_col',
				'type'     => 'text',
				'title'    => __('Sidebar Right Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-3 col-lg-3 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
				'required' => array('consulta_blog_layout','=', '2cr')
			),
			array(
				'id'       => 'consulta_blog_post_readmore_text',
				'type'     => 'text',
				'title'    => __( 'Read More Text', 'consulta' ),
				'subtitle' => __( 'Enter text of label button read more in blog.', 'consulta' ),
				'default'  => 'READMORE',
			),
		)
		
    ) );
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Single Post', 'consulta' ),
        'id'     => 'single_post',
        'desc'   => __( '', 'consulta' ),
		'subsection' => true,
		'fields' => array(
			array( 
				'id'       => 'consulta_post_layout',
				'type'     => 'image_select',
				'title'    => __('Select Layout', 'consulta'),
				'subtitle' => __('Select layout of single blog.', 'consulta'),
				'options'  => array(
					'2cl'	=> array(
								'alt'   => '2cl',
								'img'   => consulta_URI_PATH_ADMIN.'/assets/images/2cl.png'
							),
					'2cr'	=> array(
								'alt'   => '2cr',
								'img'   => consulta_URI_PATH_ADMIN.'/assets/images/2cr.png'
							)
				),
				'default' => '2cr'
			),
			array(
				'id'       => 'consulta_post_left_sidebar_col',
				'type'     => 'text',
				'title'    => __('Left Sidebar Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-12 col-md-3 col-lg-3 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
				'required' => array('consulta_post_layout','=', '2cl')
			),
			array(
				'id'       => 'consulta_post_content_col',
				'type'     => 'text',
				'title'    => __('Content Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-6 col-md-9 col-lg-9 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-9 col-lg-9',
			),
			array(
				'id'       => 'consulta_post_right_siedebar_col',
				'type'     => 'text',
				'title'    => __('Right Sidebar Column', 'consulta'),
				'subtitle' => __('Please, Enter class bootstrap and extra class. Ex: col-xs-12 col-sm-12 col-md-3 col-lg-3 el-class.', 'consulta'),
				'default'  => 'col-xs-12 col-sm-12 col-md-3 col-lg-3',
				'required' => array('consulta_blog_layout','=', '2cr')
			),
			array( 
				'id'       => 'consulta_post_show_post_nav',
				'type'     => 'switch',
				'title'    => __( 'Show Navigation', 'consulta' ),
				'subtitle' => __( 'Show or not post navigation on your single blog.', 'consulta' ),
				'default'  => true,
			),
			array(
				'id'       => 'consulta_post_show_post_author',
				'type'     => 'switch',
				'title'    => __( 'Show Author', 'consulta' ),
				'subtitle' => __( 'Show or not post author on your single blog.', 'consulta' ),
				'default'  => true,
			),
			array(
				'id'       => 'consulta_post_show_post_comment',
				'type'     => 'switch',
				'title'    => __( 'Show Comment', 'consulta' ),
				'subtitle' => __( 'Show or not post comment on your single blog.', 'consulta' ),
				'default'  => true,
			),
		)
		
    ) );
	
	// -> START Page
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Page', 'consulta' ),
        'id'     => 'page',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-pencil',
		'fields' => array(
			array(
				'id'       => 'page_comment',
				'type'     => 'switch',
				'title'    => __( 'Show Page Comment', 'consulta' ),
				'subtitle' => __( 'Show or not page comment on your page.', 'consulta' ),
				'default'  => true,
			)
		)
		
    ) );
	
	// -> START Custom CSS
	Redux::setSection( $opt_name, array(
        'title'  => __( 'Custom CSS', 'consulta' ),
        'id'     => 'custom_css',
        'desc'   => __( '', 'consulta' ),
        'icon'   => 'el el-icon-css',
		'fields' => array(
			array(
				'id'       => 'custom_css_code',
				'type'     => 'ace_editor',
				'title'    => __('Custom CSS Code', 'consulta'),
				'subtitle' => __('Quickly add some CSS to your theme by adding it to this block..', 'consulta'),
				'mode'     => 'css',
				'theme'    => 'monokai',
				'default'  => ''
			)
		)
    ) );
	
	

    /*if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'consulta' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }*/
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'consulta' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'consulta' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

