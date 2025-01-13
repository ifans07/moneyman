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
            'deskripsi' => "Lacak penggunaan barang atau layanan untuk memantau durasi pemakaian dan efisiensi penggunaannya.",
            'pakai' => $this->pakai->select('pakai.id, id_user, id_kategori, kategori, icon, nama, tanggal_mulai, tanggal_selesai, pakai.catatan, status_pakai, pakai.slug, pakai.deleted_at')->join('kategori_expenses', 'kategori_expenses.id=pakai.id_kategori')->where('id_user', session()->get('id'))->orderBy('pakai.created_at', 'DESC')->findAll(),
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

    public function hapusPakai()
    {
        $slug = $this->request->getPost('slug');
        $data = $this->pakai->where('slug', $slug)->first();
        $this->pakai->delete($data['id']);
        return $this->response->setJSON([
            'data' => $data['deleted_at']
        ]);
    }
}
