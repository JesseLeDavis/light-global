<?php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
$page_title = 'Contact LIGHT Global | Mentorship & Speaking Inquiries';
$page_description = 'Get in touch with LIGHT Global in Pompano Beach, FL. Reach out for leadership mentorship, speaking engagements, or partnership inquiries.';
include('partials/head.php');
?>
<?php include('partials/header.php'); ?>

    <main class="contact-page">

        <section class="contact-header">
            <h1>Book Darren C. Davis</h1>
            <p class="subheadline">
                Invite Darren to speak at your next event, or reach out to learn more about
                how we're transforming leaders and cities through purpose and partnership.
            </p>
        </section>

        <section class="contact-section">
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt contact-icon"></i>
                    <h3>Address</h3>
                    <p>
                        LIGHT Global<br>
                        721 SE 1st Ct<br>
                        Pompano Beach, FL 33060
                    </p>
                </div>

                <div class="contact-item">
                    <i class="fas fa-phone contact-icon"></i>
                    <h3>Phone</h3>
                    <p><a href="tel:+19542478187">(954) 247-8187</a></p>
                </div>

                <div class="contact-item">
                    <i class="fas fa-envelope contact-icon"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@thelightglobal.com">info@thelightglobal.com</a></p>
                </div>
            </div>
        </section>

        <section class="contact-form-section">
            <div class="contact-form-container" id="speakingFormWrapper">

                <div class="speaking-form-intro">
                    <h2>Request a Speaking Engagement</h2>
                    <p>
                        Fill out the form below and our team will be in touch within
                        2&ndash;3 business days.
                    </p>
                </div>

                <!-- Progress Indicator -->
                <div class="form-progress" aria-label="Form progress">
                    <div class="progress-step active" id="progressStep1">
                        <div class="step-circle">1</div>
                        <span class="step-label">About You</span>
                    </div>
                    <div class="progress-line" id="progressLine1"></div>
                    <div class="progress-step" id="progressStep2">
                        <div class="step-circle">2</div>
                        <span class="step-label">Your Event</span>
                    </div>
                    <div class="progress-line" id="progressLine2"></div>
                    <div class="progress-step" id="progressStep3">
                        <div class="step-circle">3</div>
                        <span class="step-label">Logistics</span>
                    </div>
                </div>

                <!-- Form-level message (network / server errors) -->
                <div class="form-message" id="formMessage" role="alert" aria-live="polite"></div>

                <form id="speakingRequestForm" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                    <!-- ===== STEP 1: About You ===== -->
                    <div class="form-step active" id="formStep1" data-step="1">

                        <p class="step-heading">About You</p>
                        <p class="step-subtext">Tell us who you are and how we can reach you.</p>

                        <div class="form-group" id="group-Contact_Name">
                            <label for="Contact_Name">
                                Full Name <span class="req" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="text"
                                id="Contact_Name"
                                name="Contact_Name"
                                placeholder="Jane Smith"
                                autocomplete="name"
                                required
                            >
                            <span class="error-message" id="error-Contact_Name" role="alert"></span>
                        </div>

                        <div class="form-group" id="group-Contact_Organization">
                            <label for="Contact_Organization">
                                Organization / Church <span class="field-optional">(optional)</span>
                            </label>
                            <input
                                type="text"
                                id="Contact_Organization"
                                name="Contact_Organization"
                                placeholder="Grace Community Church"
                                autocomplete="organization"
                            >
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Email">
                                <label for="Email">
                                    Email Address <span class="req" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="email"
                                    id="Email"
                                    name="Email"
                                    placeholder="jane@example.com"
                                    autocomplete="email"
                                    required
                                >
                                <span class="error-message" id="error-Email" role="alert"></span>
                            </div>

                            <div class="form-group" id="group-Cell_Phone">
                                <label for="Cell_Phone">
                                    Cell Phone <span class="req" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="tel"
                                    id="Cell_Phone"
                                    name="Cell_Phone"
                                    placeholder="(555) 000-0000"
                                    autocomplete="tel"
                                    required
                                >
                                <span class="error-message" id="error-Cell_Phone" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="btn-back hidden" disabled aria-hidden="true">Back</button>
                            <button type="button" class="btn-next" id="nextBtn1">
                                Next: Your Event <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>

                    <!-- ===== STEP 2: Your Event ===== -->
                    <div class="form-step" id="formStep2" data-step="2">

                        <p class="step-heading">Your Event</p>
                        <p class="step-subtext">Share the details of the event you have in mind.</p>

                        <div class="form-group" id="group-Speaking_Address_Location">
                            <label for="Speaking_Address_Location">
                                Event Location / Address <span class="req" aria-hidden="true">*</span>
                            </label>
                            <input
                                type="text"
                                id="Speaking_Address_Location"
                                name="Speaking_Address_Location"
                                placeholder="123 Main St, Miami, FL 33101 — or City, State"
                                required
                            >
                            <span class="error-message" id="error-Speaking_Address_Location" role="alert"></span>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Type_of_Event">
                                <label for="Type_of_Event">
                                    Type of Event <span class="req" aria-hidden="true">*</span>
                                </label>
                                <select id="Type_of_Event" name="Type_of_Event" required>
                                    <option value="" disabled selected>Select event type&hellip;</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Church Service">Church Service</option>
                                    <option value="Corporate Event">Corporate Event</option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Retreat">Retreat</option>
                                    <option value="University/School">University / School</option>
                                    <option value="Gala/Banquet">Gala / Banquet</option>
                                    <option value="Podcast/Interview">Podcast / Interview</option>
                                    <option value="Other">Other</option>
                                </select>
                                <span class="error-message" id="error-Type_of_Event" role="alert"></span>
                            </div>

                            <div class="form-group" id="group-Number_of_Speaking_Sessions">
                                <label for="Number_of_Speaking_Sessions">
                                    Number of Sessions <span class="req" aria-hidden="true">*</span>
                                </label>
                                <select id="Number_of_Speaking_Sessions" name="Number_of_Speaking_Sessions" required>
                                    <option value="" disabled selected>Select&hellip;</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <span class="error-message" id="error-Number_of_Speaking_Sessions" role="alert"></span>
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Event_Start_Date">
                                <label for="Event_Start_Date">
                                    Event Start Date <span class="req" aria-hidden="true">*</span>
                                </label>
                                <input
                                    type="date"
                                    id="Event_Start_Date"
                                    name="Event_Start_Date"
                                    required
                                >
                                <span class="error-message" id="error-Event_Start_Date" role="alert"></span>
                            </div>

                            <div class="form-group" id="group-Event_End_Date">
                                <label for="Event_End_Date">
                                    Event End Date <span class="field-optional">(optional)</span>
                                </label>
                                <input
                                    type="date"
                                    id="Event_End_Date"
                                    name="Event_End_Date"
                                >
                            </div>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Expected_Attendance">
                                <label for="Expected_Attendance">
                                    Expected Attendance <span class="field-optional">(optional)</span>
                                </label>
                                <input
                                    type="text"
                                    id="Expected_Attendance"
                                    name="Expected_Attendance"
                                    placeholder="e.g. 200&ndash;300 attendees"
                                >
                            </div>

                            <div class="form-group" id="group-Target_Audience">
                                <label for="Target_Audience">
                                    Target Audience <span class="field-optional">(optional)</span>
                                </label>
                                <input
                                    type="text"
                                    id="Target_Audience"
                                    name="Target_Audience"
                                    placeholder="e.g. Business leaders, Youth, Pastors"
                                >
                            </div>
                        </div>

                        <div class="form-group" id="group-Specific_Topics">
                            <label for="Specific_Topics">
                                Specific Topics / Desired Message <span class="req" aria-hidden="true">*</span>
                            </label>
                            <textarea
                                id="Specific_Topics"
                                name="Specific_Topics"
                                rows="5"
                                placeholder="Please describe the theme, topic, or specific message you'd like Darren to address&hellip;"
                                required
                            ></textarea>
                            <span class="error-message" id="error-Specific_Topics" role="alert"></span>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="btn-back" id="backBtn2">
                                <i class="fas fa-arrow-left" aria-hidden="true"></i> Back
                            </button>
                            <button type="button" class="btn-next" id="nextBtn2">
                                Next: Logistics <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>

                    <!-- ===== STEP 3: Logistics ===== -->
                    <div class="form-step" id="formStep3" data-step="3">

                        <p class="step-heading">Logistics</p>
                        <p class="step-subtext">Help us prepare Darren for the best possible experience at your event.</p>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Speaker_Attire">
                                <label for="Speaker_Attire">
                                    Speaker Attire <span class="field-optional">(optional)</span>
                                </label>
                                <select id="Speaker_Attire" name="Speaker_Attire">
                                    <option value="">No preference</option>
                                    <option value="Business Professional">Business Professional</option>
                                    <option value="Business Casual">Business Casual</option>
                                    <option value="Smart Casual">Smart Casual</option>
                                    <option value="Theme/Costume">Theme / Costume</option>
                                    <option value="Speaker's Preference">Speaker's Preference</option>
                                </select>
                            </div>

                            <div class="form-group" id="group-Media_Capabilities">
                                <label for="Media_Capabilities">
                                    AV / Media Capabilities <span class="field-optional">(optional)</span>
                                </label>
                                <select id="Media_Capabilities" name="Media_Capabilities">
                                    <option value="">Not specified</option>
                                    <option value="Yes – Full AV">Yes &ndash; Full AV</option>
                                    <option value="Yes – Basic (projector/screen)">Yes &ndash; Basic (projector / screen)</option>
                                    <option value="No AV available">No AV available</option>
                                    <option value="Unknown">Unknown</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Microphone Options Available <span class="field-optional">(optional &mdash; select all that apply)</span></label>
                            <div class="checkbox-group">
                                <label class="checkbox-item" for="mic-lapel">
                                    <input type="checkbox" id="mic-lapel" name="Microphone_Options[]" value="Lapel">
                                    <span>Lapel</span>
                                </label>
                                <label class="checkbox-item" for="mic-handheld">
                                    <input type="checkbox" id="mic-handheld" name="Microphone_Options[]" value="Handheld">
                                    <span>Handheld</span>
                                </label>
                                <label class="checkbox-item" for="mic-podium">
                                    <input type="checkbox" id="mic-podium" name="Microphone_Options[]" value="Podium">
                                    <span>Podium</span>
                                </label>
                                <label class="checkbox-item" for="mic-headset">
                                    <input type="checkbox" id="mic-headset" name="Microphone_Options[]" value="Headset">
                                    <span>Headset</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group" id="group-Media_Details">
                            <label for="Media_Details">
                                AV / Media Details <span class="field-optional">(optional)</span>
                            </label>
                            <textarea
                                id="Media_Details"
                                name="Media_Details"
                                rows="3"
                                placeholder="Notes about your AV setup, slide requirements, livestream plans, etc."
                            ></textarea>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group" id="group-Organization_Social_Media_Handle">
                                <label for="Organization_Social_Media_Handle">
                                    Organization Social Media <span class="field-optional">(optional)</span>
                                </label>
                                <input
                                    type="text"
                                    id="Organization_Social_Media_Handle"
                                    name="Organization_Social_Media_Handle"
                                    placeholder="@YourOrg"
                                >
                            </div>

                            <div class="form-group" id="group-How_did_you_hear">
                                <label for="How_did_you_hear">
                                    How did you hear about Darren? <span class="field-optional">(optional)</span>
                                </label>
                                <input
                                    type="text"
                                    id="How_did_you_hear"
                                    name="How_did_you_hear_about_Darren_C_Davis?"
                                    placeholder="Social media, referral, podcast, etc."
                                >
                            </div>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="btn-back" id="backBtn3">
                                <i class="fas fa-arrow-left" aria-hidden="true"></i> Back
                            </button>
                            <button type="submit" class="btn-submit" id="submitBtn">
                                Submit Request <i class="fas fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </div>

                    </div>

                </form>

                <!-- Thank-you panel — shown on success -->
                <div class="form-success" id="formSuccess" aria-live="polite">
                    <div class="success-icon">
                        <i class="fas fa-check-circle" aria-hidden="true"></i>
                    </div>
                    <h3>Request Received, <span id="thankyouName"></span>!</h3>
                    <p>
                        Thank you for reaching out. We've received your speaking request and will be
                        in touch within 2&ndash;3 business days. We look forward to the possibility
                        of partnering with you.
                    </p>
                    <p class="success-scripture">
                        &ldquo;For we are God&rsquo;s handiwork, created in Christ Jesus to do good works.&rdquo;
                        &mdash; Ephesians 2:10
                    </p>
                </div>

            </div>
        </section>

    </main>

