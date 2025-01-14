<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
}

form .card {
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
}

form .btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    transition: background 0.3s ease-in-out;
}

form .btn-primary:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
    transform: scale(1.05);
}

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
            margin-left: 230px; /* Memberikan ruang agar konten utama tidak tertutup sidebar */
        }
        ::-webkit-scrollbar {
            display: none;
        }

        .btn-custom {
            margin-left: 10px; /* Jarak antara tombol dan nomor telepon */
            background-color:rgb(44, 113, 100);
            
        }
        .btn-custom:hover {
            margin-left: 10px; /* Jarak antara tombol dan nomor telepon */
            background-color: yellow;
            
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
                        <a href="<?= site_url('Profile/admin')?>" class="nav-link px-0 align-middle active">
                            <i class="fs-4 bi-person-bounding-box"></i></i> <span class="ms-1 d-none d-sm-inline">Profile</span></a>
                    </li>
                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
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
                                <a href="<?= site_url('pengobatan')?>" class="nav-link px-0"> <span class="d-none d-sm-inline">Data Pengobatan</span></a>
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
<div class="container">
   <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>

      <div class="mb-4">
        <div class="card text-white border-0 shadow-sm" style="background-color: #00705a;">
            <div class="card-body text-center">
                <h2 class="mb-0">Profile</h2>
            </div>
        </div>
    </div>
    <form action="<?php echo site_url('profile/update') ?>" method="post" enctype="multipart/form-data" class="p-5 bg-white rounded-lg shadow-lg">
    <div class="row gy-4">
        <!-- Kolom Kiri: Gambar -->
        <div class="col-md-4">
            <div class="card h-50 border-0 shadow-sm">
                <div class="card-body text-center">
                    <label for="gambar1" class="form-label fw-bold text-dark">Gambar</label>
                    <input type="file" name="gambar1" id="gambar1" class="form-control mb-3">
                    <?php if (!empty($about_us['gambar1'])): ?>
                        <div class="text-center">
                            <img src="<?= base_url('assets/' . $about_us['gambar1']); ?>" 
                                 alt="About Image" class="img-fluid rounded shadow-sm mt-3">
                        </div>
                    <?php else: ?>
                        <p class="text-danger text-center mt-3">Gambar tidak tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Kolom Kanan: Deskripsi, Visi, Misi -->
        <div class="col-md-8">
            <div class="row gy-4">
                <!-- Deskripsi -->
                <div class="col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <label for="deskripsi1" class="form-label fw-bold text-dark">Deskripsi</label>
                            <textarea name="deskripsi1" id="deskripsi1" class="form-control" rows="6"><?= isset($about_us['deskripsi1']) ? $about_us['deskripsi1'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Visi -->
                <div class="col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <label for="visi" class="form-label fw-bold text-dark">Visi</label>
                            <textarea name="visi" id="visi" class="form-control" rows="6"><?= isset($about_us['visi']) ? $about_us['visi'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Misi -->
                <div class="col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <label for="misi" class="form-label fw-bold text-dark">Misi</label>
                            <textarea name="misi" id="misi" class="form-control" rows="6"><?= isset($about_us['misi']) ? $about_us['misi'] : ''; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tombol Submit -->
    <div class="row mt-5">
        <div class="col text-center">
            <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill shadow-lg border-0">Simpan Perubahan</button>
        </div>
    </div>
</form>

    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>