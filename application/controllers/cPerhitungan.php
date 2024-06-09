<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cPerhitungan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPerhitungan');
	}
	public function index()
	{

		$jenis = $this->input->post('jenis');
		$min_support = $this->input->post('min_support');
		$min_confidence = $this->input->post('min_confidence');

		if ($jenis == '1') {
			$this->session->set_flashdata('min_support', $min_support);
			$this->session->set_flashdata('min_confidence', $min_confidence);
			redirect('cPerhitungan/pelanggan');
		} else {
			$this->session->set_flashdata('min_support', $min_support);
			$this->session->set_flashdata('min_confidence', $min_confidence);
			redirect('cPerhitungan/reseller');
		}
	}

	public function pelanggan()
	{
		$min_support = $this->session->userdata('min_support');
		$min_confidence = $this->session->userdata('min_confidence');
		// echo $min_support . 'Bismillah Perhitungan Algoritma Apriori!<br>';
		$this->mPerhitungan->truncate_tbl_all();
		//--------------------------------PROSES AWAL
		$dt_produk = $this->mPerhitungan->dt_produk();
		foreach ($dt_produk as $key => $value) {
			$dta_produk[] = $value->nama_produk;
		}

		//mengambil data transaksi -> produk
		$var_transaksi = $this->mPerhitungan->variabel_transaksi();
		foreach ($var_transaksi as $key => $value) {
			$var_produk = $this->mPerhitungan->variabel_produk($value->id_order);
			foreach ($var_produk as $key => $item) {
				// $produk = array();
				$produk[] = [$item->nama_produk, $item->id_order];
			}
		}

		for ($i = 0; $i < sizeof($produk); $i++) {
			// echo $produk[$i][0] . '|' . $produk[$i][1] . ', ';
			$data = array(
				'id_order' => $produk[$i][1],
				'produk' => $produk[$i][0]
			);
			$this->db->insert('dt_tabular', $data);
			// echo '<br>';
		}


		//-------------------------------------------PROSES ITEMSET 1
		//itemset 1
		//jumlah sample data transaksi
		$dt_jml_sample = $this->db->query("SELECT COUNT(id_order) as jml_transaksi FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE level_user='4'")->row();
		$dt_tabular = $this->db->query("SELECT COUNT(id_dt_tabular) as jml, produk FROM `dt_tabular` GROUP BY produk")->result();
		foreach ($dt_tabular as $key => $value) {
			$jml = $value->jml;
			$support = $jml / $dt_jml_sample->jml_transaksi;
			if ($support >= $min_support) {
				$lolos = '1';
			} else {
				$lolos = '0';
			}
			$data = array(
				'produk' => $value->produk,
				'jumlah' => $jml,
				'support' => $support,
				'lolos' => $lolos
			);
			$this->db->insert('dt_itemset1', $data);
		}

		//--------------------------------------PROSES ITEMSET 2
		//itemset 2
		$dt_itemset1 = $this->db->query("SELECT * FROM `dt_itemset1` WHERE lolos='1'")->result();
		foreach ($dt_itemset1 as $key => $value) {
			$produk_itemset1[] = $value->produk;
		}
		for ($a = 0; $a < sizeof($produk_itemset1); $a++) {
			for ($b = 0; $b < sizeof($produk_itemset1); $b++) {
				if ($produk_itemset1[$b] != $produk_itemset1[$a]) {
					$cek_dt = $this->db->query("SELECT * FROM `dt_itemset2` WHERE produk1 = '" . $produk_itemset1[$a] . "' AND produk2 = '" . $produk_itemset1[$b] . "' OR produk1 = '" . $produk_itemset1[$b] . "' AND produk2 ='" . $produk_itemset1[$a] . "'")->row();
					if (!$cek_dt) {
						$data = array(
							'produk1' => $produk_itemset1[$a],
							'produk2' => $produk_itemset1[$b]
						);
						$this->db->insert('dt_itemset2', $data);
					}
				}
			}
		}

		$dt_itemset2 = $this->db->query("SELECT produk1, produk2 FROM `dt_itemset2`")->result();
		foreach ($dt_itemset2 as $key => $value) {
			// echo $value->produk1 . ' - ' . $value->produk2 . '<br>';
			$tran = $this->db->query("SELECT * FROM `dt_tabular` GROUP BY id_order")->result();
			foreach ($tran as $key => $item) {
				// echo $item->id_order;
				$dtt = $this->db->query("SELECT * FROM `dt_tabular` WHERE id_order='" . $item->id_order . "'")->result();
				foreach ($dtt as $key => $c) {
					// echo ' | ' . $c->produk;
					if ($c->produk == $value->produk1 || $c->produk == $value->produk2) {
						// echo '1';
						$data = array(
							'id_order' => $item->id_order,
							'produk1' => $value->produk1,
							'produk2' => $value->produk2
						);
						$this->db->insert('dt_item', $data);
					} else {
						// echo '0';
					}
				}
				// echo '<br>';
			}
		}
		//memanggil data item sementara itemset 2 
		$dt_item = $this->db->query("SELECT id_order, COUNT(id_order) as jml, produk1, produk2 FROM `dt_item` GROUP BY id_order, produk1, produk2  ORDER BY `dt_item`.`produk2` ASC")->result();
		foreach ($dt_item as $key => $value) {
			if ($value->jml >= 2) {
				// echo $value->id_order . ' - ' . $value->jml . ' - ' . $value->produk1 . ' - ' . $value->produk2 . '<br>';
				$item_prod1[] = $value->produk1;
				$item_prod2[] = $value->produk2;
				$id_order[] = $value->id_order;
			}
		}

		// $this->mPerhitungan->truncate_tbl_item();
		for ($z = 0; $z < sizeof($item_prod1); $z++) {
			$data = array(
				'id_order' => $id_order[$z],
				'produk1' => $item_prod1[$z],
				'produk2' => $item_prod2[$z]
			);
			$this->db->insert('dt_item', $data);
		}

		//menghitung nilai support itemset 2
		$jml_transaksi = 0;
		$dt_item = $this->db->query("SELECT * FROM `dt_item` GROUP BY produk1, produk2")->result();
		foreach ($dt_item as $key => $value) {
			$produk1[] = $value->produk1;
			$produk2[] = $value->produk2;
			$var_support2 = $this->db->query("SELECT COUNT(id_order) as jml, produk1, produk2 FROM `dt_item` WHERE produk1='" . $value->produk1 . "' AND produk2='" . $value->produk2 . "' GROUP BY id_order")->result();
			foreach ($var_support2 as $key => $value) {
				if ($value->jml >= 2) {
					$jml_transaksi += 1;
				}
			}
			$num[] = $jml_transaksi;
		}



		for ($i = 0; $i < sizeof($produk1); $i++) {
			if ($i >= 1) {
				$jml_dt = $num[$i] - $num[$i - 1];
			} else {
				$jml_dt = $num[0];
			}
			// echo $jml_dt . '-' . $produk1[$i] . '-' . $produk2[$i];
			$support2 = $jml_dt / $dt_jml_sample->jml_transaksi;
			// echo $support2;

			if ($support2 >= $min_support) {
				$lolos2 = '1';
			} else {
				$lolos2 = '0';
			}

			//mengambil data transaksi untuk A
			$var_gab = 0;
			$set1 = $this->db->query("SELECT * FROM `dt_itemset1` WHERE produk='" . $produk1[$i] . "'")->row();
			$var_s = $set1->jumlah;
			$var_gab = $jml_dt;





			$conf = ($var_gab / $var_s) * 100;
			// echo '| ' . $conf . '<br>';

			$data = array(
				'produk1' => $produk1[$i],
				'produk2' => $produk2[$i],
				'min_support' => $min_support,
				'min_confidence' => $min_confidence,
				'jumlah' => $jml_dt,
				'support' => $support2,
				'confidence' => $conf,
				'lolos' => $lolos2,
				'type' => '1'
			);
			$this->db->insert('analisis', $data);
		}
		$this->session->set_flashdata('success', 'Produk berhasil dianalisis!');
		redirect('Admin/cAnalisis');
	}
	public function reseller()
	{
		$min_support = $this->session->userdata('min_support');
		$min_confidence = $this->session->userdata('min_confidence');
		// echo $min_support . 'Bismillah Perhitungan Algoritma Apriori!<br>';
		$this->mPerhitungan->truncate_tbl_all();
		//--------------------------------PROSES AWAL
		$dt_produk = $this->mPerhitungan->dt_produk();
		foreach ($dt_produk as $key => $value) {
			$dta_produk[] = $value->nama_produk;
		}

		//mengambil data transaksi -> produk
		$var_transaksi = $this->mPerhitungan->variabel_transaksi_reseller();
		foreach ($var_transaksi as $key => $value) {
			$var_produk = $this->mPerhitungan->variabel_produk($value->id_order);
			foreach ($var_produk as $key => $item) {
				// $produk = array();
				$produk[] = [$item->nama_produk, $item->id_order];
			}
		}

		for ($i = 0; $i < sizeof($produk); $i++) {
			// echo $produk[$i][0] . '|' . $produk[$i][1] . ', ';
			$data = array(
				'id_order' => $produk[$i][1],
				'produk' => $produk[$i][0]
			);
			$this->db->insert('dt_tabular', $data);
			// echo '<br>';
		}


		//-------------------------------------------PROSES ITEMSET 1
		//itemset 1
		$dt_jml_sample = $this->db->query("SELECT COUNT(id_order) as jml_transaksi FROM `transaksi` JOIN user ON user.id_user=transaksi.id_user WHERE level_user='5'")->row();
		$dt_tabular = $this->db->query("SELECT COUNT(id_dt_tabular) as jml, produk FROM `dt_tabular` GROUP BY produk")->result();
		foreach ($dt_tabular as $key => $value) {
			$jml = $value->jml;
			$support = $jml / $dt_jml_sample->jml_transaksi;
			if ($support >= $min_support) {
				$lolos = '1';
			} else {
				$lolos = '0';
			}
			$data = array(
				'produk' => $value->produk,
				'jumlah' => $jml,
				'support' => $support,
				'lolos' => $lolos
			);
			$this->db->insert('dt_itemset1', $data);
		}

		//--------------------------------------PROSES ITEMSET 2
		//itemset 2
		$dt_itemset1 = $this->db->query("SELECT * FROM `dt_itemset1` WHERE lolos='1'")->result();
		foreach ($dt_itemset1 as $key => $value) {
			$produk_itemset1[] = $value->produk;
		}
		for ($a = 0; $a < sizeof($produk_itemset1); $a++) {
			for ($b = 0; $b < sizeof($produk_itemset1); $b++) {
				if ($produk_itemset1[$b] != $produk_itemset1[$a]) {
					$cek_dt = $this->db->query("SELECT * FROM `dt_itemset2` WHERE produk1 = '" . $produk_itemset1[$a] . "' AND produk2 = '" . $produk_itemset1[$b] . "' OR produk1 = '" . $produk_itemset1[$b] . "' AND produk2 ='" . $produk_itemset1[$a] . "'")->row();
					if (!$cek_dt) {
						$data = array(
							'produk1' => $produk_itemset1[$a],
							'produk2' => $produk_itemset1[$b]
						);
						$this->db->insert('dt_itemset2', $data);
					}
				}
			}
		}

		$dt_itemset2 = $this->db->query("SELECT produk1, produk2 FROM `dt_itemset2`")->result();
		foreach ($dt_itemset2 as $key => $value) {
			// echo $value->produk1 . ' - ' . $value->produk2 . '<br>';
			$tran = $this->db->query("SELECT * FROM `dt_tabular` GROUP BY id_order")->result();
			foreach ($tran as $key => $item) {
				// echo $item->id_order;
				$dtt = $this->db->query("SELECT * FROM `dt_tabular` WHERE id_order='" . $item->id_order . "'")->result();
				foreach ($dtt as $key => $c) {
					// echo ' | ' . $c->produk;
					if ($c->produk == $value->produk1 || $c->produk == $value->produk2) {
						// echo '1';
						$data = array(
							'id_order' => $item->id_order,
							'produk1' => $value->produk1,
							'produk2' => $value->produk2
						);
						$this->db->insert('dt_item', $data);
					} else {
						// echo '0';
					}
				}
				// echo '<br>';
			}
		}
		//memanggil data item sementara itemset 2 
		$dt_item = $this->db->query("SELECT id_order, COUNT(id_order) as jml, produk1, produk2 FROM `dt_item` GROUP BY id_order, produk1, produk2  ORDER BY `dt_item`.`produk2` ASC")->result();
		foreach ($dt_item as $key => $value) {
			if ($value->jml >= 2) {
				// echo $value->id_order . ' - ' . $value->jml . ' - ' . $value->produk1 . ' - ' . $value->produk2 . '<br>';
				$item_prod1[] = $value->produk1;
				$item_prod2[] = $value->produk2;
				$id_order[] = $value->id_order;
			}
		}

		// $this->mPerhitungan->truncate_tbl_item();
		for ($z = 0; $z < sizeof($item_prod1); $z++) {
			$data = array(
				'id_order' => $id_order[$z],
				'produk1' => $item_prod1[$z],
				'produk2' => $item_prod2[$z]
			);
			$this->db->insert('dt_item', $data);
		}

		//menghitung nilai support itemset 2
		$jml_transaksi = 0;
		$dt_item = $this->db->query("SELECT * FROM `dt_item` GROUP BY produk1, produk2")->result();
		foreach ($dt_item as $key => $value) {
			$produk1[] = $value->produk1;
			$produk2[] = $value->produk2;
			$var_support2 = $this->db->query("SELECT COUNT(id_order) as jml, produk1, produk2 FROM `dt_item` WHERE produk1='" . $value->produk1 . "' AND produk2='" . $value->produk2 . "' GROUP BY id_order")->result();
			foreach ($var_support2 as $key => $value) {
				if ($value->jml >= 2) {
					$jml_transaksi += 1;
				}
			}
			$num[] = $jml_transaksi;
		}



		for ($i = 0; $i < sizeof($produk1); $i++) {
			if ($i >= 1) {
				$jml_dt = $num[$i] - $num[$i - 1];
			} else {
				$jml_dt = $num[0];
			}
			// echo $jml_dt . '-' . $produk1[$i] . '-' . $produk2[$i];
			$support2 = $jml_dt / $dt_jml_sample->jml_transaksi;
			// echo $support2;

			if ($support2 >= $min_support) {
				$lolos2 = '1';
			} else {
				$lolos2 = '0';
			}

			//mengambil data transaksi untuk A
			$var_gab = 0;
			$set1 = $this->db->query("SELECT * FROM `dt_itemset1` WHERE produk='" . $produk1[$i] . "'")->row();
			$var_s = $set1->jumlah;
			$var_gab = $jml_dt;





			$conf = ($var_gab / $var_s) * 100;
			// echo '| ' . $conf . '<br>';

			$data = array(
				'produk1' => $produk1[$i],
				'produk2' => $produk2[$i],
				'min_support' => $min_support,
				'min_confidence' => $min_confidence,
				'jumlah' => $jml_dt,
				'support' => $support2,
				'confidence' => $conf,
				'lolos' => $lolos2,
				'type' => '2'
			);
			$this->db->insert('analisis', $data);
		}
		$this->session->set_flashdata('success', 'Produk berhasil dianalisis!');
		redirect('Admin/cAnalisis');
	}
}

/* End of file cPerhitungan.php */
