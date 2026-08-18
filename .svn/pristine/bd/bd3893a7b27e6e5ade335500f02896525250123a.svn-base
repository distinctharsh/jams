<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelModel extends Model
{
    protected $table      = 'mas_model';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'vendor_id', 'isactive'];

    public function getAllModels()
    {
        return $this->db->table($this->table . ' m')
            ->select('m.*, v.vendor_name')
            ->join('mas_vendor v', 'v.id = m.vendor_id', 'left')
            ->get()
            ->getResultArray();
    }

    public function getModelById($id)
    {
        return $this->find($id);
    }

    public function createModel($data)
    {
        return $this->insert($data);
    }

    public function updateModel($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteModel($id)
    {
        return $this->delete($id);
    }
}