<?php

namespace App\Models;

use CodeIgniter\Model;

class OrgTypeModel extends Model
{
    protected $table            = 'mas_organization_type';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    
    protected $allowedFields    = [
        'name',
        'isactive',
        'is_ugc_id_required',
        'competent_authority'
    ];

    public function getAllOrgTypes()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    public function getOrgTypeById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function createOrgType($data)
    {
        return $this->insert($data);
    }

    public function updateOrgType($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOrgType($id)
    {
        return $this->delete($id);
    }
}