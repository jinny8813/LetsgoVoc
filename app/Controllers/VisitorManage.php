<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class VisitorManage extends BaseController
{
    use ResponseTrait;

    /**
     * render visitor_home page function
     *
     * @return void
     */
    public function index()
    {
        if($this->session->get("userData") !== null) {
            return redirect()->to("/home");
        } else {
            return view('pages/visitor_home');
        }
    }

    /**
     * user login function
     *
     * @return object
     */
    public function login(): object
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

    /**
     * user logout function
     *
     * @return void
     */
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to("/");
    }

    /**
     * store user data to db function
     *
     * @return object
     */
    public function register(): object
    {
        $data = $this->request->getPost();

        $email      = $data['email'];
        $password   = $data['password'];
        $cpassword  = $data['cpassword'];
        $nickname   = $data['nickname'];

        if($email === null || $password === null || $cpassword === null || $nickname === null) {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        if($email === " " || $password === " " || $cpassword === " " || $nickname === " ") {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        if($password != $cpassword) {
            return $this->fail("密碼驗證錯誤", 403);
        }

        $userModel = new UserModel();
        $userData  = $userModel->where("email", $email)->first();

        if($userData != null) {
            return $this->fail("帳號已被註冊", 403);
        }

        $values = [
            'email'         =>  $email,
            'password_hash' =>  password_hash($password, PASSWORD_DEFAULT),
            'nickname'      =>  $nickname,
            'create_at'     =>  date('Y-m-d H:i:s'),
            'uuidv4'        =>  $this->getUuid(),
            'goal'          =>  0,
            'lasting'       =>  30,
        ];
        $userModel->insert($values);

        return $this->respond([
            "status" => true,
            "msg"    => "登入成功"
        ]);
    }
}
