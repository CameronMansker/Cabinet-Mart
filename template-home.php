
<?php
/**
 * Template Name: Home Page
 * Description: Template for the homepage
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[600px] w-full overflow-hidden">
        <div class="absolute inset-0 bg-black/30 z-10"></div>
        
        <div 
            class="absolute inset-0 bg-cover bg-center animate-image-zoom"
            style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/maybe-hero.jpg');"
        ></div>
        
        <div class="container relative z-20 h-full flex flex-col justify-center px-4 md:px-6">
            <div class="text-white max-w-2xl opacity-100">
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
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-light italic mb-6 tracking-tight">
                    By Cabinet People <br>For Cabinet People.
                </h2>
                
                <p class="text-sm text-white/80 mb-12">
                    Trusted by the nation's best kitchen designers, contractors, and renovators.
                    <br>
                    Custom finishing and staining services for all wood accessories.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Contact Us
                    </a>
                    <a href="<?php echo esc_url(home_url('/catalog')); ?>" class="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    <section class="py-16 md:py-24 bg-white">
        <div class="container px-4 md:px-6">
            <div class="text-center max-w-3xl mx-auto">
                <div class="mb-4 w-20 h-[1px] bg-copper mx-auto"></div>
                <h2 class="text-3xl md:text-4xl font-serif font-medium mb-8"><?php echo get_theme_mod('intro_heading', 'Craftsmanship That Lasts Generations'); ?></h2>
                <p class="text-muted-foreground text-lg mb-8"><?php echo get_theme_mod('intro_text', 'At Cabinet Mart, we combine traditional woodworking techniques with modern design sensibilities to create custom cabinetry that transforms your space. Each piece is carefully crafted using quality materials and superior craftsmanship.'); ?></p>
                <a href="<?php echo esc_url(get_theme_mod('intro_button_link', home_url('/about'))); ?>" class="copper-btn">
                    <?php echo get_theme_mod('intro_button_text', 'Learn Our Story'); ?>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
                <?php
                // Feature items
                $features = [
                    [
                        'number' => '01',
                        'title' => get_theme_mod('feature_1_title', 'Quality Materials'),
                        'description' => get_theme_mod('feature_1_description', 'We use only the finest hardwoods and materials, sourced responsibly for lasting durability.')
                    ],
                    [
                        'number' => '02',
                        'title' => get_theme_mod('feature_2_title', 'Expert Craftsmanship'),
                        'description' => get_theme_mod('feature_2_description', 'Our skilled artisans bring decades of experience to every cabinet we create.')
                    ],
                    [
                        'number' => '03',
                        'title' => get_theme_mod('feature_3_title', 'Custom Solutions'),
                        'description' => get_theme_mod('feature_3_description', 'We design and build to your exact specifications, ensuring a perfect fit for your space.')
                    ],
                ];
                
                foreach ($features as $feature) :
                ?>
                <div class="text-center p-6">
                    <div class="feature-number"></div>
                    <p class="text-sm text-copper mb-4"><?php echo $feature['number']; ?></p>
                    <h3 class="text-xl font-serif font-medium mb-3"><?php echo $feature['title']; ?></h3>
                    <p class="text-muted-foreground"><?php echo $feature['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Feature Section 1 -->
    <section id="vision" class="py-16 md:py-24 bg-secondary">
        <div class="container px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h2 class="section-title"><?php echo get_theme_mod('feature_1_heading', 'Your Vision + Our Expertise'); ?></h2>
                    <p class="section-subtitle"><?php echo get_theme_mod('feature_1_subheading', 'Premium kitchen designs crafted to match your specific style and needs.'); ?></p>
                    <p class="text-muted-foreground mb-8">
                        <?php echo get_theme_mod('feature_1_content', 'We work closely with you to transform your vision into reality. Our design team combines your ideas with our expertise to create functional and beautiful spaces that reflect your taste and lifestyle.'); ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('feature_1_button_link', home_url('/gallery'))); ?>" class="copper-btn">
                        <?php echo get_theme_mod('feature_1_button_text', 'View Our Work'); ?>
                    </a>
                </div>
                
                <div class="order-1 lg:order-2">
                    <div class="image-container rounded-lg overflow-hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cad.png" alt="Kitchen with wooden cabinets and modern design" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Section 2 -->
    <section id="cabinetry" class="py-16 md:py-24">
        <div class="container px-4 md:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="image-container rounded-lg overflow-hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cargo-unloading.jpg" alt="Woodland cabinetry showcase" class="w-full h-auto">
                    </div>
                </div>
                
                <div>
                    <h2 class="section-title"><?php echo get_theme_mod('feature_2_heading', 'Why Woodland Cabinetry'); ?></h2>
                    <p class="section-subtitle"><?php echo get_theme_mod('feature_2_subheading', 'Experience the difference of premium craftsmanship and materials.'); ?></p>
                    <p class="text-muted-foreground mb-8">
                        <?php echo get_theme_mod('feature_2_content', 'Our dedication to quality craftsmanship sets us apart. We use sustainable hardwoods, precision joinery, and hand-finished details to create cabinetry that stands the test of time.'); ?>
                    </p>
                    <a href="<?php echo esc_url(get_theme_mod('feature_2_button_link', home_url('/about'))); ?>" class="copper-btn">
                        <?php echo get_theme_mod('feature_2_button_text', 'Our Story'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Quality Indicators Section -->
    <section class="py-16 md:py-24 bg-secondary">
        <div class="container px-4 md:px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="mb-4 w-20 h-[1px] bg-copper mx-auto"></div>
                <h2 class="text-3xl md:text-4xl font-serif font-medium mb-4">The Cabinet Mart Difference</h2>
                <p class="text-muted-foreground text-lg">
                    Our commitment to quality and customer satisfaction is evident in every aspect of our business.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                // Quality indicators
                $indicators = [
                    [
                        'number' => '30+',
                        'label' => 'Years Experience',
                        'description' => 'Decades of expertise in custom cabinetry design and manufacturing.'
                    ],
                    [
                        'number' => '5,000+',
                        'label' => 'Projects Completed',
                        'description' => 'Successful installations across residential and commercial properties.'
                    ],
                    [
                        'number' => '100%',
                        'label' => 'Satisfaction',
                        'description' => 'We work until you're completely satisfied with your cabinetry.'
                    ],
                    [
                        'number' => '25+',
                        'label' => 'Expert Craftsmen',
                        'description' => 'Skilled artisans dedicated to fine woodworking and precision.'
                    ],
                ];
                
                foreach ($indicators as $indicator) :
                ?>
                <div class="text-center p-6 bg-white rounded-lg shadow-sm">
                    <div class="feature-number"></div>
                    <p class="text-4xl md:text-5xl font-serif font-medium text-copper mb-2"><?php echo $indicator['number']; ?></p>
                    <h3 class="text-lg font-medium mb-3"><?php echo $indicator['label']; ?></h3>
                    <p class="text-muted-foreground text-sm"><?php echo $indicator['description']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-16 text-center">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="copper-btn">
                    Start Your Project
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
