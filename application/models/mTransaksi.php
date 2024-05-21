<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
	public function select()
	{
		$data['pesanan_masuk'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user = user.id_user WHERE stat_order='0'")->result();
		$data['konfirmasi'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user = user.id_user WHERE stat_order='1'")->result();
		$data['diproses'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user = user.id_user WHERE stat_order='2'")->result();
		$data['dikirim'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user = user.id_user WHERE stat_order='3'")->result();
		$data['selesai'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON transaksi.id_user = user.id_user WHERE stat_order='4'")->result();
		return $data;
	}
	public function detail_pesanan($id)
	{
		$data['pesanan'] = $this->db->query("SELECT * FROM order_produk JOIN transaksi ON order_produk.id_order=transaksi.id_order JOIN produk ON order_produk.id_produk=produk.id_produk LEFT JOIN promosi ON promosi.id_produk=produk.id_produk WHERE transaksi.id_order='" . $id . "'")->result();
		$data['transaksi'] = $this->db->query("SELECT * FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE transaksi.id_order='" . $id . "';")->row();
		return $data;
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_order', $id);
		$this->db->update('transaksi', $data);
	}
}

/* End of file morder.php */
