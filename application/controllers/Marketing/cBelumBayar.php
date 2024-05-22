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
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/Layouts/aside');
		$this->load->view('Marketing/Transaksi/vBelumBayar', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_pesanan($id)
		);
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/Layouts/aside');
		$this->load->view('Marketing/Transaksi/vDetailTransaksi', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
}

/* End of file cBelumBayar.php */
