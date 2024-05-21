<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/Layouts/aside');
		$this->load->view('Marketing/vDashboard');
		$this->load->view('Marketing/Layouts/footer');
	}
}

/* End of file cDashboard.php */
