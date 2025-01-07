<?php

namespace App\Controllers;
use Codeigniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SavingsModel;
use App\Models\CicilanSavingModel;

class Savings extends BaseController
{
    use ResponseTrait;

    protected $savings, $kategori_income, $kategori_expense, $savingsDetail;
    public function __construct(){
        $this->savings = new SavingsModel();
        $this->savingsDetail = new CicilanSavingModel();
    }

    public function index($id)
    {
        $data = [
            'title' => "Savings Detail",
            'savings' => $this->savings->where('id_user', session()->get('id'))->find($id)
        ];
        return view('savings/savings_detail', $data);
    }

    public function fetchSavings($id)
    {
        $data = $this->savings->where('id_user', session()->get('id'))->find($id);
        return $this->respond($data);
    }

    public function savingdetail($id)
    {
        $data = $this->savingsDetail->getSavingsDetail($id);
        return $this->respond($data);
    }

    public function saveInstallment()
    {
        $id = $this->request->getPost('id');
        $saving=$this->savings->find($id);
        $total_saved = $saving['total_saved'];
        $dataSavings = [
            'total_saved' => $total_saved + (int) $this->request->getPost('jmlcicilan')
        ];
        $data = [
            'id_savings' => $this->request->getPost('id'),
            'jml_cicilan' => $this->request->getPost('jmlcicilan'),
            'catatan' => $this->request->getPost('catatan'),
            'tanggal' => date('Y-m-d'),
            'slug' => $this->generateSlug(date('Y-m-d')),
            'status_cicilan' => 1,
            'total_saved' => $total_saved + (int) $this->request->getPost('jmlcicilan'),
            'id_user' => session()->get('id')
        ];
        $this->savings->update($id, $dataSavings);
        $this->savingsDetail->save($data);
        return $this->respondCreated($data);
        // return $this->respond($data);
    }


    public function createSavings($id = null)
    {
        if($id === null){
            $saved = 0;
        }else{
            $dataSaving = $this->savings->find($id);
            if($dataSaving['total_saved'] > 0){
                $saved = $dataSaving['total_saved'];
            }else{
                $saved = 0;
            }
        }
        // return $this->respond($saved);
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

            // return $this->respond($data);
        if($id === null){
            $this->savings->insert($data);
            return $this->respondCreated($data);
        }else{
            $this->savings->update($id, $data);
            return $this->respondCreated($data);
        }
    }

}
