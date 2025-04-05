
<?php
/**
 * Template Name: Home Page
 * Description: The template for displaying the homepage
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center bg-cover bg-center" style="background-image: url('<?php echo wp_get_attachment_image_url(get_theme_mod('homepage_hero_image', ''), 'full') ?: get_template_directory_uri() . '/assets/images/hero.png'; ?>');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="container px-4 md:px-6 z-10">
            <div class="max-w-2xl text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-medium mb-4 drop-shadow-md">
                    <?php echo esc_html(get_theme_mod('homepage_hero_heading', 'Beautiful Custom Cabinets For Your Home')); ?>
                </h1>
                <p class="text-lg md:text-xl mb-8 drop-shadow-md">
                    <?php echo esc_html(get_theme_mod('homepage_hero_text', 'Premium craftsmanship and attention to detail for kitchens, bathrooms, and more.')); ?>
                </p>
                <a href="<?php echo esc_url(get_theme_mod('homepage_hero_button_url', '#gallery')); ?>" class="bg-copper hover:bg-copper-dark text-white px-8 py-3 text-lg font-medium transition-colors duration-300 inline-block">
                    <?php echo esc_html(get_theme_mod('homepage_hero_button_text', 'View Our Work')); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-16 md:py-24 bg-background">
        <div class="container px-4 md:px-6">
            <div class="max-w-3xl mx-auto text-center">
                <?php
                // Get intro content from page content
                the_content();
                ?>
                
                <?php if (have_rows('quality_indicators')) : ?>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-16">
                        <?php while (have_rows('quality_indicators')) : the_row(); ?>
                            <div class="text-center">
                                <div class="feature-number"></div>
                                <h3 class="text-3xl md:text-4xl font-serif font-medium"><?php the_sub_field('number'); ?></h3>
                                <p class="text-muted-foreground"><?php the_sub_field('label'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Feature Sections -->
    <?php if (have_rows('feature_sections')) : ?>
        <?php $count = 0; while (have_rows('feature_sections')) : the_row(); $count++; ?>
            <section id="<?php the_sub_field('section_id'); ?>" class="py-16 md:py-24 <?php echo ($count % 2 == 0) ? 'bg-secondary' : ''; ?>">
                <div class="container px-4 md:px-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center <?php echo ($count % 2 == 0) ? 'md:flex-row-reverse' : ''; ?>">
                        <div class="<?php echo ($count % 2 == 0) ? 'md:order-2' : ''; ?>">
                            <h2 class="text-3xl md:text-4xl font-serif font-medium mb-3"><?php the_sub_field('title'); ?></h2>
                            <p class="text-muted-foreground text-lg mb-6"><?php the_sub_field('subtitle'); ?></p>
                            <?php if (get_sub_field('button_text') && get_sub_field('button_link')) : ?>
                                <a href="<?php the_sub_field('button_link'); ?>" class="copper-btn">
                                    <?php the_sub_field('button_text'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="<?php echo ($count % 2 == 0) ? 'md:order-1' : ''; ?>">
                            <div class="aspect-square overflow-hidden rounded-lg image-container">
                                <?php 
                                $image = get_sub_field('image');
                                if ($image) :
                                    echo wp_get_attachment_image($image, 'large', false, ['class' => 'w-full h-full object-cover']);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; ?>
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
