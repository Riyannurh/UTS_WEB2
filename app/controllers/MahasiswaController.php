<?php
session_start();
require_once __DIR__ . '/../helpers/url.php';
require_once __DIR__ . '/../models/Mahasiswa.php';
require_once __DIR__ . '/../models/Jurusan.php';

class MahasiswaController
{
    private $mahasiswa;
    private $jurusan;

    public function __construct()
    {
        $this->mahasiswa = new Mahasiswa();
        $this->jurusan = new Jurusan();
    }

    public function index()
    {
        $mahasiswaList = $this->mahasiswa->getAllMahasiswa();
        $this->view('mahasiswa/index', ['mahasiswas' => $mahasiswaList]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'jurusan_id' => $_POST['jurusan_id']
            ];
            $this->mahasiswa->addMahasiswa($data);
            $_SESSION['success_message'] = 'Mahasiswa berhasil ditambahkan!';
            header('Location:' . base_url('/mahasiswa'));
            exit;
        } else {
            $jurusans = $this->jurusan->getAllJurusan();
            $this->view('mahasiswa/create', ['jurusans' => $jurusans]);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'jurusan_id' => $_POST['jurusan_id']
            ];
            $this->mahasiswa->updateMahasiswa($data);
            $_SESSION['success_message'] = 'Mahasiswa berhasil diupdate!';
            header('Location:' . base_url('/mahasiswa'));
            exit;
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswaById($id);
            $jurusan = $this->jurusan->getAllJurusan();
            $this->view('mahasiswa/edit', ['mahasiswa' => $mahasiswa, 'jurusans' => $jurusan]);
        }
    }

    public function delete($id)
    {
        $this->mahasiswa->deleteMahasiswa($id);
        $_SESSION['success_message'] = 'Mahasiswa berhasil dihapus!';
        header('Location:' . base_url('/mahasiswa'));
        exit;
    }

    private function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
