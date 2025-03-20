
import { useEffect } from 'react';
import PolicyLayout from '@/components/PolicyLayout';

const ReturnsPolicy = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Returns Policy">
      <h2>Return Policy Guidelines</h2>
      <p>At Cabinet Mart, we stand behind the quality of our products. We understand that sometimes returns are necessary, and we've established the following policy to ensure a smooth process.</p>
      
      <h3>Custom-Made Products</h3>
      <p>Since our cabinets and woodwork are custom-made to your specifications, they cannot be returned or exchanged except in cases of manufacturing defects. Please carefully review your order specifications before finalizing your purchase.</p>
      
      <h3>Manufacturing Defects</h3>
      <p>If you receive a product with a manufacturing defect:</p>
      <ol>
        <li>Contact our customer service department within 10 days of delivery</li>
        <li>Provide detailed photos of the defect</li>
        <li>Include your order number and contact information</li>
      </ol>
      
      <h3>Damaged During Shipping</h3>
      <p>For products damaged during shipping:</p>
      <ol>
        <li>Note the damage on the delivery receipt at the time of delivery</li>
        <li>Take photos of the damage before unpacking further</li>
        <li>Contact us within 48 hours of delivery</li>
      </ol>
      
      <h3>Return Process for Eligible Items</h3>
      <p>For eligible accessory items (non-custom products) that may be returned:</p>
      <ol>
        <li>Contact customer service to obtain a Return Authorization Number (RAN)</li>
        <li>Package the item securely in its original packaging if possible</li>
        <li>Include the RAN number visibly on the outside of the package</li>
        <li>Ship the item to the address provided by customer service</li>
      </ol>
      
      <h3>Refund Processing</h3>
      <p>Once we receive and inspect your return, we will process your refund or replacement. Refunds will be issued to the original payment method and may take 7-10 business days to appear in your account.</p>
      
      <h3>Restocking Fees</h3>
      <p>A 20% restocking fee may apply to returned non-custom items. This fee will be deducted from your refund amount.</p>
      
      <h3>Non-Returnable Items</h3>
      <p>The following items cannot be returned:</p>
      <ul>
        <li>Custom-made cabinets and woodwork</li>
        <li>Items that have been installed, modified, or altered</li>
        <li>Clearance or discontinued items</li>
        <li>Items without proof of purchase</li>
      </ul>
      
      <div className="mt-8 text-sm text-muted-foreground">
        <p>This returns policy is subject to change without notice. Cabinet Mart reserves the right to refuse returns that do not comply with these guidelines.</p>
      </div>
    </PolicyLayout>
  );
};

export default ReturnsPolicy;
