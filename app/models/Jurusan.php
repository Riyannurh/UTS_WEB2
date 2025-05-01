<?php
require_once __DIR__ . '/../../core/Database.php';

class Jurusan
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllJurusan()
    {
        $this->db->query("SELECT * FROM jurusan ORDER BY nama_jurusan ASC");
        return $this->db->resultSet();
    }

    public function getJurusanById($id)
    {
        $this->db->query("SELECT * FROM jurusan WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function addJurusan($data)
    {
        $this->db->query("INSERT INTO jurusan (nama_jurusan) VALUES (:nama_jurusan)");
        $this->db->bind(':nama_jurusan', $data['nama_jurusan']);
        return $this->db->execute();
    }

    public function updateJurusan($data)
    {
        $this->db->query("UPDATE jurusan SET nama_jurusan = :nama_jurusan WHERE id = :id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama_jurusan', $data['nama_jurusan']);
        return $this->db->execute();
    }

    public function deleteJurusan($id)
    {
        $this->db->query("DELETE FROM jurusan WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
?>
