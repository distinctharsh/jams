<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class SettingController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $data['settings'] = $this->settingModel->findAll();
        return view('pages/settings', $data);
    }

    public function getSettings()
    {
        $settings = $this->settingModel->findAll();
        return $this->response->setJSON([
            'success' => true,
            'settings' => $settings,
            'csrfHash' => csrf_hash()
        ]);
    }

    public function getSetting($id = null)
    {
        $setting = $this->settingModel->find($id);
        if ($setting) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $setting,
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Setting not found.',
            'csrfHash' => csrf_hash()
        ]);
    }

    public function saveSetting()
    {
        $id = $this->request->getPost('id');
        $desc = $this->request->getPost('desc');
        $value = $this->request->getPost('value');
        $isactive = $this->request->getPost('isactive') ?? 1;

        $data = [
            'desc' => $desc,
            'value' => $value,
            'isactive' => $isactive
        ];

        if (!empty($id)) {
            $data['id'] = $id;
        }

        if ($this->settingModel->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => !empty($id) ? 'Setting updated successfully!' : 'Setting added successfully!',
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to save setting.',
            'csrfHash' => csrf_hash()
        ]);
    }

    public function deleteSetting($id = null)
    {
        if ($id && $this->settingModel->update($id, ['isactive' => 0])) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Setting deactivated successfully!',
                'csrfHash' => csrf_hash()
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to deactivate setting.',
            'csrfHash' => csrf_hash()
        ]);
    }
}