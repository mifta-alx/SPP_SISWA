<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\SPPModel;
use CodeIgniter\API\ResponseTrait;
use \Mpdf\Mpdf;
class Siswa extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $this->Siswa = new SiswaModel();
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
        $model = new SiswaModel();
        $data = [
            'title' => 'Tabel Data Siswa',
            'isi' => 'siswa/table_siswa',
            'users' => $model->getUsers()
        ];
        // $data = ['isi' => 'siswa/table_siswa'];
        // $data['users'] = $users->getUsers();
        echo view('layout/v_wrapper', $data);
    }
    public function printpdf()
    {
        $model = new SiswaModel();
        $data = [
            'title' => 'Print Pdf Data Siswa',
            'users' => $model->getUsers(),
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Tabel Siswa
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

            $html = view('siswa/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel Siswa '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
    public function data()
    {
        $model = new SiswaModel();
        // $data = null;
        $data = $model->getUsers();

        $this->request->setHeader('Accept', 'application/json');
        return $this->respondCreated(['data' => $data]);
    }
    public function data1($id)
    {
        $model = new SiswaModel();
        // $data = null;
        $data = [
            $model->getUsers(),
            $model->getById($id), 
            $model->getKelas($id),
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
			
		}else if (session()->get('level')=='petugas') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Petugas');
            return redirect()->back();

		} elseif (session()->get('level')=='siswa') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Adalah Siswa');
            return redirect()->back();
		}
        $model = new SiswaModel();
        $model2 = new KelasModel();
        $model3 = new SPPModel();
        $data = [
            'title' => 'Tambah Data Siswa',
            'isi' => 'siswa/create',
            'users' => $model->getUsers(),
            'validation' => \Config\Services::validation(),
            'id_kelas' => $model->id_kelas(),
            'id_spp' => $model->id_spp(),
            'spp' => $model3->getUsers(),
            'kelas' => $model2->getUsers()
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function tambahdata()
    {
        if (!$this->validated()) {
            return redirect()->back()->withInput();
        }
        // ambil jpg
        $filejpg = $this->request->getFile('foto');
        //cek apakah tidak ada gambar yg diupload
        if ($filejpg->getError() == 4) {
            $namajpg = '1.png';
        } else {
            //generate nama random
            // $namapdf = $filepdf->getRandomName();
            // ambil nama file
            $namajpg = $filejpg->getName();
            // pindahkan ke folder gambar
            $filejpg->move('gambar/', $namajpg);
        }
        $level = 'siswa';
        $model = new SiswaModel();
        $data = array(
            'nisn'    => $this->request->getVar('nisn'),
            'nis'    => $this->request->getVar('nis'),
            'nama'    => $this->request->getVar('nama'),
            'id_kelas'    => $this->request->getVar('id_kelas'),
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'id_spp'    => $this->request->getVar('id_spp'),
            'nominal'    => $this->request->getVar('nominal'),
            'level'    => $level,
            'foto'    => $namajpg,
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
        $model = new SiswaModel();
        $model2 = new KelasModel();
        $model3 = new SPPModel();
        $data = [
            'title' => 'Edit Data Siswa',
            'isi' => 'siswa/editdata',
            'siswa' => $model->find($id),
            'users' => $model->getUsers(),
            'validation' => \Config\Services::validation(),
            'id_kelas' => $model->id_kelas(),
            'id_spp' => $model->id_spp(),
            'spp' => $model3->getUsers(),
            'kelas' => $model2->getUsers()
        ];

        echo view('layout/v_wrapper', $data);
    }
    public function ubahdata($id)
    {
        // $dataLama = $this->Siswa->data($id);
        $dataLama = $this->Siswa->find($id);
        // var_dump($dataLama);
        // die();
        if ($dataLama['nisn'] != $this->request->getVar('nisn')) {
            $rule_nisn = 'required|numeric|is_unique[siswa.nisn]|max_length[10]';
        } else {
            $rule_nisn = 'required|numeric|max_length[10]';
        }
        // if ($dataLama['id_kelas'] == $this->request->getVar('id_kelas')) {
        //     $rule_kelas = 'required|numeric|is_unique[siswa.id_kelas]';
        // } else {
        //     $rule_kelas = 'required|numeric';
        // }
        // if ($dataLama['id_spp'] == $this->request->getVar('id_spp')) {
        //     $rule_spp = 'required|numeric|is_unique[siswa.id_spp]';
        // } else {
        //     $rule_spp = 'required|numeric';
        // }
        if ($dataLama['nis'] != $this->request->getVar('nis')) {
            $rule_nis = 'required|is_unique[siswa.nis]|max_length[12]';
        } else {
            $rule_nis = 'required|max_length[12]';
        }
        if (!$this->validate([
            'nisn' => [
                'rules' => $rule_nisn,
                'errors' => [
                    'required' => 'NISN Tidak Boleh Kosong',
                    'is_unique' => 'NISN Sudah Terdaftar',
                    'numeric' => 'NISN Harus Angka',
                    'max_length' => 'NISN Maksimal 10 Angka'
                ]
            ],
            'nis' => [
                'rules' => $rule_nis,
                'errors' => [
                    'required' => 'NIS Tidak Boleh Kosong',
                    'is_unique' => 'NIS Sudah Terdaftar',
                    'numeric' => 'NIS Harus Angka',
                    'max_length' => 'NIS Maksimal 12 Angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]
            ],
            'id_kelas' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Kelas Tidak Boleh Kosong',
                    'is_unique' => 'ID Kelas Sudah Terdaftar',
                    'numeric' => 'ID Kelas Harus Angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Tidak Boleh Kosong'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => 'Nomor Telepon Tidak Boleh Kosong',
                    'numeric' => 'No Telepon Harus Angka',
                    'max_length' => 'Nomor Telepon Maksimal 13 Angka'
                ]
            ],
            'id_spp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID SPP Tidak Boleh Kosong',
                    'is_unique' => 'ID SPP Sudah Terdaftar',
                    'numeric' => 'ID SPP Harus Angka'
                ]
            ]
        ])) {
            return redirect()->to(site_url('siswa/edit/' . $id))->withInput();
        }
        $model = new SiswaModel();

        $data = [
            'nisn'            => $this->request->getVar('nisn'),
            'nis'        => $this->request->getVar('nis'),
            'nama'        => $this->request->getVar('nama'),
            'id_kelas'        => $this->request->getVar('id_kelas'),
            'nama_kelas'    => $this->request->getVar('nama_kelas'),
            'alamat'        => $this->request->getVar('alamat'),
            'no_telp'    => $this->request->getVar('no_telp'),
            'id_spp'        => $this->request->getVar('id_spp'),
            'nominal'        => $this->request->getVar('nominal')
        ];
        if ($model->ubahdata($id, $data)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Diubah');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Diubah');
        }
        return redirect()->to(base_url('siswa/index'));
    }
    public function hapus($id)
    {
        $model = new SiswaModel();
        // $cek = $this->model->hapusdata($id);
        if ($model->hapusdata($id)) {
            session()->setFlashdata('success', true);
            session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        } else {
            session()->setFlashdata('success', false);
            session()->setFlashdata('gagal', 'Data Gagal Dihapus');
        }
    }
    public function validated()
    {
        return $this->validate([
            'nisn' => [
                'rules' => 'required|numeric|is_unique[siswa.nisn]|max_length[10]',
                'errors' => [
                    'required' => 'NISN Tidak Boleh Kosong',
                    'is_unique' => 'NISN Sudah Terdaftar',
                    'numeric' => 'NISN Harus Angka',
                    'max_length' => 'NISN Maksimal 10 Angka'
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[siswa.nis]|max_length[12]',
                'errors' => [
                    'required' => 'NIS Tidak Boleh Kosong',
                    'is_unique' => 'NIS Sudah Terdaftar',
                    'numeric' => 'NIS Harus Angka',
                    'max_length' => 'NIS Maksimal 12 Angka'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]
            ],
            'id_kelas' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID Kelas Tidak Boleh Kosong',
                    'is_unique' => 'ID Kelas Sudah Terdaftar',
                    'numeric' => 'ID Kelas Harus Angka'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Tidak Boleh Kosong'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|numeric|max_length[13]',
                'errors' => [
                    'required' => 'Nomor Telepon Tidak Boleh Kosong',
                    'numeric' => 'Nomor Telepon Harus Angka',
                    'max_length' => 'Nomor Telepon Maksimal 13 Angka'
                ]
            ],
            'id_spp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'ID SPP Tidak Boleh Kosong',
                    'is_unique' => 'ID SPP Sudah Terdaftar',
                    'numeric' => 'ID SPP Harus Angka'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ]);
    }

    //--------------------------------------------------------------------

}
