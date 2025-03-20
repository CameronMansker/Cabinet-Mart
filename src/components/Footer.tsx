
const Footer = () => {
  const currentYear = new Date().getFullYear();
  
  const footerLinks = [
    {
      title: "PRODUCTS",
      links: [
        { text: "Decorative Columns", href: "/products/decorative-columns" },
        { text: "Ornaments", href: "/products/ornaments" },
        { text: "Custom Cabinets", href: "/products/custom-cabinets" },
        { text: "Mouldings", href: "/products/mouldings" },
        { text: "Decorative Panels", href: "/products/decorative-panels" },
        { text: "Butcher Block Tops", href: "/products/butcher-block-tops" },
        { text: "Corbels", href: "/products/corbels" },
        { text: "Fillers & Panels", href: "/products/fillers-panels" }
      ]
    },
    {
      title: "COMPANY",
      links: [
        { text: "About Us", href: "/about" },
        { text: "Our Story", href: "/about#story" },
      ]
    },
    {
      title: "SUPPORT",
      links: [
        { text: "FAQs", href: "#faqs" },
        { text: "Contact Us", href: "/contact" },
        { text: "Warranty", href: "#warranty" },
        { text: "Shipping Policy", href: "#shipping" },
        { text: "Returns Policy", href: "#returns" },
      ]
    },
  ];
  
  const brandLogos = Array(8).fill('/lovable-uploads/e796548d-135b-4831-897d-5e05858ddba9.png');

  return (
    <footer className="bg-[#f5f5f5] pt-16 pb-8">
      <div className="container px-4 md:px-6">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
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
          
          <div className="text-center text-sm text-muted-foreground">
            <p className="mb-2">© {currentYear} Cabinet Mart. All rights reserved.</p>
            <p>
              <a href="#terms" className="hover:text-copper mx-2 transition-colors duration-200">Terms</a>
              <a href="#privacy" className="hover:text-copper mx-2 transition-colors duration-200">Privacy</a>
              <a href="#cookies" className="hover:text-copper mx-2 transition-colors duration-200">Cookies</a>
            </p>
          </div>
      </div>
    </footer>
  );
};

export default Footer;
