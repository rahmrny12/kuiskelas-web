<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/sb-admin-2/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sb-admin-2/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- jquery -->
    <script src="<?= base_url('assets/sb-admin-2/') ?>vendor/jquery/jquery.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kuis Kelas</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($this->session->userdata('role') == 'pengajar') : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengajar
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pengajar') ?>">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Daftar Kuis</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pengajar/tambah_kuis') ?>">
                        <i class="fas fa-fw fa-plus"></i>
                        <span>Tambah Kuis</span></a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata('role') == 'siswa') : ?>
                <!-- Heading -->
                <div class="sidebar-heading">
                    Siswa
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('siswa') ?>">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Kuis</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('siswa/riwayat_penilaian') ?>">
                        <i class="fas fa-history"></i>
                        <span>Riwayat</span></a>
                </li>
            <?php endif; ?>

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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-4 d-none d-lg-inline text-dark font-weight-bold small text-capitalize">
                                    <?= $this->session->userdata('name') ?> |
                                    <span class="text-primary">
                                        <?= $this->session->userdata('role') ?>
                                    </span>
                                </span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/sb-admin-2/') ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->