<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class VisitorManage extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        if($this->session->get("userData") !== null) {
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

        if($email === null || $password === null) {
            return $this->fail("需帳號密碼進行登入", 404);
        }

        if($email === " " || $password === " ") {
            return $this->fail("需帳號密碼進行登入", 404);
        }

        $userModel = new UserModel();
        $userData  = $userModel->where("email", $email)->first();

        if($userData === null) {
            return $this->fail("查無此帳號", 403);
        }

        if(password_verify($password, $userData['password_hash'])) {
            $this->session->set("userData", [
                'u_id'      => $userData['u_id'],
                'email'     => $userData['email'],
                'nickname'  => $userData['nickname'],
                'goal'      => $userData['goal'], 
                'lasting'   => $userData['lasting']
            ]);
            return $this->respond([
                "status" => true,
                "data"   => $this->session,
                "msg"    => "登入成功"
            ]);
        } else {
            return $this->fail("帳號密碼錯誤", 403);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("/");
    }
}
