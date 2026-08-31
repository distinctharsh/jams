<?php
$csrfName = csrf_token();
$csrfHash = csrf_hash();

ob_start();
?>

<style>
.change-password-page {
    width: 100%;
    min-height: calc(100vh - 125px);
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 45px 30px 60px;
    box-sizing: border-box;
}

.gov-password-card {
    width: 100%;
    max-width: 760px;
    background: #ffffff;
    border: 1px solid #dbe4ee;
    border-radius: 16px;
    box-shadow: 0 10px 35px rgba(23, 74, 120, 0.12);
    overflow: hidden;
    margin: 0 auto;
}

.card-header-custom {
    text-align: center;
    padding: 28px 30px 20px !important;
    background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
    border-bottom: 1px solid #e8eef5;
}

.icon-wrapper {
    width: 58px !important;
    height: 58px !important;
    margin: 0 auto 12px !important;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #eaf3fb;
    color: #174a78;
    box-shadow: 0 5px 15px rgba(23, 74, 120, 0.10);
}

.icon-wrapper i {
    font-size: 25px !important;
}

.card-header-custom h3 {
    color: #173f66;
    font-size: 1.35rem !important;
    font-weight: 700;
    margin: 0 0 5px !important;
}

.card-header-custom p {
    color: #64748b;
    font-size: 0.82rem !important;
    margin: 0 !important;
}

.card-body-custom {
    padding: 24px 30px 28px !important;
}

.gov-alert {
    display: none;
    border-radius: 8px;
    padding: 10px 13px !important;
    margin-bottom: 18px !important;
    font-size: 0.82rem !important;
    align-items: center;
    gap: 8px;
}

.gov-alert.show {
    display: flex;
}

.gov-alert-success {
    background: #ecfdf3;
    border: 1px solid #a7f3d0;
    color: #047857;
}

.gov-alert-danger {
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #b91c1c;
}

.change-password-page .mb-2,
.change-password-page .mb-3 {
    margin-bottom: 18px !important;
}

.gov-form-label {
    display: block;
    color: #1e3a5f;
    font-size: 0.78rem !important;
    font-weight: 600;
    margin-bottom: 7px !important;
}

.gov-form-label i {
    color: #174a78;
}

.gov-password-wrapper {
    position: relative;
    width: 100%;
}

.gov-form-control {
    width: 100%;
    height: 44px;
    box-sizing: border-box;
    padding: 10px 45px 10px 14px !important;
    border: 1px solid #cbd5e1;
    border-radius: 8px !important;
    background: #ffffff;
    color: #1e293b;
    font-size: 0.84rem !important;
    outline: none;
    transition: all 0.2s ease;
}

.gov-form-control::placeholder {
    color: #94a3b8;
}

.gov-form-control:focus {
    border-color: #174a78;
    box-shadow: 0 0 0 3px rgba(23, 74, 120, 0.10);
}

.gov-form-control.is-valid {
    border-color: #10b981;
}

.gov-form-control.is-invalid {
    border-color: #dc2626;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 10px !important;
    transform: translateY(-50%);
    border: 0;
    background: transparent;
    color: #174a78;
    cursor: pointer;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}

.toggle-password:hover {
    color: #e58500;
}

.strength-bar-wrap {
    width: 100%;
    height: 4px !important;
    background: #e2e8f0;
    border-radius: 10px;
    overflow: hidden;
    margin-top: 7px !important;
}

.strength-bar {
    width: 0;
    height: 100%;
    border-radius: 10px;
    transition: width 0.25s ease, background 0.25s ease;
}

.strength-text {
    display: flex;
    justify-content: space-between;
    font-size: 0.68rem !important;
    margin-top: 4px !important;
}

.req-list {
    display: flex;
    flex-wrap: wrap;
    gap: 6px 14px !important;
    margin-top: 7px !important;
    font-size: 0.68rem !important;
}

.req-item {
    color: #94a3b8;
    white-space: nowrap;
}

.req-item i {
    font-size: 7px;
    margin-right: 3px;
}

