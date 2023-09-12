<?php
$gallery_items = get_field('image_gallery');

if ($gallery_items) {
    echo '<div class="image-gallery">';
    
    foreach ($gallery_items as $item) {
        $image = $item['image'];
        $title = $item['title'];
        $description = $item['description'];

        echo '<div class="gallery-item">';
        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($title) . '">';
        echo '<h3>' . esc_html($title) . '</h3>';
        echo '<p>' . esc_html($description) . '</p>';
        echo '</div>';
    }

    echo '</div>';
}
?>
