
<?php
/**
 * Template Name: About Page
 */
get_header();
?>

<!-- Page Header -->
<div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
    <div class="container px-4 md:px-6">
        <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4"><?php the_title(); ?></h1>
        <?php if($page_subtitle = get_field('page_subtitle')): ?>
        <p class="text-muted-foreground text-lg max-w-2xl">
            <?php echo esc_html($page_subtitle); ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<!-- Mission Section -->
<section class="py-16 md:py-24">
    <div class="container px-4 md:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <?php if($mission_title = get_field('mission_title')): ?>
                <h2 class="section-title"><?php echo esc_html($mission_title); ?></h2>
                <?php endif; ?>
                
                <?php if($mission_content = get_field('mission_content')): ?>
                <div class="mission-content">
                    <?php echo $mission_content; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="relative">
                <?php if($mission_image = get_field('mission_image')): ?>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="<?php echo esc_url($mission_image['url']); ?>" 
                        alt="<?php echo esc_attr($mission_image['alt']); ?>" 
                        class="w-full h-full object-cover" />
                </div>
                <?php endif; ?>
                
                <?php if($year_established = get_field('year_established')): ?>
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-copper rounded-full flex items-center justify-center">
                    <span class="text-white font-serif text-lg">Since <?php echo esc_html($year_established); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 md:py-24">
    <div class="container px-4 md:px-6">
        <?php if($testimonials_title = get_field('testimonials_title')): ?>
        <h2 class="section-title text-center mb-16"><?php echo esc_html($testimonials_title); ?></h2>
        <?php endif; ?>
        
        <?php if(have_rows('testimonials')): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php while(have_rows('testimonials')): the_row(); 
                $quote = get_sub_field('quote');
                $author = get_sub_field('author');
                $location = get_sub_field('location');
                $image = get_sub_field('image');
            ?>
            <div class="bg-white p-8 shadow-sm rounded-lg relative">
                <div class="mb-6">
                    <svg class="text-copper/20 w-10 h-10 absolute top-4 left-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M10 11L4 19V8l6 3zm10 0l-6 8V8l6 3z"></path>
                    </svg>
                    <p class="text-lg mb-4 relative z-10"><?php echo esc_html($quote); ?></p>
                </div>
                
                <div class="flex items-center gap-4">
                    <?php if($image): ?>
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        <img src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($author); ?>" 
                            class="w-full h-full object-cover" />
                    </div>
                    <?php endif; ?>
                    
                    <div>
                        <p class="font-medium"><?php echo esc_html($author); ?></p>
                        <?php if($location): ?>
                        <p class="text-sm text-muted-foreground"><?php echo esc_html($location); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-copper text-white">
    <div class="container px-4 md:px-6 text-center">
        <?php if($cta_title = get_field('cta_title')): ?>
        <h2 class="text-3xl md:text-4xl font-serif font-medium mb-6"><?php echo esc_html($cta_title); ?></h2>
        <?php endif; ?>
        
        <?php if($cta_text = get_field('cta_text')): ?>
        <p class="text-lg mb-8 max-w-2xl mx-auto">
            <?php echo esc_html($cta_text); ?>
        </p>
        <?php endif; ?>
        
        <?php if($cta_button_text = get_field('cta_button_text')): ?>
        <a href="<?php echo esc_url(get_field('cta_button_link')); ?>" class="bg-white text-copper hover:bg-gray-100 px-8 py-3 text-lg font-medium transition-colors duration-300">
            <?php echo esc_html($cta_button_text); ?>
        </a>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
