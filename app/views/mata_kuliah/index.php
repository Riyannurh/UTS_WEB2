<?php
$title = 'Mata Kuliah';
require_once __DIR__ . '/../../helpers/url.php';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mata Kuliah</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Mata Kuliah</h6>
            </nav>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Success Message Toast -->
        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="toast-container position-fixed top-0 end-0 p-3" style="margin-top: 50px; z-index: 1050;">
                <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?= $_SESSION['success_message']; ?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <!-- Card for Table -->
        <div class="card">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Data Mata Kuliah</h6>
                <a href="<?= base_url('mata_kuliah/create') ?>" class="btn btn-success btn-sm rounded-3"><i class="fa fa-plus"></i> Tambah Mata Kuliah</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Mata Kuliah</th>
                                <th scope="col">SKS</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($mata_kuliahs)): ?>
                                <?php $no = 1; ?>
                                <?php foreach ($mata_kuliahs as $mata): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($mata->nama_mk); ?></td>
                                        <td><?= htmlspecialchars($mata->sks); ?></td>
                                        <td>
                                            <a href="<?= base_url('mata_kuliah/edit/' . $mata->id) ?>" class="btn btn-warning btn-sm rounded-3"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="<?= base_url('mata_kuliah/delete/' . $mata->id) ?>" class="btn btn-danger btn-sm rounded-3"
                                                onclick="return confirm('Yakin ingin menghapus mata kuliah ini? Semua data terkait, seperti nilai, juga akan ikut terhapus.')"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada mata kuliah tersedia.</td>
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