<?php

namespace App\Controllers;
use Codeigniter\API\ResponseTrait;
use App\Models\KategoriIncomeModel;
use App\Models\KategoriExpensesModel;
use App\Models\SavingsModel;
use App\Models\ExpensesModel;
use App\Models\IncomeModel;

class Home extends BaseController
{
    use ResponseTrait;

    protected $kategori_income, $kategori_expense, $savings, $expenses, $income;

    public function __construct()
    {
        $this->kategori_income = new KategoriIncomeModel();
        $this->kategori_expense = new KategoriExpensesModel();
        $this->savings = new SavingsModel();
        $this->expenses = new ExpensesModel();
        $this->income = new IncomeModel();
    }

    private function getAllMonths()
    {
        $period = new \DatePeriod(
            new \DateTime(date('2024-01-m')),
            new \DateInterval('P1M'),
            (new \DateTime(date('Y-12-d')))->modify('first day of next month')
        );

        $months = [];
        foreach ($period as $date) {
            $months[] = $date->format('M Y'); // Format seperti "Jan 2024"
        }

        return $months;
    }

    public function index(): string
    {
        $keluar = $this->expenses->getMonthlyExpenses();
        $masuk = $this->income->getMonthlyIncome();
        // $dataExpenses = array_map(fn($row) => $row['total_expenses'], $keluar);
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Inisialisasi data default
        $dataPerMonthIncome = array_fill(0, 12, 0);
        $dataPerMonthExpense = array_fill(0, 12, 0);

        // Map data dari database ke array bulan
        foreach ($keluar as $expense) {
            $monthIndex = intval($expense['month_expense']) - 1; // Bulan dalam database (1-12)
            $dataPerMonthExpense[$monthIndex] = $expense['total_expenses'];
        }
        foreach ($masuk as $income) {
            $monthIndex = intval($income['month_income']) - 1; // Bulan dalam database (1-12)
            $dataPerMonthIncome[$monthIndex] = $income['total_income'];
        }

        $allData = $this->income->gabungData();
        $incomeExpense = $this->income->gabungData();

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

        $perPage = 10;
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

        $labels = [];
        $incomeValues = [];
        $expenseValues = [];
        $dataBulan = $this->expenses->gabungDataScrollable();
        $allMonths = $this->getAllMonths();

            // Format data hasil query menjadi array dengan bulan sebagai kunci
            $incomeArray = [];
            $expenseArray = [];

            // Isi data dengan nilai 0 untuk bulan yang tidak ada transaksi
            $incomeValues = [];
            $expenseValues = [];
            // foreach ($allMonths as $month) {
            //     $incomeValues[] = $incomeArray[$month] ?? 0;
            //     $expenseValues[] = $expenseArray[$month] ?? 0;
            // }

        foreach ($dataBulan as $row) {
            if (!in_array($row['bulan_tahun'], $labels)) {
                $labels[] = $row['bulan_tahun'];
            }
            
            if ($row['jenis'] == '1') {
                $incomeArray[$row['bulan_tahun']] = $row['total'];
            } elseif ($row['jenis'] == '0') {
                $expenseArray[$row['bulan_tahun']] = $row['total'];
            }
        }

        foreach($allMonths as $month)
        {
            $incomeValues[] = $incomeArray[$month] ?? 0;
            $expenseValues[] = $expenseArray[$month] ?? 0;
        }

        // Data kategori pemasukan dan pengeluaran
        $incomeCategories = $this->income->getIncomeByCategory(session()->get('id'));
        $expenseCategories = $this->expenses->getExpenseByCategory(session()->get('id'));

        // d(date('Y-m-d'));
        // d($allMonths);
        // d($labels);
        // d($incomeValues);
        // d($incomeArray);
        // d($expenseArray);
        // dd($expenseValues);
        
        $data = [
            'title' => 'Dashboard',
            'incomeDay' => $this->income->getTotalIncomeDay(),
            'incomeMonth' => $this->income->getTotalIncomeMonth(),
            'incomeYear' => $this->income->getTotalIncomeYear(),
            'expenseDay' => $this->expenses->getTotalExpensesDay(),
            'expenseMonth' => $this->expenses->getTotalExpensesMonth(),
            'expenseYear' => $this->expenses->getTotalExpensesYear(),
            // 'expenseIncome' => $this->income->gabungData(),
            // 'expenseIncome' => $incomeExpense,
            'expenseIncome' => $currentData,
            'allIncome' => $this->income->getIncomeData(),
            'allExpense' => $this->income->getExpensesData(),
            'kategori_expense' => $this->kategori_expense->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            'kategori_income' => $this->kategori_income->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            // 'monthlyexpenses' => json_encode($dataPerMonthExpense),
            // 'monthlyincome' => json_encode($dataPerMonthIncome),
            'monthlyexpenses' => json_encode($expenseValues),
            'monthlyincome' => json_encode($incomeValues),
            // 'labels' => json_encode($months),
            // 'labels' => json_encode($labels),
            'labels' => json_encode($allMonths),
            // 'bigToSmall' => $allData,
            'bigToSmall' => $currentDataB,
            'kategori' => $this->income->gabungDataKategori(),
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
            'totalAmount' => $totalAmount,
            'incomeCategories' => $incomeCategories,
            'expenseCategories' => $expenseCategories
        ];
        // dd($data);
        return view('dashboard', $data);
    }

