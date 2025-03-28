
<?php
/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
    <header class="mb-6">
        <?php
        if (is_singular()) :
            the_title('<h1 class="text-3xl font-serif font-medium mb-3">', '</h1>');
        else :
            the_title('<h2 class="text-2xl font-serif font-medium mb-3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="text-sm text-muted-foreground mb-4">
                <?php
                echo '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>';
                echo ' by ';
                echo '<span>' . get_the_author() . '</span>';
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if (has_post_thumbnail() && !is_singular()) : ?>
        <div class="mb-6">
            <a href="<?php the_permalink(); ?>" class="block image-container">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded']); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
            ?>
            <div class="mt-4">
                <a href="<?php the_permalink(); ?>" class="copper-btn">
                    Read More
                </a>
            </div>
        <?php endif; ?>
    </div>
</article>
