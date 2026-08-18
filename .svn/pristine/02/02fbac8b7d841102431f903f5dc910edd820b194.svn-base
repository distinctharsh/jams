<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserAuthorizationModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $authorizationModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->authorizationModel = new UserAuthorizationModel();
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

    private function generateCaptcha()
    {
        $session = \Config\Services::session();

        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $captcha = '';

        for ($i = 0; $i < 6; $i++) {
            $captcha .= $characters[random_int(0, strlen($characters) - 1)];
        }

        $session->set('captcha_text', strtoupper($captcha));

        log_message(
            'debug',
            'CAPTCHA GENERATED: ' . strtoupper($captcha)
        );

        return strtoupper($captcha);
    }

    private function validateCaptcha($userInput)
    {
        $session = \Config\Services::session();

        $sessionCaptcha = $session->get('captcha_text');

        $userCaptcha = strtoupper(
            trim((string) $userInput)
        );

        $storedCaptcha = strtoupper(
            trim((string) $sessionCaptcha)
        );

        log_message(
            'debug',
            'CAPTCHA DEBUG | User: ' .
            $userCaptcha .
            ' | Session: ' .
            $storedCaptcha
        );

        if (
            empty($storedCaptcha) ||
            empty($userCaptcha) ||
            !hash_equals($storedCaptcha, $userCaptcha)
        ) {
            return false;
        }

        // CAPTCHA is single-use
        $session->remove('captcha_text');

        return true;
    }


    public function refreshCaptcha()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
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

        $db = \Config\Database::connect();
        $data['organizations'] = $db->table('mas_organization')
                                    ->select('id, org_name, org_type')
                                    ->where('isactive', 1)
                                    ->get()
                                    ->getResultArray();

        $data['organization_types'] = $db->table('mas_organization_type')
                                         ->select('id, name, is_ugc_id_required')
                                         ->where('isactive', 1)
                                         ->get()
                                         ->getResultArray();
        $data['title'] = 'Sign Up - JAMS';
        return view('auth/signup_page', $data);
    }
    /**
     * ---------------------------------------------------------
     * REGISTER USER
     * ---------------------------------------------------------
     *
     * users + user_authorization
     * both records created in ONE transaction.
     *
     * NO SESSION USED.
     */
    public function register()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid request.',
                'csrfHash' => csrf_hash()
            ]);
        }

        /*
         * ---------------------------------------------------------
         * CAPTCHA VALIDATION
         * ---------------------------------------------------------
         */
        $captcha = trim($this->request->getPost('captcha') ?? '');
        if ($captcha === '') {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Please enter CAPTCHA code.',
                'csrfHash' => csrf_hash()
            ]);
        }
        // Validate CAPTCHA
        if (!$this->validateCaptcha($captcha)) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid CAPTCHA code.',
                'csrfHash' => csrf_hash()
            ]);
        }
        /*
         * ---------------------------------------------------------
         * VALIDATION RULES
         * ---------------------------------------------------------
         */
        $rules = [
            'full_name' => [
                'label' => 'Full Name',
                'rules' => 'required|min_length[3]|max_length[100]'
            ],

            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[100]|is_unique[users.email]'
            ],

            'mobile' => [
                'label' => 'Mobile',
                'rules' => 'required|numeric|min_length[10]|max_length[15]'
            ],

            'body_name' => [
                'label' => 'Body Name',
                'rules' => 'required|max_length[150]'
            ],

            'body_type' => [
                'label' => 'Body Type',
                'rules' => 'required|max_length[100]'
            ],

            'ugc_details' => [
                'label' => 'UGC Details',
                'rules' => 'permit_empty|max_length[255]'
            ]
        ];
        /*
         * ---------------------------------------------------------
         * FORM VALIDATION
         * ---------------------------------------------------------
         */
        if (!$this->validate($rules)) {

            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Validation failed.',
                'errors'   => $this->validator->getErrors(),
                'csrfHash' => csrf_hash()
            ]);
        }
        /*
         * ---------------------------------------------------------
         * GET POST DATA
         * ---------------------------------------------------------
         */
        $fullName   = trim($this->request->getPost('full_name'));
        $email      = trim($this->request->getPost('email'));
        $mobile     = trim($this->request->getPost('mobile'));
        $bodyName   = trim($this->request->getPost('body_name'));
        $bodyType   = trim($this->request->getPost('body_type'));
        $ugcDetails = trim($this->request->getPost('ugc_details') ?? '');
        /*
         * ---------------------------------------------------------
         * DEFAULT PASSWORD
         * ---------------------------------------------------------
         */
        $defaultPassword = 'jams@12345';
        $db = \Config\Database::connect();
        $db->transBegin();
        try {
            /*
             * -----------------------------------------------------
             * 1. INSERT USERS
             * -----------------------------------------------------
             */
            $userData = [
                'full_name'  => $fullName,
                'email'      => $email,
                'mobile'     => $mobile,
                'password'   => password_hash(
                    $defaultPassword,
                    PASSWORD_DEFAULT
                ),
                'is_active'  => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            if (!$this->userModel->insert($userData)) {
                $db->transRollback();
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Unable to create user.',
                    'errors'   => $this->userModel->errors(),
                    'csrfHash' => csrf_hash()
                ]);
            }
            $userId = $this->userModel->getInsertID();
            if (!$userId) {
                $db->transRollback();
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Unable to generate user ID.',
                    'csrfHash' => csrf_hash()
                ]);
            }
            /*
             * -----------------------------------------------------
             * 2. INSERT USER AUTHORIZATION
             * -----------------------------------------------------
             */
            $authorizationData = [
                'user_id'              => $userId,
                'full_name'            => $fullName,
                'email'                => $email,
                'mobile'               => $mobile,
                'body_name'            => $bodyName,
                'body_type'            => $bodyType,
                'ugc_details'          => $ugcDetails,
                'authorization_letter' => null,
                'status'               => 0,
                'remarks'              => null,
                'approved_by'          => null,
                'approved_at'          => null,
                'created_at'           => date('Y-m-d H:i:s'),
                'updated_at'           => date('Y-m-d H:i:s')
            ];
            if (!$this->authorizationModel->insert($authorizationData)) {
                $db->transRollback();
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Unable to create authorization record.',
                    'errors'   => $this->authorizationModel->errors(),
                    'csrfHash' => csrf_hash()
                ]);
            }
            /*
             * -----------------------------------------------------
             * 3. COMMIT TRANSACTION
             * -----------------------------------------------------
             */
            $db->transCommit();
            /*
             * -----------------------------------------------------
             * 4. CREATE TEMPORARY TOKEN
             * -----------------------------------------------------
             */
            $tokenData = [
                'user_id' => $userId,
                'expires' => time() + (3 * 24 * 60 * 60)
            ];
            $token = base64_encode(
                json_encode($tokenData)
            );
            /*
             * -----------------------------------------------------
             * 5. SUCCESS RESPONSE
             * -----------------------------------------------------
             */
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Registration successful. Please upload your Authorization Letter.',
                'redirect' => base_url(
                    'auth/authorization?token=' . urlencode($token)
                ),
                'user_id'  => $userId,
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Throwable $e) {
            $db->transRollback();
            log_message(
                'error',
                'Registration Error: ' . $e->getMessage()
            );
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Registration failed. Please try again.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }
    /**
     * ---------------------------------------------------------
     * AUTHORIZATION PAGE
     * ---------------------------------------------------------
     *
     * NO SESSION.
     *
     * User ID comes from token.
     * Data comes directly from DATABASE.
     */
    public function authorization()
    {
        $token = $this->request->getGet('token');

        if (!$token) {

            return redirect()
                ->to(base_url('/'))
                ->with('error', 'Invalid authorization link.');
        }

        $tokenData = $this->decodeToken($token);

        if (!$tokenData) {

            return redirect()
                ->to(base_url('/'))
                ->with('error', 'Authorization link is invalid or expired.');
        }

        $userId = (int) $tokenData['user_id'];

        /*
         * Get USER from database
         */
        $user = $this->userModel
            ->where('id', $userId)
            ->first();

        if (!$user) {

            return redirect()
                ->to(base_url('/'))
                ->with('error', 'User record not found.');
        }

        /*
         * Get AUTHORIZATION from database
         */
        $authorization = $this->authorizationModel
            ->where('user_id', $userId)
            ->first();

        if (!$authorization) {

            return redirect()
                ->to(base_url('/'))
                ->with('error', 'Authorization record not found.');
        }

        /*
         * Everything comes from DATABASE.
         */
        $data = [
            'user'          => $user,
            'authorization' => $authorization,
            'token'         => $token
        ];

        return view(
            'auth/authorization',
            $data
        );
    }
    /**
     * ---------------------------------------------------------
     * UPLOAD AUTHORIZATION LETTER
     * ---------------------------------------------------------
     *
     * Existing authorization record is UPDATED.
     *
     * NO new authorization row is created.
     */
    public function uploadAuthorization()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid request.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $token = trim((string)($this->request->getPost('token') ?? ''));

        log_message(
            'debug',
            'Authorization upload token: ' . ($token !== '' ? 'RECEIVED' : 'MISSING')
        );

        if ($token === '') {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Authorization token is missing.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $tokenData = $this->decodeToken($token);

        if (!$tokenData) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Authorization link is invalid or expired.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $userId = (int)($tokenData['user_id'] ?? 0);

        if ($userId <= 0) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Invalid authorization token.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $captcha = trim((string)($this->request->getPost('captcha') ?? ''));

        if ($captcha === '') {
            return $this->response->setJSON([
                'success'     => false,
                'message'     => 'Please enter CAPTCHA code.',
                'captchaText' => $this->generateCaptcha(),
                'csrfHash'    => csrf_hash()
            ]);
        }

        if (!$this->validateCaptcha($captcha)) {
            return $this->response->setJSON([
                'success'     => false,
                'message'     => 'Invalid CAPTCHA code. Please try again.',
                'captchaText' => $this->generateCaptcha(),
                'csrfHash'    => csrf_hash()
            ]);
        }

        $user = $this->userModel
            ->where('id', $userId)
            ->first();

        if (!$user) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'User not found.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $authorization = $this->authorizationModel
            ->where('user_id', $userId)
            ->first();

        if (!$authorization) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Authorization record not found.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $file = $this->request->getFile('authorization_letter');

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Please upload a valid Authorization Letter.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
        $extension = strtolower($file->getClientExtension());

        if (!in_array($extension, $allowedExtensions, true)) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Only PDF, JPG, JPEG and PNG files are allowed.',
                'csrfHash' => csrf_hash()
            ]);
        }

        if ($file->getSize() > 5 * 1024 * 1024) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Maximum file size allowed is 5 MB.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $uploadPath = WRITEPATH . 'uploads/authorization/';

        if (!is_dir($uploadPath) && !mkdir($uploadPath, 0755, true)) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Unable to create upload directory.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $newFileName = $file->getRandomName();

        try {
            $file->move($uploadPath, $newFileName);

            $oldFileName = $authorization['authorization_letter'] ?? null;

            $updated = $this->authorizationModel
                ->where('user_id', $userId)
                ->set([
                    'authorization_letter' => $newFileName,
                    'status'               => 0,
                    'updated_at'           => date('Y-m-d H:i:s')
                ])
                ->update();

            if (!$updated) {
                $uploadedFile = $uploadPath . $newFileName;

                if (is_file($uploadedFile)) {
                    unlink($uploadedFile);
                }

                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Unable to save authorization letter.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (!empty($oldFileName) && $oldFileName !== $newFileName) {
                $oldFile = $uploadPath . $oldFileName;

                if (is_file($oldFile)) {
                    unlink($oldFile);
                }
            }

            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Authorization Letter submitted successfully. Your application is pending approval.',
                'redirect' => base_url(
                    'auth/authorization?token=' . urlencode($token)
                ),
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Throwable $e) {
            log_message(
                'error',
                'Authorization Upload Error: ' . $e->getMessage()
            );

            $uploadedFile = $uploadPath . $newFileName;

            if (is_file($uploadedFile)) {
                unlink($uploadedFile);
            }

            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Unable to process your request.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }
    /**
     * ---------------------------------------------------------
     * APPLICATION SUBMITTED
     * ---------------------------------------------------------
     */
    public function applicationSubmitted()
    {
        return view(
            'auth/application_submitted'
        );
    }
    /**
     * ---------------------------------------------------------
     * TOKEN DECODE
     * ---------------------------------------------------------
     */
    private function decodeToken(string $token)
    {
        try {

            $decoded = base64_decode(
                urldecode($token),
                true
            );

            if (!$decoded) {
                return false;
            }

            $data = json_decode(
                $decoded,
                true
            );

            if (
                !is_array($data) ||
                empty($data['user_id']) ||
                empty($data['expires'])
            ) {
                return false;
            }

            /*
             * Expired
             */
            if ((int) $data['expires'] < time()) {
                return false;
            }

            return $data;

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Token Decode Error: ' .
                $e->getMessage()
            );

            return false;
        }
    }
}