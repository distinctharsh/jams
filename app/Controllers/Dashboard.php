<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RequestModel;
use App\Models\OrganizationModel;

class Dashboard extends BaseController
{
    protected $userModel;
    protected $requestModel;
    protected $orgModel;
    protected $orgTypeModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->requestModel = new RequestModel();
        $this->orgModel = new OrganizationModel();
        $this->orgTypeModel = new \App\Models\OrgTypeModel();
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

                $request = $this->requestModel->getRequestById($requestId);
                session()->setFlashdata('current_request', $request);
                session()->setFlashdata('show_view_request', true);
                
                return redirect()->to(base_url('dashboard'));
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Error submitting request: ' . $e->getMessage());
                return redirect()->to(base_url('dashboard/new-request'));
            }
        }
        
        return redirect()->to(base_url('dashboard'));
    }
    
    public function viewRequest($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }
        
        $request = $this->requestModel->getRequestById($id);
        if (!$request) {
            session()->setFlashdata('error', 'Request not found');
            return redirect()->to(base_url('dashboard'));
        }
        
        return redirect()->to(base_url('dashboard'));
    }
    
    public function getRequest($id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }
        
        $request = $this->requestModel->getRequestById($id);
        if (!$request) {
            return $this->response->setJSON(['success' => false, 'message' => 'Request not found']);
        }
        
        return $this->response->setJSON(['success' => true, 'request' => $request]);
    }
    
    // Organization
    public function organizations()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'organizations' => $this->orgModel->getAllOrganizations()
        ];

        return view('pages/organization', $data);
    }
    
    public function getOrganizations()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $organizations = $this->orgModel->getAllOrganizations();

        return $this->response->setJSON([
            'success'       => true,
            'organizations' => $organizations,
            'csrfHash'     => csrf_hash()
        ]);
    }

    public function saveOrganization()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $id = $this->request->getPost('id');
        $saveData = [
            'org_name'                      => $this->request->getPost('org_name'),
            'org_type'                      => $this->request->getPost('org_type'),
            'org_description'               => $this->request->getPost('org_description'),
            'authorization_letter_required' => $this->request->getPost('authorization_letter_required') ? 1 : 0,
            'isactive'                      => $this->request->getPost('isactive') ? 1 : 0,
        ];

        try {
            if (!empty($id)) {
                $this->orgModel->updateOrganization($id, $saveData);
                $msg = 'Organization updated successfully.';
            } else {
                $this->orgModel->createOrganization($saveData);
                $msg = 'Organization created successfully.';
            }

            return $this->response->setJSON([
                'success'  => true,
                'message'  => $msg,
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Error saving data: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function getOrganization($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        if (!$id) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid ID']);
        }

        $data = $this->orgModel->getOrganizationById($id);

        if ($data) {
            return $this->response->setJSON([
                'success'  => true,
                'data'     => $data,
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success'  => false,
            'message'  => 'Record not found',
            'csrfHash' => csrf_hash()
        ]);
    }

    public function deleteOrganization($id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        try {
            $this->orgModel->deleteOrganization($id);
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Record deleted successfully.',
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Error deleting record: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }


    public function orgTypes()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'orgTypes' => $this->orgTypeModel->getAllOrgTypes()
        ];

        return view('pages/organization-type', $data);
    }

    public function getOrgTypes()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        return $this->response->setJSON([
            'success'  => true,
            'orgTypes' => $this->orgTypeModel->getAllOrgTypes(),
            'csrfHash' => csrf_hash()
        ]);
    }

    public function saveOrgType()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        $id = $this->request->getPost('id');
        $saveData = [
            'name'                => $this->request->getPost('name'),
            'competent_authority' => $this->request->getPost('competent_authority'),
            'is_ugc_id_required'  => $this->request->getPost('is_ugc_id_required') ? 1 : 0,
            'isactive'            => $this->request->getPost('isactive') ? 1 : 0,
        ];

        try {
            if (!empty($id)) {
                $this->orgTypeModel->updateOrgType($id, $saveData);
                $msg = 'Organization Type updated successfully.';
            } else {
                $this->orgTypeModel->createOrgType($saveData);
                $msg = 'Organization Type created successfully.';
            }

            return $this->response->setJSON([
                'success'  => true,
                'message'  => $msg,
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Error saving data: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }

    public function getOrgType($id = null)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        if (!$id) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid ID']);
        }

        $data = $this->orgTypeModel->getOrgTypeById($id);

        if ($data) {
            return $this->response->setJSON([
                'success'  => true,
                'data'     => $data,
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success'  => false,
            'message'  => 'Record not found',
            'csrfHash' => csrf_hash()
        ]);
    }

    public function deleteOrgType($id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized']);
        }

        try {
            $this->orgTypeModel->deleteOrgType($id);
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Record deleted successfully.',
                'csrfHash' => csrf_hash()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Error deleting record: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }
}