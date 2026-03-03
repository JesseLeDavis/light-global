# LIGHT Global - Launch Checklist

## ✅ SEO & Technical Setup (COMPLETED)

- [x] Dynamic meta titles and descriptions for all pages
- [x] Open Graph tags for social media sharing
- [x] Twitter Card tags
- [x] Structured data (Schema.org) for nonprofit organization
- [x] sitemap.xml created
- [x] robots.txt created
- [x] Canonical URLs
- [x] Privacy Policy page
- [x] Terms of Service page
- [x] Legal links in footer

## 🔧 Pre-Launch Tasks (ACTION REQUIRED)

### 1. Stripe Configuration
- [ ] Replace TEST keys with LIVE keys in `.env`
  - Current: `pk_test_...` and `sk_test_...`
  - Replace with: `pk_live_...` and `sk_live_...`
- [ ] Test a real $1 donation with live keys
- [ ] Verify receipt emails are being sent

### 2. Email Configuration
- [ ] Update SMTP credentials in `send.php` (lines 44-47)
  - Replace `noreply@bitglow.tech` with your Hostinger email
  - Update password
  - Test speaking request form

### 3. Domain & Hosting (Hostinger)
- [x] Upload all files to Hostinger via FTP/cPanel
- [x] Verify `.htaccess` is uploaded (enables clean URLs)
- [x] Ensure `.env` file is created on server (copy from `.env.example`)
- [ ] Add Stripe keys to `.env` on server
- [ ] Verify SSL certificate is installed (HTTPS)
- [ ] Test all pages load correctly

### 4. Sitemap Update
- [ ] Update `sitemap.xml` - replace `https://thelightglobal.com/` with your actual domain
- [ ] Update dates in sitemap to current date

### 5. Google Services
- [ ] Set up Google Search Console
  - Add and verify your domain
  - Submit `sitemap.xml`
- [ ] Set up Google Analytics (optional but recommended)
  - Create GA4 property
  - Add tracking code to `partials/head.php`

### 6. Testing Checklist
- [ ] Test all navigation links
- [ ] Test all forms:
  - [ ] Speaking request form
  - [ ] Donation form (with live keys)
- [ ] Test on mobile devices
- [ ] Test on different browsers (Chrome, Safari, Firefox)
- [ ] Verify all images load
- [ ] Check for broken links
- [ ] Test clean URLs work (e.g., /mission, /give)
- [ ] Verify email receipts for donations
- [ ] Test speaking request emails arrive at DCD@thelightglobal.com

### 7. Social Media
- [ ] Share a page link on Facebook - verify Open Graph preview looks good
- [ ] Share on LinkedIn - verify preview
- [ ] Update social media bios with website link

### 8. Legal Compliance
- [ ] Review Privacy Policy - ensure it matches your actual practices
- [ ] Review Terms of Service - consider legal review
- [ ] Ensure donation receipts mention tax-deductibility correctly

## 📊 Post-Launch Tasks

### Week 1
- [ ] Monitor Google Search Console for crawl errors
- [ ] Check Google Analytics (if installed) for traffic
- [ ] Test donation flow with real donors
- [ ] Monitor email inbox for speaking requests

### Ongoing
- [ ] Keep WordPress/CMS (if added later) and plugins updated
- [ ] Monitor Stripe dashboard for donations
- [ ] Review Google Analytics monthly
- [ ] Update content regularly for SEO

## 🔐 Security Notes

**Important Files (Never Commit to Git):**
- `.env` - Contains Stripe keys and sensitive data
- `vendor/` - Composer dependencies

**Already Protected in `.gitignore`:**
- `.env`
- `vendor/`
- `.DS_Store`

## 📝 Important URLs After Launch

- Homepage: https://thelightglobal.com/
- Give Page: https://thelightglobal.com/give
- Contact: https://thelightglobal.com/contact
- Privacy Policy: https://thelightglobal.com/privacy-policy
- Terms: https://thelightglobal.com/terms-of-service
- Sitemap: https://thelightglobal.com/sitemap.xml

## 🆘 Support Resources

**Stripe:**
- Dashboard: https://dashboard.stripe.com
- Documentation: https://stripe.com/docs

**Google Search Console:**
- https://search.google.com/search-console

**Hostinger:**
- Control Panel: https://hpanel.hostinger.com
- Support: https://www.hostinger.com/support

## 📞 Configuration Summary

**Email Recipients:**
- Speaking Requests → DCD@thelightglobal.com
- Donation Receipts → Automatically via Stripe to donor

**Payment Processing:**
- Stripe (secure, PCI compliant)
- Supports all major credit cards

**Current Features:**
- ✅ Secure donations
- ✅ Speaking request form
- ✅ Contact information
- ✅ SEO optimized
- ✅ Mobile responsive
- ✅ Social sharing ready
- ✅ Legal compliance pages

## 🎉 You're Almost Ready!

Complete the action items above and you'll be ready to launch LIGHT Global's website!

Good luck with the launch! 🚀
