<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">
      <div id="settings-trigger"><i class="ti-settings"></i></div>
      <div id="theme-settings" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
        <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
          <div class="tiles success"></div>
          <div class="tiles warning"></div>
          <div class="tiles danger"></div>
          <div class="tiles info"></div>
          <div class="tiles dark"></div>
          <div class="tiles default"></div>
        </div>
      </div>
    </div>
    <!-- partial -->
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/homeAdmin') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#kelolaData" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Kelola Data</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="kelolaData">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/dataAdmin') }}">Data Admin</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/siswaAdmin') }}">Data Siswa</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/kelasAdmin') }}">Data Kelas</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/mataPelajaran') }}">Mata Pelajaran</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#rmib" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">RMIB</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="rmib">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/kategoriRmib') }}">Kategori RMIB</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/soalRmib') }}">Bank Soal</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin/kriteriaAdmin') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Kriteria</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin/alternatifAdmin') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Alternatif</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin/bobotRmib') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Bobot Nilai RMIB dan Rapor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#hasil" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Rekapan Hasil Siswa</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="hasil">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="#">Hasil Tes RMIB</a></li>
              <li class="nav-item"> <a class="nav-link" href="#">Lampiran Rapor</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Hasil Rekomendasi</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->