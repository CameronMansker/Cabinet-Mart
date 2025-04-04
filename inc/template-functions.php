
<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cabinet_mart_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'cabinet_mart_pingback_header');

/**
 * Add custom body classes
 */
function cabinet_mart_body_classes($classes) {
    // Add class for pages with a sidebar
    if (is_active_sidebar('sidebar-1') && !is_front_page()) {
        $classes[] = 'has-sidebar';
    }
    
    return $classes;
}
add_filter('body_class', 'cabinet_mart_body_classes');

/**
 * Modify excerpt length
 */
function cabinet_mart_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'cabinet_mart_excerpt_length');

/**
 * Modify excerpt more string
 */
function cabinet_mart_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'cabinet_mart_excerpt_more');

/**
 * Custom template tags for this theme.
 */
function cabinet_mart_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
        </div>
        <?php
    else :
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto transition-all hover:opacity-75']); ?>
        </a>
        <?php
    endif;
}

/**
 * Create custom page templates programmatically when theme is activated
 */
function cabinet_mart_create_page_templates() {
    $page_templates = array(
        'About Us' => 'template-about.php',
        'Contact Us' => 'template-contact.php',
        'Product Catalog' => 'template-catalog.php',
        'FAQ' => 'template-faq.php',
        'Warranty' => 'template-warranty.php',
        'Shipping Policy' => 'template-shipping.php',
        'Returns Policy' => 'template-returns.php',
        'Terms and Conditions' => 'template-terms.php',
        'Privacy Policy' => 'template-privacy.php'
    );
    
    foreach ($page_templates as $title => $template) {
        // Check if page with this title already exists
        $page = get_page_by_title($title);
        
        if (!$page) {
            // Create the page
            $page_id = wp_insert_post(array(
                'post_title'    => $title,
                'post_content'  => '',
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'page_template' => $template,
            ));
            
            if ($page_id && !is_wp_error($page_id)) {
                // Add the template name as meta
                update_post_meta($page_id, '_wp_page_template', $template);
            }
        }
    }
}

// Run this when theme is activated
function cabinet_mart_activation() {
    cabinet_mart_create_page_templates();
}
add_action('after_switch_theme', 'cabinet_mart_activation');
