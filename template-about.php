
<?php
/**
 * Template Name: About Page
 * Description: Template for the About page
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
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Mission Section -->
    <section class="py-16 md:py-24">
        <div class="container px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="section-title">Our Mission</h2>
                    <?php if (get_field('mission_content')) : ?>
                        <?php the_field('mission_content'); ?>
                    <?php else : ?>
                        <?php the_content(); ?>
                    <?php endif; ?>
                </div>
                <div class="relative">
                    <?php 
                    $mission_image = get_field('mission_image');
                    if ($mission_image) :
                    ?>
                        <div class="aspect-square overflow-hidden rounded-lg">
                            <?php echo wp_get_attachment_image($mission_image, 'large', false, ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php elseif (has_post_thumbnail()) : ?>
                        <div class="aspect-square overflow-hidden rounded-lg">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php else : ?>
                        <div class="aspect-square overflow-hidden rounded-lg">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/wood-samples.jpg" alt="Handcrafted wooden cabinet detail" class="w-full h-full object-cover">
                        </div>
                    <?php endif; ?>
                    
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-copper rounded-full flex items-center justify-center">
                        <span class="text-white font-serif text-lg">
                            <?php echo esc_html(get_field('established_year', 'option') ?: 'Since 1994'); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Team Section -->
    <?php
    $team_members = new WP_Query([
        'post_type' => 'team_member',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    ]);
    
    if ($team_members->have_posts()) :
    ?>
        <section class="py-16 md:py-24 bg-secondary">
            <div class="container px-4 md:px-6">
                <h2 class="section-title text-center mb-16">Meet Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php while ($team_members->have_posts()) : $team_members->the_post(); ?>
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 text-center">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="w-32 h-32 rounded-full overflow-hidden mx-auto mb-4">
                                    <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="text-xl font-serif font-medium"><?php the_title(); ?></h3>
                            <?php if (get_field('role')) : ?>
                                <p class="text-copper mb-3"><?php the_field('role'); ?></p>
                            <?php endif; ?>
                            <div class="text-muted-foreground">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <!-- Testimonials Section -->
    <?php
    $testimonials = new WP_Query([
        'post_type' => 'testimonial',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'date'
    ]);
    
    if ($testimonials->have_posts()) :
    ?>
        <section class="py-16 md:py-24">
            <div class="container px-4 md:px-6">
                <h2 class="section-title text-center mb-16">What Our Clients Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                            <div class="mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-copper">
                                    <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
                                    <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path>
                                </svg>
                            </div>
                            
                            <blockquote class="mb-6">
                                <p class="text-foreground italic">
                                    <?php the_content(); ?>
                                </p>
                            </blockquote>
                            
                            <div class="flex items-center">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="w-12 h-12 rounded-full overflow-hidden mr-3">
                                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-full h-full object-cover']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div>
                                    <cite class="font-serif font-medium not-italic">
                                        <?php the_title(); ?>
                                    </cite>
                                    <?php if (get_field('location')) : ?>
                                        <p class="text-sm text-muted-foreground">
                                            <?php the_field('location'); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <!-- Call to Action -->
    <section class="py-16 bg-copper text-white">
        <div class="container px-4 md:px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-medium mb-6">Ready to Transform Your Space?</h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto">
                Whether you're renovating your kitchen or building a new home, our team is ready to bring your vision to life.
            </p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="bg-white text-copper hover:bg-gray-100 px-8 py-3 text-lg font-medium transition-colors duration-300">
                Contact Us Today
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
?>
