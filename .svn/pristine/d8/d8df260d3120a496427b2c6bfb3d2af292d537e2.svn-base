<?php

namespace App\Models;

use CodeIgniter\Model;

class VendorModel extends Model
{
    protected $table            = 'mas_vendor';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['vendor_name', 'isactive'];

    public function getAllVendors()
    {
        return $this->findAll();
    }

    public function getVendorById($id)
    {
        return $this->find($id);
    }

    public function createVendor($data)
    {
        return $this->insert($data);
    }

    public function updateVendor($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteVendor($id)
    {
        return $this->delete($id);
    }
}