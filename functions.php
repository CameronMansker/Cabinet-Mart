
<?php
/**
 * Cabinet Mart Theme Functions
 */

// Theme setup
function cabinetmart_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cabinetmart'),
        'footer_nav' => __('Footer Navigation', 'cabinetmart'),
        'footer_support' => __('Footer Support', 'cabinetmart'),
    ));
}
add_action('after_setup_theme', 'cabinetmart_setup');

// Enqueue styles and scripts
function cabinetmart_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('cabinetmart-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Add custom fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue main JS file
    wp_enqueue_script('cabinetmart-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Add Tailwind output
    wp_enqueue_style('cabinetmart-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'cabinetmart_scripts');

// ACF Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title' => 'Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title' => 'Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-settings',
    ));
}

// Include ACF field definitions
require_once get_template_directory() . '/inc/acf-fields.php';
?>
