import { Mail, Phone, MapPin, Clock, Facebook } from 'lucide-react';
const ContactInfo = () => {
  return <div>
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
              <span className="block">Monday - Friday: 8:00 AM - 4:30 PM</span>
              
              <span className="block">Saturday & Sunday: Closed</span>
            </p>
          </div>
        </div>
        
        <div className="pt-6 border-t border-border">
          <h3 className="font-medium text-lg mb-3">Connect With Us</h3>
          <div className="flex">
            <a href="https://facebook.com" className="w-10 h-10 bg-secondary rounded-full flex items-center justify-center hover:bg-copper transition-colors" aria-label="Facebook">
              <Facebook className="h-5 w-5" />
            </a>
          </div>
        </div>
      </div>
    </div>;
};
export default ContactInfo;