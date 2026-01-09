<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Anggota</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#memberModal">
        <i class="bi bi-person-plus"></i> Tambah Anggota
    </button>
</div>

<!-- Search -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="<?= BASEURL; ?>/members" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari anggota..." name="keyword" autocomplete="off" value="<?= $data['keyword']; ?>">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="<?= BASEURL; ?>/members" class="btn btn-outline-danger">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['members'] as $m) : ?>
                <tr>
                    <td><?= $m['member_code']; ?></td>
                    <td><?= $m['name']; ?></td>
                    <td><?= $m['address']; ?></td>
                    <td><?= $m['phone']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/members/delete/<?= $m['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<nav class="mt-4">
    <ul class="pagination">
        <?php for($i = 1; $i <= $data['total_pages']; $i++) : ?>
            <li class="page-item <?= ($i == $data['current_page']) ? 'active' : ''; ?>">
                <a class="page-link" href="<?= BASEURL; ?>/members/index/<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= BASEURL; ?>/members/add" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Anggota</label>
                        <input type="text" class="form-control" name="member_code" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="address"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
