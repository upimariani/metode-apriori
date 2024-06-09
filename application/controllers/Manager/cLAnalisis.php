<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPerhitungan');
	}

	public function index()
	{
		$data = array(
			'analisis' => $this->mPerhitungan->select()
		);
		$this->load->view('Manager/Layouts/head');
		$this->load->view('Manager/Layouts/nav');
		$this->load->view('Manager/Layouts/aside');
		$this->load->view('Manager/vAnalisis', $data);
		$this->load->view('Manager/Layouts/footer');
	}
	public function cetak()
	{
		$jenis = $this->input->post('jenis');
		$produk = $this->db->query("SELECT * FROM `analisis` WHERE type='" . $jenis . "'")->result();
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
		$pdf->Cell(190, 10, 'LAPORAN ANALISIS PRODUK Z&J BAKERY', 0, 1, 'C');

		$pdf->Cell(5, 5, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Produk Pertama', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Produk Kedua', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Min Support', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Min Confidence %', 1, 0, 'C');
		$pdf->Cell(15, 7, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Confidence', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Hasil Support', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;

		foreach ($produk as $key => $value) {

			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(30, 6, $value->produk1, 1, 0);
			$pdf->Cell(30, 6, $value->produk2, 1, 0);
			$pdf->Cell(30, 6, $value->min_support, 1, 0);
			$pdf->Cell(30, 6, $value->min_confidence, 1, 0);
			$pdf->Cell(15, 6, $value->jumlah, 1, 0);
			$pdf->Cell(20, 6, round($value->confidence) . '%', 1, 0);
			$pdf->Cell(20, 6, round($value->support, 2), 1, 1);
		}
		$pdf->Output();
	}
}

/* End of file cLAnalisis.php */
