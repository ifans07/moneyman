<?php

namespace App\Controllers;

use Codeigniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\KategoriExpensesModel;
use App\Models\ExpensesModel;
use App\Models\DompetModel;

class Expenses extends BaseController
{
    use ResponseTrait;

    protected $kategori_expense, $expenses, $dompet;
    public function __construct()
    {
        $this->kategori_expense = new KategoriExpensesModel();
        $this->expenses = new ExpensesModel();
        $this->dompet = new DompetModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Expenses',
            'deskripsi' => "Kelola dan pantau semua pengeluaran Anda dengan mudah, lengkap dengan detail kategori dan periode.",
            'kategori_expense' => $this->kategori_expense->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            'expenses' => $this->expenses
                                ->join('kategori_expenses', 'kategori_expenses.id=expenses.id_kategori_expenses')
                                // ->where('date_expenses', date('Y-m'))
                                ->where('date_expenses >=', date('Y-m-01'))
                                ->where('date_expenses <=', date('Y-m-t'))
                                ->where('id_user', session()->get('id'))
                                ->findAll(),
            'dompet' => $this->dompet->userDompet()
        ];
        return view('expense/index', $data);
    }

    public function fetchExpenses()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $data = $this->expenses->getExpenses($dari, $sampai);
        return $this->respond($data);
    }

    public function saveExpenses()
    {
        $data = [
            'id_kategori_expenses' => $this->request->getPost('kategori'),
            'name_expenses' => $this->request->getPost('name'),
            'amount' => $this->request->getPost('jumlah'),
            'id_dompet' => $this->request->getPost('dompet'),
            'description' => $this->request->getPost('catatan'),
            'date_expenses' => $this->request->getPost('tanggal'),
            'slug' => $this->generateSlug($this->request->getPost('name')),
            'id_user' => session()->get('id')
        ];

        // return $this->respond($data);
        if(!empty($data['id_dompet'])){
            $dompet = $this->dompet->find($data['id_dompet']);
            if($dompet && $dompet['saldo'] >= $data['amount']){
                $this->dompet->updateSaldo($data['id_dompet'], $data['amount'], 'expense');
            }else{
                return $this->response->setJSON([
                    'message' => throw new \Exception("Saldo dompet tidak mencukupi untuk transaksi ini! Don't manipulate data")
                ]);
            }
        }
        $this->expenses->save($data);
        return $this->respondCreated($data);
        // return $this->response->setJSON([
        //     'id_dompet' => $data['id_dompet']
        // ]);
    }

    // api expenses
    public function getTopKategori()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $data = $this->expenses->topKategori($dari, $sampai);
        return $this->respond($data);
    }

    public function getExpensesKategori()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $expenses = $this->expenses->getExpensesGrouped($dari,$sampai);

        // Format data untuk frontend
        $data = [
            'labels' => array_column($expenses, 'kategori'),
            'values' => array_column($expenses, 'total_expenses'),
        ];

        return $this->respond($data);
    }

    public function getAnalysisExpenses()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        // Total pengeluaran per kategori
        $expensesByCategory = $this->expenses->getExpensesGrouped($dari,$sampai);

        // Total keseluruhan pengeluaran
        $totalExpenses = $this->expenses->getTotalExpenses($dari, $sampai)['amount'];

        // Hitung persentase dan rekomendasi
        $analysis = [];
        foreach ($expensesByCategory as $expense) {
            $percentage = ($expense['total_expenses'] / $totalExpenses) * 100;
            $recommendation = $this->generateRecommendation($expense['kategori'], $percentage);
            $analysis[] = [
                'category' => $expense['kategori'],
                'total' => $expense['total_expenses'],
                'percentage' => $percentage,
                'recommendation' => $recommendation,
            ];
        }

        return $this->respond($analysis);
    }

    private function generateRecommendation($category, $percentage)
    {
        $percentage = number_format($percentage,2);
        if ($percentage > 30) {
            return "Pengeluaran pada kategori <span class='fw-bold'>$category</span> cukup besar. Pertimbangkan untuk mengurangi agar lebih hemat (<span class='text-danger'>$percentage%</span>).";
        } elseif ($percentage > 20) {
            return "Pengeluaran kategori <span class='fw-bold'>$category</span> bisa sedikit dikurangi untuk meningkatkan tabungan ($percentage%).";
        } else {
            return "Pengeluaran kategori <span class='fw-bold'>$category</span> masih dalam batas wajar ($percentage%).";
        }
    }

    public function getComparisonData()
    {
        // Hitung bulan sekarang dan bulan lalu
        $currentMonth = date('Y-m');
        // $lastMonth = date('Y-m', strtotime('-1 month'));
        $lastMonth = date('Y-m', strtotime('first day of previous month'));

        // Ambil total pengeluaran bulan ini dan bulan lalu menggunakan model
        $currentMonthTotal = $this->expenses->getTotalByMonth($currentMonth);
        $lastMonthTotal = $this->expenses->getTotalByMonth($lastMonth);

        // Kirim data ke frontend
        return $this->response->setJSON([
            'currentMonth' => (float) $currentMonthTotal,
            'lastMonth' => (float) $lastMonthTotal,
            'liatLastMonth' => $lastMonth,
            'liatCurrentMonth' => $currentMonth
        ]);
    }

    // soft delete
    public function deletedTransaksiExpense()
    {
        $slug = $this->request->getPost('slug');
        $status = $this->request->getPost('status');
        $data = $this->expenses->where('slug', $slug)->get()->getRowArray();
        if($data){
            $this->expenses->delete($data['id']);
        }
        return $this->response->setJSON([
            'data' => $data['created_at'],
            'slug' => $slug
        ]);
    }

    // data untuk grafik trends pengeluaran
    public function trendsExpense(){
        $data = $this->expenses->getDataExpense();
        return $this->response->setJSON([
            'nama' => array_column($data, 'bulan_tahun'),
            'nilai' => array_column($data, 'total')
        ]);
    }
}
