<?php require_once(TEMPLATEPATH . '/inc/theme-options.php'); 

/**
 * Multi IQ functions and definitions
 *
 * @package Multi IQ
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'multi_iq_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function multi_iq_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Multi IQ, use a find and replace
	 * to change 'multi-iq' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'multi-iq', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'multi-iq' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'multi_iq_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // multi_iq_setup
add_action( 'after_setup_theme', 'multi_iq_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function multi_iq_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'multi-iq' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

		register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'multi-iq' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Widgets Middle', 'multi-iq' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Widgets Header Right', 'multi-iq' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Widgets Header Middle', 'multi-iq' ),
		'id'            => 'sidebar-8',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
		register_sidebar( array(
		'name'          => __( 'Footer Left', 'multi-iq' ),
		'id'            => 'sidebar-5',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'multi-iq' ),
		'id'            => 'sidebar-6',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'multi-iq' ),
		'id'            => 'sidebar-7',
		'description'   => '',
		'before_widget' => '<aside class="widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'multi_iq_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function multi_iq_scripts() {

$multiiq_color_scheme = get_option( 'multiiq_color_scheme' );

	global $blue;
	global $red;
	global $green;

	wp_enqueue_style("multi-iq-main-styles", get_stylesheet_uri() );
	wp_enqueue_style("multi-iq-panel-style", get_template_directory_uri()."/css/panel.css", false, "1.0", "all");
	wp_enqueue_style("mulit-iq-bootstrap-styles", get_template_directory_uri()."/css/bootstrap.min.css", false, "3.3.2", "all");
	wp_enqueue_style("multi-iq-font-awesome", get_template_directory_uri()."/css/font-awesome/css/font-awesome.min.css", false, "4.3.0", "all");

if ($multiiq_color_scheme === 'red') {
		wp_enqueue_style( 'multi-iq-style', get_template_directory_uri() . $red );
} elseif ($multiiq_color_scheme === 'blue') {
		wp_enqueue_style( 'multi-iq-style', get_template_directory_uri() . $blue );
} elseif ($multiiq_color_scheme === 'green') {
		wp_enqueue_style( 'multi-iq-style', get_template_directory_uri() . $green);
}

	wp_enqueue_script( 'multi-iq-jquery', get_template_directory_uri() . '/js/jquery-2.1.3.min.js', array(), '2.1.3', true );

	wp_enqueue_script( 'multi-iq-bootstrap-functions', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.2', true );

	wp_enqueue_script( 'multi-iq-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'multi-iq-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'multi-iq-superfish', get_template_directory_uri() . '/js/superfish.min.js', array(), '20150224', true );

	wp_enqueue_script( 'multi-iq-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('multi-iq-superfish'), '20150224', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'multi_iq_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* This allows shortcodes in widget text areas */
add_filter('widget_text', 'do_shortcode');

/* This removes ellipses from excerpts */
function trim_excerpt($text) {
  return rtrim($text,'[&hellip;]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

// This adds styles to the text editor
add_action( 'init', 'cd_add_editor_styles' );
/**
* Apply theme's stylesheet to the visual editor.
*
* @uses add_editor_style() Links a stylesheet to visual editor
* @uses get_stylesheet_uri() Returns URI of theme stylesheet
*/
function cd_add_editor_styles() {
add_editor_style( get_stylesheet_uri() );
}