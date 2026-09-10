<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\UserModel;

class SettingController extends BaseController
{
    protected $settingModel;
    protected $userModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $settings = $this->settingModel->findAll();
        $users = $this->userModel->where('isactive', 1)->findAll(); 
        $userMap = [];
        foreach ($users as $u) {
            $userMap[$u['id']] = $u['name'];
        }

        foreach ($settings as &$setting) {
            if (in_array((string)$setting['id'], ['2', '3']) || 
                in_array(trim(strtolower($setting['desc'])), ['default application landing user', 'permission letter generation'])) {
                $setting['display_value'] = $userMap[$setting['value']] ?? $setting['value'];
            } else {
                $setting['display_value'] = $setting['value'];
            }
        }

        $data['settings'] = $settings;
        $data['users'] = $users;

        return view('pages/settings', $data);
    }

    public function getSettings()
    {
        $settings = $this->settingModel->findAll();
        $users = $this->userModel->where('isactive', 1)->findAll();

        $userMap = [];
        foreach ($users as $u) {
            $userMap[$u['id']] = $u['name'];
        }

        foreach ($settings as &$setting) {
            if (in_array((string)$setting['id'], ['2', '3']) || 
                in_array(trim(strtolower($setting['desc'])), ['default application landing user', 'permission letter generation'])) {
                $setting['display_value'] = $userMap[$setting['value']] ?? $setting['value'];
            } else {
                $setting['display_value'] = $setting['value'];
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'settings' => $settings,
            'users' => $users,
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
        
        if (empty($id)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Adding new settings is disabled.',
                'csrfHash' => csrf_hash()
            ]);
        }

        $desc = $this->request->getPost('desc');
        $value = $this->request->getPost('value');
        $isactive = $this->request->getPost('isactive') ?? 1;

        $data = [
            'id'       => $id,
            'desc'     => $desc,
            'value'    => $value,
            'isactive' => $isactive
        ];

        if ($this->settingModel->save($data)) {
            return $this->response->setJSON([
                'success'  => true,
                'message'  => 'Setting updated successfully!',
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