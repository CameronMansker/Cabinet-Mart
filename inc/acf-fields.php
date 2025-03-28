
<?php
/**
 * ACF Fields Configuration
 */

if (function_exists('acf_add_local_field_group')) {
    // Hero Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_background',
                'label' => 'Hero Background Image',
                'name' => 'hero_background',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size' => 'medium',
                'instructions' => 'Recommended size: 1920x1080px',
            ),
            array(
                'key' => 'field_hero_tagline',
                'label' => 'Hero Tagline',
                'name' => 'hero_tagline',
                'type' => 'text',
                'instructions' => 'Main tagline shown in the hero section',
                'default_value' => 'By Cabinet People For Cabinet People.',
            ),
            array(
                'key' => 'field_hero_text',
                'label' => 'Hero Text',
                'name' => 'hero_text',
                'type' => 'textarea',
                'instructions' => 'Descriptive text shown below the tagline',
                'rows' => 3,
                'default_value' => 'Trusted by the nation\'s best kitchen designers, contractors, and renovators. Custom finishing and staining services for all wood accessories.',
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
        ),
    ));

    // Intro Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_intro_section',
        'title' => 'Intro Section',
        'fields' => array(
            array(
                'key' => 'field_intro_text',
                'label' => 'Intro Text',
                'name' => 'intro_text',
                'type' => 'textarea',
                'instructions' => 'Short introduction text shown below the hero',
                'rows' => 3,
                'default_value' => 'Cabinet maker with 30+ years of experience in crafting handmade, solid wood kitchens. Focused on quality, craftsmanship, thoughtful design, and an innovative approach.',
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
        ),
    ));

    // Feature Sections (Repeater)
    acf_add_local_field_group(array(
        'key' => 'group_feature_sections',
        'title' => 'Feature Sections',
        'fields' => array(
            array(
                'key' => 'field_feature_sections',
                'label' => 'Feature Sections',
                'name' => 'feature_sections',
                'type' => 'repeater',
                'instructions' => 'Add feature sections to the homepage',
                'min' => 0,
                'max' => 4,
                'layout' => 'block',
                'button_label' => 'Add Feature Section',
                'sub_fields' => array(
                    array(
                        'key' => 'field_feature_title',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_feature_subtitle',
                        'label' => 'Subtitle',
                        'name' => 'subtitle',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ),
                    array(
                        'key' => 'field_feature_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'required' => 1,
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
                        'type' => 'url',
                    ),
                ),
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
        ),
    ));

    // Contact Page Fields
    acf_add_local_field_group(array(
        'key' => 'group_contact_page',
        'title' => 'Contact Page',
        'fields' => array(
            array(
                'key' => 'field_contact_intro',
                'label' => 'Contact Page Introduction',
                'name' => 'contact_intro',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_address',
                'label' => 'Address',
                'name' => 'address',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_phone',
                'label' => 'Phone',
                'name' => 'phone',
                'type' => 'text',
            ),
            array(
                'key' => 'field_email',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_support_email',
                'label' => 'Support Email',
                'name' => 'support_email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_business_hours',
                'label' => 'Business Hours',
                'name' => 'business_hours',
                'type' => 'textarea',
                'rows' => 4,
            ),
            array(
                'key' => 'field_map_embed',
                'label' => 'Map Embed Code',
                'name' => 'map_embed',
                'type' => 'textarea',
                'instructions' => 'Paste the embed code from Google Maps',
                'rows' => 4,
            ),
            array(
                'key' => 'field_contact_form_id',
                'label' => 'Contact Form 7 ID',
                'name' => 'contact_form_id',
                'type' => 'text',
                'instructions' => 'Enter the ID of the Contact Form 7 form you want to use',
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
}
