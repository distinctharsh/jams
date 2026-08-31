<?php

namespace App\Controllers;

class AuditController extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        return view('pages/audit_trail');
    }

}