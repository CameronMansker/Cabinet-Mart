
import { useEffect } from 'react';
import PolicyLayout from '@/components/PolicyLayout';

const PrivacyPolicy = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Privacy Policy">
      <p className="text-sm text-muted-foreground mb-6">Last updated: January 1, 2023</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6">1. Information We Collect</h2>
      <p>Cabinet Mart collects information that you provide directly to us, information we collect automatically when you use our services, and information from third parties.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Information You Provide</h3>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Contact information (name, email address, mailing address, phone number)</li>
        <li className="mb-2">Account credentials (username, password)</li>
        <li className="mb-2">Payment information (credit card details, billing address)</li>
        <li className="mb-2">Order information (products purchased, delivery details)</li>
        <li className="mb-2">Communications and correspondence with us</li>
      </ul>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Information Collected Automatically</h3>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Device information (IP address, browser type, operating system)</li>
        <li className="mb-2">Usage information (pages visited, time spent on site, links clicked)</li>
        <li className="mb-2">Location information</li>
        <li className="mb-2">Cookies and similar tracking technologies</li>
      </ul>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">2. How We Use Your Information</h2>
      <p>We use the information we collect to:</p>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Process and fulfill your orders</li>
        <li className="mb-2">Communicate with you about your orders and account</li>
        <li className="mb-2">Provide customer support</li>
        <li className="mb-2">Improve and develop our products and services</li>
        <li className="mb-2">Personalize your experience</li>
        <li className="mb-2">Send marketing communications (if you opt in)</li>
        <li className="mb-2">Protect against fraud and unauthorized transactions</li>
        <li className="mb-2">Comply with legal obligations</li>
      </ul>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">3. Information Sharing</h2>
      <p>We may share your information with:</p>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Service providers who perform services on our behalf</li>
        <li className="mb-2">Business partners with your consent</li>
        <li className="mb-2">Legal authorities when required by law</li>
        <li className="mb-2">In connection with a business transaction (merger, acquisition, sale)</li>
      </ul>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">4. Your Choices</h2>
      <p>You have certain rights regarding your personal information:</p>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Access, correct, or delete your personal information</li>
        <li className="mb-2">Opt-out of marketing communications</li>
        <li className="mb-2">Disable cookies through your browser settings</li>
        <li className="mb-2">Request data portability where applicable by law</li>
      </ul>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">5. Data Security</h2>
      <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, loss, or alteration.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">6. Data Retention</h2>
      <p>We retain your personal information for as long as necessary to fulfill the purposes for which we collected it, including for the purposes of satisfying any legal, accounting, or reporting requirements.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">7. Children's Privacy</h2>
      <p>Our services are not directed to children under 16. We do not knowingly collect personal information from children under 16. If you are a parent or guardian and believe your child has provided us with personal information, please contact us.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">8. Changes to This Privacy Policy</h2>
      <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">9. Contact Us</h2>
      <p>If you have questions about this Privacy Policy or our privacy practices, please contact us at privacy@example.com.</p>
      
      <div className="mt-8 text-sm text-muted-foreground">
        <p>This privacy policy is intended to comply with privacy laws in the jurisdictions where we operate. The rights described may not be applicable to all users depending on your location.</p>
      </div>
    </PolicyLayout>
  );
};

export default PrivacyPolicy;
