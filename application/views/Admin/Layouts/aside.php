<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html">Z&J BAKERY</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">St</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Dashboard</li>
			<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Admin/cDashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>


			<li class="menu-header">Kelola Data</li>


			<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cUser') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Admin/cUser') ?>"><i class="far fa-user"></i> <span>Data User</span></a></li>
			<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cProduk') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Admin/cProduk') ?>"><i class="fas fa-store-alt"></i> <span>Data Produk</span></a></li>

			<li class="menu-header">Transaksi</li>


			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-store"></i> <span>Transaksi</span></a>
				<ul class="dropdown-menu">
					<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cBelumBayar') {
							echo 'class=active';
						}  ?>><a class="nav-link" href="<?= base_url('Admin/cBelumBayar') ?>">Belum Bayar</a></li>
					<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKonfirmasi') {
							echo 'class=active';
						}  ?>><a class="nav-link" href="<?= base_url('Admin/cKonfirmasi') ?>">Menunggu Konfirmasi</a></li>
					<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cProses') {
							echo 'class=active';
						}  ?>><a class="nav-link" href="<?= base_url('Admin/cProses') ?>">Pesanan Diproses</a></li>
					<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKirim') {
							echo 'class=active';
						}  ?>><a class="nav-link" href="<?= base_url('Admin/cKirim') ?>">Pesanan Dikirim</a></li>
					<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cSelesai') {
							echo 'class=active';
						}  ?>><a class="nav-link" href="<?= base_url('Admin/cSelesai') ?>">Pesanan Selesai</a></li>
				</ul>
			</li>
			<li <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cPelanggan') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Admin/cPelanggan') ?>"><i class="fas fa-users"></i> <span>Pelanggan</span></a></li>

		</ul>


	</aside>
</div>
