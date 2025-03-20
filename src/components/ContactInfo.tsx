
import { Mail, Phone, MapPin, Clock } from 'lucide-react';

const ContactInfo = () => {
  return (
    <div>
      <h2 className="text-2xl md:text-3xl font-serif font-medium mb-6">Business Information</h2>
      
      <div className="space-y-6">
        <div className="flex items-start space-x-4">
          <MapPin className="h-6 w-6 text-copper flex-shrink-0 mt-0.5" />
          <div>
            <h3 className="font-medium text-lg">Address</h3>
            <p className="text-muted-foreground">
              2010 East Blaine<br />
              Springfield, MO 65803<br />
              United States
            </p>
          </div>
        </div>
        
        <div className="flex items-start space-x-4">
          <Phone className="h-6 w-6 text-copper flex-shrink-0 mt-0.5" />
          <div>
            <h3 className="font-medium text-lg">Phone</h3>
            <p className="text-muted-foreground">
              <a href="tel:+14175551234" className="hover:text-copper transition-colors">
                (417) 555-1234
              </a>
            </p>
          </div>
        </div>
        
        <div className="flex items-start space-x-4">
          <Mail className="h-6 w-6 text-copper flex-shrink-0 mt-0.5" />
          <div>
            <h3 className="font-medium text-lg">Email</h3>
            <p className="text-muted-foreground">
              <a href="mailto:info@fabuwood.com" className="hover:text-copper transition-colors">
                info@fabuwood.com
              </a>
              <br />
              <a href="mailto:support@fabuwood.com" className="hover:text-copper transition-colors">
                support@fabuwood.com
              </a>
            </p>
          </div>
        </div>
        
        <div className="flex items-start space-x-4">
          <Clock className="h-6 w-6 text-copper flex-shrink-0 mt-0.5" />
          <div>
            <h3 className="font-medium text-lg">Business Hours</h3>
            <p className="text-muted-foreground">
              <span className="block">Monday - Friday: 9:00 AM - 6:00 PM</span>
              <span className="block">Saturday: 10:00 AM - 4:00 PM</span>
              <span className="block">Sunday: Closed</span>
            </p>
          </div>
        </div>
        
        <div className="pt-6 border-t border-border">
          <h3 className="font-medium text-lg mb-3">Connect With Us</h3>
          <div className="flex space-x-4">
            <a href="#" className="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors">
              <span className="sr-only">Facebook</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
              </svg>
            </a>
            <a href="#" className="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors">
              <span className="sr-only">Instagram</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
              </svg>
            </a>
            <a href="#" className="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors">
              <span className="sr-only">LinkedIn</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                <rect x="2" y="9" width="4" height="12"></rect>
                <circle cx="4" cy="4" r="2"></circle>
              </svg>
            </a>
            <a href="#" className="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors">
              <span className="sr-only">Pinterest</span>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <path d="M19 12H5"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ContactInfo;
