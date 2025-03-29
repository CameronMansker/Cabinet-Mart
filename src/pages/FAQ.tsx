
import { useEffect } from 'react';
import PolicyLayout from '../components/PolicyLayout';
import React from 'react';

const FAQ = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Frequently Asked Questions">
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6">General Questions</h2>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">What types of wood do you use in your cabinets?</h3>
      <p>We primarily use high-quality hardwoods such as maple, oak, cherry, and birch for our cabinet construction. All our wood is ethically sourced from sustainable forests.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Do you offer custom sizes for your cabinets?</h3>
      <p>Yes, we offer custom sizing for all our cabinet lines. During your consultation, our designers will work with you to determine the perfect dimensions for your space.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">How long does it take to receive my order?</h3>
      <p>Delivery times vary depending on the complexity of your order. Standard cabinets typically take 4-6 weeks from order to delivery, while custom designs may take 6-8 weeks.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">Ordering Process</h2>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">How do I start the ordering process?</h3>
      <p>You can begin by contacting our team through our website, by phone, or by visiting our showroom. We'll schedule a consultation to discuss your needs and preferences.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Do you require a deposit?</h3>
      <p>Yes, we require a 50% deposit to begin processing your order, with the remaining balance due before delivery.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Can I make changes to my order after it's been placed?</h3>
      <p>Minor changes can sometimes be accommodated within the first week after ordering. Significant changes may affect your delivery timeline and final cost.</p>
      
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-10 mb-6">Installation and Maintenance</h2>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Do you provide installation services?</h3>
      <p>We can recommend trusted installation professionals in your area who are experienced with our products.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">How should I care for my wood cabinets?</h3>
      <p>Regular dusting with a soft cloth and occasional cleaning with a mild wood soap will keep your cabinets looking their best. Avoid harsh chemicals and excessive moisture.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">What is your warranty policy?</h3>
      <p>Our cabinets come with a limited lifetime warranty against manufacturing defects. Please refer to our warranty page for complete details.</p>
      
      <div className="mt-12 p-6 bg-secondary rounded-lg">
        <h4 className="text-lg font-serif font-medium mb-3">Still have questions?</h4>
        <p className="mb-4">Our customer service team is here to help with any additional questions you might have.</p>
        <a href="/contact" className="text-copper hover:underline transition-colors duration-300">Contact us</a>
      </div>
    </PolicyLayout>
  );
};

export default FAQ;
