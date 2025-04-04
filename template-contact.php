
<?php
/**
 * Template Name: Contact Page
 * Description: Template for the Contact page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Page Header -->
    <div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
        <div class="container px-4 md:px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4"><?php the_title(); ?></h1>
            <?php if (get_the_excerpt()) : ?>
                <p class="text-muted-foreground text-lg max-w-2xl">
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php else : ?>
                <p class="text-muted-foreground text-lg max-w-2xl">
                    We'd love to hear from you. Reach out with any questions about our products, services, or to schedule a consultation.
                </p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="container px-4 md:px-6 py-16">
        <!-- Contact Information -->
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- Phone -->
                <div class="text-center p-6 bg-secondary rounded-lg">
                    <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center bg-copper rounded-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-serif font-medium mb-2">Call Us</h3>
                    <p class="text-muted-foreground mb-2">We're available Mon-Fri, 9am-5pm</p>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '555-123-4567')); ?>" class="text-copper hover:underline transition-colors">
                        <?php echo esc_html(get_theme_mod('company_phone', '555-123-4567')); ?>
                    </a>
                </div>
                
                <!-- Email -->
                <div class="text-center p-6 bg-secondary rounded-lg">
                    <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center bg-copper rounded-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </div>
                    <h3 class="text-lg font-serif font-medium mb-2">Email Us</h3>
                    <p class="text-muted-foreground mb-2">We'll respond within 24 hours</p>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@example.com')); ?>" class="text-copper hover:underline transition-colors">
                        <?php echo esc_html(get_theme_mod('company_email', 'info@example.com')); ?>
                    </a>
                </div>
                
                <!-- Visit -->
                <div class="text-center p-6 bg-secondary rounded-lg">
                    <div class="w-12 h-12 mx-auto mb-4 flex items-center justify-center bg-copper rounded-full text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="text-lg font-serif font-medium mb-2">Visit Us</h3>
                    <p class="text-muted-foreground mb-2">Our showroom is open by appointment</p>
                    <address class="not-italic text-copper">
                        <?php echo esc_html(get_theme_mod('company_address', '123 Cabinet Lane, Woodwork City, MO 65432')); ?>
                    </address>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="mt-12">
                <h2 class="text-2xl md:text-3xl font-serif font-medium mb-8 text-center">Send Us a Message</h2>
                
                <?php if (get_field('contact_form_shortcode')) : ?>
                    <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
                <?php else : ?>
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
                        <form action="#" method="post" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-muted-foreground mb-1">Your Name</label>
                                    <input type="text" name="name" id="name" required class="w-full p-3 border border-border rounded-md focus:ring-2 focus:ring-copper focus:border-transparent outline-none transition">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-muted-foreground mb-1">Your Email</label>
                                    <input type="email" name="email" id="email" required class="w-full p-3 border border-border rounded-md focus:ring-2 focus:ring-copper focus:border-transparent outline-none transition">
                                </div>
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-muted-foreground mb-1">Subject</label>
                                <input type="text" name="subject" id="subject" class="w-full p-3 border border-border rounded-md focus:ring-2 focus:ring-copper focus:border-transparent outline-none transition">
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-muted-foreground mb-1">Message</label>
                                <textarea name="message" id="message" rows="5" required class="w-full p-3 border border-border rounded-md focus:ring-2 focus:ring-copper focus:border-transparent outline-none transition resize-none"></textarea>
                            </div>
                            
                            <div>
                                <button type="submit" class="copper-btn w-full md:w-auto py-3">Send Message</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
                
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    
    <!-- Map Section -->
    <div class="bg-secondary py-16">
        <div class="container px-4 md:px-6">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <?php if (get_field('map_embed_code')) : ?>
                    <div class="aspect-video w-full">
                        <?php echo get_field('map_embed_code'); ?>
                    </div>
                <?php else : ?>
                    <div class="aspect-video w-full">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.6685595856957!2d-94.5798789!3d38.9721809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87c0e2b9b32b5863%3A0x47e3e4ce72331763!2sKansas%20City%2C%20MO%2064111!5e0!3m2!1sen!2sus!4v1638771996146!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
