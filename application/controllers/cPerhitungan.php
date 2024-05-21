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
		echo 'Bismillah Perhitungan Algoritma Apriori!<br>';
		$this->mPerhitungan->truncate_tbl_all();
		//--------------------------------PROSES AWAL
		$dt_produk = $this->mPerhitungan->dt_produk();
		foreach ($dt_produk as $key => $value) {
			$dta_produk[] = $value->nm_produk;
		}

		//mengambil data transaksi -> produk
		$var_transaksi = $this->mPerhitungan->variabel_transaksi();
		foreach ($var_transaksi as $key => $value) {
			$var_produk = $this->mPerhitungan->variabel_produk($value->id_order);
			foreach ($var_produk as $key => $item) {
				// $produk = array();
				$produk[] = [$item->nm_produk, $item->id_order];
			}
		}

		for ($i = 0; $i < sizeof($produk); $i++) {

			// echo $produk[$i][0] . '|' . $produk[$i][1] . '<br>';
			$data = array(
				'id_order' => $produk[$i][1],
				'produk' => $produk[$i][0]
			);
			$this->db->insert('dt_tabular', $data);
		}

		//-------------------------------------------PROSES ITEMSET 1
		//itemset 1
		$dt_tabular = $this->db->query("SELECT COUNT(id_dt_tabular) as jml, produk FROM `dt_tabular` GROUP BY produk")->result();
		foreach ($dt_tabular as $key => $value) {
			$jml = $value->jml;
			$support = $jml / 7;
			if ($support >= 0.3) {
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
			$tran = $this->db->query("SELECT * FROM `dt_tabular` GROUP BY id_transaksi")->result();
			foreach ($tran as $key => $item) {
				// echo $item->id_transaksi;
				$dtt = $this->db->query("SELECT * FROM `dt_tabular` WHERE id_transaksi='" . $item->id_transaksi . "'")->result();
				foreach ($dtt as $key => $c) {
					echo ' | ' . $c->produk;
					if ($c->produk == $value->produk1 || $c->produk == $value->produk2) {
						// echo '1';
						$data = array(
							'id_transaksi' => $item->id_transaksi,
							'produk1' => $value->produk1,
							'produk2' => $value->produk2
						);
						$this->db->insert('dt_item', $data);
					} else {
						echo '0';
					}
				}
				echo '<br>';
			}
		}
		//memanggil data item sementara itemset 2 
		$dt_item = $this->db->query("SELECT id_transaksi, COUNT(id_transaksi) as jml, produk1, produk2 FROM `dt_item` GROUP BY id_transaksi, produk1, produk2  ORDER BY `dt_item`.`produk2` ASC")->result();
		foreach ($dt_item as $key => $value) {
			if ($value->jml >= 2) {
				// echo $value->id_transaksi . ' - ' . $value->jml . ' - ' . $value->produk1 . ' - ' . $value->produk2 . '<br>';
				$item_prod1[] = $value->produk1;
				$item_prod2[] = $value->produk2;
				$id_transaksi[] = $value->id_transaksi;
			}
		}

		// $this->mPerhitungan->truncate_tbl_item();
		for ($z = 0; $z < sizeof($item_prod1); $z++) {
			$data = array(
				'id_transaksi' => $id_transaksi[$z],
				'produk1' => $item_prod1[$z],
				'produk2' => $item_prod2[$z]
			);
			$this->db->insert('dt_item', $data);
		}

		//menghitung nilai support itemset 2
		$var_support2 = $this->db->query("SELECT COUNT(id_transaksi) as jml, produk1, produk2 FROM `dt_item` GROUP BY produk1, produk2")->result();
		foreach ($var_support2 as $key => $value) {
			// echo $value->jml . '-' . $value->produk1 . '-' . $value->produk2;
			$support2 = $value->jml / 7;
			// echo $support2 . '<br>';

			if ($support2 >= 0.3) {
				$lolos2 = '1';
			} else {
				$lolos2 = '0';
			}
			$data = array(
				'jumlah' => $value->jml,
				'support' => $support2,
				'lolos' => $lolos2
			);
			$this->db->where('produk1', $value->produk1);
			$this->db->where('produk2', $value->produk2);
			$this->db->update('dt_itemset2', $data);
		}

		//-------------------------------------------PROSES ITEMSET 3
		//mengambil data itemset 2 yang lolos
		$data_itemset2 = $this->db->query("SELECT * FROM `dt_itemset2` WHERE lolos='1' GROUP BY produk1")->result();
		foreach ($data_itemset2 as $key => $value) {
			echo $value->produk1;
		}
	}
}

/* End of file cPerhitungan.php */
