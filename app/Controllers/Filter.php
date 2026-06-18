<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\IncomeModel;
use App\Models\ExpensesModel;

class Filter extends BaseController
{
    protected $income, $expense;
    public function __construct()
    {
        $this->income = new IncomeModel();
        $this->expense = new ExpensesModel();
    }

    public function index()
    {
        // terima tanggal
        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');
        $filter = $this->request->getPost('filter');
        $kategori = $this->request->getPost('kategori');


        $allData = $this->income->gabungData($startdate, $enddate, $filter, $kategori);
        $incomeExpense = $this->income->gabungData($startdate, $enddate, $filter, $kategori);
        // dd($allData);

        // urutkan berdasarkan nilai besar ke kecil
        usort($allData, function($a, $b){
            return $b['amount'] <=> $a['amount'];
        });

        // urutkan berdasarkan tanggal terbaru ke terlama
        usort($incomeExpense, function($a, $b){
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        $totalAmount = array_reduce($incomeExpense, function ($carry, $item) {
            return $carry + $item['amount'];
        }, 0);
        
        $jmlTrx = count($incomeExpense);

        //
        $data = [
            'kategori' => $this->income->gabungDataKategori($startdate, $enddate, $filter, $kategori),
            'expenseIncome' => $incomeExpense,
            'jmltrx' => $jmlTrx,
            'totalAmount' => $totalAmount,
            'bigToSmall' => $allData,
            'allIncome' => $this->income->getIncomeData($startdate, $enddate, $filter, $kategori),
            'allExpense' => $this->income->getExpensesData($startdate, $enddate, $filter, $kategori),
        ];

        return view('filter/index_dashboard', $data);
    }

    public function resetDashboard()
    {
        $allData = $this->income->gabungData();
        $incomeExpense = $this->income->gabungData();
        $jmlTrx = count($incomeExpense);

        // $totalTransaksi = $this->income->gabungData();
        $totalAmount = array_reduce($allData, function ($carry, $item) {
            return $carry + $item['amount'];
        }, 0);

        usort($allData, function($a, $b){
            return $b['amount'] <=> $a['amount'];
        });
        usort($incomeExpense, function($a, $b){
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        $perPage = 16;
        $perPageA = 8;
        
        // pagination A
        $page = $this->request->getVar('pageA') ?? 1; // Halaman saat ini (default 1)
        // Total data
        $totalData = count($incomeExpense);
        // Menentukan offset untuk pagination
        $offset = ($page - 1) * $perPageA;
        // Data untuk halaman saat ini
        $currentData = array_slice($incomeExpense, $offset, $perPageA);

        // pagination B
        $pageB = $this->request->getVar('pageB') ?? 1;
        $totalDataB = count($allData);
        $offsetB = ($pageB - 1) * $perPage;
        $currentDataB = array_slice($allData, $offsetB, $perPage);

        $data = [
            'kategori' => $this->income->gabungDataKategori(),
            'expenseIncome' => $currentData,
            'jmltrx' => $jmlTrx,
            'totalAmount' => $totalAmount,
            'bigToSmall' => $currentDataB,
            'allIncome' => $this->income->getIncomeData(),
            'allExpense' => $this->income->getExpensesData(),
            'pagerA' => [
                'total' => $totalData,
                'perPage' => $perPageA,
                'currentPage' => $page,
                'totalPages' => ceil($totalData / $perPageA),
            ],
            'pagerB' => [
                'total' => $totalDataB,
                'perPage' => $perPage,
                'currentPage' => $pageB,
                'totalPages' => ceil($totalDataB / $perPage),
            ],
        ];
        return view('filter/reset_dashboard', $data);
    }

    public function chartDashboard($startdate, $enddate){
        // $startdate = $this->request->getPost('startdate');
        // $enddate = $this->request->getPost('enddate');

        // Data kategori pemasukan dan pengeluaran
        $incomeCategories = $this->income->getIncomeByCategory($startdate, $enddate);
        $expenseCategories = $this->expense->getExpenseByCategory($startdate, $enddate);
        $incomeCategoriesChart = $this->income->getChartIncome($startdate, $enddate);
        $expenseCategoriesChart = $this->expense->getChartExpense($startdate, $enddate);

        // $groupIncomeCategories = array_reduce($incomeCategoriesChart, function($carry, $item){
        //     $carry[$item['kategori']][] = $item;
        //     return $carry;
        // }, []);

        // $groupExpenseCategories = array_reduce($expenseCategoriesChart, function($carry, $item){
        //     $carry[$item['kategori']][] = $item;
        //     return $carry;
        // }, []);

        // d($groupExpenseCategories);
        // d($groupIncomeCategories);

        $data = [
            'incomeCategories' => $incomeCategories,
            'expenseCategories' => $expenseCategories
        ];

        return view('filter/chart_dashboard', $data);
    }

    public function chartDash()
    {
        $startdate = $this->request->getPost('startdate');
        $enddate = $this->request->getPost('enddate');
        
        $incomeCategories = $this->income->getIncomeByCategory($startdate, $enddate);
        $expenseCategories = $this->expense->getExpenseByCategory($startdate, $enddate);

        return $this->response->setJSON([
            'message' => 'berhasil',
            'incomeCategories' => $incomeCategories,
            'expenseCategories' => $expenseCategories
        ]);
    }
}
