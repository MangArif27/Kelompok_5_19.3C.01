<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        @include('partials._profile')
        <div class="logo-element">
          SIPL
        </div>
      </li>
      <li class="active">
        <a href="index"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards </span></a>
      </li>
      <li>
        <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Data Induk </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="Admin/Data-Pengguna">Data Pengguna</a></li>
          <li><a href="Admin/Data-WBP">Data WBP</a></li>
        </ul>
      </li>
      <li>
        <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Layanan </span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
          <li><a href="Admin/Layanan-Video-Call">Layanan Video Call <span class="fa arrow label label-warning float-right">16/24</span></a></li>
          <li><a href="Admin/Layanan-Penitipan-Barang">Layanan Penitipan Barang <span class="fa arrow label label-warning float-right">16/24</span></a></li>
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
