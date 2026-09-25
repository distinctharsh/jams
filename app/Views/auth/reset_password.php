<?php echo view('header/header'); ?>
<style>

    

.main {
    position: relative !important;
    display: block !important;
    width: 100%;
    min-height: 80vh;
    margin: 0 !important;
    padding-top: 185px !important;
    padding-bottom: 45px !important;
    background:
        radial-gradient(circle at 5% 10%, rgba(23, 74, 120, 0.055), transparent 28%),
        radial-gradient(circle at 95% 90%, rgba(19, 136, 8, 0.035), transparent 25%),
        var(--page-bg);
}



    .reset-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        width: 100%;
        max-width: 480px;
    }

    .reset-header {
        background: linear-gradient(160deg, #1e4d7b, #2f6ea8);
        padding: 30px 20px;
        text-align: center;
        color: #ffffff;
    }

    .reset-header h4 {
        color: #FF9933;
        font-weight: 700;
    }

    .form-control {
        height: 48px;
        border-radius: 10px;
    }

    .input-group-text {
        background: #1e4d7b;
        color: #fff;
        border-color: #1e4d7b;
        border-radius: 10px 0 0 10px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #0d6efd, #084298);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #084298, #052c65);
        color: #fff;
        transform: translateY(-2px);
    }
</style>

<div class="main">
    <div class="reset-card mx-auto">
        <div class="reset-header">
            <h4 class="mb-1">मंत्रिमंडल सचिवालय</h4>
            <h6 class="mb-0 text-white">Cabinet Secretariat - JAMS</h6>
        </div>
        <div class="p-4 p-md-5">
            <h5 class="fw-bold text-center mb-1" style="color:#1e4d7b;">Create New Password</h5>
            <p class="text-center text-muted small mb-4">Please set a strong password for your account.</p>

            <form id="resetPasswordForm">
                <?= csrf_field() ?>
                <input type="hidden" id="reset_token" name="token" value="<?= esc($token) ?>">

                <!-- NEW PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="new_password" placeholder="Enter new password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="new_password">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm new password" required>
                        <button type="button" class="btn btn-outline-secondary toggle-pass" data-target="confirm_password">
                            <i class="bi bi-eye-fill"></i>
                        </button>
                    </div>
                    <div id="passMatchMsg" class="small mt-1"></div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-submit" id="submitBtn">
                        <i class="bi bi-check-circle-fill me-2"></i> Update Password
                    </button>
                </div>

                <div class="text-center mt-4">
                    <a href="<?= base_url('/') ?>" class="text-decoration-none text-muted small">
                        <i class="bi bi-arrow-left me-1"></i> Back to Login Page
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= view('footer/footer') ?>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/crypto-js.min.js') ?>"></script>

<script>
$(document).ready(function () {
    let CRYPTO_KEY = '';
    let CRYPTO_IV = '';
    let CRYPTO_READY = false;

    function decodeBase64(val) {
        try { return atob(val); } catch (e) { return ''; }
    }

    function getCSRFData() {
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? { name: '<?= csrf_token() ?>', value: meta.getAttribute('content') } : null;
    }

    function updateCSRF(hash) {
        if (!hash) return;
        const meta = document.querySelector('meta[name="csrf-token"]');
        if (meta) meta.setAttribute('content', hash);
        $('input[name="<?= csrf_token() ?>"]').val(hash);
    }

    function loadCryptoConfig() {
        const csrf = getCSRFData();
        const data = {};
        data[csrf.name] = csrf.value;

        return $.ajax({
            url: "<?= base_url('login-crypto-config') ?>",
            type: 'POST',
            dataType: 'json',
            data: data
        }).then(function (res) {
            if (res.csrfHash) updateCSRF(res.csrfHash);
            CRYPTO_KEY = decodeBase64(res.key);
            CRYPTO_IV = decodeBase64(res.iv);
            CRYPTO_READY = true;
        });
    }

    function encryptPassword(password) {
        const key = CryptoJS.SHA256(CRYPTO_KEY);
        const ivHash = CryptoJS.SHA256(CRYPTO_IV);
        const iv = CryptoJS.lib.WordArray.create(ivHash.words.slice(0, 4), 16);
        const encrypted = CryptoJS.AES.encrypt(password, key, {
            iv: iv,
            mode: CryptoJS.mode.CBC,
            padding: CryptoJS.pad.Pkcs7
        });
        return CryptoJS.enc.Base64.stringify(encrypted.ciphertext);
    }

    loadCryptoConfig();

    // Toggle Eye Icon
    $('.toggle-pass').on('click', function () {
        const targetId = $(this).data('target');
        const input = $('#' + targetId);
        const icon = $(this).find('i');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
        } else {
            input.attr('type', 'password');
            icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
        }
    });

    // Password Match Checking
    $('#confirm_password, #new_password').on('keyup', function () {
        const pass = $('#new_password').val();
        const confirmPass = $('#confirm_password').val();
        if (confirmPass.length > 0) {
            if (pass === confirmPass) {
                $('#passMatchMsg').html('<span class="text-success"><i class="bi bi-check-circle"></i> Passwords match</span>');
            } else {
                $('#passMatchMsg').html('<span class="text-danger"><i class="bi bi-x-circle"></i> Passwords do not match</span>');
            }
        } else {
            $('#passMatchMsg').html('');
        }
    });

    // Submit Form
    $('#resetPasswordForm').on('submit', function (e) {
        e.preventDefault();

        const token = $('#reset_token').val();
        const newPass = $('#new_password').val();
        const confirmPass = $('#confirm_password').val();

        if (newPass !== confirmPass) {
            showToast('warning', 'Passwords do not match!');
            return;
        }

        if (newPass.length < 8) {
            showToast('warning', 'Password must be at least 8 characters long.');
            return;
        }

        const csrf = getCSRFData();
        $('#submitBtn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-2"></span>Updating...');

        const cryptoPromise = CRYPTO_READY ? Promise.resolve() : loadCryptoConfig();

        cryptoPromise.then(function () {
            const encryptedPassword = encryptPassword(newPass);
            const latestCSRF = getCSRFData();

            const postData = {
                token: token,
                encryptedPassword: encryptedPassword
            };
            postData[latestCSRF.name] = latestCSRF.value;

            return $.ajax({
                url: "<?= base_url('update-password') ?>",
                type: 'POST',
                dataType: 'json',
                data: postData
            });
        }).then(function (res) {
            if (res.csrfHash) updateCSRF(res.csrfHash);
            if (res.success) {
                showToast('success', res.message);
                setTimeout(function () {
                    window.location.href = res.redirect;
                }, 1500);
            } else {
                showToast('error', res.message || 'Failed to update password.');
            }
        }).catch(function (xhr) {
            let msg = 'Error updating password.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                msg = xhr.responseJSON.message;
            }
            showToast('error', msg);
        }).always(function () {
            $('#submitBtn').prop('disabled', false).html('<i class="bi bi-check-circle-fill me-2"></i> Update Password');
        });
    });
});
</script>