<?php

namespace App\Models;

use CodeIgniter\Model;

class DompetModel extends Model
{
    protected $table            = 'dompet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'nama_dompet', 'saldo', 'saldo_awal', 'slug', 'status'];

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

    public function userDompet()
    {
        return $this->db->table($this->table)
        ->where('id_user', session()->get('id'))
        ->get()
        ->getResultArray();
    }

    public function saldoTotal()
    {
        return $this->db->table($this->table)
        ->selectSum('saldo')->where('id_user', session()->get('id'))->get()->getRow()->saldo ?? 0;
    }

    public function saldoAwalTotal()
    {
        return $this->db->table($this->table)
        ->selectSum('saldo_awal')->where('id_user', session()->get('id'))->get()->getRow()->saldo_awal ?? 0;
    }

    public function updateSaldo($dompetId, $amount, $type = 'income')
    {
        $dompet = $this->find($dompetId);
        if(!$dompet) return false;

        $newSaldo = ($type == 'income')? $dompet['saldo'] + $amount : $dompet['saldo'] - $amount;
        return $this->update($dompetId, ['saldo' => $newSaldo]);
    }

    public function findDompet($slug)
    {
        return $this
        ->where('id_user', session()->get('id'))
        ->where('slug', $slug)
        ->first();
    }
}
