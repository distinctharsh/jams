<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditActionModel extends Model
{
    protected $table            = 'audit_action';
    protected $primaryKey       = 'action_id';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id', 'login_name', 'module', 'action', 
        'record_id', 'description', 'ip_address', 'user_agent', 'created_at'
    ];

    public function getAllActionLogs()
    {
        return $this->orderBy('action_id', 'DESC')->findAll();
    }
}