<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <style>
        /* Font Style */
        .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            margin: 0 10px;
            color: black !important;
            text-decoration: none;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .nav-link:hover {
            color: #00705a !important;
            position: relative;
        }

        .nav-link:hover::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: yellow;
            border-radius: 2px;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .nav-link.active {
            font-weight: bold;
            color: #00705a !important;
        }

        .navbar i {
            margin-left: -20px;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .btn-custom {
            margin-left: 10px;
            background-color: rgb(44, 113, 100);
        }

        .btn-custom:hover {
            background-color: yellow;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dropdown-menu {
            min-width: 400px;
            margin-left: -150px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            transition: all 0.3s ease;
        }

        .dropdown-menu li a {
            color: #343a40;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-align: center;
        }

        .dropdown-menu li a:hover {
            background-color: #343a40;
            color: #ffffff;
        }

        .dropdown-divider {
            border-color: #dee2e6;
            margin: 8px 0;
        }

        /* Custom Styles */
        .card {
            border-radius: 15px;
            background: linear-gradient(135deg, #e0eafc, #cfdef3);
            box-shadow: 0 10px 30px #00705a;
        }

        .card-header {
            background-color: #00705a;
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 30px;
            background-color: white;
            font-family: 'Montserrat', sans-serif;
        }

        .card-body p {
            font-size: 1.1rem;
            line-height: 1.6;
            text-align: center;
        }

        .card-body h2 {
            color: rgb(139, 209, 195);
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card-header::after {
            content: '';
            display: block;
            width: 50px;
            height: 4px;
            background-color: #ffd700;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .certificate-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px #00705a;
            margin-top: 50px;
        }

        .certificate-container h2 {
            color: #00705a;
            font-weight: bold;
            font-size: 2.5rem;
        }

        .certificate-container h4 {
            color: #555;
            font-size: 1.25rem;
            margin-top: 15px;
            line-height: 1.6;
        }

        .certificate-container img {
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 700px;
        }

        .decorative-line {
            height: 4px;
            width: 100px;
            background-color: #00705a;
            margin: 20px auto;
            border-radius: 2px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .certificate-container h2 {
                font-size: 2rem;
            }

            .certificate-container h4 {
                font-size: 1rem;
            }

            .card-body p {
                font-size: 1rem;
            }

            .card-body h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar atas -->
    <nav class="navbar bg-body-light" style="background-color: #00705a; height: 50px; padding: 0 20px;">
        <div class="container">
            <div class="d-flex align-items-center">
                <b class="text-light"><i class="bi bi-clock"></i> Senin - Sabtu 8:00 - 21:00</b>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <b class="text-light me-3"><i class="bi bi-whatsapp"></i> 083928392392</b>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <button type="button" class="btn btn-link text-light" data-bs-toggle="modal" data-bs-target="#profileModal" style="text-decoration: none; margin-left: 20px;">
                        <i class="bi bi-person-circle"></i>
                        <?php echo $this->session->userdata('username'); ?>
                    </button>
                <?php else: ?>
                    <a href="<?= site_url('Login')?>" type="button" class="btn btn-link text-light">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Modal Profile -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Username: <?php echo $this->session->userdata('username'); ?></p>
                    <p>Sebagai: <?php echo $this->session->userdata('role'); ?></p>
                    <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-danger w-100">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar bawah -->
    <nav class="navbar navbar-expand-lg border sticky sticky-top" style="background-color: #ffffff; height: 40px;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100 d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-light active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= site_url('Profile/user')?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= site_url('dokter/user')?>">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= site_url('gallery/user')?>">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= site_url('welcome/kontak')?>">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div class="carousel-container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/banner1.jpg') ?>" class="d-block w-100" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner2.jpg') ?>" class="d-block w-100" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner3.jpg') ?>" class="d-block w-100" alt="Banner 3">
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <!-- Card untuk Profil -->
        <div class="card shadow-lg">
            <div class="card-header text-center">
                <h2>Profile Klinik Vivarta</h2>
            </div>
            <div class="card-body">
                <p>
                    Klinik Vivarta berintegrasi dan berfokus dalam memberikan pelayanan kesehatan, pengobatan dan pencegahan penyakit. Klinik Vivarta tumbuh dari kepedulian kesehatan dan kesejahteraan karyawan perusahaan serta keluarga yang diharapkan dapat membangun perusahaan, masyarakat sekitar dan juga negara. <br><br>

                    Untuk mencapai kepedulian diatas dan juga pengembangannya, maka klinik Vivarta harus terus meningkatkan kualitas pelayan kesehatan yang baik dan akan terus bertransformasi dalam mengikuti teknologi kesehatan dan juga menjalankan etika bisnis yang baik. <br><br>

                    Klinik Vivarta dikemudian hari diharapkan mendapatkan dukungan oleh semua pihak yang terkait dan terus memberikan pelayanan kesehatan secara tuntas sesuai dengan visi, misi dan nilai-nilai yang dicanangkan.
                </p>
                <center><img class="rounded-5 img-fluid" src="<?= base_url('assets/alamat.jpg') ?>"></center>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="certificate-container text-center">
            <h2>Sertifikasi Klinik Vivarta</h2>
            <div class="decorative-line"></div>
            <h4>
                Vivarta Klinik Telah lulus Akreditasi Tingkat <strong>PARIPURNA</strong> 
                sesuai dengan Standar Akreditasi Kementrian Kesehatan (<strong>STARKES</strong>) 
                Republik Indonesia Tahun 2022
            </h4>
            <img src="<?= base_url('assets/sertif.jpg') ?>" alt="Sertifikat" class="img-fluid">
        </div>
    </div>

    <div class="container mt-5 pt-4 pb-5" style="background-color: white; box-shadow: 0 5px 15px #00705a; border-radius: 20px;">    
        <h2 class="text-center fw-bold" style="color: #00705a;">Mengapa Memilih Vivarta Klinik</h2>
        <div class="row justify-content-center mt-3">
            <div class="col-12 col-md-6 col-lg-3 text-center mb-4">
                <img src="<?= base_url('assets/why1.jpg')?>" width="120px" class="img-fluid">
                <h3 class="fw-bold mt-2">Fitur Berlimpah</h3> 
                <p>Aplikasi Rekam Medis Elektronik Terintegrasi Satu Sehat dan BPJS untuk Klinik BPJS</p>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center mb-4">
                <img src="<?= base_url('assets/why2.jpg')?>" width="120px" class="img-fluid">
                <h3 class="fw-bold mt-2">Mudah Digunakan</h3> 
                <p>Aplikasi Rekam Medis Elektronik yang Mudah digunakan dan User Friendly. Dengan menu mudah dipahami.</p>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center mb-4">
                <img src="<?= base_url('assets/why3.jpg')?>" width="120px" class="img-fluid">
                <h3 class="fw-bold mt-2">Aman Terpercaya</h3>
                <p>Software Vivarta Klinik Terdaftar di PSE Kominfo, kerasiahaan dam keamanan data tersertifikasi</p> 
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center mb-4">
                <img src="<?= base_url('assets/why4.jpg')?>" width="120px" class="img-fluid">
                <h3 class="fw-bold mt-2">Harga Ramah</h3>
                <p>Harga Ramah dan Terbaik, tanpa perlu tambahan biaya untuk fitur terbaru</p>
            </div>
        </div>
    </div>

    <footer style="background-color: #00705a; color: white; padding: 30px 0; text-align: center; margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <h4>Kontak Kami</h4>
                    <ul style="list-style-type: none; padding: 0;">
                        <li><i class="bi bi-telephone"></i> 083928392392</li>
                        <li><i class="bi bi-envelope"></i> info@klinikvivarta.com</li>
                        <li><i class="bi bi-geo-alt"></i> Jl. Kesehatan No. 123, Jakarta</li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <h4>Ikuti Kami</h4>
                    <div>
                        <a href="#" class="text-light me-3"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-twitter" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-linkedin" style="font-size: 1.5rem;"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <h4>Tentang Kami</h4>
                    <p>
                        Klinik Vivarta adalah klinik kesehatan yang memberikan pelayanan pengobatan dan pencegahan penyakit untuk masyarakat sekitar. Dengan pelayanan yang terbaik, kami berkomitmen untuk meningkatkan kualitas hidup Anda.
                    </p>
                </div>
            </div>
            <hr style="border-color: #fff;">
            <p>&copy; 2024 Klinik Vivarta. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>