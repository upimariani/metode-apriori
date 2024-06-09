<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mUser');
	}
	public function index()
	{
		$data = array(
			'user' => $this->mUser->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function history($id_user)
	{
		$data = array(
			'history' => $this->mUser->history_transaksi($id_user)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vHistoryPelanggan', $data);
		$this->load->view('Admin/Layouts/footer');
	}
}

/* End of file cPelanggan.php */
