<?php
/**
 * Custom post types and custom taxonomies
 */
function create_custom_post_type() 
{
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
}
add_action('init', 'create_custom_post_type');

function create_genre_taxonomy() 
{
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