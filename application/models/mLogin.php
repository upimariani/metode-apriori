<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('user', $data);
	}
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('level_user=4');
		return $this->db->get()->row();
	}
}

/* End of file mLogin.php */
