
const Footer = () => {
  const currentYear = new Date().getFullYear();
  
  const footerLinks = [
    {
      title: "PRODUCTS",
      links: [
        { text: "Kitchen Cabinets", href: "#cabinets" },
        { text: "Cabinet Doors", href: "#doors" },
        { text: "Hardware", href: "#hardware" },
        { text: "Installation", href: "#installation" },
        { text: "Accessories", href: "#accessories" },
      ]
    },
    {
      title: "COMPANY",
      links: [
        { text: "About Us", href: "#about" },
        { text: "Our Story", href: "#story" },
        { text: "Our Team", href: "#team" },
        { text: "Locations", href: "#locations" },
        { text: "Careers", href: "#careers" },
      ]
    },
    {
      title: "SUPPORT",
      links: [
        { text: "FAQs", href: "#faqs" },
        { text: "Contact Us", href: "#contact" },
        { text: "Warranty", href: "#warranty" },
        { text: "Shipping Policy", href: "#shipping" },
        { text: "Returns Policy", href: "#returns" },
      ]
    },
    {
      title: "FOR DEALERS",
      links: [
        { text: "Become a Dealer", href: "#become-dealer" },
        { text: "Dealer Login", href: "#dealer-login" },
        { text: "Resources", href: "#resources" },
        { text: "Marketing Materials", href: "#marketing" },
        { text: "Design Service", href: "#design-service" },
      ]
    },
  ];
  
  const brandLogos = Array(8).fill('/lovable-uploads/e796548d-135b-4831-897d-5e05858ddba9.png');

  return (
    <footer className="bg-[#f5f5f5] pt-16 pb-8">
      <div className="container px-4 md:px-6">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
          {footerLinks.map((column, index) => (
            <div key={index}>
              <h3 className="text-sm font-medium mb-4 tracking-wider">{column.title}</h3>
              <ul className="space-y-2">
                {column.links.map((link, linkIndex) => (
                  <li key={linkIndex}>
                    <a 
                      href={link.href} 
                      className="text-muted-foreground text-sm hover:text-copper transition-colors duration-200"
                    >
                      {link.text}
                    </a>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>
        
        <div className="border-t border-gray-200 pt-8 mt-8">
          <div className="flex flex-wrap gap-4 justify-center mb-8">
            {brandLogos.map((logo, index) => (
              <div key={index} className="w-12 h-12 rounded-full bg-white p-2 flex items-center justify-center">
                <span className="w-6 h-6 bg-gray-200 rounded-full"></span>
              </div>
            ))}
          </div>
          
          <div className="text-center text-sm text-muted-foreground">
            <p className="mb-2">© {currentYear} Fabuwood. All rights reserved.</p>
            <p>
              <a href="#terms" className="hover:text-copper mx-2 transition-colors duration-200">Terms</a>
              <a href="#privacy" className="hover:text-copper mx-2 transition-colors duration-200">Privacy</a>
              <a href="#cookies" className="hover:text-copper mx-2 transition-colors duration-200">Cookies</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
