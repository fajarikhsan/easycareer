

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fa fa-fw fa-code" aria-hidden="true"></i> -->
          <img src="<?= base_url('assets/img/logo_easycareer.png'); ?>" alt="" height="70%" width="70%">
        </div>
        <div class="sidebar-brand-text mx-3">Easy Career</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      
      <!-- Sidebar Seller -->
      <?php if ( $this->session->has_userdata('id_penyedia') ) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Admin
        </div>

        <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('seller'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Pesanan
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('seller/transaksi'); ?>">
          <i class="fas fa-fw fa-handshake"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Jasa
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('seller/daftar_jasa'); ?>">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Daftar Jasa</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('seller/jasa'); ?>">
          <i class="fas fa-fw fa-clipboard-list"></i>
          <span>Tambah Jasa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('seller/myprofile'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>My Profile</span></a>
      </li>
      <!-- End of Sidebar Seller -->
      <?php else : ?>

        <!-- Sidebar Customer -->

      <!-- Heading -->
      <div class="sidebar-heading">
        Pesanan
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile/transaksi'); ?>">
          <i class="fas fa-fw fa-handshake"></i>
          <span>Transaksi</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        User
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile/myprofile'); ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>My Profile</span></a>
      </li>
      <!-- End of Sidebar Customer -->
      <?php endif; ?>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
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
