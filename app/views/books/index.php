<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manajemen Buku</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
        <i class="bi bi-plus-lg"></i> Tambah Buku
    </button>
</div>

<!-- Search -->
<div class="row mb-3">
    <div class="col-md-6">
        <form action="<?= BASEURL; ?>/books" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari buku..." name="keyword" autocomplete="off" value="<?= $data['keyword']; ?>">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="<?= BASEURL; ?>/books" class="btn btn-outline-danger">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['books'] as $book) : ?>
                <tr>
                    <td><?= $book['isbn']; ?></td>
                    <td><?= $book['title']; ?></td>
                    <td><?= $book['author']; ?></td>
                    <td><?= $book['publisher']; ?></td>
                    <td><?= $book['year']; ?></td>
                    <td><?= $book['quantity']; ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/books/delete/<?= $book['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')"><i class="bi bi-trash"></i></a>
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
                <a class="page-link" href="<?= BASEURL; ?>/books/index/<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Data Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="<?= BASEURL; ?>/books/add" method="post">
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" class="form-control" name="isbn" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pengarang</label>
                    <input type="text" class="form-control" name="author">
                </div>
                <div class="mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="publisher">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="year">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="quantity" value="0">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
