<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['user_id', 'email', 'password', 'nickname', 'create_at'];

    /**
     * Members data getter.
     *
     * @param integer $id
     * @return array|null
     */
    public function getUser(string $email, string $password): ?array
    {
        return $this->where("email", $email)
                    ->where("password", $password)
                    ->first();
    }
}
