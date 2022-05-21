<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getAllMhs();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }   

    public function detail(string $id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }

        header('Location: ' . BASE_URL . '/mahasiswa');
        exit;
    }
}
