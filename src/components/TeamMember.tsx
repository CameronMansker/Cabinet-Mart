
import { cn } from "@/lib/utils";

interface TeamMemberProps {
  name: string;
  role: string;
  bio: string;
  image: string;
}

const TeamMember = ({ name, role, bio, image }: TeamMemberProps) => {
  return (
    <div className="group">
      <div className="aspect-square overflow-hidden rounded-lg mb-4 relative">
        <img 
          src={image} 
          alt={name} 
          className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
      </div>
      <h3 className="text-xl font-medium">{name}</h3>
      <p className="text-copper mb-2">{role}</p>
      <p className="text-muted-foreground text-sm">{bio}</p>
    </div>
  );
};

export default TeamMember;
