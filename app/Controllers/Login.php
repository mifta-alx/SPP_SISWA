<?php

namespace App\Controllers;

use App\Models\LoginModel;
use \Mpdf\Mpdf;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->LoginModel = new LoginModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
        ];
        echo view('v_login', $data);
    }
    public function cek_login()
    {
        $username = $this->request->getPost('Username');
        $password = md5($this->request->getPost('Password'));
        $password2 = $this->request->getPost('Password');

        $cek = $this->LoginModel->cek_login($username, $password);
        $cek2 = $this->LoginModel->cek_login_siswa($username, $password2);
        if (($cek['username'] == $username) && ($cek['level'] == 'petugas')) {
            //jika username dan password benar
            session()->set('id_petugas', $cek['id_petugas']);
            session()->set('username', $cek['username']);
            session()->set('nama_petugas', $cek['nama_petugas']);
            session()->set('level', $cek['level']);
            session()->set('foto', $cek['foto']);
            session()->set('jabatan', $cek['jabatan']);
            session()->set('tgl_lahir', $cek['tgl_lahir']);
            session()->set('tempat_tinggal', $cek['tempat_tinggal']);
            session()->set('email', $cek['email']);
            session()->set('no_hp', $cek['no_hp']);
            session()->setFlashdata('success', true);
            session()->setFlashdata('pesan1', 'Anda Berhasil Login');
            return redirect()->to(base_url('home'));
        } elseif (($cek['username'] == $username) && ($cek['level'] == 'admin')) {
            //jika username dan password benar
            session()->set('id_petugas', $cek['id_petugas']);
            session()->set('username', $cek['username']);
            session()->set('nama_petugas', $cek['nama_petugas']);
            session()->set('level', $cek['level']);
            session()->set('foto', $cek['foto']);
            session()->set('jabatan', $cek['jabatan']);
            session()->set('tgl_lahir', $cek['tgl_lahir']);
            session()->set('tempat_tinggal', $cek['tempat_tinggal']);
            session()->set('email', $cek['email']);
            session()->set('no_hp', $cek['no_hp']);
            session()->setFlashdata('success', true);
            session()->setFlashdata('pesan1', 'Anda Berhasil Login');
            return redirect()->to(base_url('home'));
        } elseif (($cek2['nama'] == $username) && ($cek2['level'] == 'siswa')) {
            //jika username dan password benar
            session()->set('nisn', $cek2['nisn']);
            session()->set('nis', $cek2['nis']);
            session()->set('nama', $cek2['nama']);
            session()->set('id_kelas', $cek2['id_kelas']);
            session()->set('alamat', $cek2['alamat']);
            session()->set('no_telp', $cek2['no_telp']);
            session()->set('id_spp', $cek2['id_spp']);
            session()->set('level', $cek2['level']);
            session()->set('foto', $cek2['foto']);
            session()->setFlashdata('success', true);
            session()->setFlashdata('pesan2', 'Anda Berhasil Login');
            return redirect()->to(base_url('home'));
        } else {
            //jika username dan password salah
            session()->setFlashdata('success', true);
            session()->setFlashdata('bahaya', 'Username atau Password salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->remove('username');
        session()->remove('nama');
        session()->remove('level');
        session()->remove('foto');
        session()->remove('jabatan');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout!!!');
        return redirect()->to(base_url('login'));
    }
    //--------------------------------------------------------------------

}
