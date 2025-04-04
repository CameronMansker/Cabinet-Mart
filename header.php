
<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300 <?php echo (is_front_page()) ? 'bg-transparent py-5' : 'bg-white/90 backdrop-blur-sm shadow-sm py-3'; ?>" id="site-header">
    <div class="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <div class="flex items-center">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-serif font-medium">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="<?php bloginfo('name'); ?>" class="h-8">
                </a>
            <?php endif; ?>
        </div>
        
        <nav class="hidden md:flex items-center space-x-8">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'fallback_cb' => false,
                'items_wrap' => '%3$s',
                'depth' => 1,
                'walker' => new Walker_Nav_Menu_Custom(),
            ));
            ?>
        </nav>
        
        <div class="md:hidden">
            <button 
                class="text-foreground p-2"
                id="mobile-menu-toggle"
                aria-label="Toggle menu"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="md:hidden bg-white shadow-lg hidden" id="mobile-menu">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex flex-col space-y-4">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'mobile-menu',
                    'fallback_cb' => false,
                    'items_wrap' => '%3$s',
                    'depth' => 1,
                    'walker' => new Walker_Nav_Menu_Mobile(),
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<?php
/**
 * Custom menu walkers for styling the menu items
 */
class Walker_Nav_Menu_Custom extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="nav-link">' . $item->title . '</a>';
    }
}

class Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="py-2 border-b border-gray-100" onclick="closeMenu()">' . $item->title . '</a>';
    }
}
?>
