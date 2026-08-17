<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields = [
        'full_name',
        'employee_id',
        'email',
        'mobile',
        'password',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'full_name' => 'required|min_length[3]|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]|is_unique[users.email]',
        'mobile'    => 'required|numeric|min_length[10]|max_length[15]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'This Email is already registered.'
        ]
    ];

    // Using password_verify for secure password checking
    public function verifyPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword);
    }

    public function findUserByUsername($username)
    {
        return $this->where('username', $username)
                    ->where('is_active', true)
                    ->first();
    }

    public function findUserByEmail($email)
    {
        return $this->where('email', $email)
                    ->where('is_active', true)
                    ->first();
    }
}