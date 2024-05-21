<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChatting');
	}
	public function index()
	{
		$data = array(
			'chatting' => $this->mChatting->chatting()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vDashboard', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function view_chatting($id_pelanggan)
	{

		$data = array(
			'id' => $id_pelanggan,
			'chatting' => $this->mChatting->view_chatting($id_pelanggan)
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vDetailChatting', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function balas($id)
	{
		$data = array(
			'id_user' => $id,
			'admin_send' => $this->input->post('pesan'),
		);
		$this->db->insert('chatting', $data);
		redirect('Admin/cDashboard/view_chatting/' . $id);
	}
}

/* End of file cDashboard.php */
