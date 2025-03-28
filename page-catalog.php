
<?php
/**
 * Template Name: Catalog Page
 */
get_header();
?>

<div class="min-h-screen bg-background" id="catalog-section">
    <!-- Catalog Header -->
    <div class="pt-32 pb-8 md:pt-40 md:pb-10 bg-[#f5f5f5]">
        <div class="container px-4 md:px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4 text-center"><?php the_title(); ?></h1>
            <?php if($catalog_subtitle = get_field('catalog_subtitle')): ?>
            <p class="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
                <?php echo esc_html($catalog_subtitle); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Catalog Images Grid -->
    <div class="container px-4 md:px-6 py-12 md:py-16">
        <?php if(have_rows('catalog_pages')): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php while(have_rows('catalog_pages')): the_row(); 
                $image = get_sub_field('catalog_image');
                $page_number = get_row_index();
            ?>
            <div class="bg-white p-4 shadow-sm border border-gray-200 rounded-md cursor-pointer hover:shadow-md transition-shadow duration-300 catalog-item" 
                 data-index="<?php echo ($page_number - 1); ?>">
                <div class="relative aspect-[3/4] overflow-hidden">
                    <?php if($image): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" 
                         alt="<?php echo esc_attr($image['alt'] ?: 'Catalog page ' . $page_number); ?>" 
                         class="w-full h-full object-contain transition-opacity duration-300">
                    <?php else: ?>
                    <div class="flex items-center justify-center h-full bg-gray-100">
                        <p>Catalog page <?php echo $page_number; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- Lightbox (Hidden by default) -->
    <div id="catalog-lightbox" class="fixed inset-0 bg-black/80 z-50 flex items-center justify-center hidden backdrop-blur-sm">
        <div class="relative w-full h-[calc(100vh-40px)] flex items-center justify-center">
            <!-- Close button -->
            <button id="close-lightbox" class="absolute right-4 top-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-10 h-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
                <span class="sr-only">Close</span>
            </button>

            <!-- Previous image button -->
            <button id="prev-image" class="absolute left-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>

            <!-- Image container -->
            <div class="w-full h-full flex items-center justify-center p-4 md:p-8 overflow-auto">
                <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain select-none">
            </div>

            <!-- Next image button -->
            <button id="next-image" class="absolute right-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            <!-- Page number indicator -->
            <div id="page-indicator" class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white/80 px-3 py-1 rounded-full text-sm font-medium shadow-md"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all catalog items
    const catalogItems = document.querySelectorAll('.catalog-item');
    const lightbox = document.getElementById('catalog-lightbox');
    const lightboxImage = document.getElementById('lightbox-image');
    const closeButton = document.getElementById('close-lightbox');
    const prevButton = document.getElementById('prev-image');
    const nextButton = document.getElementById('next-image');
    const pageIndicator = document.getElementById('page-indicator');
    
    let currentIndex = 0;
    const catalogImages = [];
    
    // Collect all catalog images
    <?php if(have_rows('catalog_pages')): ?>
    <?php while(have_rows('catalog_pages')): the_row(); 
        $image = get_sub_field('catalog_image');
    ?>
    catalogImages.push({
        src: "<?php echo esc_url($image['url']); ?>",
        alt: "<?php echo esc_attr($image['alt'] ?: 'Catalog page ' . get_row_index()); ?>"
    });
    <?php endwhile; ?>
    <?php endif; ?>
    
    // Open lightbox when clicking on a catalog item
    catalogItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            currentIndex = parseInt(item.dataset.index);
            updateLightbox();
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close lightbox
    closeButton.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });
    
    // Navigate between images
    prevButton.addEventListener('click', (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + catalogImages.length) % catalogImages.length;
        updateLightbox();
    });
    
    nextButton.addEventListener('click', (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % catalogImages.length;
        updateLightbox();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                currentIndex = (currentIndex - 1 + catalogImages.length) % catalogImages.length;
                updateLightbox();
            } else if (e.key === 'ArrowRight') {
                currentIndex = (currentIndex + 1) % catalogImages.length;
                updateLightbox();
            }
        }
    });
    
    function updateLightbox() {
        if (catalogImages.length > 0) {
            lightboxImage.src = catalogImages[currentIndex].src;
            lightboxImage.alt = catalogImages[currentIndex].alt;
            pageIndicator.textContent = `${currentIndex + 1} / ${catalogImages.length}`;
        }
    }
    
    function closeLightbox() {
        lightbox.classList.add('hidden');
        document.body.style.overflow = '';
    }
});
</script>

<?php get_footer(); ?>
