<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'requests';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'organisation_name',
        'organisation_type',
        'letter_number',
        'exam_name',
        'exam_date',
        'exam_address',
        'vendor_name',
        'contact_person',
        'contact_email',
        'contact_phone',
        'status',
        'created_by',
        'created_at'
    ];
    
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function createRequest($data)
    {
        return $this->insert($data);
    }

    public function getAllRequests()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function getRequestById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function updateRequest($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteRequest($id)
    {
        return $this->delete($id);
    }
}