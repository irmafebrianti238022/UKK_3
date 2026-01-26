<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function proses_login() {
        $model = new AdminModel();
        $user  = $this->request->getPost('username');
        $pass  = $this->request->getPost('password');
        
        // Cari admin berdasarkan username 
        $dataAdmin = $model->where('username', $user)->first();

        if ($dataAdmin) {
            // Verifikasi password hash
            if (password_verify($pass, $dataAdmin['password'])) {
                session()->set([
                    'id_admin'  => $dataAdmin['id_admin'],
                    'username'  => $dataAdmin['username'],
                    'logged_in' => true
                ]);
                return redirect()->to('/admin/dashboard');
            }
        }
        return redirect()->back()->with('error', 'Username atau Password salah!');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }

    //login siswa
    public function login_siswa() {
    return view('login_siswa');
   }

   public function proses_login_siswa() {
    $model = new \App\Models\SiswaModel();
    $nis   = $this->request->getPost('nis');
    
    // Mencari siswa berdasarkan NIS
    $dataSiswa = $model->where('nis', $nis)->first();

    if ($dataSiswa) {
        // Karena di SQL tidak ada kolom password, NIS digunakan sebagai kunci masuk
        session()->set([
            'nis'       => $dataSiswa['nis'],
            'kelas'     => $dataSiswa['kelas'],
            'role'      => 'siswa',
            'logged_in' => true
        ]);
        return redirect()->to('/siswa/dashboard');
    }
    return redirect()->back()->with('error', 'NIS tidak terdaftar!');
}

}
