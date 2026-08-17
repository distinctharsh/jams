<style>
#footer{
    background:#1e4d7b;
    color:#fff;
}

#footer p,
#footer small{
    color:#e8edf5;
}

.footer-links{
    padding:0;
    margin:0;
}

.footer-links li{
    list-style:none;
    margin-bottom:14px;
}

.footer-links a{
    color:#fff;
    text-decoration:none;
    font-weight:500;
    transition:.3s;
}

.footer-links a:hover{
    color:#FF9933;
    padding-left:6px;
}

.footer-links i{
    color:#FF9933;
}

#footer h3,
#footer h4{
    color:#fff;
}

#footer img{
    background:#fff;
    border-radius:50%;
    padding:6px;
.branding {
    background: #fff;
    border-bottom: 3px solid #FF9933;
}
</style>
<footer id="footer" class="footer position-relative branding" style="background:#1e4d7b; color:#fff;">
    <div class="container py-5">
        <div class="row">
            <!-- Left Section -->
            <div class="col-lg-8 mb-4">
                <div class="d-flex align-items-center mb-4">
                    <div style="margin-left:-2px;">
                        <h3 class="mb-1 fw-bold" style="color:#FF9933;">
                            मंत्रिमंडल सचिवालय
                        </h3>
                        <h5 class="mb-1 fw-bold text-white">
                            Cabinet Secretariat
                        </h5>
                        <small class="text-light">
                            Government of India
                        </small>
                    </div>
                </div>
                <p class="mb-4 text-light"
                   style="text-align:justify; line-height:1.7; font-size:13px;">
                    The Cabinet Secretariat is responsible for the administration of the
                    Government of India (Transaction of Business) Rules, 1961 and the
                    Government of India (Allocation of Business) Rules, 1961. It facilitates
                    smooth coordination among Ministries and Departments and provides
                    secretarial assistance to the Cabinet and its Committees.
                </p>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                        Rashtrapati Bhavan,<br>
                        New Delhi - 110004
                    </div>
                    <div class="col-md-4 mb-3">
                        <i class="bi bi-telephone-fill text-warning me-2"></i>
                        +91-11-2301-0000
                    </div>
                    <div class="col-md-4 mb-3">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                        support@cabsec.gov.in
                    </div>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-lg-4">
                <h4 class="text-warning fw-bold mb-4">
                    Quick Links
                </h4>
                <ul class="list-unstyled footer-links">
                    <li>
                        <a href="<?= base_url() ?>">
                            <i class="bi bi-chevron-right me-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-chevron-right me-2"></i> About Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-chevron-right me-2"></i> Services
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="bi bi-chevron-right me-2"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer Bottom -->
    <div style="background:#163a5b; padding:18px 0; border-top:1px solid rgba(255,255,255,.15);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    © <?= date('Y'); ?>
                    <strong style="color:#FF9933;">
                        Cabinet Secretariat
                    </strong>
                    | Government of India.
                    All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed &amp; Developed by
                    <strong style="color:#FF9933;">
                        National Informatics Centre (NIC)
                    </strong>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php 
$loginModal = APPPATH . 'Views/modals/login_modal.php';

if (file_exists($loginModal)) {
    include_once($loginModal);
}
?> 
<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>
<!-- Preloader -->
<div id="preloader"></div>
<!-- Vendor JS -->
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
<script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js') ?>"></script>