<script>
(function () {
    'use strict';

    var currentStep = 1;
    var TOTAL_STEPS  = 3;

    var form         = document.getElementById('speakingRequestForm');
    var formWrapper  = document.getElementById('speakingFormWrapper');
    var formSuccess  = document.getElementById('formSuccess');
    var formMessage  = document.getElementById('formMessage');
    var thankyouName = document.getElementById('thankyouName');
    var submitBtn    = document.getElementById('submitBtn');

    var nextBtn1 = document.getElementById('nextBtn1');
    var nextBtn2 = document.getElementById('nextBtn2');
    var backBtn2 = document.getElementById('backBtn2');
    var backBtn3 = document.getElementById('backBtn3');

    var stepRequired = {
        1: ['Contact_Name', 'Email', 'Cell_Phone'],
        2: ['Speaking_Address_Location', 'Type_of_Event', 'Event_Start_Date', 'Number_of_Speaking_Sessions', 'Specific_Topics'],
        3: []
    };

    function getField(name) {
        return document.getElementById(name);
    }

    function getGroupEl(name) {
        return document.getElementById('group-' + name);
    }

    function isValidEmail(v) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim());
    }

    function clearStepErrors(step) {
        stepRequired[step].forEach(function (name) {
            var grp    = getGroupEl(name);
            var errEl  = document.getElementById('error-' + name);
            var fieldEl = getField(name);
            if (grp)     { grp.classList.remove('field-error'); }
            if (errEl)   { errEl.textContent = ''; }
            if (fieldEl) { fieldEl.removeAttribute('aria-invalid'); }
        });
    }

    function showFieldError(name, msg) {
        var grp    = getGroupEl(name);
        var errEl  = document.getElementById('error-' + name);
        var fieldEl = getField(name);
        if (grp)     { grp.classList.add('field-error'); }
        if (errEl)   { errEl.textContent = msg; }
        if (fieldEl) { fieldEl.setAttribute('aria-invalid', 'true'); }
    }

    function validateStep(step) {
        clearStepErrors(step);
        var fields = stepRequired[step];
        var valid  = true;
        var first  = null;

        fields.forEach(function (name) {
            var el = getField(name);
            if (!el) { return; }
            var val = el.value.trim();

            if (!val) {
                showFieldError(name, 'This field is required.');
                valid = false;
                if (!first) { first = el; }
                return;
            }

            if (name === 'Email' && !isValidEmail(val)) {
                showFieldError(name, 'Please enter a valid email address.');
                valid = false;
                if (!first) { first = el; }
            }
        });

        if (first) { first.focus(); }
        return valid;
    }

    function updateProgress(toStep) {
        for (var i = 1; i <= TOTAL_STEPS; i++) {
            var progEl = document.getElementById('progressStep' + i);
            progEl.classList.remove('active', 'completed');
            if (i < toStep)   { progEl.classList.add('completed'); }
            if (i === toStep) { progEl.classList.add('active'); }
        }
        for (var j = 1; j < TOTAL_STEPS; j++) {
            var lineEl = document.getElementById('progressLine' + j);
            if (lineEl) {
                lineEl.classList.toggle('completed', j < toStep);
            }
        }
    }

    function goToStep(newStep) {
        document.getElementById('formStep' + currentStep).classList.remove('active');
        document.getElementById('formStep' + newStep).classList.add('active');
        currentStep = newStep;
        updateProgress(currentStep);
        formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function advance(fromStep) {
        if (!validateStep(fromStep)) { return; }
        goToStep(fromStep + 1);
    }

    function retreat(fromStep) {
        clearStepErrors(fromStep);
        hideFormMessage();
        goToStep(fromStep - 1);
    }

    function showFormMessage(type, text) {
        formMessage.textContent = text;
        formMessage.className   = 'form-message ' + type;
    }

    function hideFormMessage() {
        formMessage.textContent = '';
        formMessage.className   = 'form-message';
    }

    function setLoading(on) {
        if (on) {
            submitBtn.disabled      = true;
            submitBtn.dataset.orig  = submitBtn.innerHTML;
            submitBtn.innerHTML     = '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i> Sending&hellip;';
        } else {
            submitBtn.disabled  = false;
            submitBtn.innerHTML = submitBtn.dataset.orig || 'Submit Request <i class="fas fa-paper-plane" aria-hidden="true"></i>';
        }
    }

    function handleSubmit(e) {
        e.preventDefault();
        if (!validateStep(3)) { return; }

        hideFormMessage();
        setLoading(true);

        fetch('send.php', {
            method: 'POST',
            body: new FormData(form)
        })
        .then(function (res) {
            if (!res.ok) { throw new Error('HTTP ' + res.status); }
            return res.json();
        })
        .then(function (data) {
            setLoading(false);

            if (data.success) {
                var firstName = (getField('Contact_Name').value.trim().split(' ')[0]) || 'Friend';
                thankyouName.textContent = firstName;

                form.style.display = 'none';
                document.querySelector('.form-progress').style.display     = 'none';
                document.querySelector('.speaking-form-intro').style.display = 'none';
                hideFormMessage();

                formSuccess.classList.add('visible');
                formSuccess.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                showFormMessage('error', data.error || 'There was a problem submitting your request. Please try again or contact us directly.');
                formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        })
        .catch(function (err) {
            setLoading(false);
            showFormMessage('error', 'A network error occurred. Please check your connection and try again, or reach us at info@thelightglobal.com.');
            console.error('[Speaking Request] submit error:', err);
            formWrapper.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    nextBtn1.addEventListener('click', function () { advance(1); });
    nextBtn2.addEventListener('click', function () { advance(2); });
    backBtn2.addEventListener('click', function () { retreat(2); });
    backBtn3.addEventListener('click', function () { retreat(3); });
    form.addEventListener('submit', handleSubmit);

    // Clear field errors as user corrects them
    form.querySelectorAll('input, select, textarea').forEach(function (el) {
        ['input', 'change'].forEach(function (evt) {
            el.addEventListener(evt, function () {
                var rawName = el.name.replace('[]', '');
                var grp    = getGroupEl(rawName);
                var errEl  = document.getElementById('error-' + rawName);
                if (grp && grp.classList.contains('field-error')) {
                    grp.classList.remove('field-error');
                    el.removeAttribute('aria-invalid');
                }
                if (errEl) { errEl.textContent = ''; }
            });
        });
    });

    hideFormMessage();

}());
</script>

<?php include('partials/footer.php'); ?>
