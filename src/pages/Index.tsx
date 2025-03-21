
import { useEffect } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Hero from '@/components/Hero';
import IntroSection from '@/components/IntroSection';
import FeatureSection from '@/components/FeatureSection';
import QualityIndicators from '@/components/QualityIndicators';
import Footer from '@/components/Footer';

const Index = () => {
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

  const featureSections = [
    {
      id: "vision",
      title: "Your Vision + Our Expertise",
      subtitle: "Premium kitchen designs crafted to match your specific style and needs.",
      buttonText: "View Our Work",
      buttonLink: "#gallery",
      imageSrc: "/lovable-uploads/cad.png",
      imageAlt: "Kitchen with wooden cabinets and modern design",
      reverse: false
    },
    {
      id: "door-styles",
      title: "Browse Door Styles",
      subtitle: "Find the perfect door style for your kitchen renovation project.",
      buttonText: "Explore",
      buttonLink: "#door-styles",
      imageSrc: "/lovable-uploads/wood-samples.jpg",
      imageAlt: "Various kitchen cabinet door styles",
      reverse: true
    },
    {
      id: "organization",
      title: "Smart Organization",
      subtitle: "Maximize your space with intelligent storage solutions and accessories.",
      buttonText: "Learn More",
      buttonLink: "#organization",
      imageSrc: "/lovable-uploads/PM-CNC-InUse-1.jpg",
      imageAlt: "Smart kitchen cabinet organization system",
      reverse: false
    },
    {
      id: "cabinetry",
      title: "Why Woodland Cabinetry",
      subtitle: "Experience the difference of premium craftsmanship and materials.",
      buttonText: "Our Story",
      buttonLink: "#about",
      imageSrc: "/lovable-uploads/cargo-unloading.jpg",
      imageAlt: "Woodland cabinetry showcase",
      reverse: true
    },
    {
      id: "finishes",
      title: "Unique Finishes",
      subtitle: "Custom finishes that make your kitchen distinctively yours.",
      buttonText: "View Options",
      buttonLink: "#finishes",
      imageSrc: "/lovable-uploads/maybe-hero.jpg",
      imageAlt: "Kitchen cabinets with unique finishes",
      reverse: false
    }
  ];

  return (
    <div className="min-h-screen bg-background">
      <NavigationMenu />
      <Hero />
      <IntroSection />
      
      {featureSections.map((section, index) => (
        <FeatureSection
          key={section.id}
          id={section.id}
          title={section.title}
          subtitle={section.subtitle}
          buttonText={section.buttonText}
          buttonLink={section.buttonLink}
          imageSrc={section.imageSrc}
          imageAlt={section.imageAlt}
          reverse={section.reverse}
        />
      ))}
      
      <QualityIndicators />
      <Footer />
    </div>
  );
};

export default Index;
