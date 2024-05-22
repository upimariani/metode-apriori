<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLTransaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->select()
		);
		$this->load->view('Manager/Layouts/head');
		$this->load->view('Manager/Layouts/nav');
		$this->load->view('Manager/Layouts/aside');
		$this->load->view('Manager/vLTransaksi', $data);
		$this->load->view('Manager/Layouts/footer');
	}
	public function cetak()
	{
		$transaksi = $this->db->query("SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user WHERE stat_order='4'")->result();
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Image('asset/images.jpg', 3, 3, 40);
		$pdf->Cell(200, 5, 'Z&J BAKERY', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(220, 20, 'Jl. Eyang Weri No.15, Awirarangan, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45511', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN TRANSAKSI Z&J BAKERY', 0, 1, 'C');

		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(85, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tgl Transaksi', 1, 0, 'C');
		$pdf->Cell(60, 7, 'Total Bayar', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		foreach ($transaksi as $key => $value) {

			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(85, 6, $value->nama, 1, 0);
			$pdf->Cell(30, 6, $value->tgl, 1, 0);
			$pdf->Cell(60, 6, 'Rp.' . number_format($value->total_bayar), 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLTransaksi.php */
