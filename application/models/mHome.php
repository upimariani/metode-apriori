<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function produk()
	{
		$this->db->select('produk.id_produk, nama_produk, keterangan, harga_jual, gambar, nama_promosi, potongan_harga');
		$this->db->from('produk');
		$this->db->join('promosi', 'produk.id_produk = promosi.id_produk', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
