
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 */
(function($) {
    // Site title and description
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title').text(to);
        });
    });
    
    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    // Company Information
    wp.customize('company_address', function(value) {
        value.bind(function(to) {
            $('.company-address').text(to);
        });
    });
    
    wp.customize('company_phone', function(value) {
        value.bind(function(to) {
            $('.company-phone').text(to);
            $('.company-phone-link').attr('href', 'tel:' + to);
        });
    });
    
    wp.customize('company_email', function(value) {
        value.bind(function(to) {
            $('.company-email').text(to);
            $('.company-email-link').attr('href', 'mailto:' + to);
        });
    });

    // Social Media Links
    wp.customize('social_facebook', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.social-facebook').show().attr('href', to);
            } else {
                $('.social-facebook').hide();
            }
        });
    });
    
    wp.customize('social_instagram', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.social-instagram').show().attr('href', to);
            } else {
                $('.social-instagram').hide();
            }
        });
    });
    
    wp.customize('social_pinterest', function(value) {
        value.bind(function(to) {
            if (to) {
                $('.social-pinterest').show().attr('href', to);
            } else {
                $('.social-pinterest').hide();
            }
        });
    });

    // Footer Text
    wp.customize('footer_about_text', function(value) {
        value.bind(function(to) {
            $('.footer-about-text').text(to);
        });
    });

    // Homepage Options
    wp.customize('homepage_hero_heading', function(value) {
        value.bind(function(to) {
            $('.hero-heading').text(to);
        });
    });
    
    wp.customize('homepage_hero_text', function(value) {
        value.bind(function(to) {
            $('.hero-text').text(to);
        });
    });
    
    wp.customize('homepage_hero_button_text', function(value) {
        value.bind(function(to) {
            $('.hero-button').text(to);
        });
    });
    
    wp.customize('homepage_hero_button_url', function(value) {
        value.bind(function(to) {
            $('.hero-button').attr('href', to);
        });
    });
})(jQuery);
