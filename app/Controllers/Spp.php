<?php

namespace App\Controllers;

use App\Models\SPPModel;
use CodeIgniter\API\ResponseTrait;
use \Mpdf\Mpdf;
class SPP extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $this->SPP = new SPPModel();
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
        $model = new SPPModel();
        $data = [
            'title' => 'Tabel Data SPP',
            'isi' => 'spp/table_spp',
            'users' => $model->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function printpdf()
    {
        $model = new SPPModel();
        $data = [
            'title' => 'Print Pdf Data SPP',
            'users' => $model->getUsers(),
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Tabel SPP 
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

            $html = view('spp/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel SPP '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
    public function data()
    {
        $users = new SPPModel();
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
            'title' => 'Tambah Data SPP',
            'isi' => 'spp/create',
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'id_spp' => [
                'rules' => 'required|is_unique[spp.id_spp]|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id SPP Tidak Boleh Kosong',
                    'is_unique' => 'Id SPP Sudah Terdaftar',
                    'numeric' => 'Id SPP Harus Angka',
                    'max_length' => 'Id SPP Maksimal 11 Angka'
                ]
            ],
            'tahun' => [
                'rules' => 'required|is_unique[spp.tahun]',
                'errors' => [
                    'required' => 'Tahun Tidak Boleh Kosong',
                    'is_unique' => 'Tahun Tersebut Sudah Terdaftar'
                ]
            ],
            'nominal' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Nominal Tidak Boleh Kosong',
                    'numeric' => 'Nominal Harus Angka',
                    'max_length' => 'Nominal Maksimal 11 Angka'
                ]
            ]
        ])) {
            return redirect()->to('create')->withInput();
        }
        $model = new SPPModel();
        $data = array(
            'id_spp'    => $this->request->getVar('id_spp'),
            'tahun'                   => $this->request->getVar('tahun'),
            'nominal'      => $this->request->getVar('nominal'),
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
        $model = new SPPModel();
        $data = [
            'title' => 'Edit Data SPP',
            'isi' => 'spp/editdata',
            'spp' => $model->find($id),
            'validation' => \Config\Services::validation()
        ];

        echo view('layout/v_wrapper', $data);
    }
    public function ubahdata($id)
    {
        $dataLama = $this->SPP->find($id);
        if ($dataLama['id_spp'] != $this->request->getVar('id_spp')) {
            $rule_id_spp = 'required|is_unique[spp.id_spp]|numeric|max_length[11]';
        } else {
            $rule_id_spp = 'required|numeric|max_length[11]';
        }
        if ($dataLama['tahun'] != $this->request->getVar('tahun')) {
            $rule_tahun = 'required|is_unique[spp.tahun]';
        } else {
            $rule_tahun = 'required';
        }
        if (!$this->validate([
            'id_spp' => [
                'rules' => $rule_id_spp,
                'errors' => [
                    'required' => 'Id SPP Tidak Boleh Kosong',
                    'is_unique' => 'Id SPP Sudah Terdaftar',
                    'numeric' => 'Id SPP Harus Angka',
                    'max_length' => 'Id SPP Maksimal 11 Angka'
                ]
            ],
            'tahun' => [
                'rules' => $rule_tahun,
                'errors' => [
                    'required' => 'Tahun Tidak Boleh Kosong',
                    'is_unique' => 'Tahun Tersebut Sudah Terdaftar'
                ]
            ],
            'nominal' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Nominal Tidak Boleh Kosong',
                    'numeric' => 'Nominal Harus Angka',
                    'max_length' => 'Nominal Maksimal 11 Angka'
                ]
            ]
        ])) {
            return redirect()->to(site_url('spp/edit/' . $id))->withInput();
        }
        $model = new SPPModel();

        $data = [
            'id_spp'    => $this->request->getVar('id_spp'),
            'tahun'                   => $this->request->getVar('tahun'),
            'nominal'      => $this->request->getVar('nominal')
        ];
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('spp/index'));
    }
    public function hapus($id)
    {
        $model = new SPPModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
}