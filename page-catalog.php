
<?php
/**
 * Template Name: Catalog Page
 */

get_header();
?>

<main id="primary" class="site-main pt-32">
    <section class="py-12 md:py-16 bg-secondary">
        <div class="container px-4 md:px-6">
            <h1 class="text-3xl md:text-4xl font-serif font-medium text-center mb-4">Our Product Catalog</h1>
            <p class="text-center text-muted-foreground max-w-2xl mx-auto">
                Browse our extensive collection of high-quality cabinets, accessories, and hardware
            </p>
        </div>
    </section>

    <section class="py-12 md:py-16">
        <div class="container px-4 md:px-6">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>

            <?php
            // Display WooCommerce products if WooCommerce is active
            if (class_exists('WooCommerce')) :
                echo do_shortcode('[products limit="12" columns="3" orderby="popularity" order="desc"]');
            else :
            ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Example catalog items - replace with your actual data
                $example_products = array(
                    array(
                        'title' => 'Modern Oak Cabinets',
                        'desc' => 'Contemporary design with durable oak construction',
                        'price' => '$1,299',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                    array(
                        'title' => 'Classic Maple Cabinets',
                        'desc' => 'Traditional style with beautiful maple finish',
                        'price' => '$1,499',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                    array(
                        'title' => 'Cherry Wood Cabinets',
                        'desc' => 'Elegant cherry wood with premium craftsmanship',
                        'price' => '$1,699',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                    array(
                        'title' => 'Walnut Finish Cabinets',
                        'desc' => 'Rich walnut finish with modern hardware',
                        'price' => '$1,899',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                    array(
                        'title' => 'White Shaker Cabinets',
                        'desc' => 'Clean, bright white shaker style cabinets',
                        'price' => '$1,199',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                    array(
                        'title' => 'Gray Modern Cabinets',
                        'desc' => 'Contemporary gray finish with sleek handles',
                        'price' => '$1,399',
                        'img' => get_template_directory_uri() . '/assets/images/placeholder.jpg',
                    ),
                );
                
                foreach ($example_products as $product) :
                ?>
                <div class="bg-white shadow rounded-md overflow-hidden">
                    <div class="image-container">
                        <img src="<?php echo esc_url($product['img']); ?>" alt="<?php echo esc_attr($product['title']); ?>" class="w-full h-64 object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-medium mb-2"><?php echo esc_html($product['title']); ?></h3>
                        <p class="text-muted-foreground mb-4"><?php echo esc_html($product['desc']); ?></p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-medium"><?php echo esc_html($product['price']); ?></span>
                            <a href="#" class="copper-btn">View Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
