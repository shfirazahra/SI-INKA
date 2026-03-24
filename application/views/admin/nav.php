<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?= base_url('assets'); ?>/img/logobpn.png" type="image/png">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url(); ?>sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="<?= base_url(); ?>sb-admin/css/sb-admin-2.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="<?= base_url(); ?>sb-admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-book"></i>
        </div>
        <span class="brand-text font-weight-light mx-3">Kanwil ATR/BPN Jateng</span>
       
      </a>

      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
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
      <!-- Nav Item - Produk Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseThree">
        <i class="nav-icon fas fa-user"></i>
          <span>Data User</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data:</h6>
            <a class="collapse-item" href="<?= base_url('pinpinan'); ?>">Login Kepala Kantor</a>
            <a class="collapse-item" href="<?= base_url('pegawai'); ?>">Login Pegawai</a>
            <a class="collapse-item" href="<?= base_url('admin'); ?>">Login Admin</a>
            
            </div>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('barang'); ?>">
          <i class="nav-icon fas fa-fw fa-box"></i>
          <span>Data Barang</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('kategori'); ?>">
          <i class="nav-icon fas fa-sign"></i>
          <span>Kategori</span></a>
      </li>
<!-- Heading -->
<div class="sidebar-heading">
        Transaksi
      </div>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('penerimaan'); ?>">
          <i class="nav-icon far fa-arrow-alt-circle-right"></i>
          <span>Barang Masuk</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pengeluaran'); ?>">
          <i class="nav-icon far fa-arrow-alt-circle-left"></i>
          <span>Barang Keluar</span></a>
      </li>
<!-- Heading -->
<div class="sidebar-heading">
        Laporan
      </div>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('supplier'); ?>">
          <i class="fas fa-dolly"></i>
          <span>Data Sumber Barang</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('peminjam'); ?>">
          <i class="fas fa-truck"></i>
          <span>Data Peminjaman</span></a>
      </li>
     <!-- Heading -->
<div class="sidebar-heading">
        Pengaturan
      </div>
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('logout'); ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
            
     
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <br>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                <i class="fa fa-user"></i>
              </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        
        
        <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Pilih "Logout" dibawah ini jika anda yakin ingin keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>