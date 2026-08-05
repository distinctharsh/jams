<!-- Login Modal -->
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
                        <hr class="my-4 border-light opacity-50 w-75">
                        <p class="text-white mb-0">
                            <strong>JAMS</strong><br>
                            JAMAR Approval Management System
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
                                    <a href="#" id="openSignup" class="fw-semibold text-decoration-none">
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