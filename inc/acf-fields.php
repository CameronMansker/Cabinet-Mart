
<?php
/**
 * ACF Field Definitions
 */

if( function_exists('acf_add_local_field_group') ):

// Theme Settings Fields
acf_add_local_field_group(array(
    'key' => 'group_theme_settings',
    'title' => 'Theme Settings',
    'fields' => array(
        array(
            'key' => 'field_contact_info',
            'label' => 'Contact Information',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_business_email',
            'label' => 'Business Email',
            'name' => 'business_email',
            'type' => 'email',
            'default_value' => 'sales@example.com',
        ),
        array(
            'key' => 'field_support_email',
            'label' => 'Support Email',
            'name' => 'support_email',
            'type' => 'email',
            'default_value' => 'support@example.com',
        ),
        array(
            'key' => 'field_phone',
            'label' => 'Phone Number',
            'name' => 'phone',
            'type' => 'text',
            'default_value' => '(555) 123-4567',
        ),
        array(
            'key' => 'field_business_hours',
            'label' => 'Business Hours',
            'name' => 'business_hours',
            'type' => 'text',
            'default_value' => 'Mon-Fri 9AM-5PM EST',
        ),
        array(
            'key' => 'field_address',
            'label' => 'Address',
            'name' => 'address',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => '123 Business Street, City, State 12345',
        ),
        array(
            'key' => 'field_social_media',
            'label' => 'Social Media',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_facebook',
            'label' => 'Facebook URL',
            'name' => 'facebook_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_instagram',
            'label' => 'Instagram URL',
            'name' => 'instagram_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_twitter',
            'label' => 'Twitter URL',
            'name' => 'twitter_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_linkedin',
            'label' => 'LinkedIn URL',
            'name' => 'linkedin_url',
            'type' => 'url',
        ),
        array(
            'key' => 'field_youtube',
            'label' => 'YouTube URL',
            'name' => 'youtube_url',
            'type' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-settings',
            ),
        ),
    ),
));

