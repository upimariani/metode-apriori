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
		$this->load->view('Manager/Layouts/head');
		$this->load->view('Manager/Layouts/nav');
		$this->load->view('Manager/Layouts/aside');
		$this->load->view('Manager/vJenis', $data);
		$this->load->view('Manager/Layouts/footer');
	}
	public function detail_analisis($type, $min_support, $min_confidence)
	{
		$data = array(
			'type' => $type,
			'min_support' => $min_support,
			'min_confidence' => $min_confidence,
			'analisis' => $this->db->query("SELECT * FROM `analisis` WHERE type='" . $type . "' AND min_support='" . $min_support . "' AND min_confidence='" . $min_confidence . "'")->result()
		);
		$this->load->view('Manager/Layouts/head');
		$this->load->view('Manager/Layouts/nav');
		$this->load->view('Manager/Layouts/aside');
		$this->load->view('Manager/vAnalisisView', $data);
		$this->load->view('Manager/Layouts/footer', $data);
	}
}

/* End of file cAnalisis.php */
