
interface TestimonialProps {
  quote: string;
  author: string;
  location: string;
  image: string;
}

const Testimonial = ({ quote, author, location, image }: TestimonialProps) => {
  return (
    <div className="bg-secondary p-6 rounded-lg shadow-sm relative">
      <div className="absolute -top-6 left-6 w-12 h-12 rounded-full overflow-hidden border-4 border-white">
        <img 
          src={image} 
          alt={author} 
          className="w-full h-full object-cover"
        />
      </div>
      <div className="pt-6">
        <svg className="h-8 w-8 text-copper opacity-40 mb-2" fill="currentColor" viewBox="0 0 32 32">
          <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
        </svg>
        <p className="mb-4 text-foreground">{quote}</p>
        <p className="font-medium">{author}</p>
        <p className="text-sm text-muted-foreground">{location}</p>
      </div>
    </div>
  );
};

export default Testimonial;
