<!-- app/views/templates/sidebar.php -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start" id="sidenav-main">
  <div class="sidenav-header">
    <a class="navbar-brand m-0" href="<?= base_url() ?>">
      <img src="<?= base_url('assets/img/logo-ct-dark.png') ?>" class="navbar-brand-img" alt="main_logo" width="26" height="26">
      <span class="ms-2 font-weight-bold">Riyan Nur Hidayat</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?= $title == 'Mahasiswa' ? 'active' : '' ?>" href="<?= base_url('mahasiswa/index.php') ?>">
          <i class="ni ni-hat-3 text-primary"></i>
          <span class="nav-link-text ms-2">Mahasiswa</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $title == 'Nilai' ? 'active' : '' ?>" href="<?= base_url('nilai/index.php') ?>">
          <i class="ni ni-chart-bar-32 text-success"></i>
          <span class="nav-link-text ms-2">Nilai</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $title == 'Jurusan' ? 'active' : '' ?>" href="<?= base_url('jurusan/index.php') ?>">
          <i class="ni ni-books text-warning"></i>
          <span class="nav-link-text ms-2">Jurusan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $title == 'Mata Kuliah' ? 'active' : '' ?>" href="<?= base_url('matakuliah/index.php') ?>">
          <i class="ni ni-book-bookmark text-danger"></i>
          <span class="nav-link-text ms-2">Mata Kuliah</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
