
import { useEffect, useState, useRef } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import { 
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious
} from '@/components/ui/carousel';
import { AspectRatio } from '@/components/ui/aspect-ratio';
import { useToast } from "@/components/ui/use-toast";
import { Dialog, DialogContent, DialogClose } from "@/components/ui/dialog";
import { X, ChevronLeft, ChevronRight } from 'lucide-react';

const Catalog = () => {
  const { toast } = useToast();
  const [isLoading, setIsLoading] = useState<boolean[]>(Array(12).fill(true));
  const catalogRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  // Lightbox states
  const [lightboxOpen, setLightboxOpen] = useState(false);
  const [lightboxIndex, setLightboxIndex] = useState(0);
  
  // Catalog images array (0001.png through 0012.png)
  const catalogImages = Array.from({ length: 12 }, (_, i) => ({
    id: i + 1,
    src: `/lovable-uploads/${String(i + 1).padStart(4, '0')}.png`,
    alt: `Catalog page ${i + 1} with various wood products and accessories`,
    loaded: !isLoading[i]
  }));

  // Handle image load event
  const handleImageLoad = (index: number) => {
    setIsLoading(prev => {
      const newState = [...prev];
      newState[index] = false;
      return newState;
    });
  };

  // Lightbox navigation functions
  const openLightbox = (index: number) => {
    setLightboxIndex(index);
    setLightboxOpen(true);
  };

  const closeLightbox = () => {
    setLightboxOpen(false);
  };

  const goToNextImage = () => {
    setLightboxIndex((prev) => (prev + 1) % catalogImages.length);
  };

  const goToPrevImage = () => {
    setLightboxIndex((prev) => (prev - 1 + catalogImages.length) % catalogImages.length);
  };

  // Handle keyboard navigation in lightbox
  useEffect(() => {
    const handleKeyDown = (e: KeyboardEvent) => {
      if (!lightboxOpen) return;
      
      if (e.key === 'Escape') {
        closeLightbox();
      } else if (e.key === 'ArrowRight') {
        goToNextImage();
      } else if (e.key === 'ArrowLeft') {
        goToPrevImage();
      }
    };

    window.addEventListener('keydown', handleKeyDown);
    return () => window.removeEventListener('keydown', handleKeyDown);
  }, [lightboxOpen]);

  return (
    <div className="min-h-screen bg-background" ref={catalogRef}>
      <NavigationMenu />
      
      {/* Catalog Header */}
      <div className="pt-32 pb-8 md:pt-40 md:pb-10 bg-[#f5f5f5]">
        <div className="container px-4 md:px-6">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4 text-center">Our Product Catalog</h1>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
            Browse through our complete catalog of premium wood products and accessories.
          </p>
        </div>
      </div>
      
      {/* Responsive Photo Gallery */}
      <section className="py-12 md:py-16">
        <div className="container px-4 md:px-6">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            {catalogImages.map((image, index) => (
              <div 
                key={image.id} 
                className="overflow-hidden rounded-lg border shadow-sm bg-card hover:shadow-md transition-shadow duration-300 group"
              >
                <button 
                  onClick={() => openLightbox(index)}
                  className="w-full"
                  aria-label={`View ${image.alt} in fullscreen mode`}
                >
                  <div className="relative aspect-[2587/3337] w-full overflow-hidden">
                    {isLoading[index] && (
                      <div className="absolute inset-0 flex items-center justify-center bg-muted">
                        <div className="w-8 h-8 border-4 border-primary border-t-transparent rounded-full animate-spin"></div>
                      </div>
                    )}
                    <img 
                      src={image.src} 
                      alt={image.alt}
                      className="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105"
                      loading={index < 6 ? "eager" : "lazy"}
                      onLoad={() => handleImageLoad(index)}
                    />
                  </div>
                </button>
              </div>
            ))}
          </div>
        </div>
      </section>
      
      {/* Lightbox Dialog */}
      <Dialog open={lightboxOpen} onOpenChange={setLightboxOpen}>
        <DialogContent className="max-w-7xl w-full h-[90vh] p-0 overflow-hidden bg-black/95 border-none" onPointerDownOutside={(e) => e.preventDefault()}>
          <div className="relative w-full h-full flex items-center justify-center">
            {/* Close button */}
            <DialogClose className="absolute right-4 top-4 z-50 bg-black/50 hover:bg-black/80 rounded-full p-2 text-white">
              <X className="h-6 w-6" />
              <span className="sr-only">Close</span>
            </DialogClose>
            
            {/* Previous image button */}
            <button 
              onClick={(e) => {
                e.stopPropagation();
                goToPrevImage();
              }}
              className="absolute left-4 z-50 bg-black/50 hover:bg-black/80 rounded-full p-3 text-white transition-all"
              aria-label="Previous image"
            >
              <ChevronLeft className="h-8 w-8" />
            </button>
            
            {/* Image container */}
            <div className="w-full h-full flex items-center justify-center p-4 md:p-8">
              <img 
                src={catalogImages[lightboxIndex].src} 
                alt={catalogImages[lightboxIndex].alt}
                className="max-w-full max-h-full object-contain select-none"
              />
            </div>
            
            {/* Next image button */}
            <button 
              onClick={(e) => {
                e.stopPropagation();
                goToNextImage();
              }}
              className="absolute right-4 z-50 bg-black/50 hover:bg-black/80 rounded-full p-3 text-white transition-all"
              aria-label="Next image"
            >
              <ChevronRight className="h-8 w-8" />
            </button>
          </div>
        </DialogContent>
      </Dialog>
      
      <Footer />
    </div>
  );
};

export default Catalog;
