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
                        <a href="<?= site_url('dashboard')?>" class="nav-link px-0 align-middle fs-5">
                           <i class="bi bi-clipboard-data-fill"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
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
    <form action="<?= site_url('profile/update') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <label for="gambar1" class="form-label">Gambar</label>
                <input type="file" name="gambar1" id="gambar1" class="form-control">
                <?php if (!empty($about_us['gambar1'])): ?>
                    <img src="<?= base_url('uploads/' . $about_us['gambar1']); ?>" 
                         alt="About Image" class="img-fluid rounded mt-3">
                <?php else: ?>
                    <p class="text-danger mt-3">Gambar tidak tersedia.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <label for="about_title" class="form-label">Judul</label>
                <input type="text" name="about_title" id="about_title" 
                       value="<?= isset($about_us['about_title']) ? $about_us['about_title'] : ''; ?>" 
                       class="form-control">
                <label for="about_description" class="form-label mt-3">Deskripsi</label>
                <textarea name="about_description" id="about_description" 
                          class="form-control" rows="4"><?= isset($about_us['about_description']) ? $about_us['about_description'] : ''; ?></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <label for="about_vision" class="form-label">Visi</label>
                <textarea name="about_vision" id="about_vision" 
                          class="form-control" rows="4"><?= isset($about_us['about_vision']) ? $about_us['about_vision'] : ''; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="about_mission" class="form-label">Misi</label>
                <textarea name="about_mission" id="about_mission" 
                          class="form-control" rows="4"><?= isset($about_us['about_mission']) ? $about_us['about_mission'] : ''; ?></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </form>
</div>


    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>