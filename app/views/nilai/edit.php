<?php
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
  <div class="container-fluid py-4">
    <div class="card">
      <div class="card-header pb-0">
        <h6>Edit Nilai</h6>
      </div>
      <div class="card-body">
        <form action="<?= base_url('nilai/edit/' . $nilai->id) ?>" method="POST">
          <input type="hidden" name="id" value="<?= $nilai->id ?>">

          <div class="mb-3">
            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
            <select name="mahasiswa_id" id="mahasiswa_id" class="form-select" required>
              <?php foreach ($mahasiswas as $mhs): ?>
                <option value="<?= $mhs->id ?>" <?= $mhs->id == $nilai->mahasiswa_id ? 'selected' : '' ?>>
                  <?= htmlspecialchars($mhs->nama) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-select" required>
              <?php foreach ($mataKuliahs as $mk): ?>
                <option value="<?= $mk->id ?>" <?= $mk->id == $nilai->mata_kuliah_id ? 'selected' : '' ?>>
                  <?= htmlspecialchars($mk->nama_mk) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="number" class="form-control" id="nilai" name="nilai" min="0" max="100" required value="<?= htmlspecialchars($nilai->nilai) ?>">
          </div>

          <button type="submit" class="btn btn-primary btn-sm rounded-3">
            <i class="fa fa-save"></i> Simpan Perubahan
          </button>
          <a href="<?= base_url('nilai') ?>" class="btn btn-secondary btn-sm rounded-3">
            <i class="fa fa-arrow-left"></i> Kembali
          </a>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>
