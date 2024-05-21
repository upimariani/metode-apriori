<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Transaksi</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Transaksi</div>
			</div>
		</div>
		<div class="section-body">
			<h2 class="section-title">Transaksi</h2>
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
							<h4>Informasi Transaksi Selesai</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table-1">
									<thead>
										<tr>
											<th>Id Transaksi </th>
											<th>Atas Nama</th>
											<th>Tanggal Order</th>
											<th>Total Bayar</th>
											<th>Status Order</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($transaksi['selesai'] as $key => $value) {
										?>
											<tr>
												<td><?= $value->id_order ?></td>
												<td><?= $value->nama ?></td>
												<td><?= $value->tgl ?></td>
												<td>Rp. <?= number_format($value->total_bayar)  ?></td>
												<td><span class="badge bg-success">Pesanan Selesai</span></td>
												<td><a class="btn btn-warning" href="<?= base_url('Admin/cBelumBayar/detail_transaksi/' . $value->id_order) ?>">Detail Transaksi</a></td>
											</tr>
										<?php
										}
										?>
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
