
<?php
/**
 * Template Name: FAQ Page
 * Description: Template for the FAQ page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Policy Header -->
    <div class="pt-32 pb-8 md:pt-40 md:pb-12 bg-secondary">
        <div class="container px-4 md:px-6">
            <h1 class="text-3xl md:text-4xl font-serif font-medium text-center"><?php the_title(); ?></h1>
        </div>
    </div>
    
    <!-- FAQ Content -->
    <div class="py-12 md:py-16">
        <div class="container px-4 md:px-6">
            <div class="max-w-3xl mx-auto prose prose-headings:font-serif prose-headings:font-medium prose-headings:text-foreground prose-headings:mb-4 prose-p:text-muted-foreground prose-p:mb-6 prose-li:text-muted-foreground prose-ul:mb-6 prose-ol:mb-6">
                <?php if (have_rows('faq_sections')) : ?>
                    <?php while (have_rows('faq_sections')) : the_row(); ?>
                        <h2 class="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6"><?php the_sub_field('section_title'); ?></h2>
                        
                        <?php if (have_rows('questions')) : ?>
                            <?php while (have_rows('questions')) : the_row(); ?>
                                <h3 class="text-xl font-serif font-medium mt-6 mb-3"><?php the_sub_field('question'); ?></h3>
                                <p><?php the_sub_field('answer'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                <?php endif; ?>
                
                <div class="mt-12 p-6 bg-secondary rounded-lg">
                    <h4 class="text-lg font-serif font-medium mb-3">Still have questions?</h4>
                    <p class="mb-4">Our customer service team is here to help with any additional questions you might have.</p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="text-copper hover:underline transition-colors duration-300">Contact us</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
