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

        // Validate request method
        if (strtolower($this->request->getMethod()) !== 'post') {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid request method.'
                ]);
            }
            return redirect()->back()->with('error', 'Invalid request method.');
        }

        $db = \Config\Database::connect();

        // Get user ID from session
        $userId = (int) session()->get('user_id');
        if ($userId <= 0) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Your session has expired. Please login again.'
                ]);
            }
            return redirect()->back()->withInput()->with('error', 'Your session has expired. Please login again.');
        }

        // Get form data
        $organizationId = (int) $this->request->getPost('organization_id');
        $orgType = (int) $this->request->getPost('org_type');
        
        // If organization_id is not set, try to get it from organisation_name dropdown
        if ($organizationId <= 0) {
            $organisationName = $this->request->getPost('organisation_name');
            if (!empty($organisationName)) {
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
        }

        $contactPerson = trim((string) $this->request->getPost('contact_person'));
        $contactEmail = trim((string) $this->request->getPost('contact_email'));
        $contactPhone = trim((string) $this->request->getPost('contact_phone'));

        // Handle declarations
        $declarationsJson = $this->request->getPost('declarations_json');
        if ($declarationsJson) {
            $declarations = json_decode($declarationsJson, true) ?? [];
        } else {
            $declarations = $this->request->getPost('declarations') ?? [];
        }

        if (!is_array($declarations)) {
            $declarations = [];
        }

        $adequateArrangement = in_array('security', $declarations, true) ? 1 : 0;
        $jammerAccounted = in_array('accountability', $declarations, true) ? 1 : 0;
        $nonInterference = in_array('non_interference', $declarations, true) ? 1 : 0;

        // Error handler
        $jsonError = function ($message) use ($isAjax) {
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => $message
                ]);
            }
            return redirect()->back()->withInput()->with('error', $message);
        };

        // Validation
        if ($organizationId <= 0) {
            return $jsonError('Please select a valid organisation.');
        }

        if ($orgType <= 0) {
            return $jsonError('Please select a valid organisation type.');
        }

        if ($contactPerson === '') {
            return $jsonError('Contact person is required.');
        }

        if ($contactEmail === '' || !filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
            return $jsonError('Please enter a valid email address.');
        }

        if ($contactPhone === '') {
            return $jsonError('Contact phone is required.');
        }

        if (count($declarations) < 3) {
            return $jsonError('Please accept all declarations.');
        }

        // Get exam type
        $singleExam = $this->request->getPost('single_exam');
        $isSingleExam = ($singleExam === 'yes') ? 1 : 0;
        $createdAt = date('Y-m-d H:i:s');

        // ============================================================
        // CHECK CENTRE INFORMATION AVAILABILITY
        // ============================================================
        $isSingleCentreNotAvailable = 0;
        $isMultipleCentreNotAvailable = 0;

        // Check for single exam centre not available checkbox
        $singleCentreNotAvailable = $this->request->getPost('single_centre_not_available');
        if (!empty($singleCentreNotAvailable) && is_array($singleCentreNotAvailable)) {
            foreach ($singleCentreNotAvailable as $value) {
                if ($value === 'on' || $value === '1' || $value === true) {
                    $isSingleCentreNotAvailable = 1;
                    break;
                }
            }
        }

        // Check for multiple exam centre not available checkboxes
        $multipleCentreNotAvailable = $this->request->getPost('multiple_centre_not_available');
        if (!empty($multipleCentreNotAvailable)) {
            foreach ($multipleCentreNotAvailable as $examIndex => $examCentres) {
                if (is_array($examCentres)) {
                    foreach ($examCentres as $centreNotAvailable) {
                        if ($centreNotAvailable === 'on' || $centreNotAvailable === '1' || $centreNotAvailable === true) {
                            $isMultipleCentreNotAvailable = 1;
                            break 2;
                        }
                    }
                }
            }
        }

        // Determine if centre list is ready
        $centreListReady = ($isSingleCentreNotAvailable || $isMultipleCentreNotAvailable) ? 0 : 1;
        $undertaking = ($centreListReady == 0) ? 1 : '';

        // Generate application number
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

        // Get organisation name and type for storing in application table
        $orgName = '';
        $orgTypeName = '';
        
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
        
        try {
            $typeResult = $db->table('mas_organization_type')->where('id', $orgType)->get()->getRow();
            if ($typeResult) {
                $orgTypeName = $typeResult->name;
            }
        } catch (\Exception $e) {
            log_message('error', 'Error fetching organization type: ' . $e->getMessage());
        }

        $db->transBegin();

        try {
            // ============================================================
            // INSERT INTO application table
            // ============================================================
            $applicationData = [
                'app_no' => $appNo,
                'user_id' => $userId,
                'adequate_arrangement_check' => $adequateArrangement,
                'jammer_accounted' => $jammerAccounted,
                'non_intereference' => $nonInterference,
                'created_at' => $createdAt,
                'contact_person' => $contactPerson,
                'email' => $contactEmail,
                'phone' => $contactPhone,
                'organisation' => $orgName,
                'organisation_type' => $orgTypeName,
                'current_status' => 1,
                'isactive' => 1,
                'is_single_exam' => $isSingleExam,
                'is_single_date' => 1,
                'centre_list_ready' => $centreListReady,  // FIXED: Dynamic value
                'undertaking' => $undertaking              // FIXED: Added undertaking field
            ];

            if (!$db->table('application')->insert($applicationData)) {
                throw new \RuntimeException('Failed to create application.');
            }

            $appId = (int) $db->insertID();
            if ($appId <= 0) {
                throw new \RuntimeException('Application ID could not be generated.');
            }

            // ============================================================
            // PROCESS SINGLE EXAM DATA
            // ============================================================
            if ($isSingleExam === 1) {
                $singleExamName = trim((string) $this->request->getPost('single_exam_name'));
                $singleExamDate = trim((string) $this->request->getPost('single_exam_date'));

                // Get centres from JSON or regular POST
                $singleCentreNamesJson = $this->request->getPost('single_centre_names_json');
                if ($singleCentreNamesJson) {
                    $centreNames = json_decode($singleCentreNamesJson, true) ?? [];
                    $centreCoordinates = json_decode($this->request->getPost('single_centre_coordinates_json') ?? '[]', true) ?? [];
                    $centreStates = json_decode($this->request->getPost('single_centre_states_json') ?? '[]', true) ?? [];
                    $centreDistricts = json_decode($this->request->getPost('single_centre_districts_json') ?? '[]', true) ?? [];
                    $centreAddresses = json_decode($this->request->getPost('single_centre_addresses_json') ?? '[]', true) ?? [];
                } else {
                    $centreNames = $this->request->getPost('single_centre_name') ?? [];
                    $centreCoordinates = $this->request->getPost('single_centre_coordinates') ?? [];
                    $centreStates = $this->request->getPost('single_centre_state') ?? [];
                    $centreDistricts = $this->request->getPost('single_centre_district') ?? [];
                    $centreAddresses = $this->request->getPost('single_centre_address') ?? [];
                }

                // Ensure arrays
                if (!is_array($centreNames)) $centreNames = [];
                if (!is_array($centreCoordinates)) $centreCoordinates = [];
                if (!is_array($centreStates)) $centreStates = [];
                if (!is_array($centreDistricts)) $centreDistricts = [];
                if (!is_array($centreAddresses)) $centreAddresses = [];

                // Save exam date
                if ($singleExamName !== '' && $singleExamDate !== '') {
                    $convertedDate = $this->convertDateToMySQL($singleExamDate);
                    if (!$convertedDate) {
                        throw new \RuntimeException('Invalid examination date.');
                    }

                    if (!$db->table('application_date_mapping')->insert([
                        'app_id' => $appId,
                        'exam_date' => $convertedDate,
                        'exam_name' => $singleExamName
                    ])) {
                        throw new \RuntimeException('Failed to save examination date.');
                    }
                }

                // Save centres - STORE STATE AND DISTRICT IDs
                if (!empty($centreNames)) {
                    foreach ($centreNames as $index => $centreName) {
                        $centreName = trim((string) $centreName);
                        if ($centreName === '') {
                            continue;
                        }

                        $stateId = isset($centreStates[$index]) ? (int) $centreStates[$index] : 0;
                        $districtId = isset($centreDistricts[$index]) ? (int) $centreDistricts[$index] : 0;
                        $address = isset($centreAddresses[$index]) ? trim((string) $centreAddresses[$index]) : '';
                        $coordinates = isset($centreCoordinates[$index]) ? trim((string) $centreCoordinates[$index]) : '';

                        // Get state and district names using direct database queries
                        $stateName = $this->getStateName($stateId);
                        $districtName = $this->getDistrictName($districtId);

                        // DEBUG: Log the values
                        log_message('debug', 'SINGLE CENTRE - State ID: ' . $stateId . ', State Name: ' . $stateName);
                        log_message('debug', 'SINGLE CENTRE - District ID: ' . $districtId . ', District Name: ' . $districtName);

                        // STORE THE IDs AS STRINGS (since columns are VARCHAR)
                        $centreData = [
                            'app_id' => $appId,
                            'district' => (string) $districtId,  // Store district ID
                            'state' => (string) $stateId,        // Store state ID
                            'centre_name' => $centreName,
                            'centre_address' => $address,
                            'centre_coordinates' => $coordinates,
                            'coorrdinator_name' => '',
                            'coordinator_mobile_no' => ''
                        ];

                        if (!$db->table('application_centre_mapping')->insert($centreData)) {
                            throw new \RuntimeException('Failed to save centre mapping for centre: ' . $centreName);
                        }
                    }
                }
            } 
            // ============================================================
            // PROCESS MULTIPLE EXAM DATA
            // ============================================================
            else {
                // Get data from JSON or regular POST
                $multipleExamNamesJson = $this->request->getPost('multiple_exam_names_json');
                
                if ($multipleExamNamesJson) {
                    $multipleExamNames = json_decode($multipleExamNamesJson, true) ?? [];
                    $multipleExamDates = json_decode($this->request->getPost('multiple_exam_dates_json') ?? '[]', true) ?? [];
                    $multipleCentreNames = json_decode($this->request->getPost('multiple_centre_names_json') ?? '[]', true) ?? [];
                    $multipleCentreCoordinates = json_decode($this->request->getPost('multiple_centre_coordinates_json') ?? '[]', true) ?? [];
                    $multipleCentreStates = json_decode($this->request->getPost('multiple_centre_states_json') ?? '[]', true) ?? [];
                    $multipleCentreDistricts = json_decode($this->request->getPost('multiple_centre_districts_json') ?? '[]', true) ?? [];
                    $multipleCentreAddresses = json_decode($this->request->getPost('multiple_centre_addresses_json') ?? '[]', true) ?? [];
                } else {
                    $multipleExamNames = $this->request->getPost('multiple_exam_name') ?? [];
                    $multipleExamDates = $this->request->getPost('multiple_exam_date') ?? [];
                    $multipleCentreNames = $this->request->getPost('multiple_centre_name') ?? [];
                    $multipleCentreCoordinates = $this->request->getPost('multiple_centre_coordinates') ?? [];
                    $multipleCentreStates = $this->request->getPost('multiple_centre_state') ?? [];
                    $multipleCentreDistricts = $this->request->getPost('multiple_centre_district') ?? [];
                    $multipleCentreAddresses = $this->request->getPost('multiple_centre_address') ?? [];
                }

                // Ensure arrays
                if (!is_array($multipleExamNames)) $multipleExamNames = [];
                if (!is_array($multipleExamDates)) $multipleExamDates = [];
                if (!is_array($multipleCentreNames)) $multipleCentreNames = [];
                if (!is_array($multipleCentreCoordinates)) $multipleCentreCoordinates = [];
                if (!is_array($multipleCentreStates)) $multipleCentreStates = [];
                if (!is_array($multipleCentreDistricts)) $multipleCentreDistricts = [];
                if (!is_array($multipleCentreAddresses)) $multipleCentreAddresses = [];

                // Process each exam
                foreach ($multipleExamNames as $examIndex => $examName) {
                    $examName = trim((string) $examName);
                    if ($examName === '') {
                        continue;
                    }

                    $examDate = isset($multipleExamDates[$examIndex]) ? trim((string) $multipleExamDates[$examIndex]) : '';
                    
                    if ($examDate !== '') {
                        $convertedDate = $this->convertDateToMySQL($examDate);
                        if (!$convertedDate) {
                            throw new \RuntimeException('Invalid examination date for exam: ' . $examName);
                        }

                        if (!$db->table('application_date_mapping')->insert([
                            'app_id' => $appId,
                            'exam_name' => $examName,
                            'exam_date' => $convertedDate
                        ])) {
                            throw new \RuntimeException('Failed to save examination date for exam: ' . $examName);
                        }
                    }

                    // Get centres for this exam
                    $centreNamesForExam = isset($multipleCentreNames[$examIndex]) ? $multipleCentreNames[$examIndex] : [];
                    $centreCoordsForExam = isset($multipleCentreCoordinates[$examIndex]) ? $multipleCentreCoordinates[$examIndex] : [];
                    $centreStatesForExam = isset($multipleCentreStates[$examIndex]) ? $multipleCentreStates[$examIndex] : [];
                    $centreDistrictsForExam = isset($multipleCentreDistricts[$examIndex]) ? $multipleCentreDistricts[$examIndex] : [];
                    $centreAddressesForExam = isset($multipleCentreAddresses[$examIndex]) ? $multipleCentreAddresses[$examIndex] : [];

                    // Ensure arrays
                    if (!is_array($centreNamesForExam)) $centreNamesForExam = [$centreNamesForExam];
                    if (!is_array($centreCoordsForExam)) $centreCoordsForExam = [$centreCoordsForExam];
                    if (!is_array($centreStatesForExam)) $centreStatesForExam = [$centreStatesForExam];
                    if (!is_array($centreDistrictsForExam)) $centreDistrictsForExam = [$centreDistrictsForExam];
                    if (!is_array($centreAddressesForExam)) $centreAddressesForExam = [$centreAddressesForExam];

                    // Process each centre
                    foreach ($centreNamesForExam as $centreIndex => $centreName) {
                        $centreName = trim((string) $centreName);
                        if ($centreName === '' || $centreName === $examName) {
                            continue;
                        }

                        $stateId = isset($centreStatesForExam[$centreIndex]) ? (int) $centreStatesForExam[$centreIndex] : 0;
                        $districtId = isset($centreDistrictsForExam[$centreIndex]) ? (int) $centreDistrictsForExam[$centreIndex] : 0;
                        $address = isset($centreAddressesForExam[$centreIndex]) ? trim((string) $centreAddressesForExam[$centreIndex]) : '';
                        $coordinates = isset($centreCoordsForExam[$centreIndex]) ? trim((string) $centreCoordsForExam[$centreIndex]) : '';

                        // Get state and district names using direct database queries
                        $stateName = $this->getStateName($stateId);
                        $districtName = $this->getDistrictName($districtId);

                        // DEBUG: Log the values
                        log_message('debug', 'MULTIPLE CENTRE - State ID: ' . $stateId . ', State Name: ' . $stateName);
                        log_message('debug', 'MULTIPLE CENTRE - District ID: ' . $districtId . ', District Name: ' . $districtName);

                        // STORE THE IDs AS STRINGS (since columns are VARCHAR)
                        $centreData = [
                            'app_id' => $appId,
                            'district' => (string) $districtId,  // Store district ID
                            'state' => (string) $stateId,        // Store state ID
                            'centre_name' => $centreName,
                            'centre_address' => $address,
                            'centre_coordinates' => $coordinates,
                            'coorrdinator_name' => '',
                            'coordinator_mobile_no' => ''
                        ];

                        if (!$db->table('application_centre_mapping')->insert($centreData)) {
                            throw new \RuntimeException('Failed to save centre mapping for centre: ' . $centreName);
                        }
                    }
                }
            }

            // ============================================================
            // PROCESS VENDOR DATA
            // ============================================================
            $vendorIdsJson = $this->request->getPost('vendor_ids_json');
            if ($vendorIdsJson) {
                $vendorIds = json_decode($vendorIdsJson, true) ?? [];
                $jammerIds = json_decode($this->request->getPost('jammer_ids_json') ?? '[]', true) ?? [];
            } else {
                $vendorIds = $this->request->getPost('vendor_id') ?? [];
                $jammerIds = $this->request->getPost('jammer_model_ids') ?? [];
            }

            if (!is_array($vendorIds)) {
                $vendorIds = [];
            }
            if (!is_array($jammerIds)) {
                $jammerIds = [];
            }

            // Handle file uploads
            $technicalFiles = $this->request->getFileMultiple('technical_specifications');
            if (!is_array($technicalFiles)) {
                $technicalFiles = [];
            }

            foreach ($vendorIds as $index => $vendorId) {
                $vendorId = (int) $vendorId;
                if ($vendorId <= 0) {
                    continue;
                }

                $jammerId = isset($jammerIds[$index]) ? (int) $jammerIds[$index] : 0;
                if ($jammerId <= 0) {
                    $jammerModelIds = $this->request->getPost('jammer_model_ids');
                    if (is_array($jammerModelIds) && isset($jammerModelIds[$index])) {
                        $jammerId = (int) $jammerModelIds[$index];
                    }
                    if ($jammerId <= 0) {
                        throw new \RuntimeException('Please select a valid jammer model for vendor #' . ($index + 1) . '.');
                    }
                }

                $technicalSpecification = '';

                if (isset($technicalFiles[$index]) && $technicalFiles[$index]->isValid() && !$technicalFiles[$index]->hasMoved()) {
                    $file = $technicalFiles[$index];
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

                    if (!$db->table('application_document_master')->insert([
                        'app_id' => $appId,
                        'document_type' => 2,
                        'document_name' => $file->getClientName(),
                        'document_path' => 'uploads/vendor_documents/' . $newName
                    ])) {
                        throw new \RuntimeException('Failed to save technical specification document.');
                    }
                }

                $vendorMappingData = [
                    'app_id' => $appId,
                    'vendor_id' => $vendorId,
                    'jammer_id' => $jammerId,
                    'technical_specifications' => $technicalSpecification,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt
                ];

                if (!$db->table('application_vendor_mapping')->insert($vendorMappingData)) {
                    throw new \RuntimeException('Failed to save vendor/jammer mapping for vendor #' . ($index + 1) . '.');
                }
            }

            // ============================================================
            // PROCESS EXCEL UPLOADS
            // ============================================================
            $singleExcel = $this->request->getFile('single_exam_excel');
            $multipleExcel = $this->request->getFile('multiple_exam_excel');
            $excelFiles = [];

            if ($singleExcel && $singleExcel->isValid() && !$singleExcel->hasMoved()) {
                $excelFiles[] = $singleExcel;
            }

            if ($multipleExcel && $multipleExcel->isValid() && !$multipleExcel->hasMoved()) {
                $excelFiles[] = $multipleExcel;
            }

            foreach ($excelFiles as $excelFile) {
                $extension = strtolower($excelFile->getClientExtension());
                $allowedExtensions = ['xlsx', 'xls', 'csv'];

                if (!in_array($extension, $allowedExtensions, true)) {
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

                if (!$db->table('application_document_master')->insert([
                    'app_id' => $appId,
                    'document_type' => 1,
                    'document_name' => $excelFile->getClientName(),
                    'document_path' => 'uploads/examinations_documents/' . $newName
                ])) {
                    throw new \RuntimeException('Failed to save examination document.');
                }
            }

            // ============================================================
            // SAVE APPLICATION HISTORY
            // ============================================================
            if (!$db->table('application_history')->insert([
                'app_id'       => $appId,
                'status'       => 1,
                'performed_by' => $userId,
                'remarks'      => 'Application submitted successfully.',
                'created_at'   => $createdAt
            ])) {
                throw new \RuntimeException('Failed to save application submission history.');
            }

            // Save Application History - Status 2
            if (!$db->table('application_history')->insert([
                'app_id'       => $appId,
                'status'       => 2,
                'performed_by' => $userId,
                'remarks'      => 'PDF_GENERATED',
                'created_at'   => date('Y-m-d H:i:s')
            ])) {
                throw new \RuntimeException('Failed to save PDF generated history.');
            }

            if ($db->transStatus() === false) {
                throw new \RuntimeException('Database transaction failed.');
            }

            $db->transCommit();

            // Return success response
            if ($isAjax) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Application ' . $appNo . ' submitted successfully.',
                    'app_no' => $appNo,
                    'app_id' => $appId,
                    'redirect_url' => base_url('request-view')
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
                    'message' => 'Application submission failed: ' . $e->getMessage()
                ]);
            }

            return redirect()->back()->withInput()->with('error', 'Application submission failed: ' . $e->getMessage());
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

    
}