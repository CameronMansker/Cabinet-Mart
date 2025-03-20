
import { useEffect, useState } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import { 
  Pagination,
  PaginationContent,
  PaginationItem,
  PaginationLink,
  PaginationNext,
  PaginationPrevious
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

const Catalog = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  // State for catalog view type
  const [viewType, setViewType] = useState<'grid' | 'fullpage'>('grid');
  
  // State for current page in pagination view
  const [currentPage, setCurrentPage] = useState(1);
  const totalPages = 12;

  // Catalog images array (0001.png through 0012.png)
  const catalogImages = Array.from({ length: 12 }, (_, i) => ({
    id: i + 1,
    src: `/lovable-uploads/${String(i + 1).padStart(4, '0')}.png`,
    alt: `Catalog page ${i + 1}`
  }));

  // Create pagination array for navigation
  const paginationItems = [];
  for (let i = 1; i <= totalPages; i++) {
    paginationItems.push(i);
  }

  // Handle page change in pagination view
  const handlePageChange = (page: number) => {
    setCurrentPage(page);
    window.scrollTo(0, 0);
  };

  return (
    <div className="min-h-screen bg-background">
      <NavigationMenu />
      
      {/* Catalog Header */}
      <div className="pt-32 pb-8 md:pt-40 md:pb-10 bg-[#f5f5f5]">
        <div className="container px-4 md:px-6">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4 text-center">Our Product Catalog</h1>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto text-center mb-6">
            Browse through our complete catalog of premium wood products and accessories.
          </p>
          
          {/* View Controls */}
          <div className="flex justify-center gap-4 mt-4">
            <button 
              onClick={() => setViewType('grid')}
              className={`px-4 py-2 rounded-md ${viewType === 'grid' ? 'bg-primary text-primary-foreground' : 'bg-secondary text-secondary-foreground'}`}
            >
              Grid View
            </button>
            <button 
              onClick={() => setViewType('fullpage')}
              className={`px-4 py-2 rounded-md ${viewType === 'fullpage' ? 'bg-primary text-primary-foreground' : 'bg-secondary text-secondary-foreground'}`}
            >
              Full Page View
            </button>
          </div>
        </div>
      </div>
      
      {/* Grid View */}
      {viewType === 'grid' && (
        <section className="py-12 md:py-16">
          <div className="container px-4 md:px-6">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              {catalogImages.map((image) => (
                <div key={image.id} className="overflow-hidden rounded-lg border shadow-sm bg-card hover:shadow-md transition-shadow duration-300">
                  <button 
                    onClick={() => {
                      setViewType('fullpage');
                      setCurrentPage(image.id);
                    }}
                    className="w-full"
                  >
                    <div className="relative aspect-[3/4] w-full">
                      <img 
                        src={image.src} 
                        alt={image.alt}
                        className="object-cover w-full h-full"
                      />
                    </div>
                    <div className="p-3 bg-muted/50 text-center">
                      <p className="font-medium">Page {image.id}</p>
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
        <section className="py-12 md:py-16">
          <div className="container px-4 md:px-6 max-w-6xl">
            <Tabs defaultValue="page" className="w-full">
              <TabsList className="grid w-full max-w-md mx-auto grid-cols-2 mb-8">
                <TabsTrigger value="page">Single Page</TabsTrigger>
                <TabsTrigger value="carousel">Carousel View</TabsTrigger>
              </TabsList>
              
              <TabsContent value="page" className="w-full">
                <div className="mx-auto w-full max-w-4xl mb-8">
                  <AspectRatio ratio={2587/3337} className="bg-muted">
                    <ScrollArea className="h-full rounded-md border">
                      <img 
                        src={catalogImages[currentPage - 1].src} 
                        alt={catalogImages[currentPage - 1].alt}
                        className="w-full h-auto"
                      />
                    </ScrollArea>
                  </AspectRatio>
                </div>
                
                <Pagination className="mt-8">
                  <PaginationContent>
                    <PaginationItem>
                      <PaginationPrevious 
                        onClick={() => handlePageChange(Math.max(1, currentPage - 1))}
                        disabled={currentPage === 1}
                      />
                    </PaginationItem>
                    
                    {paginationItems.map((page) => (
                      <PaginationItem key={page} className="hidden sm:inline-block">
                        <PaginationLink 
                          onClick={() => handlePageChange(page)}
                          isActive={currentPage === page}
                        >
                          {page}
                        </PaginationLink>
                      </PaginationItem>
                    ))}
                    
                    <PaginationItem>
                      <PaginationNext 
                        onClick={() => handlePageChange(Math.min(totalPages, currentPage + 1))}
                        disabled={currentPage === totalPages}
                      />
                    </PaginationItem>
                  </PaginationContent>
                </Pagination>
              </TabsContent>
              
              <TabsContent value="carousel">
                <div className="mx-auto w-full max-w-5xl">
                  <Carousel className="w-full">
                    <CarouselContent>
                      {catalogImages.map((image) => (
                        <CarouselItem key={image.id}>
                          <div className="p-1">
                            <AspectRatio ratio={2587/3337} className="bg-muted">
                              <img 
                                src={image.src} 
                                alt={image.alt}
                                className="w-full h-auto object-contain rounded-md"
                              />
                            </AspectRatio>
                            <div className="text-center mt-2">
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
          </div>
        </section>
      )}
      
      {/* Page Navigation Info */}
      {viewType === 'fullpage' && (
        <div className="container px-4 md:px-6 mb-12">
          <div className="flex justify-center">
            <button 
              onClick={() => setViewType('grid')}
              className="px-4 py-2 rounded-md bg-secondary text-secondary-foreground hover:bg-secondary/80 transition-colors"
            >
              Back to Grid View
            </button>
          </div>
        </div>
      )}
      
      <Footer />
    </div>
  );
};

export default Catalog;
