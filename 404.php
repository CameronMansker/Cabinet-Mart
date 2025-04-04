
<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main min-h-screen flex items-center justify-center bg-gray-100">
    <div class="text-center px-4">
        <h1 class="text-4xl font-bold mb-4"><?php esc_html_e('404', 'cabinet-mart'); ?></h1>
        <p class="text-xl text-gray-600 mb-4"><?php esc_html_e('Oops! Page not found', 'cabinet-mart'); ?></p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-blue-500 hover:text-blue-700 underline">
            <?php esc_html_e('Return to Home', 'cabinet-mart'); ?>
        </a>
    </div>
</main>

<?php
get_footer();
?>
