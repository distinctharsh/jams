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
                return redirect()->to('/dashboard')->with('error', 'No application found.');
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
            return redirect()->to('/dashboard')->with('error', 'Application not found.');
        }

        // Get examination dates
        $examDates = $db->table('application_date_mapping')
            ->where('app_id', $appId)
            ->orderBy('exam_date', 'ASC')
            ->get()
            ->getResultArray();

        // Get centres (insertion order)
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

        // Vendor names + jammer model names
        foreach ($vendors as &$vendor) {
            $vendorData = $db->table('mas_vendor')
                ->where('id', $vendor['vendor_id'])
                ->where('isactive', 1)
                ->get()->getRow();

            $vendor['vendor_name'] = $vendorData
                ? $vendorData->vendor_name
                : 'Vendor #' . $vendor['vendor_id'];

            $jammerData = $db->table('mas_model')
                ->where('id', $vendor['jammer_id'])
                ->where('isactive', 1)
                ->get()->getRow();

            $vendor['jammer_model_name'] = $jammerData
                ? $jammerData->name
                : 'Model #' . $vendor['jammer_id'];
        }
        unset($vendor);

        // Documents
        $documents = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->get()->getResultArray();

        // Latest history
        $latestHistory = $db->table('application_history')
            ->where('app_id', $appId)
            ->orderBy('id', 'DESC')
            ->get()->getRow();

        $currentStatusId = (int) ($latestHistory->status ?? 1);

        $status = $db->table('mas_application_action')
            ->where('id', $currentStatusId)
            ->get()->getRow();

        if (!$status) {
            $status = (object) [
                'id'   => $currentStatusId,
                'name' => 'SUBMITTED'
            ];
        }

        $currentStatusName = $status->name ?? 'SUBMITTED';

        // Signed PDF
        $signedPdf = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->where('document_type', 3)
            ->orderBy('id', 'DESC')
            ->get()->getRow();

        // Completeness
        $completeness = $this->calculateCompleteness(
            $application,
            $examDates,
            $centres,
            $vendors
        );

        // ---------- PROCESS STATE / DISTRICT NAMES ----------
        foreach ($centres as &$centre) {
            $centre['state_name'] = '';
            if (!empty($centre['state'])) {
                try {
                    if (in_array('states', $db->listTables())) {
                        $stateData = $db->table('states')->where('id', $centre['state'])->get()->getRow();
                        $centre['state_name'] = $stateData ? $stateData->state_name : '';
                    }
                } catch (\Exception $e) {}
            }

            $centre['district_name'] = '';
            if (!empty($centre['district'])) {
                try {
                    if (in_array('districts', $db->listTables())) {
                        $districtData = $db->table('districts')->where('id', $centre['district'])->get()->getRow();
                        $centre['district_name'] = $districtData ? $districtData->city_name : '';
                    }
                } catch (\Exception $e) {}
            }
        }
        unset($centre);

        // ---------- BUILD examDetails (DATE × ITS CENTRES ONLY) ----------
        $examDetails = [];

        $totalDates   = count($examDates);
        $totalCentres = count($centres);

        // Even-split centres across dates (same rule as editRequest)
        $centresChunks = [];
        if ($totalDates === 1) {
            $centresChunks = [$centres];
        } elseif ($totalDates > 1) {
            $perDate = (int) ceil($totalCentres / $totalDates);
            $centresChunks = array_chunk($centres, max(1, $perDate));
        }

        foreach ($examDates as $di => $exam) {
            $dateCentres = $centresChunks[$di] ?? [];

            if (!empty($dateCentres)) {
                foreach ($dateCentres as $centre) {
                    $examDetails[] = [
                        'exam_name'             => $exam['exam_name'] ?? '—',
                        'exam_date'             => !empty($exam['exam_date']) ? $exam['exam_date'] : null,
                        'centre_name'           => $centre['centre_name'] ?? '—',
                        'centre_address'        => $centre['centre_address'] ?? '—',
                        'state_name'            => $centre['state'] ?? '',
                        'district_name'         => $centre['district'] ?? '',
                        'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                        'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                        'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                    ];
                }
            } else {
                $examDetails[] = [
                    'exam_name'             => $exam['exam_name'] ?? '—',
                    'exam_date'             => !empty($exam['exam_date']) ? $exam['exam_date'] : null,
                    'centre_name'           => '—',
                    'centre_address'        => '—',
                    'state_name'            => '',
                    'district_name'         => '',
                    'coordinator_name'      => '—',
                    'coordinator_mobile_no' => '—',
                    'coordinator_email'     => '—',
                ];
            }
        }

        // Edge case: no dates but centres exist
        if (empty($examDates) && !empty($centres)) {
            foreach ($centres as $centre) {
                $examDetails[] = [
                    'exam_name'             => $centre['centre_name'] ?? '—',
                    'exam_date'             => null,
                    'centre_name'           => $centre['centre_name'] ?? '—',
                    'centre_address'        => $centre['centre_address'] ?? '—',
                    'state_name'            => $centre['state_name'] ?? '',
                    'district_name'         => $centre['district_name'] ?? '',
                    'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                    'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                    'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                ];
            }
        }

        // CSRF
        $csrfTokenName = csrf_token();
        $csrfHash = csrf_hash();

        // View data
        $data = [
            'application'        => $application,
            'exam_dates'         => $examDates,
            'centres'            => $centres,
            'exam_details'       => $examDetails,
            'vendors'            => $vendors,
            'documents'          => $documents,
            'status'             => $status,
            'currentStatusId'    => $currentStatusId,
            'currentStatusName'  => $currentStatusName,
            'latestHistory'      => $latestHistory,
            'signed_pdf'         => $signedPdf,
            'completeness'       => $completeness,
            'app_id'             => $appId,
            'organisation_name'  => $application->organisation,
            'application_number' => $application->app_no,
            'application_data'   => [
                'app_no'            => $application->app_no ?? 'JPMS/2026/001057',
                'organisation'      => $application->organisation ?? '—',
                'organisation_type' => $application->organisation_type ?? '—',
                'contact_person'    => $application->contact_person ?? '—',
                'email'             => $application->email ?? '—',
                'phone'             => $application->phone ?? '—',
                'reference_no'      => $application->reference_no ?? '11/37/2026-JAM',
                'created_at'        => $application->created_at ?? date('Y-m-d H:i:s'),
                'exam_details'      => $examDetails,
                'vendors'           => $vendors,
                'status_name'       => $status->name ?? 'SUBMITTED',
                'status_id'         => $currentStatusId
            ],
            'csrf_token_name'    => $csrfTokenName,
            'csrf_hash'          => $csrfHash
        ];
        $data['officers'] = $this->getForwardOfficers();
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

        $usOfficer = $db->table('user_role_mapping urm')
            ->select('u.id')
            ->join('user u', 'u.id = urm.user_id')
            ->where('urm.role_id', 4)
            ->where('urm.isactive', 1)
            ->where('u.isactive', 1)
            ->orderBy('urm.id', 'ASC')
            ->get()
            ->getRow();

        $assignedTo = $usOfficer->id ?? null;

        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 6,
            'performed_by' => $userId,
            'assigned_to'  => $assignedTo,
            'remarks'      => 'Sent to US.',
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
     * SECURE DOCUMENT QUERY
     *
     * Checks:
     * 1. User is logged in
     * 2. Document exists
     * 3. Document belongs to user's application
     * =========================================================
     */
    private function getAuthorizedDocument($documentId)
    {
        $db = \Config\Database::connect();

        $userId = session()->get('user_id');

        if (empty($userId)) {
            return null;
        }

        $document = $db->table('application_document_master dm')
            ->select('
                dm.id,
                dm.app_id,
                dm.document_type,
                dm.document_name,
                dm.document_path
            ')
            ->join(
                'application a',
                'a.id = dm.app_id',
                'inner'
            )
            ->where('dm.id', (int) $documentId)
            ->where('a.user_id', $userId)
            ->get()
            ->getRow();

        return $document;
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

        $examDates = $db->table('application_date_mapping')
            ->where('app_id', $appId)
            ->orderBy('exam_date', 'ASC')
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
                : 'Vendor #' . ($vendor['vendor_id'] ?? '');

            $jammerData = $db->table('mas_model')
                ->where('id', $vendor['jammer_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['jammer_model_name'] = $jammerData
                ? $jammerData->name
                : 'Model #' . ($vendor['jammer_id'] ?? '');
        }
        unset($vendor);

        foreach ($centres as &$centre) {
            $centre['state_name'] = getMasterValue(
                'state',
                $centre['state'] ?? '',
                'state_name'
            ) ?: '-';

            $centre['district_name'] = getMasterValue(
                'city',
                $centre['district'] ?? '',
                'city_name'
            ) ?: '-';
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

        // ---------- BUILD examDetails (DATE × ITS CENTRES ONLY) ----------
        $examDetails = [];

        $totalDates   = count($examDates);
        $totalCentres = count($centres);

        // Even-split centres across dates (same rule as editRequest + index)
        $centresChunks = [];
        if ($totalDates === 1) {
            $centresChunks = [$centres];
        } elseif ($totalDates > 1) {
            $perDate = (int) ceil($totalCentres / $totalDates);
            $centresChunks = array_chunk($centres, max(1, $perDate));
        }

        foreach ($examDates as $di => $exam) {
            $dateCentres = $centresChunks[$di] ?? [];

            if (!empty($dateCentres)) {
                foreach ($dateCentres as $centre) {
                    $examDetails[] = [
                        'exam_name'             => $exam['exam_name'] ?? '—',
                        'exam_date'             => !empty($exam['exam_date'])
                            ? date('d M Y', strtotime($exam['exam_date']))
                            : '—',
                        'centre_name'           => $centre['centre_name'] ?? '—',
                        'centre_address'        => $centre['centre_address'] ?? '—',
                        'state_name'            => $centre['state_name'] ?? '-',
                        'district_name'         => $centre['district_name'] ?? '-',
                        'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                        'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                        'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                    ];
                }
            } else {
                $examDetails[] = [
                    'exam_name'             => $exam['exam_name'] ?? '—',
                    'exam_date'             => !empty($exam['exam_date'])
                        ? date('d M Y', strtotime($exam['exam_date']))
                        : '—',
                    'centre_name'           => '—',
                    'centre_address'        => '—',
                    'state_name'            => '-',
                    'district_name'         => '-',
                    'coordinator_name'      => '—',
                    'coordinator_email'     => '—',
                    'coordinator_mobile_no' => '—',
                ];
            }
        }

        // Edge case: no dates but centres exist
        if (empty($examDates) && !empty($centres)) {
            foreach ($centres as $centre) {
                $examDetails[] = [
                    'exam_name'             => $centre['centre_name'] ?? '—',
                    'exam_date'             => '—',
                    'centre_name'           => $centre['centre_name'] ?? '—',
                    'centre_address'        => $centre['centre_address'] ?? '—',
                    'state_name'            => $centre['state_name'] ?? '-',
                    'district_name'         => $centre['district_name'] ?? '-',
                    'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                    'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                    'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                ];
            }
        }

        return $this->response->setJSON([
            'application' => [
                'app_no'            => $application->app_no ?? 'JPMS/2026/001057',
                'organisation'      => $application->organisation ?? '—',
                'organisation_type' => $application->organisation_type ?? '—',
                'contact_person'    => $application->contact_person ?? '—',
                'email'             => $application->email ?? '—',
                'phone'             => $application->phone ?? '—',
                'centre_list_ready' => $application->centre_list_ready,
                'reference_no'      => $application->reference_no ?? '11/37/2026-JAM',
                'created_at'        => $application->created_at ?? date('Y-m-d H:i:s'),
            ],

            'exam_details' => $examDetails,
            'vendors'      => $vendors,
            'status_name'  => $statusName,
            'status_id'    => $currentStatusId,
        ]);
    }


/**
 * =========================================================
 * PREVIEW APPLICATION - Returns JSON data for dynamic PDF
 * =========================================================
 */
    public function permission_previewApplicationPdf($appId)
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

        $examDates = $db->table('application_date_mapping')
            ->where('app_id', $appId)
            ->orderBy('exam_date', 'ASC')
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
                : 'Vendor #' . ($vendor['vendor_id'] ?? '');

            $jammerData = $db->table('mas_model')
                ->where('id', $vendor['jammer_id'])
                ->where('isactive', 1)
                ->get()
                ->getRow();

            $vendor['jammer_model_name'] = $jammerData
                ? $jammerData->name
                : 'Model #' . ($vendor['jammer_id'] ?? '');
        }
        unset($vendor);

        foreach ($centres as &$centre) {
            $centre['state_name'] = getMasterValue(
                'state',
                $centre['state'] ?? '',
                'state_name'
            ) ?: '-';

            $centre['district_name'] = getMasterValue(
                'city',
                $centre['district'] ?? '',
                'city_name'
            ) ?: '-';
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

        // ---------- BUILD examDetails (DATE × ITS CENTRES ONLY) ----------
        $examDetails = [];

        $totalDates   = count($examDates);
        $totalCentres = count($centres);

        // Even-split centres across dates (same rule as editRequest + index)
        $centresChunks = [];
        if ($totalDates === 1) {
            $centresChunks = [$centres];
        } elseif ($totalDates > 1) {
            $perDate = (int) ceil($totalCentres / $totalDates);
            $centresChunks = array_chunk($centres, max(1, $perDate));
        }

        foreach ($examDates as $di => $exam) {
            $dateCentres = $centresChunks[$di] ?? [];

            if (!empty($dateCentres)) {
                foreach ($dateCentres as $centre) {
                    $examDetails[] = [
                        'exam_name'             => $exam['exam_name'] ?? '—',
                        'exam_date'             => !empty($exam['exam_date'])
                            ? date('d M Y', strtotime($exam['exam_date']))
                            : '—',
                        'centre_name'           => $centre['centre_name'] ?? '—',
                        'centre_address'        => $centre['centre_address'] ?? '—',
                        'state_name'            => $centre['state_name'] ?? '-',
                        'district_name'         => $centre['district_name'] ?? '-',
                        'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                        'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                        'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                    ];
                }
            } else {
                $examDetails[] = [
                    'exam_name'             => $exam['exam_name'] ?? '—',
                    'exam_date'             => !empty($exam['exam_date'])
                        ? date('d M Y', strtotime($exam['exam_date']))
                        : '—',
                    'centre_name'           => '—',
                    'centre_address'        => '—',
                    'state_name'            => '-',
                    'district_name'         => '-',
                    'coordinator_name'      => '—',
                    'coordinator_email'     => '—',
                    'coordinator_mobile_no' => '—',
                ];
            }
        }

        // Edge case: no dates but centres exist
        if (empty($examDates) && !empty($centres)) {
            foreach ($centres as $centre) {
                $examDetails[] = [
                    'exam_name'             => $centre['centre_name'] ?? '—',
                    'exam_date'             => '—',
                    'centre_name'           => $centre['centre_name'] ?? '—',
                    'centre_address'        => $centre['centre_address'] ?? '—',
                    'state_name'            => $centre['state_name'] ?? '-',
                    'district_name'         => $centre['district_name'] ?? '-',
                    'coordinator_name'      => $centre['coorrdinator_name'] ?? '—',
                    'coordinator_email'     => $centre['coordinator_email'] ?? '—',
                    'coordinator_mobile_no' => $centre['coordinator_mobile_no'] ?? '—',
                ];
            }
        }

        return $this->response->setJSON([
            'application' => [
                'app_no'            => $application->app_no ?? 'JPMS/2026/001057',
                'organisation'      => $application->organisation ?? '—',
                'organisation_type' => $application->organisation_type ?? '—',
                'contact_person'    => $application->contact_person ?? '—',
                'email'             => $application->email ?? '—',
                'phone'             => $application->phone ?? '—',
                'centre_list_ready' => $application->centre_list_ready,
                'reference_no'      => $application->reference_no ?? '11/37/2026-JAM',
                'created_at'        => $application->created_at ?? date('Y-m-d H:i:s'),
            ],

            'exam_details' => $examDetails,
            'vendors'      => $vendors,
            'status_name'  => $statusName,
            'status_id'    => $currentStatusId,
        ]);
    }
/**
 * =========================================================
 * GET SECURE DOCUMENT FILE PATH
 *
 * Converts DB document_path into physical file path.
 *
 * Example DB:
 * uploads/signed_documents/signed_68_1788938168.pdf
 *
 * Physical:
 * C:/xampp/htdocs/jams-nic/writable/uploads/signed_documents/...
 * =========================================================
 */
    private function getSecureDocumentPath($document)
    {
        if (!$document || empty($document->document_path)) {
            return null;
        }
        $relativePath = str_replace('\\', '/', trim($document->document_path));
        $relativePath = ltrim($relativePath, '/');
        $allowedFolders = [
            'uploads/vendor_documents/',
            'uploads/examinations_documents/',
            'uploads/signed_documents/',
            'uploads/permission_letters/',
        ];
        $isAllowedFolder = false;
        foreach ($allowedFolders as $allowedFolder) {
            if (strpos($relativePath, $allowedFolder) === 0) {
                $isAllowedFolder = true;
                break;
            }
        }
        if (!$isAllowedFolder) {
            return null;
        }
        if (strpos($relativePath, '../') !== false || strpos($relativePath, '..\\') !== false) {
            return null;
        }
        $filePath = WRITEPATH . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
        $realFilePath = realpath($filePath);
        if ($realFilePath === false) {
            return null;
        }
        $filePathNormalized = strtolower(str_replace('\\', '/', $realFilePath));
        $isInsideAllowedFolder = false;
        foreach ($allowedFolders as $allowedFolder) {
            $physicalFolder = WRITEPATH . str_replace('/', DIRECTORY_SEPARATOR, rtrim($allowedFolder, '/'));
            $realAllowedFolder = realpath($physicalFolder);
            if ($realAllowedFolder === false) {
                continue;
            }
            $allowedFolderNormalized = strtolower(rtrim(str_replace('\\', '/', $realAllowedFolder), '/') . '/');
            if (strpos($filePathNormalized, $allowedFolderNormalized) === 0) {
                $isInsideAllowedFolder = true;
                break;
            }
        }
        if (!$isInsideAllowedFolder) {
            return null;
        }
        if (!is_file($realFilePath)) {
            return null;
        }
        return $realFilePath;
    }

    public function viewDocument($documentId)
    {
        $userId = session()->get('user_id');
        if (empty($userId)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Unauthorized access.'
                ]);
        }
        if (!is_numeric($documentId) || (int) $documentId <= 0) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' => 'Invalid document ID.'
                ]);
        }
        $documentId = (int) $documentId;
        $document = $this->getAuthorizedDocument($documentId);
        if (!$document) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Document not found or access denied.'
                ]);
        }
        $realFilePath = $this->getSecureDocumentPath($document);
        if (!$realFilePath) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Invalid document path.'
                ]);
        }
        if (!is_file($realFilePath)) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Document file not found.'
                ]);
        }
        $fileName = basename($document->document_name);
        if (empty($fileName) || strtolower(pathinfo($fileName, PATHINFO_EXTENSION)) !== 'pdf') {
            $fileName = 'document.pdf';
        }
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        $fileContent = file_get_contents($realFilePath);
        if ($fileContent === false) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Unable to read document.'
                ]);
        }
        return $this->response
            ->setStatusCode(200)
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $fileName . '"')
            ->setHeader('Content-Length', (string) strlen($fileContent))
            ->setHeader('X-Content-Type-Options', 'nosniff')
            ->setHeader('Cache-Control', 'private, no-store, no-cache, must-revalidate')
            ->setHeader('Pragma', 'no-cache')
            ->setBody($fileContent);
    }

    public function downloadDocument($documentId)
    {
        $userId = session()->get('user_id');
        if (empty($userId)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Unauthorized access.'
                ]);
        }
        if (!is_numeric($documentId) || (int) $documentId <= 0) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' => 'Invalid document ID.'
                ]);
        }
        $documentId = (int) $documentId;
        $document = $this->getAuthorizedDocument($documentId);
        if (!$document) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Document not found or access denied.'
                ]);
        }
        $realFilePath = $this->getSecureDocumentPath($document);
        if (!$realFilePath) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'Invalid document path.'
                ]);
        }
        if (!is_file($realFilePath)) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success' => false,
                    'message' => 'Document file not found.'
                ]);
        }
        $extension = strtolower(pathinfo($realFilePath, PATHINFO_EXTENSION));
        $downloadName = basename($document->document_name ?? '');
        if (empty($downloadName)) {
            $downloadName = basename($realFilePath);
        } else {
            $nameExtension = strtolower(pathinfo($downloadName, PATHINFO_EXTENSION));
            if ($nameExtension !== $extension) {
                $baseName = pathinfo($downloadName, PATHINFO_FILENAME);
                $downloadName = $baseName . '.' . $extension;
            }
        }
        $allowedExtensions = [
            'pdf',
            'xls',
            'xlsx',
            'doc',
            'docx',
            'csv'
        ];
        if (!in_array($extension, $allowedExtensions, true)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'message' => 'This file type is not allowed for download.'
                ]);
        }
        $mimeTypes = [
            'pdf'  => 'application/pdf',
            'xls'  => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'csv'  => 'text/csv'
        ];
        $mimeType = $mimeTypes[$extension] ?? 'application/octet-stream';
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        $fileContent = file_get_contents($realFilePath);
        if ($fileContent === false) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Unable to read document.'
                ]);
        }
        return $this->response
            ->setStatusCode(200)
            ->setHeader('Content-Type', $mimeType)
            ->setHeader('Content-Disposition', 'attachment; filename="' . $downloadName . '"')
            ->setHeader('Content-Length', (string) strlen($fileContent))
            ->setHeader('X-Content-Type-Options', 'nosniff')
            ->setHeader('Cache-Control', 'private, no-store, no-cache, must-revalidate')
            ->setHeader('Pragma', 'no-cache')
            ->setBody($fileContent);
    }

    private function getForwardOfficers()
    {
        $db = \Config\Database::connect();
        $currentUserId = session()->get('user_id');
        if (empty($currentUserId)) {
            return [];
        }
        $workflowRoles = [
            'DEALING_HAND',
            'SO',
            'US',
            'JS',
            'SECRETARY'
        ];
        $currentRole = $db->table('user_role_mapping urm')
            ->select('
                urm.id AS mapping_id,
                r.id AS role_id,
                r.name AS role_name,
                r.code AS role_code
            ')
            ->join('mas_role r', 'r.id = urm.role_id', 'inner')
            ->where('urm.user_id', $currentUserId)
            ->where('urm.isactive', 1)
            ->where('r.isactive', 1)
            ->whereIn('r.code', $workflowRoles)
            ->orderBy('urm.id', 'ASC')
            ->limit(1)
            ->get()
            ->getRowArray();
        $selectedRoleCode = '';
        if (!empty($currentRole)) {
            $currentRoleCode = $currentRole['role_code'];
            $forwardRoleMap = [
                'US'           => 'SO',
                'SO'           => 'DEALING_HAND',
                'DEALING_HAND' => 'US',
                'JS'           => 'SECRETARY',
                'SECRETARY'    => 'US'
            ];

            if (isset($forwardRoleMap[$currentRoleCode])) {
                $selectedRoleCode = $forwardRoleMap[$currentRoleCode];
            }
        }
        $officers = $db->table('user u')
            ->select("
                u.id AS user_id,
                u.name AS officer_name,
                u.email,
                u.mobile_no,
                u.designation,

                GROUP_CONCAT(
                    DISTINCT r.name
                    ORDER BY urm.id ASC
                    SEPARATOR ', '
                ) AS role_names,

                GROUP_CONCAT(
                    DISTINCT r.id
                    ORDER BY urm.id ASC
                    SEPARATOR ','
                ) AS role_ids,

                GROUP_CONCAT(
                    DISTINCT r.code
                    ORDER BY urm.id ASC
                    SEPARATOR ','
                ) AS role_codes
            ", false)
            ->join('user_role_mapping urm', 'urm.user_id = u.id', 'inner')
            ->join('mas_role r', 'r.id = urm.role_id', 'inner')
            ->where('u.isactive', 1)
            ->where('urm.isactive', 1)
            ->where('r.isactive', 1)
            ->whereIn('r.code', $workflowRoles)
            ->where('u.id !=', $currentUserId)
            ->groupBy([
                'u.id',
                'u.name',
                'u.email',
                'u.mobile_no',
                'u.designation'
            ])
            ->orderBy('u.name', 'ASC')
            ->get()
            ->getResultArray();
        foreach ($officers as &$officer) {
            $roleCodes = !empty($officer['role_codes'])
                ? explode(',', $officer['role_codes'])
                : [];
            $officer['is_default'] = 0;
            if (!empty($selectedRoleCode) && in_array($selectedRoleCode, $roleCodes)) {
                $officer['is_default'] = 1;
            }
        }
        unset($officer);
        return $officers;
    }

    public function reject()
    {
        if (! session()->get('isLoggedIn')) {
            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Session expired. Please login again.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        $db = db_connect();

        $appId   = (int) $this->request->getPost('app_id');
        $remarks = trim((string) $this->request->getPost('remarks'));
        $userId  = (int) session()->get('user_id');

        if ($appId <= 0) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Invalid application ID.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        if ($remarks === '') {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Rejection remarks are required.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        $application = $db->table('application')
            ->select('id,current_status')
            ->where('id', $appId)
            ->where('isactive', 1)
            ->get()
            ->getRow();

        if (! $application) {
            return $this->response
                ->setStatusCode(404)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Application not found.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        if ((int) $application->current_status === 14) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'This application has already been rejected.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        $status = 14;

        $db->transStart();

        $inserted = $db->table('application_history')
            ->insert([
                'app_id'       => $appId,
                'status'       => $status,
                'performed_by' => $userId,
                'assigned_to'  => '',
                'remarks'      => $remarks !== '' ? $remarks : null,
                'created_at'   => date('Y-m-d H:i:s'),
            ]);

        if (! $inserted) {
            $db->transRollback();

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Unable to save rejection history.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        $updated = $db->table('application')
            ->where('id', $appId)
            ->update([
                'current_status' => $status,
            ]);

        if (! $updated) {
            $db->transRollback();

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Unable to update application status.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        $db->transComplete();

        if ($db->transStatus() === false) {
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success'   => false,
                    'message'   => 'Transaction failed. Application was not rejected.',
                    'csrf_hash' => csrf_hash(),
                ]);
        }

        return $this->response->setJSON([
            'success'        => true,
            'status'         => true,
            'message'        => 'Application rejected successfully.',
            'app_id'         => $appId,
            'current_status' => 14,
            'csrf_hash'      => csrf_hash(),
        ]);
    }

    public function forward()
    {
        try {
            // AUTH CHECK
            if (! session()->get('isLoggedIn')) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Unauthorized.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(401);
            }

            $userId  = (int) session()->get('user_id');
            $roleIds = session()->get('role_ids');
            $db      = db_connect();

            // RESOLVE CURRENT USER ROLE NAMES
            $roleNames = [];

            if (! empty($roleIds)) {
                $ids = array_filter(
                    array_map(
                        'intval',
                        explode(',', (string) $roleIds)
                    )
                );

                if (! empty($ids)) {
                    $rows = $db->table('mas_role')
                        ->select('name')
                        ->whereIn('id', $ids)
                        ->get()
                        ->getResultArray();

                    $roleNames = array_map(
                        static function ($row) {
                            return strtolower(trim($row['name']));
                        },
                        $rows
                    );
                }
            }

            // READ JSON REQUEST
            $input = $this->request->getJSON(true);

            if (! is_array($input)) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Invalid request data.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(422);
            }

            $appId      = isset($input['app_id']) ? (int) $input['app_id'] : 0;
            $assignedTo = isset($input['assigned_to']) ? (int) $input['assigned_to'] : 0;
            $remarks    = isset($input['remarks']) ? trim((string) $input['remarks']) : '';

            // BASIC VALIDATION
            if ($appId <= 0 || $assignedTo <= 0) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Invalid application or officer.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(422);
            }

            if (mb_strlen($remarks) > 1000) {
                $remarks = mb_substr($remarks, 0, 1000);
            }

            // VERIFY APPLICATION
            $app = $db->table('application')
                ->where('id', $appId)
                ->get()
                ->getRow();

            if (! $app) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Application not found.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(404);
            }

            // VERIFY OFFICER
            $officer = $db->table('user')
                ->where('id', $assignedTo)
                ->get()
                ->getRow();

            if (! $officer) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Selected officer does not exist.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(422);
            }

            // CURRENT USER ROLE IDS
            $currentRoleIds = array_filter(
                array_map(
                    'intval',
                    explode(',', (string) session()->get('role_ids'))
                )
            );

            $highestRoleId = ! empty($currentRoleIds) ? max($currentRoleIds) : 0;

            // ROLE → HISTORY STATUS
            $roleToStatusMap = [
                1 => 1,   // ORGANIZATION USER → SUBMITTED
                2 => 4,   // DEALING HAND      → DEALING_HAND_REVIEW
                3 => 5,   // SECTION OFFICER   → SO_REVIEW
                4 => 6,   // UNDER SECRETARY   → US_REVIEW
                5 => 7,   // JOINT SECRETARY   → JS_REVIEW
                6 => 8,   // SECRETARY         → SECRETARY_REVIEW
                7 => 9,   // ADMIN             → APPROVED
                8 => 3,   // REPORT VIEW
                9 => 9,   // SYSTEM ADMIN      → APPROVED
            ];

            $historyStatus = $roleToStatusMap[$highestRoleId] ?? 4;

            // SECRETARY SPECIAL CASE
            if ($highestRoleId === 6) {
                $historyStatus = 8;
                $currentStatus = 9;
            } else {
                $historyStatus = $roleToStatusMap[$highestRoleId] ?? 4;
                $currentStatus = $historyStatus;
            }

            // TRANSACTION START
            $db->transStart();

            // INSERT APPLICATION HISTORY
            $inserted = $db->table('application_history')
                ->insert([
                    'app_id'       => $appId,
                    'status'       => $historyStatus,
                    'performed_by' => $userId,
                    'assigned_to'  => $assignedTo,
                    'remarks'      => $remarks !== '' ? $remarks : null,
                    'created_at'   => date('Y-m-d H:i:s'),
                ]);

            // UPDATE APPLICATION CURRENT STATUS
            $updated = $db->table('application')
                ->where('id', $appId)
                ->update([
                    'current_status' => $currentStatus,
                ]);

            // TRANSACTION COMPLETE
            $db->transComplete();

            // TRANSACTION FAILED
            if (
                $db->transStatus() === false ||
                ! $inserted ||
                ! $updated
            ) {
                return $this->response
                    ->setJSON([
                        'success'   => false,
                        'message'   => 'Failed to save record.',
                        'csrf_hash' => csrf_hash(),
                    ])
                    ->setStatusCode(500);
            }

            // SUCCESS MESSAGE
            $message = ($highestRoleId === 6)
                ? 'Application approved successfully.'
                : 'Application forwarded successfully.';

            // SUCCESS RESPONSE
            return $this->response
                ->setJSON([
                    'success'        => true,
                    'message'        => $message,
                    'csrf_hash'      => csrf_hash(),
                    'history_status' => $historyStatus,
                    'current_status' => $currentStatus,
                ]);

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Forward error: ' . $e->getMessage()
            );

            return $this->response
                ->setJSON([
                    'success'   => false,
                    'message'   => 'An unexpected error occurred.',
                    'csrf_hash' => csrf_hash(),
                ])
                ->setStatusCode(500);
        }
    }

