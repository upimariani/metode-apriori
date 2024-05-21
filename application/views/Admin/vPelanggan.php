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
											<th>Nama User</th>
											<th>Alamat</th>
											<th>No Telepon</th>
											<th>Username</th>
											<th>Password</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($user as $key => $value) {
											if ($value->level_user == '4') {


										?>
												<tr>
													<td><?= $value->nama ?></td>
													<td><?= $value->alamat ?></td>
													<td><?= $value->no_hp ?></td>
													<td><?= $value->username ?></td>
													<td><?= $value->password ?></td>


												</tr>
										<?php
											}
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