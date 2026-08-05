<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name', 
        'employee_id', 
        'email', 
        'mobile', 
        'username', 
        'password',
        'is_active'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    protected $validationRules = [
        'full_name' => 'required|min_length[3]|max_length[100]',
        'employee_id' => 'required|min_length[3]|max_length[50]|is_unique[users.employee_id]',
        'email' => 'required|valid_email|is_unique[users.email]|max_length[100]',
        'mobile' => 'required|numeric|min_length[10]|max_length[15]',
        'username' => 'required|min_length[4]|max_length[50]|is_unique[users.username]',
        'password' => 'required|min_length[6]',
    ];
    
    protected $validationMessages = [
        'employee_id' => [
            'is_unique' => 'This Employee ID is already registered.',
        ],
        'email' => [
            'is_unique' => 'This Email is already registered.',
        ],
        'username' => [
            'is_unique' => 'This Username is already taken.',
        ],
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