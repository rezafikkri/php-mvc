<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            
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
