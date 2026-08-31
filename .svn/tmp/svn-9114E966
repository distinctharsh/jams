<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        try {
            if (!$this->session->get('captcha_text')) {
                $captchaText = $this->generateCaptcha();
                $this->session->set('captcha_text', $captchaText);
            }

            $data = [
                'captcha_text' => $this->session->get('captcha_text')
            ];

            return view('home', $data);

        } catch (\Exception $e) {
            log_message('error', 'Home Page Error: ' . $e->getMessage());
            return view('home', ['captcha_text' => '']);
        }
    }

    private function generateCaptcha()
    {
        try {
            $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
            $captcha = '';

            for ($i = 0; $i < 5; $i++) {
                $captcha .= $characters[random_int(0, strlen($characters) - 1)];
            }

            $session = \Config\Services::session();
            $session->set('captcha_text', $captcha);

            return $captcha;

        } catch (\Exception $e) {
            log_message('error', 'CAPTCHA Generation Error: ' . $e->getMessage());
            return '';
        }
    }
}