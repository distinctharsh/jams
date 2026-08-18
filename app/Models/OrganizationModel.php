<?php

namespace App\Models;

use CodeIgniter\Model;

class OrganizationModel extends Model
{
    protected $table            = 'mas_organization';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'org_name',
        'org_type',
        'org_description',
        'authorization_letter_required',
        'isactive'
    ];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getAllOrganizations()
    {
        return $this->select('mas_organization.*, mas_organization_type.name as org_type_name')
                    ->join('mas_organization_type', 'mas_organization_type.id = mas_organization.org_type', 'left')
                    ->findAll();
    }

    // Get organization by ID
    public function getOrganizationById($id)
    {
        return $this->where('id', $id)->first();
    }

    // Create new organization
    public function createOrganization($data)
    {
        return $this->insert($data);
    }

    // Update organization
    public function updateOrganization($id, $data)
    {
        return $this->update($id, $data);
    }

    // Delete organization
    public function deleteOrganization($id)
    {
        return $this->delete($id);
    }
}