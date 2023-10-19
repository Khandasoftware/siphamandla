<?php
/**
 * ACF based dynamic custom blocks
 */
function custom_image_gallery_block() 
{
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


function custom_hero_banner_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'hero-banner-image',
        'title'           => __('Hero Banner Image', 'your-theme-textdomain'),
        'description'     => __('A custom hero banner image block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/hero-banner-image.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('image', 'hero banner', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}
add_action('acf/init', 'custom_hero_banner_block');


function custom_horizontal_card_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'horizontal-card',
        'title'           => __('Horizontal Card', 'your-theme-textdomain'),
        'description'     => __('A custom horizontal card block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/horizontal-card.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('Card', 'Horizontal Card', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_horizontal_card_block');


function custom_tabs_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'tabs',
        'title'           => __('tabs', 'your-theme-textdomain'),
        'description'     => __('A custom tabs block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/tabs.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('Tabs', 'Tabs', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_tabs_block');


function custom_popup_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'popup',
        'title'           => __('popup', 'your-theme-textdomain'),
        'description'     => __('A custom popup block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/popup.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('popup', 'popup', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_popup_block');

function custom_accordion_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'accordion',
        'title'           => __('accordion', 'your-theme-textdomain'),
        'description'     => __('A custom accordion block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/accordion.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('accordion', 'accordion', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_accordion_block');


function custom_vertical_cards_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'vertical-cards',
        'title'           => __('Vertical Cards', 'your-theme-textdomain'),
        'description'     => __('A custom vertical cards block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/vertical-cards.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('Vertical Cards', 'vertical-cards', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_vertical_cards_block');


function custom_slider_block() 
{
    // Register ACF Block
    acf_register_block(array(
        'name'            => 'slider',
        'title'           => __('slider', 'your-theme-textdomain'),
        'description'     => __('A custom slider block with ACF fields.', 'your-theme-textdomain'),
        'render_template' => 'template-parts/blocks/slider.php', // Create this file in your theme
        'category'        => 'common',
        'icon'            => 'images-alt2',
        'keywords'        => array('slider', 'slider', 'acf'),
        'mode'            => 'edit',
        'supports'        => array('align' => false),
    ));
}

add_action('acf/init', 'custom_slider_block');

