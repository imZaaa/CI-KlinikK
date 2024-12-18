<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
    <style>
        /* Font Style */
        .nav-link {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            margin: 0 10px;
            color: black !important; /* Warna teks */
            text-decoration: none; /* Hapus underline default */
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .nav-link:hover {
            color: #00705a !important; /* Ubah warna teks saat hover */
            text-decoration: none; /* Hapus underline default */
            position: relative;
        }

        .nav-link:hover::after {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 100%;
            height: 3px; /* Ketebalan underline */
            background-color: yellow; /* Warna underline */
            border-radius: 2px; /* Membuat sudut underline lebih halus */
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease; /* Animasi untuk underline */
        }

        .nav-link:hover::after {
            transform: scaleX(1); /* Membuat underline muncul saat hover */
            transform-origin: bottom left; /* Memulai animasi dari kiri */
        }


        .nav-link.active {
            font-weight: bold;
            color: #00705a !important; /* Warna saat aktif */
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
         /* Custom Styles */
         .card {
            border-radius: 15px; /* Membuat sudut card lebih halus */
            background: linear-gradient(135deg, #e0eafc, #cfdef3); /* Gradient background lembut */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Shadow yang lebih halus */
        }

        .card-header {
            background-color: #00705a; /* Warna header yang lebih elegan */
            color: white;
            border-radius: 15px 15px 0 0; /* Mengatur sudut header card */
            padding: 20px;
        }

        .card-body {
            padding: 30px;
            background-color: #d9d9d9;
            font-family: 'Montserrat', sans-serif;
        }

        .card-body p {
            font-size: 1.1rem;
            line-height: 1.6;
            text-align: center;
        }

        .card-body h2 {
            color:rgb(139, 209, 195);
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Border bawah pada header */
        .card-header::after {
            content: '';
            display: block;
            width: 50px;
            height: 4px;
            background-color: #ffd700; /* Golden line */
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
  <!-- Navbar atas -->
  <nav class="navbar bg-body-light" style="background-color: #00705a; height: 50px; padding: 0 20px;">
    <div class="container">
        <div class="d-flex align-items-center">
            <b class="text-light"><i class="bi bi-clock"></i> Senin - Sabtu 8:00 - 11:00</b>
        </div>
        <div class="d-flex align-items-center">
            <b class="text-light"><i class="bi bi-whatsapp"></i> 083928392392</b>
            <!-- Button di samping nomor telepon -->
            <a href="<?= site_url('login/index')?>" class="btn btn-custom text-light">Login</a>
        </div>
    </div>
  </nav>

  <!-- Navbar bawah -->
  <nav class="navbar navbar-expand-lg sticky sticky-top" style="background-color: #ffffff; height: 40px;">
    <div class="container-fluid">
      <!-- Toggler untuk tampilan mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100 d-flex justify-content-center">
          <li class="nav-item">
            <a class="nav-link text-light active" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('welcome/about') ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Contact</a>
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
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
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
            <center><img class="rounded-5" src="<?= base_url('assets/alamat.jpg') ?>" width="500px"></center>
        </div>
    </div>
</div>

<footer style="background-color: #00705a; color: white; padding: 30px 0; text-align: center; margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Kontak Kami</h4>
                <ul style="list-style-type: none; padding: 0;">
                    <li><i class="bi bi-telephone"></i> 083928392392</li>
                    <li><i class="bi bi-envelope"></i> info@klinikvivarta.com</li>
                    <li><i class="bi bi-geo-alt"></i> Jl. Kesehatan No. 123, Jakarta</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Ikuti Kami</h4>
                <div>
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-twitter" style="font-size: 1.5rem;"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-linkedin" style="font-size: 1.5rem;"></i></a>
                </div>
            </div>
            <div class="col-md-4">
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
