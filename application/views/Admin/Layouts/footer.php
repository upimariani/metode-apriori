<footer class="main-footer">
	<div class="footer-left">
		ZNJ BAKERY - METODE ALGORITMA APRIORI
	</div>
	<div class="footer-right">
		NURUL
	</div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/jquery.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/popper.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/tooltip.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/moment.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/chart.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/summernote/summernote-bs4.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/js/page/index-0.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/js/page/modules-datatables.js"></script>
<!-- Template JS File -->
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/js/scripts.js"></script>
<script src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/js/custom.js"></script>
<script src="<?= base_url('asset/chart/js_chart.js') ?>"></script>
<script src="<?= base_url('asset/chart/')  ?>code/highcharts.js"></script>
<script src="<?= base_url('asset/chart/')  ?>code/modules/exporting.js"></script>
<script src="<?= base_url('asset/chart/')  ?>code/modules/export-data.js"></script>
<script src="<?= base_url('asset/chart/')  ?>code/modules/accessibility.js"></script>
<script>
	<?php
	$transaksi = $this->db->query("SELECT SUM(total_bayar) as jml, tgl FROM `transaksi` GROUP BY MONTH(tgl)")->result();
	foreach ($transaksi as $key => $value) {
		$tgl[] = $value->tgl;
		$jml[] = $value->jml;
	}

	?>
	var ctx = document.getElementById('transaksi');
	var grafik = new Chart(ctx, {
		type: 'line',
		data: {
			labels: <?= json_encode($tgl) ?>,
			datasets: [{
				label: 'Jumlah Pendapatan Transaksi Per Bulan',
				data: <?= json_encode($jml) ?>,
				backgroundColor: 'rgb(70,130,180)',
				borderColor: 'rgba(127, 111, 134, 0.5)',
				color: '#666',
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	<?php
	$produk = $this->db->query("SELECT SUM(qty) as qty, nama_produk FROM `order_produk` JOIN produk ON produk.id_produk=order_produk.id_produk GROUP BY nama_produk")->result();
	foreach ($produk as $key => $value) {
		$nama_produk[] = $value->nama_produk;
		$total[] = $value->qty;
	}

	?>
	var ctx = document.getElementById('produk');
	var grafik = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?= json_encode($nama_produk) ?>,
			datasets: [{
				label: 'Jumlah Penjualan Produk',
				data: <?= json_encode($total) ?>,
				backgroundColor: [
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
				],
				borderColor: [
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
					'rgba(201, 77, 77, 1)',
					'rgba(128, 98, 98, 1)',
					'rgba(0, 0, 0, 1)',
					'rgba(128, 128, 128, 1)',
					'rgba(255, 99, 132, 0.80)',
					'rgba(54, 162, 235, 0.80)',
					'rgba(255, 206, 86, 0.80)',
					'rgba(75, 192, 192, 0.80)',
					'rgba(153, 102, 255, 0.80)',
					'rgba(255, 159, 64, 0.80)',
					'rgba(201, 76, 76, 0.3)',
					'rgba(201, 77, 77, 1)',
					'rgba(0, 140, 162, 1)',
					'rgba(158, 109, 8, 1)',
					'rgba(201, 76, 76, 0.8)',
					'rgba(0, 129, 212, 1)',
					'rgba(201, 77, 201, 1)',
					'rgba(255, 207, 207, 1)',
				],
				color: '#666',
				fill: false,
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script type="text/javascript">
	<?php
	$dt_analisis = $this->db->query("SELECT * FROM `analisis` WHERE min_support='" . $min_support . "' AND min_confidence='" . $min_confidence . "' AND type='" . $type . "' AND lolos='1'")->result();
	foreach ($dt_analisis as $key => $value) {
		$itemset2[] = $value->produk1 . ' => ' . $value->produk2;
	}
	$dt_set1 = $this->db->query("SELECT analisis.produk1, dt_itemset1.produk, dt_itemset1.jumlah, min_support, min_confidence FROM `analisis` JOIN dt_itemset1 ON analisis.produk1=dt_itemset1.produk WHERE type='" . $type . "' AND analisis.lolos='1' AND min_support='" . $min_support . "' AND min_confidence='" . $min_confidence . "'")->result();
	?>
	Highcharts.chart('container', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Jumlah Quantity Produk Itemset 1 dan Itemset 2'
		},
		subtitle: {
			text: 'Analisis Metode Algoritma Apriori'
		},
		xAxis: {
			categories: <?= json_encode($itemset2) ?>
		},
		yAxis: {
			title: {
				text: 'Quantity'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'Itemset 1',
			data: [<?php foreach ($dt_set1 as $key => $value) {
						echo $value->jumlah . ',';
					} ?>]
		}, {
			name: 'Itemset 2',
			data: [<?php foreach ($dt_analisis as $key => $value) {
						echo $value->jumlah . ',';
					} ?>]
		}]
	});
</script>
</body>

</html>
