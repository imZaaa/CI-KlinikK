<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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


</style>
<body>
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
            <a class="nav-link text-light" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('welcome/about')?>">About</a>
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
            <a class="nav-link text-light" href="#">Dokter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light active" href="#">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= site_url('welcome/kontak')?>">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
        
        <!-- Judul dan tombol untuk menambah data -->
        <div class="text-center mb-4">
            <h2 class="text-primary">Gallery Upload</h2>
            <!-- Tombol untuk menambah data baru, mengarah ke halaman create -->
            <a href="<?= site_url('gallery/create'); ?>" class="btn btn-success btn-sm mt-3">
                <i class="bi bi-plus-circle"></i> Tambah Data
            </a>
        </div>

        <!-- Tabel yang menampilkan data upload, dengan ID untuk DataTables -->
        <table id="uploadTable" class="table table-bordered table-striped table-hover">
    <thead class="table-primary">
        <tr>
            <th>Nomor</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($uploads)): // Pastikan ada data di $uploads ?>
            <?php $no = 1;?> 
            <?php foreach ($uploads as $upload): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="text-center">
                        <!-- Menampilkan gambar -->
                        <?php if (!empty($upload['gambar'])): ?>
                            <img src="<?= base_url('assets/'.$upload['gambar']); ?>" class="img-thumbnail" width="90px">
                        <?php else: ?>
                            <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                    </td>
                    <td><?= !empty($upload['deskripsi']) ? $upload['deskripsi'] : '-'; ?></td>
                    <td class="text-center">
                        <!-- Tombol Edit -->
                        <a href="<?= site_url('gallery/edit/'.$upload['id']); ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <!-- Tombol Hapus -->
                        <a href="<?= site_url('gallery/delete/'.$upload['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Tampilkan pesan jika tidak ada data -->
            <tr>
                <td colspan="8" class="text-center">Tidak ada data tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

    </div>
</body>
<script type="text/javascript">
        $(document).ready(function(){
            // Inisialisasi DataTables dengan konfigurasi
            $('#uploadTable').DataTable({
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