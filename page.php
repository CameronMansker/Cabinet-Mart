
<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
                <div class="container px-4 md:px-6">
                    <?php the_title('<h1 class="text-4xl md:text-5xl font-serif font-medium mb-4">', '</h1>'); ?>
                    
                    <?php if (get_the_excerpt()) : ?>
                        <p class="text-muted-foreground text-lg max-w-2xl">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="container px-4 md:px-6 py-16">
                <div class="max-w-3xl mx-auto">
                    <?php
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . __('Pages:', 'cabinet-mart'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </div>
        </article>
        <?php
        
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        
    endwhile; // End of the loop.
    ?>
</main>

<?php
get_footer();
?>
