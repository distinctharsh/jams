<?php echo view('header/header'); ?>

<style>
/* =========================================================
   1. FIXED HEADER OVERLAP & MARGIN CORRECTION
   ========================================================= */
main.signup-page-main {
    padding-top: 200px !important; /* Header ke niche gap */
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
    width: 365px;
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
    /* font-size: 17px !important; */
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

/* ==========================================
   CAPTCHA
========================================== */

.captcha-box {
    height: 44px;
    border: 1px dashed #9fb3c8;
    border-radius: 9px;
    background:
        linear-gradient(
            135deg,
            #f8fafc,
            #eef4f8
        );
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 12px 0 15px;
    overflow: hidden;
}

.captcha-text {
    font-family: "Courier New", monospace;
    font-size: 18px;
    font-weight: 800;
    letter-spacing: 4px;
    color: #1e3a5f;
    user-select: none;
    text-decoration: line-through;
    text-decoration-thickness: 1px;
}

.captcha-refresh {
    width: 32px;
    height: 32px;
    border: 0;
    border-radius: 7px;
    background: #e3edf6;
    color: #1e4d7b;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all .2s ease;
}

.captcha-refresh:hover {
    background: #1e4d7b;
    color: #fff;
    transform: rotate(20deg);
}

.captcha-refresh i {
    font-size: 17px;
}
/* ==========================================
   CREATE ACCOUNT BUTTON
========================================== */

.signup-submit {
    height: 46px;
    border: none;
    border-radius: 9px;
    background: linear-gradient(
        135deg,
        #1e4d7b,
        #28618f
    );
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .2px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 15px;
    box-shadow: 0 5px 14px rgba(30, 77, 123, .18);
    transition: all .25s ease;
}

.signup-submit:hover {
    background: linear-gradient(
        135deg,
        #173d63,
        #1e4d7b
    );
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 7px 18px rgba(30, 77, 123, .25);
}

.signup-submit:active {
    transform: translateY(0);
}
/* ================================
   SIGNUP FORM PROFESSIONAL STYLE
================================ */

.signup-label {
    color: #26374a;
    font-size: 12.5px;
    font-weight: 600;
    margin-bottom: 5px;
    letter-spacing: 0.1px;
}

.signup-label i {
    color: #1e4d7b;
    font-size: 12px;
}

/* Input Group */
.signup-input-group {
    border-radius: 6px;
    overflow: hidden;
}

/* Left Icon */
.signup-input-group .input-group-text {
    min-width: 42px;
    justify-content: center;
    background: #f4f7fa;
    border: 1px solid #ced6df;
    border-right: 0;
    color: #1e4d7b;
    font-size: 15px;
}

/* Input / Select */
.signup-input-group .form-control,
.signup-input-group .form-select {
    border: 1px solid #ced6df;
    border-left: 0;
    color: #26374a;
    font-size: 13px;
    min-height: 38px;
}

/* Placeholder */
.signup-input-group .form-control::placeholder {
    color: #8a96a3;
    font-size: 12.5px;
}

/* Focus */
.signup-input-group:focus-within .input-group-text {
    background: #eef5fb;
    border-color: #1e4d7b;
    color: #1e4d7b;
}

.signup-input-group:focus-within .form-control,
.signup-input-group:focus-within .form-select {
    border-color: #1e4d7b;
    box-shadow: none;
}

/* Select Arrow / Text */
.signup-input-group .form-select {
    cursor: pointer;
    padding-top: 7px;
    padding-bottom: 7px;
}

/* CAPTCHA */
.captcha-box {
    min-height: 38px;
    border: 1px solid #ced6df;
    border-radius: 6px;
    background: #f7f9fb;
}

.captcha-text {
    color: #26374a;
    font-size: 15px;
    letter-spacing: 3px;
}

.captcha-box button {
    color: #1e4d7b !important;
}

.captcha-box button:hover {
    color: #163b60 !important;
    transform: rotate(20deg);
    transition: 0.2s ease;
}

/* Terms */
/* .signup-terms {
    color: #596675;
    font-size: 12px;
}

.signup-terms .form-check-input {
    border-color: #9da9b5;
    cursor: pointer;
}

.signup-terms .form-check-input:checked {
    background-color: #1e4d7b;
    border-color: #1e4d7b;
}

.signup-terms i {
    color: #1e4d7b;
} */

/* Login Link */
.signup-login-link {
    color: #657180;
    font-size: 12.5px;
}

.signup-login-link > span i {
    color: #1e4d7b;
}

.signup-login-link a {
    color: #1e4d7b;
}

.signup-login-link a:hover {
    color: #163b60;
}

/* Submit Button */
.signup-submit {
    min-height: 40px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.2px;
}

.signup-submit i {
    font-size: 14px;
}

.registration-header {
    background: #1e4d7b;
    padding: 15px 18px;
    border-radius: 6px;
}

.registration-header-content {
    display: flex;
    align-items: center;
    gap: 15px;
}

.title-logo {
    width: 55px;
    height: 55px;
    object-fit: contain;
    background: #fff;
    padding: 5px;
    border-radius: 6px;
}

.form-header-title {
    color: #fff !important;
    font-weight: 700;
}

.form-header-subtitle {
    color: #fff !important;
    opacity: 0.9;
    font-size: 14px;
}

.header-divider {
    height: 2px;
    background: rgba(255,255,255,0.7);
    margin-top: 12px;
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
                    <div class="mb-3 registration-header">
                        <div class="registration-header-content">
                            <img src="<?= base_url('assets/image/Emblem_of_India.svg.webp') ?>"
                                 alt="Jammers Approval Management System"
                                 class="title-logo">

                            <div>
                                <h3 class="form-header-title mb-1">
                                    JAMS - User Registration
                                </h3>

                                <p class="form-header-subtitle mb-0">
                                    Cabinet Secretariat — JAMMERS Approval Management System
                                </p>
                            </div>
                        </div>
                        <!-- <div class="header-divider"></div> -->
                    </div>
                    <form id="signupForm">
                        <input type="hidden" name="csrf_token" value="<?= csrf_hash() ?>">
                        <div class="row g-2 text-start">
                            <!-- Full Name -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label signup-label">
                                    <i class="bi bi-person-fill me-1"></i>
                                    Full Name
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input class="form-control login-input"
                                           type="text"
                                           id="signup_full_name"
                                           name="full_name"
                                           placeholder="Enter full name"
                                           required>
                                </div>
                            </div>
                            <!-- Official Email -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label signup-label">
                                    <i class="bi bi-envelope-fill me-1"></i>
                                    Official Email
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input class="form-control login-input"
                                           type="email"
                                           id="signup_email"
                                           name="email"
                                           placeholder="Enter official email"
                                           required>
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label signup-label">
                                    <i class="bi bi-phone-fill me-1"></i>
                                    Mobile Number
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-phone"></i>
                                    </span>
                                    <input class="form-control login-input"
                                           type="text"
                                           id="signup_mobile"
                                           name="mobile"
                                           placeholder="Enter mobile number"
                                           required>
                                </div>
                            </div>

                            <!-- Body Name -->
                            <div class="col-md-6 mb-2">
                                <label class="form-label signup-label">
                                    <i class="bi bi-building-fill me-1"></i>
                                    Examination Body Name
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-building"></i>
                                    </span>
                                    <select class="form-select login-input"
                                            id="signup_body_name"
                                            name="body_name"
                                            required>
                                        <option value="" selected disabled>
                                            Select Body Name
                                        </option>
                                        <?php if (!empty($organizations)): ?>
                                            <?php foreach ($organizations as $org): ?>
                                                <option value="<?= esc($org['org_name']) ?>" data-org-type="<?= esc($org['org_type']) ?>">
                                                    <?= esc($org['org_name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Body Type -->
                            <div class="col-md-12 mb-2">
                                <label class="form-label signup-label">
                                    <i class="bi bi-diagram-3-fill me-1"></i>
                                    Examination Body Type
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-diagram-3"></i>
                                    </span>
                                    <select class="form-select login-input"
                                            id="signup_body_type"
                                            name="body_type"
                                            required>
                                        <option value="" selected disabled>
                                            Select Body Type
                                        </option>
                                        <?php if (!empty($organization_types)): ?>
                                            <?php foreach ($organization_types as $type): ?>
                                                <option value="<?= esc($type['name']) ?>" 
                                                        data-type-id="<?= esc($type['id']) ?>" 
                                                        data-ugc-required="<?= esc($type['is_ugc_id_required']) ?>">
                                                    <?= esc($type['name']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Dynamic UGC / Other Details -->
                            <div class="col-12 mb-2"
                                 id="ugc_input_container"
                                 style="display:none;">
                                <label class="form-label signup-label">
                                    <i class="bi bi-info-circle-fill me-1"></i>
                                    Specify UGC / Examination Body Details
                                </label>
                                <div class="input-group signup-input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-pencil-square"></i>
                                    </span>
                                    <input class="form-control login-input"
                                           type="text"
                                           id="signup_ugc_details"
                                           name="ugc_details"
                                           placeholder="Enter details for selected body type">
                                </div>
                            </div>

                            <!-- CAPTCHA -->
                            <div class="col-12 mb-1">
                                <label class="form-label signup-label">
                                    <i class="bi bi-shield-lock-fill me-1"></i>
                                    Security Verification
                                </label>

                                <div class="row g-2">
                                    <!-- CAPTCHA Input -->
                                    <div class="col-md-7">
                                        <div class="input-group signup-input-group">
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

                                    <!-- CAPTCHA -->
                                    <div class="col-md-5">
                                        <div class="captcha-box d-flex align-items-center justify-content-between px-3">
                                            <span class="captcha-text fw-bold"
                                                  id="signupCaptchaText">
                                                <?= isset($captcha_text)
                                                    ? esc($captcha_text)
                                                    : 'ABCDEF' ?>
                                            </span>
                                            <button type="button"
                                                    class="btn btn-sm btn-link text-primary p-0"
                                                    id="signupRefreshCaptcha"
                                                    title="Refresh CAPTCHA"
                                                    aria-label="Refresh CAPTCHA">
                                                <i class="bi bi-arrow-clockwise fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Terms -->
                        <!-- <div class="form-check mt-2 signup-terms">
                            <input class="form-check-input"
                                   type="checkbox"
                                   id="terms"
                                   required>
                            <label class="form-check-label"
                                   for="terms">
                                I agree to the
                                <a href="#" class="text-decoration-none">
                                    Terms & Conditions
                                </a>.
                            </label>
                        </div> -->

                        <!-- Submit -->
                        <div class="d-grid mt-3">
                            <button type="submit"
                                    class="btn login-submit signup-submit"
                                    id="signupBtn">

                                <i class="bi bi-person-plus-fill me-2"></i>
                                Create Account
                            </button>
                        </div>

                        <!-- Login Redirect -->
                        <div class="text-center mt-3 pt-2 border-top signup-login-link">
                            <span>
                                <i class="bi bi-person-check-fill me-1"></i>
                                Already have an account?
                            </span>
                            <a href="#"
                               class="fw-semibold text-decoration-none ms-1" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Login In
                                <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>

<!-- Email Popup Modal -->
<div class="modal fade" id="emailPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Email Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-envelope-circle-check text-success" style="font-size: 48px;"></i>
                    <p class="mt-3 mb-0">Link has been sent to email to upload competent authority signed letter for verification.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Authorization Link Popup Modal -->
<div class="modal fade" id="authLinkPopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Authorization Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-link text-primary" style="font-size: 48px;"></i>
                    <p class="mt-3 mb-3">Click the link below to proceed to authorization page:</p>
                    <div class="card p-3 bg-light">
                        <a href="#" id="authLinkUrl" class="text-decoration-none text-primary fw-bold" target="_blank">
                            /auth/authorization?token=...
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
        let isUgcRequired = $(this).find(':selected').data('ugc-required');
        if (parseInt(isUgcRequired) === 1) {
            $('#ugc_input_container').slideDown(200);
            $('#signup_ugc_details').prop('required', true);
        } else {
            $('#ugc_input_container').slideUp(200);
            $('#signup_ugc_details').prop('required', false).val('');
        }
    });

    $('#signup_body_name').change(function() {
        let selectedOrgType = $(this).find(':selected').data('org-type');
        if (selectedOrgType) {
            $('#signup_body_type option').each(function() {
                if ($(this).data('type-id') == selectedOrgType) {
                    $(this).prop('selected', true);
                    return false;
                }
            });
            $('#signup_body_type').trigger('change');
        }
    });

    // Form Submit Event
    $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        // if (!$('#terms').is(':checked')) {
        //     showToast(
        //         'warning',
        //         'Please accept the Terms & Conditions'
        //     );
        //     return;
        // }

        let formData = {
            full_name: ($('#signup_full_name').val() || '').trim(),
            email: ($('#signup_email').val() || '').trim(),
            mobile: ($('#signup_mobile').val() || '').trim(),
            body_name: $('#signup_body_name').val() || '',
            body_type: $('#signup_body_type').val() || '',
            ugc_details: ($('#signup_ugc_details').val() || '').trim(),
            captcha: ($('#signup_captcha').val() || '').trim(),
            csrf_token: $('input[name="csrf_token"]').val() || ''
        };
        console.log('Signup Form Data:', formData);
        $.ajax({
            url: "<?= base_url('auth/register') ?>",
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('#signupBtn')
                    .prop('disabled', true)
                    .html(
                        '<i class="bi bi-hourglass-split me-2"></i>Registering...'
                    );
            },
            success: function(response) {
                console.log('Register Response:', response);
                // Update CSRF Token
                if (response.csrfHash) {

                    $('input[name="csrf_token"]')
                        .val(response.csrfHash);
                }
                // Registration Successful
                if (response.success) {
                    const userId = response.user_id;
                    showEmailPopup(userId);
                    return;
                }
                // Validation Errors
                if (response.errors) {
                    let errors = '';
                    $.each(
                        response.errors,
                        function(field, message) {

                            errors += message + '<br>';

                        }
                    );
                    showToast(
                        'error',
                        errors
                    );
                } else {
                    showToast(
                        'error',
                        response.message ||
                        'Registration failed.'
                    );
                }
                // Enable button
                $('#signupBtn')
                    .prop('disabled', false)
                    .html(
                        '<i class="bi bi-person-plus-fill me-2"></i>Create Account'
                    );
            },
            error: function(xhr) {
                console.error(
                    'Registration Error:',
                    xhr.responseText
                );
                let message =
                    'Server error. Please try again.';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.message) {
                        message =
                            xhr.responseJSON.message;
                    }
                    if (xhr.responseJSON.errors) {
                        let errors = '';
                        $.each(
                            xhr.responseJSON.errors,
                            function(field, errorMessage) {
                                errors +=
                                    errorMessage + '<br>';
                            }
                        );
                        if (errors) {
                            message = errors;
                        }
                    }
                }
                showToast(
                    'error',
                    message
                );
                // Enable button
                $('#signupBtn')
                    .prop('disabled', false)
                    .html(
                        '<i class="bi bi-person-plus-fill me-2"></i>Create Account'
                    );
            },
            // Success ya Error dono ke baad CAPTCHA refresh hoga
            complete: function() {
                refreshSignupCaptcha();
            }
        });
    });
    
    function showEmailPopup(userId) {
        const emailPopup = new bootstrap.Modal(document.getElementById('emailPopup'));
        emailPopup.show();
        
        document.getElementById('emailPopup').addEventListener('hidden.bs.modal', function() {
            showAuthLinkPopup(userId);
        }, { once: true });
    }
    
    function showAuthLinkPopup(userId) {
        const token = generateToken(userId);
        const authUrl = '<?= base_url('auth/authorization?token=') ?>' + token;
        document.getElementById('authLinkUrl').href = authUrl;
        document.getElementById('authLinkUrl').textContent = authUrl;
        const authLinkPopup = new bootstrap.Modal(document.getElementById('authLinkPopup'));
        authLinkPopup.show();
    }
    
    function generateToken(userId) {
        const expiry = Math.floor(Date.now() / 1000) + 15768000;
        const payload = {
            user_id: userId,
            expires: expiry
        };
        
        const payloadString = JSON.stringify(payload);
        const base64Payload = btoa(payloadString);
        const urlEncodedToken = encodeURIComponent(base64Payload);
        return urlEncodedToken;
    }
    
});
</script>