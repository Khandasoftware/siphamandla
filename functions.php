<?php
/**
 * levitate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package levitate
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function levitate_setup() 
{
	load_theme_textdomain( 'levitate', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'levitate' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
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
			'levitate_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'levitate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function levitate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'levitate_content_width', 640 );
}
add_action( 'after_setup_theme', 'levitate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function levitate_widgets_init() 
{
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'levitate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'levitate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'levitate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function levitate_scripts()
{
	wp_enqueue_style( 'levitate-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'levitate-simui-style', get_template_directory_uri() .'/css/index.css', array(), _S_VERSION);
	wp_enqueue_style( 'levitate-simui-style', get_template_directory_uri() .'/css/simui.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'levitate-splide-style', get_template_directory_uri() .'/css/splide.min.css', array(), _S_VERSION );
	wp_style_add_data( 'levitate-style', 'rtl', 'replace' );


	// Enqueue jQuery from WordPress core
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'levitate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'levitate-simui', get_template_directory_uri() . '/js/simui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'levitate-fslightbox', get_template_directory_uri() . '/js/fslightbox.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'levitate-splide', get_template_directory_uri() . '/js/splide.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('levitate-main', get_template_directory_uri() . '/build/index.js', array('jquery','levitate-splide','levitate-fslightbox'), '1.0', true);

	 // Pass the AJAX URL to the JavaScript
	 wp_localize_script('levitate-main', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'levitate_scripts' );


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
 * Dynamic custom blocks
 */
require get_template_directory() . '/inc/custom-blocks.php';

/**
 * Custom post types and custom taxonomies
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom options
 */
require get_template_directory() . '/inc/menus.php';

/**
 * Ajax
 */
require get_template_directory() . '/inc/ajax.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) 
{
	require get_template_directory() . '/inc/jetpack.php';
}





