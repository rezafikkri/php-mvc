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

    public function tambahMahasiswa(array $data): int
    {
        $nama = filter_var($data['nama'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $jurusan = filter_var($data['jurusan'], FILTER_SANITIZE_STRING);

        $query = "INSERT INTO mahasiswa(nama, email, jurusan) VALUES(:nama, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':email', $email);
        $this->db->bind(':jurusan', $jurusan);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusMahasiswa(string $id)
    {
        $query = "DELETE FROM mahasiswa WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahMahasiswa(array $data): int
    {
        $nama = filter_var($data['nama'], FILTER_SANITIZE_STRING);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
        $jurusan = filter_var($data['jurusan'], FILTER_SANITIZE_STRING);
        $id = filter_var($data['id'], FILTER_SANITIZE_STRING);

        $query = "UPDATE mahasiswa SET nama=:nama, email=:email, jurusan=:jurusan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':email', $email);
        $this->db->bind(':jurusan', $jurusan);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariMahasiswa(array $data): array
    {
        $keyword = filter_var($data['keyword'], FILTER_SANITIZE_STRING);

        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
