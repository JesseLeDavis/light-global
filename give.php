<?php
$page_title = 'Donate to LIGHT Global | Support Transformative Leadership';
$page_description = 'Your donation equips leaders and transforms communities. Support LIGHT Global\'s mission to advance Kingdom impact worldwide.';
include('partials/head.php');
?>
<?php include('partials/header.php'); ?>

    <main class="give-page">

        <section class="give-header">
            <h1>Fuel the Mission.<br> Transform Nations.</h1>
            <p class="subheadline">
                Your generosity helps equip leaders, impact cities, and advance the Kingdom through transformative mentorship.
            </p>
        </section>

        <section class="give-info">
            <p>
                I extend my deepest gratitude to the generous donors whose unwavering support enables LIGHT Global to carry out its vital mission "To Elevate “Kingdom” Impact Through Transformative Mentorship". Your contributions are the lifeblood of our organization, fueling our efforts to bring transformation to Gateway Cities across the world.
            </p>
            <p>Through your generosity, we are able to empower leaders, and create lasting change. We are truly grateful for your partnership!</p>

            <div class="signature-section">
                <img src="assets/images/signature.png" alt="Darren C Davis Signature" class="signature">
                <div class="founder-info">
                    <img src="assets/images/dad-headshot.jpg" alt="Darren C Davis" class="founder-photo">
                    <div class="founder-details">
                        <p class="founder-name">Darren C Davis</p>
                        <p class="founder-title">Founder, LIGHT Global</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="give-form-section">
            <div class="give-form-container">
                <h2>Choose Your Gift Amount</h2>

                <form id="donationForm" action="stripe-checkout.php" method="POST">
                    <div class="amount-options">
                        <button type="button" class="amount-btn" data-amount="25">$25</button>
                        <button type="button" class="amount-btn" data-amount="50">$50</button>
                        <button type="button" class="amount-btn" data-amount="100">$100</button>
                        <button type="button" class="amount-btn" data-amount="250">$250</button>
                        <button type="button" class="amount-btn" data-amount="500">$500</button>
                    </div>

                    <div class="custom-amount">
                        <label for="customAmount">Or enter a custom amount:</label>
                        <div class="custom-amount-input">
                            <span class="currency-symbol">$</span>
                            <input
                                type="number"
                                id="customAmount"
                                name="custom_amount"
                                min="1"
                                step="1"
                                placeholder="Enter amount"
                            >
                        </div>
                    </div>

                    <input type="hidden" name="amount" id="selectedAmount" required>

                    <div class="form-message" id="formMessage"></div>

                    <button type="submit" class="btn-large btn-light-blue submit-btn" id="submitBtn">
                        Continue to Payment
                    </button>
                </form>

                <p class="secure-note">
                    <i class="fas fa-lock"></i> Secure payment powered by Stripe
                </p>
            </div>
        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('donationForm');
            const amountBtns = document.querySelectorAll('.amount-btn');
            const customAmountInput = document.getElementById('customAmount');
            const selectedAmountInput = document.getElementById('selectedAmount');
            const formMessage = document.getElementById('formMessage');
            const submitBtn = document.getElementById('submitBtn');

            // Handle preset amount button clicks
            amountBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    amountBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    // Set the hidden input value
                    selectedAmountInput.value = this.dataset.amount;
                    // Clear custom amount
                    customAmountInput.value = '';
                    // Clear error message
                    formMessage.textContent = '';
                    formMessage.className = 'form-message';
                });
            });

            // Handle custom amount input
            customAmountInput.addEventListener('input', function() {
                if (this.value) {
                    // Remove active class from preset buttons
                    amountBtns.forEach(b => b.classList.remove('active'));
                    // Set the hidden input value
                    selectedAmountInput.value = this.value;
                    // Clear error message
                    formMessage.textContent = '';
                    formMessage.className = 'form-message';
                }
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const amount = selectedAmountInput.value;

                // Validate amount
                if (!amount || amount < 1) {
                    formMessage.textContent = 'Please select or enter a donation amount.';
                    formMessage.className = 'form-message error';
                    return;
                }

                // Disable submit button and show loading
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading"></span>Processing...';

                // Submit the form
                form.submit();
            });
        });
    </script>

<?php include('partials/footer.php'); ?>