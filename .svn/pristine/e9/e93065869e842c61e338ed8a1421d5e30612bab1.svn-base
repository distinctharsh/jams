<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    protected $table            = 'mas_designation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $allowedFields    = ['name', 'isactive'];

    protected $validationRules  = [
        'name' => 'required|min_length[2]|max_length[250]',
        'isactive' => 'permit_empty|in_list[0,1]'
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Designation name is required.',
            'min_length' => 'Designation name must be at least 2 characters long.',
            'max_length' => 'Designation name cannot exceed 250 characters.'
        ]
    ];

    /**
     * Get all designations ordered by latest first
     */
    public function getAllDesignations(): array
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    /**
     * Get active designations ordered alphabetically
     */
    public function getActiveDesignations(): array
    {
        return $this->where('isactive', 1)->orderBy('name', 'ASC')->findAll();
    }

    /**
     * Get designation by ID safely
     */
    public function getDesignationById(int $id): ?array
    {
        return $this->find($id);
    }
}