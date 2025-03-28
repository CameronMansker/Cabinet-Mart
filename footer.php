
<?php
/**
 * The template for displaying the footer
 */
?>

    <footer class="bg-[#f5f5f5] pt-16 pb-8">
      <div class="container px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
          <?php if (has_nav_menu('footer-1')) : ?>
          <div>
            <h3 class="text-sm font-medium mb-4 tracking-wider"><?php echo wp_get_nav_menu_name('footer-1'); ?></h3>
            <ul class="space-y-2">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'footer-1',
                  'menu_id'        => 'footer-menu-1',
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'link_before'    => '',
                  'link_after'     => '',
                  'walker'         => new Walker_Nav_Menu_Footer(),
                )
              );
              ?>
            </ul>
          </div>
          <?php endif; ?>
          
          <?php if (has_nav_menu('footer-2')) : ?>
          <div>
            <h3 class="text-sm font-medium mb-4 tracking-wider"><?php echo wp_get_nav_menu_name('footer-2'); ?></h3>
            <ul class="space-y-2">
              <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'footer-2',
                  'menu_id'        => 'footer-menu-2',
                  'container'      => false,
                  'items_wrap'     => '%3$s',
                  'link_before'    => '',
                  'link_after'     => '',
                  'walker'         => new Walker_Nav_Menu_Footer(),
                )
              );
              ?>
            </ul>
          </div>
          <?php endif; ?>
          
          <?php if (is_active_sidebar('footer-contact')) : ?>
            <?php dynamic_sidebar('footer-contact'); ?>
          <?php else : ?>
          <div>
            <h3 class="text-sm font-medium mb-4 tracking-wider">CONTACT US</h3>
            <ul class="space-y-3">
              <li class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 mr-2 text-copper"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                <div>
                  <p class="text-sm text-muted-foreground">Phone:</p>
                  <a href="tel:+15551234567" class="text-sm hover:text-copper transition-colors duration-200">
                    (555) 123-4567
                  </a>
                </div>
              </li>
              <li class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 mr-2 text-copper"><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path><line x1="16" y1="8" x2="20" y2="4"></line><line x1="16" y1="4" x2="20" y2="4"></line><line x1="20" y1="4" x2="20" y2="8"></line></svg>
                <div>
                  <p class="text-sm text-muted-foreground">Email:</p>
                  <a href="mailto:info@example.com" class="text-sm hover:text-copper transition-colors duration-200">
                    info@example.com
                  </a>
                </div>
              </li>
              <li class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 mr-2 text-copper"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <div>
                  <p class="text-sm text-muted-foreground">Hours:</p>
                  <p class="text-sm">Mon-Fri 9AM-5PM EST</p>
                </div>
              </li>
              <li class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mt-1 mr-2 text-copper"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <div>
                  <p class="text-sm text-muted-foreground">Address:</p>
                  <p class="text-sm">123 Business Street, City, State 12345</p>
                </div>
              </li>
            </ul>
          </div>
          <?php endif; ?>
        </div>
          
        <div class="text-center text-sm text-muted-foreground">
          <p class="mb-2">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
          <p>
            <a href="<?php echo esc_url(home_url('/terms')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Terms</a>
            <a href="<?php echo esc_url(home_url('/privacy')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Privacy</a>
            <a href="<?php echo esc_url(home_url('/cookies')); ?>" class="hover:text-copper mx-2 transition-colors duration-200">Cookies</a>
          </p>
        </div>
      </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
