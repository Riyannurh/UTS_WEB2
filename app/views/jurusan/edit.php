<?php
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0">
        <h6>Edit Jurusan</h6>
      </div>
      <div class="card-body">
        <form action="<?= base_url('jurusan/edit/' . $jurusan->id) ?>" method="POST">
          <input type="hidden" name="id" value="<?= $jurusan->id ?>">

          <div class="mb-3">
            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required value="<?= htmlspecialchars($jurusan->nama_jurusan) ?>">
          </div>

          <button type="submit" class="btn btn-primary btn-sm rounded-3">
            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
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
