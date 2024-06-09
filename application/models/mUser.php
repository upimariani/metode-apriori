<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('user', $data);
	}
	public function update($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	//history transaksi
	public function history_transaksi($id_user)
	{
		return $this->db->query("SELECT * FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE user.id_user='" . $id_user . "'")->result();
	}
}

/* End of file mUser.php */
