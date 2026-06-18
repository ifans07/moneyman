<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;
use App\Models\DompetModel;
use App\Models\TransferModel;

class Users extends BaseController
{
    protected $userModel, $dompetModel;
    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->dompetModel = new DompetModel();
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
            'user' => $this->userModel->where('id', session()->get('id'))->first(),
            'dompet' => $this->dompetModel->where('id_user', session()->get('id'))->findAll(),
            'saldo' => $this->dompetModel->saldoTotal(),
            'saldoawal' => $this->dompetModel->saldoAwalTotal()
        ];
        return view('user/index', $data);
    }
}
