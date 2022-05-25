<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASE_URL ?>/mahasiswa/cari" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Keyword" name="keyword" id="keyword">
                    <button class="btn btn-primary" type="submit" id="tombol-cari">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-mahasiswa" id="tambah-mahasiswa">
				Tambah Mahasiswa
			</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3 class="mt-3">Daftar Mahasiswa</h3>
            
            <ul class="list-group" id="list-mahasiswa">
            <?php foreach ($mhs as $m) : ?>
                <li class="list-group-item">
                    <?= $m['nama'] ?>
                    <a href="<?= BASE_URL ?>/mahasiswa/hapus/<?= $m['id'] ?>" class="badge btn text-bg-danger float-end" onclick="return confirm('Yakin?')">hapus</a>
                    <a href="#modal-mahasiswa" class="badge btn text-bg-success float-end me-1" data-bs-toggle="modal" id="ubah" data-id="<?= $m['id'] ?>">ubah</a>
                    <a href="<?= BASE_URL ?>/mahasiswa/detail/<?= $m['id'] ?>" class="badge btn text-bg-primary float-end me-1">detail</a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-mahasiswa" tabindex="-1" aria-labelledby="modal-mahasiswa-label" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
  	    	<div class="modal-header">
  	      		<h5 class="modal-title" id="modal-mahasiswa-label">Tambah Mahasiswa</h5>
  	      		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	    	</div>
  	    	<div class="modal-body">
                <form action="<?= BASE_URL ?>/mahasiswa/tambah" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="jurusan" id="jurusan" name="jurusan">
                            <option value="Komunikasi Penyiaran Islam">Komunikasi Penyiaran Islam</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Keperawatan">Keperawatan</option>
                        </select>
                    </div>
  	    	</div>
  	    	<div class="modal-footer">
  	      		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  	      		<button type="submit" class="btn btn-primary">Simpan</button>
                </form>
  	    	</div>
  		</div>
	</div>
</div>
