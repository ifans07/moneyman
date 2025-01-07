<?php

namespace App\Models;

use CodeIgniter\Model;

class ExpensesModel extends Model
{
    protected $table            = 'expenses';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'id_kategori_expenses', 'name_expenses', 'amount', 'description', 'date_expenses', 'status', 'slug', 'deleted_at'];

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

    public function getExpenses($dari='Y-m-01', $sampai='Y-m-t')
    {
        return $this->select('id_user, id_kategori_expenses, name_expenses, amount, description, date_expenses, status, expenses.slug, kategori, icon')
        ->join('kategori_expenses', 'kategori_expenses.id=expenses.id_kategori_expenses')
        // ->where('DATE_FORMAT(date_expenses, "%Y-%m")', date('Y-m'))
        ->where('date_expenses >=', date($dari))
        ->where('date_expenses <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->orderBy('date_expenses', 'DESC')
        ->findAll();
    }

    public function topKategori($dari, $sampai)
    {
        return $this->db->table($this->table)
        ->select('id_kategori_expenses, name_expenses, kategori, SUM(amount) as total_expenses, date_expenses')
        ->join('kategori_expenses','kategori_expenses.id=expenses.id_kategori_expenses')
        ->groupBy('kategori_expenses.kategori')
        ->orderBy('total_expenses', 'DESC')
        // ->where('DATE_FORMAT(date_expenses, "%Y-%m")', date('Y-m'))
        ->where('date_expenses >=', date($dari))
        ->where('date_expenses <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->where('expenses.deleted_at', null)
        ->limit(1)
        ->get()
        ->getRowArray();
    }

    public function getExpensesGrouped($dari,$sampai)
    {
        return $this
        ->select('id_kategori_expenses, name_expenses, kategori, SUM(amount) as total_expenses, date_expenses')
        ->join('kategori_expenses','kategori_expenses.id=expenses.id_kategori_expenses')
        ->groupBy('kategori_expenses.kategori')
        // ->where('DATE_FORMAT(date_expenses, "%Y-%m")', date('Y-m'))
        ->where('date_expenses >=', date($dari))
        ->where('date_expenses <=', date($sampai))
        ->where('id_user', session()->get('id'))
        ->findAll();
    }

    // Hitung total pengeluaran
    public function getTotalExpenses($dari, $sampai)
    {
        return $this->selectSum('amount')
            // ->where('DATE_FORMAT(date_expenses, "%Y-%m")', date('Y-m'))
            ->where('date_expenses >=', date($dari))
            ->where('date_expenses <=', date($sampai))
            ->where('id_user', session()->get('id'))
            ->first();
    }

    // total pengeluaran by bulan
    public function getTotalByMonth($month)
    {
        return $this->select('SUM(amount) as total')
            ->where('DATE_FORMAT(date_expenses, "%Y-%m")', $month)
            ->where('id_user', session()->get('id'))
            ->where('deleted_at', null)
            ->get()
            ->getRow()
            ->total ?? 0; // Kembalikan 0 jika tidak ada data
    }

    // dashboard
    public function getTotalExpensesDay()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_expenses, "%Y-%m-%d")', date('Y-m-d'))->where('id_user', session()->get('id'))->first();
    }

    public function getTotalExpensesMonth()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_expenses, "%Y-%m")', date('Y-m'))->where('id_user', session()->get('id'))->first();
    }

    public function getTotalExpensesYear()
    {
        return $this->selectSum('amount')->where('DATE_FORMAT(date_expenses, "%Y")', date('Y'))->where('id_user', session()->get('id'))->first();
    }

    public function getMonthlyExpenses()
    {
        // return $this->select("DATE_FORMAT(date_expenses, '%Y-%m') as month_expense, SUM(amount) as total_expenses")
        return $this->select("MONTH(date_expenses) as month_expense, SUM(amount) as total_expenses")
        ->where('id_user', session()->get('id'))
        ->where('deleted_at', null)
        ->groupBy("month_expense")
        ->orderBy('date_expenses', 'ASC')
        ->get()
        ->getResultArray();
    }

    public function getMonthlyExpenseAnalisis($userId)
    {
        return $this->db->table('expenses')
            ->select("DATE_FORMAT(date_expenses, '%Y-%m') as bulan, SUM(amount) as total")
            ->where('id_user', $userId)
            ->where('deleted_at', null)
            ->groupBy('bulan')
            ->orderBy('bulan', 'ASC')
            ->get()
            ->getResultArray();
    }


    // data kalendar dan analisis
    public function getTotalExpenseAnalisis()
    {
        return $this->db->table('expenses')
            ->selectSum('amount')
            ->where('id_user', session()->get('id'))
            ->where('deleted_at', null)
            ->get()
            ->getRow()->amount;
    }

    public function getExpenseByCategory($userId)
    {
        return $this->db->table('expenses')
            ->select('kategori, SUM(amount) as total')
            ->join('kategori_expenses', 'kategori_expenses.id = expenses.id_kategori_expenses')
            ->where('id_user', $userId)
            ->where('expenses.deleted_at', null)
            ->groupBy('kategori')
            ->get()
            ->getResultArray();
    }

    public function getScrollableDataExpense()
    {
        $builder = $this->db->table($this->table);
        $builder->select("DATE_FORMAT(date_expenses, '%b %Y') AS bulan_tahun, SUM(amount) AS total, 0 as jenis");
        $builder->where('id_user', session()->get('id'));
        $builder->where('deleted_at', null);
        $builder->groupBy("YEAR(date_expenses), MONTH(date_expenses)");
        $builder->orderBy("YEAR(date_expenses), MONTH(date_expenses)");
        return $builder->get()->getResultArray();
    }

    public function getScrollableDataIncome()
    {
        $builder = $this->db->table('income');
        $builder->select("DATE_FORMAT(date_income, '%b %Y') AS bulan_tahun, SUM(amount) AS total, 1 as jenis");
        $builder->where('id_user', session()->get('id'));
        $builder->where('deleted_at', null);
        $builder->groupBy("YEAR(date_income), MONTH(date_income)");
        $builder->orderBy("YEAR(date_income), MONTH(date_income)");
        return $builder->get()->getResultArray();
    }

    public function gabungDataScrollable()
    {
        $dataA = $this->getScrollableDataExpense();
        $dataB = $this->getScrollableDataIncome();

        // Menggabungkan hasil dari dua query
        $combinedData = array_merge($dataA, $dataB);

        return $combinedData;
    }

}
