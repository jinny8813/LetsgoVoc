<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['user_id','email', 'password','nickname','create_at'];

    public function getUser($email, $password)
    {
        return $this->where("email", $email)->where("password", $password)->first();
    }
}
