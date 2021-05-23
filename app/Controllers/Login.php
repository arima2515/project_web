<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AkunModel;


class Login extends BaseController
{

    protected $AkunModel;
    protected $AdminModel;

    public function __construct()
    {
        $this->AkunModel = new AkunModel();
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login/loginForm', $data);
    }

    public function login_process()
    {
        session_start();
        $_SESSION['email'] = $_POST['email'];

        $val = $this->AkunModel->validation($_POST);
        if ($val) {
            $data = [
                'title' => 'Homepage'
            ];
            return view('pages/homepage', $data);
        }
        $val = $this->AdminModel->validation($_POST);
        if ($val) {
            $data = [
                'title' => 'Admin Page'
            ];
            return view('admin/index', $data);
        }
        $data = [
            'title' => 'Login'
        ];

        return view('login/loginForm', $data);
    }
}