.req-item.met {
    color: #059669;
}

.req-item.met i {
    font-size: 9px;
}

#matchText {
    font-size: 0.68rem !important;
}

.btn-gov {
    width: 100%;
    min-height: 44px;
    border: 0;
    border-radius: 8px !important;
    background: linear-gradient(135deg, #174a78, #23679d);
    color: #ffffff;
    font-size: 0.86rem !important;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: all 0.2s ease;
    margin-top: 4px;
}

.btn-gov:hover {
    background: linear-gradient(135deg, #123d65, #174a78);
    box-shadow: 0 6px 18px rgba(23, 74, 120, 0.20);
    transform: translateY(-1px);
}

.btn-gov:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    transform: none;
}

.spinner {
    width: 15px;
    height: 15px;
    border: 2px solid rgba(255,255,255,0.4);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* ===== PROFESSIONAL PASSWORD REQUIRED BANNER ===== */
/* =========================================================
   PROFESSIONAL GOVERNMENT PASSWORD ALERT
   ========================================================= */

.password-required-banner {
    position: fixed;
    top: 100px;
    left: 400px;
    right: 265px;
    z-index: 1000;

    min-height: 66px;
    box-sizing: border-box;

    display: flex;
    align-items: center;

    background: #ffffff;

    border: 1px solid #d9e2ec;
    border-left: 5px solid #d97706;
    border-radius: 10px;

    box-shadow:
        0 8px 24px rgba(15, 23, 42, 0.10),
        0 2px 6px rgba(15, 23, 42, 0.05);

    overflow: hidden;

    animation: passwordAlertIn 0.35s ease-out;
}


/* ===== LEFT WARNING SECTION ===== */

.password-alert-icon {
    width: 64px;
    min-width: 64px;
    height: 66px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        180deg,
        #fff7ed 0%,
        #ffedd5 100%
    );

    border-right: 1px solid #fed7aa;

    color: #c2410c;

    font-size: 21px;
}


/* ===== CONTENT ===== */

.password-alert-content {
    flex: 1;
    padding: 10px 18px;
    min-width: 0;
}


/* Title */

.password-alert-title {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 3px;

    color: #173f66;

    font-size: 0.86rem;
    font-weight: 700;
    line-height: 1.2;
}


/* Small official badge */

.password-alert-title-badge {
    display: inline-flex;
    align-items: center;

    padding: 3px 7px;

    background: #fef2f2;
    color: #b91c1c;

    border: 1px solid #fecaca;
    border-radius: 4px;

    font-size: 0.58rem;
    font-weight: 700;

    letter-spacing: 0.3px;
    text-transform: uppercase;
}


/* Message */

.password-alert-message {
    display: block;
    color: #000;
    font-size: 0.73rem;
    font-weight: 500;
    line-height: 1.45;
}


/* ===== RIGHT ACTION SECTION ===== */

.password-alert-action {
    display: flex;
    align-items: center;

    padding: 0 18px;

    border-left: 1px solid #e5eaf0;
}


/* Action Required Badge */

.password-action-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 7px 11px;

    background: #f8fafc;

    color: #174a78;

    border: 1px solid #dbe4ee;
    border-radius: 6px;

    font-size: 0.66rem;
    font-weight: 700;

    white-space: nowrap;
}

.password-action-badge i {
    color: #e58500;
    font-size: 10px;
}


/* ===== BOTTOM GOVERNMENT ACCENT ===== */

.password-required-banner::after {
    content: "";

    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;

    height: 2px;

    background: linear-gradient(
        90deg,
        #ff9933 0%,
        #ff9933 33%,
        #ffffff 33%,
        #ffffff 66%,
        #138808 66%,
        #138808 100%
    );
}


/* ===== ANIMATION ===== */

