<?php

namespace App\Controllers;

// use App\Models\HomeModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\LoginModel;

class Profile extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		helper('form');
		// $this->Home = new HomeModel();
	}
	
	public function index()
	{
		//proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
		$model = new LoginModel();
		$id = session()->get('id_petugas');
		// var_dump($id);
		// die();
		$jabatan =  session()->get('jabatan');
		if ($jabatan === "") {
			$job = '-';
		} else {
			$job = session()->get('jabatan');
		};
		$tgl_lahir =  session()->get('tgl_lahir');
		if ($tgl_lahir === "") {
			$born = '-';
		} else {
			$born = session()->get('tgl_lahir');
		};
		$tempat_tinggal =  session()->get('tempat_tinggal');
		if ($tempat_tinggal === "") {
			$life = '-';
		} else {
			$life = session()->get('tempat_tinggal');
		};
		$email =  session()->get('email');
		if ($email === "") {
			$mail = '-';
		} else {
			$mail = session()->get('email');
		};
		$no_hp =  session()->get('no_hp');
		if ($no_hp === "") {
			$phone = '-';
		} else {
			$phone = session()->get('no_hp');
		};
		$user = $model->data($id);
		$users = $user[0];
		$data = [
			'title' => 'Profile',
			'isi' => 'v_profile',
			'users' => $users,
			'job' => $job,
			'born' => $born,
			'life' => $life,
			'mail' => $mail,
			'phone' => $phone,
		];
		echo view('layout/v_wrapper', $data);
	}
	public function settings()
	{
		//proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
		$model = new LoginModel();
		$id = session()->get('id_petugas');
		$jabatan =  session()->get('jabatan');
		if ($jabatan === "") {
			$job = '-';
		} else {
			$job = session()->get('jabatan');
		};
		$tgl_lahir =  session()->get('tgl_lahir');
		if ($tgl_lahir === "") {
			$born = '-';
		} else {
			$born = session()->get('tgl_lahir');
		};
		$tempat_tinggal =  session()->get('tempat_tinggal');
		if ($tempat_tinggal === "") {
			$life = '-';
		} else {
			$life = session()->get('tempat_tinggal');
		};
		$email =  session()->get('email');
		if ($email === "") {
			$mail = '-';
		} else {
			$mail = session()->get('email');
		};
		$no_hp =  session()->get('no_hp');
		if ($no_hp === "") {
			$phone = '-';
		} else {
			$phone = session()->get('no_hp');
		};
		// $data = $model->data($id);
        // $didata = $data[0];
		$data = [
			'title' => 'Settings',
			'isi' => 'v_settings',
			'validation'=> \Config\Services::validation(),
			'job' => $job,
			'born' => $born,
			'life' => $life,
			'mail' => $mail,
			'phone' => $phone,
		];
		echo view('layout/v_wrapper', $data);
	}

	//--------------------------------------------------------------------

}
?>
