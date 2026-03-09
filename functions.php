<?php
/**
 * Mebel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mebel
 */

 define('ID_FRONTPAGE', 82);   // Главная страница
 define('ID_PERETYAZHKA', 60);   // Перетяжка мягкой мебели
 define('ID_REMONT', 54);   // Ремонт мягкой мебели
 // id страниц с ценами
 define('ID_PAGE_OVERDRAWING', 64);   // Цены - перетяжка мягкой мебели
 define('ID_PAGE_OBIVKA', 66);   // Цены - обивка мебели
 define('ID_PAGE_REPAIR', 68);   // Цены - ремонт мебели
 define('ID_PAGE_ASSEMBLE', 70);   // Цены - сборка мебели
 define('ID_PAGE_RESTAVRAT', 73);   // Цены - реставрация мебели
 define('ID_PAGE_DESTROY', 75);   // Цены - разборка и утилизации
 define('ID_PAGE_MOVEMENT', 77);   // Цены - перевозка мебели
 define('ID_PAGE_MADE', 79);   // Цены - изготовление под заказ

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

define( 'DISALLOW_FILE_EDIT', true );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mebel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Mebel, use a find and replace
		* to change 'mebel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mebel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu_header' => 'Меню в хэдере',
			'menu_prices' => 'Меню на страницах с Ценами'
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mebel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

}
add_action( 'after_setup_theme', 'mebel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mebel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mebel_content_width', 1542 );
}
add_action( 'after_setup_theme', 'mebel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mebel_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'Меню в футере',
			'id'            => 'footer-menu',
			'description'   => 'Добавьте меню в футер',
			'before_widget' => '<div id="%1$s" class="main-footer-menu %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="heading-tertiary">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'mebel_widgets_init' );

/** 
 * Enqueue scripts and styles.
 */
function mebel_scripts() {
	wp_enqueue_style('mebel-style', get_stylesheet_uri(), array('mebel-main-css'), _S_VERSION);
	wp_enqueue_style('mebel-fancybox-css', get_template_directory_uri() . "/assets/css/jquery.fancybox.min.css");
	wp_enqueue_style('mebel-swiper-css', get_template_directory_uri() . "/assets/css/swiper.min.css");
	wp_enqueue_style('mebel-main-css', get_template_directory_uri() . "/assets/css/app.min.css");
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.0.js', array(), null, false);
	wp_enqueue_script('jquery');
	wp_enqueue_script('mebel-main-js', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'mebel_scripts' ); 

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Добавляет класс materials-title к первому h2 в контенте (для ACF WYSIWYG полей)
 */
function mebel_add_materials_title_to_first_h2( $content ) {
	if ( empty( $content ) || ! is_string( $content ) ) {
		return $content;
	}
	$content = preg_replace_callback(
		'/<h2(\s[^>]*)?>/',
		function ( $m ) {
			if ( strpos( $m[0], 'class="' ) !== false ) {
				return preg_replace( '/class="([^"]*)"/', 'class="$1 materials-title"', $m[0], 1 );
			}
			return '<h2 class="materials-title">';
		},
		$content,
		1
	);
	return $content;
} 

add_filter( 'upload_mimes', 'mebel_svg_upload_allow' );

function mebel_svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';
	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'mebel_fix_svg_mime_type', 10, 5 );

function mebel_fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){
 
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	if( $dosvg ){
		if( current_user_can('manage_options') ){
			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}
	}
	return $data;
};


function mebel_create_materials() {
	
	$material_args = array(
		'labels' => array(
			'name' => 'Материалы',
			'singular_name' => 'Материал',
			'all_items' => 'Все материалы',
			'add_new' => 'Добавить новый',
			'add_new_item' => 'Добавить новый материал',
			'edit_item' => 'Редактировать материал',
			'new_item' => 'Новый материал',
			'view_item' => 'Посмотреть материал',
			'search_items' => 'Найти материал',
			'menu_name' => 'Материалы'
		),
		'public' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'menu_position' => 20,5,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'menu_icon' => 'dashicons-images-alt2'
	);

	register_post_type( 'materials', $material_args );
};

add_action('init', 'mebel_create_materials');


/**
 * Custom Menu Walker for multi-level menu support
 */
class Mebel_Custom_Walker extends Walker_Nav_Menu {
	
