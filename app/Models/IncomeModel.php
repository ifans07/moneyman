<?php

namespace App\Models;

use CodeIgniter\Model;

class IncomeModel extends Model
{
    protected $table            = 'income';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_kategori_income', 'name_income', 'amount', 'description', 'date_income', 'status', 'slug'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getIncome($dari='Y-m-01', $sampai='Y-m-t')
    {
        return $this->select('id_user, id_kategori_income, kategori, icon, name_income, amount, description, date_income, status, income.slug')
        ->join('kategori_income', 'kategori_income.id=income.id_kategori_income')
        // ->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))
        ->where('date_income >=', date($dari))
        ->where('date_income <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->orderBy('date_income', 'DESC')
        ->findAll();
    }

    public function topKategori($dari, $sampai)
    {
        return $this->db->table($this->table)
        ->select('id_kategori_income, name_income, kategori, SUM(amount) as total_income, date_income')
        ->join('kategori_income','kategori_income.id=income.id_kategori_income')
        ->groupBy('kategori_income.kategori')
        ->orderBy('total_income', 'DESC')
        // ->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))
        ->where('date_income >=', date($dari))
        ->where('date_income <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->limit(1)
        ->get()
        ->getRowArray();
    }

    public function getIncomeGrouped($dari,$sampai)
    {
        return $this
        ->select('id_kategori_income, name_income, kategori, SUM(amount) as total_income, date_income')
        ->join('kategori_income','kategori_income.id=income.id_kategori_income')
        ->groupBy('kategori_income.kategori')
        // ->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))
        ->where('date_income >=', date($dari))
        ->where('date_income <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->findAll();
    }

    // Hitung total pengeluaran
    public function getTotalIncome($dari, $sampai)
    {
        return $this->selectSum('amount')
            // ->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))
            ->where('date_income >=', date($dari))
            ->where('date_income <=', date($sampai))
            ->where('id_user', session()->get('id'))
            ->first();
    }

    // total pengeluaran by bulan
    public function getTotalByMonth($month)
    {
        return $this->select('SUM(amount) as total')
            ->where('DATE_FORMAT(date_income, "%Y-%m")', $month)
            ->where('id_user', session()->get('id'))
            ->where('deleted_at', null)
            ->get()
            ->getRow()
            ->total ?? 0; // Kembalikan 0 jika tidak ada data
    }

    // dashboard
    public function getTotalIncomeDay()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_income, "%Y-%m-%d")', date('Y-m-d'))->where('id_user', session()->get('id'))->first();
    }

    public function getTotalIncomeMonth()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))->where('id_user', session()->get('id'))->first();
    }

    public function getTotalIncomeYear()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_income, "%Y")', date('Y'))->where('id_user', session()->get('id'))->first();
    }

    public function getIncomeData()
    {
        return $this->db->table('income')
        ->select('id_kategori_income as id_kategori, kategori, icon, name_income as name, amount, description, date_income as tanggal, 1 as status, income.slug as slug')
        ->join('kategori_income', 'kategori_income.id=income.id_kategori_income')
        ->where('id_user', session()->get('id'))
        ->where('income.deleted_at', null)
        ->orderBy('tanggal', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function getExpensesData()
    {
        return $this->db->table('expenses')
        ->select('id_kategori_expenses as id_kategori, kategori, icon, name_expenses as name, amount, description, date_expenses as tanggal, 0 as status, expenses.slug as slug')
        ->join('kategori_expenses', 'kategori_expenses.id=expenses.id_kategori_expenses')
        ->where('id_user', session()->get('id'))
        ->where('expenses.deleted_at', null)
        ->orderBy('tanggal', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function gabungData()
    {
        $dataA = $this->getIncomeData();
        $dataB = $this->getExpensesData();

        // Menggabungkan hasil dari dua query
        $combinedData = array_merge($dataA, $dataB);

        return $combinedData;
    }

    public function getMonthlyIncome()
    {
        // return $this->select("DATE_FORMAT(date_income, '%Y-%m') as month_income, SUM(amount) as total_income")
        return $this->select("MONTH(date_income) as month_income, SUM(amount) as total_income")
        ->where('id_user', session()->get('id'))
        ->where('deleted_at', null)
        ->groupBy("month_income")
        ->orderBy('date_income', 'ASC')
        ->get()
        ->getResultArray();
    }

    public function getMonthlyIncomeAnalisis($userId)
    {
        return $this->db->table('income')
            ->select("DATE_FORMAT(date_income, '%Y-%m') as bulan, SUM(amount) as total")
            ->where('id_user', $userId)
            ->where('deleted_at', null)
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function topKategoriIncome()
    {
        return $this->db->table('income')
        ->select('id_kategori_income, name_income, kategori, SUM(amount) as total_income, date_income, 1 as status')
        ->join('kategori_income','kategori_income.id=income.id_kategori_income')
        ->groupBy('kategori_income.kategori')
        ->orderBy('total_income', 'DESC')
        ->where('id_user', session()->get('id'))
        ->where('income.deleted_at', null)
        ->get()
        ->getResultArray();
    }
    
    public function topKategoriExpenses()
    {
        return $this->db->table('expenses')
        ->select('id_kategori_expenses, name_expenses, kategori, SUM(amount) as total_expenses, date_expenses, 0 as status')
        ->join('kategori_expenses','kategori_expenses.id=expenses.id_kategori_expenses')
        ->groupBy('kategori_expenses.kategori')
        ->orderBy('total_expenses', 'DESC')
        ->where('id_user', session()->get('id'))
        ->where('expenses.deleted_at', null)
        ->get()
        ->getResultArray();
    }

    public function gabungDataKategori()
    {
        $dataA = $this->topKategoriIncome();
        $dataB = $this->topKategoriExpenses();

        // Menggabungkan hasil dari dua query
        $combinedData = array_merge($dataA, $dataB);

        return $combinedData;
    }

    public function getDailyIncome()
    {
        return $this->db->table('income')
        ->select('id_kategori_income as id_kategori, kategori, icon, name_income as name, SUM(amount) as total, description, date_income as tanggal, 1 as status')
        ->join('kategori_income', 'kategori_income.id=income.id_kategori_income')
        ->where('id_user', session()->get('id'))
        ->where('income.deleted_at', null)
        ->groupBy('tanggal')
        ->get()
        ->getResultArray();
    }
    public function getDailyExpense()
    {
        return $this->db->table('expenses')
        ->select('id_kategori_expenses as id_kategori, kategori, icon, name_expenses as name, SUM(amount) as total, description, date_expenses as tanggal, 0 as status')
        ->join('kategori_expenses', 'kategori_expenses.id=expenses.id_kategori_expenses')
        ->where('id_user', session()->get('id'))
        ->where('expenses.deleted_at', null)
        ->groupBy('tanggal')
        ->get()
        ->getResultArray();
    }
    public function gabungDailyTransaksi()
    {
        $dataA = $this->getDailyIncome();
        $dataB = $this->getDailyExpense();

        // Menggabungkan hasil dari dua query
        $combinedData = array_merge($dataA, $dataB);

        // Mengurutkan berdasarkan tanggal
        usort($combinedData, function ($a, $b) {
            return strtotime($a['tanggal']) - strtotime($b['tanggal']);
        });

        return $combinedData;
    }

    // data kalendar & analisis
    public function getTotalIncomeAnalisis()
    {
        return $this->db->table('income')
            ->selectSum('amount')
            // ->where('DATE_FORMAT(date_income, "%Y-%m")', date('Y-m'))
            ->where('id_user', session()->get('id'))
            ->where('deleted_at', null)
            ->get()
            ->getRow()->amount;
    }

    public function getIncomeByCategory($userId)
    {
        return $this->db->table('income')
            ->select('kategori, SUM(amount) as total')
            ->join('kategori_income', 'kategori_income.id = income.id_kategori_income')
            ->where('id_user', $userId)
            ->where('income.deleted_at', null)
            ->groupBy('kategori')
            ->get()
            ->getResultArray();
    }

}
