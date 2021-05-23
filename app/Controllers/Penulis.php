<?php

namespace App\Controllers;

use App\Models\PenulisModel;

class Penulis extends BaseController
{
    protected $PenulisModel;

    public function __construct()
    {
        $this->PenulisModel = new PenulisModel();
    }



    public function index()
    {



        $currentPage = $this->request->getVar('page_penulis') ? $this->request->getVar('page_penulis') : 1;
        $data = [
            'title' => 'List Penulis',
            'data' => $this->PenulisModel->getPenulis(),
            'pager' => $this->PenulisModel->pager,
            'currentPage' => $currentPage

        ];

        return view('penulis/index', $data);
    }
}