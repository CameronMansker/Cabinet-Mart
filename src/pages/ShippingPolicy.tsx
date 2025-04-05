
import { useEffect } from 'react';
import PolicyLayout from '@/components/PolicyLayout';

const ShippingPolicy = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Shipping Policy">
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6">Delivery Information</h2>
      <p>At Cabinet Mart, we take great care to ensure your order arrives safely and on time. Please review our shipping policies below for detailed information about our delivery process.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Shipping Methods</h3>
      <p>We utilize professional freight carriers specializing in cabinet and woodwork delivery. All shipments are carefully packaged to prevent damage during transit.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Delivery Timeframes</h3>
      <p>Standard cabinet orders typically ship within 4-6 weeks from the order date. Custom cabinet orders may require 6-8 weeks before shipping. Actual delivery times may vary based on your location.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Shipping Costs</h3>
      <p>Shipping costs are calculated based on the order size, weight, and delivery location. You will receive a detailed shipping quote as part of your order confirmation.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Order Tracking</h3>
      <p>Once your order ships, you will receive tracking information via email. This will allow you to monitor your shipment and prepare for delivery.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Delivery Appointments</h3>
      <p>The carrier will contact you to schedule a delivery appointment. Please ensure someone is available to receive and inspect the shipment at the scheduled time.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Inspection at Delivery</h3>
      <p>Upon delivery, please inspect all packages for visible damage before signing for receipt. Note any damage on the delivery receipt and take photos if possible.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Damaged Shipments</h3>
      <p>If your order arrives damaged:</p>
      <ol className="list-decimal pl-6 mb-6">
        <li className="mb-2">Note the damage on the delivery receipt</li>
        <li className="mb-2">Take photos of the damage</li>
        <li className="mb-2">Contact our customer service department within 48 hours</li>
      </ol>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Late or Missing Deliveries</h3>
      <p>If your delivery doesn't arrive as scheduled, please contact our customer service team. We will work with the carrier to locate your shipment and provide updates.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">International Shipping</h3>
      <p>We currently ship within the continental United States and Canada. For international shipping inquiries, please contact our customer service team for options and pricing.</p>
      
      <p className="mt-8">For any questions or concerns regarding shipping, please contact our customer service team at shipping@example.com or call (555) 123-4567.</p>
    </PolicyLayout>
  );
};

export default ShippingPolicy;
