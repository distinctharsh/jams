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
                        'success' => false,
                        'message' => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $email = trim((string) $this->request->getPost('email'));
            $password = (string) $this->request->getPost('password');
            $captcha = strtoupper(trim((string) $this->request->getPost('captcha')));

            if ($email === '' || $password === '' || $captcha === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'All fields are required.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (!$this->validateCaptcha($captcha)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid CAPTCHA code.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $user = $this->loginModel->findUserByEmail($email);

            if (!$user) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid email or password.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (isset($user['isactive']) && (int) $user['isactive'] !== 1) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Your account is inactive.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (!$this->loginModel->verifyPassword($password, $user['hash'] ?? '')) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid email or password.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $this->session->set([
                'user_id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'mobile_no' => $user['mobile_no'] ?? null,
                'organization_id' => $user['organization_id'] ?? null,
                'org_type' => $user['org_type'] ?? null,
                'designation' => $user['designation'] ?? null,
                'ugc_id' => $user['ugc_id'] ?? null,
                'isLoggedIn' => true,
                'login_time' => time()
            ]);

            $this->session->regenerate(true);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Login successful.',
                'redirect' => base_url('dashboard'),
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred during login.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function generateCaptcha(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $captcha = '';

        for ($i = 0; $i < 6; $i++) {
            $captcha .= $characters[random_int(0, strlen($characters) - 1)];
        }

        $captcha = strtoupper($captcha);
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
                        'success' => false,
                        'message' => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $captcha = $this->generateCaptcha();

            return $this->response->setJSON([
                'success' => true,
                'captcha' => $captcha,
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to refresh CAPTCHA.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function logout()
    {
        try {
            $this->session->destroy();
            return redirect()
                ->to(base_url('/'))
                ->with('success', 'Logged out successfully.');

        } catch (\Exception $e) {
            return redirect()
                ->to(base_url('/'))
                ->with('error', 'Failed to logout.');
        }
    }
}