document.addEventListener('DOMContentLoaded', () => {
    // === MOBILE MENU TOGGLE ===
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    const closeMenu = document.getElementById('closeMenu');

    menuToggle.addEventListener('click', () => {
        mainNav.classList.add('open');
        menuToggle.classList.add('display-none');
        menuToggle.setAttribute('aria-expanded', 'true');
    });

    closeMenu.addEventListener('click', () => {
        mainNav.classList.remove('open');
        menuToggle.classList.remove('display-none');
        menuToggle.setAttribute('aria-expanded', 'false');
    });

    const navLinks = mainNav.querySelectorAll('a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('open');
            menuToggle.classList.remove('display-none');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });

    // === TINY SLIDER INIT (Testimonials) ===
    if (document.querySelector('.my-slider')) {
        tns({
            container: '.my-slider',
            items: 1,
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            controls: false,
            nav: true,
            touch: true,
            mouseDrag: true,
            gutter: 20,
            responsive: {
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    }

    const animatedBlocks = document.querySelectorAll('.who-we-are, .what-we-do, .why-it-matters');

    const observer = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('animate-in');
                    }, index * 300); // staggered delay
                    observer.unobserve(entry.target);
                }
            });
        },
        {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        }
    );

    animatedBlocks.forEach(block => observer.observe(block));
});
