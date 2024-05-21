<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProses extends CI_Controller
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
		$this->load->view('Admin/Transaksi/vProses', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cProses.php */
