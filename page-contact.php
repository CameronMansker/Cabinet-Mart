
<?php
/**
 * Template Name: Contact Page
 */
get_header();
?>

<!-- Page Header -->
<div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
    <div class="container px-4 md:px-6">
        <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4"><?php the_title(); ?></h1>
        <?php if($page_subtitle = get_field('contact_subtitle')): ?>
        <p class="text-muted-foreground text-lg max-w-2xl">
            <?php echo esc_html($page_subtitle); ?>
        </p>
        <?php endif; ?>
    </div>
</div>

<!-- Contact Information -->
<div class="container px-4 md:px-6 py-16">
    <div class="max-w-3xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <?php if(have_rows('contact_methods')): ?>
                <?php while(have_rows('contact_methods')): the_row(); 
                    $icon = get_sub_field('icon');
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    $link = get_sub_field('link');
                    $link_text = get_sub_field('link_text');
                ?>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-start">
                        <?php if($icon): ?>
                            <div class="mr-4 text-copper">
                                <?php echo $icon; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div>
                            <?php if($title): ?>
                                <h3 class="text-lg font-medium mb-2"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>
                            
                            <?php if($details): ?>
                                <p class="text-muted-foreground mb-2"><?php echo esc_html($details); ?></p>
                            <?php endif; ?>
                            
                            <?php if($link && $link_text): ?>
                                <a href="<?php echo esc_url($link); ?>" class="inline-block text-copper hover:underline">
                                    <?php echo esc_html($link_text); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
        <!-- Contact Form -->
        <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100">
            <h2 class="text-2xl font-serif font-medium mb-6">Send us a message</h2>
            
            <?php 
            // Display contact form 7 if it exists
            if(function_exists('do_shortcode') && get_field('contact_form_shortcode')): 
                echo do_shortcode(get_field('contact_form_shortcode')); 
            endif; 
            ?>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="bg-secondary py-16">
    <div class="container px-4 md:px-6">
        <?php if($map_embed = get_field('map_embed')): ?>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <?php echo $map_embed; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
