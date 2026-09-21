<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RequestModel;
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
            return redirect()->to(base_url('/'));
        }

        $currentUserId = (int) session()->get('user_id');
        $applications = $this->db->table('application')
            ->select('id, app_no, contact_person, organisation')
            ->where('user_id', $currentUserId)
            ->get()->getResultArray();

        $data = [
            'user_id'      => $currentUserId,
            'username'     => session()->get('username'),
            'full_name'    => session()->get('full_name'),
            'email'        => session()->get('email'),
            'applications' => $applications ?? []
        ];

        return view('pages/center-list-upload', $data);
    }

    /**
     * Sample Excel Download Logic (Application No Removed)
     */
    public function downloadFormat()
    {
        try {
            $spreadsheet = new Spreadsheet();
            $sheet       = $spreadsheet->getActiveSheet();
            $sheet->setTitle('CenterUploadFormat');

            $headers = [
                'A1' => 'Contact Person Name*',
                'B1' => 'Email*',
                'C1' => 'Phone*',
                'D1' => 'Organisation*',
                'E1' => 'Organisation Type*'
            ];

            foreach ($headers as $cell => $value) {
                $sheet->setCellValue($cell, $value);
                $sheet->getStyle($cell)->getFont()->setBold(true);
                $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF1E4D7B');
                $sheet->getStyle($cell)->getFont()->getColor()->setARGB('FFFFFFFF');
            }

            // Sample Dummy Data
            $sheet->setCellValue('A2', 'Harsh Singh');
            $sheet->setCellValue('B2', 'harsh@example.com');
            $sheet->setCellValue('C2', '9876543210');
            $sheet->setCellValue('D2', 'ABC Education Board');
            $sheet->setCellValue('E2', 'Autonomous');

            foreach (range('A', 'E') as $col) {
                $sheet->getColumnDimension($col)->setAutoSize(true);
            }

            $filename = 'Bulk_Application_Format.xlsx';
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
     * Bulk Excel Upload - Uses $appId from Form/Backend
     */
    public function upload()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized access']);
        }

        $appId = $this->request->getPost('app_id');
        $file  = $this->request->getFile('excel_file');

        if (!$file || !$file->isValid()) {
            return $this->response->setJSON([
                'success'  => false, 
                'message'  => 'Please upload a valid Excel file.', 
                'csrfHash' => csrf_hash()
            ]);
        }

        try {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheet       = $spreadsheet->getActiveSheet();
            $highestRow  = $sheet->getHighestRow();

            $updatedCount = 0;

            for ($row = 2; $row <= $highestRow; $row++) {
                $contactName  = trim($sheet->getCell('A' . $row)->getValue() ?? '');
                $email        = trim($sheet->getCell('B' . $row)->getValue() ?? '');
                $phone        = trim($sheet->getCell('C' . $row)->getValue() ?? '');
                $organisation = trim($sheet->getCell('D' . $row)->getValue() ?? '');
                $orgType      = trim($sheet->getCell('E' . $row)->getValue() ?? '');

                if (empty($contactName) && empty($email)) {
                    continue;
                }

                $updateData = [
                    'contact_person'    => $contactName,
                    'email'             => $email,
                    'phone'             => $phone,
                    'organisation'      => $organisation,
                    'organisation_type' => $orgType,
                ];

                if ($appId) {
                    $this->db->table('application')
                        ->where('id', $appId)
                        ->update($updateData);
                } else {
                    $currentUserId = (int) session()->get('user_id');
                    $this->db->table('application')
                        ->where('user_id', $currentUserId)
                        ->update($updateData);
                }

                $updatedCount++;
            }

            return $this->response->setJSON([
                'success'  => true,
                'message'  => "Data successfully updated for {$updatedCount} record(s)!",
                'csrfHash' => csrf_hash()
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success'  => false,
                'message'  => 'Upload error: ' . $e->getMessage(),
                'csrfHash' => csrf_hash()
            ]);
        }
    }
}