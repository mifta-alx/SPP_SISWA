<?php

namespace App\Controllers;

use App\Models\KelasModel;
use CodeIgniter\API\ResponseTrait;
use \Mpdf\Mpdf;
class Kelas extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $this->Kelas = new KelasModel();
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
        $model = new KelasModel();
        $data = [
            'title' => 'Tabel Data Kelas',
            'isi' => 'kelas/table_kelas',
            'users' => $model->getUsers(),
             
        ];
        echo view('layout/v_wrapper',$data);
    }
    public function printpdf()
    {
        $model = new KelasModel();
        $data = [
            'title' => 'Print Pdf Data Kelas',
            'users' => $model->getUsers(),
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Tabel Kelas
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

            $html = view('kelas/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel Kelas '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
    public function data()
    {
        $users = new KelasModel();
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
            'title' => 'Tambah Data Kelas',
            'isi' => 'kelas/create',
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'id_kelas' => [
                'rules' => 'required|is_unique[kelas.id_kelas]|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id Kelas Tidak Boleh Kosong',
                    'is_unique' => 'Id Kelas Sudah Terdaftar',
                    'numeric' => 'Id Kelas Harus Angka',
                    'max_length' => 'Id Kelas Maksimal 11 Angka'
                ]
            ],
            'nama_kelas' => [
                'rules' => 'required|is_unique[kelas.nama_kelas]',
                'errors' => [
                    'required' => 'Nama Kelas Tidak Boleh Kosong',
                    'is_unique' => 'Nama Kelas Sudah Terdaftar',
                ]
            ],
            'kompetensi_keahlian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kompetensi Keahlian Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to('create')->withInput();
        }
        $model = new KelasModel();
        $data = array(
            'id_kelas'    => $this->request->getVar('id_kelas'),
            'nama_kelas'                   => $this->request->getVar('nama_kelas'),
            'kompetensi_keahlian'      => $this->request->getVar('kompetensi_keahlian'),
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
        $model = new KelasModel();
        $data =[
            'title' => 'Edit Data Kelas',
            'isi' => 'kelas/editdata',
            'validation' =>  \Config\Services::validation(),
            'kelas' => $model->find($id)
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function ubahdata($id)
    {
        $dataLama = $this->Kelas->find($id);
        // var_dump($dataLama);
        // die();
        if ($dataLama['id_kelas'] != $this->request->getVar('id_kelas')) {
            $rule_id_kelas = 'required|is_unique[kelas.id_kelas]|numeric|max_length[11]';
        } else {
            $rule_id_kelas = 'required|max_length[11]';
        }
        if ($dataLama['nama_kelas'] != $this->request->getVar('nama_kelas')) {
            $rule_nama_kelas = 'required|is_unique[kelas.nama_kelas]';
        } else {
            $rule_nama_kelas = 'required';
        }
        if (!$this->validate([
            'id_kelas' => [
                'rules' => $rule_id_kelas,
                'errors' => [
                    'required' => 'Id Kelas Tidak Boleh Kosong',
                    'is_unique' => 'Id Kelas Sudah Terdaftar',
                    'numeric' => 'Id Kelas Harus Angka',
                    'max_length' => 'Id Kelas Maksimal 11 Angka'
                ]
            ],
            'nama_kelas' => [
                'rules' => $rule_nama_kelas,
                'errors' => [
                    'required' => 'Nama Kelas Tidak Boleh Kosong',
                    'is_unique' => 'Nama Kelas Sudah Terdaftar'
                ]
            ],
            'kompetensi_keahlian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kompetensi Keahlian Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to(site_url('kelas/edit/' . $id))->withInput();
        }
        $model = new KelasModel();

        $data = [
            'id_kelas'    => $this->request->getVar('id_kelas'),
            'nama_kelas'                   => $this->request->getVar('nama_kelas'),
            'kompetensi_keahlian'      => $this->request->getVar('kompetensi_keahlian')
        ];
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('kelas/index'));
    }
    public function hapus($id)
    {
        $model = new KelasModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
        var_dump($id);
        die;
    }
}