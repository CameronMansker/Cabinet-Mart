import { useEffect } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import ContactInfo from '@/components/ContactInfo';
import ContactMap from '@/components/ContactMap';
const Contact = () => {
  useEffect(() => {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const href = this.getAttribute('href');
        if (!href) return;
        const targetElement = document.querySelector(href);
        if (!targetElement) return;
        window.scrollTo({
          top: targetElement.getBoundingClientRect().top + window.scrollY - 100,
          behavior: 'smooth'
        });
      });
    });
    return () => {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.removeEventListener('click', () => {});
      });
    };
  }, []);
  return <div className="min-h-screen bg-background">
      <NavigationMenu />
      
      {/* Page Header */}
      <div className="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
        <div className="container px-4 md:px-6">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4">Contact Us</h1>
          <p className="text-muted-foreground text-lg max-w-2xl">
            We'd love to hear from you. Reach out with any questions about our products, services, or to schedule a consultation.
          </p>
        </div>
      </div>
      
      <div className="container px-4 md:px-6 py-16">
        {/* Contact Information */}
        <div className="max-w-3xl mx-auto">
          <ContactInfo />
        </div>
      </div>
      
      {/* Map Section */}
      <div className="bg-secondary py-16">
        <div className="container px-4 md:px-6">
          
          <div className="rounded-lg overflow-hidden shadow-lg">
            <ContactMap />
          </div>
        </div>
      </div>
      
      <Footer />
    </div>;
};
export default Contact;