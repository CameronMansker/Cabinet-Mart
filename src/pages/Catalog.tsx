
import { useEffect, useState, useRef } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import { useToast } from "@/components/ui/use-toast";
import { Dialog, DialogContent } from "@/components/ui/dialog";
import { X, ChevronLeft, ChevronRight } from 'lucide-react';
import { Button } from "@/components/ui/button";

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
      
      {/* Catalog Images Grid - Updated to match design */}
      <div className="container px-4 md:px-6 py-12 md:py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
          {catalogImages.map((image, index) => (
            <div 
              key={image.id} 
              className="bg-white p-4 shadow-sm border border-gray-200 rounded-md cursor-pointer hover:shadow-md transition-shadow duration-300"
              onClick={() => openLightbox(index)}
            >
              <div className="relative aspect-[3/4] overflow-hidden">
                {isLoading[index] && (
                  <div className="absolute inset-0 flex items-center justify-center bg-muted">
                    <div className="w-8 h-8 border-4 border-t-transparent border-primary rounded-full animate-spin"></div>
                  </div>
                )}
                <img
                  src={image.src}
                  alt={image.alt}
                  className={`w-full h-full object-contain transition-opacity duration-300 ${isLoading[index] ? 'opacity-0' : 'opacity-100'}`}
                  onLoad={() => handleImageLoad(index)}
                />
              </div>
            </div>
          ))}
        </div>
      </div>
      
      {/* Lightbox Dialog - Updated to match reference image style */}
      <Dialog open={lightboxOpen} onOpenChange={setLightboxOpen}>
        <DialogContent className="max-w-6xl w-full p-0 overflow-hidden bg-white border border-gray-200 rounded-lg shadow-xl"
          style={{ 
            maxHeight: 'calc(100vh - 40px)',
            backdropFilter: 'blur(10px)'
          }}
        >
          <div className="relative w-full h-[calc(100vh-40px)] flex items-center justify-center">
            {/* Close button */}
            <Button
              variant="ghost"
              size="icon"
              className="absolute right-4 top-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md"
              onClick={closeLightbox}
            >
              <X className="h-6 w-6" />
              <span className="sr-only">Close</span>
            </Button>

            {/* Previous image button */}
            <Button
              variant="outline"
              size="icon"
              className="absolute left-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12"
              onClick={(e) => {
                e.stopPropagation();
                goToPrevImage();
              }}
              aria-label="Previous image"
            >
              <ChevronLeft className="h-6 w-6" />
            </Button>

            {/* Image container */}
            <div className="w-full h-full flex items-center justify-center p-4 md:p-8 overflow-auto">
              <img
                src={catalogImages[lightboxIndex].src}
                alt={catalogImages[lightboxIndex].alt}
                className="max-w-full max-h-full object-contain select-none"
              />
            </div>

            {/* Next image button */}
            <Button
              variant="outline"
              size="icon"
              className="absolute right-4 z-50 rounded-full bg-white/80 hover:bg-white shadow-md w-12 h-12"
              onClick={(e) => {
                e.stopPropagation();
                goToNextImage();
              }}
              aria-label="Next image"
            >
              <ChevronRight className="h-6 w-6" />
            </Button>

            {/* Page number indicator */}
            <div className="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-white/80 px-3 py-1 rounded-full text-sm font-medium shadow-md">
              {lightboxIndex + 1} / {catalogImages.length}
            </div>
          </div>
        </DialogContent>
      </Dialog>
      
      <Footer />
    </div>
  );
};

export default Catalog;
