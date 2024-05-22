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
			<div class="col-lg-7 col-md-12 col-12 col-sm-12">
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
			<div class="col-lg-5 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Chatting</h4>
					</div>
					<div class="card-body">
						<ul class="list-unstyled list-unstyled-border">
							<?php
							foreach ($chatting as $key => $value) {
							?>
								<li class="media">
									<img class="mr-3 rounded-circle" width="50" src="<?= base_url('asset/stisla-1-2.2.0/dist/') ?>assets/img/avatar/avatar-1.png" alt="avatar">
									<div class="media-body">
										<div class="float-right text-primary"><?= $value->time ?></div>
										<div class="media-title"><?= $value->nama ?></div>
										<a href="<?= base_url('Admin/cDashboard/view_chatting/' . $value->id_user) ?>"><span class="text-small text-muted">View</span></a>
									</div>
								</li>
							<?php
							}
							?>


						</ul>

					</div>
				</div>
			</div>
		</div>

	</section>
</div>