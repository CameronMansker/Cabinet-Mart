
<?php
/**
 * Cabinet Mart Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme setup
function cabinet_mart_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register menu locations
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cabinet-mart'),
        'footer' => esc_html__('Footer Menu', 'cabinet-mart'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height' => 80,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'cabinet_mart_setup');

// Enqueue scripts and styles
function cabinet_mart_scripts() {
    // Enqueue styles
    wp_enqueue_style('cabinet-mart-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Tailwind CSS
    wp_enqueue_style('cabinet-mart-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0');
    
    // Enqueue main JavaScript file
    wp_enqueue_script('cabinet-mart-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);

    // Localize script with site data
    wp_localize_script('cabinet-mart-script', 'cabinetMartData', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url(),
    ));
}
add_action('wp_enqueue_scripts', 'cabinet_mart_scripts');

// Register widget areas
function cabinet_mart_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area', 'cabinet-mart'),
        'id' => 'footer-widget',
        'description' => esc_html__('Add widgets here to appear in the footer.', 'cabinet-mart'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'cabinet_mart_widgets_init');

// Add custom image sizes if needed
function cabinet_mart_custom_image_sizes() {
    add_image_size('hero-image', 1920, 1080, true);
    add_image_size('catalog-thumb', 600, 800, true);
    add_image_size('testimonial-avatar', 150, 150, true);
}
add_action('after_setup_theme', 'cabinet_mart_custom_image_sizes');

// Include required files
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/customizer.php';

// Add custom post types if needed
function cabinet_mart_register_post_types() {
    // Testimonials post type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'cabinet-mart'),
            'singular_name' => __('Testimonial', 'cabinet-mart'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-format-quote',
    ));
    
    // Team Members post type
    register_post_type('team_member', array(
        'labels' => array(
            'name' => __('Team Members', 'cabinet-mart'),
            'singular_name' => __('Team Member', 'cabinet-mart'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'menu_icon' => 'dashicons-groups',
    ));
}
add_action('init', 'cabinet_mart_register_post_types');

// Add option pages for ACF if using Advanced Custom Fields
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title' => 'Contact Information',
        'menu_title' => 'Contact Info',
        'parent_slug' => 'theme-general-settings',
    ));
}
