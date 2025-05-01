<?php
$title = 'Nilai';
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<!-- Main Content -->
<main class="main-content position-relative border-radius-lg flex-grow-1" >
    <!-- Breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Nilai</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Nilai</h6>
            </nav>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid py-3 px-4">
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                <?= $_SESSION['success_message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center bg-white">
                <h6 class="mb-0 fw-semibold">Daftar Nilai Mahasiswa</h6>
                <a href="<?= base_url('nilai/create') ?>" class="btn btn-primary btn-sm rounded-pill">
                    <i class="fa fa-plus"></i> Tambah Nilai
                </a>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Mahasiswa</th>
                                <th>Mata Kuliah</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($nilais)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($nilais as $nilai): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($nilai->nama_mahasiswa); ?></td>
                                        <td><?= htmlspecialchars($nilai->nama_mk); ?></td>
                                        <td><?= htmlspecialchars($nilai->nilai); ?></td>
                                        <td>
                                            <a href="<?= base_url('nilai/edit/' . $nilai->id) ?>" class="btn btn-warning btn-sm rounded-pill me-1">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <a href="<?= base_url('nilai/delete/' . $nilai->id) ?>" class="btn btn-danger btn-sm rounded-pill"
                                                onclick="return confirm('Yakin ingin menghapus data nilai ini?')">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data nilai.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../templates/footer.php'; ?>