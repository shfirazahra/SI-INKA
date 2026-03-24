<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-building"></i>
				</div>
				<div class="sidebar-brand-text mx-3">KANWIL ATR/BPN<sup></sup></div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboardku' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('dashboardku') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard Pimpinan</span></a>
			</li>
			<hr class="sidebar-divider">

			
	 
			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Transaksi
			</div>

			<li class="nav-item <?= $aktif == 'penerimaanku' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('penerimaanku') ?>">
					<i class="far fa-arrow-alt-circle-right"></i>
					<span>Barang Masuk</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'pengeluaranku' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('pengeluaranku') ?>">
					<i class="far fa-arrow-alt-circle-left"></i>
					<span>Barang Keluar</span></a>
			</li>
			<li class="nav-item <?= $aktif == 'laporan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('laporan') ?>">
					<i class="far fa-arrow-alt-circle-left"></i>
					<span>Pelaporan</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Laporan
			</div>

			<li class="nav-item <?= $aktif == 'supplierku' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('supplierku') ?>">
					<i class="fas fa-dolly"></i>
					<span>Data Sumber Barang</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'peminjamku' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('peminjamku') ?>">
					<i class="fas fa-truck"></i>
					<span>Data Peminjam</span></a>
			</li>

			<hr class="sidebar-divider">
			<?php if ($this->session->login['role'] == 'pimpinan'): ?>
				<!-- Heading -->
				<div class="sidebar-heading">
					Pengaturan
				</div>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('logout') ?>">
						<i class="fas fa-sign-out-alt"></i>
						<span>Logout</span></a>
				</li>

				<!-- Divider -->
			<?php endif; ?>
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>