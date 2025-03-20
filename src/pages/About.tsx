import { useEffect } from 'react';
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';
import TeamMember from '@/components/TeamMember';
import Testimonial from '@/components/Testimonial';

const About = () => {
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

  const teamMembers = [
    {
      name: "Robert Wood",
      role: "Founder & Master Craftsman",
      bio: "With over 30 years of experience in woodworking, Robert founded Cabinet Mart with a vision to create timeless, handcrafted cabinetry that transforms spaces into works of art.",
      image: "/lovable-uploads/example-person.jpeg"
    },
    {
      name: "Sarah Chen",
      role: "Lead Designer",
      bio: "Sarah brings 15 years of interior design expertise to our team, helping clients reimagine their spaces with functional yet elegant cabinet solutions.",
      image: "/lovable-uploads/example-person.jpeg"
    },
    {
      name: "Michael Torres",
      role: "Production Manager",
      bio: "Michael oversees our workshop operations, ensuring each piece meets our rigorous quality standards while maintaining efficient production timelines.",
      image: "/lovable-uploads/example-person.jpeg"
    },
    {
      name: "Emily Johnson",
      role: "Customer Experience Director",
      bio: "Emily ensures that every client interaction exceeds expectations, from initial consultation through installation and beyond.",
      image: "/lovable-uploads/example-person.jpeg"
    }
  ];

  const testimonials = [
    {
      quote: "The craftsmanship in our new kitchen cabinets is exceptional. Every detail shows care and precision.",
      author: "Jessica & Mark T.",
      location: "Springfield, MO",
      image: "/lovable-uploads/example-person.jpeg"
    },
    {
      quote: "We were amazed at how Cabinet Mart transformed our outdated kitchen into a modern, functional space while maintaining the character of our historic home.",
      author: "David Wilson",
      location: "Columbia, MO",
      image: "/lovable-uploads/example-person.jpeg"
    },
    {
      quote: "From design to installation, working with Cabinet Mart was a seamless experience. Their attention to detail is unmatched.",
      author: "Linda & Robert K.",
      location: "Kansas City, MO",
      image: "/lovable-uploads/example-person.jpeg"
    }
  ];

  return (
    <div className="min-h-screen bg-background">
      <NavigationMenu />
      
      {/* Page Header */}
      <div className="pt-32 pb-12 md:pt-40 md:pb-16 bg-secondary">
        <div className="container px-4 md:px-6">
          <h1 className="text-4xl md:text-5xl font-serif font-medium mb-4">Our Story</h1>
          <p className="text-muted-foreground text-lg max-w-2xl">
            Discover the passion, craftsmanship, and dedication behind Cabinet Mart's journey to becoming a leading cabinet maker.
          </p>
        </div>
      </div>
      
      {/* Mission Section */}
      <section className="py-16 md:py-24">
        <div className="container px-4 md:px-6">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
              <h2 className="section-title">Our Mission</h2>
              <p className="text-lg mb-6">
                At Cabinet Mart, we're committed to creating handcrafted, solid wood kitchens that blend timeless design with modern functionality. Each piece we create is built to last generations while reflecting the unique personality of its owners.
              </p>
              <p className="text-lg mb-6">
                Our mission is to preserve the art of traditional woodworking while embracing innovative techniques and sustainable practices that reduce our environmental footprint.
              </p>
              <p className="text-lg">
                We believe that exceptional cabinetry is not just about aesthetics—it's about creating spaces that inspire gathering, connection, and the simple joy of being home.
              </p>
            </div>
            <div className="relative">
              <div className="aspect-square overflow-hidden rounded-lg">
                <img 
                  src="/lovable-uploads/wood-samples.jpg" 
                  alt="Handcrafted wooden cabinet detail" 
                  className="w-full h-full object-cover"
                />
              </div>
              <div className="absolute -bottom-6 -left-6 w-24 h-24 bg-copper rounded-full flex items-center justify-center">
                <span className="text-white font-serif text-lg">Since 1994</span>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      {/* Team Section */}
      <section className="py-16 md:py-24 bg-secondary">
        <div className="container px-4 md:px-6">
          <h2 className="section-title text-center mb-16">Meet Our Team</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {teamMembers.map((member, index) => (
              <TeamMember 
                key={index}
                name={member.name}
                role={member.role}
                bio={member.bio}
                image={member.image}
              />
            ))}
          </div>
        </div>
      </section>
      
      {/* Testimonials Section */}
      <section className="py-16 md:py-24">
        <div className="container px-4 md:px-6">
          <h2 className="section-title text-center mb-16">What Our Clients Say</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {testimonials.map((testimonial, index) => (
              <Testimonial 
                key={index}
                quote={testimonial.quote}
                author={testimonial.author}
                location={testimonial.location}
                image={testimonial.image}
              />
            ))}
          </div>
        </div>
      </section>
      
      {/* Call to Action */}
      <section className="py-16 bg-copper text-white">
        <div className="container px-4 md:px-6 text-center">
          <h2 className="text-3xl md:text-4xl font-serif font-medium mb-6">Ready to Transform Your Space?</h2>
          <p className="text-lg mb-8 max-w-2xl mx-auto">
            Whether you're renovating your kitchen or building a new home, our team is ready to bring your vision to life.
          </p>
          <a href="/contact" className="bg-white text-copper hover:bg-gray-100 px-8 py-3 text-lg font-medium transition-colors duration-300">
            Contact Us Today
          </a>
        </div>
      </section>
      
      <Footer />
    </div>
  );
};

export default About;
