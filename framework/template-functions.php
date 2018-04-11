<?php
if ( ! isset( $content_width ) ) $content_width = 900;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

if ( ! function_exists( 'consulta_setup' ) ) {
	function consulta_setup() {
		global $consulta_options;
		
		load_theme_textdomain( 'consulta', get_template_directory() . '/languages' );
		// Add Custom Header.
		add_theme_support('custom-header');
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare sizes.
		add_theme_support( 'post-thumbnails' );
		
		//Enable support for Title Tag
		 add_theme_support( "title-tag" );
		
		// This theme uses wp_nav_menu() in locations.
		register_nav_menus( array(
			'main_navigation'   => __( 'Main Navigation','consulta' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'video', 'audio', 'quote', 'link', 'gallery',
		) );

		// This theme allows users to set a custom background.
		add_theme_support( 'custom-background', apply_filters( 'consulta_custom_background_args', array(
			'default-color' => 'f5f5f5',
		) ) );

		// Add support for featured content.
		add_theme_support( 'featured-content', array(
			'featured_content_filter' => 'consulta_get_featured_posts',
			'max_posts' => 6,
		) );
		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}
add_action( 'after_setup_theme', 'consulta_setup' );

/* Custom Site Title */
function consulta_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	}
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'consulta' ), max( $paged, $page ) ) . " $sep $title";
	}
	return $title;
}
add_filter( 'wp_title', 'consulta_wp_title', 10, 2 );

/* Filter body class */
function consulta_body_classes($classes) {
	global $consulta_options;
	$body_layout = (isset($consulta_options["body_layout"])&&$consulta_options["body_layout"])?$consulta_options["body_layout"]:'wide';
	$consulta_body_layout = get_post_meta(get_the_ID(), 'consulta_body_layout', true)?get_post_meta(get_the_ID(), 'consulta_body_layout', true):'global';
	$classes[] = $consulta_body_layout=='global'?$body_layout:$consulta_body_layout;
    return $classes;
}
add_filter('body_class', 'consulta_body_classes');

/* Style Inline */
function consulta_add_style_inline() {
    global $consulta_options;
    $custom_style = '';
	
	wp_enqueue_style( 'consulta_custom_style', consulta_URI_PATH.'/assets/css/wp_custom_style.css' );
	
	/* Custom style */
	if (isset($consulta_options['custom_css_code']) && $consulta_options['custom_css_code']) {
        $custom_style .= "{$consulta_options['custom_css_code']}";
    }
    
	/* Body background */
    $tb_background_color =& $consulta_options['body_background']['background-color'];
    $tb_background_image =& $consulta_options['body_background']['background-image'];
    $tb_background_repeat =& $consulta_options['body_background']['background-repeat'];
    $tb_background_position =& $consulta_options['body_background']['background-position'];
    $tb_background_size =& $consulta_options['body_background']['background-size'];
    $tb_background_attachment =& $consulta_options['body_background']['background-attachment'];
	$custom_style .= "body{ background-color: $tb_background_color;}";
	if($tb_background_image){
		$custom_style .= "body{ background: url('$tb_background_image') $tb_background_repeat $tb_background_attachment $tb_background_position;background-size: $tb_background_size;}";
	}
	
	/* Title bar background */
    $tb_title_bar_bg_color =& $consulta_options['consulta_title_bar_bg']['background-color'];
    $title_bar_bg_image =& $consulta_options['consulta_title_bar_bg']['background-image'];
	$bg_title_bar = get_post_meta(get_the_ID(),'consulta_title_bar_bg',true);
	if($bg_title_bar) {
		$title_bar_bg_image = $bg_title_bar;
	}
    $title_bar_bg_repeat =& $consulta_options['consulta_title_bar_bg']['background-repeat'];
    $title_bar_bg_position =& $consulta_options['consulta_title_bar_bg']['background-position'];
    $title_bar_bg_size =& $consulta_options['consulta_title_bar_bg']['background-size'];
    $title_bar_bg_attachment =& $consulta_options['consulta_title_bar_bg']['background-attachment'];
	$custom_style .= ".page .bt-title-bar-wrap { background-color: $tb_title_bar_bg_color;}";
	if($title_bar_bg_image){
		$custom_style .= ".page .bt-title-bar-wrap { background: url('$title_bar_bg_image') $title_bar_bg_repeat $title_bar_bg_attachment $title_bar_bg_position;background-size: $title_bar_bg_size;}";
	}
	
    wp_add_inline_style( 'consulta_custom_style', $custom_style );
}
add_action( 'wp_enqueue_scripts', 'consulta_add_style_inline' );

