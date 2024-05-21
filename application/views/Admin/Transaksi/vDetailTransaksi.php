<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Invoice</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
				<div class="breadcrumb-item">Invoice</div>
			</div>
		</div>

		<div class="section-body">
			<div class="invoice">
				<div class="invoice-print">
					<div class="row">
						<div class="col-lg-12">
							<div class="invoice-title">
								<h2>Invoice</h2>
								<div class="invoice-number"><strong>00<?= $detail['transaksi']->id_order ?></strong></div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<address>
										<strong>
											<?= $detail['transaksi']->nama ?>
										</strong><br>
										<?= $detail['transaksi']->alamat ?><br>

									</address>
								</div>

							</div>
							<div class="row">

								<div class="col-md-6">
									<hr>
									<?php
									if ($detail['transaksi']->stat_order != '0') {
									?>
										<h4>Bukti Pembayaran</h4>
										<img style="width: 250px;" src="<?= base_url('asset/bukti-pembayaran/' . $detail['transaksi']->bukti_bayar) ?>">

									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-md-12">
							<div class="section-title">Order Summary</div>
							<p class="section-lead">All items here cannot be deleted.</p>
							<table class="table">
								<thead>
									<tr>
										<th>Quantity</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Diskon</th>
										<th class="text-right">Amount</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($detail['pesanan'] as $key => $value) {
									?>
										<tr>
											<td><?= $value->qty ?></td>
											<td><?= $value->nama_produk ?></td>
											<td>Rp. <?= number_format($value->harga_jual, 0)  ?></td>
											<td><?php if ($value->potongan_harga == null) {
													echo '0';
												} else {
													echo $value->potongan_harga;
												}  ?>%</td>
											<td class="text-right">Rp.<?= number_format(($value->harga_jual - (($value->potongan_harga / 100) * $value->harga_jual)) *  $value->qty) ?></td>
										</tr>
									<?php
									}
									?>


									<tr>
										<th>

										</th>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th>Total </th>
										<th class="text-right">Rp. <?= number_format($detail['transaksi']->total_bayar)  ?></th>
									</tr>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
			<hr>
			<div class="text-md-right">
				<div class="float-lg-left mb-lg-0 mb-3">
					<?php
					if ($detail['transaksi']->stat_order == '1') {
					?>
						<a href="<?= base_url('Admin/cKonfirmasi/konfirmasi/' . $detail['transaksi']->id_order) ?>" class="btn btn-warning">Konfirmasi</a>
					<?php
					} else if ($detail['transaksi']->stat_order == '2') {
					?>
						<a href="<?= base_url('Admin/cKirim/kirim/' . $detail['transaksi']->id_order) ?>" class="btn btn-info">Pesanan Dikirim</a>

					<?php
					}
					?>
				</div>
				<button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
			</div>
		</div>
</div>
</section>
</div>
