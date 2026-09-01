<?php

namespace App\Controllers;

use App\Models\AuditTrailModel;
use App\Models\AuditActionModel;

class AuditController extends BaseController
{
    protected $session;
    protected $auditModel;
    protected $auditActionModel;

    public function __construct()
    {
        $this->session = session();
        $this->auditModel = new AuditTrailModel();
        $this->auditActionModel = new AuditActionModel();
    }

    public function auditTrail()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'audit_logs' => $this->auditModel->getAllLogs(),
            'user_id'    => $this->session->get('user_id'),
            'username'   => $this->session->get('username'),
            'full_name'  => $this->session->get('full_name'),
            'email'      => $this->session->get('email'),
        ];

        return view('pages/audit_trail', $data);
    }

    public function getAuditLogs()
    {
        if (!$this->session->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        return $this->response->setJSON([
            'success'    => true,
            'audit_logs' => $this->auditModel->getAllLogs(),
            'csrfHash'   => csrf_hash()
        ]);
    }

    public function auditLog()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'audit_actions' => $this->auditActionModel->orderBy('action_id', 'DESC')->findAll(),
            'user_id'       => $this->session->get('user_id'),
            'username'      => $this->session->get('username'),
            'full_name'     => $this->session->get('full_name'),
            'email'         => $this->session->get('email'),
        ];

        return view('pages/audit-log', $data);
    }

    public function getAuditActions()
    {
        if (!$this->session->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        return $this->response->setJSON([
            'success'       => true,
            'audit_actions' => $this->auditActionModel->getAllActionLogs(),
            'csrfHash'      => csrf_hash()
        ]);
    }
}