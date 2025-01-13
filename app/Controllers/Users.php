<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class Users extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'deskripsi' => "Atur profil pengguna, sesuaikan preferensi, dan pastikan keamanan data pribadi Anda."
        ];
        return view('landing', $data);
    }

    public function profilPengguna()
    {
        $data = [
            'title' => 'Profil Pengguna',
            'deskripsi' => "Atur profil pengguna, sesuaikan preferensi, dan pastikan keamanan data pribadi Anda.",
            'user' => $this->userModel->where('id', session()->get('id'))->first()
        ];
        return view('user/index', $data);
    }
}
