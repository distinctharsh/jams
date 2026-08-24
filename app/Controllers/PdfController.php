<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PdfController extends BaseController
{
    public function viewPdf($filename)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please login to view this file.');
        }

        $filePath = WRITEPATH . 'uploads/authorization/' . $filename;

        if (!file_exists($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('PDF Not Found.');
        }

        $mime = mime_content_type($filePath);
        return $this->response
            ->setHeader('Content-Type', $mime)
            ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
            ->setBody(file_get_contents($filePath));
    }
}