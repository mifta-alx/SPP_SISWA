<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use CodeIgniter\API\ResponseTrait;
use \Mpdf\Mpdf;
class Petugas extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $this->Petugas = new PetugasModel();
    }
    public function index()
    {
        //proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		}else if (session()->get('level')=='petugas') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Petugas');
            return redirect()->back();

		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $model = new PetugasModel();
        $data = [
            'title' => 'Tabel Data Petugas',
            'isi' => 'petugas/table_petugas',
            'users' => $model->getUsers()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function printpdf()
    {
        $model = new PetugasModel();
        $data = [
            'title' => 'Print Pdf Data Petugas',
            'users' => $model->getUsers(),
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Tabel Petugas
            </div>','O');
        $mpdf->SetHTMLFooter('
            <table width="100%" style="vertical-align: bottom; font-family: Poppins, sans-serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr>
                <td width="33%">{DATE j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">SISWA-SPP</td>
            </tr>
            </table>');

            $html = view('petugas/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel Petugas '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
    public function data()
    {
        $users = new PetugasModel();
        // $data = null;
        $data = $users->getUsers();

        $this->request->setHeader('Accept', 'application/json');
        return $this->respondCreated(['data' => $data]);
    }
    public function create()
    {
        //proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		}else if (session()->get('level')=='petugas') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Petugas');
            return redirect()->back();

		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $data = [
            'title' => 'Tambah Data Petugas',
            'isi' => 'petugas/create',
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'id_petugas' => [
                'rules' => 'required|is_unique[petugas.id_petugas]|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id Petugas Tidak Boleh Kosong',
                    'is_unique' => 'Id Petugas Sudah Terdaftar',
                    'numeric' => 'Id Petugas Harus Angka',
                    'max_length' => 'Id Petugas Maksimal 11 Angka'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas Tidak Boleh Kosong'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level Tidak Boleh Kosong'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('create')->withInput();
        }
        // ambil jpg
		$filejpg = $this->request->getFile('foto');
		//cek apakah tidak ada gambar yg diupload
		if ($filejpg->getError() == 4) {
			$namajpg = '3.png';
		}else{
		//generate nama random
        // $namapdf = $filepdf->getRandomName();
        // ambil nama file
		$namajpg = $filejpg->getName();
		// pindahkan ke folder gambar
        $filejpg->move('gambar/', $namajpg);
		}
        $model = new PetugasModel();
        $data = array(
            'id_petugas'    => $this->request->getVar('id_petugas'),
            'username'                   => $this->request->getVar('username'),
            'password'      => md5($this->request->getVar('password')),
            'nama_petugas'        => $this->request->getVar('nama_petugas'),
            'level'        => $this->request->getVar('level'),
            'foto'		    => $namajpg
        );
        if ($model->tambahdata($data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Ditambah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Ditambahkan');
        }
        return redirect()->to('index');
    }
    public function edit($id)
    {
        //proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		}else if (session()->get('level')=='petugas') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Petugas');
            return redirect()->back();

		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $model = new PetugasModel();
        $data = [
            'title' => 'Edit Data Petugas',
            'isi' => 'petugas/editdata',
            'petugas' => $model->find($id),
            'users' => $model->getUsers(),
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function ubahdata($id)
    {
        $dataLama = $this->Petugas->find($id);
        if ($dataLama['id_petugas'] != $this->request->getVar('id_petugas')) {
            $rule_id_petugas = 'required|is_unique[petugas.id_petugas]|numeric|max_length[11]';
        } else {
            $rule_id_petugas = 'required|numeric|max_length[11]';
        }
        if (!$this->validate([
            'id_petugas' => [
                'rules' => $rule_id_petugas,
                'errors' => [
                    'required' => 'Id Petugas Tidak Boleh Kosong',
                    'is_unique' => 'Id Petugas Sudah Terdaftar',
                    'numeric' => 'Id Petugas Harus Angka',
                    'max_length' => 'Id Petugas Maksimal 11 Angka'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Tidak Boleh Kosong'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password Tidak Boleh Kosong',
                    'min_length' => 'Password Minimal 8 Karakter'
                ]
            ],
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas Tidak Boleh Kosong'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to(site_url('petugas/edit/' . $id))->withInput();
        }
        $model = new PetugasModel();

        $data = [
            'id_petugas'    => $this->request->getVar('id_petugas'),
            'username'                   => $this->request->getVar('username'),
            'password'      => md5($this->request->getVar('password')),
            'nama_petugas'        => $this->request->getVar('nama_petugas'),
            'level'        => $this->request->getVar('level')
        ];
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('petugas/index'));
    }
    public function hapus($id)
    {
        $model = new PetugasModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
}
