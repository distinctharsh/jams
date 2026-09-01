<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditTrailModel extends Model
{
    protected $table            = 'audit_trail';
    protected $primaryKey       = 'audit_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'login_name',
        'action',
        'action_description',
        'ip_address',
        'user_agent',
        'login_time',
        'logout_time',
        'created_at'
    ];

    // Method to fetch all logs ordered by created_at DESC
    public function getAllLogs()
    {
        return $this->orderBy('audit_id', 'DESC')->findAll();
    }
}