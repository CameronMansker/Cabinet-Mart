
import { useEffect } from 'react';
import PolicyLayout from '@/components/PolicyLayout';

const Warranty = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <PolicyLayout title="Warranty Policy">
      <h2 className="text-2xl md:text-3xl font-serif font-medium mt-8 mb-6">Limited Lifetime Warranty</h2>
      <p>Cabinet Mart provides a limited lifetime warranty on all cabinet boxes and drawer boxes against manufacturing defects in material and workmanship under normal use to the original purchaser.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">What's Covered</h3>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Cabinet box construction and assembly</li>
        <li className="mb-2">Drawer box construction and assembly</li>
        <li className="mb-2">Door hinges and drawer glides (5-year warranty)</li>
        <li className="mb-2">Cabinet finish (5-year warranty against peeling or cracking)</li>
      </ul>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">What's Not Covered</h3>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Normal wear and tear</li>
        <li className="mb-2">Damage from misuse, abuse, or improper care</li>
        <li className="mb-2">Damage from improper installation</li>
        <li className="mb-2">Color variations in wood, which are natural characteristics</li>
        <li className="mb-2">Changes due to aging or exposure to light and direct sunlight</li>
        <li className="mb-2">Damage from improper storage or transportation</li>
      </ul>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">How to Submit a Warranty Claim</h3>
      <p>To submit a warranty claim, please contact our customer service department with the following information:</p>
      <ul className="list-disc pl-6 mb-6">
        <li className="mb-2">Original proof of purchase</li>
        <li className="mb-2">Detailed description of the defect</li>
        <li className="mb-2">Photos of the defective product</li>
      </ul>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">What We Will Do</h3>
      <p>Upon confirmation of a valid warranty claim, Cabinet Mart will, at its discretion, repair or replace the defective product or component. Replacement products may be new or refurbished.</p>
      
      <h3 className="text-xl font-serif font-medium mt-6 mb-3">Warranty Limitations</h3>
      <p>This warranty is non-transferable and applies only to the original purchaser. It does not cover products used in commercial applications. Any repair or replacement under this warranty does not extend the original warranty period.</p>
      
      <div className="mt-8 text-sm text-muted-foreground">
        <p className="mb-2">THIS WARRANTY IS IN LIEU OF ALL OTHER WARRANTIES, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. CABINET MART SHALL NOT BE LIABLE FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES RESULTING FROM THE USE OF THE PRODUCTS OR ARISING OUT OF ANY BREACH OF THIS WARRANTY.</p>
        <p>Some states do not allow the exclusion or limitation of incidental or consequential damages or limitations on how long an implied warranty lasts, so the above limitations or exclusions may not apply to you. This warranty gives you specific legal rights, and you may also have other rights which vary from state to state.</p>
      </div>
    </PolicyLayout>
  );
};

export default Warranty;
