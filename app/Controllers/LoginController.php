<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    protected LoginModel $loginModel;
    protected $session;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        try {

            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $email = trim((string) $this->request->getPost('email'));
            $encryptedPassword = trim((string) $this->request->getPost('encryptedPassword'));
            $captcha = strtoupper(trim((string) $this->request->getPost('captcha')));

            if ($email === '' || $encryptedPassword === '' || $captcha === '') {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'All fields are required.',
                    'csrfHash' => csrf_hash()
                ]);
            }
            // CAPTCHA validation
            if (!$this->validateCaptcha($captcha)) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid CAPTCHA code.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            // Find user
            $user = $this->loginModel->findUserByEmail($email);

            if (!$user) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid email or password.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            // Account active check
            if (isset($user['isactive']) && (int) $user['isactive'] !== 1) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Your account is inactive.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            // Decrypt password
            $password = $this->decryptPassword($encryptedPassword);

            if ($password === null) {

                log_message(
                    'warning',
                    'Login password decryption failed for email: ' . $email
                );

                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid email or password.',
                        'csrfHash' => csrf_hash()
                    ]);
            }
            if($user && isset($user['is_locked']) && (int) $user['is_locked'] === 1) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Your account is locked due to multiple failed login attempts. Please try again after 24 hours or contact support.',
                    'csrfHash' => csrf_hash()
                ]);
            }
            //Account lock check
            $auditModel = new \App\Models\AuditTrailModel();
            $failedCount = $auditModel->getFailedLoginCount24Hours($email);
            if ($failedCount >=10 ) {
                $auditModel->lockAccount($email);
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Account locked due to multiple failed login attempts. Please try again after 24 hours or contact support.',
                    'csrfHash' => csrf_hash()
                ]);
            }
            // Verify password
            if (!$this->loginModel->verifyPassword(
                $password,
                $user['hash'] ?? ''
            )) {
                $password = '';
                create_audit_trail(
                '0',
                $user['email'],
                'LOGIN_FAILED',
                'Invalid email or password.'
            );
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid email or password.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            // Clear password from memory
            $password = '';

            $mfaRequired = (int) ($user['mfa_required'] ?? 1);

            if ($mfaRequired === 1) {
                $otp = (string) random_int(100000, 999999);
                $otpExpiresAt = time() + 600;
                $this->session->set('pending_otp_data', [
                    'user_id'    => $user['id'],
                    'email'      => $user['email'],
                    'otp'        => $otp,
                    'expires_at' => $otpExpiresAt
                ]);

                /*
                // Send Email OTP
                $emailSent = $this->sendOtpEmail($user['email'], $otp);

                if (!$emailSent) {
                    return $this->response->setJSON([
                        'success'  => false,
                        'message'  => 'Failed to send OTP email.',
                        'csrfHash' => csrf_hash()
                    ]);
                }
                */

                return $this->response->setJSON([
                    'success'  => true,
                    'step'     => 'otp_required',
                    'message'  => 'OTP sent to your registered official email.',
                    'test_otp' => $otp,  // Testing 
                    'csrfHash' => csrf_hash()
                ]);
            }

            // Direct login if mfa_required is 0
            $passwordResetReq = (int) ($user['password_reset_req'] ?? 0);
            $this->session->regenerate(true);
            $this->session->set([
                'user_id'         => $user['id'],
                'name'            => $user['name'],
                'email'           => $user['email'],
                'mobile_no'       => $user['mobile_no'] ?? null,
                'organization_id' => $user['organization_id'] ?? null,
                'org_type'        => $user['org_type'] ?? null,
                'designation'     => $user['designation'] ?? null,
                'ugc_id'          => $user['ugc_id'] ?? null,
                'isLoggedIn'      => true,
                'login_time'      => time(),
                'role_ids'        => $user['role_ids'] ?? null,
                // Only password reset flag
                'password_reset_req' => $passwordResetReq
            ]);
            // Audit trail
            create_audit_trail(
                $user['id'],
                $user['email'],
                'LOGIN',
                'User logged in successfully'
            );
            $redirectUrl = ($passwordResetReq === 1)
                ? base_url('change-password')
                : base_url('dashboard');
            return $this->response->setJSON([
                'success'        => true,
                'message'        => 'Login successful.',
                'redirect'       => $redirectUrl,
                'passwordChange' => ($passwordResetReq === 1),
                'csrfHash'       => csrf_hash()
            ]);
        } catch (\Throwable $e) {
            log_message(
                'error',
                'Login Error: ' . $e->getMessage()
            );
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'  => false,
                    'message'  => 'An error occurred during login.',
                    'csrfHash' => csrf_hash()
                ]);
        }
    }

    public function forgotPassword()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success' => false,
                    'message' => 'Invalid request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $email = trim((string) $this->request->getPost('email'));

            if (empty($email)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Email address is required.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $user = $this->loginModel->findUserByEmail($email);

            if (!$user) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'If this email is registered, a password reset link has been generated.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $this->loginModel->update($user['id'], [
                'reset_token'      => $token,
                'reset_expires_at' => $expiresAt
            ]);

            create_audit_trail($user['id'], $email, 'PASSWORD_RESET_REQUEST', 'Requested password reset link');

            $resetLink = base_url("reset-password/{$token}");

            $emailBody = "
                <p>Hello,</p>
                <p>We received a request to reset your password. Click the link below to set a new password:</p>
                <p style='text-align: center;'>
                    <a href='{$resetLink}' style='background: #FFC107; color: #000; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;'>Reset Password</a>
                </p>
                <p><small>This link is valid for 1 hour.</small></p>
            ";

            return $this->response->setJSON([
                'success'   => true,
                'message'   => 'Password reset link sent successfully!',
                'resetLink' => $resetLink,
                'emailBody' => $emailBody,
                'csrfHash'  => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Forgot Password Error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'An error occurred while processing your request.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function sendForgotPasswordEmail(string $recipient, string $resetLink): bool
    {
        try {
            $email = \Config\Services::email();
            $email->setTo($recipient);
            $email->setFrom('no-reply@jams.gov.in', 'JAMS Portal');
            $email->setSubject('Password Reset Request - JAMS');
            $email->setMessage("Hello,<br><br>We received a request to reset your password. Click the link below to set a new password:<br><br><a href='{$resetLink}'>Forget Password</a><br><br>This link is valid for 1 hour.<br><br>Regards,<br>JAMS Portal");
            return $email->send();
        } catch (\Throwable $e) {
            log_message('error', 'Forgot Password Email Error: ' . $e->getMessage());
            return false;
        }
    }

    public function resetPassword($token = null)
    {
        if (empty($token)) {
            return redirect()->to(base_url('/'))->with('error', 'Invalid password reset token.');
        }

        $user = $this->loginModel->where('reset_token', $token)
            ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return redirect()->to(base_url('/'))->with('error', 'Reset link is invalid or has expired.');
        }

        $data = [
            'title' => 'Reset Password - JAMS',
            'token' => $token
        ];

        return view('auth/reset_password', $data);
    }

    public function updatePassword()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $token = trim((string) $this->request->getPost('token'));
            $encryptedPassword = trim((string) $this->request->getPost('encryptedPassword'));

            if (empty($token) || empty($encryptedPassword)) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'All fields are required.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $password = $this->decryptPassword($encryptedPassword);

            if ($password === null || strlen($password) < 8) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid password structure. Password must be at least 8 characters.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $user = $this->loginModel->where('reset_token', $token)
                                    ->where('reset_expires_at >=', date('Y-m-d H:i:s'))
                                    ->first();

            if (!$user) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Password reset token is invalid or expired.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $newHash = password_hash($password, PASSWORD_BCRYPT);

            $this->loginModel->update($user['id'], [
                'hash'              => $newHash,
                'reset_token'       => null,
                'reset_expires_at'  => null,
                'password_reset_req' => 0
            ]);

            create_audit_trail($user['id'], $user['email'], 'PASSWORD_RESET', 'User successfully reset password via token link');

            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Password reset successfully! Redirecting to login...',
                'redirect' => base_url('/'),
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Update Password Error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success'  => false,
                'message'  => 'An error occurred while updating password.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function verifyOtp()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setStatusCode(400)->setJSON([
                    'success'  => false,
                    'message'  => 'Invalid request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $userOtp = trim((string) $this->request->getPost('otp'));
            $otpData = $this->session->get('pending_otp_data');

            if (!$otpData || empty($otpData['otp'])) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Session expired or invalid OTP request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (time() > $otpData['expires_at']) {
                $this->session->remove('pending_otp_data');
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'OTP has expired.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ($otpData['otp'] !== $userOtp) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Incorrect OTP code.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            // OTP verified
            $user = $this->loginModel->findUserByIdWithRoles((int) $otpData['user_id']);

            if (!$user) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'User not found.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $this->session->remove('pending_otp_data');

            $passwordResetReq = (int) ($user['password_reset_req'] ?? 0);
            $this->session->regenerate(true);
            $this->session->set([
                'user_id'            => $user['id'],
                'name'               => $user['name'],
                'email'              => $user['email'],
                'mobile_no'          => $user['mobile_no'] ?? null,
                'organization_id'    => $user['organization_id'] ?? null,
                'org_type'           => $user['org_type'] ?? null,
                'designation'        => $user['designation'] ?? null,
                'ugc_id'             => $user['ugc_id'] ?? null,
                'isLoggedIn'         => true,
                'login_time'         => time(),
                'role_ids'           => $user['role_ids'] ?? null,
                'password_reset_req' => $passwordResetReq
            ]);

            create_audit_trail($user['id'], $user['email'], 'LOGIN', 'User logged in via OTP');

            $redirectUrl = ($passwordResetReq === 1)
                ? base_url('change-password')
                : base_url('dashboard');

            return $this->response->setJSON([
                'success'        => true,
                'message'        => 'Login successful.',
                'redirect'       => $redirectUrl,
                'passwordChange' => ($passwordResetReq === 1),
                'csrfHash'       => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Verify OTP Error: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'success'  => false,
                'message'  => 'Verification failed.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function sendOtpEmail(string $recipient, string $otp): bool
    {
        try {
            $email = \Config\Services::email();
            $email->setTo($recipient);
            $email->setFrom('no-reply@jams.gov.in', 'JAMS Portal');
            $email->setSubject('Login OTP - JAMS');
            $email->setMessage("Your Login OTP is: <b>{$otp}</b><br>Valid for 10 minutes.");
            return $email->send();
        } catch (\Throwable $e) {
            log_message('error', 'Email error: ' . $e->getMessage());
            return false;
        }
    }

    public function cryptoConfig()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $cryptoKey = LOGIN_CRYPTO_KEY;
            $cryptoIv  = LOGIN_CRYPTO_IV;

            return $this->response->setJSON([
                'success'   => true,
                'key'       => base64_encode($cryptoKey),
                'iv'        => base64_encode($cryptoIv),
                'csrfHash'  => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Crypto Config Error: ' . $e->getMessage());
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Secure login initialization failed.',
                    'csrfHash'  => csrf_hash()
                ]);
        }
    }

    private function decryptPassword(string $encryptedPassword): ?string
    {
        try {
            if ($encryptedPassword === '') {
                return null;
            }

            $cipherRaw = base64_decode($encryptedPassword, true);
            if ($cipherRaw === false) {
                return null;
            }

            $key = hash('sha256', LOGIN_CRYPTO_KEY, true);
            $iv = substr(hash('sha256', LOGIN_CRYPTO_IV, true), 0, 16);

            $decrypted = openssl_decrypt($cipherRaw, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

            if ($decrypted === false) {
                return null;
            }

            return $decrypted;

        } catch (\Throwable $e) {
            log_message('error', 'Password decryption error: ' . $e->getMessage());
            return null;
        }
    }

    private function generateCaptcha(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789abcdefghijklmnpqrstuvwxyz';
        $captcha = '';
        for ($i = 0; $i < 6; $i++) {
            $captcha .= $characters[random_int(0, strlen($characters) - 1)];
        }
        $captcha = $captcha;
        $this->session->set('captcha_text', $captcha);
        return $captcha;
    }

    private function validateCaptcha(string $userInput): bool
    {
        $sessionCaptcha = $this->session->get('captcha_text');
        $userCaptcha = strtoupper(trim($userInput));
        $storedCaptcha = strtoupper(trim((string) $sessionCaptcha));

        if ($storedCaptcha === '' || $userCaptcha === '') {
            return false;
        }

        if (!hash_equals($storedCaptcha, $userCaptcha)) {
            return false;
        }

        $this->session->remove('captcha_text');
        return true;
    }

    public function refreshCaptcha()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $captcha = $this->generateCaptcha();

            return $this->response->setJSON([
                'success'   => true,
                'captcha'   => $captcha,
                'csrfHash'  => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Refresh CAPTCHA Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success'   => false,
                'message'   => 'Failed to refresh CAPTCHA.',
                'csrfHash'  => csrf_hash()
            ]);
        }
    }

    public function logout()
    {
        try {
            $userId    = session()->get('user_id');
            $loginName = session()->get('email');
            // Audit Trail
            create_audit_trail(
                $userId,
                $loginName,
                'LOGOUT',
                'User logged out successfully'
            );
            $this->session->destroy();
            return redirect()
                ->to(base_url('/'))
                ->with('success', 'Logged out successfully.');
        } catch (\Throwable $e) {
            log_message('error', 'Logout Error: ' . $e->getMessage());
            return redirect()
                ->to(base_url('/'))
                ->with('error', 'Failed to logout.');
        }
    }

    public function contact()
    {
        return view('contact');
    }
}