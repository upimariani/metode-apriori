<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Analisis Produk</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Analisis</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Analisis Produk Z&J Bakery</h2>
			<div class="card">
				<div class="card-header">
					<h4>Cetak Laporan Analisis Produk</h4>
				</div>
				<div class="card-body">
					<form action="<?= base_url('Manager/cLAnalisis/cetak') ?>" method="POST">
						<div class="form-group">
							<select class="form-control" name="jenis">
								<option value="">---Pilih Jenis Pembeli---</option>
								<option value="1">Pelanggan</option>
								<option value="2">Reseller</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Cetak</button>
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
							<h4>Informasi Produk</h4>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table id="table-1" class="table table-striped">
									<thead>
										<tr>
											<th>Produk Pertama</th>
											<th>Produk Kedua</th>
											<th>Jumlah</th>
											<th>Support</th>
											<th>Jenis Pelanggan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($analisis as $key => $value) {
											if ($value->lolos == '1') {

										?>
												<tr>
													<td>If buy <strong><?= $value->produk1 ?></strong></td>
													<td>Then buy <strong><?= $value->produk2 ?></strong></td>
													<td><?= $value->jumlah ?></td>
													<td><?= round($value->support, 2) ?></td>
													<td><?php
														if ($value->type == '1') {
														?>
															<span class="badge badge-success">Pelanggan</span>
														<?php
														} else if ($value->type == '2') {
														?>
															<span class="badge badge-warning">Reseller</span>
														<?php
														}
														?>
													</td>

												</tr>
										<?php
											}
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