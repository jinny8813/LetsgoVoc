<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class UserMember extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('pages/user_home', session()->userData);
    }
}
