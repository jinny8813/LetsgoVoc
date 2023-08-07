<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\BookModel;
use App\Models\CardModel;
use App\Models\StateModel;
use App\Models\ManifestModel;

class CardList extends BaseController
{
    use ResponseTrait;

    public function index($b_id)
    {
        return redirect()->to("/perbook/" . $b_id);
    }

    public function create()
    {
        return view('pages/perbook_create', session()->bookData);
    }

    public function store()
    {
        date_default_timezone_set('Asia/Taipei');
        $date = date('Y-m-d H:i:s');

        $request = \Config\Services::request();
        $data = $request->getPost();

        $bookData = session()->bookData;

        $values = [
            'b_id'=>$bookData['b_id'],
            'title'=>$data['title'],
            'content'=>$data['content'],
            'e_content'=>$data['e_content'],
            'pronunciation'=>$data['pronunciation'],
            'part_of_speech'=>$data['part_of_speech'],
            'e_sentence'=>$data['e_sentence'],
            'c_sentence'=>$data['c_sentence'],
            'create_at'=>$date,
            'uuidv4'=>$this->guidv4(),
        ];
        $cardModel = new CardModel();
        $cardModel->insert($values);

        $thecard = $cardModel->where("b_id", $bookData['b_id'])->where("title", $data['title'])->where("create_at", $date)->first();
        $manifestModel = new ManifestModel();
        $theusers = $manifestModel->where("b_id", $bookData['b_id'])->where("type", "readonly")->findAll();

        $manifestModel = new StateModel();
        $values = [
            'u_id'=>session()->userData['u_id'],
            'c_id'=>$thecard['c_id'],
            'state'=>0,
            'grade'=>"New",
            'create_at'=>$date,
        ];
        $manifestModel->insert($values);
        
        for($i=0; $i<count($theusers);$i++){
            $values = [
                'u_id'=>$theusers[$i]['u_id'],
                'c_id'=>$thecard['c_id'],
                'state'=>0,
                'grade'=>"New",
                'create_at'=>$date,
            ];
            $manifestModel->insert($values);
        }

        return $this->response->setStatusCode(200)->setJSON("OK");
    }

    public function edit()
    {
        return view('pages/perbook_edit', session()->bookData);
    }

    public function update($b_id)
    {
        $request = \Config\Services::request();
        $data = $request->getJSON(true);

        $bookModel = new BookModel();
        $bookModel->where('b_id', $b_id)
                    ->set('title', $data['title'])
                    ->set('description', $data['description'])
                    ->update();

        return $this->response->setStatusCode(200)->setJSON("OK");
    }
}
