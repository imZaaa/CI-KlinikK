<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
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
        .dropdown-menu {
            min-width: 400px; /* Atur ukuran sesuai kebutuhan */
            margin-left: -150px; /* Posisi sesuai kebutuhan */
            background: linear-gradient(135deg, #f8f9fa, #e9ecef); /* Gradasi warna */
            border: 1px solid #dee2e6; /* Border lembut */
            border-radius: 8px; /* Membulatkan sudut */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            padding: 10px; /* Memberi ruang di dalam */
            transition: all 0.3s ease; /* Efek transisi */
        }

        .dropdown-menu li a {
            color: #343a40; /* Warna teks */
            font-weight: 500; /* Tebal teks */
            padding: 8px 16px; /* Spasi dalam item */
            border-radius: 5px; /* Membulatkan sudut */
            transition: background-color 0.3s ease, color 0.3s ease; /* Transisi halus */
            text-align: center;
        }

        .dropdown-menu li a:hover {
            background-color: #343a40; /* Warna latar saat hover */
            color: #ffffff; /* Warna teks saat hover */
        }

        .dropdown-divider {
            border-color: #dee2e6; /* Warna divider */
            margin: 8px 0; /* Spasi divider */
        }
         /* Gallery Section */
    .gallery-header {
        text-align: center;
        margin-bottom: 30px;
        font-size: 2rem;
        font-weight: 700;
        color: #00705a;
    }

   /* Card Style */
/* Card Style */
.card {
    border-radius: 12px; /* Membulatkan sudut card */
    border: 2px solid #00705a;
    background-color: #f9f9f9;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease; /* Efek transisi pada hover */
}

.card-body {
    flex-grow: 1; /* Membuat card body mengisi sisa ruang */
}

.card img {
    width: 100%; /* Membuat gambar memenuhi lebar card */
    height: 250px; /* Batasi tinggi gambar agar tidak terlalu besar */
    object-fit: contain; /* Menjaga gambar agar tetap utuh tanpa terpotong */
    object-position: center; /* Menjaga gambar tetap terpusat */
    border-bottom: 2px solid #f0f0f0; /* Membuat batas halus antara gambar dan deskripsi */
    border-radius: 20px;
}

    .card-text {
        font-size: 1rem;
        color: #333;
    }
    .card-img-top {
    height: 250px;
    object-fit: cover; /* Menjaga gambar tidak terdistorsi */
    object-position: center;
    transition: transform 0.3s ease;
}

    .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Membesarkan card saat hover */
}

.card-img-top:hover {
    transform: scale(1.05); /* Zoom gambar saat hover */
}

.no-uploads {
    text-align: center;
    font-size: 1.2rem;
    color: #00705a;
    font-weight: 700;
}

    .gallery-row {
        margin-top: 20px;
    }

    .no-uploads {
        text-align: center;
        font-size: 1.2rem;
        color: #00705a;
        font-weight: 700;
    }

    /* Custom Button */
    .btn-custom {
        background-color: rgb(44, 113, 100);
        color: white;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: yellow;
        color: black;
    }
</style>
<body>
    <!-- Navbar atas -->
<nav class="navbar bg-body-light" style="background-color: #00705a; height: 50px; padding: 0 20px;">
    <div class="container">
        <div class="d-flex align-items-center">
            <b class="text-light"><i class="bi bi-clock"></i> Senin - Sabtu 8:00 - 21:00</b>
        </div>
        <div class="d-flex align-items-center ms-auto">
            <b class="text-light me-3"><i class="bi bi-whatsapp"></i> 083928392392</b>
            <!-- Button untuk login atau username setelah login -->
            <?php if ($this->session->userdata('logged_in')): ?> 
                <!-- Tampilkan Username di Modal -->
                <button type="button" class="btn btn-link text-light" data-bs-toggle="modal" data-bs-target="#profileModal" style="text-decoration: none; margin-left: 20px;">
                <i class="bi bi-person-circle"></i>
                    <?php echo $this->session->userdata('username'); ?>
                </button>
            <?php else: ?>
                <!-- Tampilkan Tombol Login di Modal -->
                <a href="<?= site_url('Login/index')?>" type="button" class="btn btn-link text-light">
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
      <!-- Toggler untuk tampilan mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav w-100 d-flex justify-content-center">
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('home/user')?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('welcome/aboutU')?>">About</a>
          </li>
          <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Data
                </a>
                <ul class="dropdown-menu">
                    <div class="row">
                        <div class="col-sm-6">
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                        </div>
                        <div class="col-sm-6">
                            <li><a class="dropdown-item" href="#">User</a></li>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        </div>
                        <div class="col-sm-6">
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        <li><a class="dropdown-item" href="#">data ppppppppppp</a></li>
                        </div>
                      
                    </div>
                </ul>
                </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('dokter/user')?>">Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light active" href="#">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('welcome/kontakU')?>">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <img src="<?= base_url('assets/bannerG.jpg')?>" width=1366px">

  <div class="container" >
    <h1 class="gallery-header mt-3">Gallery</h1>
    <div class="row gallery-row">
    <?php if (!empty($uploads)): ?>
        <?php foreach ($uploads as $index => $upload): ?>
            <div class="col-md-4 mb-4">
                <div class="card" data-aos="zoom-in" 
                    data-aos-delay="<?= ($index % 2 == 0) ? 100 : 300; ?>" 
                    data-aos-duration="350"
                    data-aos-easing="ease-in-out"
                    data-aos-mirror="true"
                    data-aos-once="false"
                    data-aos-anchor-placement="top-center">
                    <img src="<?= base_url('assets/' . $upload['gambar']); ?>" class="card-img-top" alt="Gambar">
                    <div class="card-body">
                        <p class="card-text fs-4 fw-bold">Deskripsi</p>
                        <p class="card-text"><?= $upload['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-uploads">Belum ada data yang diunggah.</p>
    <?php endif; ?>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>
