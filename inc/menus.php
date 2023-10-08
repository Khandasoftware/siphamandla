<?php
// Add the admin menu item
function custom_analytics_pixels_menu() 
{
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
function custom_analytics_pixels_page()
{
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
function custom_analytics_pixels_settings()
{
    register_setting('custom_analytics_pixels', 'ga_id');
    register_setting('custom_analytics_pixels', 'fb_pixel_id');

    add_settings_section('analytics_section', 'Google Analytics', 'analytics_section_callback', 'custom_analytics_pixels');
    add_settings_section('pixel_section', 'Facebook Pixel', 'pixel_section_callback', 'custom_analytics_pixels');

    add_settings_field('ga_id', 'Google Analytics ID', 'ga_id_callback', 'custom_analytics_pixels', 'analytics_section');
    add_settings_field('fb_pixel_id', 'Facebook Pixel ID', 'fb_pixel_id_callback', 'custom_analytics_pixels', 'pixel_section');
}
add_action('admin_init', 'custom_analytics_pixels_settings');

// Callback functions for settings sections and fields
function analytics_section_callback() 
{
    echo 'Enter your Google Analytics ID below:';
}

function pixel_section_callback() 
{
    echo 'Enter your Facebook Pixel ID below:';
}

function ga_id_callback() 
{
    $ga_id = get_option('ga_id');
    echo "<input type='text' name='ga_id' value='$ga_id' />";
}

function fb_pixel_id_callback() 
{
    $fb_pixel_id = get_option('fb_pixel_id');
    echo "<input type='text' name='fb_pixel_id' value='$fb_pixel_id' />";
}
