<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\CardsModel;
use App\Models\StateModel;
use PhpParser\Node\Expr\Cast\Object_;

class Cards extends BaseController
{
    use ResponseTrait;

    /**
     * redirect to perbook_list rendering function
     *
     * @return void
     */
    public function index()
    {
        $bookData = $this->session->bookData;
        $uuidv4 = $bookData['uuidv4'];

        return redirect()->to("/perbook/" . $uuidv4);
    }

    /**
     * render perbook_create page function
     *
     * @return void
     */
    public function renderCreatePage()
    {
        $bookData = $this->session->bookData;

        return view('pages/perbook_create', $bookData);
    }

    /**
     * store card data to db function
     *
     * @return Object
     */
    public function create(): Object
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
        $uuidv4         = $this->getUuid();

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
            'uuidv4'         => $uuidv4,
        ];
        $cardsModel = new CardsModel();
        $cardsModel->insert($values);

        $thecard = $cardsModel->where("uuidv4", $uuidv4)->first();
        $c_id = $thecard['c_id'];

        $stateModel = new StateModel();
        $values = [
            'u_id'  => $u_id,
            'c_id'  => $c_id,
            'state' => 0,
            'grade' => "New",
        ];
        $stateModel->insert($values);

        return $this->respond([
            "status" => true,
            "msg"    => "字卡建立成功"
        ]);
    }

    /**
     * render percard page function
     *
     * @param String $uuidv4
     * @return void
     */
    public function perCard(String $uuidv4)
    {
        $bookData = $this->session->bookData;

        $cardsModel = new CardsModel();
        $cardData = $cardsModel->where("uuidv4", $uuidv4)->first();

        if($bookData === null) {
            return redirect()->to("/books");
        } elseif($cardData === null) {
            return redirect()->to("/perbook");
        }

        return view('pages/percard', $cardData);
    }

    /**
     * render percard_edit page function
     *
     * @param String $uuidv4
     * @return void
     */
    public function renderUpdatePage(String $uuidv4)
    {
        $cardsModel = new CardsModel();
        $cardData = $cardsModel->where("uuidv4", $uuidv4)->first();

        return view('pages/percard_edit', $cardData);
    }

    /**
     * update card data to db function
     *
     * @param String $uuidv4
     * @return Object
     */
    public function update(String $uuidv4): Object
    {
        $data = $this->request->getJSON(true);

        $cardsModel = new CardsModel();
        $verifyCardData = $cardsModel->where("uuidv4", $uuidv4)->first();

        if($verifyCardData === null) {
            return $this->fail("查無此字卡", 404);
        }

        $title          = $data['title'];
        $content        = $data['content'];
        $e_content      = $data['e_content'];
        $pronunciation  = $data['pronunciation'];
        $part_of_speech = $data['part_of_speech'];
        $e_sentence     = $data['e_sentence'];
        $c_sentence     = $data['c_sentence'];
        $date           = date("Y-m-d H:i:s");

        if($title === null || $content === null) {
            return $this->fail("標題內容是必要欄位", 404);
        }

        if($title === " " || $content === " ") {
            return $this->fail("標題內容是必要欄位", 404);
        }

        $updateValues = [
            'title'          => $title,
            'content'        => $content,
            'e_content'      => $e_content,
            'pronunciation'  => $pronunciation,
            'part_of_speech' => $part_of_speech,
            'e_sentence'     => $e_sentence,
            'c_sentence'     => $c_sentence,
            'updated_at'     => $date
        ];
        $cardsModel->update($verifyCardData['c_id'], $updateValues);

        return $this->respond([
            "status" => true,
            "msg"    => "字卡修改成功"
        ]);
    }

    /**
     * delete card from db function
     *
     * @param String $uuidv4
     * @return Object
     */
    public function delete(String $uuidv4): Object
    {
        $cardsModel = new CardsModel();
        $verifyCardData = $cardsModel->where("uuidv4", $uuidv4)->first();

        if($verifyCardData === null) {
            return $this->fail("查無此字卡", 404);
        }

        $cardsModel->delete($verifyCardData['c_id']);

        return $this->respond([
            "status" => true,
            "msg"    => "字卡刪除成功"
        ]);
    }
}
