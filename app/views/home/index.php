<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Buku</h5>
                <p class="card-text fs-2">0</p>
                <a href="<?= BASEURL; ?>/books" class="text-white">Lihat Detail <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Total Anggota</h5>
                <p class="card-text fs-2">0</p>
                <a href="<?= BASEURL; ?>/members" class="text-white">Lihat Detail <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card bg-warning text-dark">
            <div class="card-body">
                <h5 class="card-title">Peminjaman Aktif</h5>
                <p class="card-text fs-2">0</p>
                <a href="<?= BASEURL; ?>/transactions" class="text-dark">Lihat Detail <i class="bi bi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
