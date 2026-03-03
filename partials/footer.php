<footer>
    <div class="footer-container">
        <div class="footer-top">
            <div class="fb-flex fb-row fb-2"> <img src="/assets/images/footer-logo.svg" alt="LIGHT Global Logo"></div>

            <div class="footer-nav fb-flex fb-row fb-1">
                <div class="fb fb-flex fb fb-column">
                    <a href="/">Home</a>
                    <a href="/mission">Mission</a>
                    <a href="/community">Community</a>
                    <a href="/meet-the-founder">Meet The Founder</a>
                </div>
                <div class="fb fb-flex fb fb-column">
                    <a href="/gateway-city-project">Gateway City Project</a>
                    <a href="/contact">Contact</a>
                    <a href="/give">Give</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom fb-flex fb-row fb-jc-spaceBetween">
            <div class="footer-left">
                <p>&copy; <?= date("Y") ?> Light Global. All rights reserved.</p>
                <div class="footer-legal-links">
                    <a href="/privacy-policy">Privacy Policy</a>
                    <span class="separator">|</span>
                    <a href="/terms-of-service">Terms of Service</a>
                </div>
            </div>
            <div class="footer-image-container fb-flex fb-row fb-ai-center">
                <a href="https://www.facebook.com/darrencdavis.transformation" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><img src="/assets/images/facebook.svg" alt="Facebook"></a>
                <a href="https://www.instagram.com/darrencdavis/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><img src="/assets/images/instagram.svg" alt="Instagram"></a>
                <a href="https://www.linkedin.com/in/darren-c-davis-738741261/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><img src="/assets/images/linkedin.svg" alt="LinkedIn"></a>
            </div>
        </div>
    </div>

</footer>

<!-- Structured Data (Schema.org) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NonprofitOrganization",
  "name": "LIGHT Global",
  "alternateName": "LIGHT Global",
  "url": "<?php echo (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>",
  "logo": "<?php echo (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST']; ?>/assets/images/svg-logo.svg",
  "description": "Equipping high-achieving leaders to expand their Kingdom impact through transformative mentorship.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "721 SE 1st Ct",
    "addressLocality": "Pompano Beach",
    "addressRegion": "FL",
    "postalCode": "33060",
    "addressCountry": "US"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+1-954-247-8187",
    "contactType": "General Inquiries",
    "email": "info@thelightglobal.com"
  },
  "founder": {
    "@type": "Person",
    "name": "Darren C Davis",
    "jobTitle": "Founder",
    "description": "Former Fortune 100 Executive, international speaker, and author of The Eleventh Hour"
  },
  "sameAs": [
    "https://www.facebook.com/darrencdavis.transformation",
    "https://www.instagram.com/darrencdavis/",
    "https://www.linkedin.com/in/darren-c-davis-738741261/"
  ]
}
</script>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
