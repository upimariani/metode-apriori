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
				<div class="col-lg-12 col-md-12 col-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4>Grafik Analisis Produk</h4>
							<div class="card-header-action">

							</div>
						</div>
						<div class="card-body">
							<div id="container" class="card-body">
								<canvas height="250"></canvas>


							</div>

						</div>
					</div>
				</div>
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
											<th>Minimal Support</th>
											<th>Minimal Confidence</th>
											<th>Jumlah</th>
											<th>Support</th>
											<th>Confidence</th>
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
													<td><?= $value->min_support ?></td>
													<td><?= $value->min_confidence ?></td>
													<td><?= $value->jumlah ?></td>
													<td><?= round($value->support, 2) ?></td>
													<td><?= round($value->confidence) ?>%</td>
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