/* Header */
function consulta_Header() {
    global $consulta_options;
    $header_layout =isset($consulta_options["consulta_header_layout"]) ? $consulta_options["consulta_header_layout"] : 'header-v1';
	$consulta_header = get_post_meta(get_the_ID(), 'consulta_header', true)?get_post_meta(get_the_ID(), 'consulta_header', true):'global';
	$header_layout = $consulta_header=='global'?$header_layout:$consulta_header;
    switch ($header_layout) {
		case 'header-v1':
            get_template_part('framework/headers/header', 'v1');
            break;
        case 'header-v2':
            get_template_part('framework/headers/header', 'v2');
            break;
		case 'header-v3':
            get_template_part('framework/headers/header', 'v3');
            break;
		case 'header-v4':
            get_template_part('framework/headers/header', 'v4');
            break;
		case 'header-v5':
            get_template_part('framework/headers/header', 'v5');
            break;
		case 'header-v6':
            get_template_part('framework/headers/header', 'v6');
            break;
		case 'header-v7':
            get_template_part('framework/headers/header', 'v7');
            break;
		case 'header-onepage':
            get_template_part('framework/headers/header', 'onepage');
            break;
		default :
			get_template_part('framework/headers/header', 'v1');
			break;
    }
}

/* Header */
function consulta_Footer() {
    global $consulta_options;
    $footer_layout =& $consulta_options["consulta_footer_layout"];
	$consulta_footer = get_post_meta(get_the_ID(), 'consulta_footer', true)?get_post_meta(get_the_ID(), 'consulta_footer', true):'global';
	$footer_layout = $consulta_footer=='global'?$footer_layout:$consulta_footer;
    switch ($footer_layout) {
        case 'footer-v1':
            get_template_part('framework/footers/footer', 'v1');
            break;
		case 'footer-v2':
            get_template_part('framework/footers/footer', 'v2');
            break;
		default :
			get_template_part('framework/footers/footer', 'v1');
			break;
    }
}

/* Logo */
if (!function_exists('consulta_logo')) {
	function consulta_logo() {
		global $consulta_options;
		$logo_result_arr = array();
		
		$logo = get_post_meta(get_the_ID(), 'consulta_logo', true);
		if($logo == '') {
			$logo = isset($consulta_options['consulta_logo']['url']) && $consulta_options['consulta_logo']['url'] ? $consulta_options['consulta_logo']['url'] : consulta_URI_PATH.'/assets/images/logo-dark.png';
		}
		$logo_stick = get_post_meta(get_the_ID(), 'consulta_logo_stick', true);
		if($logo_stick == '') {
			$logo_stick = isset($consulta_options['consulta_logo_stick']['url']) && $consulta_options['consulta_logo_stick']['url'] ? $consulta_options['consulta_logo_stick']['url'] : consulta_URI_PATH.'/assets/images/logo-white.png';
		}
		
		$logo_retina = isset($consulta_options['logo_retina']) ? $consulta_options['logo_retina'] : false;
		
		// logo size
		$logo_size = consulta_get_size_image($logo);
		if(!empty($logo_size)) {
			list($logo_w, $logo_h) = $logo_size;
			
			// logo retina width/2
			$logo_w = ($logo_retina == true) ? $logo_w / 2 : $logo_w;
			
			$logo_result_arr[] = sprintf('<img class="logo" src="%s" width="%s" alt="%s"/>', $logo, $logo_w, __('Logo', 'consulta'));
		}
		
		// logo stick size
		$logo_stick_size = consulta_get_size_image($logo_stick);
		if(!empty($logo_stick_size)) {
			list($logo_stick_w, $logo_stick_h) = $logo_stick_size;
			
			// logo retina width/2
			$logo_stick_w = ($logo_retina == true) ? $logo_stick_w / 2 : $logo_stick_w;
			
			$logo_result_arr[] = sprintf('<img class="logo-stick" src="%s" width="%s" alt="%s"/>', $logo_stick, $logo_stick_w, __('Logo', 'consulta'));
		}
		
		echo implode('', $logo_result_arr);
		//echo '<img class="logo" src="'.esc_url($logo).'" alt="Logo"/><img class="logo-stick" src="'.esc_url($logo_stick).'" alt="Logo Stick"/>';
	}
}

