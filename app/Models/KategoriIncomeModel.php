<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriIncomeModel extends Model
{
    protected $table            = 'kategori_income';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['kategori', 'icon', 'slug'];

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

    public function getKategoriIncomeData()
    {
        return $this->db->table('kategori_income')
        ->select('id_kategori_income as id_kategori, kategori, icon, name_income as name, amount, description, date_income as tanggal, 1 as status')
        ->join('kategori_income', 'kategori_income.id=income.id_kategori_income')
        ->where('id_user', session()->get('id'))
        ->orderBy('tanggal', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function getKategoriExpensesData()
    {
        
        return $this->db->table('kategori_expenses')
        ->select('id_kategori_expenses as id_kategori, kategori, icon, name_expenses as name, amount, description, date_expenses as tanggal, 0 as status')
        ->join('kategori_expenses', 'kategori_expenses.id=expenses.id_kategori_expenses')
        ->where('id_user', session()->get('id'))
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
}
