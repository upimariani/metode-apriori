<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Pelanggan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Pelanggan</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Akun Pelanggan</h2>
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Informasi Pelanggan</h4>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th>Tanggal Transaksi</th>
											<th>Total Transaksi</th>
											<th>Alamat</th>
											<th>Produk yang dibeli</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($history as $key => $value) {
											$produk = $this->db->query("SELECT * FROM `transaksi` JOIN order_produk ON transaksi.id_order=order_produk.id_order JOIN produk ON produk.id_produk=order_produk.id_produk WHERE transaksi.id_order='" . $value->id_order . "'")->result();
										?>
											<tr>
												<td><?= $value->tgl ?></td>
												<td>Rp. <?= number_format($value->total_bayar)  ?></td>
												<td><?= $value->alamat ?></td>
												<td><?php foreach ($produk as $key => $item) {
														echo $item->nama_produk . ',';
													} ?></td>


											</tr>
										<?php

										}
										?>

									</tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>