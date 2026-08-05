<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RequestModel;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $requestModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel();
    }

    public function index()
    {
        // Check login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'user_id'            => session()->get('user_id'),
            'username'           => session()->get('username'),
            'full_name'          => session()->get('full_name'),
            'email'              => session()->get('email'),
        ];
        return view('dashboard', $data);
    }
    
    public function newRequest()
    {
        // Check login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }
        return view('new-request');
    }
    
    public function submitRequest()
    {
        // Check login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }
        
        if ($this->request->getMethod() === 'POST') {
            // Convert dd/mm/yyyy to yyyy-mm-dd for database
            $examDate = $this->request->getPost('exam_date');
            if (!empty($examDate) && strpos($examDate, '/') !== false) {
                $dateParts = explode('/', $examDate);
                if (count($dateParts) === 3) {
                    $examDate = $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
                }
            }
            
            $data = [
                'organisation_name' => $this->request->getPost('organisation_name'),
                'organisation_type' => $this->request->getPost('organisation_type'),
                'letter_number' => $this->request->getPost('letter_number'),
                'exam_name' => $this->request->getPost('exam_name'),
                'exam_date' => $examDate,
                'exam_address' => $this->request->getPost('exam_address'),
                'vendor_name' => $this->request->getPost('vendor_name'),
                'contact_person' => $this->request->getPost('contact_person'),
                'contact_email' => $this->request->getPost('contact_email'),
                'contact_phone' => $this->request->getPost('contact_phone'),
                'status' => 'pending',
                'created_by' => session()->get('user_id'),
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            try {
                $requestId = $this->requestModel->createRequest($data);
                session()->setFlashdata('success', 'Request submitted successfully! Request ID: #' . str_pad($requestId, 4, '0', STR_PAD_LEFT));
                return redirect()->to(base_url('dashboard'));
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Error submitting request: ' . $e->getMessage());
                return redirect()->to(base_url('dashboard/new-request'));
            }
        }
        
        return redirect()->to(base_url('dashboard'));
    }
    
    public function viewRequests()
    {
        // Check login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }
        
        $data['requests'] = $this->requestModel->getAllRequests();
        return view('pages/requests-content', $data);
    }
}