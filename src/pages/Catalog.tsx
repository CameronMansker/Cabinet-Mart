
import { useEffect, useState, useRef } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import { Button } from "@/components/ui/button";
import { 
  Pagination,
  PaginationContent,
  PaginationItem,
  PaginationLink,
  PaginationNext,
  PaginationPrevious,
  PaginationEllipsis
} from '@/components/ui/pagination';
import { 
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious
} from '@/components/ui/carousel';
import { AspectRatio } from '@/components/ui/aspect-ratio';
import { ScrollArea } from '@/components/ui/scroll-area';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import { Print, ZoomIn, ZoomOut, Printer } from 'lucide-react';
import { useToast } from "@/components/ui/use-toast";

const Catalog = () => {
  const { toast } = useToast();
  const [isLoading, setIsLoading] = useState<boolean[]>(Array(12).fill(true));
  const catalogRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  // State for catalog view type
  const [viewType, setViewType] = useState<'grid' | 'fullpage'>('grid');
  
  // State for current page in pagination view
  const [currentPage, setCurrentPage] = useState(1);
  const totalPages = 12;

  // State for zoom level
  const [zoomLevel, setZoomLevel] = useState(1);
  
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

  // Create pagination array for navigation with ellipsis for larger sets
  const getPaginationItems = () => {
    const items = [];
    const maxVisiblePages = 5; // Number of pages to show excluding ellipsis and first/last
    
    if (totalPages <= maxVisiblePages + 2) {
      // If we have a small number of pages, show all
      for (let i = 1; i <= totalPages; i++) {
        items.push(i);
      }
    } else {
      // Always show first page
      items.push(1);
      
      if (currentPage <= 3) {
        // Near the start
        for (let i = 2; i <= 4; i++) {
          items.push(i);
        }
        items.push('ellipsis');
        items.push(totalPages);
      } else if (currentPage >= totalPages - 2) {
        // Near the end
        items.push('ellipsis');
        for (let i = totalPages - 3; i <= totalPages; i++) {
          items.push(i);
        }
      } else {
        // Middle - show current page and neighbors
        items.push('ellipsis');
        for (let i = currentPage - 1; i <= currentPage + 1; i++) {
          items.push(i);
        }
        items.push('ellipsis');
        items.push(totalPages);
      }
    }
    
    return items;
  };

  // Handle page change in pagination view
  const handlePageChange = (page: number) => {
    setCurrentPage(page);
    window.scrollTo(0, 0);
  };

  // Handle zoom functions
  const zoomIn = () => {
    if (zoomLevel < 2) {
      setZoomLevel(prev => prev + 0.25);
    }
  };

  const zoomOut = () => {
    if (zoomLevel > 0.5) {
      setZoomLevel(prev => prev - 0.25);
    }
  };

  const resetZoom = () => {
    setZoomLevel(1);
  };

  // Handle print function
  const handlePrint = () => {
    window.print();
    toast({
      title: "Print Dialog Opened",
      description: "The catalog page is being prepared for printing.",
      duration: 3000,
    });
  };

  return (
    <div className="min-h-screen bg-background" ref={catalogRef}>
      <NavigationMenu />
      
      {/* Catalog Header */}
      <div className="pt-32 pb-8 md:pt-40 md:pb-10 bg-[#f5f5f5] print:pt-8 print:pb-4">
        <div className="container px-4 md:px-6">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4 text-center">Our Product Catalog</h1>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
            Browse through our complete catalog of premium wood products and accessories.
          </p>
          
          {/* View Controls */}
          <div className="flex justify-center gap-4 mt-4 print:hidden">
            <Button 
              variant="outline"
              onClick={() => setViewType('grid')}
              className={viewType === 'grid' ? 'bg-primary text-primary-foreground' : ''}
            >
              Grid View
            </Button>
            <Button 
              variant="outline"
              onClick={() => setViewType('fullpage')}
              className={viewType === 'fullpage' ? 'bg-primary text-primary-foreground' : ''}
            >
              Full Page View
            </Button>
            <Button 
              variant="outline"
              onClick={handlePrint}
              className="ml-2"
            >
              <Printer className="mr-1" /> Print
            </Button>
          </div>
        </div>
      </div>
      
      {/* Grid View */}
      {viewType === 'grid' && (
        <section className="py-12 md:py-16 print:py-6">
          <div className="container px-4 md:px-6">
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              {catalogImages.map((image, index) => (
                <div 
                  key={image.id} 
                  className="overflow-hidden rounded-lg border shadow-sm bg-card hover:shadow-md transition-shadow duration-300 group"
                >
                  <button 
                    onClick={() => {
                      setViewType('fullpage');
                      setCurrentPage(image.id);
                      resetZoom();
                    }}
                    className="w-full"
                    aria-label={`View catalog page ${image.id}`}
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
                    <div className="p-3 bg-muted/50 text-center">
                      <p className="font-medium">Page {image.id} of {totalPages}</p>
                    </div>
                  </button>
                </div>
              ))}
            </div>
          </div>
        </section>
      )}
      
      {/* Full Page View */}
      {viewType === 'fullpage' && (
        <section className="py-12 md:py-16 print:py-4">
          <div className="container px-4 md:px-6 max-w-6xl">
            <Tabs defaultValue="page" className="w-full print:hidden">
              <TabsList className="grid w-full max-w-md mx-auto grid-cols-2 mb-8">
                <TabsTrigger value="page">Single Page</TabsTrigger>
                <TabsTrigger value="carousel">Carousel View</TabsTrigger>
              </TabsList>
              
              <TabsContent value="page" className="w-full">
                <div className="mx-auto w-full max-w-4xl mb-8 relative group">
                  {/* Zoom Controls */}
                  <div className="absolute top-2 right-2 z-10 flex gap-2 bg-background/80 p-2 rounded-md shadow-sm opacity-80 group-hover:opacity-100 transition-opacity print:hidden">
                    <Button variant="outline" size="icon" onClick={zoomIn} aria-label="Zoom in">
                      <ZoomIn className="h-4 w-4" />
                    </Button>
                    <Button variant="outline" size="icon" onClick={zoomOut} aria-label="Zoom out">
                      <ZoomOut className="h-4 w-4" />
                    </Button>
                    <Button variant="outline" size="sm" onClick={resetZoom}>
                      Reset
                    </Button>
                  </div>
                  
                  <AspectRatio ratio={2587/3337} className="bg-muted border rounded-md overflow-hidden">
                    <ScrollArea className="h-full w-full rounded-md">
                      <div style={{ transform: `scale(${zoomLevel})`, transformOrigin: 'top left', width: `${100 / zoomLevel}%`, height: `${100 / zoomLevel}%` }} className="transition-transform duration-200">
                        <img 
                          src={catalogImages[currentPage - 1].src} 
                          alt={catalogImages[currentPage - 1].alt}
                          className="w-full h-auto"
                          loading="eager"
                        />
                      </div>
                    </ScrollArea>
                  </AspectRatio>
                  
                  <div className="mt-4 text-center text-muted-foreground">
                    <p>Page {currentPage} of {totalPages}</p>
                  </div>
                </div>
                
                <Pagination className="mt-8 print:hidden">
                  <PaginationContent>
                    <PaginationItem>
                      <Button
                        variant="outline"
                        onClick={() => handlePageChange(Math.max(1, currentPage - 1))}
                        disabled={currentPage === 1}
                      >
                        <span className="sr-only">Go to previous page</span>
                        Previous
                      </Button>
                    </PaginationItem>
                    
                    {getPaginationItems().map((item, i) => (
                      item === 'ellipsis' ? (
                        <PaginationItem key={`ellipsis-${i}`} className="hidden sm:inline-block">
                          <PaginationEllipsis />
                        </PaginationItem>
                      ) : (
                        <PaginationItem key={item} className="hidden sm:inline-block">
                          <PaginationLink 
                            href="#"
                            onClick={(e) => {
                              e.preventDefault();
                              handlePageChange(item as number);
                            }}
                            isActive={currentPage === item}
                          >
                            {item}
                          </PaginationLink>
                        </PaginationItem>
                      )
                    ))}
                    
                    <PaginationItem>
                      <Button
                        variant="outline"
                        onClick={() => handlePageChange(Math.min(totalPages, currentPage + 1))}
                        disabled={currentPage === totalPages}
                      >
                        <span className="sr-only">Go to next page</span>
                        Next
                      </Button>
                    </PaginationItem>
                  </PaginationContent>
                </Pagination>
              </TabsContent>
              
              <TabsContent value="carousel">
                <div className="mx-auto w-full max-w-5xl">
                  <Carousel className="w-full">
                    <CarouselContent>
                      {catalogImages.map((image, index) => (
                        <CarouselItem key={image.id}>
                          <div className="p-1">
                            <AspectRatio ratio={2587/3337} className="bg-muted border rounded-md overflow-hidden">
                              {isLoading[index] && (
                                <div className="absolute inset-0 flex items-center justify-center bg-muted">
                                  <div className="w-8 h-8 border-4 border-primary border-t-transparent rounded-full animate-spin"></div>
                                </div>
                              )}
                              <img 
                                src={image.src} 
                                alt={image.alt}
                                className="w-full h-auto object-contain"
                                loading={index < 3 ? "eager" : "lazy"}
                                onLoad={() => handleImageLoad(index)}
                              />
                            </AspectRatio>
                            <div className="text-center mt-4">
                              <p className="text-muted-foreground">Page {image.id} of {totalPages}</p>
                            </div>
                          </div>
                        </CarouselItem>
                      ))}
                    </CarouselContent>
                    <CarouselPrevious className="left-2" />
                    <CarouselNext className="right-2" />
                  </Carousel>
                </div>
              </TabsContent>
            </Tabs>
            
            {/* Print-only view */}
            <div className="hidden print:block">
              <img 
                src={catalogImages[currentPage - 1].src} 
                alt={catalogImages[currentPage - 1].alt}
                className="w-full h-auto max-h-[calc(100vh-200px)]"
              />
              <div className="text-center mt-4">
                <p className="text-muted-foreground">Page {currentPage} of {totalPages}</p>
              </div>
            </div>
          </div>
        </section>
      )}
      
      {/* Page Navigation Info */}
      {viewType === 'fullpage' && (
        <div className="container px-4 md:px-6 mb-12 print:hidden">
          <div className="flex justify-center">
            <Button 
              variant="outline"
              onClick={() => setViewType('grid')}
              className="hover:bg-secondary/80 transition-colors"
            >
              Back to Grid View
            </Button>
          </div>
        </div>
      )}
      
      {/* Print-specific styles */}
      <style jsx global>{`
        @media print {
          nav, footer, .print\\:hidden {
            display: none !important;
          }
          body {
            background: white;
          }
          .print\\:block {
            display: block !important;
          }
          .print\\:py-4 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
          }
          .print\\:py-6 {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
          }
          .print\\:pt-8 {
            padding-top: 2rem !important;
          }
          .print\\:pb-4 {
            padding-bottom: 1rem !important;
          }
        }
      `}</style>
      
      <Footer />
    </div>
  );
};

export default Catalog;
