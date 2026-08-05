<!-- Government Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden">
            <div class="row g-0">
                <!-- Left Panel -->
                <div class="col-md-5 login-left d-flex flex-column justify-content-center align-items-center p-5">
                    <img src="<?= base_url('assets/image/logo.png') ?>"
                         class="login-logo mb-4"
                         width="90"
                         onerror="this.style.display='none'">
                    <h3 class="text-white fw-bold mb-2">
                        मंत्रिमंडल सचिवालय
                    </h3>
                    <h4 class="text-white">
                        Cabinet Secretariat
                    </h4>
                    <p class="text-white-50">
                        Government of India
                    </p>
                    <hr class="border-light w-75">
                    <h5 class="text-white mt-3">
                        Create Account
                    </h5>
                    <small class="text-white-50 text-center">
                        Register yourself to access the<br>
                        JAMAR Approval Management System
                    </small>
                </div>
                <!-- Right Panel -->
                <div class="col-md-7 bg-white">
                    <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h3 class="fw-bold text-primary mb-1">
                                    Sign Up
                                </h3>
                                <small class="text-muted">
                                    Create your JAMS account
                                </small>
                            </div>
                            <button class="btn-close"
                                    data-bs-dismiss="modal"></button>
                        </div>
                        <form id="signupForm">
                            <?= csrf_field() ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input class="form-control login-input" 
                                           type="text" 
                                           id="signup_full_name" 
                                           name="full_name"
                                           placeholder="Enter full name"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Employee ID</label>
                                    <input class="form-control login-input" 
                                           type="text" 
                                           id="signup_employee_id" 
                                           name="employee_id"
                                           placeholder="Enter employee ID"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Official Email</label>
                                    <input class="form-control login-input" 
                                           type="email" 
                                           id="signup_email" 
                                           name="email"
                                           placeholder="Enter official email"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Mobile Number</label>
                                    <input class="form-control login-input" 
                                           type="text" 
                                           id="signup_mobile" 
                                           name="mobile"
                                           placeholder="Enter mobile number"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Username</label>
                                    <input class="form-control login-input" 
                                           type="text" 
                                           id="signup_username" 
                                           name="username"
                                           placeholder="Choose a username"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input class="form-control login-input" 
                                               type="password" 
                                               id="signup_password" 
                                               name="password"
                                               placeholder="Create a password"
                                               required>
                                        <button type="button"
                                                class="btn"
                                                onclick="toggleSignupPassword()"
                                                style="background:#ff9933; color:#fff; border-color:#ff9933;">
                                            <i id="signupEyeIcon" class="bi bi-eye-fill"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-12">
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
                                                       id="signup_captcha"
                                                       name="captcha"
                                                       placeholder="CAPTCHA"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="captcha-box d-flex align-items-center justify-content-between px-2">
                                                <span class="captcha-text fw-bold" id="signupCaptchaText">
                                                    <?= isset($captcha_text) ? esc($captcha_text) : 'ABCDEF' ?>
                                                </span>
                                                <button type="button"
                                                        class="btn btn-sm btn-outline-primary"
                                                        id="signupRefreshCaptcha"
                                                        title="Refresh CAPTCHA">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       id="terms" 
                                       required>
                                <label class="form-check-label" for="terms">
                                    I agree to the Terms & Conditions.
                                </label>
                            </div>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn login-submit" id="signupBtn">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Create Account
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <span class="text-muted">
                                    Already have an account?
                                </span>
                                <a href="#" id="openLogin" class="fw-semibold text-decoration-none">
                                    Login Here
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>