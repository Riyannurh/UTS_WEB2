<?php
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0">
        <h6>Tambah Jurusan</h6>
      </div>
      <div class="card-body">
        <form action="<?= base_url('jurusan/create') ?>" method="POST">
          <div class="mb-3">
            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" name="nama_jurusan" id="nama_jurusan" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary btn-sm rounded-3">
            <i class="fa-solid fa-floppy-disk"></i> Simpan
          </button>
          <a href="<?= base_url('jurusan') ?>" class="btn btn-secondary btn-sm rounded-3">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
