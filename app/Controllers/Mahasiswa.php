<?php

class Mahasiswa extends Controller
{
    public function index(): void
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getAllMhs();

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }   

    public function detail(string $id): void
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->getMahasiswaById($id);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(): void
    {
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
        }

        header('Location: ' . BASE_URL . '/mahasiswa');
        exit;
    }

    public function hapus(string $id): void
    {
        if ($this->model('MahasiswaModel')->hapusMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
        }

        header('Location: ' . BASE_URL . '/mahasiswa');
        exit;
    }

    public function getOne(string $id): void
    {
        $mahasiswa = $this->model('MahasiswaModel')->getMahasiswaById($id);
        echo json_encode(['mahasiswa' => $mahasiswa]);
    }

    public function ubah(): void
    {
        if ($this->model('MahasiswaModel')->ubahMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }

        header('Location: ' . BASE_URL . '/mahasiswa');
        exit;
    }

    public function cari(): void
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('MahasiswaModel')->cariMahasiswa($_POST);

        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');       
    }
}
