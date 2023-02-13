<?php

namespace App\Controllers;

use App\Models\HomeModel;
use CodeIgniter\API\ResponseTrait;
use \Mpdf\Mpdf;

class Home extends BaseController
{
	use ResponseTrait;
	public function __construct()
	{
		helper('form');
		$this->Home = new HomeModel();
	}

	public function index()
	{
		//proteksi halaman
		if (session()->get('level') == '') {
			session()->setFlashdata('success', true);
			session()->setFlashdata('bahaya', 'Anda Belum Login');
			return redirect()->to(base_url('login'));
		}
		$model = new HomeModel();
		$data = [
			'title' => 'Dashboard',
			'isi' => 'v_home',
			'petugas' => $model->hitungpetugas(),
			'admin' => $model->hitungadmin(),
			'siswa' => $model->hitungsiswa(),
			'kelas' => $model->hitungkelas(),
			'spp' => $model->hitungspp(),
			'pay' => $model->hitungpay(),
			'lunas' => $model->hitunglunas(),
			'blmlunas' => $model->hitungblmlunas(),
			'riwayat' => $model->hitungriwayat(),
		];
		// return view('layout/v_wrapper', compact('data'));
		echo view('layout/v_wrapper', $data);
	}

	public function blank()
	{

		$data = [
			'title' => '404',
			'isi' => '404page',
		];
		echo view('layout/v_wrapper', $data);
	}
	public function data()
	{
		$model = new HomeModel();
		// $data = null;
		$status = isset($_POST['status']) ? $_POST['status'] : [];
		// $status = $model->riwayat();
		$data = [
			$model->getData($status),
			// $model->riwayat()

		];

		$this->request->setHeader('Accept', 'application/json');
		return $this->respondCreated(['data' => $data]);
	}

	public function printpdf()
	{
		$model = new HomeModel();
		$data = [
			'title' => 'Rekap Data Pdf',
			'siswa' => $model->siswa(),
			'petugas' => $model->petugas(),
			'kelas' => $model->kelas(),
			'spp' => $model->spp(),
			'pembayaran' => $model->pembayaran(),
			'riwayat' => $model->riwayat(),
		];
		$mpdf = new \Mpdf\Mpdf([
			'default_font' => 'Poppins, sans-serif',
			'margin_top' => 20,
		]);

		$mpdf->SetHTMLHeader(
			'
            <div style="text-align: left; border-bottom: 1px solid #000000; font-weight: bold; font-size: 15pt;">
            Rekap Data
            </div>'
		);
		$mpdf->SetHTMLFooter('
            <table width="100%" style="vertical-align: bottom; font-family: Poppins, sans-serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr>
                <td width="33%">{DATE j-m-Y}</td>
                <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">SISWA-SPP</td>
            </tr>
            </table>');
		$html = view('v_printpdf', $data);


		$mpdf->WriteHTML($html);

		$mpdf->Output('Rekap Data ' . date('d F Y') . '.pdf', 'I');
		$this->response->setContentType('application/pdf');
	}
	public function getDataStatus()
	{
		$model = new HomeModel();
		$data = $model->getCountStatus();
		return $this->respondCreated($data);
	}

	//--------------------------------------------------------------------

}
