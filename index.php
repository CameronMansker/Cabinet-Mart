
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header();
?>

<div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
    <div class="container px-4 md:px-6">
        <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4">
            <?php 
            if (is_home() && !is_front_page()) {
                single_post_title();
            } else {
                _e('Blog', 'cabinetmart');
            }
            ?>
        </h1>
    </div>
</div>

<div class="container px-4 md:px-6 py-16">
    <div class="max-w-3xl mx-auto">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article class="mb-12 pb-12 border-b border-gray-100">
                    <h2 class="text-2xl md:text-3xl font-serif font-medium mb-4">
                        <a href="<?php the_permalink(); ?>" class="hover:text-copper">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    
                    <div class="flex items-center text-sm text-muted-foreground mb-4">
                        <span class="mr-4"><?php echo get_the_date(); ?></span>
                        <?php if (has_category()) : ?>
                            <span class="mr-4">|</span>
                            <span>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-6">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    
                    <div class="prose prose-lg max-w-none mb-6">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="copper-btn rounded inline-block">
                        <?php _e('Read More', 'cabinetmart'); ?>
                    </a>
                </article>
                <?php
            endwhile;
            
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Previous', 'cabinetmart'),
                'next_text' => __('Next', 'cabinetmart'),
                'screen_reader_text' => ' ',
                'class' => 'mt-8',
            ));
            
        else :
            ?>
            <div class="p-8 rounded-lg bg-white shadow-sm">
                <p><?php _e('No posts found.', 'cabinetmart'); ?></p>
            </div>
            <?php
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