@keyframes passwordAlertIn {
    from {
        opacity: 0;
        transform: translateY(-12px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 1100px) {

    .password-required-banner {
        left: 280px;
        right: 30px;
    }

    .password-alert-action {
        padding: 0 12px;
    }

}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 768px) {

    .password-required-banner {
        top: 85px;
        left: 15px;
        right: 15px;

        min-height: auto;
    }

    .password-alert-icon {
        width: 50px;
        min-width: 50px;
        height: 72px;

        font-size: 18px;
    }

    .password-alert-content {
        padding: 10px 12px;
    }

    .password-alert-title {
        font-size: 0.78rem;
    }

    .password-alert-message {
        font-size: 0.68rem;
    }

    .password-alert-action {
        display: none;
    }

}


/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 480px) {

    .password-required-banner {
        top: 75px;
        left: 10px;
        right: 10px;

        border-left-width: 4px;
    }

    .password-alert-icon {
        width: 44px;
        min-width: 44px;
        height: 76px;

        font-size: 16px;
    }

    .password-alert-content {
        padding: 9px 10px;
    }

    .password-alert-title {
        font-size: 0.74rem;
    }

    .password-alert-title-badge {
        font-size: 0.52rem;
        padding: 2px 5px;
    }

    .password-alert-message {
        font-size: 0.65rem;
    }

}

@keyframes pulseBanner {
    0%,100% { opacity: 1; }
    50% { opacity: .94; }
}

.notification-header {
    background: rgba(255,255,255,.15);
    padding: 11px 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    border-bottom: 1px solid rgba(255,255,255,.2);
}

.notification-body {
    padding: 14px;
    background: #fff;
    color: #334155;
}

.notification-row {
    border-left: 4px solid #e58500;
    padding-left: 10px;
    margin-bottom: 10px;
}

.notification-row:last-child {
    margin-bottom: 0;
}

.notification-row h6 {
    margin: 0;
    font-size: 12px;
    font-weight: 700;
    color: #1e4d7b;
}

@media (max-width: 768px) {
    .change-password-page {
        padding: 25px 15px 40px;
        min-height: calc(100vh - 100px);
    }

    .gov-password-card {
        max-width: 100%;
        border-radius: 12px;
    }

    .card-header-custom {
        padding: 22px 20px 17px !important;
    }

    .card-body-custom {
        padding: 20px !important;
    }

 

    .password-required-banner {
        font-size: 0.75rem;
        padding: 9px 10px;
    }
}

@media (max-width: 480px) {
    .change-password-page {
        padding: 18px 10px 30px;
    }

    .card-header-custom h3 {
        font-size: 1.15rem !important;
    }

    .req-list {
        gap: 5px 10px !important;
    }
}
</style>


<div class="change-password-page">
 <?php if (session()->get('password_reset_req') == 1): ?>

    <div class="password-required-banner">

        <!-- Warning Icon -->
        <div class="password-alert-icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>

        <!-- Main Content -->
        <div class="password-alert-content">

            <div class="password-alert-title">

                <span>
                    Mandatory Password Update
                </span>

                <span class="password-alert-title-badge">
                    Security Notice
                </span>

            </div>

            <span class="password-alert-message">
                For security and compliance, you are required to update your password
                before accessing other system features. Please complete the password
                update to continue using the system.
            </span>

        </div>

        <!-- Action -->
        <div class="password-alert-action">

            <span class="password-action-badge">
                <i class="fas fa-lock"></i>
                Action Required
            </span>

        </div>

    </div>

