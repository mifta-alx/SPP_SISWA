<?php

namespace App\Controllers;

use App\Models\PayModel;
use App\Models\PetugasModel;
use App\Models\RiwayatModel;
use App\Models\SiswaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\CLI\Console;
use \Mpdf\Mpdf;

class Pembayaran extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $this->Pay = new PayModel();
        $this->Riwayat = new RiwayatModel();
        // $this->load->model('PayModel','PayModel');
    }
    public function index()
    {
        //proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		}elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $id = $this->request->getVar('id_pembayaran');
        $model = new PayModel();
        $model2 = new RiwayatModel();
        $id_p = $model2->find($id);
        $data = [
            'title' => 'Tabel Data Pembayaran',
            'isi' => 'pembayaran/table_pembayaran',
            'users' => $model->getUsers(),
            'validation' =>  \Config\Services::validation(),
            'idp' => $model2->getById($id),
            't' => $model2->getsisa($id),
            'sisa' => $model->getsisa($id),
        ];
        $sisa = $model->getsisa($id);
        // var_dump($sisa);
        // die();
        $data['pay'] = $model->getPay()->getResult();
        echo view('layout/v_wrapper', $data);
    }
    public function printpdf()
    {
        $model = new PayModel();

        $data = [
            'title' => 'Print Pdf Data Pembayaran',
            'users' => $model->getUsers(),
            'pay' =>  $model->getPay()->getResult()
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Tabel Pembayaran SPP 
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

            $html = view('pembayaran/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel Pembayaran '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
    public function data($id)
    {
        $model = new PayModel();
        $data = [
            $model->getdatajoin($id),
            $model->getUsers(),
            $model->getById($id),
            $model->getPetugas($id),
        ];

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
			
		}elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $model = new PayModel();
        $model2 = new PetugasModel();
        $model3 = new SiswaModel();
        // $idp = '0022302155';
        // $nisn= $model->getnisn($idp);
        // var_dump($nisn);
        // die();
        $data = [
            'title' => 'Tambah Data Pembayaran',
            'isi' => 'pembayaran/create',
            'users' => $model->getUsers(),
            'validation' =>  \Config\Services::validation(),
            'id_petugas' =>  $model->id_petugas(),
            'nisn' => $model->nisn(),
            'id_spp' => $model->id_spp(),
            'nominal' => $model->nominal(),
            'petugas' => $model2->getUsers(),
            'siswa' => $model3->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambah()
    {
        if (!$this->validate([
            'id_pembayaran' => [
                'rules' => 'required|is_unique[pembayaran.id_pembayaran]|is_unique[riwayat.id_pembayaran]|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id Pembayaran Tidak Boleh Kosong',
                    'is_unique' => 'Id Pembayaran Sudah Terdaftar',
                    'numeric' => 'Id Pembayaran Harus Angka',
                    'max_length' => 'Id Pembayaran Maksimal 11 Angka'
                ]
            ],
            'id_petugas' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id Petugas Tidak Boleh Kosong',
                    'numeric' => 'Id Petugas Harus Angka',
                    'max_length' => 'Id Petugas Maksimal 11 Angka'
                ]
            ],
            'nisn' => [
                'rules' => 'required|numeric|is_unique[pembayaran.nisn]|max_length[10]',
                'errors' => [
                    'required' => 'NISN Tidak Boleh Kosong',
                    'is_unique' => 'NISN Sudah Terdaftar',
                    'numeric' => 'NISN Harus Angka',
                    'max_length' => 'NISN Maksimal 10 Angka'
                ]
            ],
            'nama' => [
                'rules' => 'required|is_unique[pembayaran.nama]',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'is_unique' => 'Nama Sudah Terdaftar',
                ]
            ],
            'tgl_bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Bayar Tidak Boleh Kosong'
                ]
            ],
            'bulan_dibayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan Dibayar Tidak Boleh Kosong'
                ]
            ],
            'tahun_dibayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Dibayar Tidak Boleh Kosong'
                ]
            ],
            'id_spp' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id SPP Tidak Boleh Kosong',
                    'is_unique' => 'Id SPP Sudah Terdaftar',
                    'numeric' => 'Id SPP Harus Angka',
                    'max_length' => 'Id SPP Maksimal 11 Angka'
                ]
            ],
            'jumlah_bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Bayar Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to('create')->withInput();
        }
        $model = new PayModel();
        $dataidspp = $this->request->getVar('id_spp');
        $data = array(
            'id_pembayaran'    => $this->request->getVar('id_pembayaran'),
            'id_petugas'    => $this->request->getVar('id_petugas'),
            'nama_petugas'    => $this->request->getVar('nama_petugas'),
            'nisn'    => $this->request->getVar('nisn'),
            'nama'    => $this->request->getVar('nama'),
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'tgl_bayar'    => $this->request->getVar('tgl_bayar'),
            'bulan_dibayar'    => $this->request->getVar('bulan_dibayar'),
            'tahun_dibayar'    => $this->request->getVar('tahun_dibayar'),
            'id_spp'    => $this->request->getVar('id_spp'),
            'jumlah_bayar'      => $this->request->getVar('jumlah_bayar')
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
			
		}elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $model = new PayModel();
        $model2 = new PetugasModel();
        $model3 = new SiswaModel();
        $data = [
            'title' => 'Edit Data Pembayaran',
            'isi' => 'pembayaran/editdata',
            'pembayaran' => $model->find($id),
            'validation' => \Config\Services::validation(),
            'users' => $model->getUsers(),
            'id_petugas' => $model->id_petugas(),
            'nisn' => $model->nisn(),
            'id_spp' => $model->id_spp(),
            'nominal' => $model->nominal(),
            'petugas' => $model2->getUsers(),
            'siswa' => $model3->getUsers(),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function ubahdata($id)
    {
        $dataLama = $this->Pay->find($id);
        // $nama = $this->request->getVar('nama');
        // var_dump($nama);
        // die();
        if ($dataLama['nama'] != $this->request->getVar('nama')) {
            $rule_nama = 'required|is_unique[pembayaran.nama]';
        } else {
            $rule_nama = 'required';
        }
        if ($dataLama['nisn'] != $this->request->getVar('nisn')) {
            $rule_nisn = 'required|is_unique[pembayaran.nisn]|numeric|max_length[10]';
        } else {
            $rule_nisn = 'required|numeric|max_length[10]';
        }
        if ($dataLama['id_pembayaran'] != $this->request->getVar('id_pembayaran')) {
            $rule_pembayaran = 'required|is_unique[pembayaran.id_pembayaran]|numeric|max_length[11]';
        } else {
            $rule_pembayaran = 'required|numeric|max_length[11]';
        }
        if (!$this->validate([
            'id_pembayaran' => [
                'rules' => $rule_pembayaran,
                'errors' => [
                    'required' => 'Id Pembayaran Tidak Boleh Kosong',
                    'is_unique' => 'Id Pembayaran Sudah Terdaftar',
                    'numeric' => 'Id Pembayaran Harus Angka',
                    'max_length' => 'Id Pembayaran Maksimal 11 Angka'
                ]
            ],
            'id_petugas' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id Petugas Tidak Boleh Kosong',
                    'numeric' => 'Id Petugas Harus Angka',
                    'max_length' => 'Id Petugas Maksimal 11 Angka'
                ]
            ],
            'nisn' => [
                'rules' => $rule_nisn,
                'errors' => [
                    'required' => 'NISN Tidak Boleh Kosong',
                    'is_unique' => 'NISN Sudah Terdaftar',
                    'numeric' => 'NISN Harus Angka',
                    'max_length' => 'NISN Maksimal 10 Angka'
                ]
            ],
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong',
                    'is_unique' => 'Nama Sudah Terdaftar',
                ]
            ],
            'tgl_bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Bayar Tidak Boleh Kosong'
                ]
            ],
            'bulan_dibayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bulan Dibayar Tidak Boleh Kosong'
                ]
            ],
            'tahun_dibayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tahun Dibayar Tidak Boleh Kosong'
                ]
            ],
            'id_spp' => [
                'rules' => 'required|numeric|max_length[11]',
                'errors' => [
                    'required' => 'Id SPP Tidak Boleh Kosong',
                    // 'is_unique' => 'Id SPP Sudah Terdaftar',
                    'numeric' => 'Id SPP Harus Angka',
                    'max_length' => 'Id SPP Maksimal 11 Angka'
                ]
            ],
            'jumlah_bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah Bayar Tidak Boleh Kosong'
                ]
            ]
        ])) {
            return redirect()->to(site_url('pembayaran/edit/' . $id))->withInput();
        }
        $model = new PayModel();

        $data = [
            'id_pembayaran'    => $this->request->getVar('id_pembayaran'),
            'id_petugas'    => $this->request->getVar('id_petugas'),
            'nama_petugas'    => $this->request->getVar('nama_petugas'),
            'nisn'    => $this->request->getVar('nisn'),
            'nama'    => $this->request->getVar('nama'),
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'tgl_bayar'    => $this->request->getVar('tgl_bayar'),
            'bulan_dibayar'    => $this->request->getVar('bulan_dibayar'),
            'tahun_dibayar'    => $this->request->getVar('tahun_dibayar'),
            'id_spp'    => $this->request->getVar('id_spp'),
            'jumlah_bayar'      => $this->request->getVar('jumlah_bayar')
        ];
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('pembayaran/index'));
    }
    public function hapus($id)
    {
        $model = new PayModel();
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
    public function pay()
    {
        $model = new PayModel();
        $model2 = new RiwayatModel();
        // cek data apakah sudah ada di tabel history
        $id = $this->request->getVar('id_pembayaran');
        $idp = $model2->getById($id);
        // ambil harga awal
        $jumlah_bayar = $this->request->getVar('jumlah_bayar');
        // ambil harga bayar
        $jumlah_dibayar = $this->request->getVar('jumlah_dibayar');
        if ($idp) {
            $bayar = $model2->bayar($id);
            $dibayar = $bayar[0]->jumlah_dibayar;
            $sisadibayar = $model2->sisa($id);
            $sisabayar = $sisadibayar[0]->sisa;
        }
        // var_dump($dibayar, $jumlah_dibayar);
        // die();
        $sisa = $jumlah_bayar - $jumlah_dibayar;
        if ($idp) {
            $sisaakhir = ($sisabayar - $jumlah_dibayar);
            $dibayarakhir = $dibayar + $jumlah_dibayar;
        } else {
            $sisaakhir = $sisa;
            $dibayarakhir = $jumlah_dibayar;
        }
        if ($sisaakhir <= 0) {
            $status = 'Lunas';
            $data = [
                'id_pembayaran'    => $this->request->getVar('id_pembayaran'),
                'id_petugas'    => $this->request->getVar('id_petugas'),
                'nama_petugas'    => $this->request->getVar('nama_petugas'),
                'nisn'    => $this->request->getVar('nisn'),
                'nama'    => $this->request->getVar('nama'),
                'nama_kelas'    => $this->request->getVar('nama_kelas'),
                'tgl_bayar'    => $this->request->getVar('tgl_bayar'),
                'bulan_dibayar'    => $this->request->getVar('bulan_dibayar'),
                'tahun_dibayar'    => $this->request->getVar('tahun_dibayar'),
                'id_spp'    => $this->request->getVar('id_spp'),
                'jumlah_bayar'      => $this->request->getVar('jumlah_bayar'),
                'jumlah_dibayar'      => $dibayarakhir,
                'status'      => $status,
                'sisa'      => $sisaakhir,
            ];
            if ($idp) {
                if ($model->ubahhis($id, $data) && $model->hapuspay($id)) {
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('msg', 'Data Berhasil Dibayar');
                } else {
                    session()->setFlashdata('success', false);
                    session()->setFlashdata('gagal', 'Data Gagal Dibayar');
                }
            } else {
                if ($model->simpanhis($data) && $model->hapuspay($id)) {
                    session()->setFlashdata('success', true);
                    session()->setFlashdata('msg', 'Data Berhasil Dibayar');
                } else {
                    session()->setFlashdata('success', false);
                    session()->setFlashdata('gagal', 'Data Gagal Dibayar');
                }
            }
            return redirect()->to(base_url('history/index'));
        } else {
            $status = 'Belum Lunas';
            $data = [
                'id_pembayaran'    => $this->request->getVar('id_pembayaran'),
                'id_petugas'    => $this->request->getVar('id_petugas'),
                'nama_petugas'    => $this->request->getVar('nama_petugas'),
                'nisn'    => $this->request->getVar('nisn'),
                'nama'    => $this->request->getVar('nama'),
                'nama_kelas'    => $this->request->getVar('nama_kelas'),
                'tgl_bayar'    => $this->request->getVar('tgl_bayar'),
                'tgl_bayar'    => $this->request->getVar('tgl_bayar'),
                'bulan_dibayar'    => $this->request->getVar('bulan_dibayar'),
                'tahun_dibayar'    => $this->request->getVar('tahun_dibayar'),
                'id_spp'    => $this->request->getVar('id_spp'),
                'jumlah_bayar'      => $this->request->getVar('jumlah_bayar'),
                'jumlah_dibayar'      => $dibayarakhir,
                'status'      => $status,
                'sisa'      => $sisaakhir,
            ];
        }
        $data2 = [ 
            'sisa' => $sisaakhir,
        ];
        if ($idp) {
            if ($model->ubahhis($id, $data) && $model->ubahsisapay($id, $data2)) {
                session()->setFlashdata('success', true);
                session()->setFlashdata('msg', 'Data Berhasil Dibayar');
            } else {
                session()->setFlashdata('success', false);
                session()->setFlashdata('gagal', 'Data Gagal Dibayar');
            }
        } else {
            if ($model->simpanhis($data) && $model->ubahsisapay($id, $data2)) {
                session()->setFlashdata('success', true);
                session()->setFlashdata('msg', 'Data Berhasil Dibayar');
            } else {
                session()->setFlashdata('success', false);
                session()->setFlashdata('gagal', 'Data Gagal Dibayar');
            }
        }
        return redirect()->to(base_url('history/index'));
    }
}
