<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speaking Request Form - Darren C Davis</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }

        .form-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }

        .wrap {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 50px;
            border-radius: 24px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            background: linear-gradient(135deg, #0a2342 0%, #2c5aa0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.75rem;
            margin-bottom: 15px;
            font-weight: 800;
            letter-spacing: -0.02em;
            text-shadow: none;
        }

        .lead {
            font-size: 1.1rem;
            color: #666;
            margin: 0;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Grid System */
        .grid {
            display: grid;
            gap: 20px;
            margin-bottom: 25px;
        }

        .grid.two {
            grid-template-columns: 1fr 1fr;
        }

        @media (max-width: 768px) {
            .grid.two {
                grid-template-columns: 1fr;
            }

            .wrap {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }
        }

        /* Form Elements */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #0a2342;
            font-size: 0.95rem;
        }

        .req {
            color: #e74c3c;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 16px 24px;
            border: 2px solid rgba(10, 35, 66, 0.2);
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            font-size: 16px;
            outline: none;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: inherit;
            position: relative;
        }
        
        input[type="text"]:not(textarea) {
            border-radius: 50px;
        }

        textarea {
            border-radius: 16px;
            resize: vertical;
            min-height: 100px;
        }

        input:focus,
        textarea:focus {
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
            box-shadow: 
                0 0 0 4px rgba(102, 126, 234, 0.1),
                0 8px 25px rgba(102, 126, 234, 0.15),
                0 4px 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px) scale(1.02);
        }

        input:valid:not(:focus) {
            border-color: rgba(39, 174, 96, 0.6);
            background: rgba(232, 245, 233, 0.3);
        }

        input:invalid:not(:placeholder-shown):not(:focus) {
            border-color: rgba(231, 76, 60, 0.6);
            background: rgba(253, 236, 234, 0.3);
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-4px); }
            75% { transform: translateX(4px); }
        }

        /* Checkbox and Radio Styling */
        .checkrow {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .checkrow label {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            font-weight: 500;
            cursor: pointer;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: auto;
            margin-right: 8px;
            transform: scale(1.2);
            accent-color: #0a2342;
        }

        /* Buttons */
        .actions {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            justify-content: center;
        }

        .btn-primary,
        .btn-ghost {
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            min-width: 160px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .btn-primary:active {
            transform: translateY(-1px) scale(1.02);
        }

        .btn-ghost {
            background: rgba(255, 255, 255, 0.1);
            color: #667eea;
            border: 2px solid rgba(102, 126, 234, 0.3);
            backdrop-filter: blur(10px);
        }

        .btn-ghost:hover {
            background: rgba(102, 126, 234, 0.1);
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.2);
        }

        /* Message Styling */
        .msg {
            margin-top: 20px;
            padding: 20px 24px;
            border-radius: 16px;
            font-weight: 500;
            text-align: center;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(10px);
            backdrop-filter: blur(10px);
        }

        .msg.success {
            background: rgba(76, 175, 80, 0.1);
            color: #2e7d32;
            border: 1px solid rgba(76, 175, 80, 0.3);
            opacity: 1;
            transform: translateY(0);
        }

        .msg.error {
            background: rgba(244, 67, 54, 0.1);
            color: #c62828;
            border: 1px solid rgba(244, 67, 54, 0.3);
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Form Validation Styling */
        .form-group {
            position: relative;
            margin-bottom: 28px;
            opacity: 0;
            animation: slideInUp 0.6s ease-out forwards;
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }

        .field-error .error-message {
            display: block;
        }

        /* Accessibility Improvements */
        input:focus-visible,
        textarea:focus-visible,
        button:focus-visible {
            outline: 2px solid #0a2342;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
<section class="form-wrapper">
    <div class="wrap">
        <header>
            <h1>Speaking Request Form</h1>
            <p class="lead">Please complete the details below to invite <strong>Darren C Davis</strong>. We'll follow up via email once we receive your request.</p>
        </header>

        <form id="speakingForm" action="send.php" method="POST" novalidate>
            <h2 class="sr-only">Contact Information</h2>
            <div class="grid two">
                <div class="form-group">
                    <label for="contactName">Contact Name<span class="req">*</span></label>
                    <input id="contactName" name="Contact Name" type="text" required />
                    <div class="error-message">Please enter your contact name</div>
                </div>
                <div class="form-group">
                    <label for="contactOrg">Contact Organization</label>
                    <input id="contactOrg" name="Contact Organization" type="text" />
                </div>
                <div class="form-group">
                    <label for="email">Email<span class="req">*</span></label>
                    <input id="email" name="Email" type="email" required />
                    <div class="error-message">Please enter a valid email address</div>
                </div>
                <div class="form-group">
                    <label for="phone">Cell Phone<span class="req">*</span></label>
                    <input id="phone" name="Cell Phone" type="tel" required />
                    <div class="error-message">Please enter your phone number</div>
                </div>
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label for="address">Speaking Address Location<span class="req">*</span></label>
                    <input id="address" name="Speaking Address Location" type="text" required />
                    <div class="error-message">Please enter the event location</div>
                </div>
                <div class="form-group">
                    <label for="social">Organization Social Media Handle</label>
                    <input id="social" name="Organization Social Media Handle" type="text" />
                </div>
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label for="hear">How did you hear about Darren C Davis?</label>
                    <input id="hear" name="How did you hear about Darren C Davis?" type="text" />
                </div>
                <div class="form-group">
                    <label for="eventType">Please describe the type of Event<span class="req">*</span></label>
                    <input id="eventType" name="Type of Event" type="text" required />
                    <div class="error-message">Please describe the event type</div>
                </div>
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label for="dateStart">Event Start Date<span class="req">*</span></label>
                    <input id="dateStart" name="Event Start Date" type="date" required />
                    <div class="error-message">Please select the event start date</div>
                </div>
                <div class="form-group">
                    <label for="dateEnd">Event End Date</label>
                    <input id="dateEnd" name="Event End Date" type="date" />
                </div>
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label for="sessions">Number of Speaking Sessions<span class="req">*</span></label>
                    <input id="sessions" name="Number of Speaking Sessions" type="number" min="1" required />
                    <div class="error-message">Please enter the number of sessions</div>
                </div>
                <div class="form-group">
                    <label for="attendance">Expected Attendance</label>
                    <input id="attendance" name="Expected Attendance" type="number" min="1" />
                </div>
            </div>

            <div class="form-group">
                <label for="topics">Specific Topic(s) of Sessions<span class="req">*</span></label>
                <textarea id="topics" name="Specific Topics" required placeholder="Please describe the topics you'd like Darren to speak about..."></textarea>
                <div class="error-message">Please describe the specific topics</div>
            </div>

            <div class="form-group">
                <label for="audience">Target Audience</label>
                <input id="audience" name="Target Audience" type="text" placeholder="e.g., Business professionals, Students, General public" />
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label for="attire">Speaker Attire</label>
                    <input id="attire" name="Speaker Attire" type="text" placeholder="e.g., Business casual, Formal, etc." />
                </div>
                <div class="form-group">
                    <label>Microphone Options</label>
                    <div class="checkrow">
                        <label><input type="checkbox" name="Microphone Options[]" value="Handheld"> Handheld</label>
                        <label><input type="checkbox" name="Microphone Options[]" value="Lavalier"> Lavalier</label>
                        <label><input type="checkbox" name="Microphone Options[]" value="Headset"> Headset</label>
                        <label><input type="checkbox" name="Microphone Options[]" value="Podium"> Podium</label>
                    </div>
                </div>
            </div>

            <div class="grid two">
                <div class="form-group">
                    <label>Do you have Media capabilities at the Event?</label>
                    <div class="checkrow">
                        <label><input type="radio" name="Media Capabilities" value="Yes"> Yes</label>
                        <label><input type="radio" name="Media Capabilities" value="No"> No</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mediaNotes">Media Details</label>
                    <textarea id="mediaNotes" name="Media Details" placeholder="Please describe available media equipment, recording capabilities, etc."></textarea>
                </div>
            </div>

            <div class="actions">
                <button class="btn-primary" type="submit">Submit Request</button>
                <button class="btn-ghost" type="reset">Reset Form</button>
            </div>

            <div id="formMsg" class="msg"></div>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, setting up form...');
        
        const form = document.getElementById('speakingForm');
        const formMsg = document.getElementById('formMsg');
        const submitBtn = form.querySelector('.btn-primary');
        
        console.log('Form element:', form);
        console.log('Submit button:', submitBtn);
        
        if (!form) {
            console.error('Form not found!');
            return;
        }

        // Form validation
        function validateField(field) {
            const formGroup = field.closest('.form-group');
            const errorMsg = formGroup.querySelector('.error-message');

            if (!field.checkValidity()) {
                formGroup.classList.add('field-error');
                if (errorMsg) errorMsg.style.display = 'block';
                return false;
            } else {
                formGroup.classList.remove('field-error');
                if (errorMsg) errorMsg.style.display = 'none';
                return true;
            }
        }

        // Real-time validation
        form.querySelectorAll('input[required], textarea[required]').forEach(field => {
            field.addEventListener('blur', () => validateField(field));
            field.addEventListener('input', () => {
                if (field.classList.contains('field-error')) {
                    validateField(field);
                }
            });
        });

        // Date validation
        const startDate = document.getElementById('dateStart');
        const endDate = document.getElementById('dateEnd');

        startDate.addEventListener('change', function() {
            const today = new Date().toISOString().split('T')[0];
            if (this.value < today) {
                this.setCustomValidity('Event date cannot be in the past');
            } else {
                this.setCustomValidity('');
                if (endDate.value && this.value > endDate.value) {
                    endDate.setCustomValidity('End date must be after start date');
                } else {
                    endDate.setCustomValidity('');
                }
            }
        });

        endDate.addEventListener('change', function() {
            if (startDate.value && this.value < startDate.value) {
                this.setCustomValidity('End date must be after start date');
            } else {
                this.setCustomValidity('');
            }
        });

        // Form submission
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            let isValid = true;
            form.querySelectorAll('input[required], textarea[required]').forEach(field => {
                if (!validateField(field)) {
                    isValid = false;
                }
            });

            if (!isValid) {
                formMsg.textContent = 'Please correct the errors above before submitting.';
                formMsg.className = 'msg error';
                formMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            // Real form submission with error handling for extension conflicts
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="loading"></span>Submitting...';

            try {
                const formData = new FormData(form);
                
                // Debug: Log what we're sending
                console.log('=== FORM SUBMISSION DEBUG ===');
                console.log('Form data entries:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }
                
                console.log('Sending request to send.php...');
                const response = await fetch('send.php', {
                    method: 'POST',
                    body: formData
                });

                console.log('Response status:', response.status);
                console.log('Response ok:', response.ok);
                
                const responseText = await response.text();
                console.log('Raw response:', responseText);
                
                const data = JSON.parse(responseText);

                console.log('Parsed data:', data);
                
                if (data.success) {
                    console.log('SUCCESS: Email sent successfully');
                    formMsg.textContent = 'Thank you! Your speaking request has been submitted successfully. We\'ll be in touch soon.';
                    formMsg.className = 'msg success';
                    form.reset();
                } else {
                    console.log('ERROR:', data.error || data.message);
                    formMsg.textContent = data.error || data.message || 'There was a problem sending your request. Please try again or contact us directly.';
                    formMsg.className = 'msg error';
                }
            } catch (error) {
                console.error('Form submission error:', error);
                formMsg.textContent = 'Network error. Please check your connection and try again.';
                formMsg.className = 'msg error';
            }

            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Submit Request';
            formMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

        // Reset form
        form.addEventListener('reset', function() {
            setTimeout(() => {
                form.querySelectorAll('.form-group').forEach(group => {
                    group.classList.remove('field-error');
                });
                form.querySelectorAll('.error-message').forEach(msg => {
                    msg.style.display = 'none';
                });
                formMsg.className = 'msg';
                formMsg.textContent = '';
            }, 10);
        });
    });
</script>
</body>
</html>