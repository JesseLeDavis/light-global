# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

LIGHT Global is a nonprofit organization website for Darren C Davis's mentorship and leadership development foundation. It is a server-side rendered PHP site with no framework — just PHP partials, custom SCSS, and vanilla JavaScript.

## Development Setup

### Dependencies

Install PHP (Composer) dependencies:
```bash
composer install
```

Install Node dependencies (only `locomotive-scroll`):
```bash
npm install
```

Copy and configure environment variables:
```bash
cp .env.example .env
# Edit .env with real Stripe and SMTP credentials
```

### SASS Compilation

There is no npm build script configured. Compile SCSS manually using the `sass` CLI:
```bash
# One-time compile
sass sass/style.scss css/style.css

# Watch for changes
sass --watch sass/style.scss css/style.css
```

The `eleventh-hour-book/` subdirectory has its own separate SCSS:
```bash
sass --watch eleventh-hour-book/sass/style.scss eleventh-hour-book/css/style.css
```

### Local Development

The site requires a PHP server. Use PHP's built-in server or a tool like MAMP/Herd:
```bash
php -S localhost:8000
```

Note: URL rewriting via `.htaccess` requires Apache with `mod_rewrite`. The built-in PHP server does not support `.htaccess`, so clean URLs (e.g., `/mission` instead of `/mission.php`) won't work locally without Apache.

## Architecture

### Page Structure

Each `.php` file at the root is a full page. Pages set per-page SEO variables, then include shared partials:

```php
$page_title = 'Page Title | LIGHT Global';
$page_description = 'Description for meta tags.';
include('partials/head.php');
include('partials/header.php');
// page content
include('partials/footer.php');
```

**Partials:**
- `partials/head.php` — `<head>` with dynamic meta tags, Open Graph, Twitter Card, CSS links
- `partials/header.php` — Logo + navigation with active page detection
- `partials/footer.php` — Footer nav, social links, Schema.org JSON-LD, script includes

### Backend Endpoints

- `send.php` — Processes the contact/speaking request form via PHPMailer (SMTP to Hostinger)
- `stripe-checkout.php` — Creates a Stripe Checkout Session and redirects to Stripe-hosted checkout
- `donation-success.php` / `donation-cancelled.php` — Post-checkout redirect landing pages

### URL Routing

Clean URLs are handled by `.htaccess` Apache rewrite rules (e.g., `/mission` → `mission.php`). There are also redirect rules for legacy URLs.

### CSS Architecture

```
sass/
├── style.scss            ← Main entry (imports everything)
├── components/
│   ├── header.scss
│   └── footer.scss
└── pages/
    ├── home.scss         ← Imports home sub-partials
    │   └── home/         ← hero, about-us, features, testimonial, cta
    ├── mission.scss
    ├── meet-the-founder.scss
    ├── community.scss
    ├── contact.scss
    ├── give.scss
    ├── gateway-city-project.scss
    ├── donation-result.scss
    └── legal.scss
```

Compiled output goes to `css/style.css` (source maps to `css/style.css.map`). Global CSS variables live in `css/properties.css`; normalization in `css/normalise.css`.

The project uses custom flexbox utility classes prefixed with `fb-` (e.g., `fb-flex`, `fb-row`, `fb-jc-spaceBetween`, `fb-ai-center`) instead of a CSS framework.

### JavaScript

`js/main.js` handles:
1. Mobile hamburger menu toggle
2. Tiny Slider carousel initialization (for testimonials)
3. Intersection Observer for scroll-triggered animations

### External Services

- **Stripe** (`stripe/stripe-php` via Composer): Donation checkout. Keys in `.env` as `STRIPE_PUBLISHABLE_KEY` and `STRIPE_SECRET_KEY`.
- **PHPMailer** (local copy in `phpmailer/`): Contact form SMTP email. Config in `.env` as `SMTP_*` vars.
- **Tiny Slider** (CDN, `tns`): Testimonial carousel.
- **Locomotive Scroll** (npm): Smooth scrolling.
- **Font Awesome 6.5.1** (CDN): Icons.

### Subdirectory: `eleventh-hour-book/`

A separate standalone landing page for Darren's book. It has its own `index.html`, `sass/`, `css/`, and `js/` — not integrated with the main PHP site.

## Environment Variables

All secrets are loaded from `.env` (never committed). The `.env.example` documents all required keys. Both `stripe-checkout.php` and `send.php` use `parse_ini_file(__DIR__ . '/.env')` to load them.
