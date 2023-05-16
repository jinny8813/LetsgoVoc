<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('pages/visitor_home');
    }

    public function home()
    {
        return view('pages/user_home');
    }
}
