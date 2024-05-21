<!-- Start Hero Section -->
<div class="hero">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-5">
				<div class="intro-excerpt">
					<h1>Chatting</h1>
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
</div>
<!-- End Hero Section -->

<?php
if ($this->session->userdata('success')) {
?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<?= $this->session->userdata('success') ?>
	</div>
<?php
}
?>

<div class="untree_co-section before-footer-section">
	<div class="container">
		<div class="row mb-5">
			<?php
			foreach ($pesan as $key => $value) {
				if ($value->pelanggan_send != NULL) {
			?>
					<div class="blog__comment__item">
						<div class="blog__comment__item__pic">
							<img src="<?= base_url('asset/ashion-master/') ?>img/blog/details/comment-3.jpg" alt="">
						</div>
						<div class="blog__comment__item__text">
							<h6><?= $value->nama ?></h6>
							<p><?= $value->pelanggan_send ?></p>
							<ul>
								<li><i class="fa fa-clock-o"></i> <?= $value->time ?></li>
							</ul>
						</div>
					</div>
					<hr>
				<?php
				} else if ($value->admin_send != NULL) {
				?>
					<div class="blog__comment__item blog__comment__item--reply">
						<div class="blog__comment__item__pic">
							<img src="<?= base_url('asset/ashion-master/') ?>img/blog/details/comment-1.jpg" alt="">
						</div>
						<div class="blog__comment__item__text">
							<h6>Admin</h6>
							<p><?= $value->admin_send ?></p>
							<ul>
								<li><i class="fa fa-clock-o"></i> <?= $value->time ?></li>

							</ul>
						</div>
					</div>
				<?php
				}
				?>
			<?php
			}
			?>
			<hr>
			<form action="<?= base_url('Pelanggan/cChatting') ?>" method="POST">
				<textarea class="form-control mt-3" name="pesan" placeholder="Masukkan pesan untuk admin..."></textarea>
				<button type="submit" class="btn btn-success mt-3">Kirim</button>
			</form>
		</div>
	</div>
</div>
