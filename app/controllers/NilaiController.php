<?php
session_start();
require_once __DIR__ . '/../helpers/url.php';
require_once __DIR__ . '/../models/Nilai.php';
require_once __DIR__ . '/../models/Mahasiswa.php';
require_once __DIR__ . '/../models/MataKuliah.php';

class NilaiController
{
    private $nilai;
    private $mahasiswa;
    private $mataKuliah;

    public function __construct()
    {
        $this->nilai = new Nilai();
        $this->mahasiswa = new Mahasiswa();
        $this->mataKuliah = new MataKuliah();
    }

    public function index()
    {
        $nilaiList = $this->nilai->getNilaiAll();
        $this->view('nilai/index', ['nilais' => $nilaiList]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'mata_kuliah_id' => $_POST['mata_kuliah_id'],
                'nilai' => $_POST['nilai']
            ];
            $this->nilai->addNilai($data);
            $_SESSION['success_message'] = 'Nilai berhasil ditambahkan!';
            header('Location:' . base_url('/nilai'));
            exit;
        } else {
            $mahasiswas = $this->mahasiswa->getAllMahasiswa();
            $mataKuliahs = $this->mataKuliah->getAllMataKuliah();
            $this->view('nilai/create', [
                'mahasiswas' => $mahasiswas,
                'mataKuliahs' => $mataKuliahs
            ]);
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'mahasiswa_id' => $_POST['mahasiswa_id'],
                'mata_kuliah_id' => $_POST['mata_kuliah_id'],
                'nilai' => $_POST['nilai']
            ];
            $this->nilai->updateNilai($data);
            $_SESSION['success_message'] = 'Mata Kuliah berhasil diupdate!';
            header('Location:' . base_url('/nilai'));
            exit;
        } else {
            $nilai = $this->nilai->getNilaiById($id);
            $mahasiswas = $this->mahasiswa->getAllMahasiswa();
            $mataKuliahs = $this->mataKuliah->getAllMataKuliah();
            $this->view('nilai/edit', [
                'nilai' => $nilai,
                'mahasiswas' => $mahasiswas,
                'mataKuliahs' => $mataKuliahs
            ]);
        }
    }

    public function delete($id)
    {
        $this->nilai->deleteNilai($id);
        $_SESSION['success_message'] = 'Mata Kuliah berhasil dihapus!';
            header('Location:' . base_url('/nilai'));
        exit;
    }

    private function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
?>
