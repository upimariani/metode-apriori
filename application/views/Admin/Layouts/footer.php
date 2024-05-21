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
</body>

</html>
