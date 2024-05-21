<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPesananSaya extends CI_Model
{
	public function transaksi()
	{
		$data['deliv'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user=user.id_user WHERE user.id_user=" . $this->session->userdata('id'))->result();
		return $data;
	}
	public function detail_transaksi($id)
	{
		$data['detail_transaksi'] = $this->db->query("SELECT * FROM transaksi JOIN order_produk ON transaksi.id_order = order_produk.id_order JOIN produk ON order_produk.id_produk = produk.id_produk LEFT JOIN promosi ON promosi.id_produk=produk.id_produk WHERE transaksi.id_order='" . $id . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user WHERE transaksi.id_order='" . $id . "'")->row();
		return $data;
	}
	public function status_order($id, $data)
	{
		$this->db->where('id_order', $id);
		$this->db->update('transaksi', $data);
	}
}

/* End of file mdetail_transaksiSaya.php */
