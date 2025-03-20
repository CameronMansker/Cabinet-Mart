
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
      subtitle: "Get great tools and advice here.",
      buttonText: "Plan Your Dream",
      buttonLink: "#gallery",
      imageSrc: "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png",
      imageAlt: "Kitchen with wooden cabinets and modern design",
      reverse: false
    },
    {
      id: "door-styles",
      title: "Browse Door Styles",
      subtitle: "Visualize door styles & finishes.",
      buttonText: "View Styles",
      buttonLink: "#door-styles",
      imageSrc: "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png",
      imageAlt: "Various kitchen cabinet door styles",
      reverse: true
    },
    {
      id: "organization",
      title: "Smart Organization",
      subtitle: "Organize your life — Your way.",
      buttonText: "Get Organized",
      buttonLink: "#organization",
      imageSrc: "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png",
      imageAlt: "Smart kitchen cabinet organization system",
      reverse: false
    },
    {
      id: "cabinetry",
      title: "Why Woodland Cabinetry",
      subtitle: "Find out about our legacy of quality.",
      buttonText: "See Why",
      buttonLink: "#about",
      imageSrc: "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png",
      imageAlt: "Woodland cabinetry showcase",
      reverse: true
    },
    {
      id: "finishes",
      title: "Unique Finishes",
      subtitle: "View our extensive collection of finishes.",
      buttonText: "View Finishes",
      buttonLink: "#finishes",
      imageSrc: "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png",
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
