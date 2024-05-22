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
				<div class="col-lg-5">
					<div class="card">
						<div class="card-header">
							<h3>Tambah Data Produk</h3>

						</div>
						<div class="card-body">
							<form action="<?= base_url('Marketing/cTransaksiLangsung/addtocart') ?>" method="POST">
								<div class="form-group">
									<label for="input-1">Nama Produk</label>
									<select name="produk" class="form-control" required>
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
									<label for="input-2">Jumlah</label>
									<input type="text" name="qty" class="form-control" id="input-2" placeholder="Masukkan Jumlah Transaksi" required>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-success px-5"><i class="ik ik-moon"></i> Add To Cart</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="card">
						<div class="card-header d-block">
							<h3>Keranjang</h3>
							<span>Informasi Keranjang Pelanggan</span>
						</div>
						<div class="card-body p-0 table-border-style">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Produk</th>
											<th>Harga</th>
											<th>Sutotal</th>
											<th>Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($this->cart->contents() as $key => $value) {
										?>
											<tr>
												<td><?= $value['qty'] ?> x</td>
												<td><?= $value['name'] ?></td>
												<td>Rp. <?= number_format($value['price']) ?></td>
												<td>Rp. <?= number_format($value['price'] * $value['qty'])  ?></td>
												<td> <a href="<?= base_url('Marketing/cTransaksiLangsung/delete/' . $value['rowid']) ?>"><i class="fas fa-trash"></i></a></td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
								<hr>
								<a href="<?= base_url('Marketing/cTransaksiLangsung/selesai') ?>" class="btn btn-success mb-3 mt-3 ml-3">Selesai</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>