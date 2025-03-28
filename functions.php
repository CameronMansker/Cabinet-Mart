
<?php
/**
 * Cabinet Mart functions and definitions
 */

if (!defined('_S_VERSION')) {
    // Replace the version number as needed
    define('_S_VERSION', '1.0.0');
}

/**
 * Enqueue scripts and styles.
 */
function cabinetmart_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('cabinetmart-style', get_stylesheet_uri(), array(), _S_VERSION);
    
    // Enqueue Tailwind CSS
    wp_enqueue_style('cabinetmart-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), _S_VERSION);
    
    // Enqueue custom scripts
    wp_enqueue_script('cabinetmart-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);
    
    // Add Google Fonts
    wp_enqueue_style('cabinetmart-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'cabinetmart_scripts');

/**
 * Register menu locations
 */
function cabinetmart_register_menus() {
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'cabinetmart'),
            'footer-1' => __('Footer Navigation Menu', 'cabinetmart'),
            'footer-2' => __('Footer Support Menu', 'cabinetmart'),
        )
    );
}
add_action('init', 'cabinetmart_register_menus');

/**
 * Register widget areas
 */
function cabinetmart_widgets_init() {
    register_sidebar(
        array(
            'name'          => __('Footer Contact Info', 'cabinetmart'),
            'id'            => 'footer-contact',
            'description'   => __('Add contact information widgets here.', 'cabinetmart'),
            'before_widget' => '<div class="footer-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="text-sm font-medium mb-4 tracking-wider">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'cabinetmart_widgets_init');

/**
 * Add theme support features
 */
function cabinetmart_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // HTML5 support
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
}
add_action('after_setup_theme', 'cabinetmart_setup');

// Include ACF fields if plugin exists
if (class_exists('ACF')) {
    require get_template_directory() . '/inc/acf-fields.php';
}
