<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Database\Config;

// PhpSpreadsheet Imports
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CenterListController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = Config::connect();
    }

    /**
     * Upload Page Load
     */
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $currentUserId = (int) session()->get('user_id');

        $builder = $this->db->table('application a');
        $builder->select('
            a.id, 
            a.app_no, 
            a.created_at, 
            a.centre_list_ready,
            u.name as uploaded_by_name, 
            o.org_name as organisation,
            act.name as status_name,
            GROUP_CONCAT(DISTINCT adm.exam_name SEPARATOR "||") as exam_names,
            GROUP_CONCAT(DISTINCT adm.exam_date SEPARATOR "||") as exam_dates
        ');
        $builder->join('user u', 'u.id = a.user_id', 'left');
        $builder->join('mas_organization o', 'o.id = u.organization_id', 'left');
        $builder->join('mas_application_action act', 'act.id = a.current_status', 'left');
        $builder->join('application_date_mapping adm', 'adm.app_id = a.id', 'left');
        $builder->where('a.user_id', $currentUserId);
        $builder->where('a.isactive', 1);
        $builder->groupBy('a.id');
        $builder->orderBy('a.id', 'DESC');

        $data['center_lists'] = $builder->get()->getResultArray();

        return view('pages/center-list-upload', $data);
    }

    /**
     * Standard Excel Format Download
     */
    public function downloadFormat()
    {
        try {
            $spreadsheet = new Spreadsheet();

            $statesList = $this->db->table('state')
                ->select('id, state_name')
                ->orderBy('state_name', 'ASC')
                ->get()->getResultArray();

            $citiesList = $this->db->table('city')
                ->select('city_name')
                ->where('status', 1)
                ->orderBy('city_name', 'ASC')
                ->get()->getResultArray();

            $statesArray = array_column($statesList, 'state_name');
            $citiesArray = array_column($citiesList, 'city_name');

            $lookupSheet = $spreadsheet->createSheet();
            $lookupSheet->setTitle('LookupData');

            $stateRowCount = count($statesArray);
            for ($i = 0; $i < $stateRowCount; $i++) {
                $lookupSheet->setCellValue('A' . ($i + 1), $statesArray[$i]);
            }

            $cityRowCount = count($citiesArray);
            for ($j = 0; $j < $cityRowCount; $j++) {
                $lookupSheet->setCellValue('B' . ($j + 1), $citiesArray[$j]);
            }

            $lookupSheet->setSheetState(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::SHEETSTATE_HIDDEN);

            $spreadsheet->setActiveSheetIndex(0);
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('CenterUploadFormat');

            $headers = [
                'A1' => 'Exam Name*',
                'B1' => 'Exam Date (DD/MM/YYYY)*',
                'C1' => 'Center Name*',
                'D1' => 'Center Address*',
                'E1' => 'District/City*',
                'F1' => 'State*',
                'G1' => 'Coordinator Name*',
                'H1' => 'Coordinator Mobile*',
                'I1' => 'Latitude (Optional)',
                'J1' => 'Longitude (Optional)'
            ];

            foreach ($headers as $cell => $value) {
                $sheet->setCellValue($cell, $value);
                $sheet->getStyle($cell)->getFont()->setBold(true);
                $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF1E4D7B');
                $sheet->getStyle($cell)->getFont()->getColor()->setARGB('FFFFFFFF');
            }

            $stateFormula = '=LookupData!$A$1:$A$' . max($stateRowCount, 1);
            $cityFormula  = '=LookupData!$B$1:$B$' . max($cityRowCount, 1);

            for ($row = 2; $row <= 500; $row++) {
                if (!empty($citiesArray)) {
                    $cityValidation = $sheet->getCell('E' . $row)->getDataValidation();
                    $cityValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                    $cityValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                    $cityValidation->setAllowBlank(true);
                    $cityValidation->setShowDropDown(true);
                    $cityValidation->setFormula1($cityFormula);
                }

                if (!empty($statesArray)) {
                    $stateValidation = $sheet->getCell('F' . $row)->getDataValidation();
                    $stateValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
                    $stateValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_STOP);
                    $stateValidation->setAllowBlank(true);
                    $stateValidation->setShowDropDown(true);
                    $stateValidation->setFormula1($stateFormula);
                }
            }

            $sheet->setCellValue('A2', 'Combined Recruitment Exam 2026');
            $sheet->setCellValue('B2', '15/10/2026');
            $sheet->setCellValue('C2', 'Govt Model Senior Secondary School');
            $sheet->setCellValue('D2', 'Sector 10, Main Road');
            $sheet->setCellValue('E2', $citiesArray[0] ?? 'Central Delhi');
            $sheet->setCellValue('F2', $statesArray[0] ?? 'Delhi');
            $sheet->setCellValue('G2', 'Harsh Singh');
            $sheet->setCellValue('H2', '9876543210');
            $sheet->setCellValue('I2', '28.6139');
            $sheet->setCellValue('J2', '77.2090');

            foreach (range('A', 'J') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            $filename = 'Center_List_Upload_Format.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;

        } catch (\Exception $e) {
            log_message('error', 'Download format error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Format generation failed: ' . $e->getMessage());
        }
    }

    /**
     * Excel File Upload
     */
    public function upload()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized access']);
        }

        $currentUserId = (int) session()->get('user_id');
        $file          = $this->request->getFile('excel_file');
        $appId         = $this->request->getPost('app_id');

        if (empty($appId)) {
            return $this->response->setJSON([
                'success'  => false, 
                'message'  => 'Target Request ID is required for center list upload.', 
                'csrfHash' => csrf_hash()
            ]);
        }

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'success'  => false, 
                'message'  => 'Please upload a valid Excel file.', 
                'csrfHash' => csrf_hash()
            ]);
        }

        $states = $this->db->table('state')->select('id, state_name')->get()->getResultArray();
        $stateMap = [];
        foreach ($states as $s) {
            $stateMap[strtolower(trim($s['state_name']))] = $s['id'];
        }

        $cities = $this->db->table('city')->select('state_id, city_name')->where('status', 1)->get()->getResultArray();
        $cityMap = [];
        foreach ($cities as $c) {
            $cityMap[strtolower(trim($c['city_name']))][] = $c['state_id'];
        }

        try {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet       = $spreadsheet->getActiveSheet();
            $highestRow  = $sheet->getHighestRow();

            $validationErrors = [];

            for ($row = 2; $row <= $highestRow; $row++) {
                $centreName = trim($sheet->getCell('C' . $row)->getValue() ?? '');
                $examName   = trim($sheet->getCell('A' . $row)->getValue() ?? '');
                $district   = trim($sheet->getCell('E' . $row)->getValue() ?? '');
                $state      = trim($sheet->getCell('F' . $row)->getValue() ?? '');

                if (empty($centreName) && empty($examName)) {
                    continue;
                }

                $stateKey = strtolower($state);
                $cityKey  = strtolower($district);

                if (!empty($state) && !isset($stateMap[$stateKey])) {
                    $validationErrors[] = "Row {$row}: Invalid State '{$state}'.";
                    continue;
                }

                if (!empty($district) && !empty($state)) {
                    $selectedStateId = $stateMap[$stateKey] ?? null;
                    $validStateIdsForCity = $cityMap[$cityKey] ?? [];

                    if (!in_array($selectedStateId, $validStateIdsForCity)) {
                        $validationErrors[] = "Row {$row}: District/City '{$district}' does not belong to State '{$state}'.";
                    }
                }
            }

            if (!empty($validationErrors)) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => "Validation Failed:<br>" . implode("<br>", array_slice($validationErrors, 0, 5)) . (count($validationErrors) > 5 ? "<br>...and more." : ""),
                    'csrfHash' => csrf_hash()
                ]);
            }

            $this->db->transStart();

            $this->db->table('application')
                ->where('id', $appId)
                ->update(['centre_list_ready' => 1]);

            $insertedCentersCount = 0;

            for ($row = 2; $row <= $highestRow; $row++) {
                $examName    = trim($sheet->getCell('A' . $row)->getValue() ?? '');
                $examDateRaw = trim($sheet->getCell('B' . $row)->getValue() ?? '');
                $centreName  = trim($sheet->getCell('C' . $row)->getValue() ?? '');
                $address     = trim($sheet->getCell('D' . $row)->getValue() ?? '');
                $district    = trim($sheet->getCell('E' . $row)->getValue() ?? '');
                $state       = trim($sheet->getCell('F' . $row)->getValue() ?? '');
                $coordName   = trim($sheet->getCell('G' . $row)->getValue() ?? '');
                $coordMobile = trim($sheet->getCell('H' . $row)->getValue() ?? '');
                $latitude    = trim($sheet->getCell('I' . $row)->getValue() ?? '');
                $longitude   = trim($sheet->getCell('J' . $row)->getValue() ?? '');

                if (empty($centreName) && empty($examName)) {
                    continue;
                }

                $examDate = null;
                if (!empty($examDateRaw)) {
                    if (is_numeric($examDateRaw)) {
                        $examDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($examDateRaw)->format('Y-m-d');
                    } else {
                        $dateObj = \DateTime::createFromFormat('d/m/Y', $examDateRaw);
                        $examDate = $dateObj ? $dateObj->format('Y-m-d') : date('Y-m-d', strtotime($examDateRaw));
                    }
                }

                $centreCoordinates = null;
                if ($latitude !== '' || $longitude !== '') {
                    $centreCoordinates = $latitude . ',' . $longitude;
                }

                if ($examName && $examDate) {
                    $this->db->table('application_date_mapping')->insert([
                        'app_id'    => $appId,
                        'exam_name' => $examName,
                        'exam_date' => $examDate
                    ]);
                }

                $this->db->table('application_centre_mapping')->insert([
                    'app_id'                => $appId,
                    'centre_name'           => $centreName,
                    'centre_address'        => $address,
                    'state'                 => $state,
                    'district'              => $district,
                    'centre_coordinates'    => $centreCoordinates,
                    'coorrdinator_name'     => $coordName,
                    'coordinator_mobile_no' => $coordMobile
                ]);

                $insertedCentersCount++;
            }

            $this->db->table('application_history')->insert([
                'app_id'       => $appId,
                'status'       => 1,
                'performed_by' => $currentUserId,
                'remarks'      => 'Center list uploaded via Excel batch import.',
                'created_at'   => date('Y-m-d H:i:s')
            ]);

            $this->db->transComplete();

            if ($this->db->transStatus() === FALSE) {
                return $this->response->setJSON([
                    'success'  => false,
                    'message'  => 'Database transaction failed during upload.',
                    'csrfHash' => csrf_hash()
                ]);
            }

            return $this->response->setJSON([
                'success'  => true,
                'message'  => "Successfully imported {$insertedCentersCount} center records!",
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Exception $e) {
            $this->db->transRollback();
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Upload Error: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }
}