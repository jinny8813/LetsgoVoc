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
        $data = $request->getPost();

        $email = $data['email'];
        $password = $data['password'];
        if($email == null || $password == null) {
            return $this->fail("需帳號密碼進行登入", 400);
        }

        $userModel = new UserModel();
        $userData = $userModel->getUser($email, $password);

        if($userData) {
            session()->set("userData", $userData);
            return $this->respond("OK", 200);
            ;
        } else {
            return $this->fail("帳號密碼錯誤", 400);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
}
