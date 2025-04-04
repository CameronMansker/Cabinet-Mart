
<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main flex items-center justify-center min-h-[80vh] bg-secondary">
    <div class="container px-4 md:px-6 py-16 text-center">
        <h1 class="text-5xl md:text-6xl font-serif font-medium mb-6">404</h1>
        <p class="text-xl md:text-2xl text-muted-foreground mb-8">
            <?php esc_html_e('Oops! We couldn\'t find the page you\'re looking for.', 'cabinet-mart'); ?>
        </p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="copper-btn inline-flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <?php esc_html_e('Return to Homepage', 'cabinet-mart'); ?>
        </a>
    </div>
</main>

<?php
get_footer();
?>
