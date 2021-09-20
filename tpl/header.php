<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $titleAplikasi = (empty($_GET['page'])) ? 'Beranda': $_GET['page']; ?>
  <title>Aplikasi Ticketing | <?= ucwords($titleAplikasi) ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">

  <!-- Datatable -->
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css" rel="stylesheet">
  <!-- Chart JS -->
  <script src="assets/js/Chart.min.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">

  <!-- Main Sidebar Container -->
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
<!--       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Ticketing</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?= ucwords($_SESSION['login']['nama_lengkap']) ?></a>
          <a href="#" class="d-block">(<?= ucwords($_SESSION['login']['departemen']) ?>)</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <?php 
              if(empty($_GET['page']) || $_GET['page'] == 'beranda'){
                $activeBeranda = 'active';
              }else{
                $activeBeranda = '';
              }
            ?>
            <a href="?page=beranda" class="nav-link <?= $activeBeranda; ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Beranda
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <?php if($_SESSION['login']['level'] == 1){ ?>
            <li class="nav-item">
              <?php 
                if($_GET['page'] == 'user'){
                  $activeUser = 'active';
                }else{
                  $activeUser = '';
                }
              ?>
              <a href="?page=user" class="nav-link <?= $activeUser; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  User
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          <?php } ?>
          <?php if($_SESSION['login']['level'] == 1){ ?>
            <li class="nav-item">
              <?php 
                if($_GET['page'] == 'ticket'){
                  $activeTicket = 'active';
                }else{
                  $activeTicket = '';
                }
              ?>
              <a href="?page=ticket" class="nav-link <?= $activeTicket; ?>">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Ticket
                  <?php 
                    $s = "SELECT * FROM `tb_ticket` WHERE `status_ticket` NOT IN (3,4)";
                    $q = $config->prepare($s);
                    $q->execute();
                    $j = $q->rowCount();
                    if($j > 0){
                  ?>
                    <span class="right badge badge-danger"><?= $j ?></span>
                <?php } ?>
                </p>
              </a>
            </li>
          <?php } ?>
          <?php if($_SESSION['login']['level'] == 2 || $_SESSION['login']['level'] == 3){ ?>
            <li class="nav-item">
              <?php 
                if($_GET['page'] == 'tiket'){
                  $activeTiket = 'active';
                }else{
                  $activeTiket = '';
                }
              ?>
              <a href="?page=tiket" class="nav-link <?= $activeTiket; ?>">
                <i class="nav-icon fas fa-ticket-alt"></i>
                <p>
                  Ticket
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          <?php } ?>
          <!-- li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>