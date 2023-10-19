<?php
/**
 * Siphamandla functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Siphamandla
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
function siphamandla_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Siphamandla, use a find and replace
		* to change 'siphamandla' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'siphamandla', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'siphamandla' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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
			'siphamandla_custom_background_args',
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
add_action( 'after_setup_theme', 'siphamandla_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function siphamandla_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'siphamandla_content_width', 640 );
}
add_action( 'after_setup_theme', 'siphamandla_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function siphamandla_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'siphamandla' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'siphamandla' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'siphamandla_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function siphamandla_scripts() {
	wp_enqueue_style( 'siphamandla-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'siphamandla-simui-style', get_template_directory_uri() .'/css/simui.min.css', array(), _S_VERSION );
	wp_style_add_data( 'siphamandla-style', 'rtl', 'replace' );


	// Enqueue jQuery from WordPress core
	wp_enqueue_script('jquery');

	wp_enqueue_script( 'siphamandla-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'siphamandla-simui', get_template_directory_uri() . '/js/simui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('siphamandla-main', get_template_directory_uri() . '/build/index.js', array('jquery'), '1.0', true);
	 // Pass the AJAX URL to the JavaScript
	 wp_localize_script('siphamandla-main', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'siphamandla_scripts' );


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


function create_custom_post_type() {
    register_post_type('songs',
        array(
            'labels' => array(
                'name' => __('Songs'),
                'singular_name' => __('Song')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );

    register_post_type('Videos',
        array(
            'labels' => array(
                'name' => __('Videos'),
                'singular_name' => __('Video')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        )
    );
}
add_action('init', 'create_custom_post_type');


function create_genre_taxonomy() {
    register_taxonomy(
        'genres',
        'songs',
        array(
            'label' => __('Genres'),
            'hierarchical' => true,
            'rewrite' => array('slug' => 'genre'),
        )
    );
}
add_action('init', 'create_genre_taxonomy');




function custom_ajax_handler() {
    // Check if the request is coming from a valid source
    if ( check_ajax_referer('ajax_nonce', 'ajax_nonce') ) {  
		
		// Get the data from the AJAX request
        $callback = sanitize_text_field( $_POST['callback'] );

		// The function exists, so you can call it dynamically
		if ( ! ( isset( $callback ) && is_string( $callback ) && function_exists( $callback ) ) )
			wp_send_json_error( array('message' => 'callback does not exists') );

		// Send a response back to the client
		$response =[
			'message' => 'Data received successfully.',
			'payload' => $callback(),
		];

		wp_send_json_success( $response );
        // Always exit to avoid further execution
    } else {
        // Invalid nonce, reject the request
        wp_send_json_error( array('message' => 'Invalid nonce.') );
    }

	wp_die();
}  
function fetchapidata(){
	return $_POST;
}
add_action('wp_ajax_custom_ajax_action', 'custom_ajax_handler');
add_action('wp_ajax_nopriv_custom_ajax_action', 'custom_ajax_handler');

function custom_theme_customize_register($wp_customize) {
    // Add a section for colors
    $wp_customize->add_section('custom_colors', array(
        'title' => __('Custom Colors', 'custom-theme'),
        'priority' => 30,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#ff0000', // Default primary color
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'custom-theme'),
        'section' => 'custom_colors',
    )));

    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default' => '#00ff00', // Default secondary color
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label' => __('Secondary Color', 'custom-theme'),
        'section' => 'custom_colors',
    )));

    // Text Color
    $wp_customize->add_setting('text_color', array(
        'default' => '#000000', // Default text color
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'custom-theme'),
        'section' => 'custom_colors',
    )));

    // Heading Color
    $wp_customize->add_setting('heading_color', array(
        'default' => '#333333', // Default heading color
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_color', array(
        'label' => __('Heading Color', 'custom-theme'),
        'section' => 'custom_colors',
    )));
}
add_action('customize_register', 'custom_theme_customize_register');

function custom_image_gallery_block() {
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'image-gallery',
        'title'           => __('Image Gallery', 'your-theme-textdomain'),
        'description'     => __('A custom image gallery block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/image-gallery.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('image', 'gallery', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_image_gallery_block');



// Add the admin menu item
function custom_analytics_pixels_menu() {
    add_menu_page(
        'Analytics & Pixels',
        'Analytics & Pixels',
        'manage_options',
        'custom_analytics_pixels_settings',
        'custom_analytics_pixels_page'
    );
}
add_action('admin_menu', 'custom_analytics_pixels_menu');

// Create the options page content
function custom_analytics_pixels_page() {
    ?>
    <div class="wrap">
        <h2>Analytics & Pixels Settings</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_analytics_pixels');
            do_settings_sections('custom_analytics_pixels');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register and define settings
function custom_analytics_pixels_settings() {
    register_setting('custom_analytics_pixels', 'ga_id');
    register_setting('custom_analytics_pixels', 'fb_pixel_id');

    add_settings_section('analytics_section', 'Google Analytics', 'analytics_section_callback', 'custom_analytics_pixels');
    add_settings_section('pixel_section', 'Facebook Pixel', 'pixel_section_callback', 'custom_analytics_pixels');

    add_settings_field('ga_id', 'Google Analytics ID', 'ga_id_callback', 'custom_analytics_pixels', 'analytics_section');
    add_settings_field('fb_pixel_id', 'Facebook Pixel ID', 'fb_pixel_id_callback', 'custom_analytics_pixels', 'pixel_section');
}
add_action('admin_init', 'custom_analytics_pixels_settings');

// Callback functions for settings sections and fields
function analytics_section_callback() {
    echo 'Enter your Google Analytics ID below:';
}

function pixel_section_callback() {
    echo 'Enter your Facebook Pixel ID below:';
}

function ga_id_callback() {
    $ga_id = get_option('ga_id');
    echo "<input type='text' name='ga_id' value='$ga_id' />";
}

function fb_pixel_id_callback() {
    $fb_pixel_id = get_option('fb_pixel_id');
    echo "<input type='text' name='fb_pixel_id' value='$fb_pixel_id' />";
}


