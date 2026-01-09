<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #212529; color: white; }
        .nav-link { color: rgba(255,255,255,0.75); }
        .nav-link:hover, .nav-link.active { color: white; background-color: rgba(255,255,255,0.1); }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-0">
            <div class="position-sticky pt-3">
                <h5 class="px-3 mb-4 text-primary">Library App</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?= ($data['title'] == 'Home') ? 'active' : ''; ?>" href="<?= BASEURL; ?>/home">
                            <i class="bi bi-house-door me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($data['title'] == 'Daftar Buku') ? 'active' : ''; ?>" href="<?= BASEURL; ?>/books">
                            <i class="bi bi-book me-2"></i> Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($data['title'] == 'Daftar Anggota') ? 'active' : ''; ?>" href="<?= BASEURL; ?>/members">
                            <i class="bi bi-people me-2"></i> Anggota
                        </a>
                    </li>
                    <?php if($_SESSION['role'] == 'admin') : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASEURL; ?>/transactions">
                            <i class="bi bi-arrow-repeat me-2"></i> Transaksi
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item mt-4">
                        <a class="nav-link text-danger" href="<?= BASEURL; ?>/auth/logout">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <?php if(isset($_SESSION['flash'])) : ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?= $_SESSION['flash']; unset($_SESSION['flash']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <?php endif; ?>
