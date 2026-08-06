<?php echo view('header/header'); ?>

<style>
/* =========================================================
   1. FIXED HEADER OVERLAP & MARGIN CORRECTION
   ========================================================= */
main.signup-page-main {
    padding-top: 170px !important; /* Header ke niche gap */
    padding-bottom: 60px !important;
    background: #f8fafc;
    min-height: 85vh;
    display: block !important;
}

/* =========================================================
   2. BALANCED MEDIUM SIGNUP CARD
   ========================================================= */
.signup-card {
    background: #ffffff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    padding: 30px 35px !important;
    width: 100%;
}

/* Header Branding inside Card */
.form-header-title {
    color: #0f172a;
    font-weight: 700;
    font-size: 22px !important;
}

.form-header-subtitle {
    color: #64748b;
    font-size: 13.5px !important;
}

.header-divider {
    height: 3px;
    width: 55px;
    background: linear-gradient(90deg, #0d6efd, #ff9933);
    border-radius: 2px;
    margin-top: 6px;
    margin-bottom: 18px;
}

/* =========================================================
   3. FORM CONTROLS & INPUTS
   ========================================================= */
.form-label {
    color: #334155;
    font-weight: 600;
    margin-bottom: 5px !important;
    font-size: 13px !important;
}

.login-input, .form-select.login-input {
    height: 42px !important;
    border-radius: 7px;
    border: 1px solid #cbd5e1;
    font-size: 13.5px !important;
    padding: 7px 12px;
}

.login-input:focus, .form-select.login-input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.15);
}

.input-group-text {
    background: #f1f5f9;
    border-color: #cbd5e1;
    color: #0d6efd;
    padding: 0 10px;
}

/* Submit Button */
.login-submit {
    background: #0d6efd;
    color: #ffffff;
    border: none;
    border-radius: 7px;
    padding: 11px 20px !important;
    font-size: 14.5px !important;
    font-weight: 600;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
}

.login-submit:hover {
    background: #0b5ed7;
    color: #ffffff;
    box-shadow: 0 6px 16px rgba(13, 110, 253, 0.3);
}

/* CAPTCHA Box */
.captcha-box {
    height: 42px !important;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    background: #f8fafc;
}

.captcha-text {
    font-size: 17px !important;
    font-weight: 700;
    letter-spacing: 3px;
    color: #0d6efd;
    user-select: none;
    font-family: 'Courier New', monospace;
}

/* Toast Container */
#toastContainer {
    width: 350px;
    max-width: 95%;
    z-index: 99999;
    top: 20px !important;
    right: 20px !important;
}

.toast {
    width: 100%;
    min-height: 55px;
    border-radius: 8px;
    font-size: 14px;
}
</style>

<!-- Main Wrapper -->
<main class="main signup-page-main">
    <div id="toastContainer" class="position-fixed"></div>
    
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="signup-card">
                    
                    <!-- Form Title & Subtitle -->
                    <div class="mb-3">
                        <h3 class="form-header-title mb-1">
                            User Registration
                        </h3>
                        <p class="form-header-subtitle mb-0">
                            Cabinet Secretariat — JAMAR Approval Management System
                        </p>
                        <div class="header-divider"></div>
                    </div>

                    <form id="signupForm">
                        <input type="hidden" name="csrf_token" value="<?= csrf_hash() ?>">

                        <div class="row g-2 text-start">
                            <!-- Full Name -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Full Name</label>
                                <input class="form-control login-input" 
                                       type="text" 
                                       id="signup_full_name" 
                                       name="full_name"
                                       placeholder="Enter full name"
                                       required>
                            </div>

                            <!-- Official Email -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Official Email</label>
                                <input class="form-control login-input" 
                                       type="email" 
                                       id="signup_email" 
                                       name="email"
                                       placeholder="Enter official email"
                                       required>
                            </div>

                            <!-- Body Name Dropdown -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Body Name</label>
                                <select class="form-select login-input" id="signup_body_name" name="body_name" required>
                                    <option value="" selected disabled>Select Body Name</option>
                                    <option value="Cabinet Secretariat">Cabinet Secretariat</option>
                                    <option value="Ministry/Department">Ministry / Department</option>
                                    <option value="Attached Office">Attached Office</option>
                                    <option value="Subordinate Office">Subordinate Office</option>
                                </select>
                            </div>
                            <!-- Body Type Dropdown -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Body Type</label>
                                <select class="form-select login-input" id="signup_body_type" name="body_type" required>
                                    <option value="" selected disabled>Select Body Type</option>
                                    <option value="Statutory Body">Statutory Body</option>
                                    <option value="Autonomous Body">Autonomous Body</option>
                                    <option value="UGC">UGC</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>


                            <!-- Dynamic UGC / Other Details Input (Hidden by Default) -->
                            <div class="col-12 mb-2" id="ugc_input_container" style="display: none;">
                                <label class="form-label">Specify UGC / Body Details</label>
                                <input class="form-control login-input" 
                                       type="text" 
                                       id="signup_ugc_details" 
                                       name="ugc_details"
                                       placeholder="Enter details for selected body type">
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Mobile Number</label>
                                <input class="form-control login-input" 
                                       type="text" 
                                       id="signup_mobile" 
                                       name="mobile"
                                       placeholder="Enter mobile number"
                                       required>
                            </div>

                            <!-- Username -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Username</label>
                                <input class="form-control login-input" 
                                       type="text" 
                                       id="signup_username" 
                                       name="username"
                                       placeholder="Choose a username"
                                       required>
                            </div>

                            <!-- Password -->
                            <div class="col-12 mb-2">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input class="form-control login-input" 
                                           type="password" 
                                           id="signup_password" 
                                           name="password"
                                           placeholder="Create a password"
                                           required>
                                    <button type="button"
                                            class="btn btn-outline-secondary"
                                            onclick="toggleSignupPassword()">
                                        <i id="signupEyeIcon" class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- CAPTCHA Section -->
                            <div class="col-12 mb-1">
                                <label class="form-label">
                                    <i class="bi bi-shield-lock me-1"></i> Security Verification
                                </label>
                                <div class="row g-2">
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="bi bi-shield-check"></i>
                                            </span>
                                            <input class="form-control login-input"
                                                   type="text"
                                                   id="signup_captcha"
                                                   name="captcha"
                                                   placeholder="Enter CAPTCHA code"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="captcha-box d-flex align-items-center justify-content-between px-3">
                                            <span class="captcha-text fw-bold" id="signupCaptchaText">
                                                <?= isset($captcha_text) ? esc($captcha_text) : 'ABCDEF' ?>
                                            </span>
                                            <button type="button"
                                                    class="btn btn-sm btn-link text-primary p-0"
                                                    id="signupRefreshCaptcha"
                                                    title="Refresh CAPTCHA">
                                                <i class="bi bi-arrow-clockwise fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="form-check mt-2">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   id="terms" 
                                   required>
                            <label class="form-check-label text-muted fs-6" for="terms" style="font-size:13px;">
                                I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>.
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn login-submit" id="signupBtn">
                                <i class="bi bi-person-plus me-2"></i>
                                Create Account
                            </button>
                        </div>

                        <!-- Login Redirect -->
                        <div class="text-center mt-3 pt-2 border-top">
                            <span class="text-muted fs-6" style="font-size:13px;">
                                Already have an account?
                            </span>
                            <a href="<?= base_url('/') ?>" class="fw-semibold text-decoration-none ms-1" style="font-size:13px;">
                                Login In
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>

