<?php

namespace App\Controllers;

class ChangePassword extends BaseController
{
    protected $loginModel;
    protected $session;

    public function __construct()
    {
        $this->loginModel = new \App\Models\LoginModel();
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        return view('pages/change_password');
    }

    public function update()
    {
        try {
            if (!$this->session->get('isLoggedIn')) {
                return $this->response
                    ->setStatusCode(401)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Session expired. Please login again.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid request.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $currentPassword = (string) $this->request->getPost('current_password');
            $newPassword = (string) $this->request->getPost('new_password');
            $confirmPassword = (string) $this->request->getPost('confirm_password');

            if (trim($currentPassword) === '' || trim($newPassword) === '' || trim($confirmPassword) === '') {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'All password fields are required.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ($newPassword !== $confirmPassword) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'New password and confirm password do not match.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (strlen($newPassword) < 8) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Password must be at least 8 characters.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $userId = (int) $this->session->get('user_id');

            if ($userId <= 0) {
                return $this->response
                    ->setStatusCode(401)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'Invalid user session.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            $user = $this->loginModel->find($userId);

            if (!$user) {
                return $this->response
                    ->setStatusCode(404)
                    ->setJSON([
                        'success'  => false,
                        'message'  => 'User not found.',
                        'csrfHash' => csrf_hash()
                    ]);
            }

            if (!$this->loginModel->verifyPassword($currentPassword, $user['hash'] ?? '')) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Current password is incorrect.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ($currentPassword === $newPassword) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'New password must be different from current password.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $updated = $this->loginModel->changePassword($userId, $newPassword);

            if (!$updated) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Password could not be changed.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $this->session->remove([
                'password_change_login_time',
                'password_change_deadline'
            ]);

            $this->session->set(['password_reset_req' => 0]);

            create_audit_trail($user['id'], $user['email'], 'PASSWORD', 'User changed password successfully');

            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Password changed successfully.',
                'redirect' => base_url('dashboard'),
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Change Password Error: ' . $e->getMessage());
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'  => false,
                    'message'  => 'Unable to change password. Please try again.',
                    'csrfHash' => csrf_hash()
                ]);
        }
    }
}