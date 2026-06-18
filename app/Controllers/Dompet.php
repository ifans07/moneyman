<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DompetModel;
use App\Models\IncomeModel;
use App\Models\ExpensesModel;

class Dompet extends BaseController
{
    protected $dompetModel, $income, $expense;
    public function __construct()
    {
        $this->dompetModel = new DompetModel();
        $this->income = new IncomeModel();
        $this->expense = new ExpensesModel();
    }
    public function index()
    {
        //
    }

    public function addDompet()
    {
        $saldo = explode('.', $this->request->getPost('saldo'));
        $s = implode($saldo);
        $saldoawal = explode('.', $this->request->getPost('saldo-awal'));
        $sa = implode($saldoawal);

        $data = [
            'id_user' => session()->get('id'),
            'nama_dompet' => $this->request->getPost('dompet'),
            'saldo' => $s,
            'saldo_awal' => $sa,
            'slug' => $this->generateSlug($this->request->getPost('dompet'))
        ];

        $this->dompetModel->save($data);
        session()->setFlashdata('berhasil', 'Berhasil tambah data!');
        return redirect()->to(base_url('/user/profil'));
    }

    public function dompetDetail($slug)
    {
        $getDompet = $this->dompetModel->findDompet($slug);
        $data = [
            'title' => 'Dompet Detail',
            'dompet' => $this->dompetModel->findDompet($slug),
            'log' => $this->income->gabungData(),
            'totalIncomeDompet' => $this->income->dompetTotalIncome($getDompet['id']),
            'totalExpenseDompet' => $this->expense->dompetTotalExpense($getDompet['id'])
        ];
        return view('dompet/dompet-detail', $data);
    }
}
