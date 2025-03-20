
import { useEffect, useState, useRef } from 'react';
import { cn } from "@/lib/utils";

interface FeatureSectionProps {
  title: string;
  subtitle: string;
  buttonText: string;
  buttonLink: string;
  imageSrc: string;
  imageAlt: string;
  reverse?: boolean;
  id?: string;
}

const FeatureSection: React.FC<FeatureSectionProps> = ({
  title,
  subtitle,
  buttonText,
  buttonLink,
  imageSrc,
  imageAlt,
  reverse = false,
  id
}) => {
  const [isVisible, setIsVisible] = useState(false);
  const sectionRef = useRef<HTMLDivElement>(null);

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
    <section 
      ref={sectionRef}
      id={id}
      className={cn(
        "py-16 md:py-24 overflow-hidden",
        reverse ? "bg-secondary" : "bg-white"
      )}
    >
      <div className="container px-4 md:px-6">
        <div className={cn(
          "grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center",
          reverse ? "md:flex-row-reverse" : ""
        )}>
          <div 
            className={cn(
              "transition-all duration-700 delay-200 flex flex-col items-start justify-center",
              isVisible 
                ? "opacity-100" 
                : "opacity-0",
              reverse 
                ? "md:translate-x-0" 
                : "md:translate-x-0"
            )}
          >
            <h2 className="section-title text-[32px] md:text-[40px] leading-tight mb-2">{title}</h2>
            <p className="text-muted-foreground text-base mb-6">{subtitle}</p>
            <a 
              href={buttonLink} 
              className="bg-copper hover:bg-copper-dark text-white px-6 py-3 rounded-sm transition-all duration-300 text-sm font-medium"
            >
              {buttonText}
            </a>
          </div>
          
          <div 
            className={cn(
              "image-container transition-all duration-700",
              isVisible 
                ? "opacity-100" 
                : "opacity-0",
              reverse 
                ? "md:translate-x-0" 
                : "md:translate-x-0"
            )}
          >
            <img 
              src={imageSrc || "/lovable-uploads/ae19e0c4-0c82-4aa7-a5f6-8966f31df53f.png"} 
              alt={imageAlt} 
              className="w-full h-auto object-cover"
              loading="lazy"
            />
          </div>
        </div>
      </div>
    </section>
  );
};

export default FeatureSection;
