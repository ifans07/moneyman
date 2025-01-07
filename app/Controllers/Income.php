<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Codeigniter\API\ResponseTrait;
use App\Models\KategoriIncomeModel;
use App\Models\IncomeModel;

class Income extends BaseController
{
    use ResponseTrait;

    protected $income, $kategori_income;
    public function __construct()
    {
        $this->income = new IncomeModel();
        $this->kategori_income = new KategoriIncomeModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Income',
            'kategori_income' => $this->kategori_income->findAll(),
            'income' => $this->income->join('kategori_income', 'kategori_income.id=income.id_kategori_income')->where('date_income', date('Y-m'))->where('id_user',session()->get('id'))->findAll()
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
            'description' => $this->request->getPost('catatan'),
            'date_income' => $this->request->getPost('tanggal'),
            'slug' => $this->generateSlug($this->request->getPost('name')),
            'id_user' => session()->get('id')
        ];

        $this->income->save($data);
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
            return "Pemasukan pada kategori <span class='fw-bold'>$category</span> cukup besar. Pertimbangkan untuk mengurangi agar lebih hemat (<span class='text-success'>$percentage%</span>).";
        } elseif ($percentage > 20) {
            return "Pemasukan kategori <span class='fw-bold'>$category</span> bisa sedikit dikurangi untuk meningkatkan tabungan ($percentage%).";
        } else {
            return "Pemasukan kategori <span class='fw-bold'>$category</span> masih dalam batas wajar ($percentage%).";
        }
    }

    public function getComparisonData()
    {
        // Hitung bulan sekarang dan bulan lalu
        $currentMonth = date('Y-m');
        $lastMonth = date('Y-m', strtotime('-1 month'));

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
}
