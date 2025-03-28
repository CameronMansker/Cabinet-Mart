
// Navigation.js - Handles navigation and UI interactions

document.addEventListener('DOMContentLoaded', function() {
  // Variables
  const header = document.querySelector('header');
  const mobileMenuToggle = document.querySelector('.js-mobile-menu-toggle');
  const mobileMenu = document.querySelector('.js-mobile-menu');
  const menuIcon = document.querySelector('.js-menu-icon');
  const transparentNav = document.querySelector('.js-nav-transparent');
  const heroContent = document.querySelector('.js-hero-content');
  
  // Mobile menu toggle
  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      
      // Update menu icon
      if (menuIcon) {
        if (mobileMenu.classList.contains('hidden')) {
          menuIcon.innerHTML = `
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          `;
        } else {
          menuIcon.innerHTML = `
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          `;
        }
      }
    });
  }
  
  // Transparent header scroll handling
  if (transparentNav) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.remove('bg-transparent', 'py-5');
        header.classList.add('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
      } else {
        header.classList.add('bg-transparent', 'py-5');
        header.classList.remove('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
      }
    });
  }
  
  // Contact form handling
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Simple form validation
      const nameInput = document.getElementById('name');
      const emailInput = document.getElementById('email');
      const messageInput = document.getElementById('message');
      
      if (!nameInput.value || !emailInput.value || !messageInput.value) {
        alert('Please fill in all required fields.');
        return;
      }
      
      // Simulate form submission
      const submitButton = contactForm.querySelector('button[type="submit"]');
      const originalText = submitButton.textContent;
      
      submitButton.disabled = true;
      submitButton.textContent = 'Sending...';
      
      setTimeout(function() {
        // Show success message
        alert('Thank you for your message! We will contact you soon.');
        
        // Reset form
        contactForm.reset();
        
        // Reset button
        submitButton.disabled = false;
        submitButton.textContent = originalText;
      }, 1500);
    });
  }
  
  // Feature sections intersection observer
  const featureSections = document.querySelectorAll('.feature-section');
  if (featureSections.length > 0) {
    const featureObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const image = entry.target.querySelector('.js-feature-image');
            const content = entry.target.querySelector('.js-feature-content');
            
            if (image) image.style.opacity = '1';
            if (content) {
              content.style.opacity = '1';
              content.style.transform = 'translateY(0)';
            }
            
            featureObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.2 }
    );
    
    featureSections.forEach((section) => {
      const image = section.querySelector('.js-feature-image');
      const content = section.querySelector('.js-feature-content');
      
      if (image) image.style.opacity = '0';
      if (content) {
        content.style.opacity = '0';
        content.style.transform = 'translateY(20px)';
      }
      
      featureObserver.observe(section);
    });
  }
  
  // Hero animation
  if (heroContent) {
    setTimeout(() => {
      heroContent.classList.add('opacity-100');
      heroContent.classList.remove('opacity-0', 'translate-y-10');
    }, 300);
  }
});
