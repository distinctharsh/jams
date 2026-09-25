<!-- Login Modal -->
<style>
/* =========================================================
   LOGIN MODAL
   ========================================================= */
/* Login Modal Container */
.jams-modal {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    animation: zoomIn .4s;
    box-shadow: 0 20px 60px rgba(0, 0, 0, .35);
}

/* Modal Backdrop */
.modal-backdrop.show {
    backdrop-filter: blur(7px);
    background: rgba(0, 0, 0, .4);
}


/* =========================================================
   LOGIN LEFT PANEL
   ========================================================= */

.login-left {
    background: linear-gradient(160deg, #1e4d7b, #2f6ea8);
    color: #fff;
    text-align: center;
    padding: 35px 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Login Logo */
.login-logo {
    width: 150px;
    margin: auto;
    margin-bottom: -30px;
}

/* Left Panel Headings */
.login-left h5 {
    color: #FF9933;
    font-weight: 700;
}

.login-left h6 {
    font-weight: 700;
}

/* Force White Text */
.login-left,
.login-left h3,
.login-left h4,
.login-left h6,
.login-left p,
.login-left small {
    color: #fff !important;
}

/* Left Panel Divider */
.login-left hr {
    border-color: rgba(255, 255, 255, .5) !important;
}


/* =========================================================
   LOGIN FORM INPUTS
   ========================================================= */

.form-control {
    height: 48px;
    border-radius: 10px;
}

.login-input {
    height: 45px;
}

.input-group-text {
    background: #1e4d7b;
    color: #fff;
    border-color: #1e4d7b;
    border-radius: 10px 0 0 10px;
}


/* =========================================================
   LOGIN SUBMIT BUTTON
   ========================================================= */

.login-submit {
    background: linear-gradient(135deg, #0d6efd, #084298);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 14px 20px;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: .5px;
    transition: all .3s ease;
    box-shadow: 0 8px 20px rgba(13, 110, 253, .25);
}

.login-submit:hover {
    background: linear-gradient(135deg, #084298, #052c65);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 12px 25px rgba(13, 110, 253, .35);
}

.login-submit:focus {
    color: #fff;
    box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25);
}

.login-submit:active {
    transform: scale(.98);
}


/* =========================================================
   FORGOT PASSWORD
   ========================================================= */

.forgot-link {
    color: #0d6efd;
    font-size: 14px;
    font-weight: 600;
    transition: .3s;
    position: relative;
}

.forgot-link:hover {
    color: #084298;
}

.forgot-link::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -3px;
    width: 0;
    height: 2px;
    background: #0d6efd;
    transition: .3s;
}

.forgot-link:hover::after {
    width: 100%;
}


/* =========================================================
   LOGIN CAPTCHA
   ========================================================= */

/* =========================================================
   ATTRACTIVE CAPTCHA
   ========================================================= */

.captcha-box {
    height: 45px;
    min-width: 170px;
    padding: 0 18px;
    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
    overflow: hidden;

    border: 1px solid #c8d6e5;
    border-radius: 10px;

    background:
        linear-gradient(135deg, #f8fbff 0%, #eef5fb 100%);

    box-shadow:
        0 3px 10px rgba(23, 74, 120, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);

    transition: all .25s ease;
}

/* Decorative Lines */
.captcha-box::before,
.captcha-box::after {
    content: "";
    position: absolute;
    width: 140%;
    height: 1px;
    background: rgba(23, 74, 120, 0.12);
    transform: rotate(-12deg);
    pointer-events: none;
}

.captcha-box::before {
    top: 15px;
}

.captcha-box::after {
    bottom: 14px;
    transform: rotate(10deg);
}

/* CAPTCHA Text */
.captcha-text {
    position: relative;
    z-index: 2;
    font-size: 23px;
    font-weight: 800;
    letter-spacing: 5px;
    color: #174a78;
    user-select: none;
    font-family: "Courier New", monospace;
    transform: skew(-4deg);
}

/* Hover */
.captcha-box:hover {
    border-color: #174a78;
    box-shadow:
        0 5px 16px rgba(23, 74, 120, 0.14),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
    transform: translateY(-1px);
}

#refreshCaptcha {
    border-radius: 6px;
}

/* =========================================================
   LOGIN MODAL BODY
   ========================================================= */
.modal-body {
    background: #fbfcff;
}

/* =========================================================
   LOGIN MODAL ANIMATION
   ========================================================= */
@keyframes zoomIn {
    from {
        transform: scale(.6);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.header-divider {
    width: 100%;
    max-width: 1031px;
    height: 3px;
    margin-top: 8px;
    margin-bottom: 22px;
    background: linear-gradient(
        90deg,
        #174a78 0%,
        #ff9933 50%,
        #138808 100%
    );
    border-radius: 5px;
    opacity: 0.9;
}
</style>
<div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content jams-modal">
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Side -->
                    <div class="col-md-5 login-left text-white">
                        <img src="<?= base_url('assets/image/logo.png') ?>"
                             class="login-logo"
                             alt="Emblem"
                             onerror="this.style.display='none'">
                        <h2 class="mb-2 fw-bold"
                            style="color:#FF9933;"
                            data-aos="fade-right"
                            data-aos-delay="200">
                            मंत्रिमंडल सचिवालय
                        </h2>
                        <h4 class="login-eng text-white fw-semibold">
                            Cabinet Secretariat
                        </h4>
                        <h6 class="login-goi text-white">
                            Government of India
                        </h6>
                        <div class="header-divider"></div>
                        <p class="text-white mb-0">
                            <strong>JAMS</strong><br>
                            JAMMER Approval Management System
                        </p>
                        <small class="mt-3 d-block text-white">
                            Secure • Transparent • Digital Governance
                        </small>
                    </div>
                    <!-- Right Side -->
                    <div class="col-md-7 login-right">
                        <div class="text-end">
                            <button class="btn-close mt-3 me-3"
                                    data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="px-5 pb-5">
                            <h2 class="fw-bold text-center mb-2"
                                style="color:#1e4d7b;" id="modalTitle">
                                Login to JAMS
                            </h2>
                            <p class="text-center text-muted mb-4" id="modalSubTitle">
                                Welcome Back
                            </p>
                            <form id="loginForm">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label for="login_email"
                                           class="form-label fw-semibold">
                                        Official Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope-fill"></i>
                                        </span>
                                        <input type="email"
                                               class="form-control login-input"
                                               id="login_email"
                                               name="email"
                                               placeholder="Enter your official email"
                                               autocomplete="username"
                                               maxlength="150"
                                               required>
                                    </div>
                                </div>


                                <div class="mb-2">
                                    <label class="form-label fw-semibold">
                                        Password
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock-fill"></i>
                                        </span>
                                        <input class="form-control login-input" 
                                               type="password" 
                                               id="login_password" 
                                               name="password"
                                               placeholder="Enter your password"
                                               required>
                                        <button type="button"
                                                class="btn"
                                                onclick="toggleLoginPassword()"
                                                style="background:#ff9933; color:#fff; border-color:#ff9933;">
                                            <i id="loginEyeIcon" class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="bi bi-shield-lock me-1"></i> CAPTCHA
                                    </label>
                                    <div class="row g-2">
                                        <div class="col-7">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="bi bi-shield-check"></i>
                                                </span>
                                                <input class="form-control login-input"
                                                       type="text"
                                                       id="login_captcha"
                                                       name="captcha"
                                                       placeholder="CAPTCHA"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="captcha-box d-flex align-items-center justify-content-between px-2">
                                                <span class="captcha-text fw-bold" id="loginCaptchaText">
                                                    <?= isset($captcha_text) ? esc($captcha_text) : 'ABCDEF' ?>
                                                </span>
                                                <button type="button"
                                                        class="btn btn-sm btn-outline-primary"
                                                        id="loginRefreshCaptcha"
                                                        title="Refresh CAPTCHA">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn login-submit" id="loginBtn">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        Login
                                    </button>
                                </div>
                                <div class="text-center mt-4">
                                    <span class="text-muted">
                                        Don't have an account?
                                    </span>
                                    <a href="<?= base_url('signup') ?>" class="fw-semibold text-decoration-none">
                                        Sign Up Here
                                    </a>
                                </div>

                                <!-- FORGOT PASSWORD LINK -->
                                <div class="text-center mb-3">
                                    <a href="javascript:void(0)" id="showForgotPasswordBtn" class="forgot-link text-decoration-none mt-5">
                                        Forgot Password?
                                    </a>
                                </div>
                            </form>

                            <!-- FORGOT PASSWORD FORM -->
                            <form id="forgotPasswordForm" style="display: none;">
                                <?= csrf_field() ?>
                                <div class="mb-4">
                                    <label for="forgot_email" class="form-label fw-semibold">
                                        Enter Registered Official Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope-at-fill"></i>
                                        </span>
                                        <input type="email"
                                               class="form-control login-input"
                                               id="forgot_email"
                                               name="email"
                                               placeholder="name@example.com"
                                               required>
                                    </div>
                                    <small class="text-muted mt-2 d-block">
                                        We will send a password reset link to your registered official email address.
                                    </small>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn login-submit" id="forgotBtn">
                                        <i class="bi bi-send-fill me-2"></i>
                                        Send Reset Link
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-link text-decoration-none p-0 back-to-login">
                                        <i class="bi bi-arrow-left me-1"></i> Back to Login
                                    </button>
                                </div>
                            </form>

                            <!-- OTP VERIFICATION FORM -->
                            <form id="otpForm" style="display: none;">
                                <?= csrf_field() ?>
                                <div class="mb-4">
                                    <label for="login_otp" class="form-label fw-semibold">
                                        Enter Security OTP
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-key-fill"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control login-input text-center fw-bold fs-5"
                                               id="login_otp"
                                               name="otp"
                                               placeholder="6-Digit OTP"
                                               maxlength="6"
                                               required>
                                    </div>
                                    <small class="text-muted mt-1 d-block">
                                        OTP sent to your registered official email. Valid for 10 minutes.
                                    </small>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn login-submit" id="verifyOtpBtn">
                                        <i class="bi bi-shield-check me-2"></i>
                                        Verify OTP & Continue
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-link text-decoration-none p-0 back-to-login">
                                        <i class="bi bi-arrow-left me-1"></i> Back to Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Simulated Email Preview Modal -->
<div class="modal fade" id="emailPreviewModal" tabindex="-1" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded-4">
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title fw-bold text-white">
                    <i class="bi bi-envelope-open-fill me-2"></i> [DEMO] Email Preview
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="border rounded-3 p-3 bg-light mb-3">
                    <p class="mb-1 text-muted small"><strong>From:</strong> no-reply@jams.gov.in (JAMS Portal)</p>
                    <p class="mb-1 text-muted small"><strong>Subject:</strong> Password Reset Request - JAMS</p>
                </div>
                <div class="p-3 bg-white border rounded-3">
                    <p>Hello,</p>
                    <p>We received a request to reset your password. Click the link below to set a new password:</p>
                    <div class="text-center my-4">
                        <a href="#" id="previewResetLinkBtn" class="btn btn-warning fw-bold px-4 py-2" target="_blank">
                            <i class="bi bi-shield-lock-fill me-1"></i> Reset Password
                        </a>
                    </div>
                    <p class="small text-muted mb-0">This link is valid for 1 hour.</p>
                </div>
            </div>
            <div class="modal-footer border-0 bg-light">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>