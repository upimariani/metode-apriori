<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCheckout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			// 'kecamatan' => $this->mOngkir->kecamatan()
		);
		$this->load->view('Pelanggan/Layout/head');
		$this->load->view('Pelanggan/vCheckout', $data);
		$this->load->view('Pelanggan/Layout/footer');
	}
	public function order()
	{
		$data = array(
			'id_user' => $this->session->userdata('id'),
			'tgl' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'stat_pembayaran' => '0',
			'bukti_bayar' => '0',
			'stat_order' => '0'
		);
		$this->db->insert('transaksi', $data);

		$id_transaksi = $this->db->query("SELECT MAX(id_order) as id FROM `transaksi`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$detail = array(
				'id_order' => $id_transaksi->id,
				'id_produk' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('order_produk', $detail);
		}
		$this->cart->destroy();
		redirect('Pelanggan/cHome');
	}
}

/* End of file cCheckout.php */
