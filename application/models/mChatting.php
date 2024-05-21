<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
	public function send_pelanggan($data)
	{
		$this->db->insert('chatting', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('user', 'chatting.id_user = user.id_user', 'left');
		$this->db->where('user.id_user', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	//admin
	public function chatting()
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('user', 'chatting.id_user = user.id_user', 'left');
		$this->db->group_by('chatting.id_user');
		return $this->db->get()->result();
	}
	public function view_chatting($id)
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('user', 'chatting.id_user = user.id_user', 'left');
		$this->db->where('chatting.id_user', $id);
		return $this->db->get()->result();
	}
}

/* End of file mChatting.php */
