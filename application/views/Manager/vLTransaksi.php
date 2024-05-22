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
			<div class="card">
				<div class="card-header">
					<h4>Cetak Laporan Transaksi</h4>
				</div>
				<div class="card-body">
					<form action="<?= base_url('Manager/cLTransaksi/cetak') ?>">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Bulan</label>
									<select name="bulan" class="form-control">
										<?php
										for ($i = 1; $i <= 12; $i++) {
										?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Tahun</label>
									<select name="tahun" class="form-control">
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<button class="btn btn-success">Cetak</button>
							</div>
						</div>
					</form>
				</div>
			</div>
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
