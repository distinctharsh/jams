<?php

namespace App\Controllers;
use Config\Database;
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

        $db = \Config\Database::connect();
        $userId = session()->get('user_id');

        $user = $db->table('user')
            ->select('id, name, email, mobile_no, organization_id, org_type, designation, authorization_letter, ugc_id')
            ->where('id', $userId)
            ->where('isactive', 1)
            ->get()
            ->getRowArray();

        if (!$user) {
            return redirect()
                ->to(base_url('/'))
                ->with('error', 'User information not found.');
        }

        $data = [
            'user_id'         => $user['id'],
            'name'            => $user['name'],
            'email'           => $user['email'],
            'mobile_no'       => $user['mobile_no'],
            'designation'     => $user['designation'],
            'organization_id' => $user['organization_id'],
            'org_type'        => $user['org_type'],
            'ugc_id'          => $user['ugc_id'],
        ];

        $data['organizations'] = $db->table('mas_organization')
            ->select('id, org_name, org_type')
            ->where('isactive', 1)
            ->orderBy('org_name', 'ASC')
            ->get()
            ->getResultArray();

        $data['organization_types'] = $db->table('mas_organization_type')
            ->select('id, name, is_ugc_id_required')
            ->where('isactive', 1)
            ->orderBy('name', 'ASC')
            ->get()
            ->getResultArray();

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
    
    /**
     * Submit New Permission Application
    */
    public function submitRequest()
    {
        $isAjax = $this->request->isAJAX();

        if (strtolower($this->request->getMethod()) !== 'post') {
            if ($isAjax) {
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method.']);
            }
            return redirect()->back()->with('error', 'Invalid request method.');
        }

        $db = \Config\Database::connect();

        $userId = (int) session()->get('user_id');
        if ($userId <= 0) {
            if ($isAjax) {
                return $this->response->setJSON(['success' => false, 'message' => 'Your session has expired. Please login again.']);
            }
            return redirect()->back()->withInput()->with('error', 'Your session has expired. Please login again.');
        }

        // ------------------------------------------------------------------
        // ORG DATA
        // ------------------------------------------------------------------
        $organizationId       = (int) $this->request->getPost('organization_id');
        $orgType              = (int) $this->request->getPost('org_type');
        $organisationName     = trim((string) $this->request->getPost('organisation_name'));
        $organisationTypeName = trim((string) $this->request->getPost('organisation_type_name'));

        if ($organizationId <= 0 && $organisationName !== '') {
            try {
                $org = $db->table('mas_organization')->where('org_name', $organisationName)->get()->getRow();
                if ($org) {
                    $organizationId = (int) $org->id;
                    if ($orgType <= 0 && isset($org->org_type)) {
                        $orgType = (int) $org->org_type;
                    }
                }
            } catch (\Exception $e) {
                log_message('error', 'Error finding organization: ' . $e->getMessage());
            }
        }

        $orgName     = $organisationName;
        $orgTypeName = $organisationTypeName;

        if ($organizationId > 0 && $orgName === '') {
            try {
                $orgResult = $db->table('mas_organization')->where('id', $organizationId)->get()->getRow();
                if ($orgResult) {
                    $orgName = $orgResult->org_name;
                    if ($orgType <= 0 && isset($orgResult->org_type)) {
                        $orgType = (int) $orgResult->org_type;
                    }
                }
            } catch (\Exception $e) {
                log_message('error', 'Error fetching organization: ' . $e->getMessage());
            }
        }

        if ($orgType > 0 && $orgTypeName === '') {
            try {
                $typeResult = $db->table('mas_organization_type')->where('id', $orgType)->get()->getRow();
                if ($typeResult) {
                    $orgTypeName = $typeResult->name;
                }
            } catch (\Exception $e) {
                log_message('error', 'Error fetching organization type: ' . $e->getMessage());
            }
        }

        // ------------------------------------------------------------------
        // DECLARATIONS
        // ------------------------------------------------------------------
        $declarationsJson = $this->request->getPost('declarations_json');
        if ($declarationsJson) {
            $declarations = json_decode($declarationsJson, true) ?? [];
        } else {
            $declarations = $this->request->getPost('declarations') ?? [];
        }
        if (!is_array($declarations)) $declarations = [];

        $adequateArrangement = in_array('security', $declarations, true) ? 1 : 0;
        $jammerAccounted     = in_array('accountability', $declarations, true) ? 1 : 0;
        $nonInterference     = in_array('non_interference', $declarations, true) ? 1 : 0;

        $jsonError = function ($message) use ($isAjax) {
            if ($isAjax) {
                return $this->response->setJSON(['success' => false, 'message' => $message]);
            }
            return redirect()->back()->withInput()->with('error', $message);
        };

        if ($organizationId <= 0 && $orgName === '') {
            return $jsonError('Please select a valid organisation.');
        }
        if ($orgType <= 0 && $orgTypeName === '') {
            return $jsonError('Please select a valid organisation type.');
        }
        if (count($declarations) < 3) {
            return $jsonError('Please accept all declarations.');
        }

        $singleExam   = $this->request->getPost('single_exam');
        $isSingleExam = ($singleExam === 'yes') ? 1 : 0;
        $createdAt    = date('Y-m-d H:i:s');

        // ------------------------------------------------------------------
        // CENTRE NOT AVAILABLE FLAGS
        // ------------------------------------------------------------------
        $isSingleCentreNotAvailable   = 0;
        $isMultipleCentreNotAvailable = 0;

        $singleCentreNotAvailable = $this->request->getPost('single_centre_not_available');
        if (!empty($singleCentreNotAvailable) && ($singleCentreNotAvailable === '1' || $singleCentreNotAvailable === 1 || $singleCentreNotAvailable === true)) {
            $isSingleCentreNotAvailable = 1;
        }

        $multipleCentreNotAvailable = $this->request->getPost('multiple_centre_not_available');
        if (!empty($multipleCentreNotAvailable) && is_array($multipleCentreNotAvailable)) {
            foreach ($multipleCentreNotAvailable as $examCentres) {
                if (is_array($examCentres)) {
                    foreach ($examCentres as $val) {
                        if ($val === 'on' || $val === '1' || $val === true) {
                            $isMultipleCentreNotAvailable = 1;
                            break 2;
                        }
                    }
                }
            }
        }

        $centreListReady = ($isSingleCentreNotAvailable || $isMultipleCentreNotAvailable) ? 0 : 1;
        $undertaking     = ($centreListReady == 0) ? 1 : '';

        // ------------------------------------------------------------------
        // APPLICATION NUMBER
        // ------------------------------------------------------------------
        try {
            try {
                $db->query("CALL generate_application_no(?, @app_no)", [$organizationId]);
                $result = $db->query("SELECT @app_no AS app_no");
                $row = $result->getRow();
                if (!$row || empty($row->app_no)) {
                    throw new \RuntimeException('Application number could not be generated.');
                }
                $appNo = $row->app_no;
            } catch (\Exception $e) {
                $appNo = $this->generateApplicationNumber($organizationId);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Application number generation error: ' . $e->getMessage());
            return $jsonError('Failed to generate application number.');
        }

        // ------------------------------------------------------------------
        // DATE CONVERSION HELPER
        // ------------------------------------------------------------------
        $convertDate = function ($dateStr) {
            $dateStr = trim((string) $dateStr);
            if ($dateStr === '') return null;
            $dt = \DateTime::createFromFormat('d/m/Y', $dateStr);
            if ($dt) return $dt->format('Y-m-d');
            $ts = strtotime($dateStr);
            return $ts ? date('Y-m-d', $ts) : null;
        };

        $db->transBegin();

        try {
            $applicationData = [
                'app_no'                     => $appNo,
                'user_id'                    => $userId,
                'adequate_arrangement_check' => $adequateArrangement,
                'jammer_accounted'           => $jammerAccounted,
                'non_intereference'          => $nonInterference,
                'created_at'                 => $createdAt,
                'organisation'               => $orgName,
                'organisation_type'          => $orgTypeName,
                'current_status'             => 1,
                'isactive'                   => 1,
                'is_single_exam'             => $isSingleExam,
                'is_single_date'             => 1,
                'centre_list_ready'          => $centreListReady,
                'undertaking'                => $undertaking,
            ];

            if (!$db->table('application')->insert($applicationData)) {
                throw new \RuntimeException('Failed to create application.');
            }
            $appId = (int) $db->insertID();
            if ($appId <= 0) {
                throw new \RuntimeException('Application ID could not be generated.');
            }

            // ============================================================
            // 2) SINGLE EXAM
            // ============================================================
            if ($isSingleExam === 1) {
                $singleExamName = trim((string) $this->request->getPost('single_exam_name'));
                $dateType       = $this->request->getPost('single_exam_date_type') ?: 'single';

                // ---------- 2A) SINGLE DATE ----------
                if ($dateType === 'single') {
                    $singleExamDate = $this->request->getPost('single_exam_date');

                    if ($singleExamName !== '' && $singleExamDate !== '') {
                        $converted = $convertDate($singleExamDate);
                        if (!$converted) throw new \RuntimeException('Invalid examination date.');
                        $db->table('application_date_mapping')->insert([
                            'app_id'    => $appId,
                            'exam_name' => $singleExamName,
                            'exam_date' => $converted . ' 00:00:00',
                        ]);
                    }

                    $centreNames   = json_decode($this->request->getPost('single_centre_names_json') ?? '[]', true) ?: [];
                    $centreCoords  = json_decode($this->request->getPost('single_centre_coordinates_json') ?? '[]', true) ?: [];
                    $centreStates  = json_decode($this->request->getPost('single_centre_states_json') ?? '[]', true) ?: [];
                    $centreDists   = json_decode($this->request->getPost('single_centre_districts_json') ?? '[]', true) ?: [];
                    $centreAddrs   = json_decode($this->request->getPost('single_centre_addresses_json') ?? '[]', true) ?: [];
                    $centrePersons = json_decode($this->request->getPost('single_centre_contact_persons_json') ?? '[]', true) ?: [];
                    $centreEmails  = json_decode($this->request->getPost('single_centre_contact_emails_json') ?? '[]', true) ?: [];
                    $centrePhones  = json_decode($this->request->getPost('single_centre_contact_phones_json') ?? '[]', true) ?: [];

                    foreach ($centreNames as $i => $cName) {
                        $cName = trim((string) $cName);
                        if ($cName === '') continue;

                        $stateId    = (int) ($centreStates[$i] ?? 0);
                        $districtId = (int) ($centreDists[$i]  ?? 0);
                        $person     = trim((string) ($centrePersons[$i] ?? ''));
                        $email      = trim((string) ($centreEmails[$i]  ?? ''));
                        $phone      = trim((string) ($centrePhones[$i]  ?? ''));

                        $db->table('application_centre_mapping')->insert([
                            'app_id'                => $appId,
                            'district'              => (string) $districtId,
                            'state'                 => (string) $stateId,
                            'centre_name'           => $cName,
                            'centre_address'        => trim((string) ($centreAddrs[$i] ?? '')),
                            'centre_coordinates'    => trim((string) ($centreCoords[$i] ?? '')),
                            'coorrdinator_name'     => substr($person, 0, 500),
                            'coordinator_mobile_no' => substr($phone, 0, 15),
                            'coordinator_email'     => substr($email, 0, 255),
                        ]);
                    }
                }
                // ---------- 2B) MULTIPLE DATES ----------
                else {
                    $smDates   = json_decode($this->request->getPost('single_multi_exam_dates_json') ?? '[]', true) ?: [];
                    $smNames   = json_decode($this->request->getPost('single_multi_centre_names_json') ?? '[]', true) ?: [];
                    $smCoords  = json_decode($this->request->getPost('single_multi_centre_coordinates_json') ?? '[]', true) ?: [];
                    $smStates  = json_decode($this->request->getPost('single_multi_centre_states_json') ?? '[]', true) ?: [];
                    $smDists   = json_decode($this->request->getPost('single_multi_centre_districts_json') ?? '[]', true) ?: [];
                    $smAddrs   = json_decode($this->request->getPost('single_multi_centre_addresses_json') ?? '[]', true) ?: [];
                    $smPersons = json_decode($this->request->getPost('single_multi_centre_contact_persons_json') ?? '[]', true) ?: [];
                    $smEmails  = json_decode($this->request->getPost('single_multi_centre_contact_emails_json') ?? '[]', true) ?: [];
                    $smPhones  = json_decode($this->request->getPost('single_multi_centre_contact_phones_json') ?? '[]', true) ?: [];

                    foreach ($smDates as $di => $dateVal) {
                        if ($dateVal === '') continue;
                        $converted = $convertDate($dateVal);
                        if (!$converted) throw new \RuntimeException('Invalid examination date.');

                        $db->table('application_date_mapping')->insert([
                            'app_id'    => $appId,
                            'exam_name' => $singleExamName,
                            'exam_date' => $converted . ' 00:00:00',
                        ]);

                        $cNames   = $smNames[$di]   ?? [];
                        $cCoords  = $smCoords[$di]  ?? [];
                        $cStates  = $smStates[$di]  ?? [];
                        $cDists   = $smDists[$di]   ?? [];
                        $cAddrs   = $smAddrs[$di]   ?? [];
                        $cPersons = $smPersons[$di] ?? [];
                        $cEmails  = $smEmails[$di]  ?? [];
                        $cPhones  = $smPhones[$di]  ?? [];

                        foreach ($cNames as $i => $cName) {
                            $cName = trim((string) $cName);
                            if ($cName === '') continue;

                            $person = trim((string) ($cPersons[$i] ?? ''));
                            $email  = trim((string) ($cEmails[$i]  ?? ''));
                            $phone  = trim((string) ($cPhones[$i]  ?? ''));

                            $db->table('application_centre_mapping')->insert([
                                'app_id'                => $appId,
                                'district'              => (string) ((int) ($cDists[$i]  ?? 0)),
                                'state'                 => (string) ((int) ($cStates[$i] ?? 0)),
                                'centre_name'           => $cName,
                                'centre_address'        => trim((string) ($cAddrs[$i]  ?? '')),
                                'centre_coordinates'    => trim((string) ($cCoords[$i] ?? '')),
                                'coorrdinator_name'     => substr($person, 0, 500),
                                'coordinator_mobile_no' => substr($phone, 0, 15),
                                'coordinator_email'     => substr($email, 0, 255),
                            ]);
                        }
                    }
                }
            }
            // ============================================================
            // 3) MULTIPLE EXAM
            // ============================================================
            else {
                $mExamNames     = json_decode($this->request->getPost('multiple_exam_names_json') ?? '[]', true) ?: [];
                $mExamDateTypes = json_decode($this->request->getPost('multiple_exam_date_types_json') ?? '[]', true) ?: [];
                $mDatesSingle   = json_decode($this->request->getPost('multiple_exam_dates_single_json') ?? '[]', true) ?: [];
                $mDatesMultiple = json_decode($this->request->getPost('multiple_exam_dates_multiple_json') ?? '[]', true) ?: [];
                $mCentreNames   = json_decode($this->request->getPost('multiple_centre_names_json') ?? '[]', true) ?: [];
                $mCentreCoords  = json_decode($this->request->getPost('multiple_centre_coordinates_json') ?? '[]', true) ?: [];
                $mCentreStates  = json_decode($this->request->getPost('multiple_centre_states_json') ?? '[]', true) ?: [];
                $mCentreDists   = json_decode($this->request->getPost('multiple_centre_districts_json') ?? '[]', true) ?: [];
                $mCentreAddrs   = json_decode($this->request->getPost('multiple_centre_addresses_json') ?? '[]', true) ?: [];
                $mCentrePersons = json_decode($this->request->getPost('multiple_centre_contact_persons_json') ?? '[]', true) ?: [];
                $mCentreEmails  = json_decode($this->request->getPost('multiple_centre_contact_emails_json') ?? '[]', true) ?: [];
                $mCentrePhones  = json_decode($this->request->getPost('multiple_centre_contact_phones_json') ?? '[]', true) ?: [];

                foreach ($mExamNames as $ei => $examName) {
                    $examName = trim((string) $examName);
                    if ($examName === '') continue;

                    $dateType = $mExamDateTypes[$ei] ?? 'single';

                    if ($dateType === 'single') {
                        $dVal = trim((string) ($mDatesSingle[$ei] ?? ''));
                        if ($dVal !== '') {
                            $converted = $convertDate($dVal);
                            if ($converted) {
                                $db->table('application_date_mapping')->insert([
                                    'app_id'    => $appId,
                                    'exam_name' => $examName,
                                    'exam_date' => $converted . ' 00:00:00',
                                ]);
                            }
                        }
                    } else {
                        $datesArr = $mDatesMultiple[$ei] ?? [];
                        if (is_array($datesArr)) {
                            foreach ($datesArr as $dVal) {
                                $dVal = trim((string) $dVal);
                                if ($dVal === '') continue;
                                $converted = $convertDate($dVal);
                                if ($converted) {
                                    $db->table('application_date_mapping')->insert([
                                        'app_id'    => $appId,
                                        'exam_name' => $examName,
                                        'exam_date' => $converted . ' 00:00:00',
                                    ]);
                                }
                            }
                        }
                    }

                    $cNames   = $mCentreNames[$ei]   ?? [];
                    $cCoords  = $mCentreCoords[$ei]  ?? [];
                    $cStates  = $mCentreStates[$ei]  ?? [];
                    $cDists   = $mCentreDists[$ei]   ?? [];
                    $cAddrs   = $mCentreAddrs[$ei]   ?? [];
                    $cPersons = $mCentrePersons[$ei] ?? [];
                    $cEmails  = $mCentreEmails[$ei]  ?? [];
                    $cPhones  = $mCentrePhones[$ei]  ?? [];

                    foreach ($cNames as $i => $cName) {
                        $cName = trim((string) $cName);
                        if ($cName === '') continue;

                        $person = trim((string) ($cPersons[$i] ?? ''));
                        $email  = trim((string) ($cEmails[$i]  ?? ''));
                        $phone  = trim((string) ($cPhones[$i]  ?? ''));

                        $db->table('application_centre_mapping')->insert([
                            'app_id'                => $appId,
                            'district'              => (string) ((int) ($cDists[$i]  ?? 0)),
                            'state'                 => (string) ((int) ($cStates[$i] ?? 0)),
                            'centre_name'           => $cName,
                            'centre_address'        => trim((string) ($cAddrs[$i]  ?? '')),
                            'centre_coordinates'    => trim((string) ($cCoords[$i] ?? '')),
                            'coorrdinator_name'     => substr($person, 0, 500),
                            'coordinator_mobile_no' => substr($phone, 0, 15),
                            'coordinator_email'     => substr($email, 0, 255),
                        ]);
                    }
                }
            }

            // ============================================================
            // 4) VENDORS
            // ============================================================
            $vendorIds = json_decode($this->request->getPost('vendor_ids_json') ?? '[]', true) ?: [];
            $jammerIds = json_decode($this->request->getPost('jammer_ids_json') ?? '[]', true) ?: [];
            $techFiles = $this->request->getFileMultiple('technical_specifications') ?? [];

            foreach ($vendorIds as $index => $vendorId) {
                $vendorId = (int) $vendorId;
                $jammerId = (int) ($jammerIds[$index] ?? 0);
                if ($vendorId <= 0) continue;
                if ($jammerId <= 0) {
                    throw new \RuntimeException('Please select a valid jammer model for vendor #' . ($index + 1) . '.');
                }

                $technicalSpecification = '';

                if (isset($techFiles[$index]) && $techFiles[$index]->isValid() && !$techFiles[$index]->hasMoved()) {
                    $file      = $techFiles[$index];
                    $extension = strtolower($file->getClientExtension());
                    if ($extension !== 'pdf') {
                        throw new \RuntimeException('Technical specification must be a PDF for vendor #' . ($index + 1) . '.');
                    }

                    $uploadPath = WRITEPATH . 'uploads/vendor_documents/';
                    if (!is_dir($uploadPath)) {
                        if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                            throw new \RuntimeException('Unable to create vendor document upload directory.');
                        }
                    }
                    $newName = $file->getRandomName();
                    $file->move($uploadPath, $newName);
                    $technicalSpecification = $newName;

                    $db->table('application_document_master')->insert([
                        'app_id'        => $appId,
                        'document_type' => 2,
                        'document_name' => $file->getClientName(),
                        'document_path' => 'uploads/vendor_documents/' . $newName,
                    ]);
                }

                $db->table('application_vendor_mapping')->insert([
                    'app_id'                   => $appId,
                    'vendor_id'                => $vendorId,
                    'jammer_id'                => $jammerId,
                    'technical_specifications' => $technicalSpecification,
                    'created_at'               => $createdAt,
                    'updated_at'               => $createdAt,
                ]);
            }

            // ============================================================
            // 5) EXCEL UPLOADS
            // ============================================================
            $excelFiles = [];
            $singleExcel   = $this->request->getFile('single_exam_excel');
            $multipleExcel = $this->request->getFile('multiple_exam_excel');

            if ($singleExcel && $singleExcel->isValid() && !$singleExcel->hasMoved()) {
                $excelFiles[] = $singleExcel;
            }
            if ($multipleExcel && $multipleExcel->isValid() && !$multipleExcel->hasMoved()) {
                $excelFiles[] = $multipleExcel;
            }

            foreach ($excelFiles as $excelFile) {
                $extension = strtolower($excelFile->getClientExtension());
                if (!in_array($extension, ['xlsx', 'xls', 'csv'], true)) {
                    throw new \RuntimeException('Invalid Excel file. Allowed: xlsx, xls, csv');
                }

                $uploadPath = WRITEPATH . 'uploads/examinations_documents/';
                if (!is_dir($uploadPath)) {
                    if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                        throw new \RuntimeException('Unable to create examination document upload directory.');
                    }
                }
                $newName = $excelFile->getRandomName();
                $excelFile->move($uploadPath, $newName);

                $db->table('application_document_master')->insert([
                    'app_id'        => $appId,
                    'document_type' => 1,
                    'document_name' => $excelFile->getClientName(),
                    'document_path' => 'uploads/examinations_documents/' . $newName,
                ]);
            }

            // ============================================================
            // 6) APPLICATION HISTORY
            // ============================================================
            $db->table('application_history')->insert([
                'app_id'       => $appId,
                'status'       => 1,
                'performed_by' => $userId,
                'remarks'      => 'Application submitted successfully.',
                'created_at'   => $createdAt,
            ]);

            $db->table('application_history')->insert([
                'app_id'       => $appId,
                'status'       => 2,
                'performed_by' => $userId,
                'remarks'      => 'PDF_GENERATED',
                'created_at'   => date('Y-m-d H:i:s'),
            ]);

            if ($db->transStatus() === false) {
                throw new \RuntimeException('Database transaction failed.');
            }

            $db->transCommit();

            if ($isAjax) {
                return $this->response->setJSON([
                    'success'      => true,
                    'message'      => 'Application ' . $appNo . ' submitted successfully.',
                    'app_no'       => $appNo,
                    'app_id'       => $appId,
                    'redirect_url' => base_url('request-view'),
                ]);
            }

            return redirect()->to(base_url('request-view'))->with('success', 'Application ' . $appNo . ' submitted successfully.');

        } catch (\Throwable $e) {
            $db->transRollback();
            log_message('error', 'submitRequest Error: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());

            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Application submission failed: ' . $e->getMessage(),
                ]);
            }
            return redirect()->back()->withInput()->with('error', 'Application submission failed: ' . $e->getMessage());
        }
    }

   /**
     * saveDraft  Application
    */
        public function saveDraft()
        {
            $isAjax = $this->request->isAJAX();

            if (strtolower($this->request->getMethod()) !== 'post') {
                if ($isAjax) {
                    return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method.']);
                }
                return redirect()->back()->with('error', 'Invalid request method.');
            }

            $db = \Config\Database::connect();

            $userId = (int) session()->get('user_id');
            if ($userId <= 0) {
                if ($isAjax) {
                    return $this->response->setJSON(['success' => false, 'message' => 'Your session has expired. Please login again.']);
                }
                return redirect()->back()->withInput()->with('error', 'Your session has expired. Please login again.');
            }

            // ------------------------------------------------------------------
            // ✅ CHECK FOR EXISTING DRAFT (EDIT MODE)
            // ------------------------------------------------------------------
            $existingAppId = (int) $this->request->getPost('app_id');
            $isEditMode    = false;
            $appId         = 0;
            $appNo         = '';

            if ($existingAppId > 0) {
                $existing = $db->table('application')
                    ->where('id', $existingAppId)
                    ->where('user_id', $userId)
                    ->get()
                    ->getRow();

                if (!$existing) {
                    return $isAjax
                        ? $this->response->setJSON(['success' => false, 'message' => 'Application not found or access denied.'])
                        : redirect()->back()->withInput()->with('error', 'Application not found or access denied.');
                }

                // Only allow editing drafts (status 15)
                if ((int) $existing->current_status !== 15) {
                    return $isAjax
                        ? $this->response->setJSON(['success' => false, 'message' => 'Only draft applications can be edited.'])
                        : redirect()->back()->withInput()->with('error', 'Only draft applications can be edited.');
                }

                $isEditMode = true;
                $appId      = $existingAppId;
                $appNo      = $existing->app_no;
            }

            // ------------------------------------------------------------------
            // ORG DATA
            // ------------------------------------------------------------------
            $organizationId       = (int) $this->request->getPost('organization_id');
            $orgType              = (int) $this->request->getPost('org_type');
            $organisationName     = trim((string) $this->request->getPost('organisation_name'));
            $organisationTypeName = trim((string) $this->request->getPost('organisation_type_name'));

            if ($organizationId <= 0 && $organisationName !== '') {
                try {
                    $org = $db->table('mas_organization')->where('org_name', $organisationName)->get()->getRow();
                    if ($org) {
                        $organizationId = (int) $org->id;
                        if ($orgType <= 0 && isset($org->org_type)) {
                            $orgType = (int) $org->org_type;
                        }
                    }
                } catch (\Exception $e) {
                    log_message('error', 'Error finding organization: ' . $e->getMessage());
                }
            }

            $orgName     = $organisationName;
            $orgTypeName = $organisationTypeName;

            if ($organizationId > 0 && $orgName === '') {
                try {
                    $orgResult = $db->table('mas_organization')->where('id', $organizationId)->get()->getRow();
                    if ($orgResult) {
                        $orgName = $orgResult->org_name;
                        if ($orgType <= 0 && isset($orgResult->org_type)) {
                            $orgType = (int) $orgResult->org_type;
                        }
                    }
                } catch (\Exception $e) {
                    log_message('error', 'Error fetching organization: ' . $e->getMessage());
                }
            }

            if ($orgType > 0 && $orgTypeName === '') {
                try {
                    $typeResult = $db->table('mas_organization_type')->where('id', $orgType)->get()->getRow();
                    if ($typeResult) {
                        $orgTypeName = $typeResult->name;
                    }
                } catch (\Exception $e) {
                    log_message('error', 'Error fetching organization type: ' . $e->getMessage());
                }
            }

            // ------------------------------------------------------------------
            // DECLARATIONS
            // ------------------------------------------------------------------
            $declarationsJson = $this->request->getPost('declarations_json');
            if ($declarationsJson) {
                $declarations = json_decode($declarationsJson, true) ?? [];
            } else {
                $declarations = $this->request->getPost('declarations') ?? [];
            }
            if (!is_array($declarations)) $declarations = [];

            $adequateArrangement = in_array('security', $declarations, true) ? 1 : 0;
            $jammerAccounted     = in_array('accountability', $declarations, true) ? 1 : 0;
            $nonInterference     = in_array('non_interference', $declarations, true) ? 1 : 0;

            $jsonError = function ($message) use ($isAjax) {
                if ($isAjax) {
                    return $this->response->setJSON(['success' => false, 'message' => $message]);
                }
                return redirect()->back()->withInput()->with('error', $message);
            };

            if ($organizationId <= 0 && $orgName === '') {
                return $jsonError('Please select a valid organisation to save draft.');
            }

            $singleExam   = $this->request->getPost('single_exam');
            $isSingleExam = ($singleExam === 'yes') ? 1 : 0;
            $createdAt    = date('Y-m-d H:i:s');

            // ------------------------------------------------------------------
            // CENTRE NOT AVAILABLE FLAGS
            // ------------------------------------------------------------------
            $isSingleCentreNotAvailable   = 0;
            $isMultipleCentreNotAvailable = 0;

            $singleCentreNotAvailable = $this->request->getPost('single_centre_not_available');
            if (!empty($singleCentreNotAvailable) && ($singleCentreNotAvailable === '1' || $singleCentreNotAvailable === 1 || $singleCentreNotAvailable === true)) {
                $isSingleCentreNotAvailable = 1;
            }

            $multipleCentreNotAvailable = $this->request->getPost('multiple_centre_not_available');
            if (!empty($multipleCentreNotAvailable) && is_array($multipleCentreNotAvailable)) {
                foreach ($multipleCentreNotAvailable as $examCentres) {
                    if (is_array($examCentres)) {
                        foreach ($examCentres as $val) {
                            if ($val === 'on' || $val === '1' || $val === true) {
                                $isMultipleCentreNotAvailable = 1;
                                break 2;
                            }
                        }
                    }
                }
            }

            $centreListReady = ($isSingleCentreNotAvailable || $isMultipleCentreNotAvailable) ? 0 : 1;
            $undertaking     = ($centreListReady == 0) ? 1 : '';

            // ------------------------------------------------------------------
            // APPLICATION NUMBER (only generate for NEW drafts)
            // ------------------------------------------------------------------
            if (!$isEditMode) {
                try {
                    try {
                        $db->query("CALL generate_application_no(?, @app_no)", [$organizationId]);
                        $result = $db->query("SELECT @app_no AS app_no");
                        $row = $result->getRow();
                        if (!$row || empty($row->app_no)) {
                            throw new \RuntimeException('Application number could not be generated.');
                        }
                        $appNo = $row->app_no;
                    } catch (\Exception $e) {
                        $appNo = $this->generateApplicationNumber($organizationId);
                    }
                } catch (\Throwable $e) {
                    log_message('error', 'Application number generation error: ' . $e->getMessage());
                    return $jsonError('Failed to generate application number.');
                }
            }

            // ------------------------------------------------------------------
            // DATE CONVERSION HELPER
            // ------------------------------------------------------------------
            $convertDate = function ($dateStr) {
                $dateStr = trim((string) $dateStr);
                if ($dateStr === '') return null;
                $dt = \DateTime::createFromFormat('d/m/Y', $dateStr);
                if ($dt) return $dt->format('Y-m-d');
                $ts = strtotime($dateStr);
                return $ts ? date('Y-m-d', $ts) : null;
            };

            $db->transBegin();

            try {
                // ============================================================
                // 1) INSERT OR UPDATE application
                // ============================================================
                $applicationData = [
                    'user_id'                    => $userId,
                    'adequate_arrangement_check' => $adequateArrangement,
                    'jammer_accounted'           => $jammerAccounted,
                    'non_intereference'          => $nonInterference,
                    'created_at'                 => $createdAt,
                    'organisation'               => $orgName,
                    'organisation_type'          => $orgTypeName,
                    'current_status'             => 1, 
                    'isactive'                   => 1,
                    'is_single_exam'             => $isSingleExam,
                    'is_single_date'             => 1,
                    'centre_list_ready'          => $centreListReady,
                    'undertaking'                => $undertaking,
                ];

                if ($isEditMode) {
                    // ✅ UPDATE existing draft
                    $applicationData['updated_at'] = $createdAt;
                    if (!$db->table('application')->where('id', $appId)->update($applicationData)) {
                        throw new \RuntimeException('Failed to update draft.');
                    }

                    // ✅ Delete existing child records before re-inserting
                    $db->table('application_date_mapping')->where('app_id', $appId)->delete();
                    $db->table('application_centre_mapping')->where('app_id', $appId)->delete();
                    $db->table('application_vendor_mapping')->where('app_id', $appId)->delete();

                    // Delete old documents + physical files
                    $oldDocs = $db->table('application_document_master')->where('app_id', $appId)->get()->getResult();
                    foreach ($oldDocs as $doc) {
                        $filePath = WRITEPATH . $doc->document_path;
                        if (is_file($filePath)) {
                            @unlink($filePath);
                        }
                    }
                    $db->table('application_document_master')->where('app_id', $appId)->delete();

                    // Keep only the latest history entry or clear and re-add
                    $db->table('application_history')->where('app_id', $appId)->delete();
                } else {
                    // ✅ INSERT new draft
                    $applicationData['app_no'] = $appNo;
                    if (!$db->table('application')->insert($applicationData)) {
                        throw new \RuntimeException('Failed to save draft.');
                    }
                    $appId = (int) $db->insertID();
                    if ($appId <= 0) {
                        throw new \RuntimeException('Application ID could not be generated.');
                    }
                }

                // ============================================================
                // 2) SINGLE EXAM
                // ============================================================
                if ($isSingleExam === 1) {
                    $singleExamName = trim((string) $this->request->getPost('single_exam_name'));
                    $dateType       = $this->request->getPost('single_exam_date_type') ?: 'single';

                    if ($dateType === 'single') {
                        $singleExamDate = $this->request->getPost('single_exam_date');

                        if ($singleExamName !== '' && $singleExamDate !== '') {
                            $converted = $convertDate($singleExamDate);
                            if ($converted) {
                                $db->table('application_date_mapping')->insert([
                                    'app_id'    => $appId,
                                    'exam_name' => $singleExamName,
                                    'exam_date' => $converted . ' 00:00:00',
                                ]);
                            }
                        }

                        $centreNames   = json_decode($this->request->getPost('single_centre_names_json') ?? '[]', true) ?: [];
                        $centreCoords  = json_decode($this->request->getPost('single_centre_coordinates_json') ?? '[]', true) ?: [];
                        $centreStates  = json_decode($this->request->getPost('single_centre_states_json') ?? '[]', true) ?: [];
                        $centreDists   = json_decode($this->request->getPost('single_centre_districts_json') ?? '[]', true) ?: [];
                        $centreAddrs   = json_decode($this->request->getPost('single_centre_addresses_json') ?? '[]', true) ?: [];
                        $centrePersons = json_decode($this->request->getPost('single_centre_contact_persons_json') ?? '[]', true) ?: [];
                        $centreEmails  = json_decode($this->request->getPost('single_centre_contact_emails_json') ?? '[]', true) ?: [];
                        $centrePhones  = json_decode($this->request->getPost('single_centre_contact_phones_json') ?? '[]', true) ?: [];

                        foreach ($centreNames as $i => $cName) {
                            $cName = trim((string) $cName);
                            if ($cName === '') continue;

                            $stateId    = (int) ($centreStates[$i] ?? 0);
                            $districtId = (int) ($centreDists[$i]  ?? 0);
                            $person     = trim((string) ($centrePersons[$i] ?? ''));
                            $email      = trim((string) ($centreEmails[$i]  ?? ''));
                            $phone      = trim((string) ($centrePhones[$i]  ?? ''));

                            $db->table('application_centre_mapping')->insert([
                                'app_id'                => $appId,
                                'district'              => (string) $districtId,
                                'state'                 => (string) $stateId,
                                'centre_name'           => $cName,
                                'centre_address'        => trim((string) ($centreAddrs[$i] ?? '')),
                                'centre_coordinates'    => trim((string) ($centreCoords[$i] ?? '')),
                                'coorrdinator_name'     => substr($person, 0, 500),
                                'coordinator_mobile_no' => substr($phone, 0, 15),
                                'coordinator_email'     => substr($email, 0, 255),
                            ]);
                        }
                    } else {
                        $smDates   = json_decode($this->request->getPost('single_multi_exam_dates_json') ?? '[]', true) ?: [];
                        $smNames   = json_decode($this->request->getPost('single_multi_centre_names_json') ?? '[]', true) ?: [];
                        $smCoords  = json_decode($this->request->getPost('single_multi_centre_coordinates_json') ?? '[]', true) ?: [];
                        $smStates  = json_decode($this->request->getPost('single_multi_centre_states_json') ?? '[]', true) ?: [];
                        $smDists   = json_decode($this->request->getPost('single_multi_centre_districts_json') ?? '[]', true) ?: [];
                        $smAddrs   = json_decode($this->request->getPost('single_multi_centre_addresses_json') ?? '[]', true) ?: [];
                        $smPersons = json_decode($this->request->getPost('single_multi_centre_contact_persons_json') ?? '[]', true) ?: [];
                        $smEmails  = json_decode($this->request->getPost('single_multi_centre_contact_emails_json') ?? '[]', true) ?: [];
                        $smPhones  = json_decode($this->request->getPost('single_multi_centre_contact_phones_json') ?? '[]', true) ?: [];

                        foreach ($smDates as $di => $dateVal) {
                            if ($dateVal === '') continue;
                            $converted = $convertDate($dateVal);
                            if (!$converted) continue;

                            $db->table('application_date_mapping')->insert([
                                'app_id'    => $appId,
                                'exam_name' => $singleExamName,
                                'exam_date' => $converted . ' 00:00:00',
                            ]);

                            $cNames   = $smNames[$di]   ?? [];
                            $cCoords  = $smCoords[$di]  ?? [];
                            $cStates  = $smStates[$di]  ?? [];
                            $cDists   = $smDists[$di]   ?? [];
                            $cAddrs   = $smAddrs[$di]   ?? [];
                            $cPersons = $smPersons[$di] ?? [];
                            $cEmails  = $smEmails[$di]  ?? [];
                            $cPhones  = $smPhones[$di]  ?? [];

                            foreach ($cNames as $i => $cName) {
                                $cName = trim((string) $cName);
                                if ($cName === '') continue;

                                $person = trim((string) ($cPersons[$i] ?? ''));
                                $email  = trim((string) ($cEmails[$i]  ?? ''));
                                $phone  = trim((string) ($cPhones[$i]  ?? ''));

                                $db->table('application_centre_mapping')->insert([
                                    'app_id'                => $appId,
                                    'district'              => (string) ((int) ($cDists[$i]  ?? 0)),
                                    'state'                 => (string) ((int) ($cStates[$i] ?? 0)),
                                    'centre_name'           => $cName,
                                    'centre_address'        => trim((string) ($cAddrs[$i]  ?? '')),
                                    'centre_coordinates'    => trim((string) ($cCoords[$i] ?? '')),
                                    'coorrdinator_name'     => substr($person, 0, 500),
                                    'coordinator_mobile_no' => substr($phone, 0, 15),
                                    'coordinator_email'     => substr($email, 0, 255),
                                ]);
                            }
                        }
                    }
                }
                // ============================================================
                // 3) MULTIPLE EXAM
                // ============================================================
                else {
                    $mExamNames     = json_decode($this->request->getPost('multiple_exam_names_json') ?? '[]', true) ?: [];
                    $mExamDateTypes = json_decode($this->request->getPost('multiple_exam_date_types_json') ?? '[]', true) ?: [];
                    $mDatesSingle   = json_decode($this->request->getPost('multiple_exam_dates_single_json') ?? '[]', true) ?: [];
                    $mDatesMultiple = json_decode($this->request->getPost('multiple_exam_dates_multiple_json') ?? '[]', true) ?: [];
                    $mCentreNames   = json_decode($this->request->getPost('multiple_centre_names_json') ?? '[]', true) ?: [];
                    $mCentreCoords  = json_decode($this->request->getPost('multiple_centre_coordinates_json') ?? '[]', true) ?: [];
                    $mCentreStates  = json_decode($this->request->getPost('multiple_centre_states_json') ?? '[]', true) ?: [];
                    $mCentreDists   = json_decode($this->request->getPost('multiple_centre_districts_json') ?? '[]', true) ?: [];
                    $mCentreAddrs   = json_decode($this->request->getPost('multiple_centre_addresses_json') ?? '[]', true) ?: [];
                    $mCentrePersons = json_decode($this->request->getPost('multiple_centre_contact_persons_json') ?? '[]', true) ?: [];
                    $mCentreEmails  = json_decode($this->request->getPost('multiple_centre_contact_emails_json') ?? '[]', true) ?: [];
                    $mCentrePhones  = json_decode($this->request->getPost('multiple_centre_contact_phones_json') ?? '[]', true) ?: [];

                    foreach ($mExamNames as $ei => $examName) {
                        $examName = trim((string) $examName);
                        if ($examName === '') continue;

                        $dateType = $mExamDateTypes[$ei] ?? 'single';

                        if ($dateType === 'single') {
                            $dVal = trim((string) ($mDatesSingle[$ei] ?? ''));
                            if ($dVal !== '') {
                                $converted = $convertDate($dVal);
                                if ($converted) {
                                    $db->table('application_date_mapping')->insert([
                                        'app_id'    => $appId,
                                        'exam_name' => $examName,
                                        'exam_date' => $converted . ' 00:00:00',
                                    ]);
                                }
                            }
                        } else {
                            $datesArr = $mDatesMultiple[$ei] ?? [];
                            if (is_array($datesArr)) {
                                foreach ($datesArr as $dVal) {
                                    $dVal = trim((string) $dVal);
                                    if ($dVal === '') continue;
                                    $converted = $convertDate($dVal);
                                    if ($converted) {
                                        $db->table('application_date_mapping')->insert([
                                            'app_id'    => $appId,
                                            'exam_name' => $examName,
                                            'exam_date' => $converted . ' 00:00:00',
                                        ]);
                                    }
                                }
                            }
                        }

                        $cNames   = $mCentreNames[$ei]   ?? [];
                        $cCoords  = $mCentreCoords[$ei]  ?? [];
                        $cStates  = $mCentreStates[$ei]  ?? [];
                        $cDists   = $mCentreDists[$ei]   ?? [];
                        $cAddrs   = $mCentreAddrs[$ei]   ?? [];
                        $cPersons = $mCentrePersons[$ei] ?? [];
                        $cEmails  = $mCentreEmails[$ei]  ?? [];
                        $cPhones  = $mCentrePhones[$ei]  ?? [];

                        foreach ($cNames as $i => $cName) {
                            $cName = trim((string) $cName);
                            if ($cName === '') continue;

                            $person = trim((string) ($cPersons[$i] ?? ''));
                            $email  = trim((string) ($cEmails[$i]  ?? ''));
                            $phone  = trim((string) ($cPhones[$i]  ?? ''));

                            $db->table('application_centre_mapping')->insert([
                                'app_id'                => $appId,
                                'district'              => (string) ((int) ($cDists[$i]  ?? 0)),
                                'state'                 => (string) ((int) ($cStates[$i] ?? 0)),
                                'centre_name'           => $cName,
                                'centre_address'        => trim((string) ($cAddrs[$i]  ?? '')),
                                'centre_coordinates'    => trim((string) ($cCoords[$i] ?? '')),
                                'coorrdinator_name'     => substr($person, 0, 500),
                                'coordinator_mobile_no' => substr($phone, 0, 15),
                                'coordinator_email'     => substr($email, 0, 255),
                            ]);
                        }
                    }
                }

                // ============================================================
                // 4) VENDORS
                // ============================================================
                $vendorIds = json_decode($this->request->getPost('vendor_ids_json') ?? '[]', true) ?: [];
                $jammerIds = json_decode($this->request->getPost('jammer_ids_json') ?? '[]', true) ?: [];
                $techFiles = $this->request->getFileMultiple('technical_specifications') ?? [];

                foreach ($vendorIds as $index => $vendorId) {
                    $vendorId = (int) $vendorId;
                    $jammerId = (int) ($jammerIds[$index] ?? 0);
                    if ($vendorId <= 0) continue;

                    $technicalSpecification = '';

                    if (isset($techFiles[$index]) && $techFiles[$index]->isValid() && !$techFiles[$index]->hasMoved()) {
                        $file      = $techFiles[$index];
                        $extension = strtolower($file->getClientExtension());
                        if ($extension !== 'pdf') {
                            continue;
                        }

                        $uploadPath = WRITEPATH . 'uploads/vendor_documents/';
                        if (!is_dir($uploadPath)) {
                            @mkdir($uploadPath, 0775, true);
                        }
                        $newName = $file->getRandomName();
                        $file->move($uploadPath, $newName);
                        $technicalSpecification = $newName;

                        $db->table('application_document_master')->insert([
                            'app_id'        => $appId,
                            'document_type' => 2,
                            'document_name' => $file->getClientName(),
                            'document_path' => 'uploads/vendor_documents/' . $newName,
                        ]);
                    }

                    $db->table('application_vendor_mapping')->insert([
                        'app_id'                   => $appId,
                        'vendor_id'                => $vendorId,
                        'jammer_id'                => $jammerId,
                        'technical_specifications' => $technicalSpecification,
                        'created_at'               => $createdAt,
                        'updated_at'               => $createdAt,
                    ]);
                }

                // ============================================================
                // 5) EXCEL UPLOADS
                // ============================================================
                $excelFiles = [];
                $singleExcel   = $this->request->getFile('single_exam_excel');
                $multipleExcel = $this->request->getFile('multiple_exam_excel');

                if ($singleExcel && $singleExcel->isValid() && !$singleExcel->hasMoved()) {
                    $excelFiles[] = $singleExcel;
                }
                if ($multipleExcel && $multipleExcel->isValid() && !$multipleExcel->hasMoved()) {
                    $excelFiles[] = $multipleExcel;
                }

                foreach ($excelFiles as $excelFile) {
                    $extension = strtolower($excelFile->getClientExtension());
                    if (!in_array($extension, ['xlsx', 'xls', 'csv'], true)) {
                        continue;
                    }

                    $uploadPath = WRITEPATH . 'uploads/examinations_documents/';
                    if (!is_dir($uploadPath)) {
                        @mkdir($uploadPath, 0775, true);
                    }
                    $newName = $excelFile->getRandomName();
                    $excelFile->move($uploadPath, $newName);

                    $db->table('application_document_master')->insert([
                        'app_id'        => $appId,
                        'document_type' => 1,
                        'document_name' => $excelFile->getClientName(),
                        'document_path' => 'uploads/examinations_documents/' . $newName,
                    ]);
                }

                // ============================================================
                // 6) APPLICATION HISTORY (status 15 for draft)
                // ============================================================
                $db->table('application_history')->insert([
                    'app_id'       => $appId,
                    'status'       => 1,
                    'performed_by' => $userId,
                    'remarks'      => $isEditMode ? 'Application draft updated.' : 'Application submitted successfully.',
                    'created_at'   => $createdAt,
                ]);


                $db->table('application_history')->insert([
                    'app_id'       => $appId,
                    'status'       => 15, // DRAFT STATUS
                    'performed_by' => $userId,
                    'remarks'      => $isEditMode ? 'Application draft updated.' : 'Application saved as draft.',
                    'created_at'   => $createdAt,
                ]);

                if ($db->transStatus() === false) {
                    throw new \RuntimeException('Database transaction failed.');
                }

                $db->transCommit();

                $successMsg = $isEditMode
                    ? 'Draft ' . $appNo . ' updated successfully.'
                    : 'Draft ' . $appNo . ' saved successfully.';

                if ($isAjax) {
                    return $this->response->setJSON([
                        'success'      => true,
                        'message'      => $successMsg,
                        'app_no'       => $appNo,
                        'app_id'       => $appId,
                        'redirect_url' => base_url('new-request'),
                    ]);
                }

                return redirect()->to(base_url('new-request'))->with('success', $successMsg);

            } catch (\Throwable $e) {
                $db->transRollback();
                log_message('error', 'saveDraft Error: ' . $e->getMessage());
                log_message('error', 'Stack trace: ' . $e->getTraceAsString());

                if ($isAjax) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Failed to save draft: ' . $e->getMessage(),
                    ]);
                }
                return redirect()->back()->withInput()->with('error', 'Failed to save draft: ' . $e->getMessage());
            }
        }

        /**
         * Get state name by ID using direct database query
         * Table: state (id, state_name, status)
         */
        private function getStateName($stateId)
        {
            if ($stateId <= 0) {
                return '';
            }

            try {
                $db = \Config\Database::connect();
                $result = $db->table('state')
                    ->select('state_name')
                    ->where('id', $stateId)
                    ->where('status', 1)
                    ->get()
                    ->getRow();
                
                return $result ? $result->state_name : '';
            } catch (\Exception $e) {
                log_message('error', 'Error fetching state name: ' . $e->getMessage());
                return '';
            }
        }

        /**
         * Get district/city name by ID using direct database query
         * Table: city (id, state_id, city_name, status)
         */
        private function getDistrictName($districtId)
        {
            if ($districtId <= 0) {
                return '';
            }

            try {
                $db = \Config\Database::connect();
                $result = $db->table('city')
                    ->select('city_name')
                    ->where('id', $districtId)
                    ->where('status', 1)
                    ->get()
                    ->getRow();
                
                return $result ? $result->city_name : '';
            } catch (\Exception $e) {
                log_message('error', 'Error fetching district name: ' . $e->getMessage());
                return '';
            }
        }

        /**
         * Generate application number manually (fallback)
         */
        private function generateApplicationNumber($organizationId)
        {
            $db = \Config\Database::connect();
            $year = date('Y');
            $month = date('m');
            
            try {
                $org = $db->table('mas_organization')->where('id', $organizationId)->get()->getRow();
                $orgCode = $org ? substr(preg_replace('/[^A-Za-z0-9]/', '', $org->org_name), 0, 5) : 'ORG';
            } catch (\Exception $e) {
                $orgCode = 'ORG';
            }
            
            try {
                $count = $db->table('application')
                    ->where('YEAR(created_at)', $year)
                    ->where('MONTH(created_at)', $month)
                    ->countAllResults();
            } catch (\Exception $e) {
                $count = 0;
            }
            
            $sequence = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
            
            return $orgCode . '/' . $year . $month . '/' . $sequence;
        }

        /**
         * Convert date from dd/mm/yyyy to Y-m-d
         */
        private function convertDateToMySQL($date)
        {
            $date = trim((string) $date);
            if (empty($date)) {
                return null;
            }

            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                return $date;
            }

            if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $date, $matches)) {
                $day = $matches[1];
                $month = $matches[2];
                $year = $matches[3];
                
                if (checkdate($month, $day, $year)) {
                    return $year . '-' . $month . '-' . $day;
                }
            }

            try {
                $dateTime = new \DateTime($date);
                return $dateTime->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        /**
         * =========================================================
         * GET STATES - API Endpoint
         * Table: state (id, state_name, status)
         * =========================================================
         */
        public function getStates()
        {
            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(403)
                    ->setJSON([
                        'status'    => false,
                        'message'   => 'Invalid request',
                        'csrf_hash' => csrf_hash()
                    ]);
            }

            try {
                $db = \Config\Database::connect();
                $states = $db->table('state')
                    ->select('id, state_name')
                    ->where('status', 1)
                    ->orderBy('state_name', 'ASC')
                    ->get()
                    ->getResultArray();

                return $this->response->setJSON([
                    'status'    => true,
                    'data'      => $states,
                    'csrf_hash' => csrf_hash()
                ]);

            } catch (\Throwable $e) {
                log_message('error', 'getStates Error: ' . $e->getMessage());

                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'status'    => false,
                        'message'   => 'Unable to load states',
                        'data'      => [],
                        'csrf_hash' => csrf_hash()
                    ]);
            }
        }

        /**
         * =========================================================
         * GET CITIES - API Endpoint
         * Table: city (id, state_id, city_name, status)
         * =========================================================
         */
        public function getCities()
        {
            if (!$this->request->isAJAX()) {
                return $this->response
                    ->setStatusCode(403)
                    ->setJSON([
                        'status'    => false,
                        'message'   => 'Invalid request',
                        'data'      => [],
                        'csrf_hash' => csrf_hash()
                    ]);
            }

            $stateId = $this->request->getPost('state_id');

            if (empty($stateId) || !is_numeric($stateId)) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'status'    => false,
                        'message'   => 'State ID is required',
                        'data'      => [],
                        'csrf_hash' => csrf_hash()
                    ]);
            }

            try {
                $db = \Config\Database::connect();
                $cities = $db->table('city')
                    ->select('id, state_id, city_name')
                    ->where('state_id', (int) $stateId)
                    ->where('status', 1)
                    ->orderBy('city_name', 'ASC')
                    ->get()
                    ->getResultArray();

                return $this->response->setJSON([
                    'status'    => true,
                    'data'      => $cities,
                    'csrf_hash' => csrf_hash()
                ]);

            } catch (\Throwable $e) {
                log_message('error', 'getCities Error: ' . $e->getMessage());

                return $this->response
                    ->setStatusCode(500)
                    ->setJSON([
                        'status'    => false,
                        'message'   => 'Unable to load cities',
                        'data'      => [],
                        'csrf_hash' => csrf_hash()
                    ]);
            }
        }

    /**
     * Get Active Vendors
     */
    public function getVendors()
    {
        $db = \Config\Database::connect();

        $vendors = $db->table('mas_vendor')
            ->select('id, vendor_name')
            ->where('isactive', '1')
            ->orderBy('vendor_name', 'ASC')
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'status'  => true,
            'vendors' => $vendors
        ]);
    }

    /**
     * Get Jammer Models by Vendor
     */
    public function getJammerModelsByVendor()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => false,
                'message' => 'Invalid request'
            ]);
        }

        $vendorId = $this->request->getPost('vendor_id');

        if (empty($vendorId)) {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => false,
                'message' => 'Vendor ID is required'
            ]);
        }

        $db = \Config\Database::connect();

        $models = $db->table('mas_model')
            ->select('id, name')
            ->where('vendor_id', $vendorId)
            ->where('isactive', 1)
            ->orderBy('name', 'ASC')
            ->get()
            ->getResultArray();

        return $this->response->setJSON([
            'status'    => true,
            'models'    => $models,
            'csrf_hash' => csrf_hash()
        ]);
    }


    /**
 * =========================================================
 * VIEW DOCUMENT - AUTHENTICATED USER ONLY
 * =========================================================
 */
