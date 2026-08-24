<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Auth extends BaseController
{
    protected $AuthModel;
    protected $session;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
        $this->session = \Config\Services::session();
    }

    private function generateCaptcha()
    {
        try {
            $session = \Config\Services::session();
            $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            $captcha = '';
            for ($i = 0; $i < 6; $i++) {
                $captcha .= $characters[random_int(0, strlen($characters) - 1)];
            }
            $session->set('captcha_text', strtoupper($captcha));
            log_message('debug', 'CAPTCHA GENERATED: ' . strtoupper($captcha));
            return strtoupper($captcha);
        } catch (\Exception $e) {
            log_message('error', 'CAPTCHA Generation Error: ' . $e->getMessage());
            return '';
        }
    }

    private function validateCaptcha($userInput)
    {
        try {
            $session = \Config\Services::session();
            $sessionCaptcha = $session->get('captcha_text');
            $userCaptcha = strtoupper(trim((string) $userInput));
            $storedCaptcha = strtoupper(trim((string) $sessionCaptcha));
            
            log_message('debug', 'CAPTCHA DEBUG | User: ' . $userCaptcha . ' | Session: ' . $storedCaptcha);
            
            if (empty($storedCaptcha) || empty($userCaptcha) || !hash_equals($storedCaptcha, $userCaptcha)) {
                return false;
            }
            
            $session->remove('captcha_text');
            return true;
        } catch (\Exception $e) {
            log_message('error', 'CAPTCHA Validation Error: ' . $e->getMessage());
            return false;
        }
    }

    public function refreshCaptcha()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
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
            log_message('error', 'Refresh Captcha Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to refresh CAPTCHA.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function isValidEmail(string $email): bool
    {
        try {
            $email = trim($email);
            if ($email === '') {
                return false;
            }
            if (strlen($email) > 100) {
                return false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            }
            if (!preg_match('/^[A-Za-z0-9._%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,}$/', $email)) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Email Validation Error: ' . $e->getMessage());
            return false;
        }
    }

    public function signup()
    {
        try {
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
        } catch (\Exception $e) {
            log_message('error', 'Signup Page Error: ' . $e->getMessage());
            return redirect()->to(base_url('/'))->with('error', 'Unable to load signup page.');
        }
    }

    public function register()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $captcha = trim($this->request->getPost('captcha') ?? '');
            if ($captcha === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Please enter CAPTCHA code.',
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

            $fullName = trim($this->request->getPost('full_name') ?? '');
            $email = strtolower(trim($this->request->getPost('email') ?? ''));
            $mobile = trim($this->request->getPost('mobile') ?? '');
            $bodyName = trim($this->request->getPost('body_name') ?? '');
            $bodyType = trim($this->request->getPost('body_type') ?? '');
            $ugcDetails = trim($this->request->getPost('ugc_details') ?? '');

            $errors = [];

            if ($fullName === '') {
                $errors['full_name'] = 'Full Name is required.';
            } elseif (mb_strlen($fullName) < 3) {
                $errors['full_name'] = 'Full Name must be at least 3 characters.';
            } elseif (mb_strlen($fullName) > 100) {
                $errors['full_name'] = 'Full Name cannot exceed 100 characters.';
            }

            if ($email === '') {
                $errors['email'] = 'Email is required.';
            } elseif (!$this->isValidEmail($email)) {
                $errors['email'] = 'Please enter a valid email address.';
            } elseif (strlen($email) > 100) {
                $errors['email'] = 'Email cannot exceed 100 characters.';
            }

            if ($mobile === '') {
                $errors['mobile'] = 'Mobile Number is required.';
            } elseif (!preg_match('/^[0-9]{10,11}$/', $mobile)) {
                $errors['mobile'] = 'Mobile Number must contain 10 or 11 digits.';
            }

            if ($bodyName === '') {
                $errors['body_name'] = 'Please select Body Name.';
            }

            if ($bodyType === '') {
                $errors['body_type'] = 'Please select Body Type.';
            }

            if (!empty($errors)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $errors,
                    'csrfHash' => csrf_hash()
                ]);
            }

            $organizationId = (int) $bodyName;
            $orgType = (int) $bodyType;

            if ($organizationId <= 0) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid Body Name selected.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ($orgType <= 0) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid Body Type selected.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $ugcId = $ugcDetails !== '' ? $ugcDetails : null;

            $AuthModel = new \App\Models\AuthModel();

            if ($AuthModel->userEmailExists($email)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'This Email is already registered.',
                    'errors' => ['email' => 'This Email is already registered.'],
                    'csrfHash' => csrf_hash()
                ]);
            }

            $result = $AuthModel->registerUser(
                $fullName,
                $email,
                $mobile,
                $organizationId,
                $orgType,
                $ugcId
            );

            if (!$result) {
                log_message('error', 'register_user returned empty result.');
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Registration failed. Please try again.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ((int) ($result['success'] ?? 0) !== 1) {
                log_message('error', 'register_user SP Error: ' . ($result['error_message'] ?? 'Unknown error'));
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $result['message'] ?? 'Registration could not be created.',
                    'error_code' => $result['error_code'] ?? null,
                    'error_message' => $result['error_message'] ?? null,
                    'csrfHash' => csrf_hash()
                ]);
            }

            $registrationId = (int) ($result['id'] ?? 0);
            $registrationNo = $result['reg_no'] ?? '';

            if ($registrationId <= 0 || empty($registrationNo)) {
                log_message('error', 'Invalid registration response from SP.');
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Registration number could not be generated.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $authToken = $this->generateAuthorizationToken($registrationId);

            if ($authToken === '') {
                log_message('error', 'Authorization token could not be generated. Reg ID: ' . $registrationId);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Registration successful, but authorization link could not be generated.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $authLink = base_url('auth/authorization?token=' . rawurlencode($authToken));
            log_message('debug', 'Authorization URL generated: ' . $authLink);

            $linkUpdated = $AuthModel->updateAuthLink($registrationId, $authLink);

            if (!$linkUpdated) {
                log_message('error', 'Unable to save authorization link. Registration ID: ' . $registrationId);
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Registration created but authorization link could not be generated.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Registration successful. Please upload your Authorization Letter.',
                'registration_id' => $registrationId,
                'reg_id' => $registrationId,
                'reg_no' => $registrationNo,
                'auth_link' => $authLink,
                'redirect' => $authLink,
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Registration Exception: ' . $e->getMessage() . ' | File: ' . $e->getFile() . ' | Line: ' . $e->getLine());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function uploadAuthorization()
    {
        try {
            if (!$this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $token = trim((string) ($this->request->getPost('token') ?? ''));
            log_message('debug', 'Authorization upload token: ' . ($token !== '' ? 'RECEIVED' : 'MISSING'));

            if ($token === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Authorization token is missing.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $tokenData = $this->decodeToken($token);

            if (!$tokenData) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Authorization link is invalid or expired.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $regId = (int) ($tokenData['reg_id'] ?? 0);

            if ($regId <= 0) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid authorization token.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $captcha = trim((string) ($this->request->getPost('captcha') ?? ''));
            if ($captcha === '') {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Please enter CAPTCHA code.',
                    'captchaText' => $this->generateCaptcha(),
                    'csrfHash' => csrf_hash()
                ]);
            }

            if (!$this->validateCaptcha($captcha)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid CAPTCHA code. Please try again.',
                    'captchaText' => $this->generateCaptcha(),
                    'csrfHash' => csrf_hash()
                ]);
            }

            $registration = $this->AuthModel->where('id', $regId)->first();

            if (!$registration) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Registration record not found.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $db = \Config\Database::connect();
            $latestHistory = $db->table('registration_history')
                ->where('reg_id', $regId)
                ->orderBy('id', 'DESC')
                ->get(1)
                ->getRowArray();

            $currentStatus = (int) ($latestHistory['status'] ?? 1);

            if ($currentStatus === 4) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'This registration has already been approved.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $file = $this->request->getFile('authorization_letter');

            if (!$file || !$file->isValid()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Please upload a valid Authorization Letter.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
            $extension = strtolower($file->getClientExtension());

            if (!in_array($extension, $allowedExtensions, true)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Only PDF, JPG, JPEG and PNG files are allowed.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            if ($file->getSize() > 5 * 1024 * 1024) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Maximum file size allowed is 5 MB.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $uploadPath = WRITEPATH . 'uploads/authorization/';

            if (!is_dir($uploadPath) && !mkdir($uploadPath, 0755, true)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unable to create upload directory.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            $oldFileName = $registration['authorization_letter'] ?? null;
            $newFileName = $file->getRandomName();

            $db->transBegin();

            try {
                $file->move($uploadPath, $newFileName);

                $updated = $this->AuthModel->update($regId, ['authorization_letter' => $newFileName]);

                if (!$updated) {
                    throw new \RuntimeException('Unable to update registration record.');
                }

                $db->table('registration_history')->insert([
                    'reg_id' => $regId,
                    'status' => 3,
                    'performed_by' => null,
                    'remarks' => 'Authorization Letter submitted.',
                ]);

                if ($db->transStatus() === false) {
                    throw new \RuntimeException('Database transaction failed.');
                }

                $db->transCommit();

                if (!empty($oldFileName) && $oldFileName !== $newFileName) {
                    $oldFile = $uploadPath . $oldFileName;
                    if (is_file($oldFile)) {
                        unlink($oldFile);
                    }
                }

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Authorization Letter submitted successfully. Your application is pending approval.',
                    'redirect' => base_url('auth/authorization?token=' . urlencode($token)),
                    'csrfHash' => csrf_hash()
                ]);

            } catch (\Throwable $e) {
                $db->transRollback();
                $uploadedFile = $uploadPath . $newFileName;
                if (is_file($uploadedFile)) {
                    unlink($uploadedFile);
                }
                log_message('error', 'Authorization Upload Error: ' . $e->getMessage());
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unable to process your request.',
                    'csrfHash' => csrf_hash()
                ]);
            }

        } catch (\Throwable $e) {
            log_message('error', 'Upload Authorization Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Unable to process your request.',
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    private function generateAuthorizationToken(int $regId): string
    {
        try {
            if ($regId <= 0) {
                log_message('error', 'Authorization token generation failed: invalid reg_id.');
                return '';
            }

            $config = config('App');
            $secret = (string) $config->authorizationTokenSecret;

            if ($secret === '') {
                log_message('error', 'Authorization token generation failed: authorizationTokenSecret is missing.');
                return '';
            }

            $expires = time() + (3 * 24 * 60 * 60);
            $payload = ['reg_id' => $regId, 'expires' => $expires];
            $json = json_encode($payload, JSON_UNESCAPED_SLASHES);

            if ($json === false) {
                log_message('error', 'Authorization token JSON encoding failed.');
                return '';
            }

            $encodedPayload = rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
            $signature = hash_hmac('sha256', $encodedPayload, $secret);
            $token = $encodedPayload . '.' . $signature;

            log_message('debug', 'Authorization token generated successfully. Reg ID: ' . $regId . ' | Expires: ' . date('Y-m-d H:i:s', $expires));
            return $token;

        } catch (\Throwable $e) {
            log_message('error', 'Authorization token generation exception: ' . $e->getMessage());
            return '';
        }
    }

    private function decodeToken(string $token)
    {
        try {
            $token = trim($token);

            if ($token === '') {
                log_message('error', 'AUTH TOKEN ERROR: Token is empty.');
                return false;
            }

            $config = config('App');
            $secret = (string) $config->authorizationTokenSecret;

            if ($secret === '') {
                log_message('error', 'AUTH TOKEN ERROR: authorizationTokenSecret is empty.');
                return false;
            }

            $parts = explode('.', $token, 2);

            if (count($parts) !== 2) {
                log_message('error', 'AUTH TOKEN ERROR: Invalid token format. Expected payload.signature');
                return false;
            }

            $encodedPayload = trim($parts[0]);
            $providedSignature = trim($parts[1]);

            if ($encodedPayload === '' || $providedSignature === '') {
                log_message('error', 'AUTH TOKEN ERROR: Payload or signature is empty.');
                return false;
            }

            $expectedSignature = hash_hmac('sha256', $encodedPayload, $secret);

            if (!hash_equals($expectedSignature, $providedSignature)) {
                log_message('error', 'AUTH TOKEN ERROR: Signature mismatch.');
                return false;
            }

            $base64 = strtr($encodedPayload, '-_', '+/');
            $padding = strlen($base64) % 4;

            if ($padding > 0) {
                $base64 .= str_repeat('=', 4 - $padding);
            }

            $json = base64_decode($base64, true);

            if ($json === false) {
                log_message('error', 'AUTH TOKEN ERROR: Base64 decoding failed.');
                return false;
            }

            $data = json_decode($json, true);

            if (!is_array($data) || json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'AUTH TOKEN ERROR: Invalid JSON payload. ' . json_last_error_msg());
                return false;
            }

            $regId = (int) ($data['reg_id'] ?? $data['registration_id'] ?? 0);

            if ($regId <= 0) {
                log_message('error', 'AUTH TOKEN ERROR: Invalid registration ID.');
                return false;
            }

            $expires = (int) ($data['expires'] ?? 0);

            if ($expires <= 0) {
                log_message('error', 'AUTH TOKEN ERROR: Expiry missing.');
                return false;
            }

            if (time() > $expires) {
                log_message('error', 'AUTH TOKEN ERROR: Token expired. Reg ID: ' . $regId . ' | Expiry: ' . date('Y-m-d H:i:s', $expires) . ' | Current: ' . date('Y-m-d H:i:s'));
                return false;
            }

            log_message('debug', 'AUTH TOKEN SUCCESS: Reg ID: ' . $regId . ' | Expiry: ' . date('Y-m-d H:i:s', $expires));
            return ['reg_id' => $regId, 'expires' => $expires];

        } catch (\Throwable $e) {
            log_message('error', 'AUTH TOKEN EXCEPTION: ' . $e->getMessage() . ' | File: ' . $e->getFile() . ' | Line: ' . $e->getLine());
            return false;
        }
    }

    public function authorization()
    {
        try {
            $token = trim((string) $this->request->getGet('token'));
            log_message('debug', 'AUTHORIZATION PAGE: Token received = ' . ($token !== '' ? 'YES' : 'NO'));

            if ($token === '') {
                log_message('error', 'AUTHORIZATION PAGE ERROR: Token missing.');
                return view('auth/authorization_invalid', ['message' => 'Authorization token is missing.']);
            }

            $tokenData = $this->decodeToken($token);

            if ($tokenData === false || !is_array($tokenData)) {
                log_message('error', 'AUTHORIZATION PAGE ERROR: Token decode failed.');
                return view('auth/authorization_invalid', ['message' => 'Authorization link is invalid or expired.']);
            }

            $regId = (int) ($tokenData['reg_id'] ?? 0);

            if ($regId <= 0) {
                log_message('error', 'AUTHORIZATION PAGE ERROR: Invalid Reg ID.');
                return view('auth/authorization_invalid', ['message' => 'Invalid authorization token.']);
            }

            log_message('debug', 'AUTHORIZATION PAGE SUCCESS: Reg ID = ' . $regId);

            $registration = $this->AuthModel->where('id', $regId)->first();

            if (!$registration) {
                log_message('error', 'AUTHORIZATION PAGE ERROR: Registration not found. Reg ID = ' . $regId);
                return view('auth/authorization_invalid', ['message' => 'Registration record not found.']);
            }

            $db = \Config\Database::connect();
            $history = $db->table('registration_history')
                ->where('reg_id', $regId)
                ->orderBy('id', 'DESC')
                ->get(1)
                ->getRowArray();

            $historyStatus = (int) ($history['status'] ?? 1);

            switch ($historyStatus) {
                case 1:
                    $authorizationStatus = 0;
                    break;
                case 3:
                    $authorizationStatus = 3;
                    break;
                case 4:
                    $authorizationStatus = 4;
                    break;
                case 5:
                    $authorizationStatus = 5;
                    break;
                default:
                    $authorizationStatus = 0;
                    break;
            }

            $captchaText = $this->generateCaptcha();

            $user = [
                'id' => $registration['id'] ?? null,
                'full_name' => $registration['name'] ?? '',
                'email' => $registration['email'] ?? '',
                'mobile' => $registration['mobile_no'] ?? '',
            ];

            $authorization = [
                'body_type' => $registration['org_type'] ?? '',
                'body_name' => $registration['organization_id'] ?? '',
                'ugc_details' => $registration['ugc_id'] ?? '',
                'authorization_letter' => $registration['authorization_letter'] ?? null,
                'status' => $authorizationStatus,
            ];

            return view('auth/authorization', [
                'token' => $token,
                'reg_id' => $regId,
                'registration' => $registration,
                'user' => $user,
                'authorization' => $authorization,
                'history' => $history,
                'authorizationStatus' => $authorizationStatus,
                'captcha_text' => $captchaText,
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Authorization Page Error: ' . $e->getMessage());
            return view('auth/authorization_invalid', ['message' => 'An error occurred while processing your request.']);
        }
    }

    public function applicationSubmitted()
    {
        try {
            return view('auth/application_submitted');
        } catch (\Exception $e) {
            log_message('error', 'Application Submitted Page Error: ' . $e->getMessage());
            return redirect()->to(base_url('/'))->with('error', 'Unable to load page.');
        }
    }
}