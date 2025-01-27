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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    .nav-link {
        font-family: 'Montserrat', sans-serif;
        font-size: 1rem;
        color: white !important;
        text-decoration: none;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: yellow !important;
        text-decoration: none;
    }

    .nav-link.active {
        font-weight: bold;
        color: #ffd700 !important;
        background-color: transparent !important;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .content-container {
        margin-left: 280px;
        padding: 20px;
    }

    #uploadTable {
        border-radius: 10px;
        overflow: hidden;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #uploadTable th {
        background-color: #00705a;
        color: white;
        text-align: center;
        font-weight: 700;
    }

    #uploadTable tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    #uploadTable tbody tr:nth-child(even) {
        background-color: #eafaf4;
    }

    #uploadTable tbody tr:hover {
        background-color: #d4f7e6;
        transition: background-color 0.3s;
    }

    .action-buttons .btn {
        margin-right: 5px;
    }

    .icon-indicator {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .icon-indicator i {
        color: #ff6347;
    }

    /* Membuat kontainer tabel bisa di-scroll horizontal */
    .table-container {
    overflow-x: auto; /* Mengaktifkan scroll horizontal jika tabel terlalu lebar */
    -webkit-overflow-scrolling: touch; /* Scroll halus pada perangkat sentuh */
    position: relative;
    max-width: 100%; /* Membatasi lebar tabel agar tidak melewati batas kontainer */
}

.table-container table {
    width: 100%; /* Memastikan tabel memenuhi lebar kontainer */
    border-collapse: collapse; /* Menghilangkan jarak antar sel tabel */
    position: sticky;
}

.row.flex-nowrap {
    overflow-x: hidden; /* Menyembunyikan scroll horizontal pada elemen luar */
    white-space: nowrap; /* Mencegah elemen dalam baris terpotong */
}

.col-auto {
    position: fixed; /* Membuat elemen tetap berada di posisi tertentu saat scroll */
    top: 0; /* Menempel di bagian atas */
    left: 0; /* Menempel di bagian kiri */
    height: 100vh; /* Tinggi penuh layar */
    z-index: 1050; /* Memastikan elemen ini berada di atas elemen lain */
    padding-top: 20px; /* Memberikan jarak atas pada elemen */
    background-color: #fff; /* Tambahkan warna latar belakang agar tidak transparan */
}

.col.py-3 {
    margin-left: 230px; /* Memberikan jarak ke kiri, sesuai lebar elemen fixed */
    padding-top: 20px; /* Memberikan padding atas untuk konten */
}

.table-container th, .table-container td {
    padding: 10px; /* Jarak di dalam sel tabel */
    text-align: left; /* Teks rata kiri */
    border: 1px solid #ddd; /* Batas antar sel tabel */
}

.table-container th {
    background-color: #00705a; /* Warna latar belakang untuk header tabel */
    font-weight: bold; /* Menonjolkan teks header */
    color: white;
}
</style>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00705a; height: 100vh; overflow-y: auto;">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <img src="<?= base_url('assets/logo.png')?>" width="130px">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="<?= site_url('dashboard')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-clipboard-data-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Dokter/admin')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-person-fill-add"></i> <span class="ms-1 d-none d-sm-inline">Dokter</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Gallery/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-image-fill"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span></a>
                    </li>
                    <li>
                        <a href="<?= site_url('Profile/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-person-bounding-box"></i></i> <span class="ms-1 d-none d-sm-inline">Profile</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle active">
                            <i class="fs-4 bi-folder-fill"></i> <span class="ms-1 d-none d-sm-inline">Data</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="<?= site_url('login/dataU')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data User</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('pasien')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pasien</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('penyakit')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Penyakit</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('obat')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Obat</span></a>
                            </li>
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 active"> <span class="d-none d-sm-inline">Data Pengobatan</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('resep')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Resep</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('message')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Message</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                       <i class="bi bi-person-circle"></i>
                        <span class="d-none d-sm-inline mx-1"><?php echo $this->session->userdata('username'); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                           <center> <?php echo $this->session->userdata('role'); ?></p> </center>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center" href="<?= site_url('login/logout')?>">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
<div class="col py-3">
<div class="container mt-5">
    <?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?php echo $this->session->flashdata('success'); ?>'
        });
    </script>
<?php elseif ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?php echo $this->session->flashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

    <h2 class="mb-4">Daftar Pengobatan</h2>
    <a href="<?= site_url('pengobatan/create') ?>" class="btn mb-3 text-white" style="background-color:#00705a;">Tambah Pengobatan</a>
    <div class="table-container">
    <table id="uploadTable" class="table table-bordered">
    <thead>
        <tr>
            <th>ID Pengobatan</th>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>Penyakit</th>
            <th>Obat</th>
            <th>Dokter</th>
            <th>Tanggal Pengobatan</th>
            <th>Biaya Pengobatan</th>
            <th>Status Bayar</th>
            <th>Tarif Dokter</th>
            <th>Total Biaya</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengobatan as $p): ?>
            <tr>
                <td class="text-center"><?= $p['id_pengobatan'] ?></td>
                <td class="text-center"><?= $p['id_pasien'] ?></td>
                <td class="text-center"><?= $p['nama_pasien'] ?></td>
                <td>
                    <?php
                    $penyakits = $this->Pengobatan_model->get_penyakit_by_pengobatan($p['id_pengobatan']);
                    foreach ($penyakits as $index => $penyakit) {
                        echo ($index + 1) . '. ' . $penyakit['nama_penyakit'] . "<br>";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    $obats = $this->Pengobatan_model->get_obat_by_pengobatan($p['id_pengobatan']);
                    foreach ($obats as $index => $obat) {
                        echo ($index + 1) . '. ' . $obat['nama_obat'] . "<br>";
                    }
                    ?>
                </td>
                <td class="text-center"><?= $p['nama_dokter'] ?></td>
                <td class="text-center"><?= date('d-m-Y', strtotime($p['tgl_pengobatan'])) ?></td>
                <td class="text-center">Rp.<?= number_format($p['biaya_pengobatan'], 2, ',', '.') ?></td>
                <td class="text-center"><?= $p['status_bayar'] == 'Sudah Dibayar' ? '<span class="text-success">Sudah Dibayar</span>' : '<span class="text-danger">Belum Dibayar</span>' ?></td>
                <td class="text-center">Rp.<?= number_format($p['tarif'], 2, ',', ',') ?></td>
                <td class="text-center">Rp.<?= number_format($p['total_biaya'], 2, ',', '.') ?></td>
                <td class="action-buttons">
                    <div class="btn-group" role="group">
                        <a href="<?= site_url('pengobatan/edit/' . $p['id_pengobatan']) ?>" class="btn btn-sm" style="color: #00705a; background-color: #fff; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;"> <i class="bi bi-pencil-square"></i></a>
                        <a href="<?= site_url('pengobatan/delete/' . $p['id_pengobatan']) ?>" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="color: #ffffff; background-color: #00705a; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;">                                    <i class="bi bi-trash"></i></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
 </div>
</body>
<script>
     $(document).ready(function () {
    $('#uploadTable').DataTable({
        scrollX: true, // Mengaktifkan scroll horizontal
        autoWidth: false // Menonaktifkan lebar otomatis
    });
});

</script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
