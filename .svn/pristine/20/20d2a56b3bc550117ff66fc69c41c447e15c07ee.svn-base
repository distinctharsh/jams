<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAuthorizationModel extends Model
{
    protected $table            = 'user_authorization';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';

    protected $allowedFields = [
        'user_id',
        'full_name',
        'email',
        'mobile',
        'body_name',
        'body_type',
        'ugc_details',
        'authorization_letter',
        'status',
        'remarks',
        'approved_by',
        'approved_at',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = false;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}