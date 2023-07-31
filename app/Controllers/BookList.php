<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\BooksModel;

class BookList extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userData = $this->session->userData;

        $u_id = $userData['u_id'];

        $db = \Config\Database::connect();
        $temp =  "
                    SELECT b.*,count(c.c_id) count, AVG(s.state) avg
                    FROM books b
                    LEFT JOIN cards c ON b.b_id = c.b_id
                    LEFT JOIN state s ON c.c_id = s.c_id
                    WHERE b.u_id = {$u_id}
                    GROUP BY b.b_id
                    ORDER BY b.b_id DESC;
                ";
        $data['books'] = $db->query($temp)->getResultArray();

        return view('pages/book_list', $data);
    }

    public function create()
    {
        return view('pages/book_create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $userData = $this->session->userData;

        $u_id           =   $userData['u_id'];
        $title          =   $data['title'];
        $description    =   $data['description'];

        if($title === null || $description === null) {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        if($title === " " || $description === " ") {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        $values = [
            'u_id'          =>  $u_id,
            'title'         =>  $title,
            'description'   =>  $description,
            'uuidv4'        =>  $this->getUuid(),
        ];
        $booksModel = new BooksModel();
        $booksModel->insert($values);

        return $this->respond([
            "status" => true,
            "msg"    => "書本建立成功"
        ]);
    }
}
