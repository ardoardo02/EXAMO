<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['id', 'firstName', 'lastName', 'email', 'institute', 'mobile', 'password', 'status', 'created_at', 'updated_at'];
}
