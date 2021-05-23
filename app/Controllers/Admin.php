<?php

namespace App\Controllers;



class Admin extends BaseController
{


    public function addData()
    {
        $data = [
            'title' => 'Form Insert Buku'

        ];
        return view('buku/form', $data);
    }
    public function deleteData($isbn)
    {
        $this->BukuModel->removeBuku($isbn);
        header('Location: ' . base_url('Admin/index'));
        exit;
    }
    public function editData($isbn)
    {
        $data = [
            'title' => 'Form Edit Buku',
            'data' => $this->BukuModel->getBuku($isbn),
            'val' => 'edit'
        ];
        return view('buku/form', $data);
    }
    public function addDataProcess()
    {
        $this->BukuModel->insertBuku($_POST);
        $data = [
            'title' => 'Success Notification'
        ];

        return view('admin/successPage', $data);
    }
    public function editDataProcess()
    {
        $this->BukuModel->updateBuku($_POST);

        $data = [
            'title' => 'Success Notification',
            'val' => 'edit'
        ];
        return view('admin/successPage', $data);
    }
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
        return view('admin/listBuku', $data);
    }

    public function index()
    {


        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
        $data = [
            'title' => 'Administrator Page',
            'data' => $this->BukuModel->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
                ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')->paginate(10, 'buku'),
            'pager' => $this->BukuModel->pager,
            'currentPage' => $currentPage

        ];

        return view('admin/listBuku', $data);
    }
}