
<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300 <?php echo (is_front_page()) ? 'bg-transparent py-5 js-nav-transparent' : 'bg-white py-3 shadow-sm'; ?>">
        <div class="container mx-auto px-4 md:px-6 flex items-center justify-between">
            <div class="flex items-center">
                <?php 
                if (has_custom_logo()) :
                    the_custom_logo();
                else : 
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-serif font-medium">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Logo.svg" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="h-8">
                </a>
                <?php endif; ?>
            </div>
            
            <nav class="hidden md:flex items-center space-x-8">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => '',
                        'items_wrap'     => '%3$s',
                        'link_before'    => '',
                        'link_after'     => '',
                        'walker'         => new Walker_Nav_Menu_Custom(),
                    )
                );
                ?>
            </nav>
            
            <div class="md:hidden">
                <button 
                    class="text-foreground p-2 js-mobile-menu-toggle"
                    aria-label="Toggle menu"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" class="js-menu-icon">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div class="md:hidden bg-white shadow-lg js-mobile-menu hidden">
            <div class="container mx-auto px-4 py-4">
                <nav class="flex flex-col space-y-4">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'mobile-menu',
                            'container'      => false,
                            'menu_class'     => 'mobile-menu',
                            'items_wrap'     => '%3$s',
                            'link_before'    => '',
                            'link_after'     => '',
                            'walker'         => new Walker_Nav_Menu_Mobile(),
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>
