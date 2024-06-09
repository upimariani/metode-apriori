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
			<li <?php if ($this->uri->segment(1) == 'Manager' && $this->uri->segment(2) == 'cDashboard') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Manager/cDashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>


			<li class="menu-header">Laporan</li>



			<li <?php if ($this->uri->segment(1) == 'Manager' && $this->uri->segment(2) == 'cLTransaksi') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Manager/cLTransaksi') ?>"><i class="fas fa-store-alt"></i> <span>Laporan Transaksi</span></a></li>

			<li <?php if ($this->uri->segment(1) == 'Manager' && $this->uri->segment(2) == 'cLAnalisis') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Manager/cLAnalisis') ?>"><i class="fas fa-percentage"></i> <span>Laporan Analisis Produk</span></a></li>

			<li class="menu-header">Analisis</li>
			<li <?php if ($this->uri->segment(1) == 'Manager' && $this->uri->segment(2) == 'cAnalisis') {
					echo 'class=active';
				}  ?>><a class="nav-link" href="<?= base_url('Manager/cAnalisis') ?>"><i class="fas fa-tag"></i> <span>Analisis Produk</span></a></li>
		</ul>
	</aside>
</div>