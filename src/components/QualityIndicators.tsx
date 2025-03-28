
import { useEffect, useState, useRef } from 'react';

interface QualityPoint {
  id: string;
  title: string;
  subtitle: string;
  imageSrc: string;
}

const QualityIndicators = () => {
  const [isVisible, setIsVisible] = useState(false);
  const sectionRef = useRef<HTMLDivElement>(null);

  const qualityPoints: QualityPoint[] = [
    {
      id: "Q1",
      title: "Elegant Solid Wood",
      subtitle: "",
      imageSrc: "/lovable-uploads/wood-samples.jpg"
    },
    {
      id: "Q2",
      title: "Premium Finishes",
      subtitle: "",
      imageSrc: "/lovable-uploads/wood-grain.jpg"
    },
    {
      id: "Q3",
      title: "A+ Quality",
      subtitle: "",
      imageSrc: "/lovable-uploads/wood-samples.jpg"
    }
  ];

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setIsVisible(true);
          observer.unobserve(entry.target);
        }
      },
      {
        threshold: 0.2,
      }
    );

    if (sectionRef.current) {
      observer.observe(sectionRef.current);
    }

    return () => {
      if (sectionRef.current) {
        observer.unobserve(sectionRef.current);
      }
    };
  }, []);

  return (
    <section ref={sectionRef} className="py-20 md:py-28 bg-white">
      <div className="container px-4 md:px-6">
        <div className="max-w-3xl mx-auto text-center mb-16">
          <h2 className="font-serif text-3xl md:text-4xl lg:text-5xl mb-4 italic">Providing the final touch.</h2>
          <p className="text-muted-foreground text-balance">
            Our design-first focus means that your vision becomes reality. We prioritize quality materials, master craftsmenship, and exceptional service to deliver home furniture that last.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-6">
          {qualityPoints.map((point, index) => (
            <div 
              key={point.id}
              className={`transition-all duration-700 delay-${index * 100} ${
                isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'
              }`}
            >
              <div className="image-container mb-4 aspect-square">
                <img 
                  src={point.imageSrc} 
                  alt={point.title} 
                  className="w-full h-full object-cover object-center"
                />
              </div>
              <div className="text-center">
                <div className="feature-number w-8 h-0.5 bg-copper mx-auto mb-2"></div>
                <h3 className="font-serif text-lg">{point.title}</h3>
                {point.subtitle && <p className="text-sm text-muted-foreground">{point.subtitle}</p>}
              </div>
            </div>
          ))}
        </div>

        <div className="flex justify-center mt-16">
          <button className="border border-copper text-copper hover:bg-copper hover:text-white px-8 py-3 rounded-full transition-all duration-300">
            <span className="flex items-center gap-2">
              <span>View all features</span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="1.5" />
                <path d="M12 8L16 12L12 16M8 12H16" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round" />
              </svg>
            </span>
          </button>
        </div>
      </div>
    </section>
  );
};

export default QualityIndicators;
