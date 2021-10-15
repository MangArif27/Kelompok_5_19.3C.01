<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        @include('partials._profile')
        <div class="logo-element">
          SIPL
        </div>
      </li>
      <li>
        <a href="Dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards </span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Data Induk </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="Data-Pengguna">Data Pengguna</a></li>
          <li><a href="Data-WBP">Data WBP</a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Layanan </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="Histori-Pendaftaran">History Pendaftar </a></li>
          <li><a href="Counter-Cetak-Tiket">Counter Cetak Tiket </a></li>
        </ul>
      </li>
      <li>
        <a href="Page/Profile"><i class="fa fa-id-card-o"></i> <span class="nav-label">Profile </span>  </a>
      </li>
      <li>
        <a href="Page/Tentang-Aplikasi"><i class="fa fa-gears"></i> <span class="nav-label">Tentang Aplikasi</span></a>
      </li>
    </ul>
  </div>
</nav>
