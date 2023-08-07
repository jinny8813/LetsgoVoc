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

        $booksModel = new BooksModel();
        $data['books'] = $booksModel ->select('books.*')
                                    ->selectCount('cards.c_id', 'count')
                                    ->selectAvg('state.state', 'avg')
                                    ->join('cards', 'books.b_id = cards.b_id', 'left')
                                    ->join('state', 'cards.c_id = state.c_id', 'left')
                                    ->where('books.u_id', $u_id)
                                    ->groupBy('books.b_id')
                                    ->orderBy('books.b_id', 'DESC')
                                    ->findAll();

        return view('pages/book_list', $data);
    }

    public function renderCreatePage()
    {
        return view('pages/book_create');
    }

    public function create()
    {
        $data = $this->request->getPost();
        $userData = $this->session->userData;

        $u_id        = $userData['u_id'];
        $title       = $data['title'];
        $description = $data['description'];

        if($title === null || $description === null) {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        if($title === " " || $description === " ") {
            return $this->fail("需帳號密碼進行註冊", 404);
        }

        $values = [
            'u_id'        => $u_id,
            'title'       => $title,
            'description' => $description,
            'uuidv4'      => $this->getUuid(),
        ];
        $booksModel = new BooksModel();
        $booksModel->insert($values);

        return $this->respond([
            "status" => true,
            "msg"    => "書本建立成功"
        ]);
    }
}
