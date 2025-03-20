
import { Mail, Phone, Clock, MapPin } from "lucide-react";

const Footer = () => {
  const currentYear = new Date().getFullYear();
  
  const footerLinks = [
    {
      title: "CATALOG",
      links: [
        { text: "Decorative Columns", href: "/catalog/decorative-columns" },
        { text: "Ornaments", href: "/catalog/ornaments" },
        { text: "Custom Cabinets", href: "/catalog/custom-cabinets" },
        { text: "Mouldings", href: "/catalog/mouldings" },
        { text: "Decorative Panels", href: "/catalog/decorative-panels" },
        { text: "Butcher Block Tops", href: "/catalog/butcher-block-tops" },
        { text: "Corbels", href: "/catalog/corbels" },
        { text: "Fillers & Panels", href: "/catalog/fillers-panels" }
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
        { text: "FAQs", href: "/faq" },
        { text: "Contact Us", href: "/contact" },
        { text: "Warranty", href: "/warranty" },
        { text: "Shipping Policy", href: "/shipping" },
        { text: "Returns Policy", href: "/returns" },
      ]
    },
  ];

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
          
          <div>
            <h3 className="text-sm font-medium mb-4 tracking-wider">CONTACT US</h3>
            <ul className="space-y-3">
              <li className="flex items-start">
                <Mail className="w-4 h-4 mt-1 mr-2 text-copper" />
                <div>
                  <p className="text-sm text-muted-foreground">Business Email:</p>
                  <a href="mailto:sales@example.com" className="text-sm hover:text-copper transition-colors duration-200">
                    sales@example.com
                  </a>
                </div>
              </li>
              <li className="flex items-start">
                <Mail className="w-4 h-4 mt-1 mr-2 text-copper" />
                <div>
                  <p className="text-sm text-muted-foreground">Support Email:</p>
                  <a href="mailto:support@example.com" className="text-sm hover:text-copper transition-colors duration-200">
                    support@example.com
                  </a>
                </div>
              </li>
              <li className="flex items-start">
                <Phone className="w-4 h-4 mt-1 mr-2 text-copper" />
                <div>
                  <p className="text-sm text-muted-foreground">Phone:</p>
                  <a href="tel:+15551234567" className="text-sm hover:text-copper transition-colors duration-200">
                    (555) 123-4567
                  </a>
                </div>
              </li>
              <li className="flex items-start">
                <Clock className="w-4 h-4 mt-1 mr-2 text-copper" />
                <div>
                  <p className="text-sm text-muted-foreground">Hours:</p>
                  <p className="text-sm">Mon-Fri 9AM-5PM EST</p>
                </div>
              </li>
              <li className="flex items-start">
                <MapPin className="w-4 h-4 mt-1 mr-2 text-copper" />
                <div>
                  <p className="text-sm text-muted-foreground">Address:</p>
                  <p className="text-sm">123 Business Street, City, State 12345</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
          
        <div className="text-center text-sm text-muted-foreground">
          <p className="mb-2">© {currentYear} Cabinet Mart. All rights reserved.</p>
          <p>
            <a href="/terms" className="hover:text-copper mx-2 transition-colors duration-200">Terms</a>
            <a href="/privacy" className="hover:text-copper mx-2 transition-colors duration-200">Privacy</a>
            <a href="/cookies" className="hover:text-copper mx-2 transition-colors duration-200">Cookies</a>
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
