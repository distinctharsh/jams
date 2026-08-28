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
            ->select('user.*, mas_organization.org_name, mas_organization_type.name as org_type_name, mas_designation.name as designation_name, GROUP_CONCAT(DISTINCT mas_role.name ORDER BY mas_role.name SEPARATOR ", ") AS role_name,GROUP_CONCAT(DISTINCT mas_role.id ORDER BY mas_role.id SEPARATOR ", ") AS role_ids')
            ->join('mas_organization', 'mas_organization.id = user.organization_id', 'left')
            ->join('mas_organization_type', 'mas_organization_type.id = user.org_type', 'left')
            ->join('mas_designation', 'mas_designation.id = user.designation', 'left')
            ->join('user_role_mapping','user_role_mapping.user_id = user.id AND user_role_mapping.isactive = 1','left')
            ->join('mas_role','mas_role.id = user_role_mapping.role_id','left')
            ->groupBy('user.id')
            ->get()
            ->getResultArray();
    }

    public function getUserById($id)
    {
        return $this->asArray()->where(['id' => $id])->first();
    }
}