<?php
require_once __DIR__ . '/../helpers/url.php';
require_once __DIR__ . '/../models/Jurusan.php';
session_start();

class JurusanController
{
    private $jurusan;

    public function __construct()
    {
        $this->jurusan = new Jurusan();
    }

    public function index()
    {
        $jurusanList = $this->jurusan->getAllJurusan();
        $this->view('jurusan/index', ['jurusans' => $jurusanList]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama_jurusan' => $_POST['nama_jurusan']
            ];
            $this->jurusan->addJurusan($data);

            $_SESSION['success_message'] = 'Jurusan berhasil ditambahkan!';
            header('Location:' . base_url('/jurusan'));
            exit;
        } else {
            $this->view('jurusan/create');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'nama_jurusan' => $_POST['nama_jurusan']
            ];
            $this->jurusan->updateJurusan($data);
            $_SESSION['success_message'] = 'Jurusan berhasil diupdate!';
            header('Location:' . base_url('/jurusan'));
            exit;
        } else {
            $jurusan = $this->jurusan->getJurusanById($id);
            $this->view('jurusan/edit', ['jurusan' => $jurusan]);
        }
    }

    public function delete($id)
    {
        $this->jurusan->deleteJurusan($id);
        $_SESSION['success_message'] = 'Jurusan berhasil dihapus!';
            header('Location:' . base_url('/jurusan'));
        exit;
    }

    private function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
?>
