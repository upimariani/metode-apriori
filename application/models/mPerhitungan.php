<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPerhitungan extends CI_Model
{
	public function variabel_transaksi()
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE level_user='4'")->result();
	}
	public function variabel_produk($id_order)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN order_produk ON transaksi.id_order = order_produk.id_order JOIN produk ON produk.id_produk=order_produk.id_produk WHERE transaksi.id_order='" . $id_order . "'")->result();
	}
	public function dt_produk()
	{
		return $this->db->query("SELECT nama_produk FROM `transaksi` JOIN order_produk ON transaksi.id_order=order_produk.id_order JOIN produk ON produk.id_produk=order_produk.id_produk WHERE transaksi.id_order <= '7' GROUP BY nama_produk")->result();
	}
	public function truncate_tbl_item()
	{
		return $this->db->truncate('dt_item');
	}
	public function truncate_tbl_all()
	{
		$this->db->truncate('dt_item');
		$this->db->truncate('dt_itemset1');
		$this->db->truncate('dt_itemset2');
		$this->db->truncate('dt_tabular');
	}

	//reseller
	public function variabel_transaksi_reseller()
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE level_user='5'")->result();
	}
	//admin
	public function select()
	{
		return $this->db->query("SELECT * FROM `analisis`")->result();
	}
}

/* End of file mPerhitungan.php */