// Home Page Fields
acf_add_local_field_group(array(
    'key' => 'group_home_page',
    'title' => 'Home Page Settings',
    'fields' => array(
        array(
            'key' => 'field_hero_section',
            'label' => 'Hero Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_hero_background',
            'label' => 'Background Image',
            'name' => 'hero_background',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'instructions' => 'Recommended size: 1920x1080px',
        ),
        array(
            'key' => 'field_hero_heading',
            'label' => 'Heading',
            'name' => 'hero_heading',
            'type' => 'text',
            'default_value' => 'Custom Cabinetry Crafted With Excellence',
        ),
        array(
            'key' => 'field_hero_description',
            'label' => 'Description',
            'name' => 'hero_description',
            'type' => 'textarea',
            'rows' => 3,
            'default_value' => 'Premium quality cabinets designed and built specifically for your home.',
        ),
        array(
            'key' => 'field_hero_button_text',
            'label' => 'Button Text',
            'name' => 'hero_button_text',
            'type' => 'text',
            'default_value' => 'Get Started',
        ),
        array(
            'key' => 'field_hero_button_link',
            'label' => 'Button Link',
            'name' => 'hero_button_link',
            'type' => 'page_link',
        ),
        array(
            'key' => 'field_hero_scroll_text',
            'label' => 'Scroll Text',
            'name' => 'hero_scroll_text',
            'type' => 'text',
            'default_value' => 'Scroll Down',
        ),
        array(
            'key' => 'field_intro_section',
            'label' => 'Intro Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_intro_title',
            'label' => 'Title',
            'name' => 'intro_title',
            'type' => 'text',
            'default_value' => 'Crafting Exceptional Cabinets Since 1994',
        ),
        array(
            'key' => 'field_intro_subtitle',
            'label' => 'Subtitle',
            'name' => 'intro_subtitle',
            'type' => 'text',
            'default_value' => 'Blending traditional craftsmanship with modern design',
        ),
        array(
            'key' => 'field_intro_description',
            'label' => 'Description',
            'name' => 'intro_description',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_feature_sections',
            'label' => 'Feature Sections',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_feature_sections_repeater',
            'label' => 'Feature Sections',
            'name' => 'feature_sections',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Feature Section',
            'sub_fields' => array(
                array(
                    'key' => 'field_feature_section_id',
                    'label' => 'Section ID',
                    'name' => 'section_id',
                    'type' => 'text',
                    'instructions' => 'For anchor links (no spaces or special characters)',
                ),
                array(
                    'key' => 'field_feature_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_subtitle',
                    'label' => 'Subtitle',
                    'name' => 'subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_button_text',
                    'label' => 'Button Text',
                    'name' => 'button_text',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_feature_button_link',
                    'label' => 'Button Link',
                    'name' => 'button_link',
                    'type' => 'page_link',
                ),
                array(
                    'key' => 'field_feature_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_feature_reverse',
                    'label' => 'Reverse Layout',
                    'name' => 'reverse_layout',
                    'type' => 'true_false',
                    'ui' => 1,
                ),
            ),
        ),
        array(
            'key' => 'field_quality_section',
            'label' => 'Quality Indicators',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_quality_title',
            'label' => 'Section Title',
            'name' => 'quality_title',
            'type' => 'text',
            'default_value' => 'Providing the final touch.',
        ),
        array(
            'key' => 'field_quality_description',
            'label' => 'Section Description',
            'name' => 'quality_description',
            'type' => 'textarea',
            'rows' => 3,
            'default_value' => 'Our design-first focus means that your vision becomes reality. We prioritize quality materials, master craftsmenship, and exceptional service to deliver home furniture that last.',
        ),
        array(
            'key' => 'field_quality_points_repeater',
            'label' => 'Quality Points',
            'name' => 'quality_points',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Add Quality Point',
            'sub_fields' => array(
                array(
                    'key' => 'field_quality_point_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_point_subtitle',
                    'label' => 'Subtitle',
                    'name' => 'subtitle',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_quality_point_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
            ),
        ),
        array(
            'key' => 'field_quality_button_text',
            'label' => 'Button Text',
            'name' => 'quality_button_text',
            'type' => 'text',
            'default_value' => 'View all features',
        ),
        array(
            'key' => 'field_quality_button_link',
            'label' => 'Button Link',
            'name' => 'quality_button_link',
            'type' => 'page_link',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'front-page.php',
            ),
        ),
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

// About Page Fields
acf_add_local_field_group(array(
    'key' => 'group_about_page',
    'title' => 'About Page Settings',
    'fields' => array(
        array(
            'key' => 'field_about_general',
            'label' => 'General',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_page_subtitle',
            'label' => 'Page Subtitle',
            'name' => 'page_subtitle',
            'type' => 'text',
            'default_value' => 'Discover the passion, craftsmanship, and dedication behind Cabinet Mart\'s journey to becoming a leading cabinet maker.',
        ),
        array(
            'key' => 'field_mission_section',
            'label' => 'Mission Section',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_mission_title',
            'label' => 'Section Title',
            'name' => 'mission_title',
            'type' => 'text',
            'default_value' => 'Our Mission',
        ),
        array(
            'key' => 'field_mission_content',
            'label' => 'Content',
            'name' => 'mission_content',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
        ),
        array(
            'key' => 'field_mission_image',
            'label' => 'Image',
            'name' => 'mission_image',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size' => 'medium',
        ),
        array(
            'key' => 'field_year_established',
            'label' => 'Year Established',
            'name' => 'year_established',
            'type' => 'text',
            'default_value' => '1994',
        ),
        array(
            'key' => 'field_testimonials_section',
            'label' => 'Testimonials',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_testimonials_title',
            'label' => 'Section Title',
            'name' => 'testimonials_title',
            'type' => 'text',
            'default_value' => 'What Our Clients Say',
        ),
        array(
            'key' => 'field_testimonials_repeater',
            'label' => 'Testimonials',
            'name' => 'testimonials',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Testimonial',
            'sub_fields' => array(
                array(
                    'key' => 'field_testimonial_quote',
                    'label' => 'Quote',
                    'name' => 'quote',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_testimonial_author',
                    'label' => 'Author',
                    'name' => 'author',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_location',
                    'label' => 'Location',
                    'name' => 'location',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_image',
                    'label' => 'Author Image',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                ),
            ),
        ),
        array(
            'key' => 'field_cta_section',
            'label' => 'Call to Action',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_cta_title',
            'label' => 'CTA Title',
            'name' => 'cta_title',
            'type' => 'text',
            'default_value' => 'Ready to Transform Your Space?',
        ),
        array(
            'key' => 'field_cta_text',
            'label' => 'CTA Text',
            'name' => 'cta_text',
            'type' => 'textarea',
            'rows' => 2,
            'default_value' => 'Whether you\'re renovating your kitchen or building a new home, our team is ready to bring your vision to life.',
        ),
        array(
            'key' => 'field_cta_button_text',
            'label' => 'Button Text',
            'name' => 'cta_button_text',
            'type' => 'text',
            'default_value' => 'Contact Us Today',
        ),
        array(
            'key' => 'field_cta_button_link',
            'label' => 'Button Link',
            'name' => 'cta_button_link',
            'type' => 'page_link',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-about.php',
            ),
        ),
    ),
));

// Contact Page Fields
acf_add_local_field_group(array(
    'key' => 'group_contact_page',
    'title' => 'Contact Page Settings',
    'fields' => array(
        array(
            'key' => 'field_contact_general',
            'label' => 'General',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_contact_subtitle',
            'label' => 'Page Subtitle',
            'name' => 'contact_subtitle',
            'type' => 'text',
            'default_value' => 'We\'d love to hear from you. Reach out with any questions about our products, services, or to schedule a consultation.',
        ),
        array(
            'key' => 'field_contact_methods',
            'label' => 'Contact Methods',
            'name' => 'contact_methods',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Contact Method',
            'sub_fields' => array(
                array(
                    'key' => 'field_contact_method_icon',
                    'label' => 'Icon (SVG)',
                    'name' => 'icon',
                    'type' => 'textarea',
                    'rows' => 2,
                    'instructions' => 'Paste SVG code here',
                ),
                array(
                    'key' => 'field_contact_method_title',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_method_details',
                    'label' => 'Details',
                    'name' => 'details',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_contact_method_link',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_contact_method_link_text',
                    'label' => 'Link Text',
                    'name' => 'link_text',
                    'type' => 'text',
                ),
            ),
        ),
        array(
            'key' => 'field_contact_form',
            'label' => 'Contact Form',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_contact_form_shortcode',
            'label' => 'Contact Form Shortcode',
            'name' => 'contact_form_shortcode',
            'type' => 'text',
            'instructions' => 'Enter the Contact Form 7 shortcode here',
            'placeholder' => '[contact-form-7 id="123" title="Contact Form"]',
        ),
        array(
            'key' => 'field_map_section',
            'label' => 'Map',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_map_embed',
            'label' => 'Map Embed Code',
            'name' => 'map_embed',
            'type' => 'textarea',
            'rows' => 4,
            'instructions' => 'Paste the Google Maps or other map provider embed code here',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-contact.php',
            ),
        ),
    ),
));

// Catalog Page Fields
acf_add_local_field_group(array(
    'key' => 'group_catalog_page',
    'title' => 'Catalog Page Settings',
    'fields' => array(
        array(
            'key' => 'field_catalog_subtitle',
            'label' => 'Catalog Subtitle',
            'name' => 'catalog_subtitle',
            'type' => 'text',
            'default_value' => 'Browse through our complete catalog of premium wood products and accessories.',
        ),
        array(
            'key' => 'field_catalog_pages',
            'label' => 'Catalog Pages',
            'name' => 'catalog_pages',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Catalog Page',
            'sub_fields' => array(
                array(
                    'key' => 'field_catalog_page_image',
                    'label' => 'Catalog Image',
                    'name' => 'catalog_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'instructions' => 'Upload a catalog page image. Recommended aspect ratio is 3:4.',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'page-catalog.php',
            ),
        ),
    ),
));

endif;
