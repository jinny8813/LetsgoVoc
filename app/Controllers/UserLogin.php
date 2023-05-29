<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class UserLogin extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if($this->isLoggedIn) {
            return redirect()->to("/home");
        } else {
            return view('pages/visitor_home');
        }
    }

    public function login()
    {
        $request = \Config\Services::request();
        $data    = $request->getPost();

        if(is_null($data['email']) === true || is_null($data['password']) === true) {
            return $this->fail("需帳號密碼進行登入", 400);
        }

        $userModel = new UserModel();
        $userData  = $userModel->getUser($data['email'], $data['password']);

        if($userData) {
            $this->session->set("userData", $userData);
            return $this->respond(["status" => true,
                                    "data"   => $this->session,
                                    "msg"    => "log in successful"]);
        } else {
            return $this->fail("帳號密碼錯誤", 400);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("/");
    }
}
