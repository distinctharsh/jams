<?php
namespace App\Models;
use CodeIgniter\Model;
class LoginModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function findUserByEmail(string $email): ?array
    {
        try {
            $email = trim($email);

            if ($email === '') {
                return null;
            }

            $user = $this->where('email', $email)->first();
            return $user ?: null;

        } catch (\Exception $e) {
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

        } catch (\Exception $e) {
            log_message('error', 'Error in verifyPassword: ' . $e->getMessage());
            return false;
        }
    }

    public function getDefaultPasswordHash(): string
    {
        try {
            return password_hash('jams@2026', PASSWORD_DEFAULT);

        } catch (\Exception $e) {
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

            return $this->update($userId, ['hash' => $hash]);

        } catch (\Exception $e) {
            log_message('error', 'Error in setDefaultPassword: ' . $e->getMessage());
            return false;
        }
    }
}