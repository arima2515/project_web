<?php

namespace App\Controllers;

class Pages extends BaseController
{


    public function listBuku()
    {
        $data = [
            'title' => 'Daftar Isi buku'
        ];
        return view('pages/listBuku' . $data);
    }

    public function listPenulis()
    {
        $data = [
            'title' => 'Daftar Isi penulis'
        ];
        return view('pages/listPenulis', $data);
    }
    public function homepage()
    {
        $data = [
            'title' => 'Homepage'
        ];
        return view('pages/homepage', $data);
    }
    public function halamanAdmin()
    {
        $data = [
            'title' => 'Admin Page'
        ];
        return view('pages/listBuku', $data);
    }
    public function halamanEditAdmin()
    {
    }
}