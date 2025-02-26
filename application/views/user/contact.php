<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/logo.png')?>">
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
        ::-webkit-scrollbar{
            display: none;
        }

       
       

/* Button */
.btn-custom {
    background-color: #007bff;
    color: #ffffff;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.btn-custom:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Alert Styles */
.alert {
    border-radius: 5px;
    padding: 10px;
    font-size: 0.9rem;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Mengubah warna latar belakang dan border form */
.form-container {
    padding: 30px;
    border-radius: 8px;
    /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
}

/* Menambahkan warna hijau pada label */
.form-label {
    color: #00705a;
    font-weight: bold;
}

/* Menambahkan warna hijau pada input dan textarea */
.form-control {
    border-color: #00705a;
    border-radius: 4px;
}

/* Mengubah warna border pada input saat fokus */
.form-control:focus {
    border-color: #005740; /* Lebih gelap saat fokus */
    box-shadow: 0 0 5px rgba(0, 112, 90, 0.5);
}

/* Menambahkan warna hijau pada tombol kirim */
.btn-custom {
    background-color: #00705a;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 6px;
    font-size: 16px;
}

.btn-custom:hover {
    background-color: #005740; /* Efek hover yang lebih gelap */
    box-shadow: 0 4px 6px rgba(0, 112, 90, 0.3);
}

/* Menambahkan margin bawah pada form */
.mb-3 {
    margin-bottom: 15px;
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
            <a class="nav-link text-light" href="<?= site_url('home')?>">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('profile/user')?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('dokter/user')?>">Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('Gallery/user')?>">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light active" href="#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <img src="<?= base_url('assets/bannerK.jpg')?>" width=1366px">

  <div class="container mt-5" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 30px; border-radius: 8px;">
    <div class="row">
        <div class="col-lg-6 col-md-8">
            <div class="form-container">
                <h2 class="text-center mb-4" style="color: #00705a;">Kirim Pesan Anda</h2>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                 <!-- Menampilkan pesan sukses jika ada -->
                 <?php if($this->session->flashdata('message')): ?>
                    <script>
                        alert("<?php echo $this->session->flashdata('message'); ?>");
                    </script>
                <?php endif; ?>
                <?php echo form_open('Message/submit'); ?>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        placeholder="Masukkan nama lengkap Anda" 
                        value="<?php echo set_value('name'); ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Anda</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="Masukkan email Anda" 
                        value="<?php echo set_value('email'); ?>" 
                        required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan Anda</label>
                    <textarea 
                        class="form-control" 
                        id="message" 
                        name="message" 
                        rows="5" 
                        placeholder="Tuliskan pesan Anda di sini..." 
                        required><?php echo set_value('message'); ?></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-custom w-100">Kirim Pesan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="col-sm-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31731.931926340734!2d106.55299830392494!3d-6.198701887362597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fe5b993d64a5%3A0xdc2dde42c09c66e7!2sKec.%20Jatiuwung%2C%20Kota%20Tangerang%2C%20Banten!5e0!3m2!1sid!2sid!4v1734798227528!5m2!1sid!2sid" width="600" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-3"></iframe>
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
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>