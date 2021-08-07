<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?php echo base_url(); ?>" class="nav-link" id="sidebar_home">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Home</p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link" id="sidebar_ptsp">
        <i class="nav-icon fas fa-book"></i>
        <p>PTSP<i class="fas fa-angle-left right"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <?php if($this->session->userdata('layanan_id') == 1 || $this->session->userdata('layanan_id') == 2) : ?>
        <li class="nav-item">
          <a href="<?php echo base_url('informasi') ?>" class="nav-link" id="sidebar_ptsp_pengaduan">
            <i class="nav-icon far fa-circle"></i>
            <p>Pengaduan & Informasi</p>
          </a>
        </li>
        <?php endif; ?>
        <?php if($this->session->userdata('layanan_id') == 1 || $this->session->userdata('layanan_id') == 3) : ?>
        <li class="nav-item">
          <a href="<?php echo base_url('produk/ac') ?>" class="nav-link" id="sidebar_ptsp_ac">
            <i class="nav-icon far fa-circle"></i>
            <p>Akta Cerai</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('produk/putusan') ?>" class="nav-link" id="sidebar_ptsp_putusan">
            <i class="nav-icon far fa-circle"></i>
            <p>Salinan Putusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('produk/penetapan') ?>" class="nav-link" id="sidebar_ptsp_penetapan">
            <i class="nav-icon far fa-circle"></i>
            <p>Salinan Penetapan</p>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </li>
    <?php if($this->session->userdata('layanan_id') == 1) : ?>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link" id="sidebar_laporan">
        <i class="nav-icon fas fa-file"></i>
        <p>Laporan<i class="fas fa-angle-left right"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo base_url('laporan/informasi'); ?>" class="nav-link" id="sidebar_laporan_pengaduan">
            <i class="nav-icon far fa-circle"></i>
            <p>Pengaduan & Informasi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('laporan/ac'); ?>" class="nav-link" id="sidebar_laporan_ac">
            <i class="nav-icon far fa-circle"></i>
            <p>Akta Cerai</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('laporan/putusan'); ?>" class="nav-link" id="sidebar_laporan_putusan">
            <i class="nav-icon far fa-circle"></i>
            <p>Salinan Putusan</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('laporan/penetapan'); ?>" class="nav-link" id="sidebar_laporan_penetapan">
            <i class="nav-icon far fa-circle"></i>
            <p>Salinan Penetapan</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link" id="sidebar_setting">
        <i class="nav-icon fas fa-cog"></i>
        <p>Pengaturan<i class="fas fa-angle-left right"></i></p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo base_url('setting/user'); ?>" class="nav-link" id="sidebar_setting_user">
            <i class="nav-icon far fa-user"></i>
            <p>Pengguna</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('setting/sistem'); ?>" class="nav-link" id="sidebar_setting_sistem">
            <i class="nav-icon fas fa-rocket"></i>
            <p>Sistem</p>
          </a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    <li class="nav-item">
      <a href="<?php echo base_url('about'); ?>" class="nav-link" id="sidebar_about">
        <i class="nav-icon fas fa-info-circle"></i>
        <p>About</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link" onclick="modal_logout();">
        <i class="nav-icon fas fa-power-off"></i>
        <p>Keluar</p>
      </a>
    </li>
</nav>