<header class="site-header">
    <div class="container padding-vertical-1">
        <div class="fb-row fb-flex fb-jc-spaceBetween fb-ai-center">
        <!-- Logo -->
            <div class="logo">
                <a href="/">
                    <img src="../assets/images/svg-logo.svg" alt="Light Global Logo">
                </a>
            </div>

            <!-- Hamburger Icon -->
            <button class="menu-toggle" id="menuToggle" aria-label="Open Menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>


        <!-- Mobile Menu Overlay -->
        <nav class="main-nav" id="mainNav">
            <span class="close-menu" id="closeMenu">Close ×</span>
            <ul>
                <li><a href="/" class="<?= basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : '' ?>">Home</a></li>
                <li><a href="/mission" class="<?= basename($_SERVER['PHP_SELF']) === 'mission.php' ? 'active' : '' ?>">Mission</a></li>
                <li><a href="/community" class="<?= basename($_SERVER['PHP_SELF']) === 'community.php' ? 'active' : '' ?>">Community</a></li>
                <li><a href="/meet-the-founder" class="<?= basename($_SERVER['PHP_SELF']) === 'meet-the-founder.php' ? 'active' : '' ?>">Meet The Founder</a></li>
                <li><a href="/gateway-city-project" class="<?= basename($_SERVER['PHP_SELF']) === 'gateway-city-project.php' ? 'active' : '' ?>">Gateway City Project</a></li>
                <li><a href="/contact" class="<?= basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : '' ?>">Contact</a></li>
                <li><a href="/give" class="<?= basename($_SERVER['PHP_SELF']) === 'give.php' ? 'active' : '' ?>">Give</a></li>
            </ul>
        </nav>
        </div>
    </div>

</header>