public function viewDocument($documentId)
{
    $db = \Config\Database::connect();

    $userId = session()->get('user_id');

    // Login check
    if (!$userId) {
        return redirect()->to('/login');
    }

    // Document + application ownership check
    $document = $db->table('application_document_master dm')
        ->select('dm.*, a.user_id')
        ->join('application a', 'a.id = dm.app_id')
        ->where('dm.id', $documentId)
        ->where('a.user_id', $userId)
        ->get()
        ->getRow();

    if (!$document) {
        return redirect()->to('/dashboard')
            ->with('error', 'Document not found or access denied.');
    }

    $filePath = WRITEPATH . $document->document_path;

    if (!is_file($filePath)) {
        return redirect()->to('/dashboard')
            ->with('error', 'Document file not found.');
    }

    return $this->response
        ->setHeader('Content-Type', 'application/pdf')
        ->setHeader(
            'Content-Disposition',
            'inline; filename="' . basename($document->document_name) . '"'
        )
        ->setHeader('X-Content-Type-Options', 'nosniff')
        ->setBody(file_get_contents($filePath));
}


/**
 * =========================================================
 * DOWNLOAD DOCUMENT - AUTHENTICATED USER ONLY
 * =========================================================
 */
public function downloadDocument($documentId)
{
    $db = \Config\Database::connect();

    $userId = session()->get('user_id');

    // Login check
    if (!$userId) {
        return redirect()->to('/login');
    }

    // Document + application ownership check
    $document = $db->table('application_document_master dm')
        ->select('dm.*, a.user_id')
        ->join('application a', 'a.id = dm.app_id')
        ->where('dm.id', $documentId)
        ->where('a.user_id', $userId)
        ->get()
        ->getRow();

    if (!$document) {
        return redirect()->to('/dashboard')
            ->with('error', 'Document not found or access denied.');
    }

    $filePath = WRITEPATH . $document->document_path;

    if (!is_file($filePath)) {
        return redirect()->to('/dashboard')
            ->with('error', 'Document file not found.');
    }

    return $this->response->download(
        $filePath,
        null
    );
}


