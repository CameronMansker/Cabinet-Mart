
<?php
/**
 * The template for displaying all pages
 */
get_header();
?>

<div class="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
    <div class="container px-4 md:px-6">
        <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4"><?php the_title(); ?></h1>
    </div>
</div>

<div class="container px-4 md:px-6 py-16">
    <div class="max-w-3xl mx-auto">
        <div class="prose prose-lg max-w-none">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
