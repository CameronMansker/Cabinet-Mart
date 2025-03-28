
<footer class="bg-[#f5f5f5] pt-16 pb-8">
    <div class="container px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
            <!-- Navigation Links -->
            <div>
                <h3 class="text-sm font-medium mb-4 tracking-wider">NAVIGATION</h3>
                <ul class="space-y-2">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_nav',
                        'menu_class' => '',
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'walker' => new Footer_Nav_Walker(),
                    ));
                    ?>
                </ul>
            </div>
            
            <!-- Support Links -->
            <div>
                <h3 class="text-sm font-medium mb-4 tracking-wider">SUPPORT</h3>
                <ul class="space-y-2">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_support',
                        'menu_class' => '',
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'walker' => new Footer_Nav_Walker(),
                    ));
                    ?>
                </ul>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h3 class="text-sm font-medium mb-4 tracking-wider">CONTACT US</h3>
                <ul class="space-y-3">
                    <?php if($business_email = get_field('business_email', 'option')): ?>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 mt-1 mr-2 text-copper" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <div>
                            <p class="text-sm text-muted-foreground">Business Email:</p>
                            <a href="mailto:<?php echo esc_attr($business_email); ?>" class="text-sm hover:text-copper transition-colors duration-200">
                                <?php echo esc_html($business_email); ?>
                            </a>
                        </div>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($support_email = get_field('support_email', 'option')): ?>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 mt-1 mr-2 text-copper" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <div>
                            <p class="text-sm text-muted-foreground">Support Email:</p>
                            <a href="mailto:<?php echo esc_attr($support_email); ?>" class="text-sm hover:text-copper transition-colors duration-200">
                                <?php echo esc_html($support_email); ?>
                            </a>
                        </div>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($phone = get_field('phone', 'option')): ?>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 mt-1 mr-2 text-copper" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <div>
                            <p class="text-sm text-muted-foreground">Phone:</p>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="text-sm hover:text-copper transition-colors duration-200">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </div>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($hours = get_field('business_hours', 'option')): ?>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 mt-1 mr-2 text-copper" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <div>
                            <p class="text-sm text-muted-foreground">Hours:</p>
                            <p class="text-sm"><?php echo esc_html($hours); ?></p>
                        </div>
                    </li>
                    <?php endif; ?>
                    
                    <?php if($address = get_field('address', 'option')): ?>
                    <li class="flex items-start">
                        <svg class="w-4 h-4 mt-1 mr-2 text-copper" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <div>
                            <p class="text-sm text-muted-foreground">Address:</p>
                            <p class="text-sm"><?php echo esc_html($address); ?></p>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
          
        <div class="text-center text-sm text-muted-foreground">
            <p class="mb-2">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p>
                <a href="<?php echo get_permalink(get_page_by_path('terms')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Terms</a>
                <a href="<?php echo get_permalink(get_page_by_path('privacy')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Privacy</a>
                <a href="<?php echo get_permalink(get_page_by_path('cookie-policy')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Cookies</a>
            </p>
        </div>
    </div>
</footer>

<?php
// Custom nav walker for footer menus
class Footer_Nav_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li><a href="' . $item->url . '" class="text-muted-foreground text-sm hover:text-copper transition-colors duration-200">' . $item->title . '</a></li>';
    }
}

wp_footer(); 
?>
</body>
</html>
