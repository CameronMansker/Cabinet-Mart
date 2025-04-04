
<?php
/**
 * Template Name: Policy Page
 * Description: Template for policy pages (Privacy, Terms, etc)
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
    
    <!-- Policy Content -->
    <div class="py-12 md:py-16">
        <div class="container px-4 md:px-6">
            <div class="max-w-3xl mx-auto prose prose-headings:font-serif prose-headings:font-medium prose-headings:text-foreground prose-headings:mb-4 prose-p:text-muted-foreground prose-p:mb-6 prose-li:text-muted-foreground prose-ul:mb-6 prose-ol:mb-6">
                <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>
