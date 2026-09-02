<?php

namespace App\Controllers;

use App\Models\RequestModel;

class RequestController extends BaseController
{
    protected $requestModel;

    public function __construct()
    {
        $this->requestModel = new RequestModel();
    }

    public function newRequest()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'user_id'   => session()->get('user_id'),
            'name'  => session()->get('username'),
            'email'     => session()->get('email'),
        ];

        return view('pages/new-request', $data);
    }


    public function requestView()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'user_id'   => session()->get('user_id'),
            'name'  => session()->get('username'),
            'email'     => session()->get('email'),
        ];

        return view('pages/request-view', $data);
    }

    public function submitRequest()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        if ($this->request->getMethod() !== 'POST') {
            return redirect()->to(base_url('dashboard'));
        }

        $examDate = trim($this->request->getPost('exam_date'));

        // dd/mm/yyyy -> yyyy-mm-dd
        if (!empty($examDate) && strpos($examDate, '/') !== false) {
            $dateParts = explode('/', $examDate);

            if (count($dateParts) === 3) {
                $examDate = $dateParts[2] . '-' .
                            $dateParts[1] . '-' .
                            $dateParts[0];
            }
        }

        $data = [
            'organisation_name' => trim($this->request->getPost('organisation_name')),
            'organisation_type' => trim($this->request->getPost('organisation_type')),
            'letter_number'     => trim($this->request->getPost('letter_number')),
            'exam_name'         => trim($this->request->getPost('exam_name')),
            'exam_date'         => $examDate,
            'exam_address'      => trim($this->request->getPost('exam_address')),
            'vendor_name'       => trim($this->request->getPost('vendor_name')),
            'contact_person'    => trim($this->request->getPost('contact_person')),
            'contact_email'     => trim($this->request->getPost('contact_email')),
            'contact_phone'     => trim($this->request->getPost('contact_phone')),
            'status'            => 'pending',
            'created_by'        => session()->get('user_id'),
            'created_at'        => date('Y-m-d H:i:s')
        ];

        try {

            $requestId = $this->requestModel->createRequest($data);

            if (!$requestId) {
                throw new \Exception('Unable to create request.');
            }

            $requestData = $this->requestModel->getRequestById($requestId);

            session()->setFlashdata(
                'success',
                'Request submitted successfully! Request ID: #' .
                str_pad($requestId, 4, '0', STR_PAD_LEFT)
            );

            session()->setFlashdata(
                'current_request',
                $requestData
            );

            session()->setFlashdata(
                'show_view_request',
                true
            );

            return redirect()->to(base_url('dashboard'));

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Request submission failed: ' . $e->getMessage()
            );

            session()->setFlashdata(
                'error',
                'Error submitting request. Please try again.'
            );

            return redirect()->to(base_url('dashboard/new-request'));
        }
    }

    public function viewRequest($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $requestData = $this->requestModel->getRequestById($id);

        if (!$requestData) {
            session()->setFlashdata(
                'error',
                'Request not found.'
            );

            return redirect()->to(base_url('dashboard'));
        }

        session()->setFlashdata(
            'current_request',
            $requestData
        );

        session()->setFlashdata(
            'show_view_request',
            true
        );

        return redirect()->to(base_url('dashboard'));
    }

    public function getRequest($id)
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'success' => false,
                    'message' => 'Unauthorized'
                ]);
        }

        $requestData = $this->requestModel->getRequestById($id);

        if (!$requestData) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Request not found'
                ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'request' => $requestData
        ]);
    }
}