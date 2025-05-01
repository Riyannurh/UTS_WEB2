<?php
session_start();
require_once __DIR__ . '/../models/MataKuliah.php';
require_once __DIR__ . '/../helpers/url.php';

class MataKuliahController
{
    private $mk;

    public function __construct()
    {
        $this->mk = new MataKuliah();
    }

    public function index()
    {
        $mataKuliahList = $this->mk->getAllMataKuliah();
        $this->view('mata_kuliah/index', ['mata_kuliahs' => $mataKuliahList]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama_mk' => $_POST['nama_mk'],
                'sks' => $_POST['sks']
            ];
            $this->mk->addMataKuliah($data);
            $_SESSION['success_message'] = 'Mata Kuliah berhasil ditambahkan!';
            header('Location:' . base_url('/mata-kuliah'));
            exit;
        } else {
            $this->view('mata_kuliah/create');
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $id,
                'nama_mk' => $_POST['nama_mk'],
                'sks' => $_POST['sks']
            ];
            $this->mk->updateMataKuliah($data);
            $_SESSION['success_message'] = 'Mata Kuliah berhasil diupdate!';
            header('Location:' . base_url('/mata-kuliah'));
            exit;
        } else {
            $mataKuliah = $this->mk->getMataKuliahById($id);
            $this->view('mata_kuliah/edit', ['mataKuliah' => $mataKuliah]);
        }
    }

    public function delete($id)
    {
        $this->mk->deleteMataKuliah($id);
        $_SESSION['success_message'] = 'Mata Kuliah berhasil dihapus!';
            header('Location:' . base_url('/mata-kuliah'));
        exit;
    }

    private function view($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
    }
}
?>
