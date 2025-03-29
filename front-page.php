
<?php get_header(); ?>

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <?php if($hero_background = get_field('hero_background')): ?>
    <div class="absolute inset-0 z-0">
        <img 
            src="<?php echo esc_url($hero_background['url']); ?>" 
            alt="<?php echo esc_attr($hero_background['alt']); ?>" 
            class="w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>
    <?php endif; ?>
    
    <div class="container px-4 md:px-6 relative z-10 text-center text-white">
        <?php if($hero_heading = get_field('hero_heading')): ?>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-medium mb-4 max-w-4xl mx-auto">
            <?php echo esc_html($hero_heading); ?>
        </h1>
        <?php endif; ?>
        
        <?php if($hero_description = get_field('hero_description')): ?>
        <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">
            <?php echo esc_html($hero_description); ?>
        </p>
        <?php endif; ?>
        
        <?php if($hero_button_text = get_field('hero_button_text')): ?>
        <a 
            href="<?php echo esc_url(get_field('hero_button_link')); ?>" 
            class="copper-btn text-lg rounded-full">
            <?php echo esc_html($hero_button_text); ?>
        </a>
        <?php endif; ?>
    </div>
    
    <?php if($hero_scroll_text = get_field('hero_scroll_text')): ?>
    <div class="absolute bottom-10 left-0 right-0 text-center text-white z-10">
        <a href="#intro" class="inline-flex flex-col items-center">
            <span class="text-sm mb-2"><?php echo esc_html($hero_scroll_text); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="animate-bounce">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <polyline points="19 12 12 19 5 12"></polyline>
            </svg>
        </a>
    </div>
    <?php endif; ?>
</section>

<!-- Intro Section -->
<section id="intro" class="py-20 md:py-28">
    <div class="container px-4 md:px-6">
        <div class="max-w-3xl mx-auto text-center">
            <?php if($intro_title = get_field('intro_title')): ?>
            <h2 class="section-title"><?php echo esc_html($intro_title); ?></h2>
            <?php endif; ?>
            
            <?php if($intro_subtitle = get_field('intro_subtitle')): ?>
            <p class="section-subtitle"><?php echo esc_html($intro_subtitle); ?></p>
            <?php endif; ?>
            
            <?php if($intro_description = get_field('intro_description')): ?>
            <div class="prose prose-lg mx-auto">
                <?php echo $intro_description; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Feature Sections -->
<?php if(have_rows('feature_sections')): ?>
    <?php while(have_rows('feature_sections')): the_row(); 
        $title = get_sub_field('title');
        $subtitle = get_sub_field('subtitle');
        $button_text = get_sub_field('button_text');
        $button_link = get_sub_field('button_link');
        $image = get_sub_field('image');
        $reverse = get_sub_field('reverse_layout');
        $section_id = get_sub_field('section_id');
    ?>
    <section id="<?php echo esc_attr($section_id); ?>" class="py-12 md:py-20 <?php echo ($reverse) ? 'bg-secondary' : ''; ?>">
        <div class="container px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center <?php echo ($reverse) ? 'md:flex-row-reverse' : ''; ?>">
                <div class="<?php echo ($reverse) ? 'md:order-2' : 'md:order-1'; ?>">
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                    <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
                    
                    <?php if($button_text): ?>
                    <a href="<?php echo esc_url($button_link); ?>" class="copper-btn rounded-full">
                        <?php echo esc_html($button_text); ?>
                    </a>
                    <?php endif; ?>
                </div>
                
                <div class="<?php echo ($reverse) ? 'md:order-1' : 'md:order-2'; ?>">
                    <div class="image-container rounded-lg overflow-hidden">
                        <?php if($image): ?>
                        <img 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt']); ?>" 
                            class="w-full h-full object-cover"
                        />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; ?>
<?php endif; ?>

<!-- Quality Indicators Section -->
<section class="py-20 md:py-28 bg-white">
    <div class="container px-4 md:px-6">
        <div class="max-w-3xl mx-auto text-center mb-16">
            <?php if($quality_title = get_field('quality_title')): ?>
            <h2 class="font-serif text-3xl md:text-4xl lg:text-5xl mb-4 italic"><?php echo esc_html($quality_title); ?></h2>
            <?php endif; ?>
            
            <?php if($quality_description = get_field('quality_description')): ?>
            <p class="text-muted-foreground text-balance"><?php echo esc_html($quality_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if(have_rows('quality_points')): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-6">
            <?php $index = 0; while(have_rows('quality_points')): the_row(); 
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $image = get_sub_field('image');
                $index++;
            ?>
            <div class="transition-all duration-700 delay-<?php echo $index * 100; ?> animate-quality-point">
                <div class="image-container mb-4 aspect-square">
                    <?php if($image): ?>
                    <img 
                        src="<?php echo esc_url($image['url']); ?>" 
                        alt="<?php echo esc_attr($title); ?>" 
                        class="w-full h-full object-cover object-center"
                    />
                    <?php endif; ?>
                </div>
                <div class="text-center">
                    <div class="feature-number"></div>
                    <h3 class="font-serif text-lg"><?php echo esc_html($title); ?></h3>
                    <?php if($subtitle): ?>
                    <p class="text-sm text-muted-foreground"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <?php if($quality_button_text = get_field('quality_button_text')): ?>
        <div class="flex justify-center mt-16">
            <a href="<?php echo esc_url(get_field('quality_button_link')); ?>" class="border border-copper text-copper hover:bg-copper hover:text-white px-8 py-3 rounded-full transition-all duration-300">
                <span class="flex items-center gap-2">
                    <span><?php echo esc_html($quality_button_text); ?></span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                        <path d="M12 8L16 12L12 16M8 12H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
