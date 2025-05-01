<?php
require_once __DIR__ . '/../../core/Database.php';

class Nilai
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function getNilaiAll()
    {
        $this->db->query("
            SELECT 
                nilai.*, 
                mahasiswa.nama AS nama_mahasiswa, 
                mata_kuliah.nama_mk AS nama_mk
            FROM nilai
            JOIN mahasiswa ON nilai.mahasiswa_id = mahasiswa.id
            JOIN mata_kuliah ON nilai.mata_kuliah_id = mata_kuliah.id
            ORDER BY mahasiswa.nama ASC
        ");
        return $this->db->resultSet();
    }

    public function getNilaiById($id)
    {
        $this->db->query("SELECT * FROM nilai WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addNilai($data)
    {
        $this->db->query("INSERT INTO nilai (mahasiswa_id, mata_kuliah_id, nilai) VALUES (:mahasiswa_id, :mata_kuliah_id, :nilai)");
        $this->db->bind(':mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind(':mata_kuliah_id', $data['mata_kuliah_id']);
        $this->db->bind(':nilai', $data['nilai']);
        return $this->db->execute(); 
    }

    public function updateNilai($data)
    {
        $this->db->query("UPDATE nilai SET mahasiswa_id = :mahasiswa_id, mata_kuliah_id = :mata_kuliah_id, nilai = :nilai WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind(':mata_kuliah_id', $data['mata_kuliah_id']);
        $this->db->bind(':nilai', $data['nilai']);
        return $this->db->execute();
    }

    public function deleteNilai($id)
    {
        $this->db->query("DELETE FROM nilai WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
?>
