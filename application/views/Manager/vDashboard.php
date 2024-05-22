<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<?php
		$user = $this->db->query("SELECT COUNT(id_user) as jml FROM `user` WHERE level_user != '4'")->row();
		$pelanggan = $this->db->query("SELECT COUNT(id_user) as jml FROM `user` WHERE level_user = '4'")->row();
		$produk = $this->db->query("SELECT COUNT(id_produk) as jml FROM `produk`")->row();
		?>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total User</h4>
						</div>
						<div class="card-body">
							<?= $user->jml ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pelanggan</h4>
						</div>
						<div class="card-body">
							<?= $pelanggan->jml ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="far fa-file"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Produk</h4>
						</div>
						<div class="card-body">
							<?= $produk->jml ?>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Grafik Penjualan Per Hari</h4>
						<div class="card-header-action">

						</div>
					</div>
					<div class="card-body">
						<canvas id="transaksi" height="182"></canvas>

					</div>
				</div>
			</div>

		</div>

	</section>
</div>