if(!function_exists('consulta_get_size_image')) :
	/*
	 * Get image size
	 * @param [string] $image_url
	 * @return [array | empty]
	 */
	function consulta_get_size_image($image_url = '') {
		if(empty($image_url)) return;
		
		$result = getimagesize($image_url);
		return $result;
	}
endif;

/* Page title */
if (!function_exists('consulta_page_title')) {
    function consulta_page_title() { 
            ob_start();
			if( is_home() ){
				_e('Home', 'consulta');
			}elseif(is_search()){
                _e('Search', 'consulta');
            }elseif(is_404()){
                _e('Page Not Found ', 'consulta');
            }elseif (!is_archive()) {
                the_title();
            } else { 
                if (is_category()){
                    single_cat_title();
                }elseif(get_post_type() == 'recipe' || get_post_type() == 'portfolio' || get_post_type() == 'produce' || get_post_type() == 'team' || get_post_type() == 'testimonial' || get_post_type() == 'myclients' || get_post_type() == 'product'){
                    single_term_title();
                }elseif (is_tag()){
                    single_tag_title();
                }elseif (is_author()){
                    printf(__('Author: %s', 'consulta'), '<span class="vcard">' . get_the_author() . '</span>');
                }elseif (is_day()){
                    printf(__('Day: %s', 'consulta'), '<span>' . get_the_date() . '</span>');
                }elseif (is_month()){
                    printf(__('Month: %s', 'consulta'), '<span>' . get_the_date() . '</span>');
                }elseif (is_year()){
                    printf(__('Year: %s', 'consulta'), '<span>' . get_the_date() . '</span>');
                }elseif (is_tax('post_format', 'post-format-aside')){
                    _e('Asides', 'consulta');
                }elseif (is_tax('post_format', 'post-format-gallery')){
                    _e('Galleries', 'consulta');
                }elseif (is_tax('post_format', 'post-format-image')){
                    _e('Images', 'consulta');
                }elseif (is_tax('post_format', 'post-format-video')){
                    _e('Videos', 'consulta');
                }elseif (is_tax('post_format', 'post-format-quote')){
                    _e('Quotes', 'consulta');
                }elseif (is_tax('post_format', 'post-format-link')){
                    _e('Links', 'consulta');
                }elseif (is_tax('post_format', 'post-format-status')){
                    _e('Statuses', 'consulta');
                }elseif (is_tax('post_format', 'post-format-audio')){
                    _e('Audios', 'consulta');
                }elseif (is_tax('post_format', 'post-format-chat')){
                    _e('Chats', 'consulta');
                }else{
                    _e('Archives', 'consulta');
                }
            }
                
            return ob_get_clean();
    }
}

