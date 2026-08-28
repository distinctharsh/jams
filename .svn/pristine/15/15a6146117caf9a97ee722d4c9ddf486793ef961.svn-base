<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    protected $table            = 'registration';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'reg_no', 'name', 'email', 'mobile_no', 'organization_id',
        'org_type', 'designation', 'ugc_id', 'auth_link',
        'auth_link_generated_at', 'isactive_authlink', 'authorization_letter'
    ];

    /**
     * Call Stored Procedure: register_user
     */
    public function registerUserSp($name, $email, $phone, $orgId, $orgType, $ugcId)
    {
        $db = \Config\Database::connect();
        
        // Execute Stored Procedure
        $query = $db->query(
            "CALL register_user(?, ?, ?, ?, ?, ?)",
            [$name, $email, $phone, $orgId, $orgType, $ugcId]
        );

        $result = $query->getRowArray();
        
        // Stored procedure Execution Clean up
        $db->close();
        
        return $result;
    }

    /**
     * Call Stored Procedure: approve_registration
     */
    public function approveRegistrationSp($regId, $approvedBy, $action, $remarks,$passwordHash = '')
    {
        $db = \Config\Database::connect();
        $db->reconnect();

        $query = $db->query(
            "CALL approve_registration(?, ?, ?, ?,?)",
            [(int)$regId, (int)$approvedBy, (int)$action, (string)$remarks, (string)$passwordHash]
        );

        $result = $query->getRowArray();
        if ($mysqli = $db->connID) {
            while ($mysqli->more_results() && $mysqli->next_result()) {
                $extraResult = $mysqli->use_result();
                if ($extraResult instanceof \mysqli_result) {
                    $extraResult->free();
                }
            }
        }

        return $result;
    }

    /**
     * Fetch Registrations with Latest History Status and Organization Details
     */
    public function getRegistrationsWithDetails()
    {
        return $this->db->table('registration r')
            ->select('r.*, o.org_name as organization_name, ot.name as org_type_name, rh.status as current_status, rh.created_at as status_date')
            ->join('mas_organization o', 'o.id = r.organization_id', 'left')
            ->join('mas_organization_type ot', 'ot.id = r.org_type', 'left')
            ->join('registration_history rh', 'rh.reg_id = r.id AND rh.id = (SELECT MAX(id) FROM registration_history WHERE reg_id = r.id)', 'left')
            ->orderBy('r.id', 'DESC')
            ->get()
            ->getResultArray();
    }
}