// ============================================================
// EDIT REQUEST — Load form with existing data
// ============================================================
public function editRequest($appId = null)
{
    $appId = (int) $appId;

    log_message('error', '=== EDIT REQUEST DEBUG START ===');
    log_message('error', 'appId: ' . $appId);
    log_message('error', 'userId: ' . session()->get('user_id'));

    if ($appId <= 0) {
        return redirect()->to(base_url('request-view'))->with('error', 'Invalid application.');
    }

    $db     = \Config\Database::connect();
    $userId = (int) session()->get('user_id');

    if ($userId <= 0) {
        return redirect()->to(base_url('login'))->with('error', 'Session expired.');
    }

    $application = $db->table('application')
        ->where('id', $appId)
        ->where('user_id', $userId)
        ->get()->getRow();

    if (!$application) {
        log_message('error', 'FAILED: app not found for user_id=' . $userId . ', app_id=' . $appId);
        return redirect()->to(base_url('request-view'))->with('error', 'Application not found or access denied.');
    }

    log_message('error', 'App found. current_status=' . $application->current_status);

    $editableStatuses = [1, 2, 3];
    if (!in_array((int)$application->current_status, $editableStatuses, true)) {
        return redirect()->to(base_url('request-view'))->with('error', 'This application cannot be edited at this stage.');
    }

    // ---------- MASTER DATA ----------
    $organizations      = $db->table('mas_organization')->orderBy('org_name', 'ASC')->get()->getResultArray();
    $organization_types = $db->table('mas_organization_type')->orderBy('name', 'ASC')->get()->getResultArray();

    $organization_id = 0;
    $org_type        = 0;
    foreach ($organizations as $o) {
        if ($o['org_name'] === $application->organisation) {
            $organization_id = (int)$o['id'];
            $org_type        = (int)$o['org_type'];
            break;
        }
    }

    // ---------- DATES ----------
    $existingDates = $db->table('application_date_mapping')
        ->where('app_id', $appId)
        ->orderBy('exam_date', 'ASC')
        ->get()->getResultArray();

    // ---------- CENTRES ----------
    $existingCentres = $db->table('application_centre_mapping')
        ->where('app_id', $appId)
        ->orderBy('id', 'ASC')   // insertion order = form order
        ->get()->getResultArray();

    // ---------- GROUP CENTRES UNDER DATES (no DB change) ----------
    $totalDates   = count($existingDates);
    $totalCentres = count($existingCentres);

    if ($totalDates > 0) {
        if ($totalDates === 1) {
            $existingDates[0]['centres'] = $existingCentres;
        } else {
            $perDate = (int) ceil($totalCentres / $totalDates);
            $chunks  = array_chunk($existingCentres, max(1, $perDate));

            foreach ($existingDates as $i => $d) {
                $existingDates[$i]['centres'] = $chunks[$i] ?? [];
            }
        }
    }

    // ---------- VENDORS + PDF INFO ----------
    $existingVendors = $db->table('application_vendor_mapping')
        ->where('app_id', $appId)->get()->getResultArray();

    $vendorDocs = $db->table('application_document_master')
        ->where('app_id', $appId)
        ->where('document_type', 2)
        ->orderBy('id', 'ASC')
        ->get()->getResultArray();

    foreach ($existingVendors as $i => $v) {
        $techFile = trim((string)($v['technical_specifications'] ?? ''));

        if ($techFile !== '') {
            $found = false;
            foreach ($vendorDocs as $doc) {
                if (strpos($doc['document_path'], $techFile) !== false) {
                    $existingVendors[$i]['existing_pdf_name'] = $doc['document_name'];
                    $existingVendors[$i]['existing_pdf_path'] = $doc['document_path'];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $existingVendors[$i]['existing_pdf_name'] = $techFile;
                $existingVendors[$i]['existing_pdf_path'] = 'uploads/vendor_documents/' . $techFile;
            }
        }
    }

    // ---------- EXCEL / VENDOR DOCS ----------
    $existingDocs = $db->table('application_document_master')
        ->where('app_id', $appId)->get()->getResultArray();

    $excelDocs     = [];
    $vendorDocList = [];
    foreach ($existingDocs as $doc) {
        if ((int)$doc['document_type'] === 1) $excelDocs[]     = $doc;
        if ((int)$doc['document_type'] === 2) $vendorDocList[] = $doc;
    }

    $editData = [
        'app_id'            => $appId,
        'app_no'            => $application->app_no,
        'application'       => $application,
        'organization_id'   => $organization_id,
        'org_type'          => $org_type,
        'is_single_exam'    => (int)$application->is_single_exam,
        'existing_dates'    => $existingDates,   // ✅ each date has ['centres']
        'existing_centres'  => $existingCentres,
        'existing_vendors'  => $existingVendors,
        'excel_documents'   => $excelDocs,
        'vendor_documents'  => $vendorDocList,
        'declarations'      => [
            'security'         => (int)$application->adequate_arrangement_check,
            'accountability'   => (int)$application->jammer_accounted,
            'non_interference' => (int)$application->non_intereference,
        ],
        'centre_list_ready' => (int)$application->centre_list_ready,
    ];

    log_message('error', 'Rendering view. Dates=' . count($existingDates) . ', Centres=' . count($existingCentres) . ', Vendors=' . count($existingVendors));

    return view('pages/new-request', [
        'organizations'      => $organizations,
        'organization_types' => $organization_types,
        'organization_id'    => $organization_id,
        'org_type'           => $org_type,
        'editData'           => $editData,
        'isEditMode'         => true,
    ]);
}

// ============================================================
// UPDATE REQUEST
// ============================================================
public function updateRequest($appId = null)
{
    $isAjax = $this->request->isAJAX();
    $appId  = (int) $appId;

    if (strtolower($this->request->getMethod()) !== 'post') {
        return $isAjax
            ? $this->response->setJSON(['success' => false, 'message' => 'Invalid request method.'])
            : redirect()->back()->with('error', 'Invalid request method.');
    }

    $db     = \Config\Database::connect();
    $userId = (int) session()->get('user_id');

    if ($userId <= 0) {
        return $isAjax
            ? $this->response->setJSON(['success' => false, 'message' => 'Session expired.'])
            : redirect()->back()->withInput()->with('error', 'Session expired.');
    }

    $application = $db->table('application')
        ->where('id', $appId)->where('user_id', $userId)->get()->getRow();

    if (!$application) {
        return $isAjax
            ? $this->response->setJSON(['success' => false, 'message' => 'Application not found.'])
            : redirect()->back()->with('error', 'Application not found.');
    }

    // ORG
    $organizationId       = (int) $this->request->getPost('organization_id');
    $orgType              = (int) $this->request->getPost('org_type');
    $organisationName     = trim((string) $this->request->getPost('organisation_name'));
    $organisationTypeName = trim((string) $this->request->getPost('organisation_type_name'));

    if ($organizationId <= 0 && $organisationName !== '') {
        $org = $db->table('mas_organization')->where('org_name', $organisationName)->get()->getRow();
        if ($org) {
            $organizationId = (int)$org->id;
            if ($orgType <= 0 && isset($org->org_type)) $orgType = (int)$org->org_type;
        }
    }

    $orgName     = $organisationName;
    $orgTypeName = $organisationTypeName;

    if ($organizationId > 0 && $orgName === '') {
        $orgResult = $db->table('mas_organization')->where('id', $organizationId)->get()->getRow();
        if ($orgResult) {
            $orgName = $orgResult->org_name;
            if ($orgType <= 0 && isset($orgResult->org_type)) $orgType = (int)$orgResult->org_type;
        }
    }
    if ($orgType > 0 && $orgTypeName === '') {
        $typeResult = $db->table('mas_organization_type')->where('id', $orgType)->get()->getRow();
        if ($typeResult) $orgTypeName = $typeResult->name;
    }

    // DECLARATIONS
    $declarationsJson = $this->request->getPost('declarations_json');
    $declarations = $declarationsJson
        ? (json_decode($declarationsJson, true) ?? [])
        : ($this->request->getPost('declarations') ?? []);
    if (!is_array($declarations)) $declarations = [];

    $adequateArrangement = in_array('security', $declarations, true) ? 1 : 0;
    $jammerAccounted     = in_array('accountability', $declarations, true) ? 1 : 0;
    $nonInterference     = in_array('non_interference', $declarations, true) ? 1 : 0;

    $jsonError = function ($message) use ($isAjax) {
        return $isAjax
            ? $this->response->setJSON(['success' => false, 'message' => $message])
            : redirect()->back()->withInput()->with('error', $message);
    };

    if ($organizationId <= 0 && $orgName === '') return $jsonError('Please select a valid organisation.');
    if ($orgType <= 0 && $orgTypeName === '')     return $jsonError('Please select a valid organisation type.');
    if (count($declarations) < 3)                 return $jsonError('Please accept all declarations.');

    $singleExam   = $this->request->getPost('single_exam');
    $isSingleExam = ($singleExam === 'yes') ? 1 : 0;
    $updatedAt    = date('Y-m-d H:i:s');

    // CENTRE NOT AVAILABLE
    $isSingleCentreNotAvailable   = 0;
    $isMultipleCentreNotAvailable = 0;

    if ($this->request->getPost('single_centre_not_available') == '1') {
        $isSingleCentreNotAvailable = 1;
    }

    $multipleCentreNotAvailable = $this->request->getPost('multiple_centre_not_available');
    if (!empty($multipleCentreNotAvailable) && is_array($multipleCentreNotAvailable)) {
        foreach ($multipleCentreNotAvailable as $examCentres) {
            if (is_array($examCentres)) {
                foreach ($examCentres as $val) {
                    if ($val === 'on' || $val === '1' || $val === true) {
                        $isMultipleCentreNotAvailable = 1;
                        break 2;
                    }
                }
            }
        }
    }

    $centreListReady = ($isSingleCentreNotAvailable || $isMultipleCentreNotAvailable) ? 0 : 1;
    $undertaking     = ($centreListReady == 0) ? 1 : '';

    // DATE HELPER
    $convertDate = function ($dateStr) {
        $dateStr = trim((string)$dateStr);
        if ($dateStr === '') return null;
        $dt = \DateTime::createFromFormat('d/m/Y', $dateStr);
        if ($dt) return $dt->format('Y-m-d');
        $ts = strtotime($dateStr);
        return $ts ? date('Y-m-d', $ts) : null;
    };

    // PRESERVE OLD VENDOR PDFS BEFORE DELETE
    $prevVendors = $db->table('application_vendor_mapping')
        ->where('app_id', $appId)->get()->getResultArray();

    $prevVendorSpecs = [];
    foreach ($prevVendors as $pv) {
        $prevVendorSpecs[(int)$pv['vendor_id']] = $pv['technical_specifications'];
    }

    $db->transBegin();

    try {
        // 1) UPDATE application  (no updated_at column in `application`)
        $db->table('application')->where('id', $appId)->update([
            'adequate_arrangement_check' => $adequateArrangement,
            'jammer_accounted'           => $jammerAccounted,
            'non_intereference'          => $nonInterference,
            'organisation'               => $orgName,
            'organisation_type'          => $orgTypeName,
            'is_single_exam'             => $isSingleExam,
            'centre_list_ready'          => $centreListReady,
            'undertaking'                => $undertaking,
        ]);

        // 2) DELETE child records
        $db->table('application_date_mapping')->where('app_id', $appId)->delete();
        $db->table('application_centre_mapping')->where('app_id', $appId)->delete();
        $db->table('application_vendor_mapping')->where('app_id', $appId)->delete();

        // 3) SINGLE EXAM
        if ($isSingleExam === 1) {
            $singleExamName = trim((string)$this->request->getPost('single_exam_name'));
            $dateType       = $this->request->getPost('single_exam_date_type') ?: 'single';

            if ($dateType === 'single') {
                $singleExamDate = $this->request->getPost('single_exam_date');
                if ($singleExamName !== '' && $singleExamDate !== '') {
                    $converted = $convertDate($singleExamDate);
                    if (!$converted) throw new \RuntimeException('Invalid examination date.');
                    $db->table('application_date_mapping')->insert([
                        'app_id'    => $appId,
                        'exam_name' => $singleExamName,
                        'exam_date' => $converted . ' 00:00:00',
                    ]);
                }

                $centreNames  = json_decode($this->request->getPost('single_centre_names_json') ?? '[]', true) ?: [];
                $centreCoords = json_decode($this->request->getPost('single_centre_coordinates_json') ?? '[]', true) ?: [];
                $centreStates = json_decode($this->request->getPost('single_centre_states_json') ?? '[]', true) ?: [];
                $centreDists  = json_decode($this->request->getPost('single_centre_districts_json') ?? '[]', true) ?: [];
                $centreAddrs  = json_decode($this->request->getPost('single_centre_addresses_json') ?? '[]', true) ?: [];
                $centrePersons= json_decode($this->request->getPost('single_centre_contact_persons_json') ?? '[]', true) ?: [];
                $centreEmails = json_decode($this->request->getPost('single_centre_contact_emails_json') ?? '[]', true) ?: [];
                $centrePhones = json_decode($this->request->getPost('single_centre_contact_phones_json') ?? '[]', true) ?: [];

                foreach ($centreNames as $i => $cName) {
                    $cName = trim((string)$cName);
                    if ($cName === '') continue;
                    $db->table('application_centre_mapping')->insert([
                        'app_id'                => $appId,
                        'district'              => (string)((int)($centreDists[$i]  ?? 0)),
                        'state'                 => (string)((int)($centreStates[$i] ?? 0)),
                        'centre_name'           => $cName,
                        'centre_address'        => trim((string)($centreAddrs[$i]   ?? '')),
                        'centre_coordinates'    => trim((string)($centreCoords[$i]  ?? '')),
                        'coorrdinator_name'     => substr(trim((string)($centrePersons[$i] ?? '')), 0, 500),
                        'coordinator_mobile_no' => substr(trim((string)($centrePhones[$i]  ?? '')), 0, 15),
                        'coordinator_email'     => substr(trim((string)($centreEmails[$i]  ?? '')), 0, 255),
                    ]);
                }
            } else {
                $smDates   = json_decode($this->request->getPost('single_multi_exam_dates_json') ?? '[]', true) ?: [];
                $smNames   = json_decode($this->request->getPost('single_multi_centre_names_json') ?? '[]', true) ?: [];
                $smCoords  = json_decode($this->request->getPost('single_multi_centre_coordinates_json') ?? '[]', true) ?: [];
                $smStates  = json_decode($this->request->getPost('single_multi_centre_states_json') ?? '[]', true) ?: [];
                $smDists   = json_decode($this->request->getPost('single_multi_centre_districts_json') ?? '[]', true) ?: [];
                $smAddrs   = json_decode($this->request->getPost('single_multi_centre_addresses_json') ?? '[]', true) ?: [];
                $smPersons = json_decode($this->request->getPost('single_multi_centre_contact_persons_json') ?? '[]', true) ?: [];
                $smEmails  = json_decode($this->request->getPost('single_multi_centre_contact_emails_json') ?? '[]', true) ?: [];
                $smPhones  = json_decode($this->request->getPost('single_multi_centre_contact_phones_json') ?? '[]', true) ?: [];

                foreach ($smDates as $di => $dateVal) {
                    if ($dateVal === '') continue;
                    $converted = $convertDate($dateVal);
                    if (!$converted) throw new \RuntimeException('Invalid examination date.');

                    $db->table('application_date_mapping')->insert([
                        'app_id'    => $appId,
                        'exam_name' => $singleExamName,
                        'exam_date' => $converted . ' 00:00:00',
                    ]);

                    $cNames   = $smNames[$di]   ?? [];
                    $cCoords  = $smCoords[$di]  ?? [];
                    $cStates  = $smStates[$di]  ?? [];
                    $cDists   = $smDists[$di]   ?? [];
                    $cAddrs   = $smAddrs[$di]   ?? [];
                    $cPersons = $smPersons[$di] ?? [];
                    $cEmails  = $smEmails[$di]  ?? [];
                    $cPhones  = $smPhones[$di]  ?? [];

                    foreach ($cNames as $i => $cName) {
                        $cName = trim((string)$cName);
                        if ($cName === '') continue;
                        $db->table('application_centre_mapping')->insert([
                            'app_id'                => $appId,
                            'district'              => (string)((int)($cDists[$i]  ?? 0)),
                            'state'                 => (string)((int)($cStates[$i] ?? 0)),
                            'centre_name'           => $cName,
                            'centre_address'        => trim((string)($cAddrs[$i]   ?? '')),
                            'centre_coordinates'    => trim((string)($cCoords[$i]  ?? '')),
                            'coorrdinator_name'     => substr(trim((string)($cPersons[$i] ?? '')), 0, 500),
                            'coordinator_mobile_no' => substr(trim((string)($cPhones[$i]  ?? '')), 0, 15),
                            'coordinator_email'     => substr(trim((string)($cEmails[$i]  ?? '')), 0, 255),
                        ]);
                    }
                }
            }
        }
        // 4) MULTIPLE EXAM
        else {
            $mExamNames     = json_decode($this->request->getPost('multiple_exam_names_json') ?? '[]', true) ?: [];
            $mExamDateTypes = json_decode($this->request->getPost('multiple_exam_date_types_json') ?? '[]', true) ?: [];
            $mDatesSingle   = json_decode($this->request->getPost('multiple_exam_dates_single_json') ?? '[]', true) ?: [];
            $mDatesMultiple = json_decode($this->request->getPost('multiple_exam_dates_multiple_json') ?? '[]', true) ?: [];
            $mCentreNames   = json_decode($this->request->getPost('multiple_centre_names_json') ?? '[]', true) ?: [];
            $mCentreCoords  = json_decode($this->request->getPost('multiple_centre_coordinates_json') ?? '[]', true) ?: [];
            $mCentreStates  = json_decode($this->request->getPost('multiple_centre_states_json') ?? '[]', true) ?: [];
            $mCentreDists   = json_decode($this->request->getPost('multiple_centre_districts_json') ?? '[]', true) ?: [];
            $mCentreAddrs   = json_decode($this->request->getPost('multiple_centre_addresses_json') ?? '[]', true) ?: [];
            $mCentrePersons = json_decode($this->request->getPost('multiple_centre_contact_persons_json') ?? '[]', true) ?: [];
            $mCentreEmails  = json_decode($this->request->getPost('multiple_centre_contact_emails_json') ?? '[]', true) ?: [];
            $mCentrePhones  = json_decode($this->request->getPost('multiple_centre_contact_phones_json') ?? '[]', true) ?: [];

            foreach ($mExamNames as $ei => $examName) {
                $examName = trim((string)$examName);
                if ($examName === '') continue;
                $dateType = $mExamDateTypes[$ei] ?? 'single';

                if ($dateType === 'single') {
                    $dVal = trim((string)($mDatesSingle[$ei] ?? ''));
                    if ($dVal !== '') {
                        $converted = $convertDate($dVal);
                        if ($converted) {
                            $db->table('application_date_mapping')->insert([
                                'app_id'    => $appId,
                                'exam_name' => $examName,
                                'exam_date' => $converted . ' 00:00:00',
                            ]);
                        }
                    }

                    $cNames   = $mCentreNames[$ei]   ?? [];
                    $cCoords  = $mCentreCoords[$ei]  ?? [];
                    $cStates  = $mCentreStates[$ei]  ?? [];
                    $cDists   = $mCentreDists[$ei]   ?? [];
                    $cAddrs   = $mCentreAddrs[$ei]   ?? [];
                    $cPersons = $mCentrePersons[$ei] ?? [];
                    $cEmails  = $mCentreEmails[$ei]  ?? [];
                    $cPhones  = $mCentrePhones[$ei]  ?? [];

                    foreach ($cNames as $i => $cName) {
                        $cName = trim((string)$cName);
                        if ($cName === '') continue;
                        $db->table('application_centre_mapping')->insert([
                            'app_id'                => $appId,
                            'district'              => (string)((int)($cDists[$i]  ?? 0)),
                            'state'                 => (string)((int)($cStates[$i] ?? 0)),
                            'centre_name'           => $cName,
                            'centre_address'        => trim((string)($cAddrs[$i]   ?? '')),
                            'centre_coordinates'    => trim((string)($cCoords[$i]  ?? '')),
                            'coorrdinator_name'     => substr(trim((string)($cPersons[$i] ?? '')), 0, 500),
                            'coordinator_mobile_no' => substr(trim((string)($cPhones[$i]  ?? '')), 0, 15),
                            'coordinator_email'     => substr(trim((string)($cEmails[$i]  ?? '')), 0, 255),
                        ]);
                    }
                } else {
                    $datesArr = $mDatesMultiple[$ei] ?? [];
                    $cNames   = $mCentreNames[$ei]   ?? [];
                    $cCoords  = $mCentreCoords[$ei]  ?? [];
                    $cStates  = $mCentreStates[$ei]  ?? [];
                    $cDists   = $mCentreDists[$ei]   ?? [];
                    $cAddrs   = $mCentreAddrs[$ei]   ?? [];
                    $cPersons = $mCentrePersons[$ei] ?? [];
                    $cEmails  = $mCentreEmails[$ei]  ?? [];
                    $cPhones  = $mCentrePhones[$ei]  ?? [];

                    if (is_array($datesArr)) {
                        foreach ($datesArr as $di => $dVal) {
                            $dVal = trim((string)$dVal);
                            if ($dVal === '') continue;
                            $converted = $convertDate($dVal);
                            if (!$converted) continue;

                            $db->table('application_date_mapping')->insert([
                                'app_id'    => $appId,
                                'exam_name' => $examName,
                                'exam_date' => $converted . ' 00:00:00',
                            ]);

                            // centres for this date (if nested array exists)
                            $nestedNames   = isset($cNames[$di])   && is_array($cNames[$di])   ? $cNames[$di]   : [];
                            $nestedCoords  = isset($cCoords[$di])  && is_array($cCoords[$di])  ? $cCoords[$di]  : [];
                            $nestedStates  = isset($cStates[$di])  && is_array($cStates[$di])  ? $cStates[$di]  : [];
                            $nestedDists   = isset($cDists[$di])   && is_array($cDists[$di])   ? $cDists[$di]   : [];
                            $nestedAddrs   = isset($cAddrs[$di])   && is_array($cAddrs[$di])   ? $cAddrs[$di]   : [];
                            $nestedPersons = isset($cPersons[$di]) && is_array($cPersons[$di]) ? $cPersons[$di] : [];
                            $nestedEmails  = isset($cEmails[$di])  && is_array($cEmails[$di])  ? $cEmails[$di]  : [];
                            $nestedPhones  = isset($cPhones[$di])  && is_array($cPhones[$di])  ? $cPhones[$di]  : [];

                            foreach ($nestedNames as $ci => $cName) {
                                $cName = trim((string)$cName);
                                if ($cName === '') continue;
                                $db->table('application_centre_mapping')->insert([
                                    'app_id'                => $appId,
                                    'district'              => (string)((int)($nestedDists[$ci]  ?? 0)),
                                    'state'                 => (string)((int)($nestedStates[$ci] ?? 0)),
                                    'centre_name'           => $cName,
                                    'centre_address'        => trim((string)($nestedAddrs[$ci]   ?? '')),
                                    'centre_coordinates'    => trim((string)($nestedCoords[$ci]  ?? '')),
                                    'coorrdinator_name'     => substr(trim((string)($nestedPersons[$ci] ?? '')), 0, 500),
                                    'coordinator_mobile_no' => substr(trim((string)($nestedPhones[$ci]  ?? '')), 0, 15),
                                    'coordinator_email'     => substr(trim((string)($nestedEmails[$ci]  ?? '')), 0, 255),
                                ]);
                            }
                        }
                    } else {
                        // flat centres
                        foreach ($cNames as $i => $cName) {
                            $cName = trim((string)$cName);
                            if ($cName === '') continue;
                            $db->table('application_centre_mapping')->insert([
                                'app_id'                => $appId,
                                'district'              => (string)((int)($cDists[$i]  ?? 0)),
                                'state'                 => (string)((int)($cStates[$i] ?? 0)),
                                'centre_name'           => $cName,
                                'centre_address'        => trim((string)($cAddrs[$i]   ?? '')),
                                'centre_coordinates'    => trim((string)($cCoords[$i]  ?? '')),
                                'coorrdinator_name'     => substr(trim((string)($cPersons[$i] ?? '')), 0, 500),
                                'coordinator_mobile_no' => substr(trim((string)($cPhones[$i]  ?? '')), 0, 15),
                                'coordinator_email'     => substr(trim((string)($cEmails[$i]  ?? '')), 0, 255),
                            ]);
                        }
                    }
                }
            }
        }

        // 5) VENDORS
        $vendorIds = json_decode($this->request->getPost('vendor_ids_json') ?? '[]', true) ?: [];
        $jammerIds = json_decode($this->request->getPost('jammer_ids_json') ?? '[]', true) ?: [];
        $techFiles = $this->request->getFileMultiple('technical_specifications') ?? [];

        foreach ($vendorIds as $index => $vendorId) {
            $vendorId = (int)$vendorId;
            $jammerId = (int)($jammerIds[$index] ?? 0);
            if ($vendorId <= 0) continue;
            if ($jammerId <= 0) {
                throw new \RuntimeException('Please select a valid jammer model for vendor #' . ($index + 1) . '.');
            }

            $technicalSpecification = $prevVendorSpecs[$vendorId] ?? '';

            if (isset($techFiles[$index]) && $techFiles[$index]->isValid() && !$techFiles[$index]->hasMoved()) {
                $file      = $techFiles[$index];
                $extension = strtolower($file->getClientExtension());
                if ($extension !== 'pdf') {
                    throw new \RuntimeException('Technical specification must be a PDF for vendor #' . ($index + 1) . '.');
                }

                $uploadPath = WRITEPATH . 'uploads/vendor_documents/';
                if (!is_dir($uploadPath)) {
                    if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                        throw new \RuntimeException('Unable to create vendor document upload directory.');
                    }
                }
                $newName = $file->getRandomName();
                $file->move($uploadPath, $newName);
                $technicalSpecification = $newName;

                $db->table('application_document_master')->insert([
                    'app_id'        => $appId,
                    'document_type' => 2,
                    'document_name' => $file->getClientName(),
                    'document_path' => 'uploads/vendor_documents/' . $newName,
                ]);
            }

            $db->table('application_vendor_mapping')->insert([
                'app_id'                   => $appId,
                'vendor_id'                => $vendorId,
                'jammer_id'                => $jammerId,
                'technical_specifications' => $technicalSpecification,
                'created_at'               => $updatedAt,
                'updated_at'               => $updatedAt,
            ]);
        }

        // 6) EXCEL UPLOADS
        $excelFiles = [];
        $singleExcel   = $this->request->getFile('single_exam_excel');
        $multipleExcel = $this->request->getFile('multiple_exam_excel');

        if ($singleExcel && $singleExcel->isValid() && !$singleExcel->hasMoved()) {
            $excelFiles[] = $singleExcel;
        }
        if ($multipleExcel && $multipleExcel->isValid() && !$multipleExcel->hasMoved()) {
            $excelFiles[] = $multipleExcel;
        }

        foreach ($excelFiles as $excelFile) {
            $extension = strtolower($excelFile->getClientExtension());
            if (!in_array($extension, ['xlsx', 'xls', 'csv'], true)) {
                throw new \RuntimeException('Invalid Excel file. Allowed: xlsx, xls, csv');
            }

            $uploadPath = WRITEPATH . 'uploads/examinations_documents/';
            if (!is_dir($uploadPath)) {
                if (!mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
                    throw new \RuntimeException('Unable to create examination document upload directory.');
                }
            }
            $newName = $excelFile->getRandomName();
            $excelFile->move($uploadPath, $newName);

            $db->table('application_document_master')->insert([
                'app_id'        => $appId,
                'document_type' => 1,
                'document_name' => $excelFile->getClientName(),
                'document_path' => 'uploads/examinations_documents/' . $newName,
            ]);
        }

        // 7) HISTORY
        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 1,
            'performed_by' => $userId,
            'remarks'      => 'Application updated successfully.',
            'created_at'   => $updatedAt,
        ]);

        $db->table('application_history')->insert([
            'app_id'       => $appId,
            'status'       => 2,
            'performed_by' => $userId,
            'remarks'      => 'PDF_GENERATED',
            'created_at'   => date('Y-m-d H:i:s'),
        ]);

        if ($db->transStatus() === false) {
            throw new \RuntimeException('Database transaction failed.');
        }

        $db->transCommit();

        if ($isAjax) {
            return $this->response->setJSON([
                'success'      => true,
                'message'      => 'Application ' . $application->app_no . ' updated successfully.',
                'app_no'       => $application->app_no,
                'app_id'       => $appId,
                'redirect_url' => base_url('request-view'),
            ]);
        }

        return redirect()->to(base_url('request-view'))
            ->with('success', 'Application ' . $application->app_no . ' updated successfully.');

    } catch (\Throwable $e) {
        $db->transRollback();
        log_message('error', 'updateRequest Error: ' . $e->getMessage());
        log_message('error', 'Stack trace: ' . $e->getTraceAsString());

        if ($isAjax) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Update failed: ' . $e->getMessage(),
            ]);
        }
        return redirect()->back()->withInput()->with('error', 'Update failed: ' . $e->getMessage());
    }
}

   
}