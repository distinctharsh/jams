<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function checkLogin()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid request',
                'csrfHash' => csrf_hash()
            ]);
        }

        $username = trim($this->request->getPost('username'));
        $password = trim($this->request->getPost('password')); // Plain password from client
        $captcha  = trim($this->request->getPost('captcha'));

        // Validate CAPTCHA
        if (!$this->validateCaptcha($captcha)) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid CAPTCHA code',
                'csrfHash' => csrf_hash()
            ]);
        }

        // XSS Filtering
        $username = esc($username);

        // Find user
        $user = $this->userModel->findUserByUsername($username);

        if (!$user) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'User not found',
                'csrfHash' => csrf_hash()
            ]);
        }

        // Verify password using password_verify
        if (!$this->userModel->verifyPassword($password, $user['password'])) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid password',
                'csrfHash' => csrf_hash()
            ]);
        }

        // Set Session
        $this->session->set([
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'email'      => $user['email'],
            'isLoggedIn' => true,
            'login_time' => time()
        ]);

        $this->session->regenerate();

        return $this->response->setJSON([
            'success'   => true,
            'message'   => 'Login successful',
            'redirect'  => base_url('dashboard'),
            'csrfHash'  => csrf_hash()
        ]);
    }

    public function register()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid request',
                'csrfHash' => csrf_hash()
            ]);
        }

        $rules = [
            'full_name'   => 'required|min_length[3]|max_length[100]',
            'employee_id' => 'required|min_length[3]|max_length[50]|is_unique[users.employee_id]',
            'email'       => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'mobile'      => 'required|numeric|min_length[10]|max_length[15]',
            'username'    => 'required|min_length[4]|max_length[50]|is_unique[users.username]',
            'password'    => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Validation failed',
                'errors'   => $this->validator->getErrors(),
                'csrfHash' => csrf_hash()
            ]);
        }

        // Use password_hash for secure password storage
        $data = [
            'full_name'   => trim($this->request->getPost('full_name')),
            'employee_id' => trim($this->request->getPost('employee_id')),
            'email'       => trim($this->request->getPost('email')),
            'mobile'      => trim($this->request->getPost('mobile')),
            'username'    => trim($this->request->getPost('username')),
            'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_active'   => 1
        ];

        try {

            if ($this->userModel->insert($data)) {

                // Inserted User ID
                $userId = $this->userModel->getInsertID();

                // User Details
                $user = $this->userModel->find($userId);

                // Create Login Session
                session()->set([
                    'user_id'      => $user['id'],          // apna PK name use kare
                    'username'     => $user['username'],
                    'full_name'    => $user['full_name'],
                    'email'        => $user['email'],
                    'isLoggedIn'   => true
                ]);

                return $this->response->setJSON([
                    'success'   => true,
                    'message'   => 'Registration successful!',
                    'redirect'  => base_url('dashboard'),
                    'csrfHash'  => csrf_hash()
                ]);
            }

            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Registration failed.',
                'errors'   => $this->userModel->errors(),
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {

            log_message('error', $e->getMessage());

            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Registration failed.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function validateCaptcha($userInput)
    {
        $session = \Config\Services::session();
        $captchaText = $session->get('captcha_text');
        
        if (empty($captchaText) || strtolower($userInput) !== strtolower($captchaText)) {
            return false;
        }
        
        // Clear the captcha after successful validation
        $session->remove('captcha_text');
        return true;
    }

    public function refreshCaptcha()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid request',
                'csrfHash' => csrf_hash()
            ]);
        }

        $captchaText = $this->generateCaptcha();
        
        // Store in session
        $this->session->set('captcha_text', $captchaText);

        return $this->response->setJSON([
            'success'  => true,
            'captcha'  => $captchaText,
            'csrfHash' => csrf_hash()
        ]);
    }

    private function generateCaptcha()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $captcha = '';
        for ($i = 0; $i < 6; $i++) {
            $captcha .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $captcha;
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('/'))
                         ->with('success', 'Logged out successfully');
    }

    public function signup()
    {
        if (session()->has('username')) {
            return redirect()->to(base_url('dashboard'));
        }

        $data['title'] = 'Sign Up - JAMS';
        return view('auth/signup_page', $data);
    }
}