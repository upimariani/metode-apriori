<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
	}
	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/Layouts/aside');
		$this->load->view('Marketing/vTransaksiLangsung', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
	public function addtocart()
	{
		$id_produk = $this->input->post('produk');
		$produk = $this->db->query("SELECT * FROM `produk` WHERE id_produk='" . $id_produk . "'")->row();
		$data = array(
			'id' => $id_produk,
			'name' => $produk->nama_produk,
			'price' => $produk->harga_jual,
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Produk berhasil disimpan ke keranjang!');
		redirect('Marketing/cTransaksiLangsung');
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect('Marketing/cTransaksiLangsung');
	}
	public function selesai()
	{
		$data = array(
			'id_user' => '1',
			'tgl' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'stat_pembayaran' => '0',
			'bukti_bayar' => '0',
			'stat_order' => '4'
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
		redirect('Marketing/cTransaksiLangsung');
	}
}

/* End of file cTransaksiLangsung.php */
