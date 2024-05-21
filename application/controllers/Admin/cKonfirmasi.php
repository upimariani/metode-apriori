<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKonfirmasi extends CI_Controller
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
		$this->load->view('Admin/Transaksi/vKonfirmasi', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_order' => '2',
			'stat_pembayaran' => '1'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Segera Diproses!');
		redirect('Admin/cProses');
	}
}

/* End of file cKonfirmasi.php */
