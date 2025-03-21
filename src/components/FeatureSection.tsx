
import { useEffect, useState, useRef } from 'react';
import { cn } from "@/lib/utils";
import { AspectRatio } from "@/components/ui/aspect-ratio";

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
      className="py-0 overflow-hidden"
    >
      {/* Desktop layout (md and up) */}
      <div className="hidden md:flex md:flex-row w-full max-h-[500px]">
        {!reverse ? (
          <>
            {/* Image on left for odd sections */}
            <div className="w-1/2 max-h-[500px]">
              <div 
                className={cn(
                  "transition-all duration-700",
                  isVisible ? "opacity-100" : "opacity-0"
                )}
              >
                <AspectRatio ratio={1/1} className="h-full max-h-[500px]">
                  <img 
                    src={imageSrc} 
                    alt={imageAlt} 
                    className="w-full h-full object-cover"
                    loading="lazy"
                  />
                </AspectRatio>
              </div>
            </div>
            
            {/* Content on right for odd sections */}
            <div className="w-1/2 flex items-center">
              <div 
                className={cn(
                  "p-16 transition-all duration-700 delay-200",
                  isVisible ? "opacity-100" : "opacity-0"
                )}
              >
                <h2 className="section-title">{title}</h2>
                <p className="section-subtitle">{subtitle}</p>
                <a href={buttonLink} className="copper-btn">{buttonText}</a>
              </div>
            </div>
          </>
        ) : (
          <>
            {/* Content on left for even sections */}
            <div className="w-1/2 flex items-center">
              <div 
                className={cn(
                  "p-16 transition-all duration-700 delay-200",
                  isVisible ? "opacity-100" : "opacity-0"
                )}
              >
                <h2 className="section-title">{title}</h2>
                <p className="section-subtitle">{subtitle}</p>
                <a href={buttonLink} className="copper-btn">{buttonText}</a>
              </div>
            </div>
            
            {/* Image on right for even sections */}
            <div className="w-1/2 max-h-[500px]">
              <div 
                className={cn(
                  "transition-all duration-700",
                  isVisible ? "opacity-100" : "opacity-0"
                )}
              >
                <AspectRatio ratio={1/1} className="h-full max-h-[500px]">
                  <img 
                    src={imageSrc} 
                    alt={imageAlt} 
                    className="w-full h-full object-cover"
                    loading="lazy"
                  />
                </AspectRatio>
              </div>
            </div>
          </>
        )}
      </div>

      {/* Mobile layout (stacked vertically) */}
      <div className="flex flex-col w-full md:hidden">
        {/* Image always appears at top in mobile view */}
        <div className="w-full max-h-[300px]">
          <div 
            className={cn(
              "transition-all duration-700",
              isVisible ? "opacity-100" : "opacity-0"
            )}
          >
            <AspectRatio ratio={1/1} className="h-full max-h-[300px]">
              <img 
                src={imageSrc} 
                alt={imageAlt} 
                className="w-full h-full object-cover"
                loading="lazy"
              />
            </AspectRatio>
          </div>
        </div>
        
        {/* Content always appears below in mobile view */}
        <div className="w-full">
          <div 
            className={cn(
              "p-8 transition-all duration-700 delay-200",
              isVisible ? "opacity-100" : "opacity-0"
            )}
          >
            <h2 className="section-title">{title}</h2>
            <p className="section-subtitle">{subtitle}</p>
            <a href={buttonLink} className="copper-btn">{buttonText}</a>
          </div>
        </div>
      </div>
    </section>
  );
};

export default FeatureSection;
