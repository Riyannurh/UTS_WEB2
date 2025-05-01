<?php
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Pages</a></li>
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="index.php">Mahasiswa</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Tambah</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Tambah Mahasiswa</h6>
      </nav>
    </div>
  </nav>

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Tambah Data Mahasiswa</h6>
          </div>
          <div class="card-body">
            <!-- Display Errors -->
            <?php if (isset($errors) && !empty($errors)): ?>
              <div class="alert alert-danger">
                <ul class="mb-0">
                  <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <form action="<?= base_url('mahasiswa/create') ?>" method="POST">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                  <option value="">-- Pilih Jurusan --</option>
                  <?php foreach ($jurusans as $j): ?>
                    <option value="<?= $j->id; ?>"><?= htmlspecialchars($j->nama_jurusan); ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="d-flex justify-content-between">
                <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary btn-sm rounded-3">
                  <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary btn-sm rounded-3">
                  <i class="fa-solid fa-floppy-disk"></i> Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
