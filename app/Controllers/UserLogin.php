<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class UserLogin extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if(session()->get('userData')) {
            return redirect()->to("/home");
        } else {
            return view('pages/visitor_home');
        }
    }

    public function home()
    {
        return view('pages/user_home', session()->userData);
    }

    public function login()
    {
        $request = \Config\Services::request();
        $data = $request->getPost();

        $email = $data['email'];
        $password = $data['password'];
        if($email == null || $password == null) {
            return $this->response->setStatusCode(400)->setJSON("需帳號密碼進行登入");
        }

        $userModel = new UserModel();
        $userData = $userModel->where("email", $email)->where("password", $password)->first();

        if($userData) {
            session()->set("userData", $userData);
            return $this->response->setStatusCode(200)->setJSON("OK");
        } else {
            return $this->response->setStatusCode(400)->setJSON("帳號密碼錯誤");
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
}
