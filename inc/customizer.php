
<?php
/**
 * Cabinet Mart Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cabinet_mart_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    
    // Add logo options
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('custom_logo', array(
            'selector'        => '.site-logo',
            'render_callback' => 'cabinet_mart_customize_partial_custom_logo',
        ));
    }
    
    // Company Information Section
    $wp_customize->add_section('cabinet_mart_company_info', array(
        'title'    => __('Company Information', 'cabinet-mart'),
        'priority' => 120,
    ));
    
    $wp_customize->add_setting('company_address', array(
        'default'           => '123 Cabinet Lane, Woodwork City, MO 65432',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('company_address', array(
        'label'    => __('Address', 'cabinet-mart'),
        'section'  => 'cabinet_mart_company_info',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('company_phone', array(
        'default'           => '555-123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('company_phone', array(
        'label'    => __('Phone Number', 'cabinet-mart'),
        'section'  => 'cabinet_mart_company_info',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('company_email', array(
        'default'           => 'info@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('company_email', array(
        'label'    => __('Email Address', 'cabinet-mart'),
        'section'  => 'cabinet_mart_company_info',
        'type'     => 'email',
    ));
    
    // Social Media Section
    $wp_customize->add_section('cabinet_mart_social_media', array(
        'title'    => __('Social Media', 'cabinet-mart'),
        'priority' => 130,
    ));
    
    $wp_customize->add_setting('social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook URL', 'cabinet-mart'),
        'section'  => 'cabinet_mart_social_media',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label'    => __('Instagram URL', 'cabinet-mart'),
        'section'  => 'cabinet_mart_social_media',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('social_pinterest', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_pinterest', array(
        'label'    => __('Pinterest URL', 'cabinet-mart'),
        'section'  => 'cabinet_mart_social_media',
        'type'     => 'url',
    ));
    
    // Footer Section
    $wp_customize->add_section('cabinet_mart_footer', array(
        'title'    => __('Footer', 'cabinet-mart'),
        'priority' => 140,
    ));
    
    $wp_customize->add_setting('footer_about_text', array(
        'default'           => 'Crafting premium cabinetry with attention to detail and a focus on quality since 1994.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('footer_about_text', array(
        'label'    => __('Footer About Text', 'cabinet-mart'),
        'section'  => 'cabinet_mart_footer',
        'type'     => 'textarea',
    ));
    
    // Hero Section for Homepage
    $wp_customize->add_section('cabinet_mart_homepage', array(
        'title'    => __('Homepage Options', 'cabinet-mart'),
        'priority' => 110,
    ));
    
    $wp_customize->add_setting('homepage_hero_heading', array(
        'default'           => 'Beautiful Custom Cabinets For Your Home',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('homepage_hero_heading', array(
        'label'    => __('Hero Heading', 'cabinet-mart'),
        'section'  => 'cabinet_mart_homepage',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('homepage_hero_text', array(
        'default'           => 'Premium craftsmanship and attention to detail for kitchens, bathrooms, and more.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('homepage_hero_text', array(
        'label'    => __('Hero Text', 'cabinet-mart'),
        'section'  => 'cabinet_mart_homepage',
        'type'     => 'textarea',
    ));
    
    $wp_customize->add_setting('homepage_hero_button_text', array(
        'default'           => 'View Our Work',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('homepage_hero_button_text', array(
        'label'    => __('Hero Button Text', 'cabinet-mart'),
        'section'  => 'cabinet_mart_homepage',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('homepage_hero_button_url', array(
        'default'           => '#gallery',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('homepage_hero_button_url', array(
        'label'    => __('Hero Button URL', 'cabinet-mart'),
        'section'  => 'cabinet_mart_homepage',
        'type'     => 'url',
    ));
    
    $wp_customize->add_setting('homepage_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'homepage_hero_image', array(
        'label'     => __('Hero Background Image', 'cabinet-mart'),
        'section'   => 'cabinet_mart_homepage',
        'mime_type' => 'image',
    )));
}
add_action('customize_register', 'cabinet_mart_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cabinet_mart_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cabinet_mart_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Render the site logo for the selective refresh partial.
 *
 * @return void
 */
function cabinet_mart_customize_partial_custom_logo() {
    the_custom_logo();
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cabinet_mart_customize_preview_js() {
    wp_enqueue_script('cabinet-mart-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'cabinet_mart_customize_preview_js');
