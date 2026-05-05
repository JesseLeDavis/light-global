<?php
$page_title = 'Darren C Davis: Leadership Mentor & Founder | LIGHT Global';
$page_description = 'Meet Darren C Davis — Fortune 100 leader, international speaker, and author of The Eleventh Hour. Founder of LIGHT Global.';
include('partials/head.php');
?>
<?php include('partials/header.php'); ?>

    <main class="meet-the-founder-page">
        <section class="founder-header">
            <h1>Meet the Founder</h1>
            <p class="subheadline">Darren C Davis – Mentor. International Speaker. Author. Kingdom Builder.</p>
        </section>

        <section class="founder-profile">
            <div class="founder-image fb-1">

            </div>
            <div class="founder-bio fb-2">
                <h2>About Darren</h2>
                <p>
                    Darren C Davis is a former Fortune 100 Executive, 3x nonprofit founder, international speaker, and author of <a href="https://eleventhhourbook.com/" target="_blank" rel="noopener noreferrer"><em>The Eleventh Hour</em></a>. As the founder of LIGHT Global, Darren has dedicated his life to equipping high-achieving leaders to expand their Kingdom impact through transformative mentorship.
                </p>
                <p>
                    Early in his career, Darren worked alongside Walmart's founder, Sam Walton, where he learned what it means to lead with integrity and Kingdom purpose. These experiences shaped his transition into nonprofit leadership—impacting lives across the U.S. and over 50 nations globally.
                </p>
                <p>
                    Darren's passion is helping leaders grow spiritually, professionally, and personally—empowering them to influence culture and transform communities.
                </p>
                <p>
                    Check out <a href="https://eleventhhourbook.com/" target="_blank" rel="noopener noreferrer"><em>The Eleventh Hour</em></a>, which chronicles Darren's journey to understanding his true identity in God, unique calling to love people and generational destiny to impact the world.
                </p>

                <!-- Social Media Links -->
                <div class="founder-social-links">
                    <a href="https://www.facebook.com/darrencdavis.transformation" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <img src="assets/images/facebook-dark.svg" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/darrencdavis/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <img src="assets/images/instagram-dark.svg" alt="Instagram">
                    </a>
                    <a href="https://www.linkedin.com/in/darren-c-davis-738741261/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <img src="assets/images/linkedin-dark.svg" alt="LinkedIn">
                    </a>
                </div>
            </div>
        </section>

        <section class="founder-speaking">
            <div class="speaking-content">
                <h2>Request Darren to Speak</h2>
                <p>
                    Whether at conferences, leadership forums, or community gatherings, Darren speaks with clarity, conviction, and Kingdom insight—challenging leaders to live on mission with purpose and integrity.
                </p>
                <button id="openFormModal" class="btn-large btn-light-blue">Request Darren C Davis to Speak</button>
            </div>
        </section>
    </main>

    <!-- Speaking Request Modal -->
    <div id="speakingModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Speaking Request Form</h2>
                <button class="modal-close" id="closeModal">&times;</button>
            </div>
            <div class="modal-body">
                <p class="modal-lead">Please complete the details below to invite <strong>Darren C Davis</strong>. We'll follow up via email once we receive your request.</p>
                
                <form id="speakingForm" action="send.php" method="POST" novalidate>
                    <div class="form-grid">
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
                        <div class="form-group">
                            <label for="address">Speaking Address Location<span class="req">*</span></label>
                            <input id="address" name="Speaking Address Location" type="text" required />
                            <div class="error-message">Please enter the event location</div>
                        </div>
                        <div class="form-group">
                            <label for="social">Organization Social Media Handle</label>
                            <input id="social" name="Organization Social Media Handle" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="hear">How did you hear about Darren C Davis?</label>
                            <input id="hear" name="How did you hear about Darren C Davis?" type="text" />
                        </div>
                        <div class="form-group">
                            <label for="eventType">Please describe the type of Event<span class="req">*</span></label>
                            <input id="eventType" name="Type of Event" type="text" required />
                            <div class="error-message">Please describe the event type</div>
                        </div>
                        <div class="form-group">
                            <label for="dateStart">Event Start Date<span class="req">*</span></label>
                            <input id="dateStart" name="Event Start Date" type="date" required />
                            <div class="error-message">Please select the event start date</div>
                        </div>
                        <div class="form-group">
                            <label for="dateEnd">Event End Date</label>
                            <input id="dateEnd" name="Event End Date" type="date" />
                        </div>
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

                    <div class="form-grid">
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

                    <div class="form-grid">
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

                    <div class="form-actions">
                        <button class="btn-primary" type="submit">Submit Request</button>
                        <button class="btn-ghost" type="button" id="cancelForm">Cancel</button>
                    </div>

                    <div id="formMsg" class="form-message"></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('speakingModal');
            const openBtn = document.getElementById('openFormModal');
            const closeBtn = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelForm');
            const form = document.getElementById('speakingForm');
            const formMsg = document.getElementById('formMsg');

            // Modal functionality
            function openModal() {
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modal.classList.remove('active');
                document.body.style.overflow = '';
                form.reset();
                formMsg.className = 'form-message';
                formMsg.textContent = '';
                // Clear all error states
                form.querySelectorAll('.form-group').forEach(group => {
                    group.classList.remove('field-error');
                });
            }

            // Event listeners
            openBtn.addEventListener('click', openModal);
            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);
            
            // Close on overlay click
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            // Close on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    closeModal();
                }
            });

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
                    formMsg.className = 'form-message error';
                    formMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }

                const submitBtn = form.querySelector('.btn-primary');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading"></span>Submitting...';

                const formData = new FormData(form);
                
                // Debug: Log what we're sending
                console.log('=== FORM SUBMISSION DEBUG ===');
                console.log('Form data entries:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }
                
                console.log('Sending request to send.php...');

                try {
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
                        formMsg.className = 'form-message success';
                        form.reset();
                        setTimeout(() => {
                            closeModal();
                        }, 3000);
                    } else {
                        console.log('ERROR:', data.error || data.message);
                        formMsg.textContent = data.error || data.message || 'There was a problem sending your request. Please try again or contact us directly.';
                        formMsg.className = 'form-message error';
                    }
                } catch (error) {
                    formMsg.textContent = 'Network error. Please check your connection and try again.';
                    formMsg.className = 'form-message error';
                }

                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Submit Request';
                formMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        });
    </script>

<?php include('partials/footer.php'); ?>