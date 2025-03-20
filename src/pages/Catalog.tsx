
import { useEffect } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';

const Catalog = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  // Sample catalog categories
  const categories = [
    { name: "Decorative Columns", image: "/lovable-uploads/wood-samples.jpg" },
    { name: "Ornaments", image: "/lovable-uploads/wood-grain.jpg" },
    { name: "Custom Cabinets", image: "/lovable-uploads/maybe-hero.jpg" },
    { name: "Mouldings", image: "/lovable-uploads/wood-samples.jpg" },
    { name: "Decorative Panels", image: "/lovable-uploads/wood-grain.jpg" },
    { name: "Butcher Block Tops", image: "/lovable-uploads/maybe-hero.jpg" },
    { name: "Corbels", image: "/lovable-uploads/wood-samples.jpg" },
    { name: "Fillers & Panels", image: "/lovable-uploads/wood-grain.jpg" },
  ];

  return (
    <div className="min-h-screen bg-background">
      <NavigationMenu />
      
      {/* Catalog Header */}
      <div className="pt-32 pb-12 md:pt-40 md:pb-16 bg-[#f5f5f5]">
        <div className="container px-4 md:px-6 text-center">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4">Our Catalog</h1>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Explore our collection of premium wood products and cabinetry accessories.
          </p>
        </div>
      </div>
      
      {/* Catalog Grid Layout */}
      <section className="py-16 md:py-24">
        <div className="container px-4 md:px-6">
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {categories.map((category, index) => (
              <a 
                key={index} 
                href={`/catalog/${category.name.toLowerCase().replace(/\s+/g, '-')}`}
                className="group block"
              >
                <div className="overflow-hidden rounded-lg aspect-[4/3] mb-4">
                  <img 
                    src={category.image} 
                    alt={category.name}
                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                  />
                </div>
                <h3 className="text-xl font-serif text-center">{category.name}</h3>
              </a>
            ))}
          </div>
        </div>
      </section>
      
      {/* Featured Collections */}
      <section className="py-16 bg-[#f5f5f5]">
        <div className="container px-4 md:px-6">
          <div className="flex flex-col md:flex-row gap-8">
            <div className="md:w-1/2 aspect-[16/9] overflow-hidden rounded-lg">
              <img 
                src="/lovable-uploads/wood-samples.jpg" 
                alt="Premium Wood Collection" 
                className="w-full h-full object-cover"
              />
            </div>
            <div className="md:w-1/2 aspect-[16/9] overflow-hidden rounded-lg">
              <img 
                src="/lovable-uploads/wood-grain.jpg" 
                alt="Staining Collection" 
                className="w-full h-full object-cover"
              />
            </div>
          </div>
        </div>
      </section>
      
      <Footer />
    </div>
  );
};

export default Catalog;
