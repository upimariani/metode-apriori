<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPromosi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPromosi');
		$this->load->model('mProduk');
	}
	public function index()
	{
		$data = array(
			'promosi' => $this->mPromosi->select(),
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Marketing/Layouts/head');
		$this->load->view('Marketing/Layouts/nav');
		$this->load->view('Marketing/Layouts/aside');
		$this->load->view('Marketing/vPromosi', $data);
		$this->load->view('Marketing/Layouts/footer');
	}
	public function create()
	{
		$data = array(
			'id_produk' => $this->input->post('produk'),
			'nama_promosi' => $this->input->post('promosi'),
			'deskripsi_promosi' => $this->input->post('deskripsi'),
			'potongan_harga' => $this->input->post('diskon')
		);
		$this->mPromosi->insert($data);
		$this->session->set_flashdata('success', 'Data Promosi Berhasil Disimpan!');
		redirect('Marketing/cPromosi');
	}
	public function update($id)
	{
		$data = array(
			'id_produk' => $this->input->post('produk'),
			'nama_promosi' => $this->input->post('promosi'),
			'deskripsi_promosi' => $this->input->post('deskripsi'),
			'potongan_harga' => $this->input->post('diskon')
		);
		$this->mPromosi->update($id, $data);
		$this->session->set_flashdata('success', 'Data Promosi Berhasil Diperbaharui!');
		redirect('Marketing/cPromosi');
	}
	public function delete($id)
	{
		$this->mPromosi->delete($id);
		$this->session->set_flashdata('success', 'Data Promosi Berhasil Dihapus!');
		redirect('Marketing/cPromosi');
	}
}

/* End of file cPromosi.php */
