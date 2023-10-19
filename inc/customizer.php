<?php
/**
 * Siphamandla Theme Customizer
 *
 * @package Siphamandla
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function siphamandla_customize_register( $wp_customize ) 
{
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'siphamandla_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'siphamandla_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'siphamandla_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function siphamandla_customize_partial_blogname() 
{
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function siphamandla_customize_partial_blogdescription() 
{
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function siphamandla_customize_preview_js() 
{
	wp_enqueue_script( 'siphamandla-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'siphamandla_customize_preview_js' );

/**
 * Global Styles In Customizer
 */
function custom_theme_customize_register($wp_customize) 
{
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