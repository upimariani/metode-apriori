<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPromosi extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('promosi');
		$this->db->join('produk', 'promosi.id_produk = produk.id_produk', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('promosi', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_promosi', $id);
		$this->db->update('promosi', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_promosi', $id);
		$this->db->delete('promosi');
	}
}

/* End of file mPromosi.php */
