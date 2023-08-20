<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class MemberManage extends BaseController
{
    use ResponseTrait;

    /**
     * render user_home page function
     *
     * @return void
     */
    public function index()
    {
        return view('pages/user_home', $this->session->get('userData'));
    }
}
