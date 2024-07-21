<?php
// Enqueue Bootstrap CSS and JS
function mytheme_enqueue_assets() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), null);
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('bootstrap-css'), null);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

// Register Navigation Menus
function mytheme_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mytheme'),
    ));
}
add_action('init', 'mytheme_register_menus');

// Add WP Bootstrap Navwalker
function mytheme_include_navwalker() {
    if (file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    } else {
        error_log('Error: class-wp-bootstrap-navwalker.php file not found');
    }
}
add_action('after_setup_theme', 'mytheme_include_navwalker');

// Add Custom Logo Support
function mytheme_custom_logo_setup() {
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'mytheme_custom_logo_setup');
?>
