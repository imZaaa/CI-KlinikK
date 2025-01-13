<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengobatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: yellow !important;
        }

        footer {
            background-color: #00705a;
            color: white;
            padding: 10px 0;
            text-align: center;
            margin-top: 20px;
        }

        .table-hover tbody tr:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00705a;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
                <img src="<?= base_url('assets/logo.png') ?>" alt="Logo" width="40" height="40"> Pengobatan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('dokter/admin') ?>">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('gallery/admin') ?>">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Data Pengobatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('login/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pengobatan</h2>
        <a href="<?= site_url('pengobatan/create') ?>" class="btn btn-primary mb-3">Tambah Pengobatan</a>
        <table id="uploadTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pasien</th>
                    <th>Penyakit</th>
                    <th>Obat</th>
                    <th>Tanggal Pengobatan</th>
                    <th>Biaya</th>
                    <th>Status Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pengobatan as $p): ?>
                <tr>
                    <td><?= $p['id_pengobatan'] ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['nama_penyakit'] ?></td>
                    <td><?= $p['nama_obat'] ?></td>
                    <td><?= $p['tgl_pengobatan'] ?></td>
                    <td><?= $p['biaya_pengobatan'] ?></td>
                    <td class="<?= $p['status_bayar'] === 'Sudah Dibayar' ? 'text-success' : 'text-danger' ?>">
                        <?= $p['status_bayar'] ?>
                    </td>
                    <td>
                        <a href="<?= site_url('pengobatan/edit/' . $p['id_pengobatan']) ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= site_url('pengobatan/delete/' . $p['id_pengobatan']) ?>" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?= date('Y') ?> Pengobatan - All Rights Reserved.
    </footer>

    <!-- Scripts -->
    <script>
        $(document).ready(function () {
            $('#uploadTable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