	// Start Level (ul)
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		
		// First level submenu (services dropdown)
		if ( $depth == 0 ) {
			$output .= "\n$indent<div class=\"services-dropdown-menu\">\n";
			$output .= "$indent\t<div class=\"services-dropdown-content\">\n";
		}
		// Second level submenu
		else if ( $depth == 1 ) {
			$output .= "\n$indent\t\t<div class=\"services-submenu\">\n";
		}
	}
	
	// End Level (ul)
	function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		
		if ( $depth == 0 ) {
			$output .= "$indent\t</div>\n"; // Close services-dropdown-content
			$output .= "$indent</div>\n"; // Close services-dropdown-menu
		}
		else if ( $depth == 1 ) {
			$output .= "$indent\t\t</div>\n"; // Close services-submenu
		}
	}
	
	// Start Element (li)
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		// Add custom classes based on depth and children
		if ( $depth == 0 ) {
			// Top level menu item
			if ( in_array('menu-item-has-children', $classes) ) {
				$classes[] = 'menu-item-has-services';
			}
		} else if ( $depth == 1 ) {
			// First level submenu item
			if ( in_array('menu-item-has-children', $classes) ) {
				$classes[] = 'services-dropdown-item';
				$classes[] = 'has-submenu';
			} else {
				$classes[] = 'services-dropdown-item';
			}
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		// Output based on depth
		if ( $depth == 0 ) {
			// Top level - standard li
			$output .= $indent . '<li' . $class_names .'>';
		} else if ( $depth == 1 ) {
			// First submenu level - use div instead of li
			$output .= $indent . "\t\t" . '<div' . $class_names .'>';
		}
		
		// Link attributes
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		// Link classes based on depth
		$link_class = '';
		if ( $depth == 1 ) {
			$link_class = ' class="services-main-link"';
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . $link_class .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		// Add arrow for items with children at depth 1
		if ( $depth == 1 && in_array('menu-item-has-children', $classes) ) {
			$item_output .= '<span class="menu-arrow-icon">›</span>';
		}
		
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	// End Element (li)
	function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( $depth == 0 ) {
			$output .= "</li>\n";
		} else if ( $depth == 1 ) {
			$output .= "</div>\n";
		}
	}
}

/**
 * Mobile Menu Walker - similar structure but with mobile-specific classes
 */
class Mebel_Mobile_Walker extends Walker_Nav_Menu {
	
	function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		
		if ( $depth == 0 ) {
			$output .= "\n$indent<div class=\"services-dropdown-menu mobile-services\">\n";
			$output .= "$indent\t<div class=\"services-dropdown-content\">\n";
		}
		else if ( $depth == 1 ) {
			$output .= "\n$indent\t\t<div class=\"services-submenu\">\n";
		}
	}
	
	function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent = str_repeat("\t", $depth);
		
		if ( $depth == 0 ) {
			$output .= "$indent\t</div>\n";
			$output .= "$indent</div>\n";
		}
		else if ( $depth == 1 ) {
			$output .= "$indent\t\t</div>\n";
		}
	}
	
	function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		
		if ( $depth == 0 ) {
			if ( in_array('menu-item-has-children', $classes) ) {
				$classes[] = 'menu-item-has-services-mobile';
			}
		} else if ( $depth == 1 ) {
			if ( in_array('menu-item-has-children', $classes) ) {
				$classes[] = 'services-dropdown-item';
				$classes[] = 'has-submenu';
			} else {
				$classes[] = 'services-dropdown-item';
			}
		}
		
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		
		if ( $depth == 0 ) {
			$output .= $indent . '<li' . $class_names .'>';
		} else if ( $depth == 1 ) {
			$output .= $indent . "\t\t" . '<div' . $class_names .'>';
		}
		
		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
		
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
		
		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
		
		$link_class = '';
		if ( $depth == 1 ) {
			$link_class = ' class="services-main-link"';
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . $link_class .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		
		if ( $depth == 1 && in_array('menu-item-has-children', $classes) ) {
			$item_output .= '<span class="menu-arrow-icon">›</span>';
		}
		
		$item_output .= '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function end_el( &$output, $item, $depth = 0, $args = null ) {
		if ( $depth == 0 ) {
			$output .= "</li>\n";
		} else if ( $depth == 1 ) {
			$output .= "</div>\n";
		}
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php'; 

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php'; 
}  

/**
 * Исправление микроразметки для валидаторов Яндекс и Google
 */

// Удаляем устаревшее поле query-input из SearchAction (для Яндекс валидатора)
function mebel_fix_search_action_markup() {
    // Отключаем стандартную SearchAction разметку WordPress если она есть
    remove_action('wp_head', 'wp_sitewide_search_action', 1);
}
add_action('init', 'mebel_fix_search_action_markup');

// Фильтруем вывод HTML для удаления query-input
function mebel_remove_query_input_from_html($buffer) {
    // Удаляем query-input из SearchAction разметки
    $buffer = preg_replace('/<meta\s+itemprop=["\']query-input["\'][^>]*>/i', '', $buffer);
    $buffer = preg_replace('/<input\s+itemprop=["\']query-input["\'][^>]*>/i', '', $buffer);
    return $buffer;
}

// Применяем фильтр только для фронтенда
if (!is_admin()) {
    add_action('template_redirect', function() {
        ob_start('mebel_remove_query_input_from_html');
    });
}

/**
 * Принудительный редирект на HTTPS
 */
function mebel_force_ssl_redirect() {
    if (!is_ssl() && !is_admin()) {
        wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
        exit();
    }
}
add_action('template_redirect', 'mebel_force_ssl_redirect'); 

