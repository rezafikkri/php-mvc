<?php

class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMhs(): array
    {
        $this->db->query('SELECT id, nama FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById(string $id)
    {
        $this->db->query('SELECT * from ' . $this->table . ' WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
}
