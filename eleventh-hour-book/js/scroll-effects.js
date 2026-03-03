// Modern Scroll Effects & Interactions for The Eleventh Hour Book Page
document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Enhanced Intersection Observer for scroll-triggered animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                // Once revealed, don't hide again
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with reveal class
    const revealElements = document.querySelectorAll('.reveal');
    revealElements.forEach(el => observer.observe(el));

    // Enhanced parallax and 3D effects for book image
    const bookImage = document.querySelector('.book-image');
    const bookWrapper = document.querySelector('.book-image-container');
    const heroSection = document.querySelector('.hero-section');

    if (bookImage && bookWrapper && heroSection) {
        let ticking = false;
        let isHovering = false;

        // Consolidated scroll handler — book parallax only
        if (!prefersReducedMotion) {
            window.addEventListener('scroll', () => {
                if (!ticking && !isHovering) {
                    window.requestAnimationFrame(() => {
                        const scrolled = window.pageYOffset;
                        const heroHeight = heroSection.offsetHeight;

                        // Apply parallax within hero section only
                        if (scrolled < heroHeight) {
                            const parallaxValue = scrolled * 0.2;
                            const rotateValue = scrolled * 0.015;

                            bookImage.style.transform = `
                                translateY(${parallaxValue}px)
                                rotateY(${-rotateValue}deg)
                                scale(1)
                            `;
                        }

                        ticking = false;
                    });

                    ticking = true;
                }
            });
        }

        // Enhanced 3D tilt effect on mouse move
        if (bookWrapper && !prefersReducedMotion) {
            bookWrapper.addEventListener('mouseenter', () => {
                isHovering = true;
            });

            bookWrapper.addEventListener('mousemove', (e) => {
                const rect = bookWrapper.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const centerX = rect.width / 2;
                const centerY = rect.height / 2;

                const rotateX = ((y - centerY) / centerY) * 3;
                const rotateY = ((centerX - x) / centerX) * 3.5;

                bookImage.style.transition = 'transform 0.15s ease-out';
                bookImage.style.transform = `
                    perspective(1200px)
                    rotateX(${-rotateX}deg)
                    rotateY(${rotateY}deg)
                    translateY(-15px)
                    scale(1.05)
                `;
            });

            // Smooth reset on mouse leave
            bookWrapper.addEventListener('mouseleave', () => {
                isHovering = false;
                bookImage.style.transition = 'transform 0.8s cubic-bezier(0.23, 1, 0.32, 1)';
                bookImage.style.transform = '';
            });
        }
    }

    // Add smooth cursor follower effect for CTAs
    const ctaButtons = document.querySelectorAll('.cta-button');
    ctaButtons.forEach(button => {
        if (!prefersReducedMotion) {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.02)';
            });

            button.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        }

        // Ripple effect on click
        button.addEventListener('click', function(e) {
            if (prefersReducedMotion) return;

            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.5);
                left: ${x}px;
                top: ${y}px;
                pointer-events: none;
                animation: ripple 0.6s ease-out;
            `;

            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add CSS for ripple animation
    if (!document.querySelector('#ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // Smooth scroll behavior for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            e.preventDefault();
            const target = document.querySelector(href);
            if (target) {
                target.scrollIntoView({
                    behavior: prefersReducedMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
