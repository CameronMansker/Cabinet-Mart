
import { useEffect } from 'react';
import PolicyLayout from '@/components/PolicyLayout';

const PrivacyPolicy = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Privacy Policy">
      <p className="text-sm text-muted-foreground mb-6">Last updated: January 1, 2023</p>
      
      <h2>1. Information We Collect</h2>
      <p>Cabinet Mart collects information that you provide directly to us, information we collect automatically when you use our services, and information from third parties.</p>
      
      <h3>Information You Provide</h3>
      <ul>
        <li>Contact information (name, email address, mailing address, phone number)</li>
        <li>Account credentials (username, password)</li>
        <li>Payment information (credit card details, billing address)</li>
        <li>Order information (products purchased, delivery details)</li>
        <li>Communications and correspondence with us</li>
      </ul>
      
      <h3>Information Collected Automatically</h3>
      <ul>
        <li>Device information (IP address, browser type, operating system)</li>
        <li>Usage information (pages visited, time spent on site, links clicked)</li>
        <li>Location information</li>
        <li>Cookies and similar tracking technologies</li>
      </ul>
      
      <h2>2. How We Use Your Information</h2>
      <p>We use the information we collect to:</p>
      <ul>
        <li>Process and fulfill your orders</li>
        <li>Communicate with you about your orders and account</li>
        <li>Provide customer support</li>
        <li>Improve and develop our products and services</li>
        <li>Personalize your experience</li>
        <li>Send marketing communications (if you opt in)</li>
        <li>Protect against fraud and unauthorized transactions</li>
        <li>Comply with legal obligations</li>
      </ul>
      
      <h2>3. Information Sharing</h2>
      <p>We may share your information with:</p>
      <ul>
        <li>Service providers who perform services on our behalf</li>
        <li>Business partners with your consent</li>
        <li>Legal authorities when required by law</li>
        <li>In connection with a business transaction (merger, acquisition, sale)</li>
      </ul>
      
      <h2>4. Your Choices</h2>
      <p>You have certain rights regarding your personal information:</p>
      <ul>
        <li>Access, correct, or delete your personal information</li>
        <li>Opt-out of marketing communications</li>
        <li>Disable cookies through your browser settings</li>
        <li>Request data portability where applicable by law</li>
      </ul>
      
      <h2>5. Data Security</h2>
      <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, loss, or alteration.</p>
      
      <h2>6. Data Retention</h2>
      <p>We retain your personal information for as long as necessary to fulfill the purposes for which we collected it, including for the purposes of satisfying any legal, accounting, or reporting requirements.</p>
      
      <h2>7. Children's Privacy</h2>
      <p>Our services are not directed to children under 16. We do not knowingly collect personal information from children under 16. If you are a parent or guardian and believe your child has provided us with personal information, please contact us.</p>
      
      <h2>8. Changes to This Privacy Policy</h2>
      <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.</p>
      
      <h2>9. Contact Us</h2>
      <p>If you have questions about this Privacy Policy or our privacy practices, please contact us at privacy@example.com.</p>
      
      <div className="mt-8 text-sm text-muted-foreground">
        <p>This privacy policy is intended to comply with privacy laws in the jurisdictions where we operate. The rights described may not be applicable to all users depending on your location.</p>
      </div>
    </PolicyLayout>
  );
};

export default PrivacyPolicy;
