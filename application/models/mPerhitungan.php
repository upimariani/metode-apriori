<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPerhitungan extends CI_Model
{
	public function variabel_transaksi()
	{
		return $this->db->query("SELECT * FROM `order` LIMIT 7")->result();
	}
	public function variabel_produk($id_order)
	{
		return $this->db->query("SELECT * FROM `order` JOIN order_produk ON order.id_order = order_produk.id_order JOIN produk ON produk.id_produk=order_produk.id_produk WHERE order.id_order='" . $id_order . "'")->result();
	}
	public function dt_produk()
	{
		return $this->db->query("SELECT nm_produk FROM `order` JOIN order_produk ON order.id_order=order_produk.id_order JOIN produk ON produk.id_produk=order_produk.id_produk WHERE order.id_order <= '7' GROUP BY nm_produk")->result();
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
		$this->db->truncate('dt_itemset3');
		$this->db->truncate('dt_tabular');
	}
}

/* End of file mPerhitungan.php */
