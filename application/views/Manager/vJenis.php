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
												<td><a href="<?= base_url('Manager/cAnalisis/detail_analisis/' . $value->type . '/' . $value->min_support . '/' . $value->min_confidence) ?>" class="btn btn-success">Detail</a></td>
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