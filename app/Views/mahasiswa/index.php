<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-6">
            <?= Flasher::flash() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-mahasiswa">
				Tambah Mahasiswa
			</button>

            <h3 class="mt-3">Daftar Mahasiswa</h3>
            
            <ul class="list-group">
            <?php foreach ($mhs as $m) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $m['nama'] ?>
                    <a href="<?= BASE_URL ?>/mahasiswa/detail/<?= $m['id'] ?>" class="badge btn text-bg-primary">detail</a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah-mahasiswa" tabindex="-1" aria-labelledby="tambah-mahasiswa" aria-hidden="true">
	<div class="modal-dialog">
  		<div class="modal-content">
  	    	<div class="modal-header">
  	      		<h5 class="modal-title" id="tambah-mahasiswa">Tambah Mahasiswa</h5>
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
