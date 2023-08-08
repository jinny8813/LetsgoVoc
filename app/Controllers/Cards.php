<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\BooksModel;
use App\Models\CardsModel;

class CardList extends BaseController
{
    use ResponseTrait;

    public function index($uuidv4)
    {
        return redirect()->to("/perbook/" . $uuidv4);
    }
}
