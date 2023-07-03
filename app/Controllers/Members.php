<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Members extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if($this->isLoggedIn === true) {
            return redirect()->to("/home");
        } else {
            return view('pages/visitor_home');
        }
    }

    public function login()
    {
        $data = $this->request->getPost();

        $email    = $data['email'];
        $password = $data['password'];

        if(is_null($email) === true || is_null($password) === true) {
            return $this->fail("需帳號密碼進行登入", 400);
        }

        $userModel = new UserModel();
        $userData  = $userModel->where("email", $email)->first();

        if(password_verify($password, $userData['password_hash'])) {
            $this->session->set("userData", $userData);
            return $this->respond(["
                        status" => true,
                        "data"   => $this->session,
                        "msg"    => "log in successful"
                    ]);
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
