
/**
 * Cabinet Mart Theme JS
 */
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const href = this.getAttribute('href');
            if (!href || href === '#') return;
            
            const targetElement = document.querySelector(href);
            if (!targetElement) return;
            
            window.scrollTo({
                top: targetElement.getBoundingClientRect().top + window.scrollY - 100,
                behavior: 'smooth'
            });
        });
    });

    // Toggle mobile menu
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', toggleMobileMenu);
    }

    // Header scroll effect
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', function() {
            handleHeaderScroll(header);
        });
        // Initialize header state on page load
        handleHeaderScroll(header);
    }
});

/**
 * Toggle the mobile menu
 */
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuToggle = document.getElementById('mobile-menu-toggle');
    
    if (mobileMenu.classList.contains('hidden')) {
        mobileMenu.classList.remove('hidden');
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';
    } else {
        mobileMenu.classList.add('hidden');
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
    }
}

/**
 * Close the mobile menu
 */
function closeMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuToggle = document.getElementById('mobile-menu-toggle');
    
    if (mobileMenu && menuToggle) {
        mobileMenu.classList.add('hidden');
        menuToggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
    }
}

/**
 * Handle the header scroll effect
 */
function handleHeaderScroll(header) {
    if (window.scrollY > 50) {
        header.classList.remove('bg-transparent', 'py-5');
        header.classList.add('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
    } else if (document.body.classList.contains('home')) {
        header.classList.add('bg-transparent', 'py-5');
        header.classList.remove('bg-white/90', 'backdrop-blur-sm', 'shadow-sm', 'py-3');
    }
}
