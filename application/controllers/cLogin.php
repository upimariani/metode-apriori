<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->load->view('vLogin');
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->query("SELECT * FROM `user` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
		if ($data) {
			if ($data->level_user == '1') {
				redirect('Admin/cDashboard');
			} else if ($data->level_user == '2') {
				redirect('Marketing/cDashboard');
			} else {
				redirect('Manager/cDashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
			redirect('cLogin');
		}
	}
	public function logout()
	{
		$this->session->set_flashdata('success', 'Anda berhasil logout');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
