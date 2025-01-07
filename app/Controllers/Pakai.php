<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PakaiModel;
use App\Models\KategoriExpensesModel;

class Pakai extends BaseController
{
    protected $pakai, $kategori;
    public function __construct()
    {
        $this->pakai = new PakaiModel();
        $this->kategori = new KategoriExpensesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pakai',
            'pakai' => $this->pakai->join('kategori_expenses', 'kategori_expenses.id=pakai.id_kategori')->findAll(),
            'kategori' => $this->kategori->findAll()
        ];
        return view('pakai/index', $data);
    }

    public function savePakai()
    {
        $data = [
            'id_user' => session()->get('id'),
            'id_kategori' => $this->request->getPost('kategori'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'catatan' => $this->request->getPost('catatan'),
            'status_pakai' => 0,
            'slug' => $this->generateSlug($this->request->getPost('nama'))
        ];
        $this->pakai->save($data);
        return redirect()->to(base_url('pakai'));
    }

    public function updatePakai()
    {
        $id = $this->request->getPost('id');
        $data = [
            'tanggal_selesai' => $this->request->getPost('tanggal'),
            'catatan' => $this->request->getPost('catatan'),
            'status_pakai' => 1
        ];
        $this->pakai->update($id, $data);
        return $this->response->setJSON([
            'success' => 'berhasil',
            'message' => 'gagal'
        ]);
    }
}
