
<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (has_post_thumbnail()) : ?>
                <div class="entry-featured-image aspect-video w-full overflow-hidden bg-secondary">
                    <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                </div>
            <?php endif; ?>
            
            <div class="container px-4 md:px-6">
                <header class="entry-header pt-32 pb-12 md:pt-40 md:pb-16">
                    <?php the_title('<h1 class="text-4xl md:text-5xl font-serif font-medium mb-4">', '</h1>'); ?>
                    
                    <div class="entry-meta text-muted-foreground mb-4">
                        <?php
                        printf(
                            __('Posted on %s by %s', 'cabinet-mart'),
                            '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>',
                            get_the_author_posts_link()
                        );
                        ?>
                    </div>
                    
                    <?php
                    // Display categories and tags
                    $categories_list = get_the_category_list(', ');
                    $tags_list = get_the_tag_list('', ', ');
                    
                    if ($categories_list || $tags_list) :
                        echo '<div class="flex flex-wrap gap-2">';
                        
                        if ($categories_list) :
                            echo '<div class="text-sm">';
                            printf('<span class="font-medium">%s:</span> %s', __('Categories', 'cabinet-mart'), $categories_list);
                            echo '</div>';
                        endif;
                        
                        if ($tags_list) :
                            echo '<div class="text-sm">';
                            printf('<span class="font-medium">%s:</span> %s', __('Tags', 'cabinet-mart'), $tags_list);
                            echo '</div>';
                        endif;
                        
                        echo '</div>';
                    endif;
                    ?>
                </header>
                
                <div class="entry-content py-12 max-w-3xl mx-auto">
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'cabinet-mart'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . __('Pages:', 'cabinet-mart'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
                
                <footer class="entry-footer py-8 border-t border-border">
                    <div class="flex flex-wrap justify-between items-center">
                        <div class="post-navigation">
                            <?php
                            the_post_navigation(
                                array(
                                    'prev_text' => '&larr; %title',
                                    'next_text' => '%title &rarr;',
                                    'class' => 'text-copper hover:underline transition-colors duration-300',
                                )
                            );
                            ?>
                        </div>
                        
                        <div class="share-buttons mt-4 md:mt-0">
                            <span class="mr-2 text-sm font-medium"><?php _e('Share:', 'cabinet-mart'); ?></span>
                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" class="inline-block p-2 text-muted-foreground hover:text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                <span class="sr-only">Facebook</span>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="inline-block p-2 text-muted-foreground hover:text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                                </svg>
                                <span class="sr-only">Twitter</span>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener noreferrer" class="inline-block p-2 text-muted-foreground hover:text-foreground">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                                <span class="sr-only">LinkedIn</span>
                            </a>
                        </div>
                    </div>
                    
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="comments-area mt-12">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                </footer>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
?>
