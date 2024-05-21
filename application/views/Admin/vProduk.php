<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Produk</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#">Modules</a></div>
				<div class="breadcrumb-item">Produk</div>
			</div>
		</div>

		<div class="section-body">
			<h2 class="section-title">Produk Z&J Bakery</h2>
			<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-folder-plus"></i> Data Produk</button>
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
											<th>Nama Produk </th>
											<th>Gambar</th>
											<th>Keterangan</th>
											<th>Harga</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($produk as $key => $value) {
										?>
											<tr>
												<td><strong><?= $value->nama_produk ?></strong></td>

												<td>
													<ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
														<li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-lg pull-up" title="Lilian Fuller">
															<img src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>" alt="Avatar" class="rounded-circle" />
														</li>

													</ul>
												</td>
												<td>
													<?= $value->keterangan ?>
												</td>
												<td>Rp. <?= number_format($value->harga_jual, 0) ?></td>
												<td>
													<button data-toggle="modal" data-target="#edit<?= $value->id_produk ?>" class="btn btn-warning"> Edit </button>
													<a href="<?= base_url('Admin/cProduk/delete/' . $value->id_produk) ?>" class="btn btn-danger"> Hapus </a>
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
		<?php echo form_open_multipart('admin/cproduk/create'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Masukkan Data Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="input-2">Nama Produk</label>
					<input type="text" name="nama" class="form-control" id="input-2" placeholder="Masukkan Nama Produk" required>

				</div>
				<div class="form-group">
					<label for="input-3">Keterangan</label>
					<input type="text" name="keterangan" class="form-control" id="input-3" placeholder="Masukkan keterangan" required>

				</div>
				<div class="form-group">
					<label for="input-4">Harga</label>
					<input type="number" name="harga" class="form-control" id="input-4" placeholder="Masukkan Harga" required>

				</div>
				<div class="form-group">
					<label for="input-5">Gambar</label>
					<input type="file" name="gambar" class="form-control" id="input-5" required>
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
foreach ($produk as $key => $value) {
?>
	<div class="modal fade" tabindex="-1" role="dialog" id="edit<?= $value->id_produk ?>">
		<div class="modal-dialog" role="document">
			<?php echo form_open_multipart('admin/cproduk/update/' . $value->id_produk); ?>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Masukkan Data Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="input-2">Nama Produk</label>
						<input type="text" value="<?= $value->nama_produk ?>" name="nama" class="form-control" id="input-2" placeholder="Masukkan Nama Produk" required>

					</div>
					<div class="form-group">
						<label for="input-3">Keterangan</label>
						<input type="text" value="<?= $value->keterangan ?>" name="keterangan" class="form-control" id="input-3" placeholder="Masukkan keterangan" required>

					</div>
					<div class="form-group">
						<label for="input-4">Harga</label>
						<input type="number" value="<?= $value->harga_jual ?>" name="harga" class="form-control" id="input-4" placeholder="Masukkan Harga" required>

					</div>
					<div class="form-group">
						<label for="input-5">Gambar</label><br>
						<img style="width: 100px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>">
						<input type="file" name="gambar" class="form-control" id="input-5">
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
