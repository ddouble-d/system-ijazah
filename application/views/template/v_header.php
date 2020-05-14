<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Legalisir Ijazah</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- DataTables -->
  <link href="<?=base_url()?>assets/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

  <!-- SweetAlert2 -->
  <link href="<?=base_url()?>assets/sweetalert2-8.18.5/package/dist/sweetalert2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>dashboard">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-file-signature"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Legalisir Ijasah </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php $info = $this->db->get_where('tb_user',['email'=>$this->session->userdata('email')])->row_array(); ?>
      <?php if($info['level'] == "Admin") { ?>
      <li class="nav-item " id="navDashboard">
        <a class="nav-link" href="<?=base_url()?>dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
 
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item  -->
      <li class="nav-item " id="navUserData">
        <a class="nav-link" href="<?=base_url()?>userdata">
          <i class="fas fa-fw fa-user"></i>
          <span>User Data</span></a>
      </li>
    <?php } ?>
      <li class="nav-item " id="navPengajuan">
        <a class="nav-link" href="<?=base_url()?>pengajuan">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengajuan</span></a>
      </li>
<!-- < ?php } ?> -->
      <li class="nav-item " id="navProfil">
        <a class="nav-link" href="<?=base_url()?>profil">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Profil</span></a>
      </li>
 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
 
      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url()?>profil/logout">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo! <?=$info['nama']?></span>
                <img class="img-profile rounded-circle" src="<?=base_url()?>assets/startbootstrap-sb-admin-2-gh-pages/img/default-avatar.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?=base_url()?>profil">
                  <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=base_url()?>profil/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
