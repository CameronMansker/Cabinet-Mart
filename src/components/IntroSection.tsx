
import { useEffect, useState } from 'react';

const IntroSection = () => {
  const [isVisible, setIsVisible] = useState(false);
  
  useEffect(() => {
    setIsVisible(true);
  }, []);
  
  return (
    <section className="bg-primary py-10 text-center">
      <div className="container">
        <p className={`text-balance max-w-3xl mx-auto px-4 text-primary-foreground text-sm md:text-base transition-opacity duration-700 ${isVisible ? 'opacity-100' : 'opacity-0'}`}>
          Cabinet maker with 30+ years of experience in crafting handmade, solid wood kitchens.
          Focused on quality, craftsmanship, thoughtful design, and an innovative approach.
        </p>
      </div>
    </section>
  );
};

export default IntroSection;