/* Page breadcrumb */
if (!function_exists('consulta_page_breadcrumb')) {
    function consulta_page_breadcrumb($delimiter) {
		$home = __('Home', 'consulta');
		global $post;
		$homeLink = home_url();
		if( is_home() ){
			_e('Home', 'consulta');
		}else{
			echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
		}

		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
			echo '<span class="current">' . __('Archive by category: ', 'consulta') . single_cat_title('', false) . '</span>';

		} elseif ( is_search() ) {
			echo '<span class="current">' . __('Search results for: ', 'consulta') . get_search_query() . '</span>';

		} elseif ( is_day() ) {
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F').' '. get_the_time('Y') . '</a> ' . $delimiter . ' ';
			echo '<span class="current">' . get_the_time('d') . '</span>';

		} elseif ( is_month() ) {
			echo '<span class="current">' . get_the_time('F'). ' '. get_the_time('Y') . '</span>';

		} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			if(get_post_type() == 'portfolio'){
				$terms = get_the_terms(get_the_ID(), 'portfolio_category', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'portfolio_category', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'recipe'){
				$terms = get_the_terms(get_the_ID(), 'recipe_category', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'recipe_category', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'produce'){
				$terms = get_the_terms(get_the_ID(), 'produce_category', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'produce_category', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'team'){
				$terms = get_the_terms(get_the_ID(), 'team_category', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'team_category', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'testimonial'){
				$terms = get_the_terms(get_the_ID(), 'testimonial_category', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'testimonial_category', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'myclients'){
				$terms = get_the_terms(get_the_ID(), 'clientscategory', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'clientscategory', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}elseif(get_post_type() == 'product'){
				$terms = get_the_terms(get_the_ID(), 'product_cat', '' , '' );
				if($terms) {
					the_terms(get_the_ID(), 'product_cat', '' , ', ' );
					echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
				}else{
					echo '<span class="current">' . get_the_title() . '</span>';
				}
			}else{
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
			}

		} else {
			$cat = get_the_category(); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo ''.$cats;
			echo '<span class="current">' . get_the_title() . '</span>';
		}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			if($post_type) echo '<span class="current">' . $post_type->labels->singular_name . '</span>';
		} elseif ( is_attachment() ) {
			$parent = get_post($post->post_parent);
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';
		} elseif ( is_page() && !$post->post_parent ) {
			echo '<span class="current">' . get_the_title() . '</span>';

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo ''.$breadcrumbs[$i];
				if ($i != count($breadcrumbs) - 1)
					echo ' ' . $delimiter . ' ';
			}
			echo ' ' . $delimiter . ' ' . '<span class="current">' . get_the_title() . '</span>';

		} elseif ( is_tag() ) {
			echo '<span class="current">' . __('Posts tagged: ', 'consulta') . single_tag_title('', false) . '</span>';
		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo '<span class="current">' . __('Articles posted by ', 'consulta') . $userdata->display_name . '</span>';
		} elseif ( is_404() ) {
			echo '<span class="current">' . __('Error 404', 'consulta') . '</span>';
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo ' '.$delimiter.' '.__('Page', 'consulta') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
    }
}

/* Custom excerpt */
function consulta_custom_excerpt($limit, $more) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . $more;
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}
/* Display navigation to next/previous set of posts */
if ( ! function_exists( 'consulta_paging_nav' ) ) {
	function consulta_paging_nav() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
				'base'     => $pagenum_link,
				'format'   => $format,
				'total'    => $GLOBALS['wp_query']->max_num_pages,
				'current'  => $paged,
				'mid_size' => 1,
				'add_args' => array_map( 'urlencode', $query_args ),
				'prev_text' => '<i class="fa fa-angle-left"></i>',
				'next_text' => '<i class="fa fa-angle-right"></i>',
		) );

		if ( $links ) {
		?>
		<nav class="bt-pagination" role="navigation">
			<?php echo ''.$links; ?>
		</nav>
		<?php
		}
	}
}
/* Display navigation to next/previous post */
if ( ! function_exists( 'consulta_post_nav' ) ) {
	function consulta_post_nav() {
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );
		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="bt-blog-article-nav clearfix">
			<?php
				previous_post_link( '%link', __( 'NEWEST POSTS', 'consulta' ) );
				next_post_link( '%link',     __( 'OLDER POSTS', 'consulta' ) );
			?>
		</nav>
		<?php
	}
}
/* Title Bar */
if ( ! function_exists( 'consulta_title_bar' ) ) {
	function consulta_title_bar($consulta_show_page_title, $consulta_show_page_breadcrumb) {
		global $consulta_options;
		$delimiter = isset($consulta_options['page_breadcrumb_delimiter']) ? $consulta_options['page_breadcrumb_delimiter'] : '/';
		?>
			<div class="bt-title-bar-wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php if($consulta_show_page_breadcrumb){  ?>
								<div class="bt-path">
									<div class="bt-path-inner bt-text-ellipsis">
										<i class="fa fa-map-marker"></i>
										<?php echo consulta_page_breadcrumb($delimiter); ?>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-md-6">
							<?php if($consulta_show_page_title){  ?>
								<h2 class="bt-text-ellipsis"><?php echo consulta_page_title(); ?></h2>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php 
	}
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'consulta_cat_count_span');
function consulta_cat_count_span($links) {
	$links = str_replace('</a> (', ' <span>', $links);
	$links = str_replace('(', '', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'consulta_archive_count_span');
function consulta_archive_count_span($links) {
	$links = str_replace('(', '<span class="count">', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}

add_filter ( 'wp_tag_cloud', 'consulta_tag_cloud_count' );
function consulta_tag_cloud_count( $return ) {
	$tags = explode('</a>', $return);
	foreach( $tags as $tag ) {
		$tagn[] = '<span>'.$tag.'</a>';
	}
	$return = implode('</span>', $tagn);
	return $return;
}
