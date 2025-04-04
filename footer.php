
<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="bg-secondary py-16">
    <div class="container px-4 md:px-6 mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo & About -->
            <div>
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo mb-4"><?php the_custom_logo(); ?></div>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-serif font-medium mb-4 inline-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo.svg" alt="<?php bloginfo('name'); ?>" class="h-8">
                    </a>
                <?php endif; ?>
                
                <p class="text-muted-foreground mt-4">
                    <?php echo get_theme_mod('footer_about_text', 'Crafting premium cabinetry with attention to detail and a focus on quality since 1994.'); ?>
                </p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-serif mb-4 font-medium">Quick Links</h3>
                <nav>
                    <ul class="space-y-2">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => false,
                            'items_wrap' => '%3$s',
                            'depth' => 1,
                            'walker' => new Walker_Nav_Menu_Footer(),
                        ));
                        ?>
                    </ul>
                </nav>
            </div>
            
            <!-- Policy Links -->
            <div>
                <h3 class="text-lg font-serif mb-4 font-medium">Policies</h3>
                <ul class="space-y-2">
                    <li><a href="<?php echo esc_url(home_url('/warranty')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">Warranty</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shipping')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">Shipping</a></li>
                    <li><a href="<?php echo esc_url(home_url('/returns')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">Returns</a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">FAQ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">Terms & Conditions</a></li>
                    <li><a href="<?php echo esc_url(home_url('/privacy')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">Privacy Policy</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="text-lg font-serif mb-4 font-medium">Contact Us</h3>
                <address class="not-italic">
                    <p class="mb-2">
                        <?php echo get_theme_mod('company_address', '123 Cabinet Lane, Woodwork City, MO 65432'); ?>
                    </p>
                    <p class="mb-2">
                        <a href="tel:<?php echo get_theme_mod('company_phone', '555-123-4567'); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">
                            <?php echo get_theme_mod('company_phone', '555-123-4567'); ?>
                        </a>
                    </p>
                    <p>
                        <a href="mailto:<?php echo get_theme_mod('company_email', 'info@example.com'); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300">
                            <?php echo get_theme_mod('company_email', 'info@example.com'); ?>
                        </a>
                    </p>
                </address>
                
                <div class="mt-4 flex space-x-4">
                    <?php if (get_theme_mod('social_facebook')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300" aria-label="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('social_instagram')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300" aria-label="Instagram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </a>
                    <?php endif; ?>
                    
                    <?php if (get_theme_mod('social_pinterest')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('social_pinterest')); ?>" class="text-muted-foreground hover:text-foreground transition-colors duration-300" aria-label="Pinterest">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0z"></path>
                                <path d="M12 2v2"></path>
                                <path d="M12 20v2"></path>
                                <path d="m4.93 4.93 1.41 1.41"></path>
                                <path d="m17.66 17.66 1.41 1.41"></path>
                                <path d="M2 12h2"></path>
                                <path d="M20 12h2"></path>
                                <path d="m6.34 17.66-1.41 1.41"></path>
                                <path d="m19.07 4.93-1.41 1.41"></path>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="mt-16 pt-8 border-t border-border text-center text-sm text-muted-foreground">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p class="mt-1">
                Website by <a href="#" class="text-foreground hover:underline">Your Agency</a>
            </p>
        </div>
    </div>
</footer>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
                } else {
                    mobileMenu.classList.add('hidden');
                    menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
                }
            });
        }
        
        // Header scroll effect
        const header = document.getElementById('site-header');
        if (header) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.classList.remove('bg-transparent', 'py-5');
                    header.classList.add('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
                } else if (document.body.classList.contains('home')) {
                    header.classList.add('bg-transparent', 'py-5');
                    header.classList.remove('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
                }
            });
        }
    });
    
    // Function to close mobile menu
    function closeMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuToggle = document.getElementById('mobile-menu-toggle');
        
        if (mobileMenu && menuToggle) {
            mobileMenu.classList.add('hidden');
            menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
        }
    }
</script>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Custom walker for footer menu
 */
class Walker_Nav_Menu_Footer extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= '<li><a href="' . esc_url($item->url) . '" class="text-muted-foreground hover:text-foreground transition-colors duration-300">' . $item->title . '</a></li>';
    }
}
?>
