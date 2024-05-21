<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProduk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProduk');
	}

	public function index()
	{
		$data = array(
			'produk' => $this->mProduk->select()
		);
		$this->load->view('Admin/Layouts/head');
		$this->load->view('Admin/Layouts/nav');
		$this->load->view('Admin/Layouts/aside');
		$this->load->view('Admin/vProduk', $data);
		$this->load->view('Admin/Layouts/footer');
	}
	public function create()
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'produk' => $this->mProduk->select(),
				'error' => $this->upload->display_errors()
			);
			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/nav');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/vProduk', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'nama_produk' => $this->input->post('nama'),
				'harga_jual' => $this->input->post('harga'),
				'keterangan' => $this->input->post('keterangan'),
				'gambar' => $upload_data['file_name']
			);
			$this->mProduk->insert($data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Ditambahkan!');
			redirect('Admin/cProduk');
		}
	}
	public function update($id)
	{
		$config['upload_path']          = './asset/foto-produk';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'produk' => $this->mProduk->select(),
				'error' => $this->upload->display_errors()
			);

			$this->load->view('Admin/Layouts/head');
			$this->load->view('Admin/Layouts/nav');
			$this->load->view('Admin/Layouts/aside');
			$this->load->view('Admin/vProduk', $data);
			$this->load->view('Admin/Layouts/footer');
		} else {

			$upload_data =  $this->upload->data();
			$data = array(
				'nama_produk' => $this->input->post('nama'),
				'harga_jual' => $this->input->post('harga'),
				'keterangan' => $this->input->post('keterangan'),
				'gambar' => $upload_data['file_name']
			);
			$this->mProduk->update($id, $data);
			$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
			redirect('Admin/cProduk');
		} //tanpa ganti gambar
		$data = array(
			'nama_produk' => $this->input->post('nama'),
			'harga_jual' => $this->input->post('harga'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->mProduk->update($id, $data);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
		redirect('Admin/cProduk');
	}
	public function delete($id)
	{
		$this->mProduk->delete($id);
		$this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
		redirect('Admin/cProduk');
	}
}

/* End of file cProduk.php */
