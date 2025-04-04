
<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
        <div class="container px-4 md:px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4"><?php single_post_title(); ?></h1>
            <?php if (is_home() && !is_front_page()) : ?>
                <p class="text-muted-foreground text-lg max-w-2xl">
                    <?php echo get_the_archive_description(); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>

    <div class="container px-4 md:px-6 py-16">
        <?php
        if (have_posts()) :
            echo '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">';
            
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white p-6 rounded-lg shadow-sm border border-gray-200'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-4 rounded-md overflow-hidden">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                    <?php endif; ?>
                    
                    <header class="entry-header mb-4">
                        <?php the_title('<h2 class="entry-title text-2xl font-serif font-medium mb-2"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                        
                        <div class="entry-meta text-sm text-muted-foreground">
                            <?php
                            printf(
                                __('Posted on %s', 'cabinet-mart'),
                                '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
                            );
                            ?>
                        </div>
                    </header>
                    
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <footer class="entry-footer mt-4">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="text-copper hover:underline transition-colors duration-300">
                            <?php esc_html_e('Read more', 'cabinet-mart'); ?> &rarr;
                        </a>
                    </footer>
                </article>
                <?php
            endwhile;
            
            echo '</div>';
            
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&larr; Previous', 'cabinet-mart'),
                'next_text' => __('Next &rarr;', 'cabinet-mart'),
                'class' => 'mt-12 flex justify-center',
            ));
            
        else :
            ?>
            <div class="py-16 text-center">
                <h2 class="text-2xl md:text-3xl font-serif font-medium mb-4"><?php esc_html_e('Nothing Found', 'cabinet-mart'); ?></h2>
                <p class="text-muted-foreground max-w-2xl mx-auto">
                    <?php esc_html_e('It seems we cannot find what you are looking for.', 'cabinet-mart'); ?>
                </p>
                
                <?php if (is_search()) : ?>
                    <div class="mt-8">
                        <p class="mb-4"><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cabinet-mart'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php else : ?>
                    <div class="mt-8">
                        <p><?php esc_html_e('Perhaps searching can help.', 'cabinet-mart'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
?>
