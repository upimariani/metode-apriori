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
							<h4>Nilai Minimum Support dan Nilai Minimum Confidence</h4>
						</div>
						<div class="card-body">
							<form action="<?= base_url('cPerhitungan') ?>" method="POST">
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label>Nilai Minimum Support <small class="text-danger">Nilai decimal menggunakan (.)</small></label>
											<input type="text" class="form-control" name="min_support">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Nilai Minimum Confidence %</label>
											<input type="number" class="form-control" name="min_confidence">
										</div>
									</div>
									<div class="col-lg-4">
										<label>Jenis Analisis</label>
										<select class="form-control" name="jenis">
											<option value="1">Pelanggan</option>
											<option value="2">Reseller</option>
										</select>
									</div>
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-success">Perbaharui Analisis</button>
								</div>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h4>Informasi Jenis Pelanggan</h4>

						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table id="table-1" class="table table-striped">
									<thead>
										<tr>
											<th>Jenis Pelanggan</th>
											<th>Nilai Minimal Support</th>
											<th>Nilai Minimal Confidence</th>
											<th>View</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($jenis as $key => $value) {

										?>
											<tr>
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
												<td><?= $value->min_support ?></td>
												<td><?= $value->min_confidence ?>%</td>
												<td><a href="<?= base_url('Admin/cAnalisis/detail_analisis/' . $value->type . '/' . $value->min_support . '/' . $value->min_confidence) ?>" class="btn btn-success">Detail</a></td>
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