<?php

namespace App\Controllers;



class Buku extends BaseController
{


    public function showSearch()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $buku = $this->BukuModel->search($keyword);
        } else {
            return $this->index();
        }
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $buku,
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage
        ];
        return view('buku/listBuku', $data);
    }



    public function index()
    {

        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'List Buku',
            'data' => $this->BukuModel->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
                ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')->paginate(10, 'buku'),
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage

        ];

        return view('buku/listBuku', $data);
    }
}