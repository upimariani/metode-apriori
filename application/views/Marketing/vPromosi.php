<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Promosi Produk</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Promosi Produk</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Promosi Produk Z&J Bakery</h2>
			<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-folder-plus"></i> Data Promosi</button>
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
							<h4>Informasi Promosi Produk</h4>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table id="table-1" class="table table-striped">
									<thead>
										<tr>
											<th>Nama Produk </th>
											<th>Nama Promosi</th>
											<th>Deskripsi</th>
											<th>Potongan Harga (%)</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($promosi as $key => $value) {
										?>
											<tr>
												<td><strong><?= $value->nama_produk ?></strong></td>
												<td><?= $value->nama_promosi ?></td>
												<td><?= $value->deskripsi_promosi ?></td>
												<td><?= $value->potongan_harga ?>%</td>
												<td>
													<button data-toggle="modal" data-target="#edit<?= $value->id_promosi ?>" class="btn btn-warning"> Edit </button>
													<a href="<?= base_url('Marketing/cPromosi/delete/' . $value->id_promosi) ?>" class="btn btn-danger"> Hapus </a>
												</td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
	<div class="modal-dialog" role="document">
		<?php echo form_open_multipart('marketing/cpromosi/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Masukkan Data Promosi Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="input-2">Nama Produk</label>
					<select class="form-control" name="produk">
						<option value="">---Pilih Produk---</option>
						<?php
						foreach ($produk as $key => $value) {
						?>
							<option value="<?= $value->id_produk ?>"><?= $value->nama_produk ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="input-3">Nama Promosi</label>
					<input type="text" name="promosi" class="form-control" id="input-3" placeholder="Masukkan Nama Promosi" required>
				</div>
				<div class="form-group">
					<label for="input-4">Deskripsi</label>
					<input type="text" name="deskripsi" class="form-control" id="input-4" placeholder="Masukkan Deskripsi" required>
				</div>
				<div class="form-group">
					<label for="input-4">Potongan Harga (%)</label>
					<input type="number" name="diskon" class="form-control" id="input-4" placeholder="Masukkan Potongan Harga" required>
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
foreach ($promosi as $key => $value) {
?>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $value->id_promosi ?>">
		<div class="modal-dialog" role="document">
			<?php echo form_open_multipart('marketing/cpromosi/update/' . $value->id_promosi); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Masukkan Data Promosi Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="input-2">Nama Produk</label>
						<select class="form-control" name="produk">
							<option value="">---Pilih Produk---</option>
							<?php
							foreach ($produk as $key => $item) {
							?>
								<option value="<?= $item->id_produk ?>" <?php if ($value->id_produk == $item->id_produk) {
																			echo 'selected';
																		} ?>><?= $item->nama_produk ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="input-3">Nama Promosi</label>
						<input type="text" value="<?= $value->nama_promosi ?>" name="promosi" class="form-control" id="input-3" placeholder="Masukkan Nama Promosi" required>
					</div>
					<div class="form-group">
						<label for="input-4">Deskripsi</label>
						<input type="text" value="<?= $value->deskripsi_promosi ?>" name="deskripsi" class="form-control" id="input-4" placeholder="Masukkan Deskripsi" required>
					</div>
					<div class="form-group">
						<label for="input-4">Potongan Harga (%)</label>
						<input type="number" value="<?= $value->potongan_harga ?>" name="diskon" class="form-control" id="input-4" placeholder="Masukkan Potongan Harga" required>
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
