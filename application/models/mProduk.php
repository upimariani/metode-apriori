<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('produk');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('produk', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
	}
}

/* End of file mProduk.php */
