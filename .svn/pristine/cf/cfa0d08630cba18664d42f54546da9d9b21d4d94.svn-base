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
        // Generate CAPTCHA if not exists
        if (!$this->session->get('captcha_text')) {
            $captchaText = $this->generateCaptcha();
            $this->session->set('captcha_text', $captchaText);
        }
        $data = [
            'captcha_text' => $this->session->get('captcha_text')
        ];
        return view('home', $data);
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
}