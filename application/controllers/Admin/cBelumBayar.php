<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBelumBayar extends CI_Controller
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
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Transaksi/vBelumBayar', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_pesanan($id)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cBelumBayar.php */