<?php endif; ?>

    <div class="gov-password-card gov-card">
        <div class="card-header-custom">
            <div class="icon-wrapper">
                <i class="fas fa-key"></i>
            </div>
            <h3>Change Password</h3>
            <p>Update your account password securely</p>
        </div>

        <div class="card-body-custom">
            <div id="passwordMessage" class="gov-alert">
                <i class="fas fa-info-circle"></i>
                <span id="messageText"></span>
            </div>

            <form id="changePasswordForm" autocomplete="off">
                <?= csrf_field() ?>

                <div class="mb-2">
                    <label class="gov-form-label" for="current_password">
                        <i class="fas fa-lock me-1"></i>
                        Current Password
                    </label>
                    <div class="gov-password-wrapper">
                        <input type="password" class="gov-form-control" id="current_password" name="current_password" placeholder="Enter current password" autocomplete="current-password" required>
                        <button type="button" class="toggle-password" onclick="togglePass('current_password')" aria-label="Show or hide password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="gov-form-label" for="new_password">
                        <i class="fas fa-shield-alt me-1"></i>
                        New Password
                    </label>
                    <div class="gov-password-wrapper">
                        <input type="password" class="gov-form-control" id="new_password" name="new_password" placeholder="Enter new password (min 8 chars)" minlength="8" autocomplete="new-password" required>
                        <button type="button" class="toggle-password" onclick="togglePass('new_password')" aria-label="Show or hide password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <div class="strength-bar-wrap">
                        <div class="strength-bar" id="strengthBar"></div>
                    </div>

                    <div class="strength-text">
                        <span id="strengthText" style="color:#94a3b8;">Weak</span>
                        <span style="color:#94a3b8;">Password Strength</span>
                    </div>

                    <div class="req-list">
                        <span class="req-item unmet" id="reqLength">
                            <i class="fas fa-circle"></i>
                            8+ chars
                        </span>
                        <span class="req-item unmet" id="reqUpper">
                            <i class="fas fa-circle"></i>
                            Uppercase
                        </span>
                        <span class="req-item unmet" id="reqLower">
                            <i class="fas fa-circle"></i>
                            Lowercase
                        </span>
                        <span class="req-item unmet" id="reqNumber">
                            <i class="fas fa-circle"></i>
                            Number
                        </span>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="gov-form-label" for="confirm_password">
                        <i class="fas fa-check-circle me-1"></i>
                        Confirm Password
                    </label>
                    <div class="gov-password-wrapper">
                        <input type="password" class="gov-form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" minlength="8" autocomplete="new-password" required>
                        <button type="button" class="toggle-password" onclick="togglePass('confirm_password')" aria-label="Show or hide password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div style="font-size:.68rem;font-weight:600;margin-top:5px;">
                        <span id="matchText" style="color:#94a3b8;">Passwords must match</span>
                    </div>
                </div>

                <button type="submit" id="changeBtn" class="btn-gov">
                    <i class="fas fa-save"></i>
                    <span id="btnText">Change Password</span>
                </button>
            </form>
        </div>
    </div>
</div>


<script>
const baseUrl = "<?= rtrim(base_url(), '/') ?>/";

function togglePass(id) {
    const input = document.getElementById(id);
    if (!input) return;
    const button = input.parentElement.querySelector('.toggle-password');
    const icon = button ? button.querySelector('i') : null;
    if (input.type === 'password') {
        input.type = 'text';
        if (icon) icon.className = 'fas fa-eye-slash';
    } else {
        input.type = 'password';
        if (icon) icon.className = 'fas fa-eye';
    }
}

function showMsg(message, type) {
    const box = document.getElementById('passwordMessage');
    const text = document.getElementById('messageText');
    if (!box || !text) return;
    const icon = box.querySelector('i');
    box.className = 'gov-alert show gov-alert-' + type;
    text.textContent = message;
    if (icon) {
        icon.className = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-circle';
    }
    if (type === 'success') {
        setTimeout(function() {
            box.classList.remove('show');
        }, 4000);
    }
}

