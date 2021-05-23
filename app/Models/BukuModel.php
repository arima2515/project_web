<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    public function getBuku($isbn = false)
    {

        $builder = $this->db->table('buku');
        $builder->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner');
        $builder->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner');
        $builder->select();
        if ($isbn == false) {
            $data = $builder->get()->getResultArray();
            return $data;
        }
        $builder->where('isbn =', $isbn);
        $data = $builder->get()->getResultArray();

        return $data;
    }

    public function insertBuku($param)
    {

        $namaPenulis = $this->db->table('penulis');
        $namaPenulis->select();
        $namaPenulis->where('namaPenulis =', $param['namaPenulis']);
        $idPenulis = $namaPenulis->get()->getResultArray();
        $namaKategori = $this->db->table('kategoribuku');
        $namaKategori->select();
        $namaKategori->where('namaKategori', $param['namaKategori']);
        $idKategori = $namaKategori->get()->getResultArray();
        unset($param['namaPenulis']);
        unset($param['namaKategori']);
        $param['idPenulis'] = $idPenulis[0]['idPenulis'];
        $param['idKategori'] = $idKategori[0]['idKategori'];
        $builder = $this->db->table('buku');
        $builder->insert($param);
    }

    public function search($keyword)
    {
        return $this->join('penulis', 'buku.idPenulis = penulis.idPenulis', 'inner')
            ->join('kategoribuku', 'buku.idKategori = kategoribuku.idKategori', 'inner')
            ->like('judul', $keyword)
            ->orLike('tahunTerbit', $keyword)
            ->orLike('namaPenulis', $keyword)
            ->orLike('statusBuku', $keyword)
            ->paginate(10, 'buku');
    }

    public function removeBuku($isbn)
    {
        $builder = $this->db->table('buku');
        $builder->where('isbn =', $isbn);
        $builder->delete();
    }
}