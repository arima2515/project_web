<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';


    public function validation($param)
    {

        $data = $this->findAll();
        foreach ($data as $row) {
            if ($row['email'] == $param['email'] && $row['password'] == $param['password']) {
                return true;
            }
        }
        return false;
    }
}