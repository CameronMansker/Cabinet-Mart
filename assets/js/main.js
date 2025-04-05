
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuIcon = document.querySelector('.mobile-menu-icon');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            
            // Update the mobile menu icon
            if (mobileMenuIcon) {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenuIcon.innerHTML = `
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    `;
                } else {
                    mobileMenuIcon.innerHTML = `
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    `;
                }
            }
        });
    }
    
    // Header scroll effect
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                header.classList.remove('bg-transparent', 'py-5');
                header.classList.add('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
            } else {
                // Only revert to transparent if on homepage
                if (document.body.classList.contains('home')) {
                    header.classList.add('bg-transparent', 'py-5');
                    header.classList.remove('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
                }
            }
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                
                const targetElement = document.querySelector(href);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.getBoundingClientRect().top + window.scrollY - 100,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        if (mobileMenuIcon) {
                            mobileMenuIcon.innerHTML = `
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            `;
                        }
                    }
                }
            }
        });
    });
    
    // Animate quality points on scroll
    const animateOnScroll = function() {
        const qualityPoints = document.querySelectorAll('.animate-quality-point');
        
        if (qualityPoints.length) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });
            
            qualityPoints.forEach(point => {
                observer.observe(point);
            });
        }
    };
    
    animateOnScroll();
});
