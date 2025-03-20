
import { useEffect, useState } from 'react';

const Hero = () => {
  const [loaded, setLoaded] = useState(false);

  useEffect(() => {
    setLoaded(true);
  }, []);

  return (
    <section className="relative h-screen min-h-[600px] w-full overflow-hidden">
      <div className="absolute inset-0 bg-black/30 z-10"></div>
      
      <div 
        className="absolute inset-0 bg-cover bg-center animate-image-zoom"
        style={{ 
          backgroundImage: 'url(/lovable-uploads/e796548d-135b-4831-897d-5e05858ddba9.png)',
          opacity: loaded ? 1 : 0,
          transition: 'opacity 0.8s ease-in'
        }}
      ></div>
      
      <div className="container relative z-20 h-full flex flex-col justify-center px-4 md:px-6">
        <div className={`text-white max-w-2xl transition-all duration-1000 ${loaded ? 'opacity-100' : 'opacity-0 translate-y-10'}`}>
          <div className="flex items-center mb-2">
            <div className="w-8 h-8 flex items-center justify-center mr-3">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16 2L2 9L16 16L30 9L16 2Z" fill="white"/>
                <path d="M2 23L16 30L30 23L16 16L2 23Z" fill="white"/>
              </svg>
            </div>
            <h1 className="text-3xl md:text-5xl font-serif tracking-tight">
              fabuwood
            </h1>
          </div>
          
          <h2 className="text-4xl md:text-5xl lg:text-6xl font-serif font-light italic mb-3 tracking-tight">
            America's most desired <br />kitchens.
          </h2>
          
          <p className="text-sm text-white/80 mb-8">
            Trusted by the nation's best kitchen designers, contractors, and renovators.
          </p>
          
          <div className="flex flex-wrap gap-4">
            <a href="#find-dealer" className="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-2 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              Find a Dealer
            </a>
            <a href="#find-showroom" className="flex items-center gap-2 bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 py-2 transition-all duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Visit a Showroom
            </a>
          </div>
        </div>
      </div>
      
      <div className="absolute bottom-0 left-0 right-0 text-center text-white/80 z-10 py-8 text-sm">
        <p className="text-balance max-w-3xl mx-auto px-4">
          Cabinet maker with 30+ years of experience in crafting handmade, solid wood kitchens.
          Focused on quality, craftsmanship, thoughtful design, and an innovative approach.
        </p>
      </div>
    </section>
  );
};

export default Hero;