function checkStrength(pass) {
    const checks = {
        length: pass.length >= 8,
        upper: /[A-Z]/.test(pass),
        lower: /[a-z]/.test(pass),
        number: /[0-9]/.test(pass)
    };

    let score = 0;
    Object.values(checks).forEach(function(value) {
        if (value) score++;
    });

    const requirements = {
        reqLength: checks.length,
        reqUpper: checks.upper,
        reqLower: checks.lower,
        reqNumber: checks.number
    };

    Object.keys(requirements).forEach(function(id) {
        const element = document.getElementById(id);
        if (!element) return;
        const met = requirements[id];
        element.className = 'req-item ' + (met ? 'met' : 'unmet');
        const icon = element.querySelector('i');
        if (icon) {
            icon.className = met ? 'fas fa-check-circle' : 'fas fa-circle';
        }
    });

    let result;
    switch (score) {
        case 0:
            result = { width: 0, text: 'Very Weak', color: '#dc2626' };
            break;
        case 1:
            result = { width: 25, text: 'Weak', color: '#f59e0b' };
            break;
        case 2:
            result = { width: 50, text: 'Fair', color: '#f59e0b' };
            break;
        case 3:
            result = { width: 75, text: 'Good', color: '#3b82f6' };
            break;
        default:
            result = { width: 100, text: 'Strong', color: '#10b981' };
    }

    const bar = document.getElementById('strengthBar');
    const text = document.getElementById('strengthText');
    if (bar) {
        bar.style.width = result.width + '%';
        bar.style.background = result.color;
    }
    if (text) {
        text.textContent = result.text;
        text.style.color = result.color;
    }
}

function checkMatch() {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const matchText = document.getElementById('matchText');
    const confirmInput = document.getElementById('confirm_password');

    if (!confirmPassword) {
        matchText.textContent = 'Passwords must match';
        matchText.style.color = '#94a3b8';
        confirmInput.classList.remove('is-valid', 'is-invalid');
        return;
    }

    if (newPassword === confirmPassword) {
        matchText.textContent = '✓ Passwords match';
        matchText.style.color = '#10b981';
        confirmInput.classList.remove('is-invalid');
        confirmInput.classList.add('is-valid');
    } else {
        matchText.textContent = '✗ Passwords do not match';
        matchText.style.color = '#dc2626';
        confirmInput.classList.remove('is-valid');
        confirmInput.classList.add('is-invalid');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');

    if (newPassword) {
        newPassword.addEventListener('input', function() {
            checkStrength(this.value);
            if (confirmPassword && confirmPassword.value) {
                checkMatch();
            }
        });
    }

    if (confirmPassword) {
        confirmPassword.addEventListener('input', checkMatch);
    }

    document.querySelectorAll('#changePasswordForm input').forEach(function(input) {
        input.addEventListener('input', function() {
            const alert = document.getElementById('passwordMessage');
            if (alert) {
                alert.classList.remove('show');
            }
        });
    });

    setTimeout(showNotification, 1000);
});

document.getElementById('changePasswordForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const current = document.getElementById('current_password').value;
    const newPassword = document.getElementById('new_password').value;
    const confirm = document.getElementById('confirm_password').value;

    if (!current || !newPassword || !confirm) {
        showMsg('All fields are required.', 'danger');
        return;
    }

    if (newPassword.length < 8) {
        showMsg('Password must be at least 8 characters.', 'danger');
        return;
    }

    if (newPassword !== confirm) {
        showMsg('Passwords do not match.', 'danger');
        return;
    }

    if (current === newPassword) {
        showMsg('New password must be different from current.', 'danger');
        return;
    }

    const button = document.getElementById('changeBtn');
    button.disabled = true;
    button.innerHTML = '<span class="spinner"></span> Changing...';

    const formData = new FormData(this);

    try {
        const response = await fetch(baseUrl + 'change-password/update', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        const data = await response.json();

        if (data.csrfHash) {
            const csrfInput = document.querySelector('input[name="<?= $csrfName ?>"]');
            if (csrfInput) {
                csrfInput.value = data.csrfHash;
            }
        }

        if (data.success) {
            showMsg(data.message, 'success');
            setTimeout(function() {
                window.location.replace(data.redirect || baseUrl + 'dashboard');
            }, 1200);
        } else {
            showMsg(data.message || 'Failed to change password.', 'danger');
            button.disabled = false;
            button.innerHTML = '<i class="fas fa-save"></i><span>Change Password</span>';
        }
    } catch (error) {
        console.error(error);
        showMsg('Something went wrong. Please try again.', 'danger');
        button.disabled = false;
        button.innerHTML = '<i class="fas fa-save"></i><span>Change Password</span>';
    }
});

</script>

<?php
$page_content = ob_get_clean();
include dirname(__DIR__) . '/dashboard.php';
?>