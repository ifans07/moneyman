<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function daftar()
    {
        $data = [
            'title' => 'Daftar'
        ];
        return view('auth/daftar', $data);
    }
    public function save()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]|max_length[200]',
            'confirm_password' => 'matches[password]'
        ];

        if($this->validate($rules)){
            $data = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'slug' => $this->generateSlug($this->request->getPost('username')),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
            ];
            session()->setFlashdata('successDaftar','Daftar berhasil!<br> untuk melanjutkan Silakan login <strong>'.$this->request->getPost('username').'</strong>');
            $this->userModel->save($data);
            return redirect()->to('/auth/login');
        } else {
            $data['validation'] = $this->validator->getErrors();
            // $data['title'] = 'Daftar';
            // echo view('auth/daftar', $data);
            return redirect()->to(base_url('/auth/daftar'))->withInput()->with('gagal', $data);
            // return redirect()->back()->withInput()->with('gagal', $this->validator->getErrors());
        }
    }

    public function loginAuth()
    {
        $session = session();
        // $model = new PasienModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('username', $username)->orWhere('email', $username)->first();
        
        if($data['username'] === $username){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'isLoggedIn' => TRUE,
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'slug' => $data['slug'],
                    'status' => $data['status_user']
                    // 'nokk' => $data['NOKK'],
                    // 'nik' => $data['NIK'],
                    // 'email' => $data['email'],
                ];
                $session->set($ses_data);
                
                // if (!$this->pasienModel->isProfileComplete($data['id'])) {
                //     return redirect()->to('/pasien/lengkapi_profil');
                // }
                $session->setFlashdata('successLogin', 'Selamat datang');
                return redirect()->to(base_url('/beranda'));
            } else {
                $session->setFlashdata('msg', 'email atau password salah!');
                return redirect()->to(base_url('/auth/login'));
            }
        } else {
            $session->setFlashdata('msg', 'email atau password salah!');
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/auth/login'));
    }

    public function lupaPassword()
    {
        $data = [
            'title' => 'Lupa Password'
        ];
        return view('auth/lupa_password', $data);
    }
    public function generateResetToken()
    {
        $username = $this->request->getPost('username');

        // $userModel = new UserModel();
        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Nama pengguna tidak ditemukan!');
        }

        // Hasilkan token reset
        $resetToken = bin2hex(random_bytes(8)); // Token 16 karakter
        // d((int) $user['id']);
        // dd($resetToken);
        $this->userModel->update((int) $user['id'], ['reset_token' => $resetToken]);

        return view('auth/show_reset_token', [
            'resetToken' => $resetToken,
            'title' => 'Token Reset Password'
        ]);
    }

    public function resetForm()
    {
        $data = [
            'title' => 'Reset Form'
        ];
        return view('auth/reset_password', $data);
    }

    public function resetPassword()
    {
        $username = $this->request->getPost('username');
        $resetToken = $this->request->getPost('reset_token');
        $password = $this->request->getPost('password');

        // $userModel = new UserModel();
        $user = $this->userModel->where('username', $username)
                          ->where('reset_token', $resetToken)
                          ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Token reset tidak valid!');
        }

        // Reset password dan hapus token
        $this->userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => null
        ]);

        return redirect()->to(base_url('auth/login'))->with('success', 'Password berhasil direset. Silakan login.');
    }
}
