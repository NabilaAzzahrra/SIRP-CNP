<style>
    .navbar-light {
        /*background: linear-gradient(to right, #005F9D, #00B9C2);   */
        background-color: #005F9D;
    }

    .fas {
        color: #ffffff;
    }

    .far {
        color: #ffffff;
    }

    .logout {
        color: #ffffff;
    }

    .mr-2 {
        color: #000000;
    }

    .menu {
        background-color: #005F9D;

    }
</style>

<body class="hold-transition sidebar-mini text-sm  sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a id="logout" class="nav-link logout" href="#"><span class="logout"><i class="fa fa-power-off" aria-hidden="true"></i></span></a>
                </li>
            </ul>
        </nav>
        <div id="ModalLogout" class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Logout</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk logout? Anda akan dialihkan ke halaman login jika sudah yakin.</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a class="btn btn-block bg-gradient-success" href="<?= base_url('Auth/logout') ?>">OK</a>
                        <button type="button" class="btn btn-block bg-gradient-danger" data-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-menu elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Master/tentang') ?>" class="brand-link">
                <img src="<?= base_url('assets/template') ?>/dist///img/SiRP_App.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b>SiRP APP</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/template') ?>/dist///img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('Master/profile') ?>" class="d-block"><?= $this->session->userdata('nama') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item menu-<?= $this->session->userdata('dashboard') ?>">
                            <a href="<?= base_url('Master/index') ?>" class="nav-link<?= $this->session->userdata('dashboard_status') ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item menu-<?= $this->session->userdata('master') ?>">
                            <a href="" class="nav-link<?= $this->session->userdata('master_status') ?>">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/user') ?>" class="nav-link  <?= $this->session->userdata('usrr'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('usrr_dot'); ?>circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/master_prodi') ?>" class="nav-link  <?= $this->session->userdata('prodi'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('prodi_dot'); ?>circle nav-icon"></i>
                                        <p>Prodi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/kelas') ?>" class="nav-link  <?= $this->session->userdata('kelas'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('kelas_dot'); ?>circle nav-icon"></i>
                                        <p>Kelas</p>
                                    </a>
                                </li>
                            </ul>

                        </li>



                        <li class="nav-item menu-<?= $this->session->userdata('rekap') ?>">
                            <a href="" class="nav-link<?= $this->session->userdata('rekap_status') ?>">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Rekap
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/pilih_permintaan') ?>" class="nav-link  <?= $this->session->userdata('pilih_permintaan'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('pilih_permintaan_dot'); ?>circle nav-icon"></i>
                                        <p>Permintaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/pilih_followup') ?>" class="nav-link  <?= $this->session->userdata('pilih_followup'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('pilih_followup_dot'); ?>circle nav-icon"></i>
                                        <p>Follow Up</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/mou') ?>" class="nav-link  <?= $this->session->userdata('mou'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('mou_dot'); ?>circle nav-icon"></i>
                                        <p>Jumlah MOU</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/pilih_rekapitulasi') ?>" class="nav-link  <?= $this->session->userdata('pilih_rekapitulasi'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('pilih_rekapitulasi_dot'); ?>circle nav-icon"></i>
                                        <p>Rekapitulasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/pilih_grafik') ?>" class="nav-link  <?= $this->session->userdata('pilih_grafik'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('pilih_grafik_dot'); ?>circle nav-icon"></i>
                                        <p>Grafik Permintaan Perusahaan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Master/pilih_serapan') ?>" class="nav-link  <?= $this->session->userdata('pilih_serapan'); ?>">
                                        <i class="far fa-<?= $this->session->userdata('pilih_serapan_dot'); ?>circle nav-icon"></i>
                                        <p>Serapan</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('Master/index') ?>">dashboard</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">