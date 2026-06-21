<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Codeigniter\API\ResponseTrait;
use App\Models\KategoriIncomeModel;
use App\Models\IncomeModel;
use App\Models\DompetModel;

class Income extends BaseController
{
    use ResponseTrait;

    protected $income, $kategori_income, $dompet;
    public function __construct()
    {
        $this->income = new IncomeModel();
        $this->kategori_income = new KategoriIncomeModel();
        $this->dompet = new DompetModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Income',
            'deskripsi' => "Catat semua sumber pemasukan Anda untuk memantau keuangan dan menganalisis pertumbuhan tabungan.",
            'kategori_income' => $this->kategori_income->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            'income' => $this->income->join('kategori_income', 'kategori_income.id=income.id_kategori_income')->join('dompet', 'dompet.id=income.id_dompet', 'left')->where('date_income >=', date('Y-m-01'))->where('date_income <=', date('Y-m-t'))->where('income.id_user',session()->get('id'))->findAll(),
            'dompet' => $this->dompet->userDompet()
        ];
        return view('income/index', $data);
    }

    public function fetchIncome()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $data = $this->income->getIncome($dari, $sampai);
        return $this->respond($data);
    }

    public function saveIncome()
    {
        $data = [
            'id_kategori_income' => $this->request->getPost('kategori'),
            'name_income' => $this->request->getPost('name'),
            'amount' => $this->request->getPost('jumlah'),
            'id_dompet' => $this->request->getPost('dompet'),
            'description' => $this->request->getPost('catatan'),
            'date_income' => $this->request->getPost('tanggal'),
            'slug' => $this->generateSlug($this->request->getPost('name')),
            'id_user' => session()->get('id')
        ];

        $this->income->save($data);
        if(!empty($data['id_dompet'])){
            $this->dompet->updateSaldo($data['id_dompet'], $data['amount'], 'income');
        }
        return $this->respondCreated($data);
        // return $this->respond($data);
    }

    // api income
    public function getTopKategori()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $data = $this->income->topKategori($dari, $sampai);
        return $this->respond($data);
    }

    public function getIncomeKategori()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        $income = $this->income->getIncomeGrouped($dari,$sampai);

        // Format data untuk frontend
        $data = [
            'labels' => array_column($income, 'kategori'),
            'values' => array_column($income, 'total_income'),
        ];

        return $this->respond($data);
    }

    public function getAnalysisIncome()
    {
        $dari = $this->request->getPost('tanggal1');
        $sampai = $this->request->getPost('tanggal2');

        // Total pemasukan per kategori
        $incomeByCategory = $this->income->getIncomeGrouped($dari,$sampai);

        // Total keseluruhan pemasukan
        $totalIncome = $this->income->getTotalIncome($dari, $sampai)['amount'];

        // Hitung persentase dan rekomendasi
        $analysis = [];
        foreach ($incomeByCategory as $expense) {
            $percentage = ($expense['total_income'] / $totalIncome) * 100;
            $recommendation = $this->generateRecommendation($expense['kategori'], $percentage);
            $analysis[] = [
                'category' => $expense['kategori'],
                'total' => $expense['total_income'],
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
            return "Pemasukan pada kategori <span class='fw-bold'>$category</span> cukup besar. Pertimbangkan uang tersebut untuk membeli aset riil (<span class='text-success'>$percentage%</span>).";
        } elseif ($percentage > 20) {
            return "Pemasukan kategori <span class='fw-bold'>$category</span> bisa menambahkan pemasukan dari hal lain (cari pasif income) ($percentage%).";
        } else {
            return "Pemasukan kategori <span class='fw-bold'>$category</span> alhamdulillah (syukuri) ($percentage%).";
        }
    }

    public function getComparisonData()
    {
        // Hitung bulan sekarang dan bulan lalu
        $currentMonth = date('Y-m');
        // $lastMonth = date('Y-m', strtotime('-1 month'));
        $lastMonth = date('Y-m', strtotime('first day of previous month'));

        // Ambil total pemasukan bulan ini dan bulan lalu menggunakan model
        $currentMonthTotal = $this->income->getTotalByMonth($currentMonth);
        $lastMonthTotal = $this->income->getTotalByMonth($lastMonth);

        // Kirim data ke frontend
        return $this->response->setJSON([
            'currentMonth' => (float) $currentMonthTotal,
            'lastMonth' => (float) $lastMonthTotal,
        ]);
    }

    // soft delete
    public function deletedTransaksiIncome()
    {
        $slug = $this->request->getPost('slug');
        $data = $this->income->where('slug', $slug)->get()->getRowArray();
        if($data){
            $this->income->delete($data['id']);
        }
        return $this->response->setJSON([
            'data' => $data['created_at'],
            'slug' => $slug
        ]);
    }

    // trends income data
    public function trendsIncome()
    {
        $data = $this->income->getDataIncome();
        return $this->response->setJSON([
            'nama' => array_column($data, 'bulan_tahun'),
            'nilai' => array_column($data, 'total')
        ]);
    }
}
