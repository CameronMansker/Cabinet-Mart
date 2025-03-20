
import NavigationMenu from '@/components/NavigationMenu';
import Footer from '@/components/Footer';

interface PolicyLayoutProps {
  title: string;
  children: React.ReactNode;
}

const PolicyLayout = ({ title, children }: PolicyLayoutProps) => {
  return (
    <div className="min-h-screen bg-background">
      <NavigationMenu />
      
      {/* Policy Header */}
      <div className="pt-32 pb-8 md:pt-40 md:pb-12 bg-[#f5f5f5]">
        <div className="container px-4 md:px-6">
          <h1 className="text-3xl md:text-4xl font-serif font-medium text-center">{title}</h1>
        </div>
      </div>
      
      {/* Policy Content */}
      <div className="py-12 md:py-16">
        <div className="container px-4 md:px-6">
          <div className="max-w-3xl mx-auto prose prose-headings:font-serif prose-headings:font-medium">
            {children}
          </div>
        </div>
      </div>
      
      <Footer />
    </div>
  );
};

export default PolicyLayout;
