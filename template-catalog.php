
<?php
/**
 * Template Name: Catalog Page
 * Description: Template for the Product Catalog page
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Catalog Header -->
    <div class="pt-32 pb-8 md:pt-40 md:pb-10 bg-[#f5f5f5]">
        <div class="container px-4 md:px-6">
            <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4 text-center"><?php the_title(); ?></h1>
            <?php if (get_the_excerpt()) : ?>
                <p class="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
                    <?php echo get_the_excerpt(); ?>
                </p>
            <?php else : ?>
                <p class="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
                    Browse through our complete catalog of premium wood products and accessories.
                </p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Catalog Images Grid -->
    <div class="container px-4 md:px-6 py-12 md:py-16">
        <?php if (have_rows('catalog_images')) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php while (have_rows('catalog_images')) : the_row(); ?>
                    <?php 
                    $image = get_sub_field('image');
                    if ($image) :
                    ?>
                        <div class="bg-white p-4 shadow-sm border border-gray-200 rounded-md cursor-pointer hover:shadow-md transition-shadow duration-300" data-image-id="<?php echo esc_attr($image['ID']); ?>">
                            <div class="relative aspect-[3/4] overflow-hidden">
                                <?php echo wp_get_attachment_image($image['ID'], 'large', false, ['class' => 'w-full h-full object-contain']); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php the_content(); ?>
            
            <?php
            // Default catalog images if ACF fields not populated
            $catalog_dir = get_template_directory() . '/assets/images/catalog';
            if (is_dir($catalog_dir)) :
                $catalog_files = glob($catalog_dir . '/*.{jpg,png,gif}', GLOB_BRACE);
                if (!empty($catalog_files)) :
                ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <?php foreach($catalog_files as $index => $file) : 
                            $filename = basename($file);
                            $file_url = get_template_directory_uri() . '/assets/images/catalog/' . $filename;
                        ?>
                            <div class="bg-white p-4 shadow-sm border border-gray-200 rounded-md cursor-pointer hover:shadow-md transition-shadow duration-300" data-image-id="catalog-<?php echo $index; ?>">
                                <div class="relative aspect-[3/4] overflow-hidden">
                                    <img src="<?php echo esc_url($file_url); ?>" alt="Catalog page <?php echo $index + 1; ?> with various wood products and accessories" class="w-full h-full object-contain">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    
    <!-- Lightbox Dialog - Hidden by default, controlled by JavaScript -->
    <div id="lightbox" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-filter backdrop-blur-sm hidden">
        <div class="max-w-6xl w-full p-0 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-xl" style="max-height: calc(100vh - 40px);">
            <div class="relative w-full h-[calc(100vh-40px)] flex items-center justify-center">
                <!-- Close button -->
                <button class="absolute right-4 top-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md p-2" id="lightbox-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>

                <!-- Previous image button -->
                <button class="absolute left-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12 flex items-center justify-center" id="lightbox-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>

                <!-- Image container -->
                <div class="w-full h-full flex items-center justify-center p-4 md:p-8 overflow-auto">
                    <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain select-none">
                </div>

                <!-- Next image button -->
                <button class="absolute right-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12 flex items-center justify-center" id="lightbox-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>

                <!-- Page number indicator -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white/80 px-3 py-1 rounded-full text-sm font-medium shadow-md" id="lightbox-counter">
                    1 / 1
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxClose = document.getElementById('lightbox-close');
        const lightboxNext = document.getElementById('lightbox-next');
        const lightboxPrev = document.getElementById('lightbox-prev');
        const lightboxCounter = document.getElementById('lightbox-counter');
        const catalogItems = document.querySelectorAll('[data-image-id]');
        
        let currentIndex = 0;
        
        // Open lightbox when clicking on a catalog item
        catalogItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                currentIndex = index;
                openLightbox();
            });
        });
        
        // Close lightbox
        lightboxClose.addEventListener('click', closeLightbox);
        
        // Navigate to next image
        lightboxNext.addEventListener('click', (e) => {
            e.stopPropagation();
            goToNextImage();
        });
        
        // Navigate to previous image
        lightboxPrev.addEventListener('click', (e) => {
            e.stopPropagation();
            goToPrevImage();
        });
        
        // Handle keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('hidden')) {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowRight') {
                    goToNextImage();
                } else if (e.key === 'ArrowLeft') {
                    goToPrevImage();
                }
            }
        });
        
        // Open lightbox and display current image
        function openLightbox() {
            const item = catalogItems[currentIndex];
            const imgSrc = item.querySelector('img').src;
            const imgAlt = item.querySelector('img').alt;
            
            lightboxImage.src = imgSrc;
            lightboxImage.alt = imgAlt;
            updateCounter();
            
            lightbox.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling while lightbox is open
        }
        
        // Close lightbox
        function closeLightbox() {
            lightbox.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }
        
        // Go to next image
        function goToNextImage() {
            currentIndex = (currentIndex + 1) % catalogItems.length;
            openLightbox();
        }
        
        // Go to previous image
        function goToPrevImage() {
            currentIndex = (currentIndex - 1 + catalogItems.length) % catalogItems.length;
            openLightbox();
        }
        
        // Update counter
        function updateCounter() {
            lightboxCounter.textContent = `${currentIndex + 1} / ${catalogItems.length}`;
        }
    });
</script>

<?php
get_footer();
?>
