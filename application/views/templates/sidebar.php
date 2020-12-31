 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin');?>" class="brand-link">
      <img src="<?= base_url('assets/');?>dist/img/perpuskuLogo.png"
           alt="perpusku"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Perpusku</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">LAPORAN</li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('admin')?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>            
          </li>

          <li class="nav-header ">KELOLA</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">            
              <i class="nav-icon fas fa-dolly"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('transaksi/peminjaman')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Peminjaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('transaksi/pengembalian')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Pengembalian</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">            
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('buku/daftarBuku')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Tambah Buku</p>
                </a>
              </li>                        
              <li class="nav-item">
                <a href="<?= base_url('buku/categori')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                  <p>Categori</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Mahasiswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/')?>" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li>              
            </ul>
          </li>
        <br>
        <br>
          <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('auth/logout')?>" class="nav-link active">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            
          </li>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>