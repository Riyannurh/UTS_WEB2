<?php
require_once __DIR__ . '/../../core/Database.php';

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function getAllMahasiswa()
{
    $this->db->query("
        SELECT 
            mahasiswa.*, 
            jurusan.nama_jurusan AS jurusan_nama
        FROM mahasiswa
        JOIN jurusan 
            ON mahasiswa.jurusan_id = jurusan.id
        ORDER BY mahasiswa.nama ASC
    ");
    return $this->db->resultSet();
}

    public function getMahasiswaById($id)
    {
        $this->db->query("SELECT * FROM mahasiswa WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addMahasiswa($data)
    {
        $this->db->query("INSERT INTO mahasiswa (nama, nim, jurusan_id) VALUES (:nama, :nim, :jurusan_id)");
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':nim', $data['nim']);
        $this->db->bind(':jurusan_id', $data['jurusan_id']);
        return $this->db->execute(); 
    }

    public function updateMahasiswa($data)
    {
        $this->db->query("UPDATE mahasiswa SET nama = :nama, nim = :nim, jurusan_id = :jurusan_id WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':nim', $data['nim']);
        $this->db->bind(':jurusan_id', $data['jurusan_id']);
        return $this->db->execute();
    }

    public function deleteMahasiswa($id)
    {
        $this->db->query("DELETE FROM mahasiswa WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
?>
