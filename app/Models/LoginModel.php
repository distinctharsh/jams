<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'name',
        'email',
        'hash',
        'password_reset_req'
    ];

    public function findUserByEmail(string $email): ?array
    {
        try {
            $email = trim($email);

            if ($email === '') {
                return null;
            }

            $user = $this->db
                ->table('user')
                ->select('
                    user.*,
                    GROUP_CONCAT(
                        DISTINCT mas_role.id
                        ORDER BY mas_role.id
                        SEPARATOR ", "
                    ) AS role_ids
                ')
                ->join(
                    'user_role_mapping',
                    'user_role_mapping.user_id = user.id AND user_role_mapping.isactive = 1',
                    'left'
                )
                ->join(
                    'mas_role',
                    'mas_role.id = user_role_mapping.role_id',
                    'left'
                )
                ->where('user.email', $email)
                ->groupBy('user.id')
                ->get()
                ->getRowArray();

            return $user ?: null;

        } catch (\Throwable $e) {
            log_message('error', 'Error in findUserByEmail: ' . $e->getMessage());
            return null;
        }
    }

    public function verifyPassword(string $plainPassword, string $hash): bool
    {
        try {
            if ($plainPassword === '' || $hash === '') {
                return false;
            }

            return password_verify($plainPassword, $hash);

        } catch (\Throwable $e) {
            log_message('error', 'Error in verifyPassword: ' . $e->getMessage());
            return false;
        }
    }

    public function getDefaultPasswordHash(): string
    {
        try {
            $hash = password_hash('jams@2026', PASSWORD_DEFAULT);
            return $hash ?: '';

        } catch (\Throwable $e) {
            log_message('error', 'Error in getDefaultPasswordHash: ' . $e->getMessage());
            return '';
        }
    }

    public function setDefaultPassword(int $userId): bool
    {
        try {
            $hash = $this->getDefaultPasswordHash();

            if ($hash === '') {
                return false;
            }

            return $this->update($userId, [
                'hash'               => $hash,
                'password_reset_req' => 1
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Error in setDefaultPassword: ' . $e->getMessage());
            return false;
        }
    }

    public function changePassword(int $userId, string $newPassword): bool
    {
        try {
            if ($userId <= 0 || $newPassword === '') {
                return false;
            }

            $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

            if ($newHash === false) {
                return false;
            }

            return $this->update($userId, [
                'hash'               => $newHash,
                'password_reset_req' => 0
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Error in changePassword: ' . $e->getMessage());
            return false;
        }
    }
}