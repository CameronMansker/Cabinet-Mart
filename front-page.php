
<?php
/**
 * The template for displaying the front page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[600px] w-full overflow-hidden">
        <div class="absolute inset-0 bg-black/30 z-10"></div>
        
        <div 
            class="absolute inset-0 bg-cover bg-center animate-image-zoom"
            style="background-image: url('<?php echo get_theme_file_uri('/assets/images/maybe-hero.jpg'); ?>');">
        </div>
        
        <div class="container relative z-20 h-full flex flex-col justify-center px-4 md:px-6">
            <div class="text-white max-w-2xl transition-all duration-1000 js-hero-content">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 flex items-center justify-center mr-3">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 2L2 9L16 16L30 9L16 2Z" fill="white"/>
                            <path d="M2 23L16 30L30 23L16 16L2 23Z" fill="white"/>
                        </svg>
                    </div>
                    <h1 class="text-4xl md:text-6xl font-serif tracking-tight">
                        <?php bloginfo('name'); ?>
                    </h1>
                </div>
                
                <?php if ($hero_tagline = get_field('hero_tagline')) : ?>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-light italic mb-6 tracking-tight">
                    <?php echo esc_html($hero_tagline); ?>
                </h2>
                <?php else : ?>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-light italic mb-6 tracking-tight">
                    By Cabinet People <br />For Cabinet People.
                </h2>
                <?php endif; ?>
                
                <?php if ($hero_text = get_field('hero_text')) : ?>
                <p class="text-sm text-white/80 mb-12">
                    <?php echo esc_html($hero_text); ?>
                </p>
                <?php else : ?>
                <p class="text-sm text-white/80 mb-12">
                    Trusted by the nation's best kitchen designers, contractors, and renovators.
                    <br />
                    Custom finishing and staining services for all wood accessories.
                </p>
                <?php endif; ?>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-2 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Contact Us
                    </a>
                    <a href="<?php echo esc_url(home_url('/catalog')); ?>" class="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-2 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        See All Products
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="bg-primary py-12 text-center">
        <div class="container px-4">
            <?php if ($intro_text = get_field('intro_text')) : ?>
            <p class="text-balance max-w-3xl mx-auto text-primary-foreground text-base md:text-lg font-light">
                <?php echo esc_html($intro_text); ?>
            </p>
            <?php else : ?>
            <p class="text-balance max-w-3xl mx-auto text-primary-foreground text-base md:text-lg font-light">
                Cabinet maker with 30+ years of experience in crafting handmade, solid wood kitchens.
                Focused on quality, craftsmanship, thoughtful design, and an innovative approach.
            </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Feature Sections -->
    <?php if (have_rows('feature_sections')) : 
        $i = 0;
        while (have_rows('feature_sections')) : the_row();
            $i++;
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $image = get_sub_field('image');
            $button_text = get_sub_field('button_text');
            $button_link = get_sub_field('button_link');
            $reverse = $i % 2 === 0;
    ?>
    <section class="py-0 overflow-hidden feature-section" id="feature-<?php echo $i; ?>">
        <!-- Desktop layout (md and up) -->
        <div class="hidden md:flex md:flex-row w-full max-h-[500px]">
            <?php if (!$reverse) : ?>
            <!-- Image on left for odd sections -->
            <div class="w-1/2 max-h-[500px]">
                <div class="transition-all duration-700 js-feature-image">
                    <div class="h-full max-h-[500px] aspect-square">
                        <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-full object-cover" loading="lazy">
                        <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/images/placeholder.jpg'); ?>" alt="Feature image" class="w-full h-full object-cover" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Content on right for odd sections -->
            <div class="w-1/2 flex items-center">
                <div class="p-16 transition-all duration-700 delay-200 js-feature-content">
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php if ($button_text && $button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="copper-btn"><?php echo esc_html($button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php else : ?>
            <!-- Content on left for even sections -->
            <div class="w-1/2 flex items-center">
                <div class="p-16 transition-all duration-700 delay-200 js-feature-content">
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php if ($button_text && $button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="copper-btn"><?php echo esc_html($button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Image on right for even sections -->
            <div class="w-1/2 max-h-[500px]">
                <div class="transition-all duration-700 js-feature-image">
                    <div class="h-full max-h-[500px] aspect-square">
                        <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-full object-cover" loading="lazy">
                        <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/images/placeholder.jpg'); ?>" alt="Feature image" class="w-full h-full object-cover" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Mobile layout (stacked vertically) -->
        <div class="flex flex-col w-full md:hidden">
            <!-- Image always appears at top in mobile view -->
            <div class="w-full max-h-[300px]">
                <div class="transition-all duration-700 js-feature-image">
                    <div class="h-full max-h-[300px] aspect-square">
                        <?php if ($image) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-full object-cover" loading="lazy">
                        <?php else : ?>
                        <img src="<?php echo get_theme_file_uri('/assets/images/placeholder.jpg'); ?>" alt="Feature image" class="w-full h-full object-cover" loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Content always appears below in mobile view -->
            <div class="w-full">
                <div class="p-8 transition-all duration-700 delay-200 js-feature-content">
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php if ($button_text && $button_link) : ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="copper-btn"><?php echo esc_html($button_text); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php 
        endwhile;
    endif; 
    ?>

</main>

<?php
get_footer();
