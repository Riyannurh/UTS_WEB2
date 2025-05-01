<?php
require_once __DIR__ . '/../../helpers/url.php';
$title = 'Mahasiswa';
include __DIR__ . '/../templates/head.php';
include __DIR__ . '/../templates/sidebar.php';
?>

<main class="main-content position-relative border-radius-lg flex-grow-1">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Mahasiswa</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Mahasiswa</h6>
            </nav>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <!-- Notifikasi -->
        <?php if (isset($_GET['status'])): ?>
            <div class="alert alert-<?= ($_GET['status'] == 'failed') ? 'danger' : 'success'; ?> alert-dismissible fade show" role="alert">
                <?php
                $status = $_GET['status'];
                if ($status == 'added') {
                    echo "Data mahasiswa berhasil ditambahkan!";
                } elseif ($status == 'updated') {
                    echo "Data mahasiswa berhasil diperbarui!";
                } elseif ($status == 'deleted') {
                    echo "Data mahasiswa berhasil dihapus!";
                } elseif ($status == 'failed') {
                    echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : "Terjadi kesalahan!";
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Data Mahasiswa</h6>
                        <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-sm btn-success">+ Tambah Mahasiswa</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-3">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($mahasiswas)): ?>
                                        <?php $no = 1;
                                        foreach ($mahasiswas as $mahasiswa): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= htmlspecialchars($mahasiswa->nama) ?></td>
                                                <td><?= htmlspecialchars($mahasiswa->nim) ?></td>
                                                <td><?= htmlspecialchars($mahasiswa->jurusan_nama) ?></td>
                                                <td>
                                                    <a href="<?= base_url('mahasiswa/edit/' . $mahasiswa->id) ?>" class="btn btn-warning btn-sm rounded-3"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a href="<?= base_url('mahasiswa/delete/' . $mahasiswa->id) ?>" class="btn btn-danger btn-sm rounded-3" onclick="return confirm('Yakin ingin menghapus mahasiswa ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data mahasiswa.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include __DIR__ . '/../templates/footer.php'; ?>