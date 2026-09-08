<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class RequestViewController extends BaseController
{
    /**
     * =========================================================
     * VIEW REQUEST - Display application details
     * =========================================================
     */
    public function index($appId = null)
    {
        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        // If no appId provided, get the latest application for this user
        if (!$appId) {
            $latestApp = $db->table('application')
                ->where('user_id', $userId)
                ->orderBy('id', 'DESC')
                ->get()
                ->getRow();

            if (!$latestApp) {
                return redirect()->to('/dashboard')
                    ->with('error', 'No application found.');
            }

            $appId = $latestApp->id;
        }

        // Get application details
        $application = $db->table('application')
            ->where('id', $appId)
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        if (!$application) {
            return redirect()->to('/dashboard')
                ->with('error', 'Application not found.');
        }

        // Get examination dates
        $examDates = $db->table('application_date_mapping')
            ->where('app_id', $appId)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        // Get centres
        $centres = $db->table('application_centre_mapping')
            ->where('app_id', $appId)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        // Get vendors
        $vendors = $db->table('application_vendor_mapping')
            ->where('app_id', $appId)
            ->get()
            ->getResultArray();

        // Get vendor names and jammer model names
        foreach ($vendors as &$vendor) {
            $vendorData = $db->table('mas_vendor')
                ->where('id', $vendor['vendor_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['vendor_name'] = $vendorData
                ? $vendorData->vendor_name
                : 'Vendor #' . $vendor['vendor_id'];

            $jammerData = $db->table('mas_model')
                ->where('id', $vendor['jammer_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['jammer_model_name'] = $jammerData
                ? $jammerData->name
                : 'Model #' . $vendor['jammer_id'];
        }

        unset($vendor);

        // Get documents
        $documents = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->get()
            ->getResultArray();

        // Get latest history record
        $latestHistory = $db->table('application_history')
            ->where('app_id', $appId)
            ->orderBy('id', 'DESC')
            ->get()
            ->getRow();

        $currentStatusId = (int) ($latestHistory->status ?? 1);

        $status = $db->table('mas_application_action')
            ->where('id', $currentStatusId)
            ->get()
            ->getRow();

        if (!$status) {
            $status = (object) [
                'id'   => $currentStatusId,
                'name' => 'SUBMITTED'
            ];
        }

        $currentStatusName = $status->name ?? 'SUBMITTED';

        // Check if signed PDF is uploaded
        $signedPdf = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->where('document_type', 3)
            ->orderBy('id', 'DESC')
            ->get()
            ->getRow();

        // Calculate form completeness
        $completeness = $this->calculateCompleteness(
            $application,
            $examDates,
            $centres,
            $vendors
        );

        // Process centres
        foreach ($centres as &$centre) {
            $centre['state_name'] = '';

            if (!empty($centre['state'])) {
                try {
                    $tables = $db->listTables();
                    if (in_array('states', $tables)) {
                        $stateData = $db->table('states')
                            ->where('id', $centre['state'])
                            ->get()
                            ->getRow();
                        $centre['state_name'] = $stateData ? $stateData->state_name : '';
                    }
                } catch (\Exception $e) {
                    $centre['state_name'] = '';
                }
            }

            $centre['district_name'] = '';

            if (!empty($centre['district'])) {
                try {
                    $tables = $db->listTables();
                    if (in_array('districts', $tables)) {
                        $districtData = $db->table('districts')
                            ->where('id', $centre['district'])
                            ->get()
                            ->getRow();
                        $centre['district_name'] = $districtData ? $districtData->city_name : '';
                    }
                } catch (\Exception $e) {
                    $centre['district_name'] = '';
                }
            }
        }

        unset($centre);

        // Combine exam dates and centres
        $examDetails = [];

        if (!empty($examDates)) {
            foreach ($examDates as $exam) {
                if (!empty($centres)) {
                    foreach ($centres as $centre) {
                        $examDetails[] = [
                            'exam_name'          => $exam['exam_name'] ?? '—',
                            'exam_date'          => !empty($exam['exam_date'])
                                ? $exam['exam_date']
                                : null,
                            'centre_name'        => $centre['centre_name'] ?? '—',
                            'centre_address'     => $centre['centre_address'] ?? '—',
                            'state_name'         => $centre['state'] ?? '',
                            'district_name'      => $centre['district'] ?? '',
                            'coordinator_name'   => $centre['coorrdinator_name'] ?? '—',
                            'coordinator_mobile' => $centre['coordinator_mobile_no'] ?? '—'
                        ];
                    }
                } else {
                    $examDetails[] = [
                        'exam_name'          => $exam['exam_name'] ?? '—',
                        'exam_date'          => !empty($exam['exam_date'])
                            ? $exam['exam_date']
                            : null,
                        'centre_name'        => '—',
                        'centre_address'     => '—',
                        'state_name'         => '',
                        'district_name'      => '',
                        'coordinator_name'   => '—',
                        'coordinator_mobile' => '—'
                    ];
                }
            }
        } else {
            foreach ($centres as $centre) {
                $examDetails[] = [
                    'exam_name'          => $centre['centre_name'] ?? '—',
                    'exam_date'          => null,
                    'centre_name'        => $centre['centre_name'] ?? '—',
                    'centre_address'     => $centre['centre_address'] ?? '—',
                    'state_name'         => $centre['state_name'] ?? '',
                    'district_name'      => $centre['district_name'] ?? '',
                    'coordinator_name'   => $centre['coorrdinator_name'] ?? '—',
                    'coordinator_mobile' => $centre['coordinator_mobile_no'] ?? '—'
                ];
            }
        }

        // Get CSRF token name and hash for the view
        $csrfTokenName = csrf_token();
        $csrfHash = csrf_hash();

        // View data
        $data = [
            'application'        => $application,
            'exam_dates'        => $examDates,
            'centres'            => $centres,
            'exam_details'      => $examDetails,
            'vendors'            => $vendors,
            'documents'         => $documents,
            'status'            => $status,
            'currentStatusId'   => $currentStatusId,
            'currentStatusName' => $currentStatusName,
            'latestHistory'     => $latestHistory,
            'signed_pdf'        => $signedPdf,
            'completeness'      => $completeness,
            'app_id'            => $appId,
            'organisation_name' => $application->organisation,
            'application_number'=> $application->app_no,
            'application_data'  => [
                'app_no' => $application->app_no ?? 'JPMS/2026/001057',
                'organisation' => $application->organisation ?? '—',
                'organisation_type' => $application->organisation_type ?? '—',
                'contact_person' => $application->contact_person ?? '—',
                'email' => $application->email ?? '—',
                'phone' => $application->phone ?? '—',
                'reference_no' => $application->reference_no ?? '11/37/2026-JAM',
                'created_at' => $application->created_at ?? date('Y-m-d H:i:s'),
                'exam_details' => $examDetails,
                'vendors' => $vendors,
                'status_name' => $status->name ?? 'SUBMITTED',
                'status_id' => $currentStatusId
            ],
            // CSRF tokens for the view
            'csrf_token_name' => $csrfTokenName,
            'csrf_hash' => $csrfHash
        ];

        return view('pages/request-view', $data);
    }

    /**
     * =========================================================
     * CALCULATE COMPLETENESS
     * =========================================================
     */
    private function calculateCompleteness(
        $application,
        $examDates,
        $centres,
        $vendors
    ) {
        $total = 0;
        $completed = 0;

        // Organisation details
        $total += 25;
        $orgCompleted = 0;

        if (!empty($application->organisation)) $orgCompleted++;
        if (!empty($application->organisation_type)) $orgCompleted++;
        if (!empty($application->contact_person)) $orgCompleted++;
        if (!empty($application->email)) $orgCompleted++;
        if (!empty($application->phone)) $orgCompleted++;

        $completed += ($orgCompleted / 5) * 25;

        // Examination details
        $total += 25;
        $examCompleted = 0;

        if (!empty($examDates)) $examCompleted++;
        if (!empty($centres)) $examCompleted++;

        $completed += ($examCompleted / 2) * 25;

        // Vendor details
        $total += 25;

        if (!empty($vendors)) {
            $vendorCompleted = 0;
            foreach ($vendors as $vendor) {
                if (!empty($vendor['vendor_id'])) $vendorCompleted++;
                if (!empty($vendor['jammer_id'])) $vendorCompleted++;
            }
            $completed += ($vendorCompleted > 0) ? 25 : 0;
        }

        // Declarations
        $total += 25;
        $declCompleted = 0;

        if ($application->adequate_arrangement_check ?? false) $declCompleted++;
        if ($application->jammer_accounted ?? false) $declCompleted++;
        if ($application->non_intereference ?? false) $declCompleted++;

        $completed += ($declCompleted / 3) * 25;

        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }

    /**
     * =========================================================
     * UPLOAD SIGNED PDF - WITH CSRF PROTECTION
     * =========================================================
     */
    public function uploadSignedPdf()
    {
        // ===== CSRF PROTECTION ENABLED =====
        // Step 1: Check if the request is valid (CSRF will be auto-validated by CodeIgniter)
        // The CSRF filter should be enabled in app/Config/Filters.php
        
        $isAjax = $this->request->isAJAX();
        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        if (!$userId) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unauthorized'
                ]);
            }
            return redirect()->to('/login');
        }

        $appId = $this->request->getPost('app_id');

        if (!$appId) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Application ID required'
                ]);
            }
            return redirect()->back()->with('error', 'Application ID required');
        }

        $application = $db->table('application')
            ->where('id', $appId)
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        if (!$application) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Application not found'
                ]);
            }
            return redirect()->back()->with('error', 'Application not found');
        }

        $file = $this->request->getFile('signed_pdf');

        if (!$file || !$file->isValid()) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Please select a valid PDF file'
                ]);
            }
            return redirect()->back()->with('error', 'Please select a valid PDF file');
        }

        $extension = strtolower($file->getClientExtension());

        if ($extension !== 'pdf') {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Only PDF files are allowed'
                ]);
            }
            return redirect()->back()->with('error', 'Only PDF files are allowed');
        }

        $uploadPath = WRITEPATH . 'uploads/signed_documents/';

        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                if ($isAjax) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Unable to create upload directory'
                    ]);
                }
                return redirect()->back()->with('error', 'Unable to create upload directory');
            }
        }

        $newName = 'signed_' . $appId . '_' . time() . '.pdf';
        $file->move($uploadPath, $newName);

        $documentData = [
            'app_id'        => $appId,
            'document_type' => 3,
            'document_name' => $file->getClientName(),
            'document_path' => 'uploads/signed_documents/' . $newName
        ];

        $existing = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->where('document_type', 3)
            ->get()
            ->getRow();

        if ($existing) {
            // Delete old file if exists
            $oldPath = WRITEPATH . $existing->document_path;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            
            $db->table('application_document_master')
                ->where('id', $existing->id)
                ->update($documentData);
        } else {
            $db->table('application_document_master')->insert($documentData);
        }

        $db->table('application')
            ->where('id', $appId)
            ->update(['current_status' => 3]);

        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 3,
            'performed_by' => $userId,
            'remarks'      => 'Signed application uploaded successfully.',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        if ($isAjax) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Signed PDF uploaded successfully',
                'status'  => 'SIGNED_APPLICATION_UPLOADED'
            ]);
        }

        return redirect()->back()->with('success', 'Signed PDF uploaded successfully');
    }

    /**
     * =========================================================
     * PREVIEW APPLICATION - Returns JSON data for dynamic PDF
     * =========================================================
     */
    public function previewApplicationPdf($appId)
    {
        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        if (!$userId) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON(['error' => 'Unauthorized']);
        }

        $application = $db->table('application')
            ->where('id', $appId)
            ->where('user_id', $userId)
            ->get()
            ->getRow();

        if (!$application) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON(['error' => 'Application not found']);
        }

        // Get all data...
        $examDates = $db->table('application_date_mapping')
            ->where('app_id', $appId)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $centres = $db->table('application_centre_mapping')
            ->where('app_id', $appId)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();

        $vendors = $db->table('application_vendor_mapping')
            ->where('app_id', $appId)
            ->get()
            ->getResultArray();

        foreach ($vendors as &$vendor) {
            $vendorData = $db->table('mas_vendor')
                ->where('id', $vendor['vendor_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['vendor_name'] = $vendorData
                ? $vendorData->vendor_name
                : 'Vendor #' . $vendor['vendor_id'];

            $jammerData = $db->table('mas_model')
                ->where('id', $vendor['jammer_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['jammer_model_name'] = $jammerData
                ? $jammerData->name
                : 'Model #' . $vendor['jammer_id'];
        }

        unset($vendor);

        // Process centres
        foreach ($centres as &$centre) {
            $centre['state_name'] = '';

            if (!empty($centre['state'])) {
                try {
                    $tables = $db->listTables();
                    if (in_array('states', $tables)) {
                        $stateData = $db->table('states')
                            ->where('id', $centre['state'])
                            ->get()
                            ->getRow();
                        $centre['state_name'] = $stateData ? $stateData->state_name : '';
                    }
                } catch (\Exception $e) {
                    $centre['state_name'] = '';
                }
            }

            $centre['district_name'] = '';

            if (!empty($centre['district'])) {
                try {
                    $tables = $db->listTables();
                    if (in_array('districts', $tables)) {
                        $districtData = $db->table('districts')
                            ->where('id', $centre['district'])
                            ->get()
                            ->getRow();
                        $centre['district_name'] = $districtData ? $districtData->city_name : '';
                    }
                } catch (\Exception $e) {
                    $centre['district_name'] = '';
                }
            }
        }

        unset($centre);

        $latestHistory = $db->table('application_history')
            ->where('app_id', $appId)
            ->orderBy('id', 'DESC')
            ->get()
            ->getRow();

        $currentStatusId = (int) ($latestHistory->status ?? 1);

        $status = $db->table('mas_application_action')
            ->where('id', $currentStatusId)
            ->get()
            ->getRow();

        $statusName = $status ? $status->name : 'SUBMITTED';

        // Combine exam dates and centres
        $examDetails = [];

        if (!empty($examDates)) {
            foreach ($examDates as $exam) {
                if (!empty($centres)) {
                    foreach ($centres as $centre) {
                        $examDetails[] = [
                            'exam_name'          => $exam['exam_name'] ?? '—',
                            'exam_date'          => !empty($exam['exam_date'])
                                ? date('d M Y', strtotime($exam['exam_date']))
                                : '—',
                            'centre_name'        => $centre['centre_name'] ?? '—',
                            'centre_address'     => $centre['centre_address'] ?? '—',
                            'state_name'         => $centre['state_name'] ?? '',
                            'district_name'      => $centre['district_name'] ?? '',
                            'coordinator_name'   => $centre['coorrdinator_name'] ?? '—',
                            'coordinator_mobile' => $centre['coordinator_mobile_no'] ?? '—'
                        ];
                    }
                } else {
                    $examDetails[] = [
                        'exam_name'          => $exam['exam_name'] ?? '—',
                        'exam_date'          => !empty($exam['exam_date'])
                            ? date('d M Y', strtotime($exam['exam_date']))
                            : '—',
                        'centre_name'        => '—',
                        'centre_address'     => '—',
                        'state_name'         => '',
                        'district_name'      => '',
                        'coordinator_name'   => '—',
                        'coordinator_mobile' => '—'
                    ];
                }
            }
        } else {
            foreach ($centres as $centre) {
                $examDetails[] = [
                    'exam_name'          => $centre['centre_name'] ?? '—',
                    'exam_date'          => '—',
                    'centre_name'        => $centre['centre_name'] ?? '—',
                    'centre_address'     => $centre['centre_address'] ?? '—',
                    'state_name'         => $centre['state_name'] ?? '',
                    'district_name'      => $centre['district_name'] ?? '',
                    'coordinator_name'   => $centre['coorrdinator_name'] ?? '—',
                    'coordinator_mobile' => $centre['coordinator_mobile_no'] ?? '—'
                ];
            }
        }

        return $this->response->setJSON([
            'application' => [
                'app_no' => $application->app_no ?? 'JPMS/2026/001057',
                'organisation' => $application->organisation ?? '—',
                'organisation_type' => $application->organisation_type ?? '—',
                'contact_person' => $application->contact_person ?? '—',
                'email' => $application->email ?? '—',
                'phone' => $application->phone ?? '—',
                'reference_no' => $application->reference_no ?? '11/37/2026-JAM',
                'created_at' => $application->created_at ?? date('Y-m-d H:i:s')
            ],
            'exam_details' => $examDetails,
            'vendors' => $vendors,
            'status_name' => $statusName,
            'status_id' => $currentStatusId
        ]);
    }
}