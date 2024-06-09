<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>User</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">User</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Akun User</h2>
			<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-folder-plus"></i> Data User</button>
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
							<h4>Informasi User</h4>
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
											<th>Level User</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($user as $key => $value) {
											if ($value->level_user != '4' && $value->level_user != '5') {


										?>
												<tr>
													<td><?= $value->nama ?></td>
													<td><?= $value->alamat ?></td>
													<td><?= $value->no_hp ?></td>
													<td><?= $value->username ?></td>
													<td><?= $value->password ?></td>
													<td><?php
														if ($value->level_user == '1') {
														?>
															<span class="badge badge-success">Admin</span>
														<?php
														} else if ($value->level_user == '2') {
														?>
															<span class="badge badge-warning">Marketing</span>
														<?php
														} else if ($value->level_user == '3') {
														?>
															<span class="badge badge-info">Manager</span>
														<?php
														}
														?>
													</td>
													<td>

														<button data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning"> Edit </button>
														<a href="<?= base_url('Admin/cUser/delete/' . $value->id_user) ?>" class="btn btn-danger"> Hapus </a>

													</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
	<div class="modal-dialog" role="document">
		<form action="<?= base_url('Admin/cUser/create') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Masukkan Data User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama User</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alamat" class="form-control" required>
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="text" name="no_hp" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="text" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Role User</label>
						<select name="level" class="form-control" required>
							<option value="">---Pilih Role User---</option>
							<option value="1">Admin</option>
							<option value="2">Marketing / Pelayan</option>
							<option value="3">Manager</option>
						</select>
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
foreach ($user as $key => $value) {
?>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $value->id_user ?>">
		<div class="modal-dialog" role="document">
			<form action="<?= base_url('Admin/cUser/update/' . $value->id_user) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Masukkan Data User</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama User</label>
							<input type="text" value="<?= $value->nama ?>" name="nama" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<input type="text" value="<?= $value->alamat ?>" name="alamat" class="form-control" required>
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" value="<?= $value->no_hp ?>" name="no_hp" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" value="<?= $value->username ?>" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" value="<?= $value->password ?>" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Role User</label>
							<select name="level" class="form-control" required>
								<option value="">---Pilih Role User---</option>
								<option value="1" <?php if ($value->level_user == '1') {
														echo 'selected';
													} ?>>Admin</option>
								<option value="2" <?php if ($value->level_user == '2') {
														echo 'selected';
													} ?>>Marketing / Pelayan</option>
								<option value="3" <?php if ($value->level_user == '3') {
														echo 'selected';
													} ?>>Manager</option>
							</select>
						</div>
					</div>
					<div class="modal-footer bg-whitesmoke br">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php
}
?>