    public function kategori()
    {
        $data = [
            'title' => 'Kategori',
            'deskripsi' => "Buat, ubah, dan hapus kategori untuk membantu mengorganisir pemasukan serta pengeluaran Anda secara terstruktur."
        ];
        return view('kategori', $data);
    }

    // Kategori
    public function fetchCategory()
    {
        return $this->response->setJSON([
            'k_income' => $this->kategori_income->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll(),
            'k_expense' => $this->kategori_expense->orderBy("CASE WHEN kategori = 'Lain-lain' THEN 1 ELSE 0 END", 'ASC')->orderBy('kategori', 'ASC')->findAll()
        ]);
    }

    public function createCategory($id = null)
    {
        // $id = $this->request->getPost('')
        $tipeKategori = $this->request->getPost('type');
        $data = [
            'kategori' => $this->request->getPost('name'),
            'slug' => $this->generateSlug($this->request->getPost('name')),
            'icon' => $this->request->getPost('icon_class')
        ];
        if($id === null){
            if($tipeKategori == 'income'){
                $this->kategori_income->insert($data);
                return $this->respondCreated($data);
            }else{
                // $data = [
                //     'kategori' => $this->request->getPost('name'),
                //     'slug' => $this->generateSlug($this->request->getPost('name')),
                //     'icon' => $this->request->getPost('icon_class')
                // ];
    
                $this->kategori_expense->insert($data);
                return $this->respondCreated($data);
            }
        }else{
            if($tipeKategori == 'income'){
                $this->kategori_income->update($id, $data);
                return $this->respondCreated($data);
            }else{
                $this->kategori_expense->update($id, $data);
                return $this->respondCreated($data);
            }
        }
    }

    public function update($id, $type)
    {
        if($type == 'income'){
            $data = $this->kategori_income->find($id);
            return $this->respond($data);
        }else{
            $data = $this->kategori_expense->find($id);
            return $this->respond($data);
        }
    }

    public function delete($id, $type)
    {
        // $model = new CategoryModel();
        if($type == 'income'){
            $this->kategori_income->delete($id);
            return $this->respondDeleted(['id' => $id]);
        }else{
            $this->kategori_expense->delete($id);
            return $this->respondDeleted(['id' => $id]);
        }
    }

    // ambil icon
    public function getIcons()
    {
        
        // Path file JSON di folder public
        $jsonPath = FCPATH . 'icons\icon.json';
        // dd($jsonPath);

        // Periksa apakah file JSON ada
        if (!file_exists($jsonPath)) {
            // Kirimkan respons error jika file tidak ditemukan
            return $this->response->setJSON(['error' => 'File JSON tidak ditemukan.'], 404);
        }

        // Baca konten JSON
        $jsonContent = file_get_contents($jsonPath);
        $icons = json_decode($jsonContent, true);

        // Kirimkan response JSON dengan kode status 200
        return $this->response->setJSON($icons, 200);
    }

    // savings
    public function savings()
    {
        $data = [
            'title' => 'Tabungan Target',
            'deskripsi' => "Tetapkan target tabungan, lacak progres, dan rencanakan pencapaian finansial Anda secara bertahap."
        ];
        return view('savings', $data);
    }
    public function fetchSavings()
    {
        $data = $this->savings->where('id_user', session()->get('id'))->findAll();
        return $this->respond($data);
    }

    public function createSavings($id = null)
    {
        // $dataSaving = $this->savings->find($id);
        // if($dataSaving['total_saved'] > 0){
        //     $saved = $dataSaving['total_saved'];
        // }else{
        //     $saved = 0;
        // }
        // $saved += (int) str_replace(".","",$this->request->getPost('jml_cicilan'));
        $cicilan = (int) str_replace(".","",$this->request->getPost('jml_cicilan'));
        
        $data = [
            'goal_name' => $this->request->getPost('name'),
            'target_amount' => (int) str_replace(".","",$this->request->getPost('target_amount')),
            'start_date' => date('Y-m-d'),
            'frequency' => $this->request->getPost('period'),
            'total_saved' => $saved,
            'jml_cicilan' => $cicilan,
            'slug' => $this->generateSlug($this->request->getPost('name')),
            'icon' => $this->request->getPost('icon_class'),
            'id_user' => session()->get('id')
        ];
        return $this->respond($data);

            // return $this->respond($data);
        if($id === null){
            $this->savings->insert($data);
            return $this->respondCreated($data);
        }else{
            $this->savings->update($id, $data);
            return $this->respondCreated($data);
        }
    }

