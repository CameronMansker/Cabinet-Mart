
<?php
/**
 * Template Name: Contact Page
 */

get_header();
?>

<main id="primary" class="site-main pt-32">
    <section class="py-12 md:py-16 bg-secondary">
        <div class="container px-4 md:px-6">
            <h1 class="text-3xl md:text-4xl font-serif font-medium text-center mb-4">Contact Us</h1>
            <?php if ($contact_intro = get_field('contact_intro')) : ?>
            <p class="text-center text-muted-foreground max-w-2xl mx-auto"><?php echo esc_html($contact_intro); ?></p>
            <?php else : ?>
            <p class="text-center text-muted-foreground max-w-2xl mx-auto">We'd love to hear from you. Fill out the form below or use our contact information to get in touch with us.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="container px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 md:gap-20">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-serif font-medium mb-6">Send Us a Message</h2>
                    
                    <?php 
                    // Contact Form 7 integration
                    if (shortcode_exists('contact-form-7')) :
                        $contact_form_id = get_field('contact_form_id');
                        if ($contact_form_id) :
                            echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]');
                        else :
                            echo '<p>Please add a Contact Form 7 ID in the page settings.</p>';
                        endif;
                    else :
                    ?>
                    <form id="contact-form" class="space-y-6">
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium leading-none">Your Name</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Enter your full name"
                                required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            />
                        </div>
                        
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium leading-none">Email Address</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="Enter your email"
                                required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            />
                        </div>
                        
                        <div class="space-y-2">
                            <label for="phone" class="block text-sm font-medium leading-none">Phone Number</label>
                            <input
                                id="phone"
                                name="phone"
                                type="tel"
                                placeholder="Enter your phone number"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            />
                        </div>
                        
                        <div class="space-y-2">
                            <label for="message" class="block text-sm font-medium leading-none">Message</label>
                            <textarea
                                id="message"
                                name="message"
                                placeholder="How can we help you?"
                                rows="5"
                                required
                                class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"
                            ></textarea>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="subscribe" name="subscribe" class="h-4 w-4 text-copper" />
                            <label for="subscribe" class="text-sm font-normal cursor-pointer">
                                Subscribe to our newsletter for design inspiration and updates
                            </label>
                        </div>
                        
                        <button 
                            type="submit" 
                            class="bg-copper hover:bg-copper-dark text-white px-6 py-2 rounded-md"
                        >
                            Send Message
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h2 class="text-2xl md:text-3xl font-serif font-medium mb-6">Business Information</h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-copper flex-shrink-0 mt-0.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <div>
                                <h3 class="font-medium text-lg">Address</h3>
                                <p class="text-muted-foreground">
                                    <?php if ($address = get_field('address')) : ?>
                                        <?php echo nl2br(esc_html($address)); ?>
                                    <?php else : ?>
                                        2010 East Blaine<br />
                                        Springfield, MO 65803<br />
                                        United States
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-copper flex-shrink-0 mt-0.5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <div>
                                <h3 class="font-medium text-lg">Phone</h3>
                                <p class="text-muted-foreground">
                                    <?php if ($phone = get_field('phone')) : ?>
                                        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="hover:text-copper transition-colors">
                                            <?php echo esc_html($phone); ?>
                                        </a>
                                    <?php else : ?>
                                        <a href="tel:+14175551234" class="hover:text-copper transition-colors">
                                            (417) 555-1234
                                        </a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-copper flex-shrink-0 mt-0.5">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <div>
                                <h3 class="font-medium text-lg">Email</h3>
                                <p class="text-muted-foreground">
                                    <?php if ($email = get_field('email')) : ?>
                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:text-copper transition-colors">
                                            <?php echo esc_html($email); ?>
                                        </a>
                                    <?php else : ?>
                                        <a href="mailto:info@example.com" class="hover:text-copper transition-colors">
                                            info@example.com
                                        </a>
                                    <?php endif; ?>
                                    <br />
                                    <?php if ($support_email = get_field('support_email')) : ?>
                                        <a href="mailto:<?php echo esc_attr($support_email); ?>" class="hover:text-copper transition-colors">
                                            <?php echo esc_html($support_email); ?>
                                        </a>
                                    <?php else : ?>
                                        <a href="mailto:support@example.com" class="hover:text-copper transition-colors">
                                            support@example.com
                                        </a>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-copper flex-shrink-0 mt-0.5">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <div>
                                <h3 class="font-medium text-lg">Business Hours</h3>
                                <p class="text-muted-foreground">
                                    <?php if ($business_hours = get_field('business_hours')) : ?>
                                        <?php echo nl2br(esc_html($business_hours)); ?>
                                    <?php else : ?>
                                        <span class="block">Monday - Friday: 8:00 AM - 4:30 PM</span>
                                        <span class="block">Saturday & Sunday: Closed</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        
                        <?php if ($social_media = get_field('social_media')) : ?>
                        <div class="pt-6 border-t border-border">
                            <h3 class="font-medium text-lg mb-3">Connect With Us</h3>
                            <div class="flex space-x-2">
                                <?php foreach ($social_media as $platform) : ?>
                                    <a href="<?php echo esc_url($platform['url']); ?>" class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors" aria-label="<?php echo esc_attr($platform['platform']); ?>" target="_blank" rel="noopener">
                                        <?php echo $platform['icon']; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php else : ?>
                        <div class="pt-6 border-t border-border">
                            <h3 class="font-medium text-lg mb-3">Connect With Us</h3>
                            <div class="flex">
                                <a href="https://facebook.com" class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors" aria-label="Facebook" target="_blank" rel="noopener">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="h-[400px] w-full bg-gray-200 relative">
        <?php if ($map_embed = get_field('map_embed')) : ?>
            <?php echo $map_embed; ?>
        <?php else : ?>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.6818546591506!2d-93.25813612392757!3d37.16947224708982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87cf62c8066cd20f%3A0xf54b8a269263a7c6!2s2010%20E%20Blaine%20St%2C%20Springfield%2C%20MO%2065803%2C%20USA!5e0!3m2!1sen!2s!4v1718218542980!5m2!1sen!2s"
            width="100%"
            height="100%"
            style="border: 0"
            allowFullScreen
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
            title="Location Map"
        ></iframe>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
