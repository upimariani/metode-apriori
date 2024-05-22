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
		$this->load->view('Manager/Layouts/head');
		$this->load->view('Manager/Layouts/nav');
		$this->load->view('Manager/Layouts/aside');
		$this->load->view('Manager/vDashboard', $data);
		$this->load->view('Manager/Layouts/footer');
	}
}

/* End of file cDashboard.php */
