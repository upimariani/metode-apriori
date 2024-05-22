<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKirim extends CI_Controller
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
		$this->load->view('Marketing/Transaksi/vKirim', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
	public function kirim($id)
	{
		$data = array(
			'stat_order' => '3',
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Segera Sampai Kepada Pelanggan!');
		redirect('Marketing/cKirim');
	}
}

/* End of file cKirim.php */
