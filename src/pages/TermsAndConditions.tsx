
import { useEffect } from 'react';
import PolicyLayout from '../components/PolicyLayout';
import React from 'react';

const TermsAndConditions = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Terms and Conditions">
      <p className="text-sm text-muted-foreground mb-6">Last updated: January 1, 2023</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6">1. Acceptance of Terms</h2>
      <p>By accessing and using the Cabinet Mart website and services, you agree to be bound by these Terms and Conditions, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">2. Use License</h2>
      <p>Permission is granted to temporarily view the materials on Cabinet Mart's website for personal, non-commercial use only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Modify or copy the materials</li>
        <li className="mb-2">Use the materials for any commercial purpose or for any public display</li>
        <li className="mb-2">Remove any copyright or other proprietary notations from the materials</li>
        <li className="mb-2">Transfer the materials to another person or "mirror" the materials on any other server</li>
      </ul>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">3. Product Information</h2>
      <p>Cabinet Mart strives to provide accurate product information, including specifications, dimensions, and images. However, we do not warrant that product descriptions or other content on the site is accurate, complete, reliable, current, or error-free.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">4. Pricing and Payment</h2>
      <p>All prices are subject to change without notice. Cabinet Mart reserves the right to modify or discontinue products or services without notice. We are not responsible for pricing, typographical, or other errors, and reserve the right to cancel orders arising from such errors.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">5. Order Acceptance and Cancellation</h2>
      <p>Your receipt of an electronic or other form of order confirmation does not signify our acceptance of your order. Cabinet Mart reserves the right to accept or decline your order for any reason. Once an order has been placed, cancellations may be subject to a cancellation fee.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">6. Limitation of Liability</h2>
      <p>In no event shall Cabinet Mart or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Cabinet Mart's website, even if Cabinet Mart or a Cabinet Mart authorized representative has been notified orally or in writing of the possibility of such damage.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">7. Indemnification</h2>
      <p>You agree to indemnify, defend, and hold harmless Cabinet Mart, its officers, directors, employees, agents, and third parties, for any losses, costs, liabilities, and expenses relating to or arising out of your use of the Cabinet Mart website or services.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">8. Governing Law</h2>
      <p>These Terms shall be governed by and construed in accordance with the laws of the state of [Your State], without giving effect to any principles of conflicts of law.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">9. Changes to Terms</h2>
      <p>Cabinet Mart reserves the right to revise these Terms at any time without notice. By using this website, you are agreeing to be bound by the current version of these Terms and Conditions.</p>
      
      <div className="mt-8 text-sm text-muted-foreground">
        <p>If you have any questions or concerns about our Terms and Conditions, please contact us at legal@example.com.</p>
      </div>
    </PolicyLayout>
  );
};

export default TermsAndConditions;
