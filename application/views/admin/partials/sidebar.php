<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-building"></i>
				</div>
				<div class="sidebar-brand-text mx-3">KANWIL ATR/BPN<sup></sup></div>
			</a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('dashboard') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Pilih Menu
			</div>
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Profile Website</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Konfigurasi :</h6>
            <a class="collapse-item" href="<?= base_url('admin/konfigurasi') ?>">Konfigurasi Umum</a>
            <a class="collapse-item" href="<?= base_url('admin/konfigurasi/logo') ?>">Konfigurasi Logo</a>
            <a class="collapse-item" href="<?= base_url('admin/konfigurasi/icon') ?>">Konfigurasi Icon</a>
            <a class="collapse-item" href="<?= base_url('admin/konfigurasi/banner') ?>">Konfigurasi Banner</a>
          </div>
        </div>
      </li>
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="nav-icon fas fa-user"></i>
          <span>Data User</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data:</h6>
            <a class="collapse-item" href="<?= base_url('pimpinan'); ?>">Login Kepala Kantor</a>
            <a class="collapse-item" href="<?= base_url('pegawai'); ?>">Login Pegawai</a>
            <a class="collapse-item" href="<?= base_url('pengguna'); ?>">Login Admin</a>
            
            </div>
        </div>
        </li>
			<li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('barang') ?>">
					<i class="fas fa-fw fa-box"></i>
					<span>Data Barang</span></a>
			</li>
			<li class="nav-item <?= $aktif == 'tb_kategori' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('kategori') ?>">
					<i class="fas fa-fw fa-box"></i>
					<span>Kategori</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Transaksi
			</div>

			<li class="nav-item <?= $aktif == 'penerimaan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('penerimaan') ?>">
					<i class="far fa-arrow-alt-circle-right"></i>
					<span>Barang Masuk</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'pengeluaran' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('pengeluaran') ?>">
					<i class="far fa-arrow-alt-circle-left"></i>
					<span>Barang Keluar</span></a>
			</li>
			<li class="nav-item <?= $aktif == 'laporan' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('laporan') ?>">
					<i class="far fa-arrow-alt-circle-left"></i>
					<span>Transaksi Pelaporan</span></a>
			</li>
			<!-- Divider -->
			<hr class="sidebar-divider">
	
			<div class="sidebar-heading">
				Laporan
			</div>

			<li class="nav-item <?= $aktif == 'supplier' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('supplier') ?>">
					<i class="fas fa-dolly"></i>
					<span>Data Sumber Barang</span></a>
			</li>

			<li class="nav-item <?= $aktif == 'peminjam' ? 'active' : '' ?>">
				<a class="nav-link" href="<?= base_url('peminjam') ?>">
					<i class="fas fa-truck"></i>
					<span>Data Peminjam</span></a>
			</li>

			<hr class="sidebar-divider">
			<?php if ($this->session->login['role'] == 'admin'): ?>
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