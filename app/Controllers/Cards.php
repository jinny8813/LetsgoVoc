<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\BooksModel;
use App\Models\CardsModel;

class Cards extends BaseController
{
    use ResponseTrait;

    public function index($uuidv4)
    {
        return redirect()->to("/perbook/" . $uuidv4);
    }

    public function renderCreatePage()
    {
        $bookData = $this->session->bookData;

        return view('pages/perbook_create', $bookData);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $userData = $this->session->userData;
        $bookData = session()->bookData;

        $u_id           = $userData['u_id'];
        $b_id           = $bookData['b_id'];
        $title          = $data['title'];
        $content        = $data['content'];
        $e_content      = $data['e_content'];
        $pronunciation  = $data['pronunciation'];
        $part_of_speech = $data['part_of_speech'];
        $e_sentence     = $data['e_sentence'];
        $c_sentence     = $data['c_sentence'];

        if($title === null || $content === null) {
            return $this->fail("需標題內容進行建立", 404);
        }

        if($title === " " || $content === " ") {
            return $this->fail("需標題內容進行建立", 404);
        }

        $values = [
            'u_id'           => $u_id,
            'b_id'           => $b_id,
            'title'          => $title,
            'content'        => $content,
            'e_content'      => $e_content,
            'pronunciation'  => $pronunciation,
            'part_of_speech' => $part_of_speech,
            'e_sentence'     => $e_sentence,
            'c_sentence'     => $c_sentence,
            'uuidv4'         => $this->getUuid(),
        ];
        $cardsModel = new CardsModel();
        $cardsModel->insert($values);

        return $this->respond([
            "status" => true,
            "msg"    => "字卡建立成功"
        ]);
    }
}
