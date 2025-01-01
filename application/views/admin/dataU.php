<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Link ke jQuery, digunakan untuk DataTables dan interaksi DOM -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link ke DataTables JS untuk menambah fungsionalitas tabel interaktif -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
        background-color: transparent !important; /* Menghilangkan background biru */
    }

    ::-webkit-scrollbar {
        display: none;
    }

    /* Styling untuk container utama */
    .content-container {
        margin-left: 280px;
        padding: 20px;
    }

    /* Styling untuk tabel agar lebih rapi */
    #uploadTable {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    #uploadTable th, #uploadTable td {
        border-color: #00705a;
    }

    #uploadTable tbody tr:hover {
        background-color: #d1f0e6;
    }
    /* Styling untuk sidebar agar tetap di tempat */
.col-auto {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh; /* Menjaga sidebar sepanjang tinggi viewport */
    z-index: 1050; /* Agar sidebar tetap di atas konten */
    padding-top: 20px; /* Memberikan ruang agar tidak terlalu rapat ke atas */
}

/* Mengatur ruang untuk konten utama */
.col.py-3 {
    margin-left: 280px; /* Memberikan ruang agar konten utama tidak tertutup sidebar */
}
        ::-webkit-scrollbar{
            display: none;
        }
         /* Style untuk table */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff; /* Latar belakang putih untuk tabel */
        border: 1px solid #00705a; /* Border tabel dengan warna #00705a */
    }

    th, td {
        padding: 12px; /* Memberikan padding pada cell */
        text-align: center; /* Menyelaraskan teks ke tengah */
        border: 1px solid #00705a; /* Border setiap cell dengan warna #00705a */
    }

    /* Style untuk header tabel */
    th {
        background-color: #00705a; /* Latar belakang hijau pada header */
        color: #ffffff; /* Warna teks header putih */
        font-weight: bold;
    }

    /* Style untuk row tabel saat hover */
    tr:hover {
        background-color: #e8f5f4; /* Efek hover dengan warna latar belakang cerah */
    }

    /* Style untuk button aksi */
    .btn {
        font-size: 0.9rem;
        padding: 5px 10px;
        text-align: center;
    }

    .btn-warning {
        background-color: #f0ad4e; /* Warna untuk tombol edit */
        border-color: #f0ad4e;
    }

    .btn-danger {
        background-color: #d9534f; /* Warna untuk tombol hapus */
        border-color: #d9534f;
    }

    .btn-warning:hover, .btn-danger:hover {
        opacity: 0.8; /* Efek transparansi saat hover */
    }
    
</style>
<body>
    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" style="background-color: #00705a;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
               <img src="<?= base_url('assets/logo.png')?>" width="130px">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li>
                        <a href="<?= site_url('Dokter/admin')?>" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-person-fill-add"></i> <span class="ms-1 d-none d-sm-inline">Dokter</span> </a>
                    </li>
                    <li>
                        <a href="<?= site_url('Gallery/admin')?>" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-image-fill"></i> <span class="ms-1 d-none d-sm-inline">Gallery</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle active">
                            <i class="fs-4 bi-folder-fill"></i> <span class="ms-1 d-none d-sm-inline">Data</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="<?= site_url('login/dataU')?>" class="nav-link px-0 active"> <span class="d-none d-sm-inline">Data User</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('pasien')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pasien</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('penyakit')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Penyakit</span></a>
                            </li>
                            <li class="w-100">
                                <a href="<?= site_url('obat')?>" class="nav-link px-0 "> <span class="d-none d-sm-inline">Data Obat</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Item</span> 2</a>
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
    <h2 class="mb-4">Manajemen User</h2>

    <!-- Pesan sukses atau error -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
    <?php endif; ?>

    <!-- Tombol Tambah User -->
    <a href="<?= site_url('login/create'); ?>" class="btn mb-3 text-white" style="background-color: #00705a;"><i class="bi bi-plus-circle"></i> Tambah</a>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
    <!-- Tabel Admin -->
    <h3>Daftar Admin</h3>
    <table id="dataTableAdmin" class="table table-bordered table-hover" data-aos="fade-down-right">
        <thead style="background-color: #00705a; color: white;">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php $no_adm = 1; ?>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->role == 'admin'): ?>
                        <tr>
                            <td><?= 'ADM-' . $no_adm++; ?></td>
                            <td><?= htmlspecialchars($user->username); ?></td>
                            <td><?= htmlspecialchars($user->role); ?></td>
                            <td>
                                <a href="<?= site_url('login/edit_user/' . $user->id); ?>" class="btn btn-sm" style="color: #00705a; background-color: #fff; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;" >Edit</a>
                                <a href="<?= site_url('login/delete_user/' . $user->id); ?>" class="btn btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?');" style="color: #ffffff; background-color: #00705a; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;">Hapus</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data admin.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
        </div>
        <div class="col-sm-12">
            <div class="table-responsive">
    <!-- Tabel User -->
    <h3>Daftar User</h3>
    <table id="dataTableUser" class="table table-bordered table-hover" data-aos="fade-up-left">
        <thead style="background-color: #00705a; color: white;">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php $no_usr = 1; ?>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->role == 'user'): ?>
                        <tr>
                            <td><?= 'USR-' . $no_usr++; ?></td>
                            <td><?= htmlspecialchars($user->username); ?></td>
                            <td><?= htmlspecialchars($user->role); ?></td>
                            <td>
                                <a href="<?= site_url('login/edit_user/' . $user->id); ?>" class="btn btn-sm" style="color: #00705a; background-color: #fff; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;" >Edit</a>
                                <a href="<?= site_url('login/delete_user/' . $user->id); ?>" class="btn btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?');" style="color: #ffffff; background-color: #00705a; border-color: #00705a; border-radius: 5px; padding: 5px 10px; transition: all 0.3s ease;">Hapus</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data user.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
        </div>
    </div>
    </div>
</div>
    </div>
</body>
<script type="text/javascript">
        $(document).ready(function(){
            // Inisialisasi DataTables dengan konfigurasi
            $('#dataTable').DataTable({
                responsive: true, // Menyusun ulang tabel agar responsif
                autoWidth: false, // Menonaktifkan lebar otomatis
                language: {
                    search: "Cari:", // Label untuk kolom pencarian
                    lengthMenu: "Tampilkan _MENU_ entri", // Pilihan jumlah entri yang tampil
                    info: "Menampilkan _START_ ke _END_ dari _TOTAL_ entri", // Info tentang jumlah entri yang ditampilkan
                    paginate: {
                        first: "Pertama", // Label untuk tombol pertama
                        last: "Terakhir", // Label untuk tombol terakhir
                        next: "Berikutnya", // Label untuk tombol berikutnya
                        previous: "Sebelumnya" // Label untuk tombol sebelumnya
                    }
                }
            });
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