<!-- Main JS -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/js/tost.js') ?>"></script>
<script>
    AOS.init();

    // ================================
    // CSRF Helper Functions
    // ================================
    function getCSRFName() {
        const csrfInput = document.querySelector('input[name="csrf_token"]');
        return csrfInput ? csrfInput.name : 'csrf_token';
    }

    function getCSRFHash() {
        const csrfInput = document.querySelector('input[name="csrf_token"]');
        return csrfInput ? csrfInput.value : '';
    }

    function updateCSRF(hash) {
        const csrfInputs = document.querySelectorAll('input[name="csrf_token"]');
        csrfInputs.forEach(input => input.value = hash);
    }

    // ================================
    // Toggle Password Functions
    // ================================
    window.toggleLoginPassword = function() {
        const passwordInput = document.getElementById('login_password');
        const eyeIcon = document.getElementById('loginEyeIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.className = 'bi bi-eye-slash-fill';
        } else {
            passwordInput.type = 'password';
            eyeIcon.className = 'bi bi-eye-fill';
        }
    }

    window.toggleSignupPassword = function() {
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

    // ================================
    // Refresh CAPTCHA - Login
    // ================================
    window.refreshLoginCaptcha = function() {
        const csrfHash = getCSRFHash();
        
        $.ajax({
            url: "<?= base_url('refresh-captcha') ?>",
            type: "POST",
            data: {
                csrf_token: csrfHash
            },
            dataType: "json",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            success: function(response) {
                if (response.csrfHash) {
                    updateCSRF(response.csrfHash);
                }
                if (response.success) {
                    $('#loginCaptchaText').text(response.captcha);
                    $('#login_captcha').val('');
                }
            },
            error: function(xhr) {
                console.error('CAPTCHA refresh error:', xhr);
            }
        });
    }

    // ================================
    // Refresh CAPTCHA - Signup
    // ================================
    window.refreshSignupCaptcha = function() {
        const csrfHash = getCSRFHash();
        
        $.ajax({
            url: "<?= base_url('refresh-captcha') ?>",
            type: "POST",
            data: {
                csrf_token: csrfHash
            },
            dataType: "json",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            success: function(response) {
                if (response.csrfHash) {
                    updateCSRF(response.csrfHash);
                }
                if (response.success) {
                    $('#signupCaptchaText').text(response.captcha);
                    $('#signup_captcha').val('');
                }
            },
            error: function(xhr) {
                console.error('CAPTCHA refresh error:', xhr);
            }
        });
    }

    // ================================
    // Document Ready
    // ================================
    $(document).ready(function() {
        // =====================================
        // Open Login Modal from Signup
        // =====================================
        $(document).on('click', '#openLogin', function(e) {
            e.preventDefault();
            const signupModal = bootstrap.Modal.getInstance(
                document.getElementById('signupModal')
            );
            if (signupModal) {
                signupModal.hide();
            }
            $('#signupModal').one('hidden.bs.modal', function() {
                $('.modal-backdrop').remove();
                $('body').removeClass('modal-open').css({
                    overflow: '',
                    paddingRight: ''
                });
                const loginModal = new bootstrap.Modal(
                    document.getElementById('loginModal'),
                    {
                        backdrop: 'static',
                        keyboard: false
                    }
                );
                loginModal.show();
            });
        });

        // =====================================
        // Login Form Submit - Sending plain password
        // =====================================
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            const username = $('#login_username').val().trim();
            const password = $('#login_password').val().trim();
            const captcha = $('#login_captcha').val().trim();
            
            if (!username || !password || !captcha) {
                showToast('warning', 'All fields are required');
                return;
            }
            
            $('#loginBtn')
                .prop('disabled', true)
                .html('<span class="spinner-border spinner-border-sm me-2"></span>Logging in...');
            
            $.ajax({
                url: '<?= base_url('auth/checkLogin') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    username: username,
                    password: password, // Sending plain password
                    captcha: captcha,
                    csrf_token: getCSRFHash()
                },
                success: function(response) {
                    if (response.csrfHash) {
                        updateCSRF(response.csrfHash);
                    }
                    if (response.success) {
                        showToast('success', response.message);
                        const loginModal = bootstrap.Modal.getInstance(
                            document.getElementById('loginModal')
                        );
                        if (loginModal) {
                            loginModal.hide();
                        }
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    } else {
                        let message = response.message || 'Login failed.';
                        if (response.errors) {
                            message = Object.values(response.errors).join('<br>');
                        }
                        showToast('error', message);
                        refreshLoginCaptcha();
                        $('#login_captcha').val('');
                    }
                },
                error: function(xhr) {
                    let message = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    showToast('error', message);
                    refreshLoginCaptcha();
                    $('#login_captcha').val('');
                },
                complete: function() {
                    $('#loginBtn')
                        .prop('disabled', false)
                        .html('<i class="bi bi-box-arrow-in-right me-2"></i>Login');
                }
            });
        });

        // =====================================
        // Refresh CAPTCHA Events
        // =====================================
        $('#loginRefreshCaptcha').click(function() {
            refreshLoginCaptcha();
        });
        
        // Refresh CAPTCHA when modals open
        $('#loginModal').on('shown.bs.modal', function() {
            refreshLoginCaptcha();
        });

        // =====================================
        // Cleanup Modals
        // =====================================
        $('#loginModal').on('hidden.bs.modal', function() {
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open').css({
                overflow: '',
                paddingRight: ''
            });
            $('#loginForm')[0].reset();
            $('#login_captcha').val('');
        });

    });
</script>
</body>
</html>