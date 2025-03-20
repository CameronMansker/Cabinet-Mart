
import { useState, useEffect } from 'react';
import { cn } from "@/lib/utils";

const NavigationMenu = () => {
  const [scrolled, setScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50);
    };
    
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <header 
      className={cn(
        "fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300",
        scrolled ? "bg-white/90 backdrop-blur-sm shadow-sm py-3" : "bg-transparent py-5"
      )}
    >
      <div className="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <div className="flex items-center">
          <a href="/" className="text-2xl font-serif font-medium">
            <span className="text-copper">fabu</span>wood
          </a>
        </div>
        
        <nav className="hidden md:flex items-center space-x-8">
          <a href="#cabinets" className="nav-link">CABINETS</a>
          <a href="#doors" className="nav-link">DOORS</a>
          <a href="#surfaces" className="nav-link">SURFACES</a>
          <a href="#styles" className="nav-link">STYLES</a>
          <a href="#blog" className="nav-link">BLOG</a>
          <a href="#design" className="nav-link">DESIGN</a>
          <a href="#contact" className="nav-link">CONTACT</a>
        </nav>
        
        <div className="md:hidden">
          <button className="text-foreground p-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
          </button>
        </div>
      </div>
    </header>
  );
};

export default NavigationMenu;
