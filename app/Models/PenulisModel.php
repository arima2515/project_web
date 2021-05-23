<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table = 'penulis';

    public function getBukuPenulis($idPenulis)
    {
        $builder = $this->db->table('buku');
        $builder->where('idPenulis =', $idPenulis);
        $builder->select('judul');
        $data = $builder->get()->getResultArray();
        return $data;
    }
    public function getPenulis($idPenulis = false)
    {

        $builder = $this->db->table('penulis');

        $builder->select();

        if ($idPenulis == false) {

            $data = $builder->get()->getResultArray();
            $counter = 0;
            foreach ($data as $row) {
                $buku[$row['namaPenulis']] = $this->getBukuPenulis($row["idPenulis"]);
                $data[$counter]['judul'] =   $buku[$row['namaPenulis']];
                $counter++;
            }

            return $data;
        }
        $builder->where('idPenulis =', $idPenulis);
        $data = $builder->get()->getResultArray();

        return $data;
    }
}