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

    // Get all organizations
    public function getAllOrganizations()
    {
        return $this->orderBy('id', 'DESC')->findAll();
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