    public function updateSavings($id)
    {
        $data = $this->savings->find($id);
        return $this->respond($data);
    }

    public function deleteSavings($id)
    {
        $this->savings->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }

    // Khusus dashboard
    public function savingTransaksi()
    {
        $nominal = (int) str_replace(".","",$this->request->getPost('jml'));

        if(isset($_POST['save-pengeluaran'])){
            $data = [
                'id_kategori_expenses' => $this->request->getPost('kategori-pengeluaran'),
                'name_expenses' => $this->request->getPost('nama-pengeluaran'),
                'amount' => $nominal,
                'description' => $this->request->getPost('catatan-pengeluaran'),
                'date_expenses' => $this->request->getPost('tanggal-keluar'),
                'status' => 0,
                'slug' => $this->generateSlug($this->request->getPost('nama-pengeluaran')),
                'id_user' => session()->get('id')
            ];
            // dd($data);
            $this->expenses->save($data);
        }
        if(isset($_POST['save-pemasukan'])){
            $data = [
                'id_kategori_income' => $this->request->getPost('kategori-pemasukan'),
                'name_income' => $this->request->getPost('nama-pemasukan'),
                'amount' => $nominal,
                'description' => $this->request->getPost('catatan-pemasukan'),
                'date_income' => $this->request->getPost('tanggal-masuk'),
                'status' => 1,
                'slug' => $this->generateSlug($this->request->getPost('nama-pemasukan')),
                'id_user' => session()->get('id')
            ];
            // dd($data);
            $this->income->save($data);
        }

        return redirect()->to(base_url('/beranda'));
    }


    // Kalendar & analisis
    public function kalendarAnalisis()
    {
        // $transactionModel = new TransactionModel();

        // Ambil data transaksi (expense dan income) berdasarkan tanggal
        // $transactions = $transactionModel
        //     ->select('DATE(transaction_date) as date, SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as total_expense, SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) as total_income')
        //     ->groupBy('DATE(transaction_date)')
        //     ->findAll();

        // Format data untuk kalender
        $transactions = $this->income->gabungDailyTransaksi();
        $calendarData = [];
        // dd($transactions);
        foreach ($transactions as $transaction) {
            if($transaction['status'] == 1){
                $calendarData[$transaction['tanggal']] = [
                    'income' => $transaction['total'],
                    'expense' => 0
                ];
            }else{
                $calendarData[$transaction['tanggal']] = [
                    'expense' => $transaction['total'],
                    'income' => 0,
                ];
            }
        }

        $userId = session()->get('id');
        
        // Data ringkasan keuangan
        $totalIncome = $this->income->getTotalIncomeAnalisis();
        $totalExpense = $this->expenses->getTotalExpenseAnalisis();
        
        $savings = $totalIncome - $totalExpense;

        // Data kategori pemasukan dan pengeluaran
        $incomeCategories = $this->income->getIncomeByCategory($userId);
        $expenseCategories = $this->expenses->getExpenseByCategory($userId);

        // Tren bulanan
        $incomeTrends = $this->income->getMonthlyIncomeAnalisis($userId);
        $expenseTrends = $this->expenses->getMonthlyExpenseAnalisis($userId);

        // Prediksi
        $averageIncome = $totalIncome / 12; // Contoh: rata-rata pendapatan tahunan
        $averageExpense = $totalExpense / 12;
        $predictedSavings = $averageIncome - $averageExpense;

        // Peringatan pengeluaran
        $alert = ($totalExpense > $totalIncome) ? 'Pengeluaran melebihi pendapatan!' : '';

        $data = [
            'title' => 'Analisis Keuangan',
            'deskripsi' => "Analisis data keuangan Anda dengan grafik interaktif untuk memahami pola pengeluaran dan pemasukan secara mendalam.",
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'savings' => $savings,
            'incomeCategories' => $incomeCategories,
            'expenseCategories' => $expenseCategories,
            'incomeTrends' => $incomeTrends,
            'expenseTrends' => $expenseTrends,
            'predictedSavings' => $predictedSavings,
            'alert' => $alert,
            'calendarData' => json_encode($calendarData)
        ];

        // return view('calendar', ['calendarData' => json_encode($calendarData)]);
        return view('analisis/index', $data);
    }

    public function dataAnalisisKalendar()
    {
        $data = $this->income->gabungDailyTransaksi();

        return $this->response->setJSON($data);
    }

    // soft delete
    public function deletedTransaksi()
    {
        $model = new ExpensesModel();
        $slug = $this->request->getPost('slug');
        $status = $this->request->getPost('status');
        if($status == '1'){
            $data = $this->income->where('slug', $slug)->get()->getResultArray();
            if($data){
                $this->income->delete($data[0]['id']);
            }
        }else{
            $data = $this->expenses->where('slug', $slug)->get()->getResultArray();
            if($data){
                $this->expenses->delete($data[0]['id']);
            }
        }
        return $this->response->setJSON([
            'data' => $data[0]['id'],
            'slug' => $slug
        ]);
    }

}
