document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    const closeMenu = document.getElementById('closeMenu');

    menuToggle.addEventListener('click', () => {
        mainNav.classList.add('open');
        menuToggle.classList.add('display-none')
    });

    closeMenu.addEventListener('click', () => {
        mainNav.classList.remove('open');
        menuToggle.classList.remove('display-none')
    });

    // Optional: close when clicking a mainNav link (mobile only)
    const navLinks = mainNav.querySelectorAll('a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('open');
        });
    });
});