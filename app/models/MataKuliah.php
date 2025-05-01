<?php
require_once __DIR__ . '/../../core/Database.php';

class MataKuliah
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function getAllMataKuliah()
    {
        $this->db->query("SELECT * FROM mata_kuliah ORDER BY nama_mk ASC");
        return $this->db->resultSet();
    }

    public function getMataKuliahById($id)
    {
        $this->db->query("SELECT * FROM mata_kuliah WHERE id = :id");
        $this->db->bind(':id', $id);
        // var_dump($this->db->single());
        return $this->db->single();
    }

    public function addMataKuliah($data)
    {
        $this->db->query("INSERT INTO mata_kuliah (nama_mk, sks) VALUES (:nama_mk, :sks)");
        $this->db->bind(':nama_mk', $data['nama_mk']);
        $this->db->bind(':sks', $data['sks']);
        return $this->db->execute(); 
    }

    public function updateMataKuliah($data)
    {
        $this->db->query("UPDATE mata_kuliah SET nama_mk = :nama_mk, sks = :sks WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama_mk', $data['nama_mk']);
        $this->db->bind(':sks', $data['sks']);
        return $this->db->execute();
    }

    public function deleteMataKuliah($id)
    {
        $this->db->query("DELETE FROM mata_kuliah WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
?>
