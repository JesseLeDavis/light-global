# Stripe Integration Setup Guide

## Prerequisites

You need Composer installed to use the Stripe PHP library. If you don't have it:

**Install Composer on Mac:**
```bash
brew install composer
```

Or download from: https://getcomposer.org/download/

## Step 1: Install Stripe PHP Library

Run this command in your project directory:

```bash
composer require stripe/stripe-php
```

This will create a `vendor` folder with the Stripe library and an `autoload.php` file.

## Step 2: Create Your .env File

Copy the example file:
```bash
cp .env.example .env
```

Then edit `.env` and add your Stripe keys:

```
# Get these from: https://dashboard.stripe.com/apikeys

# Start with TEST keys for testing
STRIPE_PUBLISHABLE_KEY=pk_test_your_actual_key_here
STRIPE_SECRET_KEY=sk_test_your_actual_key_here

# Organization info
STRIPE_STATEMENT_DESCRIPTOR=LIGHT Global
STRIPE_RECEIPT_EMAIL=info@thelightglobal.com
```

**IMPORTANT:** Never commit your `.env` file to git! It's already in `.gitignore`.

## Step 3: Find Your Stripe Keys

1. Go to https://dashboard.stripe.com/apikeys
2. You'll see two types of keys:
   - **Publishable key** (pk_test_...) - Safe to use in frontend
   - **Secret key** (sk_test_...) - Keep this secret!

3. Copy both keys to your `.env` file

## Step 4: Test the Integration

1. Use your TEST keys first (they start with `pk_test_` and `sk_test_`)
2. Visit your Give page: `yoursite.com/give`
3. Try making a test donation
4. Use Stripe's test card: `4242 4242 4242 4242`
   - Any future expiration date
   - Any 3-digit CVC
   - Any ZIP code

## Step 5: Go Live (When Ready)

1. In your Stripe Dashboard, activate your account
2. Get your LIVE keys (they start with `pk_live_` and `sk_live_`)
3. Replace the TEST keys in your `.env` file with LIVE keys
4. That's it! Real donations will now be processed

## Files Created

- `give.php` - Updated with donation form
- `stripe-checkout.php` - Handles Stripe checkout sessions
- `donation-success.php` - Thank you page after successful donation
- `donation-cancelled.php` - Page shown if donation is cancelled
- `.env.example` - Template for environment variables
- `.gitignore` - Protects your secret keys from being committed
- `sass/pages/give.scss` - Donation form styles
- `sass/pages/donation-result.scss` - Success/cancel page styles

## How It Works

1. User selects donation amount on your Give page
2. Clicks "Continue to Payment"
3. `stripe-checkout.php` creates a Stripe Checkout session
4. User is redirected to Stripe's secure payment page
5. After payment, user returns to your success or cancel page

## Troubleshooting

**"composer: command not found"**
- Install Composer: `brew install composer`

**"Error: .env file not found"**
- Create `.env` from `.env.example` and add your keys

**"Unable to process donation"**
- Check that your Stripe keys are correct in `.env`
- Make sure they match (both TEST or both LIVE, not mixed)
- Check server error logs for details

## Support

- Stripe Documentation: https://stripe.com/docs/payments/checkout
- Stripe Dashboard: https://dashboard.stripe.com
- Test Cards: https://stripe.com/docs/testing
