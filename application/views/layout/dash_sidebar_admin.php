<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion menu" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CEKULIT.COM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Edit Profile-->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/user'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Manajemen Pengguna</span>
                </a>

            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Edit Profile-->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('penyakit'); ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Penyakit Kulit</span>
                </a>

            </li>
            <!-- Nav Item - Edit Profile-->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('gejala'); ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Gejala Penyakit Kulit</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pertanyaan'); ?>">
                    <i class="fas fa-table"></i>
                    <span>Pemetaan Pertanyaan</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('identifikasi'); ?>">
                    <i class="fas fa-table"></i>
                    <span>Identifikasi Penyakit</span>
                </a>

            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('identifikasi/history_identifikasi'); ?>">
                    <i class="fas fa-history"></i>
                    <span>Riwayat Identifikasi</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->