
<?php
/**
 * Template part for displaying a message that posts cannot be found
 */
?>

<section class="py-16 text-center">
    <div class="container px-4">
        <h2 class="text-3xl font-serif font-medium mb-4">
            <?php esc_html_e('Nothing Found', 'cabinetmart'); ?>
        </h2>

        <div class="max-w-2xl mx-auto">
            <?php
            if (is_search()) :
                ?>
                <p class="text-muted-foreground mb-8">
                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cabinetmart'); ?>
                </p>
                <?php
                get_search_form();
            else :
                ?>
                <p class="text-muted-foreground mb-8">
                    <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cabinetmart'); ?>
                </p>
                <?php
                get_search_form();
            endif;
            ?>
        </div>
    </div>
</section>
