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
    height: 52px;
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
    text-shadow:
        1px 1px 0 #ffffff,
        2px 2px 0 rgba(23, 74, 120, 0.08);
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
                                style="color:#1e4d7b;">
                                Login to JAMS
                            </h2>
                            <p class="text-center text-muted mb-4">
                                Welcome Back
                            </p>
                            <form id="loginForm">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        Username
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person-fill"></i>
                                        </span>
                                        <input class="form-control login-input" 
                                               type="text" 
                                               id="login_username" 
                                               name="username"
                                               placeholder="Enter your username"
                                               required>
                                    </div>
                                </div>
                                <div class="mb-4">
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
                                    <a href="<?= base_url('signup') ?>"  class="fw-semibold text-decoration-none">
                                        Sign Up Here
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>