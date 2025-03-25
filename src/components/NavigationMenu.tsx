
import { useState, useEffect } from 'react';
import { cn } from "@/lib/utils";
import { Link } from 'react-router-dom';

const NavigationMenu = () => {
  const [scrolled, setScrolled] = useState(false);
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setScrolled(window.scrollY > 50);
    };
    
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const toggleMobileMenu = () => {
    setMobileMenuOpen(!mobileMenuOpen);
  };

  return (
    <header 
      className={cn(
        "fixed top-0 left-0 right-0 w-full z-50 transition-all duration-300",
        scrolled ? "bg-white/90 backdrop-blur-sm shadow-sm py-3" : "bg-transparent py-5"
      )}
    >
      <div className="container mx-auto px-4 md:px-6 flex items-center justify-between">
        <div className="flex items-center">
          <Link to="/" className="text-2xl font-serif font-medium">
            <img src="/lovable-uploads/Logo.svg" alt="Company Logo" className="h-8" />
          </Link>
        </div>
        
        <nav className="hidden md:flex items-center space-x-8">
          <Link to="/" className="nav-link">HOME</Link>
          <Link to="/catalog" className="nav-link">CATALOG</Link>
          <Link to="/about" className="nav-link">ABOUT</Link>
          <Link to="/contact" className="nav-link">CONTACT</Link>
        </nav>
        
        <div className="md:hidden">
          <button 
            className="text-foreground p-2"
            onClick={toggleMobileMenu}
            aria-label={mobileMenuOpen ? "Close menu" : "Open menu"}
          >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              {mobileMenuOpen ? (
                <>
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </>
              ) : (
                <>
                  <line x1="3" y1="12" x2="21" y2="12"></line>
                  <line x1="3" y1="6" x2="21" y2="6"></line>
                  <line x1="3" y1="18" x2="21" y2="18"></line>
                </>
              )}
            </svg>
          </button>
        </div>
      </div>
      
      {/* Mobile Menu */}
      {mobileMenuOpen && (
        <div className="md:hidden bg-white shadow-lg">
          <div className="container mx-auto px-4 py-4">
            <nav className="flex flex-col space-y-4">
              <Link to="/catalog" className="py-2 border-b border-gray-100" onClick={() => setMobileMenuOpen(false)}>CATALOG</Link>
              <Link to="/about" className="py-2 border-b border-gray-100" onClick={() => setMobileMenuOpen(false)}>ABOUT</Link>
              <Link to="/contact" className="py-2" onClick={() => setMobileMenuOpen(false)}>CONTACT</Link>
            </nav>
          </div>
        </div>
      )}
    </header>
  );
};

export default NavigationMenu;