/**
 * =========================================================
 * UPLOAD PERMISSION LETTER - WITH CSRF PROTECTION
 * =========================================================
 */
    public function uploadPermissionLetter()
    {
        $isAjax = $this->request->isAJAX();
        $db     = \Config\Database::connect();
        $userId = session()->get('user_id');

        if (!$userId) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Unauthorized',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()->to('/login');
        }

        $appId = $this->request->getPost('app_id');

        if (!$appId) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Application ID required',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'Application ID required');
        }

        $appId = (int) $appId;

        $application = $db->table('application')
            ->where('id', $appId)
            ->get()
            ->getRow();

        if (!$application) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Application not found',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'Application not found');
        }

        $file = $this->request->getFile('permission_letter');

        if (!$file || !$file->isValid()) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Please select a valid Permission Letter PDF.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'Please select a valid Permission Letter PDF.');
        }

        $extension = strtolower($file->getClientExtension());

        if ($extension !== 'pdf') {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Only PDF files are allowed.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with('error', 'Only PDF files are allowed.');
        }

        if ($file->getSize() > (10 * 1024 * 1024)) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Permission Letter PDF size must not exceed 10 MB.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Permission Letter PDF size must not exceed 10 MB.'
                );
        }

        $uploadPath = WRITEPATH . 'uploads/permission_letters/';

        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                if ($isAjax) {
                    return $this->response->setJSON([
                        'success'   => false,
                        'message'   => 'Unable to create Permission Letter upload directory.',
                        'csrf_hash' => csrf_hash()
                    ]);
                }

                return redirect()
                    ->back()
                    ->with(
                        'error',
                        'Unable to create Permission Letter upload directory.'
                    );
            }
        }

        $newName =
            'permission_letter_' .
            $appId . '_' .
            time() . '.pdf';

        try {
            $file->move($uploadPath, $newName);
        } catch (\Throwable $e) {
            log_message(
                'error',
                'Permission Letter upload failed: ' . $e->getMessage()
            );

            if ($isAjax) {
                return $this->response->setJSON([
                    'success'   => false,
                    'message'   => 'Unable to upload Permission Letter.',
                    'csrf_hash' => csrf_hash()
                ]);
            }

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Unable to upload Permission Letter.'
                );
        }

        $documentData = [
            'app_id'        => $appId,
            'document_type' => 4,
            'document_name' => $file->getClientName(),
            'document_path' => 'uploads/permission_letters/' . $newName
        ];

        $existing = $db->table('application_document_master')
            ->where('app_id', $appId)
            ->where('document_type', 4)
            ->get()
            ->getRow();

        if ($existing) {
            $oldPath = WRITEPATH . $existing->document_path;

            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $db->table('application_document_master')
                ->where('id', $existing->id)
                ->update($documentData);
        } else {
            $db->table('application_document_master')
                ->insert($documentData);
        }

        $db->table('application')
            ->where('id', $appId)
            ->update([
                'current_status' => 12
            ]);

        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 11,
            'performed_by' => $userId,
            'remarks'      => 'Permission Letter uploaded successfully.',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 12,
            'performed_by' => $userId,
            'remarks'      => 'Application completed after Permission Letter upload.',
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        if ($isAjax) {
            return $this->response->setJSON([
                'success'   => true,
                'message'   => 'Permission Letter uploaded successfully.',
                'status'    => 'COMPLETED',
                'app_id'    => $appId,
                'csrf_hash' => csrf_hash()
            ]);
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Permission Letter uploaded successfully.'
            );
    }


}