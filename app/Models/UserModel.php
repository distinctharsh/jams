<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'email',
        'mobile_no',
        'organization_id', 
        'org_type', 'designation', 'authorization_letter', 
        'isactive', 'salt', 'hash', 'ugc_id'
    ];

    public function getAllUsers()
    {
        return $this->db->table($this->table)
            ->select('user.*, mas_organization.org_name, mas_organization_type.name as org_type_name')
            ->join('mas_organization', 'mas_organization.id = user.organization_id', 'left')
            ->join('mas_organization_type', 'mas_organization_type.id = user.org_type', 'left')
            ->get()
            ->getResultArray();
    }

    public function getUserById($id)
    {
        return $this->asArray()->where(['id' => $id])->first();
    }
}