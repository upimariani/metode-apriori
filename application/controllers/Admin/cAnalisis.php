<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPerhitungan');
	}

	public function index()
	{
		$data = array(
			'jenis' => $this->db->query("SELECT * FROM `analisis` GROUP BY min_support, min_confidence, type")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vJenis', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function detail_analisis($type, $min_support, $min_confidence)
	{
		$data = array(
			'type' => $type,
			'min_support' => $min_support,
			'min_confidence' => $min_confidence,
			'analisis' => $this->db->query("SELECT * FROM `analisis` WHERE type='" . $type . "' AND min_support='" . $min_support . "' AND min_confidence='" . $min_confidence . "'")->result()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vAnalisis', $data);
		$this->load->view('Admin/Layouts/footer', $data);
	}
}

/* End of file cAnalisis.php */
