<?php

namespace App\Controllers;

use App\Models\RiwayatModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Pager\Pager;
use TCPDF;
use \Mpdf\Mpdf;
use PharIo\Manifest\Library;

class History extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        helper('form');
        $pager = \Config\Services::pager();
        $this->Riwayat = new RiwayatModel();
    }
    public function index()
    {
        //proteksi halaman
		if (session()->get('level')=='') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya','Anda Belum Login');
			return redirect()->to(base_url('login'));
			
		}
        $model = new RiwayatModel();
        $pager = \Config\Services::pager();
        $id = session()->get('nisn');
        $currentPage = $this->request->getVar('page_riwayat') ? $this->request->getVar('page_riwayat') : 1; 
        $data = [
            'title' => 'Riwayat Pembayaran',
            'isi' => 'history/riwayat',
            'users' => $model->paginate(2, 'riwayat'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'hitung' => $model->hitungriwayat(),
            'riwayatsiswa' => $model->riwayatsiswa($id),
        ];
        echo view('layout/v_wrapper', $data);
    }
    public function printpdf()
    {
        $model = new RiwayatModel();
        $data = [
            'title' => 'Print Pdf Data Riwayat',
            'users' => $model->getUsers(),
        ];
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'Poppins, sans-serif'
        ]);
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Data Riwayat Pembayaran SPP 
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

            $html = view('history/printpdf', $data);


        $mpdf->WriteHTML($html);

        $mpdf->Output('Data Tabel Riwayat '.date('d F Y').'.pdf', 'I');
        $this->response->setContentType('application/pdf');
    }
}