<?php echo view('footer/footer'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script>
function getCSRFHash() {
    return $('input[name="csrf_token"]').val() || '';
}

function updateCSRF(hash) {
    $('input[name="csrf_token"]').val(hash);
}

function toggleSignupPassword() {
    const passwordInput = document.getElementById('signup_password');
    const eyeIcon = document.getElementById('signupEyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.className = 'bi bi-eye-slash-fill';
    } else {
        passwordInput.type = 'password';
        eyeIcon.className = 'bi bi-eye-fill';
    }
}

function refreshSignupCaptcha() {
    $.ajax({
        url: "<?= base_url('refresh-captcha') ?>",
        type: "POST",
        data: { csrf_token: getCSRFHash() },
        dataType: "json",
        headers: { "X-Requested-With": "XMLHttpRequest" },
        success: function(response) {
            if (response.csrfHash) updateCSRF(response.csrfHash);
            if (response.success) {
                $('#signupCaptchaText').text(response.captcha);
                $('#signup_captcha').val('');
            }
        }
    });
}

$(document).ready(function() {
    refreshSignupCaptcha();

    $('#signupRefreshCaptcha').click(function() {
        refreshSignupCaptcha();
    });

    // UGC / Body Type Selection Toggle Event
    $('#signup_body_type').change(function() {
        let selectedValue = $(this).val();
        if (selectedValue === 'UGC') {
            $('#ugc_input_container').slideDown(200);
            $('#signup_ugc_details').prop('required', true);
        } else {
            $('#ugc_input_container').slideUp(200);
            $('#signup_ugc_details').prop('required', false).val('');
        }
    });

    // Form Submit Event
    $('#signupForm').submit(function(e) {
        e.preventDefault();

        if (!$('#terms').is(':checked')) {
            showToast('warning', 'Please accept the Terms & Conditions');
            return;
        }

        let formData = {
            full_name: $('#signup_full_name').val().trim(),
            email: $('#signup_email').val().trim(),
            body_type: $('#signup_body_type').val(),
            body_name: $('#signup_body_name').val(),
            ugc_details: $('#signup_ugc_details').val() ? $('#signup_ugc_details').val().trim() : '',
            mobile: $('#signup_mobile').val().trim(),
            username: $('#signup_username').val().trim(),
            password: $('#signup_password').val().trim(),
            captcha: $('#signup_captcha').val().trim(),
            csrf_token: getCSRFHash()
        };

        $('#signupBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Creating Account...');

        $.ajax({
            url: "<?= base_url('auth/register') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            headers: { "X-Requested-With": "XMLHttpRequest" },
            success: function(response) {
                if (response.csrfHash) updateCSRF(response.csrfHash);
                if (response.success) {
                    showToast('success', response.message);
                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 1500);
                } else {
                    let error = response.message || 'Registration failed.';
                    if (response.errors) error = Object.values(response.errors).join('<br>');
                    showToast('error', error);
                    refreshSignupCaptcha();
                }
            },
            error: function() {
                showToast('error', 'Server Error. Please try again.');
                refreshSignupCaptcha();
            },
            complete: function() {
                $('#signupBtn').prop('disabled', false).html('<i class="bi bi-person-plus me-2"></i>Create Account');
            }
        });
    });
});
</script>