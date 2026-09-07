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

public function getFailedLoginCount24Hours(string $email): int
{
    // Get the latest ACCOUNT_UNLOCKED record
    $lastUnlock = $this->db->table($this->table)
        ->select('created_at')
        ->where('login_name', $email)
        ->where('action', 'ACCOUNT_UNLOCKED')
        ->orderBy('audit_id', 'DESC')
        ->get()
        ->getRowArray();

    // Create a completely separate builder for failed logins
    $builder = $this->db->table($this->table)
        ->where('login_name', $email)
        ->where('action', 'LOGIN_FAILED')
        ->where(
            'created_at >=',
            date('Y-m-d H:i:s', strtotime('-24 hours'))
        );

    // If account was unlocked, only count failures after the unlock
    if ($lastUnlock) {
        $builder->where('created_at >', $lastUnlock['created_at']);
    }

    return $builder->countAllResults();
}
public function lockAccount(string $email): bool {

        $db = $this->db;

        $db->transStart();

        // 1. Update users table
        $db->table('user')
            ->where('email', $email)
            ->update([
                'is_locked' => 1
            ]);

        $db->transComplete();

        return $db->transStatus();
    }

    /**
     * Unlock account
     */
    public function unlockAccount(
        int $userId,
        string $email,
        ?string $ipAddress = null
    ): bool {

        $db = $this->db;

        $db->transStart();

        // 1. Update users table
        $db->table('user')
            ->where('email', $email)
            ->update([
                'is_locked' => 0
            ]);

        // 2. Insert audit trail
        $this->insert([
            'user_id'           => $userId,
            'login_name'        => $email,
            'action'            => 'ACCOUNT_UNLOCKED',
            'action_description'=> 'ACCOUNT_UNLOCKED_BY_ADMIN',
            'ip_address'        => $ipAddress
        ]);

        $db->transComplete();

        return $db->transStatus();
    }
}